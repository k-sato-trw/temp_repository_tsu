<?php

namespace App\Services\ExportHtml;

use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;
use App\Repositories\TbBoatSyussou\TbBoatSyussouRepositoryInterface;
use App\Repositories\TbRaceIndex\TbRaceIndexRepositoryInterface;
use App\Repositories\TbRaceTenbo\TbRaceTenboRepositoryInterface;
use App\Repositories\TbRaceSyutujoWriteLog\TbRaceSyutujoWriteLogRepositoryInterface;
use App\Repositories\RaceTenboSensyuImage\RaceTenboSensyuImageRepositoryInterface;
use App\Repositories\FanData\FanDataRepositoryInterface;
use App\Repositories\Holiday\HolidayRepositoryInterface;
use App\Repositories\TbTsuKaimon\TbTsuKaimonRepositoryInterface;
use App\Services\GeneralService;


class ExportTenboService
{
    public $KaisaiMaster;
    public $TbBoatRaceheader;
    public $TbBoatSyussou;
    public $TbRaceIndex;
    public $TbRaceTenbo;
    public $TbRaceSyutujoWriteLog;
    public $RaceTenboSensyuImage;
    public $FanData;
    public $Holiday;
    public $TbTsuKaimon;

    public function __construct(
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader,
        TbBoatSyussouRepositoryInterface $TbBoatSyussou,
        TbRaceIndexRepositoryInterface $TbRaceIndex,
        TbRaceTenboRepositoryInterface $TbRaceTenbo,
        TbRaceSyutujoWriteLogRepositoryInterface $TbRaceSyutujoWriteLog,
        RaceTenboSensyuImageRepositoryInterface $RaceTenboSensyuImage,
        FanDataRepositoryInterface $FanData,
        HolidayRepositoryInterface $Holiday,
        TbTsuKaimonRepositoryInterface $TbTsuKaimon
    ){
        $this->KaisaiMaster = $KaisaiMaster;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
        $this->TbBoatSyussou = $TbBoatSyussou;
        $this->TbRaceIndex = $TbRaceIndex;
        $this->TbRaceTenbo = $TbRaceTenbo;
        $this->TbRaceSyutujoWriteLog = $TbRaceSyutujoWriteLog;
        $this->RaceTenboSensyuImage = $RaceTenboSensyuImage;
        $this->FanData = $FanData;
        $this->Holiday = $Holiday;
        $this->TbTsuKaimon = $TbTsuKaimon;
    }


