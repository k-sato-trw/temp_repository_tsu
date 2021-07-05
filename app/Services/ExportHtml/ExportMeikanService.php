<?php

namespace App\Services\ExportHtml;

use App\Repositories\AssenSchedule\AssenScheduleRepositoryInterface;
use App\Repositories\FanData\FanDataRepositoryInterface;

use App\Repositories\TbBoatKibetu\TbBoatKibetuRepositoryInterface;
use App\Repositories\TbBoatsSensyupast3\TbBoatsSensyupast3RepositoryInterface;
use App\Repositories\TbBoatSyussou\TbBoatSyussouRepositoryInterface;
use App\Repositories\TbBoatKekka\TbBoatKekkaRepositoryInterface;
use App\Repositories\TbBoatsYusyoracer\TbBoatsYusyoracerRepositoryInterface;
use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\TbHeiwajimaSensyuData\TbHeiwajimaSensyuDataRepositoryInterface;
use App\Repositories\TbBoatsSensyusyussou2\TbBoatsSensyusyussou2RepositoryInterface;
use App\Repositories\TbMikuniAssen\TbMikuniAssenRepositoryInterface;
use App\Services\GeneralService;

class ExportMeikanService
{
    public $AssenSchedule;
    public $FanData;

    public $TbBoatKibetu;
    public $TbBoatsSensyupast3;
    public $TbBoatSyussou;
    public $TbBoatKekka;
    public $TbBoatsYusyoracer;
    public $KaisaiMaster;
    public $TbHeiwajimaSensyuData;
    public $TbBoatsSensyusyussou2;
    public $TbMikuniAssen;
    public $General;

    public function __construct(
        AssenScheduleRepositoryInterface $AssenSchedule,
        FanDataRepositoryInterface $FanData,

        TbBoatKibetuRepositoryInterface $TbBoatKibetu,
        TbBoatsSensyupast3RepositoryInterface $TbBoatsSensyupast3,
        TbBoatSyussouRepositoryInterface $TbBoatSyussou,
        TbBoatKekkaRepositoryInterface $TbBoatKekka,
        TbBoatsYusyoracerRepositoryInterface $TbBoatsYusyoracer,
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        TbHeiwajimaSensyuDataRepositoryInterface $TbHeiwajimaSensyuData,
        TbBoatsSensyusyussou2RepositoryInterface $TbBoatsSensyusyussou2,
        TbMikuniAssenRepositoryInterface $TbMikuniAssen,
        GeneralService $GeneralService
    ){
        $this->AssenSchedule = $AssenSchedule;
        $this->FanData = $FanData;

        $this->TbBoatKibetu = $TbBoatKibetu;
        $this->TbBoatsSensyupast3 = $TbBoatsSensyupast3;
        $this->TbBoatSyussou = $TbBoatSyussou;
        $this->TbBoatKekka = $TbBoatKekka;
        $this->TbBoatsYusyoracer = $TbBoatsYusyoracer;
        $this->KaisaiMaster = $KaisaiMaster;
        $this->TbHeiwajimaSensyuData = $TbHeiwajimaSensyuData;
        $this->TbBoatsSensyusyussou2 = $TbBoatsSensyusyussou2;
        $this->TbMikuniAssen = $TbMikuniAssen;
        $this->General = $GeneralService;
    }


