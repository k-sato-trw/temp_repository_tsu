<?php

namespace App\Services\Admin;

use App\Repositories\TbRaceIndex\TbRaceIndexRepositoryInterface;
use App\Repositories\TbRaceSyutujo\TbRaceSyutujoRepositoryInterface;
use App\Repositories\TbRaceSyutujoRacer\TbRaceSyutujoRacerRepositoryInterface;
use App\Repositories\FanData\FanDataRepositoryInterface;
use App\Repositories\TbBoatsSensyusyussou2\TbBoatsSensyusyussou2RepositoryInterface;
use App\Services\GeneralService;
use Illuminate\Validation\Rule;

class SyutujoRacerService
{
    public $TbRaceIndex;
    public $TbRaceSyutujo;
    public $TbRaceSyutujoRacer;
    public $FanData;
    public $TbBoatsSensyusyussou2;
    public $General;

    public function __construct(
        TbRaceIndexRepositoryInterface $TbRaceIndex,
        TbRaceSyutujoRepositoryInterface $TbRaceSyutujo,
        TbRaceSyutujoRacerRepositoryInterface $TbRaceSyutujoRacer,
        FanDataRepositoryInterface $FanData,
        TbBoatsSensyusyussou2RepositoryInterface $TbBoatsSensyusyussou2,
        GeneralService $General
    ){
        $this->TbRaceIndex = $TbRaceIndex;
        $this->TbRaceSyutujo = $TbRaceSyutujo;
        $this->TbRaceSyutujoRacer = $TbRaceSyutujoRacer;
        $this->FanData = $FanData;
        $this->TbBoatsSensyusyussou2 = $TbBoatsSensyusyussou2;
        $this->General = $General;
    }

    public function view($id){ //レースに紐付いた一覧画面

        $data['id'] = $id;
        
        $race_index = $this->TbRaceIndex->getFirstRecordByPK($id);
        $data['race_index'] = $race_index;

        $syutujo_racer = $this->TbRaceSyutujoRacer->getRecordByPK($id);
        $data['syutujo_racer'] = $syutujo_racer;

        $syutujo_racer_array = [];
        foreach($syutujo_racer as $item){
            $syutujo_racer_array[$item->TOUBAN] = $item;
        }
        $data['syutujo_racer_array'] = $syutujo_racer_array;

        //予想印ごとに処理分け
        //◎
        $data['syutujo_racer_yoso'][0] =  $this->TbRaceSyutujoRacer->getRecordByPKAndYoso($id,"◎");
        
        //〇
        $data['syutujo_racer_yoso'][1] =  $this->TbRaceSyutujoRacer->getRecordByPKAndYoso($id,"○");
        
        //▲
        $data['syutujo_racer_yoso'][2] =  $this->TbRaceSyutujoRacer->getRecordByPKAndYoso($id,"▲");
        
        //△
        $data['syutujo_racer_yoso'][3] =  $this->TbRaceSyutujoRacer->getRecordByPKAndYoso($id,"△");
        
        //×
        $data['syutujo_racer_yoso'][4] =  $this->TbRaceSyutujoRacer->getRecordByPKAndYoso($id,"×");
        
        //空
        $yoso_blank =  $this->TbRaceSyutujoRacer->getRecordByPKAndYoso($id,"");
        

        $touban_yoso_blank = [];
        foreach($yoso_blank as $item){
            $touban_yoso_blank[$item->TOUBAN] = $item->TOUBAN;
        } 
        $data['touban_yoso_blank'] = $touban_yoso_blank;

        $race_syutujo = $this->TbRaceSyutujo->getFirstRecordByPK($id);
        $data['race_syutujo'] = $race_syutujo;


        $fandata = $this->FanData->getAllRecord();

        $fandata_name_list = [];
        foreach($fandata as $item){
            $fandata_name_list[$item->Touban] = str_replace('　','',str_replace('　　',' ',$item->NameK));
        }
        $data['fandata_name_list'] = $fandata_name_list;


        {
            //選手リストの表示について、処理を読み違えていたので修正
            //おそらくフロント側の算出方法と同じはずなので、
            // App\Services\ExportHtml\ExportSyutujoService　の処理から転用

            $race_syutujo_racer_add = $this->TbRaceSyutujoRacer->getRecordForRaceTenbo($id,1);
            $race_syutujo_racer_delete = $this->TbRaceSyutujoRacer->getRecordForRaceTenbo($id,0);

            $sensyu_syussou2 = $this->TbBoatsSensyusyussou2->get1SetuRecord(config('const.JYO_CODE'),$race_index->START_DATE);

            //登番リスト作成
            $touban_list = [];
            foreach($sensyu_syussou2 as $item){
                if(!in_array($item->TOUBAN,$touban_list)){
                    $touban_list[] = $item->TOUBAN;
                }
            }
            

            $race_syutujo_racer_add_list = [];
            foreach($race_syutujo_racer_add as $item){
                if(!in_array($item->TOUBAN,$race_syutujo_racer_add_list)){
                    $race_syutujo_racer_add_list[$item->TOUBAN] = $item;
                }
            }

            $race_syutujo_racer_delete_list = [];
            foreach($race_syutujo_racer_delete as $item){
                if(!in_array($item->TOUBAN,$race_syutujo_racer_delete_list)){
                    $race_syutujo_racer_delete_list[$item->TOUBAN] = $item;
                }
            }

            //削徐リストに存在する登番を削除
            if($race_syutujo_racer_delete_list){
                foreach($touban_list as $key=>$item){
                    if(isset($race_syutujo_racer_delete_list[$item])){
                        unset($touban_list[$key]);
                    }
                }
            }

            //追加リストに存在し、既存のリストに存在しない場合、登番を追加
            if($race_syutujo_racer_add_list){
                foreach($race_syutujo_racer_add_list as $touban=>$item){
                    if(!in_array($touban,$touban_list)){
                        $touban_list[] = $touban;
                    }
                }
            }

            $data['race_syutujo_racer_add_list'] = $race_syutujo_racer_add_list;
            $data['touban_list'] = $touban_list;

        }

        return $data;
    }