    public function index($request){
        $data = [];

        $id = $request->input('ID');
        $data['id'] = $id;
        $appear_flag = 1; 

        $race_index = $this->TbRaceIndex->getFirstRecordByPK($id);
        $race_tenbo = $this->TbRaceTenbo->getFirstRecordByPK($id);

        $race_tenbo->LETTER_BODY = str_replace('(???)','<span class="c_11">',$race_tenbo->LETTER_BODY);
        $race_tenbo->LETTER_BODY = str_replace('(/???)','</span>',$race_tenbo->LETTER_BODY);
        $race_tenbo->LEADLETTER_BODY = str_replace('(???)','<span class="c_11">',$race_tenbo->LEADLETTER_BODY);
        $race_tenbo->LEADLETTER_BODY = str_replace('(/???)','</span>',$race_tenbo->LEADLETTER_BODY);

        $data['race_index'] = $race_index;
        $data['race_tenbo'] = $race_tenbo;

        $reader_touban_list = [];
        for($i=1;$i<=12;$i++){
            $prop_name = "LEADER".$i;
            if($race_tenbo->$prop_name){
                $reader_touban_list[] = $race_tenbo->$prop_name;
            }
        }

        $sensyu_image = $this->RaceTenboSensyuImage->getRecordByToubanList($reader_touban_list);
        $sensyu_image_array = [];
        foreach($sensyu_image as $item){
            $sensyu_image_array[$item->??????] = $item;
        }
        $data['sensyu_image_array'] = $sensyu_image_array;

        
        $fan_data =  $this->FanData->getRecordByToubanList($reader_touban_list);
        $fan_data_array = [];
        foreach($fan_data as $item){
            $fan_data_array[$item->Touban] = $item;
            $fan_data_array[$item->Touban]->NameK = str_replace('??????',' ',$fan_data_array[$item->Touban]->NameK);
            $fan_data_array[$item->Touban]->NameK = str_replace('???','',$fan_data_array[$item->Touban]->NameK);
        }
        $data['fan_data_array'] = $fan_data_array;


        //??????????????????1???2 ????????????????????????????????????
        {
            $pickup_touban_list = [];
            if($race_tenbo->PICKUP){
                $pickup_touban_list[] = $race_tenbo->PICKUP;
            }
            if($race_tenbo->PICKUP2){
                $pickup_touban_list[] = $race_tenbo->PICKUP2;
            }
            $data['pickup_touban_list'] = $pickup_touban_list;


            $sensyu_image = $this->RaceTenboSensyuImage->getRecordByToubanList($pickup_touban_list);
            $pickup_sensyu_image_array = [];
            foreach($sensyu_image as $item){
                $pickup_sensyu_image_array[$item->??????] = $item;
            }
            $data['pickup_sensyu_image_array'] = $pickup_sensyu_image_array;
    
            
            $fan_data =  $this->FanData->getRecordByToubanList($pickup_touban_list);
            $pickup_fan_data_array = [];
            foreach($fan_data as $item){
                $pickup_fan_data_array[$item->Touban] = $item;
            }
            $data['pickup_fan_data_array'] = $pickup_fan_data_array;

        }


        $syutujo_write_log = $this->TbRaceSyutujoWriteLog->getFirstRecordByPK($id);
        $syutujo_html_exists = false;
        if($syutujo_write_log){
            if(file_exists(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Syutujo/'.config('const.JYO_CODE').'/PC/s'.$id.'.htm')){
                $syutujo_html_exists = true;
            }
        }
        $data['syutujo_html_exists'] = $syutujo_html_exists;
        $data['syutujo_write_log'] = $syutujo_write_log;


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

        
        {//?????????????????????????????????
            $pickup_data_array = [];

            for($num = 1;$num <= 6;$num++){
                
                $prop_name = 'LEADER'.$num;
                $pickup_data_array[$prop_name] = $race_tenbo->$prop_name;

                $prop_name = 'PICKUP_LEAD'.$num;
                $pickup_data_array[$prop_name] = $race_tenbo->$prop_name;

                $prop_name = 'PICKUP_SEISEKI_STANDARD_DATE'.$num;
                $pickup_data_array[$prop_name] = $race_tenbo->$prop_name;

                for($num2 = 1;$num2 <= 4;$num2++){
                    $prop_name = 'PICKUP_SEISEKI_DATE'.$num.'_'.$num2;
                    $pickup_data_array[$prop_name] = $race_tenbo->$prop_name;

                    $prop_name = 'PICKUP_SEISEKI_GRADE'.$num.'_'.$num2;
                    $pickup_data_array[$prop_name] = $race_tenbo->$prop_name;

                    $prop_name = 'PICKUP_SEISEKI_JYO'.$num.'_'.$num2;
                    $pickup_data_array[$prop_name] = $race_tenbo->$prop_name;

                    $SEISEKI = '';

                    $prop_name = 'PICKUP_SEISEKI_y_'.$num.'_'.$num2;
                    $SEISEKI .= $race_tenbo->$prop_name;

                    $prop_name = 'PICKUP_SEISEKI_j_'.$num.'_'.$num2;
                    if($race_tenbo->$prop_name){
                        $array = str_split($race_tenbo->$prop_name);
                        foreach($array as $item){
                            $SEISEKI .= '<img src="/01tenbo/images/kako'.$item.'_j.png" alt="'.$item.'" width="14" height="14">';
                        }
                    }

                    $prop_name = 'PICKUP_SEISEKI_v_'.$num.'_'.$num2;
                    if($race_tenbo->$prop_name){
                        $array = str_split($race_tenbo->$prop_name);
                        foreach($array as $item){
                            $SEISEKI .= '<img src="/01tenbo/images/kako'.$item.'_y.png" alt="'.$item.'" width="14" height="14">';
                        }
                    }

                    $prop_name = 'PICKUP_SEISEKI_e_'.$num.'_'.$num2;
                    $SEISEKI .= $race_tenbo->$prop_name;

                    $pickup_data_array['SEISEKI'.$num.'_'.$num2] = $SEISEKI;
                }
            }


            $data['pickup_data_array'] = $pickup_data_array;

        }

        $kaimon = $this->TbTsuKaimon->getOneMonthRecordForFront($race_index->START_DATE,$race_index->END_DATE);
        $data['kaimon'] = $kaimon[0]; 

        return $data;
    }

    public function  select_js_create($request,$device)
    {
        $id = $request->input('ID');
        $data['id'] = $id;
        $appear_flag = 1; 

        $taget_date = date('Ymd');
        //$taget_date = '20210304';

        $race_index = $this->TbRaceIndex->getUnfinishedRecord($taget_date);

        $id_list = [];
        foreach($race_index as $item){
            $id_list[] = $item->ID;
        }

        $race_tenbo = $this->TbRaceTenbo->getRecordByIdlist($id_list);
        
        $race_tenbo_array = [];
        foreach($race_tenbo as $item){
            $race_tenbo_array[$item->ID] = $item;
        }

        $data['race_index'] = $race_index;
        $data['race_tenbo_array'] = $race_tenbo_array;

        if($device == 'pc'){
            $tenbo_url_array = [];
            foreach($race_index as $item){
                $tenbo_url_array[$item->ID] = "";
                if($item->PC_TENBO_URL){
                    $tenbo_url_array[$item->ID] = $item->PC_TENBO_URL;
                }else{
                    if(file_exists(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Tenbo/'.config('const.JYO_CODE').'/PC/t'.$item->ID.'.htm')){
                        $tenbo_url_array[$item->ID] = '/asp/htmlmade/Race/Tenbo/'.config('const.JYO_CODE').'/PC/t'.$item->ID.'.htm';
                    }
                }
            }
            $data['tenbo_url_array'] = $tenbo_url_array;        

            $syutujo_write_log = $this->TbRaceSyutujoWriteLog->getRecordByIdlistForFront($id_list);
            $syutujo_url_array = [];
            foreach($race_index as $item){
                $syutujo_url_array[$item->ID] = "";
                if($item->PC_SYUTUJO_URL){
                    $syutujo_url_array[$item->ID] = $item->PC_SYUTUJO_URL;
                }else{
                    if(file_exists(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Syutujo/'.config('const.JYO_CODE').'/PC/s'.$item->ID.'.htm')){
                        $syutujo_url_array[$item->ID] = '/asp/htmlmade/Race/Syutujo/'.config('const.JYO_CODE').'/PC/s'.$item->ID.'.htm';
                    }
                }
            }
            $data['syutujo_url_array'] = $syutujo_url_array;
        }else{
            $tenbo_url_array = [];
            foreach($race_index as $item){
                $tenbo_url_array[$item->ID] = "";
                if($item->SP_TENBO_URL){
                    $tenbo_url_array[$item->ID] = $item->SP_TENBO_URL;
                }else{
                    if(file_exists(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Tenbo/'.config('const.JYO_CODE').'/SP/t'.$item->ID.'.htm')){
                        $tenbo_url_array[$item->ID] = '/asp/htmlmade/Race/Tenbo/'.config('const.JYO_CODE').'/SP/t'.$item->ID.'.htm';
                    }
                }
            }
            $data['tenbo_url_array'] = $tenbo_url_array;        

            $syutujo_write_log = $this->TbRaceSyutujoWriteLog->getRecordByIdlistForFront($id_list);
            $syutujo_url_array = [];
            foreach($race_index as $item){
                $syutujo_url_array[$item->ID] = "";
                if($item->SP_SYUTUJO_URL){
                    $syutujo_url_array[$item->ID] = $item->SP_SYUTUJO_URL;
                }else{
                    if(file_exists(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Syutujo/'.config('const.JYO_CODE').'/SP/s'.$item->ID.'.htm')){
                        $syutujo_url_array[$item->ID] = '/asp/htmlmade/Race/Syutujo/'.config('const.JYO_CODE').'/SP/s'.$item->ID.'.htm';
                    }
                }
            }
            $data['syutujo_url_array'] = $syutujo_url_array;
        }

        return $data;
    }

    

}