    public function index($request){

        $target_date = date('Ymd');
        $data['target_date'] = $target_date;

        $assen = $this->AssenSchedule->getAllRecord();

        $touban_list = [];
        foreach($assen as $item){
            $touban_list[] = $item->登録番号;
        }

        $fan_data = $this->FanData->getRecordByToubanList($touban_list);

        $fan_data_array = [];
        $kyu_count = [];
        $kyu_count['A1'] = 0;
        $kyu_count['A2'] = 0;
        $kyu_count['B1'] = 0;
        $kyu_count['B2'] = 0;

        $touban_count = [];
        $touban_count['N1'] = 0;
        $touban_count['N2'] = 0;
        $touban_count['N3'] = 0;
        $touban_count['N4'] = 0;
        $lady_count = 0;
        $kibetu_nen = "";
        $kibetu_ki = "";
        foreach($fan_data as $item){
            $fan_data_array[$item->Touban] = $item;

            //級カウント
            if($item->Kyu == "A1"){
                $kyu_count['A1']++;
            }elseif($item->Kyu == "A2"){
                $kyu_count['A2']++;
            }elseif($item->Kyu == "B1"){
                $kyu_count['B1']++;
            }elseif($item->Kyu == "B2"){
                $kyu_count['B2']++;
            }


            //登番カウント
            if($item->Touban <= 4000){
                $fan_data_array[$item->Touban]->touban_count = "N1";
                $touban_count['N1']++;
            }elseif($item->Touban <= 4500){
                $fan_data_array[$item->Touban]->touban_count = "N2";
                $touban_count['N2']++;
            }elseif($item->Touban <= 5500){
                $fan_data_array[$item->Touban]->touban_count = "N3";
                $touban_count['N3']++;
            }else{
                $fan_data_array[$item->Touban]->touban_count = "N4";
                $touban_count['N4']++;
            }

            //女性カウント
            if($item->Sei == 2){
                $lady_count++;
            }


            if(!$kibetu_nen || $kibetu_nen <= $item->Nen){
                $kibetu_nen = $item->Nen;
            }

            if(!$kibetu_ki || $kibetu_ki <= $item->Ki){
                $kibetu_ki = $item->Ki;
            }

        }

        //期別表示作成
        if($kibetu_ki == 1){
            $kibetu_display = $kibetu_nen."前期";
        }else{
            $kibetu_display = $kibetu_nen."後期";
        }

        $data['assen'] = $assen;
        $data['fan_data_array'] = $fan_data_array;
        $data['kibetu_nen'] = $kibetu_nen;
        $data['kibetu_ki'] = $kibetu_ki;
        $data['kibetu_display'] = $kibetu_display;
        $data['kyu_count'] = $kyu_count;
        $data['touban_count'] = $touban_count;
        $data['lady_count'] = $lady_count;


        return $data;
    }