    public function create($id, $request){
        
        $data = [];

        $touban = $request->input('touban') ?? "";
        $data['touban'] = $touban;

        $data['id'] = $id;
        $data['yoso'] = $this->General->create_yoso_options_in_syutujo_racer();
        $data['kyu'] = $this->General->create_kyu_options_in_syutujo_racer();

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config('create',$id);
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //保存処理
            $post_result = $this->TbRaceSyutujoRacer->insertRecord($request,$id);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin/syutujo_racer/view/'.$id;
            if($post_result){
                $data['redirect_message'] = "データを更新しました";
            }else{
                $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
            }

        }

        return $data;
    }

    public function edit($id,$touban ,$request){
        $syutujo_racer = $this->TbRaceSyutujoRacer->getFirstRecordByPK($id,$touban);

        $data['syutujo_racer'] = $syutujo_racer;

        $data['yoso'] = $this->General->create_yoso_options_in_syutujo_racer();
        $data['kyu'] = $this->General->create_kyu_options_in_syutujo_racer();

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config('edit');
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //保存処理
            $post_result = $this->TbRaceSyutujoRacer->UpdateRecordByPK($request,$id,$touban);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin/syutujo_racer/view/'.$id;
            if($post_result){
                $data['redirect_message'] = "データを更新しました";
            }else{
                $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
            }
        }

        return $data;
    }

    public function delete($id,$touban){

        $post_result = $this->TbRaceSyutujoRacer->deleteFirstRecordByPK($id, $touban);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin/syutujo_racer/view/'.$id;
        if($post_result){
            $data['redirect_message'] = "データを削除しました";
        }else{
            $data['redirect_message'] = "データの削除に失敗しました";
        }
        
        return $data;
    }

    public function delete_yoso($id,$touban){
        
        $post_result = $this->TbRaceSyutujoRacer->clearYosoByPK($id, $touban);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin/syutujo_racer/view/'.$id;
        if($post_result){
            $data['redirect_message'] = "データを更新しました";
        }else{
            $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
        }
        
        return $data;
    }
    
    public function update_yoso($id,$request){

        $post_result = $this->TbRaceSyutujoRacer->updateYosoByPK($request,$id);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin/syutujo_racer/view/'.$id;
        if($post_result){
            $data['redirect_message'] = "データを更新しました";
        }else{
            $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
        }
        
        return $data;    
    }

    
    public function upsert_syutujo($id,$request){
        
        $post_result = $this->TbRaceSyutujo->UpsertRecordByPK($request,$id);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin/syutujo_racer/view/'.$id;
        if($post_result){
            $data['redirect_message'] = "データを更新しました";
        }else{
            $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
        }
        
        return $data;    
    }


    
    public function create_validate_config($type,$id = null)
    {
        $config["create"] = [
            "config" => [
                'TOUBAN' => ['digits:4',
                                Rule::unique('tb_race_syutujo_racer')->where(function ($query)use($id) {
                                    return $query->where('ID', $id)->where('JYO',config("const.JYO_CODE"));
                                }),
                            ],
                'APPEAR_FLG' => [],
                'SENSYU_NAME' => ['max:20'],
                'AGE' => ['nullable','numeric','max:999'],
                'ADDRESS' => ['max:8'],
                'SEX' => [],
                'KYU' => [],
                'ALLWIN' => ['max:8'],
                'ALL2WIN' => ['max:8'],
                'ALLAVGST' => ['max:8'],
                'ALLCOUNT' => ['max:8'],
                'BIRTHDAY' => ['max:8'],
                'EDITOR_NAME' => ['max:64','required'],
            ],
            "message" => [
            ],
        ];

        $config["edit"] = [
            "config" => [
                'APPEAR_FLG' => [],
                'SENSYU_NAME' => ['max:20'],
                'AGE' => ['nullable','numeric','max:999'],
                'ADDRESS' => ['max:8'],
                'SEX' => [],
                'KYU' => [],
                'ALLWIN' => ['max:8'],
                'ALL2WIN' => ['max:8'],
                'ALLAVGST' => ['max:8'],
                'ALLCOUNT' => ['max:8'],
                'BIRTHDAY' => ['max:8'],
                'EDITOR_NAME' => ['max:64','required'],
            ],
            "message" => [
            ],
        ];

        return $config[$type];
    }

}