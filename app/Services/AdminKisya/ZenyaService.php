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
use App\Services\KyogiCommonService;

class ZenyaService
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

            $yoso_tenji = $this->TbTsuYosoTenji->getFirstRecordByDate($target_date,$race_num);
            $data['yoso_tenji'] = $yoso_tenji;

            //開催日リストを元にSTランキングデータ作成
            $st_ranking = [];
            foreach($kaisai_date_list as $item){
                for($race_num_count=1;$race_num_count<=12;$race_num_count++){
                    $top_st = $this->TbBoatKekka->getTopSt($jyo,$item,$race_num_count);
                    if($top_st){
                        $st_ranking[$item][$race_num_count] = $top_st->START_TIMING;
                    }else{
                        $st_ranking[$item][$race_num_count] = "";
                    }
                }
            }
            $data['st_ranking'] = $st_ranking;
            
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
            $post_result = $this->TbTsuYoso->upsertRecord($request);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin_kisya/zenya?yd='.$request->input('TARGET_DATE')."&racenum=".$request->input('RACE_NUM');
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    public function change_appear_flg_all($request){
        $post_result = $this->TbTsuYoso->changeAppearFlgAll($request);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin_kisya/zenya/?yd='.$request->input('TARGET_DATE')."&racenum=".$request->input('RACE_NUM');
        if($post_result){
            $data['redirect_message'] = 'データを更新しました';
        }else{
            $data['redirect_message'] = 'データの更新に失敗しました';
        }

        return $data;
    }

    public function change_appear_flg($request){
        $post_result = $this->TbTsuYoso->changeAppearFlg($request);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin_kisya/zenya/?yd='.$request->input('TARGET_DATE')."&racenum=".$request->input('RACE_NUM');
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
                'ENTRY' => ['required','max:7','min:7'],
                'MEMO' => ['required','max:100',],
                'CONFIDENCE' => [],
                'PUSHING_FLG' => [],
                'APPEAR_FLG' => [],
            ],
            'message' => [
            ],
        ];
    }

}