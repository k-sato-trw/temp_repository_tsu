<?php

namespace App\Http\Controllers\ExportHtml\Sp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\Sp\ExportSpSyutujoService;
use App\Repositories\TbRaceSyutujoWriteLog\TbRaceSyutujoWriteLogRepositoryInterface;

class ExportSpSyutujoController extends Controller
{
    public $_service;
    public $TbRaceSyutujoWriteLog;


    public function __construct(
        ExportSpSyutujoService $ExportSpSyutujoService,
        TbRaceSyutujoWriteLogRepositoryInterface $TbRaceSyutujoWriteLog
    ){
        $this->_service = $ExportSpSyutujoService;
        $this->TbRaceSyutujoWriteLog = $TbRaceSyutujoWriteLog;
    }


    public function index(Request $request)
    {
        $id = $request->input('ID') ?? false;
        
        if($id){

            $is_success = true;
            $message = "書き出し完了";
            $log_data = [];
            $failure_touban = "";

            //サービスクラスで処理。
            $data = $this->_service->index($request);

 
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
            

            if($is_success){
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Syutujo/09/SP/s'.$id.'.htm', view('front.sp.syutujo.index',$data));
                $message .= '<br><a href="/asp/htmlmade/Race/Syutujo/09/SP/s'.$id.'.htm">/asp/htmlmade/Race/Syutujo/09/SP/s'.$id.'.htm</a>';
            }else{
                $message .= '<br>データ不備のため書き出し中断:/asp/htmlmade/Race/Syutujo/09/SP/s'.$id.'.htm';
            }

            $log_result = $this->TbRaceSyutujoWriteLog->upsertLog($id,config('const.JYO_CODE'),$log_data,'sp',$is_success);

            return $message;


        }else{
            return '不正な操作です。処理を中断します。';
        }
    }


}