<?php

namespace App\Http\Controllers\ExportHtml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\ExportSyutujoService;
use App\Repositories\TbRaceSyutujoWriteLog\TbRaceSyutujoWriteLogRepositoryInterface;

class ExportSyutujoController extends Controller
{
    public $_service;
    public $TbRaceSyutujoWriteLog;


    public function __construct(
        ExportSyutujoService $ExportSyutujoService,
        TbRaceSyutujoWriteLogRepositoryInterface $TbRaceSyutujoWriteLog
    ){
        $this->_service = $ExportSyutujoService;
        $this->TbRaceSyutujoWriteLog = $TbRaceSyutujoWriteLog;
    }


    public function index(Request $request)
    {
        $id = $request->input('ID') ?? false;
        
        if($id){

            $sort_conditions = [
                '', //登番昇順
                '_Win', //勝率降順
                '_2Win', //2連率降順
                '_ST', //平均ST降順
            ];

            $is_success = true;
            $message = "書き出し完了";
            $log_data = [];
            $failure_touban = "";
            foreach($sort_conditions as $sort_condition){

                //サービスクラスで処理。
                $data = $this->_service->index($request,$sort_condition);

                if(!$sort_condition){
                    $touban_list = $data['touban_list'];
                    $result_table = $data['result_table'];
                    $log_data['nen'] = $data['nen'];
                    $log_data['ki'] = $data['ki'];
                    $log_data['sensyu_syussou2_update_time'] = $data['sensyu_syussou2_update_time'];

                    foreach($touban_list as $touban){
                        if(isset($result_table[$touban])){
                            if(
                                !$result_table[$touban]->NameK ||
                                !$result_table[$touban]->Nenrei ||
                                !$result_table[$touban]->KenID ||
                                !$result_table[$touban]->Kyu ||
                                !$result_table[$touban]->Sei
                            ){
                                $is_success = false;
                                $failure_touban .= $touban."<br>";
                            }
                        }else{
                            $is_success = false;
                            $failure_touban .= $touban."<br>";
                        }
                    }
                    $log_data['failure_touban'] = $failure_touban;
                }

                if($is_success){
                    //ソースを受け取り静的に書き出し処理
                    File::put(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Syutujo/09/PC/s'.$id.$sort_condition.'.htm', view('front.syutujo.index',$data));
                    $message .= '<br><a href="/asp/htmlmade/Race/Syutujo/09/PC/s'.$id.$sort_condition.'.htm">/asp/htmlmade/Race/Syutujo/09/PC/s'.$id.$sort_condition.'.htm</a>';
                }else{
                    $message .= '<br>データ不備のため書き出し中断:/asp/htmlmade/Race/Syutujo/09/PC/s'.$id.$sort_condition.'.htm';
                }
            }

            $log_result = $this->TbRaceSyutujoWriteLog->upsertLog($id,config('const.JYO_CODE'),$log_data,'pc',$is_success);

            return $message;



        }else{
            return '不正な操作です。処理を中断します。';
        }
    }

    public function auto_export(Request $request)
    {
        //出場の対象IDリスト生成
        $data = $this->_service->auto_export($request);
        
        $message = "";

        foreach($data['index_id_list'] as $id){

            $request->merge(['ID' => $id]);

            $sort_conditions = [
                '', //登番昇順
                '_Win', //勝率降順
                '_2Win', //2連率降順
                '_ST', //平均ST降順
            ];

            $is_success = true;
            $log_data = [];
            $failure_touban = "";
            foreach($sort_conditions as $sort_condition){

                //サービスクラスで処理。
                $data = $this->_service->index($request,$sort_condition);

                if(!$sort_condition){
                    $touban_list = $data['touban_list'];
                    $result_table = $data['result_table'];
                    $log_data['nen'] = $data['nen'];
                    $log_data['ki'] = $data['ki'];
                    $log_data['sensyu_syussou2_update_time'] = $data['sensyu_syussou2_update_time'];

                    foreach($touban_list as $touban){
                        if(isset($result_table[$touban])){
                            if(
                                !$result_table[$touban]->NameK ||
                                !$result_table[$touban]->Nenrei ||
                                !$result_table[$touban]->KenID ||
                                !$result_table[$touban]->Kyu ||
                                !$result_table[$touban]->Sei
                            ){
                                $is_success = false;
                                $failure_touban .= $touban."<br>";
                            }
                        }else{
                            $is_success = false;
                            $failure_touban .= $touban."<br>";
                        }
                    }
                    $log_data['failure_touban'] = $failure_touban;
                }

                if($is_success){
                    //ソースを受け取り静的に書き出し処理
                    File::put(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Syutujo/09/PC/s'.$id.$sort_condition.'.htm', view('front.syutujo.index',$data));
                    $message .= '<br>書き出し完了<br><a href="/asp/htmlmade/Race/Syutujo/09/PC/s'.$id.$sort_condition.'.htm">/asp/htmlmade/Race/Syutujo/09/PC/s'.$id.$sort_condition.'.htm</a>';
                }else{
                    $message .= '<br>データ不備のため書き出し中断:/asp/htmlmade/Race/Syutujo/09/PC/s'.$id.$sort_condition.'.htm';
                }
            }

            $log_result = $this->TbRaceSyutujoWriteLog->upsertLog($id,config('const.JYO_CODE'),$log_data,'pc',$is_success);
        }

        return $message;
        
    }

}