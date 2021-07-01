<?php

namespace App\Services\Admin;

use App\Repositories\AssenSchedule\AssenScheduleRepositoryInterface;
use App\Repositories\FanData\FanDataRepositoryInterface;
use App\Repositories\TbBoatsSensyusyussou2\TbBoatsSensyusyussou2RepositoryInterface;
use App\Repositories\TbMikuniAssen\TbMikuniAssenRepositoryInterface;

class AssenService
{
    public $AssenSchedule;
    public $FanData;
    public $TbBoatsSensyusyussou2;
    public $TbMikuniAssen;

    public function __construct(
        AssenScheduleRepositoryInterface $AssenSchedule,
        FanDataRepositoryInterface $FanData,
        TbBoatsSensyusyussou2RepositoryInterface $TbBoatsSensyusyussou2,
        TbMikuniAssenRepositoryInterface $TbMikuniAssen
    ){
        $this->AssenSchedule = $AssenSchedule;
        $this->FanData = $FanData;
        $this->TbBoatsSensyusyussou2 = $TbBoatsSensyusyussou2;
        $this->TbMikuniAssen = $TbMikuniAssen;
    }


    public function index($request){

        //あっせんスケジュールをすべて取得
        $assen = $this->AssenSchedule->getAllRecord();
        
        $id_list = [];
        foreach($assen as $item){
            $id_list[] = $item->登録番号;
        }
        
        //あっせんスケジュールのID分のファンデータをページネートで取得
        $fandata = $this->FanData->getSortedRecordByToubanList($id_list,20);
        
        {
            //選手データが無いデータを判定
            $fandata_all = $this->FanData->getAllRecord();
            $touban_to_kyu = [];
            foreach($fandata_all as $item){
                $touban_to_kyu[$item->Touban] = $item->Kyu;
            }

            $nothing_fandata = [];
            foreach($id_list as $item){
                if(!isset($touban_to_kyu[$item])){
                    $nothing_fandata[] = $item;
                }
            }
        }

        $data['fandata'] = $fandata;
        $data['nothing_fandata'] = $nothing_fandata;
        return $data;
    }

    public function view($touban){
        //一件取得
        $fandata = $this->FanData->getFirstRecordByTouban($touban);

        $now_date = date('Ymd');
        //$now_date = "20201001";
        
        //あっせん情報(変更不可)
        //開催日分のデータが存在するので、グループ化
        $sensyusyussou2 = $this->TbBoatsSensyusyussou2->getRecordByTouban($touban,$now_date);
        
        //あっせん情報(変更可)
        $mikuni_assen = $this->TbMikuniAssen->getRecordByTouban($touban,$now_date);


        $assen_join = [];
        foreach($sensyusyussou2 as $item){
            $row = [];
            $row['id'] = "";
            $row['jyo'] = $item->JYO;
            $row['start_date'] = $item->TARGET_STARTDATE;
            $row['end_date'] = $item->TARGET_ENDDATE;
            $row['title'] = $item->RACE_TITLE;
            $row['appear_flg'] = 1;
            $row['sort_key'] = $item->TARGET_STARTDATE . $item->TARGET_ENDDATE;

            $assen_join[] = $row;
        }

        foreach($mikuni_assen as $item){
            $row = [];
            $row['id'] = $item->ID;
            $row['jyo'] = "99";
            $row['start_date'] = $item->START_DATE;
            $row['end_date'] = $item->END_DATE;
            $row['title'] = $item->TEXT;
            $row['appear_flg'] = $item->APPEAR_FLG;
            $row['sort_key'] = $item->START_DATE . $item->END_DATE;

            $assen_join[] = $row;
        }

        $sort = [];
        foreach($assen_join as $item){
            $sort[] = $item['sort_key'];
        }

        array_multisort($sort, SORT_DESC, $assen_join);

        $data['touban'] = $touban;
        $data['fandata'] = $fandata;
        $data['assen'] = $assen_join;

        return $data;
    }


    public function create($request){

        $data = [];

        if($request->isMethod('post')){

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config("AssenSchedule");
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //保存処理
            $post_result = $this->AssenSchedule->insertRecord($request);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = "admin/assen/";
            if($post_result){
                $data['redirect_message'] = "データを更新しました";
            }else{
                $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
            }

        }

        return $data;
    }

    public function edit($id ,$request){

        $assen = $this->TbMikuniAssen->getFirstRecordByPK($id);

        $touban = $assen->TOUBAN;
        $data['touban'] = $touban;
        $data['assen'] = $assen;

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config("TbMikuniAssen");
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //保存処理
            $post_result = $this->TbMikuniAssen->UpdateRecordByPK($request,$id,$touban);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = "admin/assen/view/".$touban;
            if($post_result){
                $data['redirect_message'] = "データを更新しました";
            }else{
                $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
            }

        }

        return $data;
    }

    public function create_assen($touban,$request){

        $data = [];
        $data['touban'] = $touban;

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config("TbMikuniAssen");
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //保存処理
            $post_result = $this->TbMikuniAssen->insertRecord($request,$touban);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin/assen/view/'.$touban;
            if($post_result){
                $data['redirect_message'] = "データを更新しました";
            }else{
                $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
            }

        }

        return $data;
    }

    public function delete($touban){

        $post_result = $this->AssenSchedule->deleteFirstRecordByPK($touban);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = "admin/assen";
        if($post_result){
            $data['redirect_message'] = "データを削除しました";
        }else{
            $data['redirect_message'] = "データの削除に失敗しました";
        }
        
        return $data;
    }

    public function delete_assen($id){

        $assen = $this->TbMikuniAssen->getFirstRecordByPK($id);

        $post_result = $this->TbMikuniAssen->deleteFirstRecordByPK($id);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin/assen/view/'.$assen->TOUBAN;
        if($post_result){
            $data['redirect_message'] = "データを削除しました";
        }else{
            $data['redirect_message'] = "データの削除に失敗しました";
        }
        
        return $data;
    }


    public function create_validate_config($type)
    {
        $config["AssenSchedule"] = [
            "config" => [
                '登録番号' => ['required','max:4','min:4','unique:あっせんスケジュールテーブル'],
            ],
            "message" => [
            ],
        ];

        $config["TbMikuniAssen"] = [
            "config" => [
                'START_DATE' => ['required','max:8','min:8'],
                'END_DATE' => ['required','max:8','min:8'],
                'TEXT' => ['required','max:128'],
                'APPEAR_FLG' => [],
                'EDITOR_NAME' => ['required','max:32'],
            ],
            "message" => [
            ],
        ];

        return $config[$type];
    }


}