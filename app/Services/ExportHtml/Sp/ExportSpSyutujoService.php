<?php

namespace App\Services\ExportHtml\Sp;

use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;
use App\Repositories\TbBoatSyussou\TbBoatSyussouRepositoryInterface;
use App\Repositories\TbRaceIndex\TbRaceIndexRepositoryInterface;
use App\Repositories\TbRaceTenbo\TbRaceTenboRepositoryInterface;
use App\Repositories\TbRaceSyutujoWriteLog\TbRaceSyutujoWriteLogRepositoryInterface;
use App\Repositories\RaceTenboSensyuImage\RaceTenboSensyuImageRepositoryInterface;
use App\Repositories\FanData\FanDataRepositoryInterface;
use App\Repositories\FandataManual\FandataManualRepositoryInterface;
use App\Repositories\Holiday\HolidayRepositoryInterface;
use App\Repositories\TbRaceSyutujo\TbRaceSyutujoRepositoryInterface;
use App\Repositories\TbRaceSyutujoRacer\TbRaceSyutujoRacerRepositoryInterface;
use App\Repositories\TbBoatsSensyusyussou2\TbBoatsSensyusyussou2RepositoryInterface;
use App\Repositories\TbBoatsYusyoracer\TbBoatsYusyoracerRepositoryInterface;
use App\Services\GeneralService;
use App\Services\KyogiCommonService;

class ExportSpSyutujoService
{
    public $KaisaiMaster;
    public $TbBoatRaceheader;
    public $TbBoatSyussou;
    public $TbRaceIndex;
    public $TbRaceTenbo;
    public $TbRaceSyutujoWriteLog;
    public $RaceTenboSensyuImage;
    public $FanData;
    public $FandataManual;
    public $Holiday;
    public $TbRaceSyutujo;
    public $TbRaceSyutujoRacer;
    public $TbBoatsSensyusyussou2;
    public $TbBoatsYusyoracer;
    public $KyogiCommon;

    public function __construct(
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader,
        TbBoatSyussouRepositoryInterface $TbBoatSyussou,
        TbRaceIndexRepositoryInterface $TbRaceIndex,
        TbRaceTenboRepositoryInterface $TbRaceTenbo,
        TbRaceSyutujoWriteLogRepositoryInterface $TbRaceSyutujoWriteLog,
        RaceTenboSensyuImageRepositoryInterface $RaceTenboSensyuImage,
        FanDataRepositoryInterface $FanData,
        FandataManualRepositoryInterface $FandataManual,
        HolidayRepositoryInterface $Holiday,
        TbRaceSyutujoRepositoryInterface $TbRaceSyutujo,
        TbRaceSyutujoRacerRepositoryInterface $TbRaceSyutujoRacer,
        TbBoatsSensyusyussou2RepositoryInterface $TbBoatsSensyusyussou2,
        TbBoatsYusyoracerRepositoryInterface $TbBoatsYusyoracer,
        KyogiCommonService $KyogiCommon
    ){
        $this->KaisaiMaster = $KaisaiMaster;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
        $this->TbBoatSyussou = $TbBoatSyussou;
        $this->TbRaceIndex = $TbRaceIndex;
        $this->TbRaceTenbo = $TbRaceTenbo;
        $this->TbRaceSyutujoWriteLog = $TbRaceSyutujoWriteLog;
        $this->RaceTenboSensyuImage = $RaceTenboSensyuImage;
        $this->FanData = $FanData;
        $this->FandataManual = $FandataManual;
        $this->Holiday = $Holiday;
        $this->TbRaceSyutujo = $TbRaceSyutujo;
        $this->TbRaceSyutujoRacer = $TbRaceSyutujoRacer;
        $this->TbBoatsSensyusyussou2 = $TbBoatsSensyusyussou2;
        $this->TbBoatsYusyoracer = $TbBoatsYusyoracer;
        $this->KyogiCommon = $KyogiCommon;
    }


