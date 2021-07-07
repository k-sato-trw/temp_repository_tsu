<?php

namespace App\Services\ExportHtml;

use App\Repositories\TbBoatSyussou\TbBoatSyussouRepositoryInterface;
use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\ChushiJunen\ChushiJunenRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;
use App\Repositories\TbBoatsMotorzenken\TbBoatsMotorzenkenRepositoryInterface;
use App\Repositories\Holding\HoldingRepositoryInterface;
use App\Repositories\TbMotorList\TbMotorListRepositoryInterface;
use App\Services\KyogiCommonService;

class ExportMotorService
{
    public $TbBoatSyussou;
    public $KaisaiMaster;
    public $ChushiJunen;
    public $TbBoatRaceheader;
    public $TbBoatsMotorzenken;
    public $Holding;
    public $TbMotorList;
    public $KyogiCommon;

    public function __construct(
        TbBoatSyussouRepositoryInterface $TbBoatSyussou,
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        ChushiJunenRepositoryInterface $ChushiJunen,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader,
        TbBoatsMotorzenkenRepositoryInterface $TbBoatsMotorzenken,
        HoldingRepositoryInterface $Holding,
        TbMotorListRepositoryInterface $TbMotorList,
        KyogiCommonService $KyogiCommon
    ){
        $this->TbBoatSyussou = $TbBoatSyussou;
        $this->KaisaiMaster = $KaisaiMaster;
        $this->ChushiJunen = $ChushiJunen;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
        $this->TbBoatsMotorzenken = $TbBoatsMotorzenken;
        $this->Holding = $Holding;
        $this->TbMotorList = $TbMotorList;
        $this->KyogiCommon = $KyogiCommon;
    }


