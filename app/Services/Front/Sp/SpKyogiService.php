<?php

namespace App\Services\Front\Sp;

use App\Repositories\TbBoatSyussou\TbBoatSyussouRepositoryInterface;
use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\ChushiJunen\ChushiJunenRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;
use App\Repositories\Holding\HoldingRepositoryInterface;
use App\Repositories\TbBoatOzzinfo\TbBoatOzzinfoRepositoryInterface;
use App\Repositories\TbBoatOzz\TbBoatOzzRepositoryInterface;
use App\Repositories\RensyoKekka\RensyoKekkaRepositoryInterface;
use App\Repositories\TbMotorList\TbMotorListRepositoryInterface;
use App\Repositories\TbBoatKekkainfo\TbBoatKekkainfoRepositoryInterface;
use App\Repositories\TbBoatKekka\TbBoatKekkaRepositoryInterface;
use App\Repositories\TbVodManagement\TbVodManagementRepositoryInterface;
use App\Repositories\TbBoatTyokuzen\TbBoatTyokuzenRepositoryInterface;
use App\Repositories\TbTsuYosoHighlight\TbTsuYosoHighlightRepositoryInterface;
use App\Repositories\TbTsuYosoMessage\TbTsuYosoMessageRepositoryInterface;
use App\Repositories\TbTsuTokutenritu\TbTsuTokutenrituRepositoryInterface;
use App\Repositories\Holiday\HolidayRepositoryInterface;
use App\Repositories\TbBoatsMotorzenken\TbBoatsMotorzenkenRepositoryInterface;
use App\Repositories\TbTsuYoso\TbTsuYosoRepositoryInterface;
use App\Repositories\TbTsuYosoAshi\TbTsuYosoAshiRepositoryInterface;
use App\Repositories\TbTsuYosoTenji\TbTsuYosoTenjiRepositoryInterface;
use App\Repositories\TbGambooYosoSensyu\TbGambooYosoSensyuRepositoryInterface;
use App\Repositories\TbGambooYosoRace\TbGambooYosoRaceRepositoryInterface;
use App\Repositories\TbBoatsJyocourse\TbBoatsJyocourseRepositoryInterface;
use App\Services\KyogiCommonService;

class SpKyogiService
{
    public $TbBoatSyussou;
    public $KaisaiMaster;
    public $ChushiJunen;
    public $TbBoatRaceheader;
    public $Holding;
    public $TbBoatOzzinfo;
    public $TbBoatOzz;
    public $RensyoKekka;
    public $TbMotorList;
    public $TbBoatKekkainfo;
    public $TbBoatKekka;
    public $TbVodManagement;
    public $TbBoatTyokuzen;
    public $TbTsuYosoHighlight;
    public $TbTsuYosoMessage;
    public $TbTsuTokutenritu;
    public $Holiday;
    public $TbBoatsMotorzenken;
    public $TbTsuYoso;
    public $TbTsuYosoAshi;
    public $TbTsuYosoTenji;
    public $TbGambooYosoSensyu;
    public $TbGambooYosoRace;
    public $TbBoatsJyocourse;
    public $KyogiCommon;