    public function index($request){
        $data = [];

        $id = $request->input('ID');
        $data['id'] = $id;
        
        $today_date = date('Ymd');
        $data['today_date'] = $today_date;

        $jyo = config('const.JYO_CODE');

        $race_index = $this->TbRaceIndex->getFirstRecordByPK($id);
        $data['race_index'] = $race_index;

        $race_syutujo = $this->TbRaceSyutujo->getFirstRecordByPK($id);
        $data['race_syutujo'] = $race_syutujo;

        $race_syutujo_racer_add = $this->TbRaceSyutujoRacer->getRecordForRaceTenbo($id,1);
        $race_syutujo_racer_delete = $this->TbRaceSyutujoRacer->getRecordForRaceTenbo($id,0);

        $sensyu_syussou2 = $this->TbBoatsSensyusyussou2->get1SetuRecord($jyo,$race_index->START_DATE);

        //??????????????????
        $zenkoku_start = "";
        $zenkoku_end = "";
        $tsu_start = "";
        $tsu_end = "";


        //????????????????????????????????????????????????
        $latest_race = $this->KaisaiMaster->getEndRecordByDate($jyo,$today_date);
        $tsu_end = $latest_race->????????????;
        //?????????????????????2??????????????????????????????????????????
        $tsu_start = date('Ym',strtotime('-2 year',strtotime($race_index->START_DATE))).'01';

        $fandata_manual = $this->FandataManual->getLatestRecord();
        $zenkoku_start = $fandata_manual->KiStart;
        $zenkoku_end = $fandata_manual->KiEnd;

        $data['zenkoku_start'] = $zenkoku_start;
        $data['zenkoku_end'] = $zenkoku_end;
        $data['tsu_start'] = $tsu_start;
        $data['tsu_end'] = $tsu_end;
        
        $data['nen'] = $fandata_manual->Nen;
        $data['ki'] = $fandata_manual->Ki;

        //?????????????????????
        $touban_list = [];
        $sensyu_syussou2_update_time = 0;//?????????????????????????????????????????????
        foreach($sensyu_syussou2 as $item){
            if(!in_array($item->TOUBAN,$touban_list)){
                $touban_list[] = $item->TOUBAN;
            }

            if($sensyu_syussou2_update_time === 0){
                $sensyu_syussou2_update_time = $item->TARGET_DATE;
            }elseif($sensyu_syussou2_update_time != $item->TARGET_DATE ){
                break;
            }
        }
        $data['sensyu_syussou2_update_time'] = $sensyu_syussou2_update_time;

        $race_syutujo_racer_add_list = [];
        foreach($race_syutujo_racer_add as $item){
            if(!in_array($item->TOUBAN,$race_syutujo_racer_add_list)){
                $race_syutujo_racer_add_list[$item->TOUBAN] = $item;
            }
        }

        $race_syutujo_racer_delete_list = [];
        foreach($race_syutujo_racer_delete as $item){
            if(!in_array($item->TOUBAN,$race_syutujo_racer_delete_list)){
                $race_syutujo_racer_delete_list[$item->TOUBAN] = $item;
            }
        }

        //?????????????????????????????????????????????
        if($race_syutujo_racer_delete_list){
            foreach($touban_list as $key=>$item){
                if(isset($race_syutujo_racer_delete_list[$item])){
                    unset($touban_list[$key]);
                }
            }
        }

        //??????????????????????????????????????????????????????????????????????????????????????????
        if($race_syutujo_racer_add_list){
            foreach($race_syutujo_racer_add_list as $touban=>$item){
                if(!in_array($touban,$touban_list)){
                    $touban_list[] = $touban;
                }
            }
        }
        $data['race_syutujo_racer_add_list'] = $race_syutujo_racer_add_list;


        //?????????????????????????????????????????????????????????
        $fan_data = $this->FandataManual->getRecordByYearAndPeriod($touban_list,$fandata_manual->Nen,$fandata_manual->Ki);

        $result_table = [];
        foreach($fan_data as $item){
            $result_table[$item->Touban] = $item;
        }

        {
            //???????????????????????????????????????????????????????????? ????????????????????????????????????
            //????????????????????????
            $touchi_rireki_all = $this->TbBoatSyussou->getKinkyoTouchiRirekiJoinKekkaAll($tsu_end,$touban_list,$jyo);
            $touchi_rireki_all_array = [];
            foreach($touchi_rireki_all as $item){
                $touchi_rireki_all_array[$item->TOUBAN][] = $item;
            }

            foreach($result_table as $touban=>$item){

                //????????????????????????????????????
                //$touchi_rireki_array = $this->TbBoatSyussou->getKinkyoTouchiRirekiJoinKekka($race_index->START_DATE,$touban,$jyo);
                $touchi_rireki_array = $touchi_rireki_all_array[$touban] ?? [];

                //????????????????????????????????????
                $race_title = $touchi_rireki_array[0]->RACE_TITLE ?? "";
                $touchi_rireki = [];
                //??????????????????
                $touchi_race_rireki_n = "";
                $setsukan_end = false;

                foreach($touchi_rireki_array as $key => $touchi_rireki_row){

                    //???????????????????????????????????????
                    if($tsu_start > $touchi_rireki_row->TARGET_DATE){
                        continue;
                    }
                    //????????????????????????????????????????????????????????????????????????
                    if($touchi_rireki_row->RACE_SYUBETU_CODE == '06' || $touchi_rireki_row->RACE_SYUBETU_CODE == '96' ){
                        //??????
                        //$touchi_race_rireki_n = $this->KyogiCommon->yusho_tyakujun_to_image($touchi_rireki_row->TYAKUJUN).$touchi_race_rireki_n;
                        $touchi_race_rireki_n = '<img src="/sp/images/i_y0'.$touchi_rireki_row->TYAKUJUN.'.gif" width="20" height="20">' .$touchi_race_rireki_n;
                    }elseif($touchi_rireki_row->RACE_SYUBETU_CODE == '05'){
                        //?????????
                        //$touchi_race_rireki_n = $this->KyogiCommon->junyu_tyakujun_to_image($touchi_rireki_row->TYAKUJUN).$touchi_race_rireki_n;
                        $touchi_race_rireki_n = '<img src="/sp/images/i_j0'.$touchi_rireki_row->TYAKUJUN.'.gif" width="20" height="20">' .$touchi_race_rireki_n;
                    }else{
                        $touchi_race_rireki_n = $touchi_rireki_row->TYAKUJUN.$touchi_race_rireki_n;
                    }

                    //??????????????????????????????????????????????????????????????????????????????
                    if(isset($touchi_rireki_array[$key + 1])){
                        if($race_title != $touchi_rireki_array[$key + 1]->RACE_TITLE){
                            $setsukan_end = true;
                        }else{
                            $setsukan_end = false;
                        }
                    }else{
                        $setsukan_end = true;
                    }

                    if($setsukan_end){
                        //??????????????????????????????????????????

                        //??????????????????????????????
                        $touchi_rireki['touchi_grade'] = $touchi_rireki_row->GRADE_CODE;
                        $touchi_rireki['touchi_target_date'] = $touchi_rireki_row->TARGET_DATE;
                        $touchi_rireki['touchi_tyakujun'] = $touchi_race_rireki_n;

                        break;

                    }

                    

                }

                $result_table[$touban]->touchi_rireki = $touchi_rireki;
                //var_dump($result_table[$touban]->touchi_rireki);

            }

            
        }

        {
            //???????????????????????????
            $race_tenbo = $this->TbRaceTenbo->getFirstRecordByPK($id);
            $tenbo_html_exists = false;
            if($race_tenbo){
                if(file_exists(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Tenbo/'.config('const.JYO_CODE').'/PC/t'.$id.'.htm')){
                    $tenbo_html_exists = true;
                }
            }
            $data['tenbo_html_exists'] = $tenbo_html_exists;
            
            $holiday = $this->Holiday->getAllRecordForFrontCalendar();
            $holiday_array=[];
            foreach($holiday as $item){
                $holiday_array[$item->HOLIDAYDATE] = $item->HOLIDAYNAME;
            }
            $data['holiday_array'] = $holiday_array;

            $race_index_date_list = [];
            $tmp_date = $race_index->START_DATE;
            while($tmp_date <= $race_index->END_DATE){
                $race_index_date_list[] = $tmp_date;
                $tmp_date = date("Ymd",strtotime('+1 day',strtotime($tmp_date)));
            }
            $data['race_index_date_list'] = $race_index_date_list;

            
            $data['weeks'] = GeneralService::create_week_label();
            $data['weeks_alpha'] = ['sun','mon','tue','wed','thu','fri','sat'];
            $data['grade_class'] = ['00','g3','g2','g1','sg',];
        }

        {
            //??????????????????????????????

            foreach($result_table as $touban=>$item){

                $yusyo_count = $this->TbBoatsYusyoracer->getCountTouchiYusyoBitweenDate($jyo,$touban,$tsu_start,$tsu_end);
                $result_table[$touban]->yusyo_count = ($yusyo_count ?? 0);

                $yusyutu_count = $this->TbBoatSyussou->getYusyutuCount($jyo,$tsu_start,$tsu_end,$touban);
                $result_table[$touban]->yusyutu_count = ($yusyutu_count ?? 0);

            }

        }

        
        $data['touban_list'] = $touban_list;
        $data['result_table'] = $result_table;

        return $data;
    }

    

}