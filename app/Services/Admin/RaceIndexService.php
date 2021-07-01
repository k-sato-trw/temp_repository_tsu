<?php

namespace App\Services\Admin;

use App\Repositories\TbRaceIndex\TbRaceIndexRepositoryInterface;
use App\Repositories\TbRaceTenbo\TbRaceTenboRepositoryInterface;
use App\Repositories\TbRaceSyutujoWriteLog\TbRaceSyutujoWriteLogRepositoryInterface;
use App\Services\GeneralService;

class RaceIndexService
{
    public $TbRaceIndex;
    public $TbRaceTenbo;
    public $TbRaceSyutujoWriteLog;
    public $GeneralService;

    public function __construct(
        TbRaceIndexRepositoryInterface $TbRaceIndex,
        TbRaceTenboRepositoryInterface $TbRaceTenbo,
        TbRaceSyutujoWriteLogRepositoryInterface $TbRaceSyutujoWriteLog,
        GeneralService $General
    ){
        $this->TbRaceIndex = $TbRaceIndex;
        $this->TbRaceTenbo = $TbRaceTenbo;
        $this->TbRaceSyutujoWriteLog = $TbRaceSyutujoWriteLog;
        $this->General = $General;
    }

    public function index($request){

        $status = $request->input('status',1);
        $data['now_date_ymd'] = date('Ymd');

        if($status){
            $race_index = $this->TbRaceIndex->getRecord(10,$data['now_date_ymd']);
        }else{
            $race_index = $this->TbRaceIndex->getRecord(10,);
        }

        $data['race_index'] = $race_index;

        $id_list = [];
        foreach($race_index as $item){
            $id_list[] = $item->ID;
        }

        {//レース展望呼び出し
            $tenbo = $this->TbRaceTenbo->getRecordByIdlist($id_list);

            $tenbo_array = [];
            foreach($tenbo as $item){
                $tenbo_array[$item->ID] = $item;
            }
            $data['tenbo'] = $tenbo_array;
        }

        {//出場予定選手呼び出し
            $syutujo_log = $this->TbRaceSyutujoWriteLog->getRecordByIdlist($id_list);

            $syutujo_log_array = [];
            foreach($syutujo_log as $item){
                $syutujo_log_array[$item->ID] = $item;
            }
            $data['syutujo_log'] = $syutujo_log_array;
        }
        $data['status'] = $status;

        return $data;
    }

    
    public function create($request){

        $data = [];
        $data['grade'] = $this->General->create_grade_options_in_raceindex();

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config();
            $request->validate(
                $validate_config['config'],[],
                $validate_config['message_label']
            );

            //保存処理
            $post_result = $this->TbRaceIndex->insertRecord($request);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = "admin/race_index/";
            if($post_result){
                $data['redirect_message'] = "データを更新しました";
            }else{
                $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
            }
        }

        return $data;
    }

    public function edit($id ,$request){
        $race_index = $this->TbRaceIndex->getFirstRecordByPK($id);

        $data['race_index'] = $race_index;
        $data['grade'] = $this->General->create_grade_options_in_raceindex();

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config();
            $request->validate(
                $validate_config['config'],[],
                $validate_config['message_label']
            );

            //保存処理
            $post_result = $this->TbRaceIndex->UpdateRecordByPK($request,$id);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = "admin/race_index/";
            if($post_result){
                $data['redirect_message'] = "データを更新しました";
            }else{
                $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
            }

        }

        return $data;
    }

    public function delete($id){

        $post_result = $this->TbRaceIndex->deleteFirstRecordByPK($id);
        $post_result2 = $this->TbRaceTenbo->deleteFirstRecordByPK($id);
        $post_result3 = $this->TbRaceSyutujoWriteLog->deleteFirstRecordByPK($id);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = "admin/race_index/";
        if($post_result){
            $data['redirect_message'] = "データを削除しました";
        }else{
            $data['redirect_message'] = "データの削除に失敗しました";
        }
        
        return $data;
    }

    public function create_validate_config()
    {
        return [
            "config" => [
                'START_DATE' => ['required','digits:8'],
                'END_DATE' => ['required','digits:8'],
                'GRADE' => [],
                'RACE_TITLE' => ['max:500'],
                'PC_TENBO_URL' => ['max:500'],
                'SP_TENBO_URL' => ['max:500'],
                'PC_SYUTUJO_URL' => ['max:500'],
                'SP_SYUTUJO_URL' => ['max:500'],
                'EDITOR_NAME' => ['max:32'],
            ],
            "message" => [
            ],
            "message_label" => [
                'START_DATE' => '開催期間開始',
                'END_DATE' => '開催期間終了',
            ],
        ];
    }

}