    public function __construct(
        TbBoatSyussouRepositoryInterface $TbBoatSyussou,
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        ChushiJunenRepositoryInterface $ChushiJunen,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader,
        HoldingRepositoryInterface $Holding,
        TbBoatOzzinfoRepositoryInterface $TbBoatOzzinfo,
        TbBoatOzzRepositoryInterface $TbBoatOzz,
        RensyoKekkaRepositoryInterface $RensyoKekka,
        TbMotorListRepositoryInterface $TbMotorList,
        TbBoatKekkainfoRepositoryInterface $TbBoatKekkainfo,
        TbBoatKekkaRepositoryInterface $TbBoatKekka,
        TbVodManagementRepositoryInterface $TbVodManagement,
        TbBoatTyokuzenRepositoryInterface $TbBoatTyokuzen,
        TbTsuYosoHighlightRepositoryInterface $TbTsuYosoHighlight,
        TbTsuYosoMessageRepositoryInterface $TbTsuYosoMessage,
        TbTsuTokutenrituRepositoryInterface $TbTsuTokutenritu,
        HolidayRepositoryInterface $Holiday,
        TbBoatsMotorzenkenRepositoryInterface $TbBoatsMotorzenken,
        TbTsuYosoRepositoryInterface $TbTsuYoso,
        TbTsuYosoAshiRepositoryInterface $TbTsuYosoAshi,
        TbTsuYosoTenjiRepositoryInterface $TbTsuYosoTenji,
        TbGambooYosoSensyuRepositoryInterface $TbGambooYosoSensyu,
        TbGambooYosoRaceRepositoryInterface $TbGambooYosoRace,
        TbBoatsJyocourseRepositoryInterface $TbBoatsJyocourse,
        KyogiCommonService $KyogiCommon
    ){
        $this->TbBoatSyussou = $TbBoatSyussou;
        $this->KaisaiMaster = $KaisaiMaster;
        $this->ChushiJunen = $ChushiJunen;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
        $this->Holding = $Holding;
        $this->TbBoatOzzinfo = $TbBoatOzzinfo;
        $this->TbBoatOzz = $TbBoatOzz;
        $this->RensyoKekka = $RensyoKekka;
        $this->TbMotorList = $TbMotorList;
        $this->TbBoatKekkainfo = $TbBoatKekkainfo;
        $this->TbBoatKekka = $TbBoatKekka;
        $this->TbVodManagement = $TbVodManagement;
        $this->TbBoatTyokuzen = $TbBoatTyokuzen;
        $this->TbTsuYosoHighlight = $TbTsuYosoHighlight;
        $this->TbTsuYosoMessage = $TbTsuYosoMessage;
        $this->TbTsuTokutenritu = $TbTsuTokutenritu;
        $this->Holiday = $Holiday;
        $this->TbBoatsMotorzenken = $TbBoatsMotorzenken;
        $this->TbTsuYoso = $TbTsuYoso;
        $this->TbTsuYosoAshi = $TbTsuYosoAshi;
        $this->TbTsuYosoTenji = $TbTsuYosoTenji;
        $this->TbGambooYosoSensyu = $TbGambooYosoSensyu;
        $this->TbGambooYosoRace = $TbGambooYosoRace;
        $this->TbBoatsJyocourse = $TbBoatsJyocourse;
        $this->KyogiCommon = $KyogiCommon;
    }


    
    public function index($request,$is_preview){
        $data = [];
        $jyo = config('const.JYO_CODE');
        $data['jyo'] = $jyo;

        $race_num = $request->input('racenum') ?? 1;
        $data['race_num'] = $race_num;
        
        $target_time = date('Hi');
        //$target_time = '1100';
        $data['target_time'] = $target_time;

        
        //????????????????????????
        $tomorrow_flg = false;
        $today_date = date('Ymd');
        //$today_date = '20210524';
        $tomorrow_date = date('Ymd',strtotime('+1 day',strtotime($today_date)));

        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$tomorrow_date);
        $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$tomorrow_date);

        if($kaisai_master && $race_header){
            //?????????????????????????????????
            $tomorrow_flg = true;
            $target_date = $tomorrow_date;
        }else{
            //??????????????????????????????
            $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$today_date);
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$today_date);

            $target_date = $today_date;
        }

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;

        $data['tomorrow_flg'] = $tomorrow_flg;
        $data['target_date'] = $target_date;

        if($kaisai_master){

            $syussou = $this->KyogiCommon->create_syussou_array($jyo,$target_date,$race_num);    
            $data['syussou'] = $syussou;

            //????????????????????????????????????????????????????????????
            $temp_date = $kaisai_master->????????????;
            $end_date = $kaisai_master->????????????;
            $kaisai_date_list = [];
            while($temp_date <= $end_date){
                $kaisai_date_list[] = $temp_date;
                $temp_date = date("Ymd",strtotime('+1 day',strtotime($temp_date)));
            }

            $data['kaisai_master'] = $kaisai_master;
            $data['race_header'] = $race_header;
            $data['target_date'] = $target_date;
            $data['kaisai_date_list'] = $kaisai_date_list;
            $data['tomorrow_flg'] = $tomorrow_flg;
            

            {
                $neer_ozz_race_number = $this->KyogiCommon->getNeerOzzRaceNumber($jyo,$target_date,$target_time);
                $neer_kekka_race_number = $this->KyogiCommon->getNeerKekkaRaceNumber($jyo,$target_date);
                $neer_kekka_race_number_tfinfo = $this->KyogiCommon->getNeerKekkaRaceNumberTfinfo($jyo,$target_date);
                
                $data['neer_ozz_race_number'] = $neer_ozz_race_number;
                $data['neer_kekka_race_number'] = $neer_kekka_race_number;
                $data['neer_kekka_race_number_tfinfo'] = $neer_kekka_race_number_tfinfo;

                if($neer_kekka_race_number_tfinfo > $neer_kekka_race_number){
                    $kekka_change_race_num = $neer_kekka_race_number_tfinfo;
                }else{
                    $kekka_change_race_num = $neer_kekka_race_number;
                }

                $data['kekka_change_race_num'] = $kekka_change_race_num;
                
            }

            //???????????????
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
            $data['race_header'] = $race_header;

            //???????????????
            $prop_name = "SIMEKIRI_JIKOKU".$race_num."R";
            $shimekiri_jikoku = $race_header->$prop_name;
            $data['shimekiri_jikoku'] = $shimekiri_jikoku;

            {
                //???????????????????????????????????????

                //???????????????
                if($kekka_change_race_num < $race_num || true){
                    $data_odds_search = $this->odds_search($request, $data);
                    $view_odds_search = view('front.sp.kaisai.odds_search',$data_odds_search);
                    $data['view_odds_search'] = $view_odds_search;
                }
                
                //???????????????
                if($kekka_change_race_num < $race_num || true){
                    $data_odds_calc = $this->odds_calc($request);
                    $view_odds_calc = view('front.sp.kaisai.odds_calc',$data_odds_calc);
                    $data['view_odds_calc'] = $view_odds_calc;
                }
                
                //??????Mydata
                $data_yoso_mydata = $this->yoso_mydata($request,$data);
                $view_yoso_mydata = view('front.sp.kaisai.yoso_mydata',$data_yoso_mydata);
                $data['view_yoso_mydata'] = $view_yoso_mydata;

                //????????????
                $data_kekka_list = $this->kekka_list($request,$data);
                $view_kekka_list = view('front.sp.kaisai.kekka_list',$data_kekka_list);
                $data['view_kekka_list'] = $view_kekka_list;
                
            }
        }
        
        $yoso_message = $this->TbTsuYosoMessage->getFirstRecordForSp($jyo,$target_date.$target_time,$is_preview);
        $data['yoso_message'] = $yoso_message ?? [];        
    
        $kekka_info =  $this->TbBoatKekkainfo->getLastRaceNumberRecordByPK($jyo,$target_date);
        $data['kekka_info'] = $kekka_info ?? [];
        
        return $data;
    }

    public function movie($request){
        $data = [];

        $movie_id = $request->input('MovieID') ?? false;
        $data['movie_id'] = $movie_id;

        $target_date = substr($movie_id,0,8);
        $data['target_date'] = $target_date;

        $jyo = config("const.JYO_CODE");
        $data['jyo'] = $jyo;

        $race_num = (int)substr($movie_id,-2);
        $data['race_num'] = $race_num;
        

        if(strlen($movie_id) == 14){
            $strVODType = 1;
        }else{
            $strVODType = 2;
        }
        $data['strVODType'] = $strVODType;

        return $data;
    }

    

    public function movie_tenji($request){
        $data = [];
        $movie_id = $request->input('MovieID') ?? false;
        $data['movie_id'] = $movie_id;

        $target_date = substr($movie_id,0,8);
        $data['target_date'] = $target_date;

        $jyo = config("const.JYO_CODE");
        $data['jyo'] = $jyo;

        $race_num = (int)substr($movie_id,-2);
        $data['race_num'] = $race_num;
        

        if(strlen($movie_id) == 14){
            $strVODType = 1;
        }else{
            $strVODType = 2;
        }
        $data['strVODType'] = $strVODType;
        return $data;
    }

    public function movie_live($request){
        $data = [];

        $target_date = date('Ymd');
        $data['target_date'] = $target_date;

        $jyo = config("const.JYO_CODE");
        $data['jyo'] = $jyo;

        $target_time = date('Hi');
        $target_time = '1000';
        $data['target_time'] = $target_time;

        $holding = $this->Holding->getFirstRecordForFront();
        $data['holding'] = $holding;
        

        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);

        $kaisai_flg = false;
        $chushi_flg = false;
        $stop_race_num = 99;
        $kaisai_days = "--";
        if($kaisai_master && $race_header){
            $kaisai_flg = true;

            if($chushi_junen){
                $chushi_flg = true;
                $stop_race_num = $chushi_junen->???????????????????????????;
            }

            //???????????????
            if($target_date == $kaisai_master->????????????){
                $kaisai_days = "??????";
            }elseif($target_date == $kaisai_master->????????????){
                $kaisai_days = "?????????";
            }else{
                $kaisai_days = $race_header->KAISAI_DAYS."??????";
            }

        }

        $data['kaisai_flg'] = $kaisai_flg;
        $data['chushi_flg'] = $chushi_flg;
        $data['stop_race_num'] = $stop_race_num;
        $data['kaisai_days'] = $kaisai_days;


        return $data;
    }

    public function yoso_mydata($request,$index_data){
        $data = $index_data;

        //????????????
        $ozz_info = $this->TbBoatOzzinfo->getFirstRecordByPK($data['jyo'],$data['target_date'],$data['race_num']);
        $ozz_info_array = [1 => '', 2 => '', 3 => '', 4 => '', 5 => '', 6 => ''];
        $ketujyo_teiban_list = [];
        if ($ozz_info) {
            for ($i = 1; $i <= 6; $i++) {
                $prop_name = "KETUJO_HENKAN" . $i;
                $ozz_info_array[$i] = $ozz_info->$prop_name;
                if ($ozz_info->$prop_name == 2) {
                    $ketujyo_teiban_list[] = $i;
                }
            }
        }
        $data['ozz_info_array'] = $ozz_info_array;

        $strAryPriority = [];

        //post?????????
        for($intLoopCount = 1 ;$intLoopCount <= 5;$intLoopCount++){
            $strAryPriority[$intLoopCount] = $request->input('priority0'.$intLoopCount) ?? 0;
        }

        $boolDataflg = False;

        for($intLoopCount = 1 ;$intLoopCount <= 5;$intLoopCount++){
            if($strAryPriority[$intLoopCount] != 0 && $strAryPriority[$intLoopCount] != ""){
                $boolDataflg = true;
            }else{
                $strAryPriority[$intLoopCount] = "1";
            }
        }

        $data['strAryPriority'] = $strAryPriority;
        $data['boolDataflg'] = $boolDataflg;

        if($boolDataflg){
            //??????????????????????????????

            //**********************************************
            //????????????
            //??? ???????????????????????????100.0??????????????????????????????????????????????????????(?????????10.0?????????100???????????????
            //??? ??????????????????????????????????????????
            //??? ???????????????????????????
            //??? ?????????????????????????????????????????????????????????????????
            //??? ??????????????????????????????
            //   ???-???-???
            //   ???-???-??
            //   ???-???-???
            //   ???-??-???
            //   ???-???-???
            //   ???-???-??
            //   ???-???-???
            //   ???-??-???
            //   ???-???-???

            //?????????
            $strAryCalcData = [];
            $intAryAllYosoData = [];
            for($intLoopCount = 1 ;$intLoopCount <= 6;$intLoopCount++){
                for($intLoopCount2 = 1 ;$intLoopCount2 <= 5;$intLoopCount2++){
                    $strAryCalcData[$intLoopCount][$intLoopCount2] = "";
                }

                $intAryAllYosoData[$intLoopCount] = 0;
            }

            //+++++++++++++++++++++++++++++
		    //??????ST??????
            $strAryAvgst = [];
            for($intLoopCount = 1 ;$intLoopCount <= 6;$intLoopCount++){
                $strAryAvgst[$intLoopCount] = "0.99";
            }

            $syussou = $this->TbBoatSyussou->getRecordByPK($data['jyo'], $data['target_date'], $data['race_num']);

            $syussou_array=[];
            foreach($syussou as $item){
                $syussou_array[$item->TEIBAN] = $item;
                $strAryAvgst[$item->TEIBAN] = $item->ST_AVERAGE;
            }

            
            $tyokuzen = $this->TbBoatTyokuzen->getRecordByPK($data['jyo'], $data['target_date'], $data['race_num']);
            $tyokuzen_array=[];
            foreach($tyokuzen as $item){
                $tyokuzen_array[$item->TEIBAN] = $item;
            }
        

            $jyo_course = $this->TbBoatsJyocourse->getFirstRecordForFront();

            for($intLoopCount = 1 ;$intLoopCount <= 6;$intLoopCount++){
                $prop_name = "COURSE_TYAKU".$intLoopCount."1";
                $strAryCalcData[$intLoopCount][5] = $jyo_course->$prop_name;
            }

            //????????????????????????????????????
            //+++++++++++++++++++++++++++++

            //+++++++++++++++++++++++++++++
            //???????????????????????????

            //????????????????????????????????????
            $intAllImportant = 0;

            for($intLoopCount = 1 ;$intLoopCount <= 5;$intLoopCount++){
                if($strAryPriority[$intLoopCount] == "1"){
                    $strAryPriority[$intLoopCount] = "5";
                }elseif($strAryPriority[$intLoopCount] == "2"){
                    $strAryPriority[$intLoopCount] = "4";
                }elseif($strAryPriority[$intLoopCount] == "4"){
                    $strAryPriority[$intLoopCount] = "2";
                }elseif($strAryPriority[$intLoopCount] == "5"){
                    $strAryPriority[$intLoopCount] = "1";
                }

                //???????????????
				$intAllImportant = $intAllImportant + $strAryPriority[$intLoopCount];
            }

            $intAryTei = [];
            // ????????????????????????????????????
            for($intLoopCount = 1 ;$intLoopCount <= 6;$intLoopCount++){
                // 6???????????????

                //???????????????
                $intAryTei[$intLoopCount] = $intLoopCount;

                if($ozz_info_array[$intLoopCount] == 2){
                    //??????
                    $intAryAllYosoData[ $intLoopCount ] = 0;

                }else{
                    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                    //??? ???????????????????????????100.0????????????????????????????????????????????????(?????????10.0?????????100???????????????

                    // ??????????????????
                    $strAryCalcData[$intLoopCount][1] = $syussou_array[$intLoopCount]->ALL_SHOURITU;

                    if($strAryCalcData[$intLoopCount][1] != ""){
                        // ???????????????

                        if(is_numeric($strAryCalcData[$intLoopCount][1])){
                            // ????????????

                            //?????????
                            $strAryCalcData[$intLoopCount][1] = (double) $strAryCalcData[$intLoopCount][1];

                            //100?????????
                            $strAryCalcData[$intLoopCount][1] = $strAryCalcData[$intLoopCount][1] * 10;

                            //??? ??????????????????????????????????????????
                            $strAryCalcData[$intLoopCount][1] = $strAryCalcData[$intLoopCount][1] * $strAryPriority[1];

                        }
                    }

                    // ??????????????????
                    $strAryCalcData[$intLoopCount][2] = $syussou_array[$intLoopCount]->TOUTI_SHOURITU;

                    if($strAryCalcData[$intLoopCount][2] != ""){
                        // ???????????????

                        if(is_numeric($strAryCalcData[$intLoopCount][2])){
                            // ????????????

                            //?????????
                            $strAryCalcData[$intLoopCount][2] = (double) $strAryCalcData[$intLoopCount][2];

                            //100?????????
                            $strAryCalcData[$intLoopCount][2] = $strAryCalcData[$intLoopCount][2] * 10;

                            //??? ??????????????????????????????????????????
                            $strAryCalcData[$intLoopCount][2] = $strAryCalcData[$intLoopCount][2] * $strAryPriority[2];

                        }
                    }

                    // ????????????2??????
                    $strAryCalcData[$intLoopCount][3] = $tyokuzen_array[$intLoopCount]->MOTOR2RENTAIRITU;

                    if($strAryCalcData[$intLoopCount][3] != ""){
                        // ???????????????

                        if(is_numeric($strAryCalcData[$intLoopCount][3])){
                            // ????????????

                            //?????????
                            $strAryCalcData[$intLoopCount][3] = (double) $strAryCalcData[$intLoopCount][3];

                            //100?????????

                            //??? ??????????????????????????????????????????
                            $strAryCalcData[$intLoopCount][3] = $strAryCalcData[$intLoopCount][3] * $strAryPriority[3];

                        }
                    }

                    //??????ST
                    if($strAryAvgst[$intLoopCount] == "" || $strAryAvgst[$intLoopCount] == "0.00" || $strAryAvgst[$intLoopCount] == "-" ){
                        //????????????????????????
                        
                        //0.99
                        $strAryAvgst[$intLoopCount] == "0.99";
                    }

                    $strAryCalcData[$intLoopCount][4] = $strAryAvgst[$intLoopCount];

                    if($strAryCalcData[$intLoopCount][4] != ""){
                        // ????????????

                        if(is_numeric($strAryCalcData[$intLoopCount][4])){
                            // ????????????

                            //?????????
                            $strAryCalcData[$intLoopCount][4] = (double) $strAryCalcData[$intLoopCount][4];

                            //1??????
                            $strAryCalcData[$intLoopCount][4] =  1 - $strAryCalcData[$intLoopCount][4];

                            //100?????????
                            $strAryCalcData[$intLoopCount][4] =  $strAryCalcData[$intLoopCount][4] * 100;

                            //??? ??????????????????????????????????????????
                            $strAryCalcData[$intLoopCount][4] = $strAryCalcData[$intLoopCount][4] * $strAryPriority[4];

                        }
                    }

                    //??????????????????????????????
                    if($strAryCalcData[$intLoopCount][5] != ""){
                        // ????????????
                        if(is_numeric($strAryCalcData[$intLoopCount][5])){
                            // ????????????

                            //?????????
                            $strAryCalcData[$intLoopCount][5] = (double) $strAryCalcData[$intLoopCount][5];

                            //??? ??????????????????????????????????????????
                            $strAryCalcData[$intLoopCount][5] = $strAryCalcData[$intLoopCount][5] * $strAryPriority[5];

                        }
                    
                    }

                    //??? ???????????????????????????100.0????????????????????????????????????????????????(?????????10.0?????????100???????????????
                    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

                    //??? ???????????????????????????
                    for($intLoopCount2 = 1 ;$intLoopCount2 <= 5;$intLoopCount2++){
                        
                        if($strAryCalcData[$intLoopCount][$intLoopCount2] != ""){
                            //???????????????
                            if(is_numeric($strAryCalcData[$intLoopCount][$intLoopCount2])){
                                // ????????????
                                $intAryAllYosoData[$intLoopCount] = $intAryAllYosoData[$intLoopCount] + $strAryCalcData[$intLoopCount][$intLoopCount2];

                            }

                        }

                    }

                }

            }

            //?????????????????????
            for($intLoopCount = 1 ;$intLoopCount <= 6;$intLoopCount++){
                // 6???????????????

                for($intLoopCount2 = $intLoopCount + 1 ;$intLoopCount2 <= 6;$intLoopCount2++){
                    // ????????????

                    if($intAryAllYosoData[$intLoopCount] < $intAryAllYosoData[$intLoopCount2]){
                        // ????????????

                        $strTempData = $intAryAllYosoData[ $intLoopCount ];
                        $intAryAllYosoData[ $intLoopCount ] = $intAryAllYosoData[ $intLoopCount2 ];
                        $intAryAllYosoData[ $intLoopCount2 ] = $strTempData;

                        $strTempData = $intAryTei[ $intLoopCount ];
                        $intAryTei[$intLoopCount] = $intAryTei[ $intLoopCount2 ];
                        $intAryTei[$intLoopCount2] = $strTempData;
                    }

                }

            }

            //????????????
            $intTempRank = 1;
            $intTempRank2 = 1;
            $strTempData = 0;
            $strTempData2 = 0;

            for($intLoopCount = 1 ;$intLoopCount <= 6;$intLoopCount++){
                // 6???????????????

                if($strTempData > $intAryAllYosoData[$intLoopCount]){

                    $intTempRank = $intTempRank2;

                }elseif($strTempData == $intAryAllYosoData[$intLoopCount]){
                    //?????????????????????????????????????????????(????????????)

                    //??????????????????????????????
                    if($strTempData2 < $intAryTei[$intLoopCount]){
                        $intTempRank = $intTempRank2;
                    }
                }

                $intAryYosoRank[$intAryTei[$intLoopCount]] = $intTempRank;

                $strTempData = $intAryAllYosoData[$intLoopCount];

                $strTempData2 = $intAryTei[$intLoopCount];

                $intTempRank2 = $intTempRank2 + 1;

            }

            $strAryTemp = [];
            $strAryTemp[1] = "";
            $strAryTemp[2] = "";
            $strAryTemp[3] = "";
            $strAryTemp[4] = "";

            for($intLoopCount = 1 ;$intLoopCount <= 6;$intLoopCount++){
                // 6???????????????

                if($intAryYosoRank[$intLoopCount] == 1){
                    $strAryTemp[1] = $intLoopCount;
                }elseif($intAryYosoRank[$intLoopCount] == 2){
                    $strAryTemp[2] = $intLoopCount;
                }elseif($intAryYosoRank[$intLoopCount] == 3){
                    $strAryTemp[3] = $intLoopCount;
                }elseif($intAryYosoRank[$intLoopCount] == 4){
                    $strAryTemp[4] = $intLoopCount;
                }else{

                }
            }

            //+++++++++++++++++++++++++++++
            //???????????????

            //??? ??????????????????1:??????2:??????3:??????4:??
            //??? ??????????????????????????????
            //   1-2-3
            $strAryKumi[1] = $strAryTemp[1] . $strAryTemp[2] . $strAryTemp[3];
            //   1-2-4 
            $strAryKumi[2] = $strAryTemp[1] . $strAryTemp[2] . $strAryTemp[4];
            //   1-3-2 
            $strAryKumi[3] = $strAryTemp[1] . $strAryTemp[3] . $strAryTemp[2];
            //   1-4-2 
            $strAryKumi[4] = $strAryTemp[1] . $strAryTemp[4] . $strAryTemp[2];
            //   2-1-3 
            $strAryKumi[5] = $strAryTemp[2] . $strAryTemp[1] . $strAryTemp[3];
            //   2-1-4
            $strAryKumi[6] = $strAryTemp[2] . $strAryTemp[1] . $strAryTemp[4];
            //   2-3-1
            $strAryKumi[7] = $strAryTemp[2] . $strAryTemp[3] . $strAryTemp[1];
            //   2-4-1
            $strAryKumi[8] = $strAryTemp[2] . $strAryTemp[4] . $strAryTemp[1];
            //   3-1-2
            $strAryKumi[9] = $strAryTemp[3] . $strAryTemp[1] . $strAryTemp[2];

            


            //???????????????
            //+++++++++++++++++++++++++++++

            $data['strAryKumi'] = $strAryKumi;

            {
                $ozz_3rentan = $this->TbBoatOzz->getRecord($data['jyo'],$data['target_date'],$data['race_num'], 3);
    
                $bairitu_3rentan = [];
                foreach ($ozz_3rentan as $item) {
                    if (in_array($item->NUMBER1, $ketujyo_teiban_list) || in_array($item->NUMBER2, $ketujyo_teiban_list) || in_array($item->NUMBER3, $ketujyo_teiban_list)) {
                        $bairitu_3rentan[$item->NUMBER1][$item->NUMBER2][$item->NUMBER3] = "-";
                    } else {
                        $bairitu_3rentan[$item->NUMBER1][$item->NUMBER2][$item->NUMBER3] = $item->BAIRITU;
                    }
                }
                $data['bairitu_3rentan'] = $bairitu_3rentan;
            }

        }


        return $data;
    }


    public function odds_search($request,$index_data){
        $data = $index_data;

        $search_type = $request->input('type') ?? 0;
        $data['search_type'] = $search_type;

        $search_select=[];
        for($i=1;$i<=3;$i++){
            $search_select[$i] = $request->input('select'.$i) ?? 7;
        }
        $data['search_select'] = $search_select;

        $search_boxselect=[];
        for($i=1;$i<=6;$i++){
            $search_boxselect[$i] = $request->input('boxselect'.$i) ?? 0;
        }
        $data['search_boxselect'] = $search_boxselect;

        $sanrentan_flg = $this->TbBoatOzz->getRecordForOddsSearch($data['jyo'],$data['target_date'],$data['race_num'],3);
        $data['sanrentan_flg'] = $sanrentan_flg;

        //????????????
        $ozz_info = $this->TbBoatOzzinfo->getFirstRecordByPK($data['jyo'],$data['target_date'],$data['race_num']);
        $ozz_info_array = [1 => '', 2 => '', 3 => '', 4 => '', 5 => '', 6 => ''];
        $ketujyo_teiban_list = [];
        if ($ozz_info) {
            for ($i = 1; $i <= 6; $i++) {
                $prop_name = "KETUJO_HENKAN" . $i;
                $ozz_info_array[$i] = $ozz_info->$prop_name;
                if ($ozz_info->$prop_name == 2) {
                    $ketujyo_teiban_list[] = $i;
                }
            }
        }
        $data['ozz_info_array'] = $ozz_info_array;

        {
            $ozz_3rentan = $this->TbBoatOzz->getRecord($data['jyo'],$data['target_date'],$data['race_num'], 3);

            $bairitu_3rentan = [];
            foreach ($ozz_3rentan as $item) {
                if (in_array($item->NUMBER1, $ketujyo_teiban_list) || in_array($item->NUMBER2, $ketujyo_teiban_list) || in_array($item->NUMBER3, $ketujyo_teiban_list)) {
                    $bairitu_3rentan[$item->NUMBER1][$item->NUMBER2][$item->NUMBER3] = "-";
                } else {
                    $bairitu_3rentan[$item->NUMBER1][$item->NUMBER2][$item->NUMBER3] = $item->BAIRITU;
                }
            }
            $data['bairitu_3rentan'] = $bairitu_3rentan;
        }

        return $data;
    }

    public function odds_calc($request){
        $data = [];

        $jyo = config('const.JYO_CODE');
        $data['jyo'] = $jyo;

        $race_num = $request->input('racenum') ?? 1;
        $data['race_num'] = $race_num;

        $target_date = $request->input('target_date') ?? date('Ymd');
        $target_date = '20210525';
        $data['target_date'] = $target_date;

        
        $target_time = date('Hi');
        $target_time = '1000';
        $data['target_time'] = $target_time;

        $odds = $this->CreateOddsArray($jyo,$target_date,$race_num);

        $data['odds'] = $odds;
        /*
        $odds_kumi_count = $request->input['Odds_Kumi_Count'] ?? false;

        $odds_kumi_csv = ":::";
        $odds_kumi_csv_count = 0;

        if($odds_kumi_count){
            for($i=1;$i<=$odds_kumi_count;$i++){
                if($request->input['Odds_Kumi'.$i]){
                    $odds_kumi_csv .= $request->input['Odds_Kumi'.$i].":::";
                    $odds_kumi_csv_count++;
                }
            }
        }*/

        //449??????
        $strAryfield_shikin = [];
        $strAryfield_shikin[1] = $request->input('field_shikin1') ?? false;
        $strAryfield_shikin[2] = $request->input('field_shikin2') ?? false;

        $data['strAryfield_shikin'] = $strAryfield_shikin;

        $intCalcType = 0;
        if($strAryfield_shikin[1]){
            $intCalcType = 1;
        }

        if($strAryfield_shikin[2]){
            $intCalcType = 2;
        }

        //+++++++++++++++++++++++++
        //?????????????????????
        if($intCalcType == 1 || $intCalcType == 2){
            //??????????????????

            //++++++++++++++++++++++++
            //???????????????????????????

            //?????????
            $intTempData = 0;
            $intTempData2 = 0;
            $strOddsKumiCsv = ":::";
            $boolErrorflag = False;

            $intTempData = $request->input('Odds_Kumi_Count') ?? false;

            if($intTempData){
                
                for($intLoopCount = 1;$intLoopCount <= $intTempData; $intLoopCount++){
                    if($request->input('Odds_Kumi'.$intLoopCount)){
                        $strOddsKumiCsv .= $request->input('Odds_Kumi'.$intLoopCount).":::";
						$intTempData2 = $intTempData2 + 1;
                        
                    }
                }

            }

            $data['intTempData2'] = $intTempData2;
            
            //???????????????????????????
			//++++++++++++++++++++++++
            if($intTempData2 >= 1){
                //?????????????????????

                //++++++++++++++++++++++++++++++++++++++++++++++
                //3??????>3??????>2??????>2??????>???????????????????????????

                //?????????
                $strAryOddsKumi = explode( ":::",$strOddsKumiCsv);

                for($intLoopCount = 1; $intLoopCount < count($strAryOddsKumi);$intLoopCount++){

                    for($intLoopCount2 = $intLoopCount + 1; $intLoopCount2 < count($strAryOddsKumi); $intLoopCount2++){
                        $strTempData = $strAryOddsKumi[ $intLoopCount ];
                        
                        $strTempData2 = $strAryOddsKumi[ $intLoopCount2 ];

                        if($strTempData == ""){
                            //????????????

                            //????????????????????????
                            $strTempData = "0";
                        }else{
                            $KumiType = $this->FuncKumiType( $strTempData );
                            if( $KumiType == 1 ){
                                //3??????
                                $strTempData = 1000 - $this->FuncKumiRep( $strTempData );
								$strTempData = "2" . $strTempData;
                            }elseif( $KumiType == 2 ){
                                //3??????
                                $strTempData = 1000 - $this->FuncKumiRep( $strTempData );
								$strTempData = "1" . $strTempData;
                            }elseif( $KumiType == 3 ){
                                //2??????
                                $strTempData = 100 - $this->FuncKumiRep( $strTempData );
								$strTempData = "2" . $strTempData;
                            }elseif( $KumiType == 4 ){
                                //2??????
                                $strTempData = 100 - $this->FuncKumiRep( $strTempData );
								$strTempData = "1" . $strTempData;
                            }elseif( $KumiType == 5 ){
                                //??????
                                $strTempData = 10 - $strTempData;
                            }

                        }

                        if($strTempData2 == ""){
                            //????????????

                            //????????????????????????
                            $strTempData2 = "0";
                        }else{
                            $KumiType = $this->FuncKumiType( $strTempData2 );
                            if( $KumiType == 1 ){
                                //3??????
                                $strTempData2 = 1000 - $this->FuncKumiRep( $strTempData2 );
								$strTempData2 = "2" . $strTempData2;
                            }elseif( $KumiType == 2 ){
                                //3??????
                                $strTempData2 = 1000 - $this->FuncKumiRep( $strTempData2 );
								$strTempData2 = "1" . $strTempData2;
                            }elseif( $KumiType == 3 ){
                                //2??????
                                $strTempData2 = 100 - $this->FuncKumiRep( $strTempData2 );
								$strTempData2 = "2" . $strTempData2;
                            }elseif( $KumiType == 4 ){
                                //2??????
                                $strTempData2 = 100 - $this->FuncKumiRep( $strTempData2 );
								$strTempData2 = "1" . $strTempData2;
                            }elseif( $KumiType == 5 ){
                                //??????
                                $strTempData2 = 10 - $strTempData2;
                            }
                        }

                        if($strTempData < $strTempData2){
                            //??????

                            $strTempData3 = $strAryOddsKumi[$intLoopCount];
                            $strAryOddsKumi[$intLoopCount] = $strAryOddsKumi[$intLoopCount2];
                            $strAryOddsKumi[$intLoopCount2] = $strTempData3;
                        }

                    }
                }

                //3??????>3??????>2??????>2??????>???????????????????????????
				//++++++++++++++++++++++++++++++++++++++++++++++
                if( $intCalcType == 1 ){
                    //????????????

                        //+++++++++++++++++++++
                        //?????????
                        //??????
                        //A???????????????1500???
                        //B???2.5???
                        //C???4.0???
                        //D???3.5???
                        //
                        //??????????????????E????????????
                        //??? 1 / ( ( 1 / B ) + ( 1 / C ) + ( 1 / D ) ) = E ???
                        //??????????????????????????????
                        //B??? 1 / B * E * A ???
                        //???100????????????????????????
                        //????????????????????????????????????????????????????????????????????????????????????????????????100????????????
                        //?????????
                        //+++++++++++++++++++++


                        //++++++++++++++++++++++++
                        //???????????????????????????

                        //?????????
                        $strTempData3 = (double) 0.0;
                        for($intLoopCount = 1;$intLoopCount < count($strAryOddsKumi);$intLoopCount++){
                            
                            if($strAryOddsKumi[$intLoopCount]){
                                //?????????
                                $strTempData = $strAryOddsKumi[ $intLoopCount ];

                                //???????????????
                                $strTempData2 = $this->FuncOddsBairitsu( $this->FuncKumiRep( $strTempData ) , $this->FuncKumiType( $strTempData ) ,$odds);

                                if( $strTempData2 != "" && $strTempData2 != "-" && $strTempData2 != "0.0" ){
                                    // ( 1 / B )????????????????????????
									$strTempData3 = $strTempData3 + round( ( 1 / $strTempData2 ) , 9 );
                                }

                            }
                        }

                        if($strTempData3 != 0.0){
                            //??????????????????
                            $strTempData3 = round( ( 1 / $strTempData3 ) , 9 );
                        }

                        //???????????????????????????
                        //++++++++++++++++++++++++

                        //++++++++++++++++++++++++
                        //??????????????????????????????

                        //?????????
                        $intBuyMoney = 0;			//??????????????????????????????
                        $intTempData = 0;
                        $intTempData2 = 0;		//???????????????????????????
                        $intTempIndex = 0;

                        //??????????????????
                        $strAryBuy = [];
                        for($intLoopCount = 1;$intLoopCount < count($strAryOddsKumi);$intLoopCount++){
                            //??????????????????

                            if($strAryOddsKumi[ $intLoopCount ]){
                                //?????????
                                $strTempData = $strAryOddsKumi[$intLoopCount];

                                //???????????????
                                $strTempData2 = $this->FuncOddsBairitsu( $this->FuncKumiRep( $strTempData ) , $this->FuncKumiType( $strTempData ),$odds );

                                if( $strTempData2 != "" && $strTempData2 != "-" && $strTempData2 != "0.0" ){
                                   
                                    $strAryBuy[$intLoopCount] = Round( ( 1 / $strTempData2 * $strTempData3 * $strAryfield_shikin[1] ) , 9 );

                                    //+++++++++++++++++++++++++++
									//???100????????????????????????

									//???????????????????????????
                                    $strAryBuy[$intLoopCount] = Round( $strAryBuy[$intLoopCount] - 0.5 );
                                    if($strAryBuy[ $intLoopCount ] <= 100){
                                        //100?????????

                                        //100??????????????????
                                        $strAryBuy[ $intLoopCount ] = 100;
                                    }else{
                                        //0.01???????????????????????????50???????????????????????????
                                        $strAryBuy[ $intLoopCount ] =  Round( ( ( $strAryBuy[ $intLoopCount ] / 100 ) + 0.01 ) ) * 100;
                                    }

                                    //??????????????????????????????
									$intBuyMoney = $intBuyMoney + $strAryBuy[ $intLoopCount ];

                                    //???100????????????????????????
								    //+++++++++++++++++++++++++++
                                }else{
                                    $strAryBuy[ $intLoopCount ] = 0;

                                    //????????????????????????????????????
                                    $boolErrorflag = True;
                                }
                            }
                        }

                        //??????????????????????????????
                        //++++++++++++++++++++++++

                        //++++++++++++++++++++++++
                        //????????????????????????????????????????????????????????????????????????????????????????????????100????????????

                        if($intBuyMoney > 0){
                            if($intBuyMoney > $strAryfield_shikin[1]){
                                //???????????????????????????????????????????????????

                                while($intBuyMoney <= $strAryfield_shikin[1]){
                                //????????????????????????????????????

                                    //+++++++++++++++++++++++++++++++++++++++++
                                    //?????????????????????????????????????????????

                                    //?????????
                                    $intTempData = 0;
                                    $intTempData2 = 0;		//???????????????????????????
                                    $intTempIndex = 0;

                                    for($intLoopCount = 1;$intLoopCount < count($strAryOddsKumi);$intLoopCount++){
                                        //?????????
										$strTempData = $strAryOddsKumi[ $intLoopCount ];

                                        //???????????????
										$strTempData2 = $this->FuncOddsBairitsu( $this->FuncKumiRep( $strTempData ) , $this->FuncKumiType( $strTempData ),$odds );
                                    
                                        if( $strTempData2 != "" && $strTempData2 != "-" && $strTempData2 != "0.0" ){

                                            if($strAryBuy[ $intLoopCount ] <> 100){
                                                //100????????????

                                                $intTempData = $strAryBuy[ $intLoopCount ] * $strTempData2;

                                            }else{
                                                $intTempData = 0;
                                            }

                                            if($intTempData2 < $intTempData){
                                                $intTempData2 = $intTempData;

                                                //??????????????????
                                                $intTempIndex = $intLoopCount;
                                            }
                                        }
                                    }

                                    //?????????????????????????????????????????????
									//+++++++++++++++++++++++++++++++++++++++++


									//?????????????????????????????????????????????100??????
                                    $strAryBuy[ $intTempIndex ] = $strAryBuy[ $intTempIndex ] - 100;

                                    $intBuyMoney = $intBuyMoney - 100;
                                }

                            }
                        }

                        //????????????????????????????????????????????????????????????????????????????????????????????????100????????????
					    //++++++++++++++++++++++++

                }
                //++++++++++++++++++++++++
				//??????

                //795??????????????????
                

                $data['strAryOddsKumi'] = $strAryOddsKumi;
                $data['strAryBuy'] = $strAryBuy;
                $data['strAryfield_shikin'] = $strAryfield_shikin;

                

            }
            
            
        }else{

        }

        $data['intCalcType'] = $intCalcType;

        $data['funcTest'] = $this;
        
        return $data;
    }

    
    public function kekka_list($request ,$data){

        $jyo = $data['jyo'];
        $target_date = $data['target_date'];
        $kekka_date = $request->input('kekkayd') ?? $target_date;
        $data['kekka_date'] = $kekka_date;
        
 
        //?????????????????????????????????????????????
        $kekka_info = $this->TbBoatKekkainfo->getRecordByDate($jyo,$kekka_date);
        
        $kekka_info_today_all = [];
        foreach($kekka_info as $item){
            $kekka_info_today_all[$item->RACE_NUMBER] = $item;
        }
        $data['kekka_info_today_all'] = $kekka_info_today_all;

        $chushi_flg = $chushi_junen ?? false;
        if($chushi_flg){
            $stop_race_num = $chushi_junen->???????????????????????????;
        }else{
            $stop_race_num = 99;
        }

        $data['chushi_flg'] = $chushi_flg;
        $data['stop_race_num'] = $stop_race_num;

        $kaisai_master = $data['kaisai_master'];
        $kaisai_date_list = $data['kaisai_date_list'];

        $other_date = [];
        foreach($kaisai_date_list as $num => $kaisai_date){

            //???????????????????????????????????????
            if($kaisai_date <= $target_date){

                //???????????????????????????
                if($kaisai_date != $kekka_date){
                    //?????????????????????????????????????????????

                    $other_chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$kaisai_date);
                    $other_chushi_flg = false;
                    if($other_chushi_junen){
                        if($other_chushi_junen->??????????????????????????? == 0){
                            $other_chushi_flg = true;
                        }
                    }

                    $row = [];
                    if(!$other_chushi_flg){
                        $row['date'] = $kaisai_date;
                        if( $num == 0){
                            $row['display_date'] = '??????';
                        }elseif( ($num + 1) == $kaisai_master->???????????? ){
                            $row['display_date'] = '?????????';
                        }else{
                            $row['display_date'] = ($num + 1).'??????';
                        }
                        $other_date[$num] = $row;
                    }
                    
                }
            }

        }

        krsort($other_date);

        $data['other_date'] = $other_date;

        return $data;
    }

    public function replay_race($request){
        $data = [];

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $race_num = $request->input('racenum') ?? 1;
        $target_date = $request->input('yd') ?? date('Ymd');
        
        $data['jyo'] = $jyo;
        $data['race_num'] = $race_num;
        $data['target_date'] = $target_date;
        
        
        
        //????????????????????????????????????
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;

        if($kaisai_master){
            //????????????????????????
            $tmp_date = $kaisai_master->????????????;
            $end_date = $kaisai_master->????????????;
            $kaisai_date_list = [];
            $kaisai_date_list_label = [];
            $day_count = 1;
            while($tmp_date <= $end_date){
                $kaisai_date_list[] = $tmp_date;
                if($tmp_date == $kaisai_master->????????????){
                    $kaisai_date_list_label[$tmp_date] = "??????";
                }else if($tmp_date == $end_date){
                    $kaisai_date_list_label[$tmp_date] = "?????????";
                }else{
                    $kaisai_date_list_label[$tmp_date] = $day_count."??????";
                }
                $tmp_date = date("Ymd",strtotime("+1 day",strtotime($tmp_date)));

                $day_count++;
            }
            $data['kaisai_date_list'] = $kaisai_date_list;
            $data['kaisai_date_list_label'] = $kaisai_date_list_label;

        }


        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;

               
        $syussou = $this->KyogiCommon->create_syussou_array($jyo,$target_date,$race_num);    
        $data['syussou'] = $syussou;

        //????????????
        $ozz_info = $this->TbBoatOzzinfo->getFirstRecordByPK($jyo,$target_date,$race_num);
        $ozz_info_array = [1=>'',2=>'',3=>'',4=>'',5=>'',6=>''];
        if($ozz_info){
            for($i = 1; $i <= 6; $i++){
                $prop_name = "KETUJO_HENKAN".$i;
                $ozz_info_array[$i] = $ozz_info->$prop_name;
            }
        }
        $data['ozz_info_array'] = $ozz_info_array;


        {
            //???????????????
            $kekka = $this->TbBoatKekka->getRaceKekka($jyo,$target_date,$race_num);
            
            foreach($kekka as $key=>$item){
                $SENSYU_NAME = $item->SENSYU_NAME;
                $SENSYU_NAME = str_replace("??????"," ", $SENSYU_NAME);
                $SENSYU_NAME = str_replace("???"," ", $SENSYU_NAME);
                $kekka[$key]->SENSYU_NAME = $SENSYU_NAME;
            } 
            $data['kekka'] = $kekka;

            $kekka_info = $this->TbBoatKekkainfo->getFirstRecordByPK($jyo,$target_date,$race_num);
            $data['kekka_info'] = $kekka_info;

            {
                //???????????????????????????????????????????????????
                $tansyo_array = []; //??????????????????0 ??????????????????3
                $fukusyo_array = []; //??????????????????1 ??????????????????5
                $nirentan_array = []; //??????????????????2 ??????????????????2
                $nirenfuku_array = []; //??????????????????3 ??????????????????2
                $sanrentan_array = []; //??????????????????4 ??????????????????2
                $sanrenfuku_array = []; //??????????????????5 ??????????????????2
                $kakurenfuku_array = []; //??????????????????6 ??????????????????5

                $fuseiritu_array = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

                if($kekka_info){

                    //??????????????????????????????????????????
                    $fuseiritu_array = str_split($kekka_info->FUSEIRITU);


                    //??????
                    for($i=1;$i<3;$i++){
                        $prop_name = "TANSYO".$i; 
                        if($kekka_info->$prop_name){
                            $tansyo_array[$i]['TANSYO'] = $kekka_info->$prop_name;
                            $prop_name = "TANSYO_MONEY".$i; 
                            $tansyo_array[$i]['TANSYO_MONEY'] = $kekka_info->$prop_name;
                        }
                    }

                    //??????
                    for($i=1;$i<5;$i++){
                        $prop_name = "FUKUSYO".$i; 
                        if($kekka_info->$prop_name){
                            $fukusyo_array[$i]['FUKUSYO'] = $kekka_info->$prop_name;
                            $prop_name = "FUKUSYO_MONEY".$i; 
                            $fukusyo_array[$i]['FUKUSYO_MONEY'] = $kekka_info->$prop_name;
                        }
                    }

                    //2??????
                    for($i=1;$i<2;$i++){
                        $prop_name = "NIRENTAN".$i; 
                        if($kekka_info->$prop_name){
                            $nirentan_array[$i]['NIRENTAN'] = $kekka_info->$prop_name;
                            $prop_name = "NIRENTAN_MONEY".$i; 
                            $nirentan_array[$i]['NIRENTAN_MONEY'] = $kekka_info->$prop_name;
                            $prop_name = "NIRENTAN_NINKI".$i; 
                            $nirentan_array[$i]['NIRENTAN_NINKI'] = $kekka_info->$prop_name;
                        }
                    }

                    //2??????
                    for($i=1;$i<2;$i++){
                        $prop_name = "NIRENFUKU".$i; 
                        if($kekka_info->$prop_name){
                            $nirenfuku_array[$i]['NIRENFUKU'] = $kekka_info->$prop_name;
                            $prop_name = "NIRENFUKU_MONEY".$i; 
                            $nirenfuku_array[$i]['NIRENFUKU_MONEY'] = $kekka_info->$prop_name;
                            $prop_name = "NIRENFUKU_NINKI".$i; 
                            $nirenfuku_array[$i]['NIRENFUKU_NINKI'] = $kekka_info->$prop_name;
                        }
                    }


                    //3??????
                    for($i=1;$i<2;$i++){
                        $prop_name = "SANRENTAN".$i; 
                        if($kekka_info->$prop_name){
                            $sanrentan_array[$i]['SANRENTAN'] = $kekka_info->$prop_name;
                            $prop_name = "SANRENTAN_MONEY".$i; 
                            $sanrentan_array[$i]['SANRENTAN_MONEY'] = $kekka_info->$prop_name;
                            $prop_name = "SANRENTAN_NINKI".$i; 
                            $sanrentan_array[$i]['SANRENTAN_NINKI'] = $kekka_info->$prop_name;
                        }
                    }


                    //3??????
                    for($i=1;$i<2;$i++){
                        $prop_name = "SANRENFUKU".$i; 
                        if($kekka_info->$prop_name){
                            $sanrenfuku_array[$i]['SANRENFUKU'] = $kekka_info->$prop_name;
                            $prop_name = "SANRENFUKU_MONEY".$i; 
                            $sanrenfuku_array[$i]['SANRENFUKU_MONEY'] = $kekka_info->$prop_name;
                            $prop_name = "SANRENFUKU_NINKI".$i; 
                            $sanrenfuku_array[$i]['SANRENFUKU_NINKI'] = $kekka_info->$prop_name;
                        }
                    }
                    
                    //?????????
                    for($i=1;$i<5;$i++){
                        $prop_name = "KAKURENFUKU".$i; 
                        if($kekka_info->$prop_name){
                            $kakurenfuku_array[$i]['KAKURENFUKU'] = $kekka_info->$prop_name;
                            $prop_name = "KAKURENFUKU_MONEY".$i; 
                            $kakurenfuku_array[$i]['KAKURENFUKU_MONEY'] = $kekka_info->$prop_name;
                            $prop_name = "KAKURENFUKU_NINKI".$i; 
                            $kakurenfuku_array[$i]['KAKURENFUKU_NINKI'] = $kekka_info->$prop_name;
                        }
                    }
                
                }

                $data['tansyo_array'] = $tansyo_array; 
                $data['fukusyo_array'] = $fukusyo_array; 
                $data['nirentan_array'] = $nirentan_array; 
                $data['nirenfuku_array'] = $nirenfuku_array; 
                $data['sanrentan_array'] = $sanrentan_array; 
                $data['sanrenfuku_array'] = $sanrenfuku_array; 
                $data['kakurenfuku_array'] = $kakurenfuku_array; 

                $data['fuseiritu_array'] = $fuseiritu_array;

            }

            
            //???????????????
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
            $data['race_header'] = $race_header;

            $neer_kekka_race_number = $this->KyogiCommon->getNeerKekkaRaceNumber($jyo,$target_date);
            $data['neer_kekka_race_number'] = $neer_kekka_race_number;
        }

        {
            //??????????????????????????????
            //$kekka = $this->TbBoatKekka->getRaceKekka($jyo,$target_date,$race_num);

            $kekka_array = [];
            foreach($kekka as $item){
                $kekka_array[$item->TEIBAN]['record'] = $item;

                $right_margin = 110;
                $st_timing = (double)$item->START_TIMING;

                if($item->TYAKUJUN == 'F'){
                    //???????????????
                    if($st_timing >= 0.11){
                        $right_margin = 0;
                    }else{
                        $right_margin = $right_margin - $st_timing * 100 * 3;
                    }
                }elseif($item->TYAKUJUN == 'L'){
                    //????????????????????????
                    $right_margin = 400;
                }else{
                    if($st_timing){
                        if($st_timing >= 0.00 && $st_timing <= 0.30){
                            $right_margin = $right_margin + $st_timing * 100 * 3;

                        }elseif($st_timing >= 0.31 && $st_timing <= 0.90){
                            $right_margin = $right_margin + (0.30 * 100 * 3) + (($st_timing - 0.30 ) * 100);
                        
                        }elseif($st_timing >= 0.91 ){
                            $right_margin = 400;
                        }
                    }else{
                        $right_margin = 400;
                    }
                }

                $kekka_array[$item->TEIBAN]['right_margin'] = $right_margin;

            }
            ksort($kekka_array);
            $data['kekka_array'] = $kekka_array;
        }

        return $data;
    }

    

    //????????? ???????????????
	function funcOddsImageChange( $argData )
    {

        $strReturn = $argData;

        $strReturn = str_replace( "1", '<img src="/sp/kyogi/images/num1.png" alt="1">',$strReturn);
        $strReturn = str_replace( "2", '<img src="/sp/kyogi/images/num2.png" alt="2">',$strReturn);
        $strReturn = str_replace( "3", '<img src="/sp/kyogi/images/num3.png" alt="3">',$strReturn);
        $strReturn = str_replace( "4", '<img src="/sp/kyogi/images/num4.png" alt="4">',$strReturn);
        $strReturn = str_replace( "5", '<img src="/sp/kyogi/images/num5.png" alt="5">',$strReturn);
        $strReturn = str_replace( "6", '<img src="/sp/kyogi/images/num6.png" alt="6">',$strReturn);
        $strReturn = str_replace( "-", '<img src="/sp/kyogi/images/num.png" alt="-">',$strReturn);
        $strReturn = str_replace( "_", '<img src="/sp/kyogi/images/equal.png" alt="=">',$strReturn);

        return $strReturn;

    }


    //??????????????????????????????
    function FuncKumiType($argData)
    {
        //?????????????????????????????????
        $strTempData = "";
		$strReturn = "";

        $strTempData = $argData;

        if(strpos($strTempData,"-") !== false){
            //-?????????????????????
            if(strlen($strTempData) == 5){
                //3??????
                $strReturn = 1;
            }else{
                //2??????
                $strReturn = 3;
            }
        }elseif(strpos($strTempData,"_") !== false){
            //_?????????????????????
            if(strlen($strTempData) == 5){
                //3??????
                $strReturn = 2;
            }else{
                //2??????
                $strReturn = 4;
            }
        }else{
            //??????

            $strReturn = 5;
        }

        return $strReturn;
    }

    function FuncKumiRep($argData){
        //?????????????????????????????????
        $strTempData = "";
		$strReturn = "";

		$strTempData = $argData;

        if(strpos($strTempData,"-") !== false){
            //-?????????????????????
            $strReturn = str_replace( "-", "",$strTempData);

        }elseif(strpos($strTempData,"_") !== false){
            //_?????????????????????
            $strReturn = str_replace( "_", "",$strTempData);

        }else{
            //??????
            $strReturn = $strTempData;

        }

        return $strReturn;

    }

    function FuncOddsBairitsu( $argData , $argData2 ,$odds )
    {
	    //??????????????????????????????(???????????????????????????????????????
        $strTempData = "";
		$strTempData2 = "";
		$strReturn = "";

		$strTempData = $argData;
		$strTempData2 = $argData2;
		$strReturn = "";

        if($strTempData2 == 1){
            //3??????
            $strReturn = $odds['bairitu_3rentan'][substr($strTempData,0,1)][substr($strTempData,1,1)][substr($strTempData,2,1)];
        }elseif($strTempData2 == 2){
            //3??????
            $strReturn = $odds['bairitu_3renpuku'][substr($strTempData,0,1)][substr($strTempData,1,1)][substr($strTempData,2,1)];
        }elseif($strTempData2 == 3){
            //2??????
            $strReturn = $odds['bairitu_2rentan'][substr($strTempData,0,1)][substr($strTempData,1,1)];
        }elseif($strTempData2 == 4){
            //2??????
            $strReturn = $odds['bairitu_2renpuku'][substr($strTempData,0,1)][substr($strTempData,1,1)];
        }elseif($strTempData2 == 5){
            //??????
            $strReturn = $odds['bairitu_tansyo'][$strTempData];
        }

        return $strReturn;
    }

    function CreateOddsArray($jyo, $target_date, $race_num)
    {
        $data = [];

            $ozz_3rentan = $this->TbBoatOzz->getRecord($jyo, $target_date, $race_num, 3);
            $bairitu_3rentan = [];
            foreach($ozz_3rentan as $item){
                $bairitu_3rentan[$item->NUMBER1][$item->NUMBER2][$item->NUMBER3] = $item->BAIRITU;
            }
            $data['bairitu_3rentan'] = $bairitu_3rentan;

            $ozz_3renpuku = $this->TbBoatOzz->getRecord($jyo, $target_date, $race_num, 4);
            $bairitu_3renpuku = [];
            foreach($ozz_3renpuku as $item){
                $bairitu_3renpuku[$item->NUMBER1][$item->NUMBER2][$item->NUMBER3] = $item->BAIRITU;
            }
            $data['bairitu_3renpuku'] = $bairitu_3renpuku;

            $ozz_2rentan = $this->TbBoatOzz->getRecord($jyo, $target_date, $race_num, 1);
            $bairitu_2rentan = [];
            foreach($ozz_2rentan as $item){
                $bairitu_2rentan[$item->NUMBER1][$item->NUMBER3] = $item->BAIRITU;
            }
            $data['bairitu_2rentan'] = $bairitu_2rentan;

            $ozz_2renpuku = $this->TbBoatOzz->getRecord($jyo, $target_date, $race_num, 2);
            $bairitu_2renpuku = [];
            foreach($ozz_2renpuku as $item){
                $bairitu_2renpuku[$item->NUMBER1][$item->NUMBER3] = $item->BAIRITU;
            }
            $data['bairitu_2renpuku'] = $bairitu_2renpuku;

            $ozz_tansyo = $this->TbBoatOzz->getRecord($jyo, $target_date, $race_num, 5);
            $bairitu_tansyo = [];
            foreach($ozz_tansyo as $item){
                $bairitu_tansyo[$item->NUMBER1] = $item->BAIRITU;
            }
            $data['bairitu_tansyo'] = $bairitu_tansyo;

        return $data;
    }

    
}