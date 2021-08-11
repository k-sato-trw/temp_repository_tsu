<?php

namespace App\Services\AdminKisya;

use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\TbBoatSyussou\TbBoatSyussouRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;
use App\Repositories\TbBoatsSensyusyussou2\TbBoatsSensyusyussou2RepositoryInterface;
use App\Repositories\TbBoatsMotorzenken\TbBoatsMotorzenkenRepositoryInterface;
use App\Repositories\TbBoatKekka\TbBoatKekkaRepositoryInterface;
use App\Repositories\TbTsuYoso\TbTsuYosoRepositoryInterface;
use App\Repositories\TbTsuYosoTenji\TbTsuYosoTenjiRepositoryInterface;
use App\Repositories\TbTsuYosoAshi\TbTsuYosoAshiRepositoryInterface;
use App\Repositories\FanData\FanDataRepositoryInterface;
use App\Repositories\TbBoatTyokuzen\TbBoatTyokuzenRepositoryInterface;
use App\Services\KyogiCommonService;

class TenjiService
{
    public $KaisaiMaster;
    public $TbBoatSyussou;
    public $TbBoatRaceheader;
    public $TbBoatsSensyusyussou2;
    public $TbBoatsMotorzenken;
    public $TbBoatKekka;
    public $TbTsuYoso;
    public $TbTsuYosoTenji;
    public $TbTsuYosoAshi;
    public $FanData;
    public $TbBoatTyokuzen;
    public $KyogiCommon;

    public function __construct(
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        TbBoatSyussouRepositoryInterface $TbBoatSyussou,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader,
        TbBoatsSensyusyussou2RepositoryInterface $TbBoatsSensyusyussou2,
        TbBoatsMotorzenkenRepositoryInterface $TbBoatsMotorzenken,
        TbBoatKekkaRepositoryInterface $TbBoatKekka,
        TbTsuYosoRepositoryInterface $TbTsuYoso,
        TbTsuYosoTenjiRepositoryInterface $TbTsuYosoTenji,
        TbTsuYosoAshiRepositoryInterface $TbTsuYosoAshi,
        FanDataRepositoryInterface $FanData,
        TbBoatTyokuzenRepositoryInterface $TbBoatTyokuzen,
        KyogiCommonService $KyogiCommon
    ){
        $this->KaisaiMaster = $KaisaiMaster;
        $this->TbBoatSyussou = $TbBoatSyussou;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
        $this->TbBoatsSensyusyussou2 = $TbBoatsSensyusyussou2;
        $this->TbBoatsMotorzenken = $TbBoatsMotorzenken;
        $this->TbBoatKekka = $TbBoatKekka;
        $this->TbTsuYoso = $TbTsuYoso;
        $this->TbTsuYosoTenji = $TbTsuYosoTenji;
        $this->TbTsuYosoAshi = $TbTsuYosoAshi;
        $this->FanData = $FanData;
        $this->TbBoatTyokuzen = $TbBoatTyokuzen;
        $this->KyogiCommon = $KyogiCommon;
    }


