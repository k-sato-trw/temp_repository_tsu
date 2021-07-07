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
use App\Repositories\TbTsuSensyuRecord\TbTsuSensyuRecordRepositoryInterface;
use App\Repositories\TbTsuSensyuTitle\TbTsuSensyuTitleRepositoryInterface;
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
    public $TbTsuSensyuRecord;
    public $TbTsuSensyuTitle;
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
        TbTsuSensyuRecordRepositoryInterface $TbTsuSensyuRecord,
        TbTsuSensyuTitleRepositoryInterface $TbTsuSensyuTitle,
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
        $this->TbTsuSensyuRecord = $TbTsuSensyuRecord;
        $this->TbTsuSensyuTitle = $TbTsuSensyuTitle;
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

        $target_date = date('Ymd');
        $data['target_date'] = $target_date;
        
        $assen_schedule = $this->AssenSchedule->getAllRecord();

        /*$temp = $assen_schedule;
        $assen_schedule = [];
        $assen_schedule[] = $temp[0];
        $assen_schedule[] = $temp[1];
        $assen_schedule[] = $temp[2];*/

        foreach($assen_schedule as $item){
            //$touban = $request->input('touban');
            $touban = $item->登録番号;


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
                                $seiseki['TYAKUJUN'] =  '<img src="/06meikan/images/i_y0' . $boat_syussou->$prop_name . '.gif">';
                            } elseif (isset($junyusho_list[$seiseki['DATE']][$seiseki['RACENUMBER']])) {
                                $seiseki['TYAKUJUN'] =  '<img src="/06meikan/images/i_j0' . $boat_syussou->$prop_name . '.gif">';
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
                            $seiseki['TYAKUJUN'] =  '<img src="/06meikan/images/i_y0' . $boat_kekka->TYAKUJUN . '.gif">';
                        } elseif (isset($junyusho_list[$seiseki['DATE']][$seiseki['RACENUMBER']])) {
                            $seiseki['TYAKUJUN'] =  '<img src="/06meikan/images/i_j0' . $boat_kekka->TYAKUJUN . '.gif">';
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
                        $row['GRADE_CODE'] = $sensyusyussou2_today->GRADE_CODE;
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
                    if($assen_result){
                        if ($assen_result[0]['JYO'] != $item->JYO || $assen_result[0]['START_DATE'] != $item->TARGET_STARTDATE) {
                            $row = [];
                            $row['JYO'] = $item->JYO;
                            $row['START_DATE'] = $item->TARGET_STARTDATE;
                            $row['END_DATE'] = $item->TARGET_ENDDATE;
                            $row['RACE_TITLE'] = $item->RACE_TITLE;
                            $row['GRADE_CODE'] = $item->GRADE_CODE;
                            $assen_result[] = $row;

                            $strAssNewDate = $item->TARGET_DATE;
                        }
                    }else{
                        $row = [];
                        $row['JYO'] = $item->JYO;
                        $row['START_DATE'] = $item->TARGET_STARTDATE;
                        $row['END_DATE'] = $item->TARGET_ENDDATE;
                        $row['RACE_TITLE'] = $item->RACE_TITLE;
                        $row['GRADE_CODE'] = $item->GRADE_CODE;
                        $assen_result[] = $row;

                        $strAssNewDate = $item->TARGET_DATE;
                    }
                }

                /*
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
                */

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

            {
                //デビューデータ処理
                //最古の出走データをデビューデータとして呼び出す
                //開発環境の場合は、全データが無いので日付は正確ではない
                $debut_syussou = $this->TbBoatSyussou->getDebutRecordForProfile($touban);
                
                //差を求める日時の変数を作成
                $dateTime1 = date('Y-m-d 00:00:00',strtotime($debut_syussou->TARGET_DATE));
                $dateTime2 = date('Y-m-d 00:00:00',strtotime($target_date));

                //DateTimeクラスで2つの日時のオブジェクトを作成
                $objDatetime1 = new \DateTime($dateTime1);
                $objDatetime2 = new \DateTime($dateTime2);
                
                //diff()メソッドで2つの日時のオブジェクトから
                //ふたつの日付の差をあらわす DateInterval オブジェクトを生成する
                $debut_date_diff = $objDatetime1->diff($objDatetime2);


                $debut_kaisai = $this->KaisaiMaster->getFirstRecordByDateBitween($debut_syussou->JYO,$debut_syussou->TARGET_DATE);

                $debut_kekka =  $this->TbBoatKekka->getDebutRaceKekka($debut_syussou->JYO,$touban,$debut_kaisai->開始日付,$debut_kaisai->終了日付);

            }

            {
                //通算成績処理
                /*
                    TB_TSU_SENSYU_RECORDが基本だが、
                    TB_BOATS_YUSYORACERに新規データがあれば、
                    TB_TSU_SENSYU_RECORDに加算して上書きする。
                */
                $sensyu_record = $this->TbTsuSensyuRecord->getFirstRecordByPK($touban);

                if($sensyu_record){

                    $strTarget_date = $sensyu_record->TARGET_DATE;

                    $strDebut_date = $sensyu_record->DEBUT_DATE;
                    $strDebut_jyo = $sensyu_record->DEBUT_JYO;
                    $strDebut_seiseki = $sensyu_record->DEBUT_SEISEKI;

                    $intSg_count = $sensyu_record->SG_COUNT;
                    $intG1_count = $sensyu_record->G1_COUNT;
                    $intG2_count = $sensyu_record->G2_COUNT;
                    $intG3_count = $sensyu_record->G3_COUNT;
                    $intIp_count = $sensyu_record->IP_COUNT;

                }else{
                    $strTarget_date = '20040101';

                    $intSg_count = 0;
                    $intG1_count = 0;
                    $intG2_count = 0;
                    $intG3_count = 0;
                    $intIp_count = 0;

                }

                $sg_g1 = [];

                $yusyo_racer = $this->TbBoatsYusyoracer->getFutureRecord($touban,$strTarget_date);
                
                if($yusyo_racer){

                    foreach($yusyo_racer as $item){

                        if($strTarget_date < $yusyo_racer->TARGET_DATE){
                            $strTarget_date = $yusyo_racer->TARGET_DATE;
                        }

                        if($item->GRADE_CODE == '0'){
                            //SGレース優勝のとき
                            if(mb_strpos($item->RACE_TITLE,"チャレンジカップ") !== false && $item->RACE_NUMBER != "12"){
                                //チャレンジカップ12R以外は今G2
                                $intG2_count = $intG2_count + 1;

                            }elseif(mb_strpos($item->RACE_TITLE,"グランプリ") !== false && $item->RACE_NUMBER != "12"){
                                //SGグランプリ12R以外はタイトルにシリーズ付与
                                $item->RACE_TITLE = $item->RACE_TITLE."シリーズ";
                                $sg_g1[] = [
                                    'TARGET_DATE' => $item->TARGET_DATE,
                                    'JYO' => $item->JYO,
                                    'GRADE_CODE' => $item->GRADE_CODE,
                                    'RACE_TITLE' => $item->RACE_TITLE,
                                ];
                                $intSg_count = $intSg_count + 1;
                            }else{
                                $sg_g1[] = [
                                    'TARGET_DATE' => $item->TARGET_DATE,
                                    'JYO' => $item->JYO,
                                    'GRADE_CODE' => $item->GRADE_CODE,
                                    'RACE_TITLE' => $item->RACE_TITLE,
                                ];
                                $intSg_count = $intSg_count + 1;
                            }

                        }elseif($item->GRADE_CODE == '1'){
                            // G1レース優勝のとき
                            if(mb_strpos($item->RACE_TITLE,"クライマックス") !== false && $item->RACE_NUMBER != "12"){
                                //クライマックス12R以外は今G3
                                $intG3_count = $intG3_count + 1;

                            }elseif(mb_strpos($item->RACE_TITLE,"賞金女王") !== false && $item->RACE_NUMBER != "12"){
                                //賞金女王の12R以外は一般戦
                                $intIp_count = $intIp_count + 1;

                            }else{
                                $sg_g1[] = [
                                    'TARGET_DATE' => $item->TARGET_DATE,
                                    'JYO' => $item->JYO,
                                    'GRADE_CODE' => $item->GRADE_CODE,
                                    'RACE_TITLE' => $item->RACE_TITLE,
                                ];
                                $intG1_count = $intG1_count + 1;

                            }

                        }elseif($item->GRADE_CODE == '2'){
                            // G2レース優勝のとき
                            $intG2_count = $intG2_count + 1;
                        }elseif($item->GRADE_CODE == '3' ||$item->GRADE_CODE == '5' ){
                            // G3レース優勝のとき
                            $intG3_count = $intG3_count + 1;
                        }else{
                            // 一般レース優勝の時
                            $intIp_count = $intIp_count + 1;
                        }


                    }

                    //新規データが存在する場合、更新処理
                    if($sensyu_record){
                        //更新
                        $update_data = [
                            'TOUBAN' => $touban,
                            'TARGET_DATE' => $strTarget_date,
                            'SG_COUNT' => $intSg_count,
                            'G1_COUNT' => $intG1_count,
                            'G2_COUNT' => $intG2_count,
                            'G3_COUNT' => $intG3_count,
                            'IP_COUNT' => $intIp_count,
                        ];

                        $this->TbTsuSensyuRecord->UpdateRecordByPK($update_data,$touban);

                    }else{
                        //新規
                        
                        $debut_seiseki = "";
                        foreach($item['debut_kekka'] as $debut_kekka){
                            $debut_seiseki .= $debut_kekka->TYAKUJUN;
                        }
                        
                        $insert_data = [
                            'TOUBAN' => $touban,
                            'TARGET_DATE' => $strTarget_date,
                            'DEBUT_DATE' => date('Ymd',strtotime($debut_syussou->TARGET_DATE)),
                            'DEBUT_JYO' => $debut_syussou->JYO,
                            'DEBUT_SEISEKI' => $debut_seiseki,
                            'SG_COUNT' => $intSg_count,
                            'G1_COUNT' => $intG1_count,
                            'G2_COUNT' => $intG2_count,
                            'G3_COUNT' => $intG3_count,
                            'IP_COUNT' => $intIp_count,
                        ];

                        $this->TbTsuSensyuRecord->insertRecord($insert_date);
                    }

                    //同様にTB_TSU_SENSYU_TITLEも更新処理
                    //こちらは新規の数分、複数行更新
                    if($sg_g1){
                        $new_datetime = date('YmdHis');
                        $insert_data = [];
                        foreach($sg_g1 as $item){
                            
                            $insert_data[] = [
                                'TOUBAN' => $touban,
                                'VIC_DATE' => $item['TARGET_DATE'],
                                'VIC_JYO' => $item['JYO'],
                                'VIC_GRADE' => $item['GRADE_CODE'],
                                'VIC_TITLE' => $item['RACE_TITLE'],
                                'RESIST_TIME' => $new_datetime,
                                'UPDATE_TIME' => $new_datetime,
                            ];
                        }
                        $this->TbTsuSensyuTitle->insertRecord($insert_data);
                        
                    }

                    $sg_g1 = [];
                    $sensyu_title = $this->TbTsuSensyuTitle->getRecordByPK($touban);
                    foreach($sensyu_title as $item){
                        $sg_g1[] = [
                            'TARGET_DATE' => $item->VIC_DATE,
                            'JYO' => $item->VIC_JYO,
                            'GRADE_CODE' => $item->VIC_GRADE,
                            'RACE_TITLE' => $item->VIC_TITLE,
                        ];
                    }
                }
            }


            $assen_data['kibetu'] = $kibetu;
            $assen_data['fandata'] = $fandata;
            
            $assen_data['past3'] = $past3_result;
            $assen_data['assen'] = $assen_result ?? [];
            $assen_data['debut_syussou'] = $debut_syussou;
            $assen_data['debut_date_diff'] = $debut_date_diff;
            $assen_data['debut_kekka'] = $debut_kekka;
            $assen_data['assen_result'] = $assen_result;
            $assen_data['intSg_count'] = $intSg_count;
            $assen_data['intG1_count'] = $intG1_count;
            $assen_data['intG2_count'] = $intG2_count;
            $assen_data['intG3_count'] = $intG3_count;
            $assen_data['intIp_count'] = $intIp_count;
            $assen_data['sg_g1'] = $sg_g1;
            
            $data['touban_array'][$touban] = $assen_data;

        }


        $data['wareki'] = [
            "S" => 1925,
            "H" => 1988,
            "R" => 2018,
        ];

        return $data;
    }


}