    public function racer_data_create($request){
        
        $touban = $request->input('touban');

        $data = [];

        $kibetu = $this->TbBoatKibetu->getFirstRecordByPK($touban);
        $fandata = $this->FanData->getFirstRecordByTouban($touban);
        $past3 = $this->TbBoatsSensyupast3->getfirstRecordByTouban($touban);

        //一行のレコードを3節分のデータに成形
        $past3_result = [];

        $yusho_list = [];
        $junyusho_list = [];
        $other_list = [];
        for ($i = 1; $i < 4; $i++) {
            $row = [];
            $prop_name = 'START_DATE' . $i;
            $row['START_DATE'] = $past3->$prop_name;
            $prop_name = 'END_DATE' . $i;
            $row['END_DATE'] = $past3->$prop_name;
            $prop_name = 'JYO' . $i;
            $row['JYO'] = $past3->$prop_name;
            $prop_name = 'GRADE_CODE' . $i;
            $row['GRADE_CODE'] = $past3->$prop_name;

            $row['display_date'] = $this->General->create_display_date($row['START_DATE'], $row['END_DATE']);

            $boat_syussou_yusho = $this->TbBoatSyussou->getYushoRecordForProfile($row['JYO'], $row['START_DATE'], $row['END_DATE']);
            //優勝、準優勝を[TARGET_DATE][RACE_NUMBER]で格納
            foreach ($boat_syussou_yusho as $item) {
                if ($item->RACE_SYUBETU_CODE == "05") {
                    $junyusho_list[$item->TARGET_DATE][$item->RACE_NUMBER] = $item;
                } elseif ($item->RACE_SYUBETU_CODE == "06") {
                    $yusho_list[$item->TARGET_DATE][$item->RACE_NUMBER] = $item;
                } else {
                    $other_list[$item->TARGET_DATE][$item->RACE_NUMBER] = $item;
                }
            }

            //該当レース成績
            $boat_syussou = $this->TbBoatSyussou->getFirstRecordForProfile($touban, $row['JYO'], $row['START_DATE'], $row['END_DATE']);

            if ($boat_syussou) {
                //$boat_syussou = (array)$boat_syussou;var_dump($boat_syussou);
                $column_num = [11, 12, 21, 22, 31, 32, 41, 42, 51, 52, 61, 62, 71, 72, 81, 82, 91, 92];
                $seiseki = [];
                foreach ($column_num as $num) {
                    if ($boat_syussou['KONSETU' . $num . '_DATE']) {

                        $prop_name = 'KONSETU' . $num . '_DATE';
                        $seiseki['DATE'] = $boat_syussou->$prop_name;

                        $prop_name = 'KONSETU' . $num . '_RACENUMBER';
                        $seiseki['RACENUMBER'] =  $boat_syussou->$prop_name;

                        $prop_name = 'KONSETU' . $num . '_TYAKUJUN';
                        if (isset($yusho_list[$seiseki['DATE']][$seiseki['RACENUMBER']]) || isset($other_list[$seiseki['DATE']][$seiseki['RACENUMBER']])) {
                            $seiseki['TYAKUJUN'] =  '<span class="Y">' . $boat_syussou->$prop_name . '</span>';
                        } elseif (isset($junyusho_list[$seiseki['DATE']][$seiseki['RACENUMBER']])) {
                            $seiseki['TYAKUJUN'] =  '<span class="J">' . $boat_syussou->$prop_name . '</span>';
                        } else {
                            $seiseki['TYAKUJUN'] =  $boat_syussou->$prop_name;
                        }
                        $row['seiseki'][] = $seiseki;
                    }
                }


                //一節の最終レース結果のみ別DBから取得
                $boat_kekka = $this->TbBoatKekka->getFirstRecordForProfile($touban, $row['JYO'], $row['START_DATE'], $row['END_DATE']);
                if ($boat_kekka) {
                    $seiseki = [];
                    $seiseki['DATE'] = $boat_kekka->TARGET_DATE;
                    $seiseki['RACENUMBER'] =  $boat_kekka->RACE_NUMBER;

                    if (isset($yusho_list[$seiseki['DATE']][$seiseki['RACENUMBER']]) || isset($other_list[$seiseki['DATE']][$seiseki['RACENUMBER']])) {
                        $seiseki['TYAKUJUN'] =  '<span class="Y">' . $boat_kekka->TYAKUJUN . '</span>';
                    } elseif (isset($junyusho_list[$seiseki['DATE']][$seiseki['RACENUMBER']])) {
                        $seiseki['TYAKUJUN'] =  '<span class="J">' . $boat_kekka->TYAKUJUN . '</span>';
                    } else {
                        $seiseki['TYAKUJUN'] =  $boat_kekka->TYAKUJUN;
                    }

                    $row['seiseki'][] = $seiseki;
                }


            } else {
                $row['seiseki'] = [];
            }


            $past3_result[] = $row;
        }

        { //直近優勝処理
            $chokkin_yusyo_racer = $this->TbBoatsYusyoracer->getfirstRecordByTouban($touban);

            $row = [];

            if ($chokkin_yusyo_racer) {

                $row['JYO'] = $chokkin_yusyo_racer->JYO;
                $row['GRADE_CODE'] = $chokkin_yusyo_racer->GRADE_CODE;
                $row['seiseki'] = [];

                $chokkin_kaisai_master = $this->KaisaiMaster->getFirstRecordForProfile($chokkin_yusyo_racer->JYO, $chokkin_yusyo_racer->TARGET_DATE);

                if ($chokkin_kaisai_master) {
                    //$chokkin_kaisai_master = $chokkin_kaisai_master[0];

                    $row['START_DATE'] = $chokkin_kaisai_master->開始日付;
                    $row['END_DATE'] = $chokkin_kaisai_master->終了日付;

                    $row['display_date'] = $this->General->create_display_date($row['START_DATE'], $row['END_DATE']);

                }

                $chokkin_boat_syussou_yusho = $this->TbBoatSyussou->getYushoRecordForProfile(
                    $chokkin_yusyo_racer->JYO,
                    $chokkin_kaisai_master->開始日付,
                    $chokkin_kaisai_master->終了日付,
                    $touban
                );

                $chokkin_yusho_list = [];
                $chokkin_junyusho_list = [];
                $chokkin_other_list = [];

                //優勝、準優勝を[TARGET_DATE][RACE_NUMBER]で格納
                foreach ($chokkin_boat_syussou_yusho as $item) {
                    if ($item->RACE_SYUBETU_CODE == "05") {
                        $chokkin_junyusho_list[$item->TARGET_DATE][$item->RACE_NUMBER] = $item;
                    } elseif ($item->RACE_SYUBETU_CODE == "06") {
                        $chokkin_yusho_list[$item->TARGET_DATE][$item->RACE_NUMBER] = $item;
                    } else {
                        $chokkin_other_list[$item->TARGET_DATE][$item->RACE_NUMBER] = $item;
                    }
                }

                //該当レース成績
                $chokkin_boat_syussou = $this->TbBoatSyussou->getFirstChokkinRecordForProfile($touban, $chokkin_yusyo_racer->JYO, $chokkin_yusyo_racer->TARGET_DATE);

                if ($chokkin_boat_syussou) {

                    $column_num = [11, 12, 21, 22, 31, 32, 41, 42, 51, 52, 61, 62, 71, 72, 81, 82, 91, 92];
                    $seiseki = [];
                    foreach ($column_num as $num) {
                        if ($chokkin_boat_syussou['KONSETU' . $num . '_DATE']) {

                            $prop_name = 'KONSETU' . $num . '_DATE';
                            $seiseki['DATE'] = $chokkin_boat_syussou->$prop_name;

                            $prop_name = 'KONSETU' . $num . '_RACENUMBER';
                            $seiseki['RACENUMBER'] =  $chokkin_boat_syussou->$prop_name;

                            $prop_name = 'KONSETU' . $num . '_TYAKUJUN';
                            if (isset($yusho_list[$seiseki['DATE']][$seiseki['RACENUMBER']]) || isset($other_list[$seiseki['DATE']][$seiseki['RACENUMBER']])) {
                                $seiseki['TYAKUJUN'] =  '<span class="Y">' . $chokkin_boat_syussou->$prop_name . '</span>';
                            } elseif (isset($junyusho_list[$seiseki['DATE']][$seiseki['RACENUMBER']])) {
                                $seiseki['TYAKUJUN'] =  '<span class="J">' . $chokkin_boat_syussou->$prop_name . '</span>';
                            } else {
                                $seiseki['TYAKUJUN'] =  $chokkin_boat_syussou->$prop_name;
                            }
                            $row['seiseki'][] = $seiseki;
                        }
                    }

                    $row['seiseki'][] = ['TYAKUJUN' => '<span class="Y">1</span>'];
                }
            } else { //優勝レーサーに無い場合

                $sensyu_data = $this->TbHeiwajimaSensyuData->getFirstRecordByPK($touban);
                if (isset($sensyu_data)) {
                    $row['JYO'] = $sensyu_data->LATEST_JYO;
                    $row['GRADE_CODE'] = $sensyu_data->LATEST_GRADE;
                    $row['START_DATE'] = $sensyu_data->LATEST_STARTDATE;
                    $row['END_DATE'] = $sensyu_data->LATEST_ENDDATE;
                    $row['seiseki'][] = ['TYAKUJUN' => $sensyu_data->LATEST_RECORD1];

                    $row['display_date'] = $this->General->create_display_date($row['START_DATE'], $row['END_DATE']);

                    if ($sensyu_data->LATEST_RECORD2) {
                        $row['seiseki'][] = ['TYAKUJUN' => '<span class="J">2</span>'];
                    }
                    if ($sensyu_data->LATEST_RECORD3) {
                        $row['seiseki'][] = ['TYAKUJUN' => '<span class="Y">1</span>'];
                    }
                }

            }
            $chokkin = $row;
        }

        {//あっせん

            $assen_result = [];
            //当日処理
            $now_date = date('Ymd');
            //$now_date = "20201007";
            $sensyusyussou2_today = $this->TbBoatsSensyusyussou2->getFirstTodayRecordForProfile($touban, $now_date);

            if ($sensyusyussou2_today) {
                $boat_syussou = $this->TbBoatSyussou->getFirstRecordForProfile(
                    $touban,
                    $sensyusyussou2_today->JYO,
                    $sensyusyussou2_today->TARGET_STARTDATE,
                    $sensyusyussou2_today->TARGET_ENDDATE
                );

                if ($boat_syussou) {
                    $row = [];
                    $row['JYO'] = $sensyusyussou2_today->JYO;
                    $row['START_DATE'] = $sensyusyussou2_today->TARGET_STARTDATE;
                    $row['END_DATE'] = $sensyusyussou2_today->TARGET_ENDDATE;
                    $row['RACE_TITLE'] = $sensyusyussou2_today->RACE_TITLE;
                    $assen_result[] = $row;
                }
            }


            //二日前まで検索
            $sensyusyussou2_before = $this->TbBoatsSensyusyussou2->getBeforeRecordForProfile($touban, $now_date);

            $strAssNewDate = "";

            foreach ($sensyusyussou2_before as $item) {

                if ($strAssNewDate) {
                    if ($strAssNewDate <> $item->TARGET_DATE) {
                        break;
                    }
                }
                //当日出走するレースがある場合重複してしまうので、同じ場の同じレースデータが入っていた場合はスキップ
                if ($assen_result[0]['JYO'] != $item->JYO || $assen_result[0]['START_DATE'] != $item->TARGET_STARTDATE) {
                    $row = [];
                    $row['JYO'] = $item->JYO;
                    $row['START_DATE'] = $item->TARGET_STARTDATE;
                    $row['END_DATE'] = $item->TARGET_ENDDATE;
                    $row['RACE_TITLE'] = $item->RACE_TITLE;
                    $assen_result[] = $row;

                    $strAssNewDate = $item->TARGET_DATE;
                }
            }
            //手動あっせん情報検索
            $assen = $this->TbMikuniAssen->getRecordByToubanForProfile($touban, $now_date);
            foreach ($assen as $item) {
                $row = [];
                $row['JYO'] = '';
                $row['START_DATE'] = $item->START_DATE;
                $row['END_DATE'] = $item->END_DATE;
                $row['RACE_TITLE'] = $item->TEXT;
                $assen_result[] = $row;
            }


            foreach ($assen_result as $key => $row) {

                $row['display_date'] = $this->General->create_display_date($row['START_DATE'], $row['END_DATE']);
                $row['sort_key'] = $row['START_DATE'] . $row['END_DATE'];

                $assen_result[$key] = $row;
            }

            $sort = [];
            foreach ($assen_result as $item) {
                $sort[] = $item['sort_key'];
            }

            array_multisort($sort, SORT_ASC, $assen_result);

        }


        $data['kibetu'] = $kibetu;
        $data['fandata'] = $fandata;
        $data['wareki'] = [
            "S" => 1925,
            "H" => 1988,
            "R" => 2018,
        ];
        $data['past3'] = $past3_result;
        $data['chokkin'] = $chokkin;
        $data['assen'] = $assen_result;

        return $data;
    }


}