    public function index($request){
        $data = [];

        $today_date = $request->input('yd') ?? false;
        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $zenken_flg = false;

        $race_num = $request->input('racenum') ?? 1;
        $data['race_num'] = $race_num;

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

        $yoso = $this->TbTsuYoso->getFirstRecordByPK($target_date,$race_num);
        $data['yoso'] = $yoso;
        $yoso_tenji = $this->TbTsuYosoTenji->getFirstRecordByPK($target_date,$race_num);
        $data['yoso_tenji'] = $yoso_tenji;

        $data['target_date'] = $target_date;
        $data['kaisai_master'] = $kaisai_master;
        $data['race_header'] = $race_header;
        $data['kaisai_date_list'] = $kaisai_date_list;
        $data['appear_flg'] = $yoso->APPEAR_FLG ?? false;


        {
            //画面表示用の処理
            $syussou = $this->KyogiCommon->create_syussou_array($jyo,$target_date,$race_num);    
            $data['syussou'] = $syussou;

            $yoso_ashi_array = [];
            foreach($syussou as $teiban => $item){
                //最新の出足データを１件引き抜く
                $yoso_ashi = $this->TbTsuYosoAshi->getLatestRecordByTouban($item->TOUBAN,$kaisai_master->開始日付,$target_date);
                $yoso_ashi_array[$teiban] = $yoso_ashi;

            }
            $data['yoso_ashi_array'] = $yoso_ashi_array;

            //スリット処理            
            $tyokuzen = $this->TbBoatTyokuzen->getRecordByPK($jyo, $target_date, $race_num);
            $tyokuzen_array = [];
            foreach($tyokuzen as $item){
                $tyokuzen_array[$item->TEIBAN]['record'] = $item;

                $right_margin = 22;
                $st_timing = (double)$item->ST_TIMING;

                if($item->ST_JICO_CD == 'F'){
                    //フライング
                    if($st_timing >= 0.11){
                        $right_margin = 0;
                    }else{
                        $right_margin = $right_margin - $st_timing * 100 * 2;
                    }
                }elseif($item->ST_JICO_CD == 'L'){
                    //出遅れ何もしない
                    $right_margin = 128;
                }else{
                    if($st_timing >= 0.00 && $st_timing <= 0.30){
                        $right_margin = $right_margin + $st_timing * 100 * 2;

                    }elseif($st_timing >= 0.31 && $st_timing <= 0.70){
                        $right_margin = $right_margin + (0.30 * 100 * 2) + (($st_timing - 0.30 ) * 100);
                    
                    }elseif($st_timing >= 0.71 ){
                        $right_margin = 122;
                    }
                }

                $tyokuzen_array[$item->TEIBAN]['right_margin'] = $right_margin;

                //部品交換情報を成形
                $buhin = "";
                for($i=1;$i<=8;$i++){
                    $prop_buhin = "BUHIN".$i;
                    $prop_buhin_kosuu = "BUHIN_KOSUU".$i;
                    if($item->$prop_buhin){
                        if($buhin){
                            $buhin .= "、".$item->$prop_buhin.'×'.((int)$item->$prop_buhin_kosuu);
                        }else{
                            $buhin .= $item->$prop_buhin.'×'.((int)$item->$prop_buhin_kosuu);
                        }
                    }
                }
                $tyokuzen_array[$item->TEIBAN]['buhin'] = $buhin;

                //今節平均STを算出
                $avg = $this->TbBoatKekka->getStAvg($item->TOUBAN,$jyo,$kaisai_master->開始日付,$target_date);
                $tyokuzen_array[$item->TEIBAN]['st_avg'] = $avg->avg;
            }

            $data['tyokuzen_array'] = $tyokuzen_array;

            
            
        }

        $push = $this->TbTsuYoso->getPushing($target_date);
        $data['push'] = $push;
        
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
            $post_result = $this->TbTsuYosoTenji->upsertRecord($request);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin_kisya/tenji?yd='.$request->input('TARGET_DATE')."&racenum=".$request->input('RACE_NUM');
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    public function change_appear_flg_all($request){
        $post_result = $this->TbTsuYosoTenji->changeAppearFlgAll($request);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin_kisya/tenji/?yd='.$request->input('TARGET_DATE')."&racenum=".$request->input('RACE_NUM');
        if($post_result){
            $data['redirect_message'] = 'データを更新しました';
        }else{
            $data['redirect_message'] = 'データの更新に失敗しました';
        }

        return $data;
    }

    public function change_appear_flg($request){
        $post_result = $this->TbTsuYosoTenji->changeAppearFlg($request);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin_kisya/tenji/?yd='.$request->input('TARGET_DATE')."&racenum=".$request->input('RACE_NUM');
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
                'RACE_NUM' => ['required'],
                'EVALUATION1' => [],
                'EVALUATION2' => [],
                'EVALUATION3' => [],
                'EVALUATION4' => [],
                'EVALUATION5' => [],
                'EVALUATION6' => [],
                'COMMENT' => ['required','max:100'],
                'FAVOLITE111' => [],
                'FAVOLITE112' => [],
                'FAVOLITE113' => [],
                'FAVOLITE121' => [],
                'FAVOLITE122' => [],
                'FAVOLITE123' => [],
                'FAVOLITE131' => [],
                'FAVOLITE132' => [],
                'FAVOLITE133' => [],
                'FAVOLITE211' => [],
                'FAVOLITE212' => [],
                'FAVOLITE213' => [],
                'FAVOLITE221' => [],
                'FAVOLITE222' => [],
                'FAVOLITE223' => [],
                'FAVOLITE231' => [],
                'FAVOLITE232' => [],
                'FAVOLITE233' => [],
                'FAVOLITE_MARK11' => [],
                'FAVOLITE_MARK12' => [],
                'FAVOLITE_MARK21' => [],
                'FAVOLITE_MARK22' => [],
                'RICH111' => [],
                'RICH112' => [],
                'RICH113' => [],
                'RICH121' => [],
                'RICH122' => [],
                'RICH123' => [],
                'RICH131' => [],
                'RICH132' => [],
                'RICH133' => [],
                'RICH211' => [],
                'RICH212' => [],
                'RICH213' => [],
                'RICH221' => [],
                'RICH222' => [],
                'RICH223' => [],
                'RICH231' => [],
                'RICH232' => [],
                'RICH233' => [],
                'RICH_MARK11' => [],
                'RICH_MARK12' => [],
                'RICH_MARK21' => [],
                'RICH_MARK22' => [],
                'APPEAR_FLG' => [],
            ],
            'message' => [
            ],
        ];
    }

}