    public function motor($request){
        $data = [];

        $sort = 1;
        $jyo = config('const.JYO_CODE');

        $target_date = date('Ymd');
        //$target_date = "20210304";

        $tomorrow_date = date('Ymd', strtotime('+1 day', strtotime($target_date)));

        $data['target_date'] = $target_date;
        $data['jyo'] = $jyo;

        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo, $target_date);
        $data['kaisai_master'] = $kaisai_master;

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo, $target_date);
        $data['chushi_junen'] = $chushi_junen; 

        {
            //モーター交換日を算出
            //カウント0の日付がモーター交換日
            $motor_change_count = $this->TbBoatsMotorzenken->getMotorChangeCount($target_date);

            $motor_change_day = false;
            foreach ($motor_change_count as $item) {
                if ($item->count == 0) {
                    $motor_change_day = $item->TARGET_STARTDATE;
                    break;
                }
            }

            $motor_change_race = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo, $motor_change_day);;
        }
        
        {
            //最新レース日算出
            $latest_race = false;

            //開催中か
            if ($kaisai_master) {
                $latest_race = $kaisai_master;
            } else {
                //明日開催予定でモーター前検にデータがあるか
                $tomorrow_zenken = $this->TbBoatsMotorzenken->getFirstRecordForNews($tomorrow_date);

                if ($tomorrow_zenken) {
                    $latest_race = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo, $tomorrow_date);;
                } else {
                    //直近で終了したレースか
                    $latest_race = $this->KaisaiMaster->getEndRecordByDate($jyo, $target_date);
                }
            }
        }
        
        {
            //最後のレース算出(最新の一つ前)
            $before_race = $this->KaisaiMaster->getEndRecordByDate($jyo, $latest_race->開始日付);
        }
        
        {
            //最新のレースの開催日を基準にモーターリスト作成
            $motor_list = $this->TbBoatsMotorzenken->getMotorList($latest_race->開始日付, $sort);
            $motor_list_array = [];
            //同率順位処理
            $true_rank = 1;
            $display_rank = 1;
            $temp_data = 0;
            foreach ($motor_list as $item) {
                
                $row = [];
                if (in_array($sort, [1, 2, 3, 5])) {
                    if ($sort == 1) {
                        $hikaku_target = $item->MOTOR_NIRENRITU;
                    } elseif ($sort == 2) {
                        $hikaku_target = $item->YUSHUTU_CNT;
                    } elseif ($sort == 3) {
                        $hikaku_target = $item->YUSHO_CNT;
                    } elseif ($sort == 5) {
                        $hikaku_target = $item->ZENKEN_TIME;
                    }

                    if ($temp_data != $hikaku_target) {
                        $display_rank = $true_rank;
                        $temp_data = $hikaku_target;
                    }
                }

                $row['rank'] = $display_rank;
                $row['record'] = $item; 
                
                { //モーターNOに基づいて3節前までの使用履歴を算出

                    $motor_rireki_array = $this->TbBoatSyussou->getMotorRirekiJoinKekka($latest_race->開始日付, $jyo, $item->MOTOR_NO, $motor_change_day);

                    //節間判定用レースタイトル
                    $race_title = $motor_rireki_array[0]->RACE_TITLE ?? "";
                    $motor_rireki_3 = [];
                    $motor_end_date = $motor_rireki_array[0]->TARGET_DATE ?? "";
                    //文字列にする
                    $race_rireki_n = "";
                    $rireki_count = 1;
                    $setsukan_end = false;
                    $rireki_array_end = false;

                    foreach($motor_rireki_array as $key => $motor_rireki_row){


                        //配列格納ではなく、この段階で文字列作成まで進める
                        if ($motor_rireki_row->RACE_SYUBETU_CODE == '06' || $motor_rireki_row->RACE_SYUBETU_CODE == '92') {
                            //優勝
                            $race_rireki_n = $this->KyogiCommon->yusho_tyakujun_to_image($motor_rireki_row->TYAKUJUN) . $race_rireki_n;
                        } elseif ($motor_rireki_row->RACE_SYUBETU_CODE == '05') {
                            //準優勝
                            $race_rireki_n = $this->KyogiCommon->junyu_tyakujun_to_image($motor_rireki_row->TYAKUJUN) . $race_rireki_n;
                        } else {
                            $race_rireki_n = $motor_rireki_row->TYAKUJUN . $race_rireki_n;
                        }

                        //次があるか、あった場合同じタイトルかのフラグチェック
                        if (isset($motor_rireki_array[$key + 1])) {
                            if ($race_title != $motor_rireki_array[$key + 1]->RACE_TITLE) {
                                $setsukan_end = true;
                                $rireki_array_end = false;
                            } else {
                                $setsukan_end = false;
                                $rireki_array_end = false;
                            }
                        } else {
                            $setsukan_end = true;
                            $rireki_array_end = true;
                        }


                        if ($setsukan_end) {
                            //節間が変わった場合、終了処理


                            //履歴が1以上の場合は、$motor_rireki_3に$race_rireki_nを格納
                            if ($rireki_count >= 1) {
                                //名前、級、レース配列
                                $motor_rireki_3[$rireki_count]['sensyu_name'] = str_replace('　', '', $motor_rireki_row->SENSYU_NAME);
                                $motor_rireki_3[$rireki_count]['kyu_betu'] = $motor_rireki_row->KYU_BETU;
                                $motor_rireki_3[$rireki_count]['tyakujun'] = $race_rireki_n;

                                $motor_rireki_3[$rireki_count]['grade'] = $motor_rireki_row->GRADE_CODE;
                                $motor_rireki_3[$rireki_count]['start_date'] = $motor_rireki_row->TARGET_DATE;
                                $motor_rireki_3[$rireki_count]['end_date'] = $motor_end_date;

                            }

                            //履歴がすでに3ある場合、と配列が最終列の場合は終了
                            if ($rireki_count >= 3 || $rireki_array_end) {
                                break;
                            }

                            //次の節間の設定
                            $rireki_count++;

                            $motor_end_date = $motor_rireki_array[$key + 1]->TARGET_DATE;
                            $race_title = $motor_rireki_array[$key + 1]->RACE_TITLE;
                            $race_rireki_n = "";
                        }
                    }

                    $row['motor_rireki_3'] = $motor_rireki_3;
                }

                $syussou_count_array = $this->TbBoatSyussou->getMotorSyussouCount($motor_change_day,$latest_race->開始日付,$jyo,$item->BOAT_NO);
                $row['syussou_count'] = count($syussou_count_array);

                $motor_list_array[] = $row;

                $true_rank++;
            }
            $data['motor_list_array'] = $motor_list_array;
        }

        $data['motor_change_race'] = $motor_change_race;
        $data['latest_race'] = $latest_race;
        $data['before_race'] = $before_race;
        //$data['motor_list'] = $motor_list;
        $data['sort'] = $sort;


        //◆◆◆◆ボート系処理
        { 
            //ボート基準日取得
            //カウント0の日付がモーター交換日
            $boat_change_count = $this->TbBoatsMotorzenken->getBoatChangeCount($target_date);

            $boat_change_day = false;
            foreach ($boat_change_count as $item) {
                if ($item->count == 0) {
                    $boat_change_day = $item->TARGET_STARTDATE;
                    break;
                }
            }

            $boat_change_race = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo, $boat_change_day);;
        }

        {
            //最新レース日算出
            $latest_race = false;

            //開催中か
            if ($kaisai_master) {
                $latest_race = $kaisai_master;
            } else {
                //明日開催予定でモーター前検にデータがあるか
                $tomorrow_zenken = $this->TbBoatsMotorzenken->getFirstRecordForNews($tomorrow_date);

                if ($tomorrow_zenken) {
                    $latest_race = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo, $tomorrow_date);;
                } else {
                    //直近で終了したレースか
                    $latest_race = $this->KaisaiMaster->getEndRecordByDate($jyo, $target_date);
                }
            }
        }

        {
            //最後のレース算出(最新の一つ前)
            $before_race = $this->KaisaiMaster->getEndRecordByDate($jyo, $latest_race->開始日付);
        }

        {
            //最新のレースの開催日を基準にモーターリスト作成
            $boat_list = $this->TbBoatsMotorzenken->getBoatList($boat_change_day,$latest_race->開始日付);

            //ユニークに変換
            $boat_no_list = [];
            $boat_list_unique = [];
            foreach($boat_list as $item){
                if(!in_array($item->BOAT_NO,$boat_no_list)){
                    $boat_no_list[] = $item->BOAT_NO;
                    $boat_list_unique[str_pad(($item->BOAT_NIRENRITU * 10), 4, 0, STR_PAD_LEFT)."_".$item->BOAT_NO] = $item;
                }
            }

            //2連立降順に並び替え
            krsort($boat_list_unique);
            $boat_no_nirenritu_list = [];
            foreach($boat_list_unique as $item){
                $boat_no_nirenritu_list[$item->BOAT_NO] = $item->BOAT_NIRENRITU;
            }

            
            $boat_no_syussou = [];
            $temp_data = 0;
            $true_rank = 1;
            $display_rank = 1;
            foreach($boat_no_nirenritu_list as $boat_no => $boat_nirenritu){
                
                //ランキング同率処理
                if ($temp_data != $boat_nirenritu) {
                    $display_rank = $true_rank;
                    $temp_data = $boat_nirenritu;
                }
                $boat_no_syussou[$boat_no]['rank'] = $display_rank;
                $true_rank++;



                $syussou_count_array = $this->TbBoatSyussou->getBoatSyussouCount($boat_change_day,$latest_race->開始日付,$jyo,$boat_no);

                $boat_yusyutu_count = 0; //優出のカウント
                $boat_yusyo_count = 0; //優勝のカウント
                $boat_syussou_count = 0; //出走回数のカウント

                //直近レースデータとして、記録用
                $boat_zenkai_grade = "";
                $boat_zenkai_start_date = "";
                $boat_zenkai_end_date = "";
                $boat_zenkai_name = "";
                $boat_zenkai_kyu = "";
                $boat_zenkai_tyakujun = "";
                $boat_zenkai_race_title = "";


                foreach($syussou_count_array as $syussou_count_row){
                    
                    if($boat_zenkai_race_title != $syussou_count_row->RACE_TITLE){
                        //記録タイトルが異なった場合、別レース扱いとして、直近データを更新
                        
                        $boat_zenkai_race_title = $syussou_count_row->RACE_TITLE;
                        $boat_zenkai_grade = $syussou_count_row->GRADE_CODE;
                        $boat_zenkai_start_date = $syussou_count_row->TARGET_DATE;
                        $boat_zenkai_end_date = $syussou_count_row->TARGET_DATE;
                        $boat_zenkai_name = $syussou_count_row->SENSYU_NAME;
                        $boat_zenkai_kyu = $syussou_count_row->KYU_BETU;
                        $boat_zenkai_tyakujun = ""; //リセット

                    }

                    //直近レースデータは常に更新
                    $boat_zenkai_end_date = $syussou_count_row->TARGET_DATE;

                    //優勝系の場合、画像変換処理
                    if($syussou_count_row->RACE_SYUBETU_CODE == '06' || $syussou_count_row->RACE_SYUBETU_CODE == '92'){
                        //優勝
                        $boat_zenkai_tyakujun .= $this->KyogiCommon->yusho_tyakujun_to_image($syussou_count_row->TYAKUJUN);
                        $boat_yusyutu_count++;

                        if($syussou_count_row->TYAKUJUN == '1'){
                            $boat_yusyo_count++;
                        }

                    }elseif($syussou_count_row->RACE_SYUBETU_CODE == '05') {
                        //準優勝
                        $boat_zenkai_tyakujun .= $this->KyogiCommon->junyu_tyakujun_to_image($syussou_count_row->TYAKUJUN);

                    }else{

                        $boat_zenkai_tyakujun .= $syussou_count_row->TYAKUJUN;
                    }

                    $boat_syussou_count++;

                    
                }

                $boat_no_syussou[$boat_no]['boat_yusyutu_count'] = $boat_yusyutu_count;
                $boat_no_syussou[$boat_no]['boat_yusyo_count'] = $boat_yusyo_count;
                $boat_no_syussou[$boat_no]['boat_syussou_count'] = $boat_syussou_count;

                $boat_no_syussou[$boat_no]['boat_zenkai_grade'] = $boat_zenkai_grade;
                $boat_no_syussou[$boat_no]['boat_zenkai_start_date'] = $boat_zenkai_start_date;
                $boat_no_syussou[$boat_no]['boat_zenkai_end_date'] = $boat_zenkai_end_date;
                $boat_no_syussou[$boat_no]['boat_zenkai_name'] = str_replace("　","",$boat_zenkai_name);
                $boat_no_syussou[$boat_no]['boat_zenkai_kyu'] = $boat_zenkai_kyu;
                $boat_no_syussou[$boat_no]['boat_zenkai_tyakujun'] = $boat_zenkai_tyakujun;
                $boat_no_syussou[$boat_no]['boat_zenkai_race_title'] = $boat_zenkai_race_title;
                $boat_no_syussou[$boat_no]['boat_nirenritu'] = $boat_nirenritu;

            }

            $data['boat_no_syussou'] = $boat_no_syussou;

        }
        
        $data['boat_change_day'] = $boat_change_day;

        return $data;
    }

}