<?php

namespace App\Services\AdminKisya;

use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\TbBoatSyussou\TbBoatSyussouRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;
use App\Repositories\TbBoatsSensyusyussou2\TbBoatsSensyusyussou2RepositoryInterface;
use App\Repositories\TbBoatsMotorzenken\TbBoatsMotorzenkenRepositoryInterface;
use App\Repositories\TbTsuYosoAshi\TbTsuYosoAshiRepositoryInterface;
use App\Repositories\FanData\FanDataRepositoryInterface;

class DeashiService
{
    public $KaisaiMaster;
    public $TbBoatSyussou;
    public $TbBoatRaceheader;
    public $TbBoatsSensyusyussou2;
    public $TbBoatsMotorzenken;
    public $TbTsuYosoAshi;
    public $FanData;

    public function __construct(
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        TbBoatSyussouRepositoryInterface $TbBoatSyussou,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader,
        TbBoatsSensyusyussou2RepositoryInterface $TbBoatsSensyusyussou2,
        TbBoatsMotorzenkenRepositoryInterface $TbBoatsMotorzenken,
        TbTsuYosoAshiRepositoryInterface $TbTsuYosoAshi,
        FanDataRepositoryInterface $FanData
    ){
        $this->KaisaiMaster = $KaisaiMaster;
        $this->TbBoatSyussou = $TbBoatSyussou;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
        $this->TbBoatsSensyusyussou2 = $TbBoatsSensyusyussou2;
        $this->TbBoatsMotorzenken = $TbBoatsMotorzenken;
        $this->TbTsuYosoAshi = $TbTsuYosoAshi;
        $this->FanData = $FanData;
    }


    public function index($request){
        $data = [];

        $today_date = $request->input('yd') ?? date('Ymd');
        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');

        {
            //処理対象日を判定
            $tomorrow_date = date('Ymd',strtotime('+1 day',strtotime($today_date)));

            $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$today_date);
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$today_date);
            $zenken_flg = false;

            if($kaisai_master && $race_header){
                //当日であれば開催
                $kaisai_flg = true;
                $target_date = $today_date;
            }else{
                $kaisai_flg = false;

                //無い場合は、翌日判定。あれば前検
                $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$tomorrow_date);
                $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$tomorrow_date);

                if($kaisai_master && $race_header){
                    $zenken_flg = true;
                    $target_date = $tomorrow_date;
                }
            }

            //開催でもなく前検でもない場合、過去最新の開催を取得
            if(!$kaisai_flg && !$zenken_flg){
                $kaisai_master = $this->KaisaiMaster->getEndRecordByDate($jyo,$today_date);
                $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$today_date);

                $target_date = $kaisai_master->終了日付;
            }
        }

        //当日の出走者を取得
        $syussou = $this->TbBoatSyussou->getRecordByDate($jyo,$target_date);

        //出走に紐づく出足データ
        $touban_list = [];
        $syussou_array = [];
        foreach($syussou as $item){
            $touban_list[] = $item->TOUBAN;
            $syussou_array[$item->TOUBAN] = $item;
        }

        $syussou_ashi = $this->TbTsuYosoAshi->getRecordByToubanList($touban_list,$target_date);
        $syussou_ashi_array = [];
        foreach($syussou_ashi as $item){
            $syussou_ashi_array[$item->TOUBAN] = $item;
        }


        //出走に当てはまらない出足データ　→　追配
        $tsuihai_ashi = $this->TbTsuYosoAshi->getRecordNotToubanList($touban_list,$target_date);
        $tsuihai_ashi_array = [];
        foreach($tsuihai_ashi as $item){
            $tsuihai_ashi_array[$item->TOUBAN] = $item;
        }

        //帰郷の出足データ　
        $kikyo_ashi = $this->TbTsuYosoAshi->getKikyouRecordByToubanList($target_date);
        $kikyo_ashi_array = [];
        foreach($kikyo_ashi as $item){
            $kikyo_ashi_array[$item->TOUBAN] = $item;
        }

        
        $data['kaisai_master'] = $kaisai_master;
        $data['race_header'] = $race_header;
        $data['syussou_array'] = $syussou_array;
        $data['syussou_ashi_array'] = $syussou_ashi_array;
        $data['tsuihai_ashi_array'] = $tsuihai_ashi_array;
        $data['kikyo_ashi_array'] = $kikyo_ashi_array;


        //ファンデータ
        $fan_data = $this->FanData->getAllRecord();
        $fan_data_array = [];
        foreach($fan_data as $item){
            $fan_data_array[$item->Touban] = $item;
        }

        
        $data['fan_data_array'] = $fan_data_array;

        return $data;
    }

    public function view(){
        $deashi = $this->KaisaiMaster->getFirstRecordByPK($id);
        $data['deashi'] = $deashi;
        return $data;
    }

    public function create($request){

        $data = [];

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config();
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //保存処理
            $post_result = $this->KaisaiMaster->insertRecord($request);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin_kisya/deashi/';
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    public function edit($id,$request){

        $deashi = $this->KaisaiMaster->getFirstRecordByPK($id);

        $data['deashi'] = $deashi;

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config();
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //保存処理
            $post_result = $this->KaisaiMaster->UpdateRecordByPK($request,$id);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin_kisya/deashi/';
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    public function delete($id){
        $post_result = $this->KaisaiMaster->deleteFirstRecordByPK($id);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin_kisya/deashi/';
        if($post_result){
            $data['redirect_message'] = 'データを削除しました';
        }else{
            $data['redirect_message'] = 'データの削除に失敗しました';
        }

        return $data;
    }

    public function create_validate_config()
    {
        return [
            'config' => [
                'START_DATE' => ['nullable','max:12','min:12'],
                'END_DATE' => ['nullable','max:12','min:12'],
                'TEXT' => ['required','max:140'],
                'APPEAR_FLG' => [],
                'EDITOR_NAME' => ['required','max:64'],
            ],
            'message' => [
            ],
        ];
    }

}