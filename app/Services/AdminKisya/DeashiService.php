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

        $today_date = $request->input('yd') ?? false;
        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $zenken_flg = false;
        

        if($today_date){
            //日付指定がある場合は固定

            $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$today_date);
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$today_date);

            $target_date = $today_date;
            if($kaisai_master && $race_header){
                $kaisai_flg = true;
            }else{
                $kaisai_flg = false;
            }
        }else{
            //処理対象日を判定
            $today_date = date('Ymd');
            $tomorrow_date = date('Ymd',strtotime('+1 day',strtotime($today_date)));

            $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$today_date);
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$today_date);
            

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


        //日付リスト作成
        $temp_date = $kaisai_master->開始日付;
        $end_date = $kaisai_master->終了日付;
        $kaisai_date_list = [];
        $day_count = 1;
        while($temp_date <= $end_date){
            if($temp_date == $kaisai_master->開始日付){
                $kaisai_date_list[$temp_date] = '初日';
            }elseif($temp_date == $kaisai_master->終了日付){
                $kaisai_date_list[$temp_date] = '最終日';
            }else{
                $kaisai_date_list[$temp_date] = $day_count.'日目';
            }
            $temp_date = date("Ymd",strtotime('+1 day',strtotime($temp_date)));
            $day_count++;
        }
        krsort($kaisai_date_list);


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
        $appear_flg = false; 
        foreach($syussou_ashi as $item){
            $syussou_ashi_array[$item->TOUBAN] = $item;
            if($item->APPEAR_FLG){
                $appear_flg = true;
            }
        }


        //出走に当てはまらない出足データ　→　追配
        $tsuihai_ashi = $this->TbTsuYosoAshi->getRecordNotToubanList($touban_list,$target_date);
        $tsuihai_ashi_array = [];
        foreach($tsuihai_ashi as $item){
            $tsuihai_ashi_array[$item->TOUBAN] = $item;
        }

        $kikyo_ashi_array = [];
        $display_kikyo_ashi_array = [];

        

        //出走データから本日帰郷となったデータ
        //昨日の出場者を取得
        $yesterday_date = date('Ymd',strtotime('-1 day',strtotime($target_date)));
        $yesterday_syussou = $this->TbBoatSyussou->getRecordByDate($jyo,$yesterday_date);
        $yesterday_syussou_array = [];
        foreach($yesterday_syussou as $item){
            $yesterday_syussou_array[$item->TOUBAN] = $item;
        }

        foreach($yesterday_syussou_array as $key=>$item){
            if(!in_array($key,$touban_list)){

                if(!isset($kikyo_ashi_array[$key])){
                    $kikyo_ashi_array[$key] = $item;
                    $display_kikyo_ashi_array[$key] = $item;
                }
            }
        }

        //出走データから本日より前に帰郷となったデータ
        //全レースの出場者を取得
        $setsukan_syussou = $this->TbBoatSyussou->getSetsukanRecord($jyo,$kaisai_master->開始日付,$target_date);
        $setsukan_syussou_array = [];
        foreach($setsukan_syussou as $item){
            $setsukan_syussou_array[$item->TOUBAN] = $item;
        }

        foreach($setsukan_syussou_array as $key=>$item){
            if(!in_array($key,$touban_list)){
                if(!isset($kikyo_ashi_array[$key])){
                    $kikyo_ashi_array[$key] = $item;
                }
            }
        }

        //帰郷データ
        $kikyo_ashi = $this->TbTsuYosoAshi->getKikyouRecordByToubanList($target_date);
        foreach($kikyo_ashi as $item){
            $kikyo_ashi_array[$item->TOUBAN] = $item;
        }


        //出走や追配データに帰郷該当者が含まれる場合除外
        foreach($syussou_array as $item){
            if(isset($kikyo_ashi_array[$item->TOUBAN])){
                unset($syussou_array[$item->TOUBAN]);
            }
        }

        foreach($tsuihai_ashi_array as $item){
            if(isset($kikyo_ashi_array[$item->TOUBAN])){
                unset($tsuihai_ashi_array[$item->TOUBAN]);
            }
        }
        

        $data['target_date'] = $target_date;
        $data['kaisai_master'] = $kaisai_master;
        $data['race_header'] = $race_header;
        $data['syussou_array'] = $syussou_array;
        $data['syussou_ashi_array'] = $syussou_ashi_array;
        $data['tsuihai_ashi_array'] = $tsuihai_ashi_array;
        $data['kikyo_ashi_array'] = $kikyo_ashi_array;
        $data['display_kikyo_ashi_array'] = $display_kikyo_ashi_array;
        $data['kaisai_date_list'] = $kaisai_date_list;
        $data['appear_flg'] = $appear_flg;


        //ファンデータ
        $fan_data = $this->FanData->getAllRecord();
        $fan_data_array = [];
        foreach($fan_data as $item){
            $fan_data_array[$item->Touban] = $item;
        }

        
        $data['fan_data_array'] = $fan_data_array;

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
            $post_result = $this->TbTsuYosoAshi->insertRecord($request);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin_kisya/deashi/?yd='.$request->input('TARGET_DATE');
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    public function upsert($request){
        $data = [];

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            /*
            $validate_config = $this->create_validate_config();
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );
            */

            //全データを収集しアップサート処理
            for($num = 1;$num < 1000; $num++){
                if(!($request->input('TOUBAN_'.$num) ?? false)){
                    //データが無くなったと見なして処理終了
                    break;
                }

                $insert_data = [
                    "TARGET_DATE" => $request->input('TARGET_DATE'),
                    "TOUBAN" => $request->input('TOUBAN_'.$num),
                    "MOTOR_NO" => $request->input('MOTOR_'.$num),
                    "DEASHI" => $request->input('DEASHI_'.$num),
                    "NOBIASHI" => $request->input('NOBIASHI_'.$num),
                    "KIKYO_FLG" => $request->input('KIKYO_FLG_'.$num),
                ];

                //保存処理
                $post_result = $this->TbTsuYosoAshi->upsertRecord($insert_data);

            }


            //$data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin_kisya/deashi?yd='.$request->input('TARGET_DATE');
            //if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            /*}else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }*/

        }

        return $data;
    }

    public function delete($request){
        $post_result = $this->TbTsuYosoAshi->deleteFirstRecordByPK($request);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin_kisya/deashi/?yd='.$request->input('TARGET_DATE');
        if($post_result){
            $data['redirect_message'] = 'データを削除しました';
        }else{
            $data['redirect_message'] = 'データの削除に失敗しました';
        }

        return $data;
    }

    public function change_appear_flg($request){
        $post_result = $this->TbTsuYosoAshi->changeAppearFlg($request);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin_kisya/deashi/?yd='.$request->input('TARGET_DATE');
        if($post_result){
            $data['redirect_message'] = 'データを更新しました';
        }else{
            $data['redirect_message'] = 'データの更新に失敗しました';
        }

        return $data;
    }

    public function create_validate_config()
    {
        return [
            'config' => [
                'TOUBAN' => ['required','max:4','min:4'],
                'KIBAN' => ['required','max:3','min:3'],
            ],
            'message' => [
            ],
        ];
    }

}