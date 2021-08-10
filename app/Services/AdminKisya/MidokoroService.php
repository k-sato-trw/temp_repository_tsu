<?php

namespace App\Services\AdminKisya;

use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\TbBoatSyussou\TbBoatSyussouRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;
use App\Repositories\TbBoatsSensyusyussou2\TbBoatsSensyusyussou2RepositoryInterface;
use App\Repositories\TbBoatsMotorzenken\TbBoatsMotorzenkenRepositoryInterface;
use App\Repositories\TbTsuYosoHighlight\TbTsuYosoHighlightRepositoryInterface;
use App\Repositories\FanData\FanDataRepositoryInterface;

class MidokoroService
{
    public $KaisaiMaster;
    public $TbBoatSyussou;
    public $TbBoatRaceheader;
    public $TbBoatsSensyusyussou2;
    public $TbBoatsMotorzenken;
    public $TbTsuYosoHighlight;
    public $FanData;

    public function __construct(
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        TbBoatSyussouRepositoryInterface $TbBoatSyussou,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader,
        TbBoatsSensyusyussou2RepositoryInterface $TbBoatsSensyusyussou2,
        TbBoatsMotorzenkenRepositoryInterface $TbBoatsMotorzenken,
        TbTsuYosoHighlightRepositoryInterface $TbTsuYosoHighlight,
        FanDataRepositoryInterface $FanData
    ){
        $this->KaisaiMaster = $KaisaiMaster;
        $this->TbBoatSyussou = $TbBoatSyussou;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
        $this->TbBoatsSensyusyussou2 = $TbBoatsSensyusyussou2;
        $this->TbBoatsMotorzenken = $TbBoatsMotorzenken;
        $this->TbTsuYosoHighlight = $TbTsuYosoHighlight;
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

        $highlight = $this->TbTsuYosoHighlight->getFirstRecordByDate($target_date);
        $data['highlight'] = $highlight;

        $data['target_date'] = $target_date;
        $data['kaisai_master'] = $kaisai_master;
        $data['race_header'] = $race_header;
        $data['kaisai_date_list'] = $kaisai_date_list;
        $data['appear_flg'] = $highlight->APPEAR_FLG ?? false;
        
        return $data;
    }

    

    public function upsert($request){
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
            $post_result = $this->TbTsuYosoHighlight->upsertRecord($request);


            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin_kisya/midokoro?yd='.$request->input('TARGET_DATE');
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    

    public function change_appear_flg($request){
        $post_result = $this->TbTsuYosoHighlight->changeAppearFlg($request);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin_kisya/midokoro/?yd='.$request->input('TARGET_DATE');
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
                'TARGET_DATE' => ['required'],
                'HEAD' => ['required','max:25'],
                'TEXT' => ['required','max:500'],
                'TOUBAN1' => ['required','max:4','min:4'],
                'TOUBAN2' => ['required','max:4','min:4'],
                'TOUBAN3' => ['required','max:4','min:4'],
                'TOUBAN4' => ['required','max:4','min:4'],
            ],
            'message' => [
            ],
        ];
    }

}