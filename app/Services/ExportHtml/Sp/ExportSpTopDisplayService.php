<?php

namespace App\Services\ExportHtml\Sp;

use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\TbTsuCalendar\TbTsuCalendarRepositoryInterface;
use App\Repositories\ChushiJunen\ChushiJunenRepositoryInterface;
use App\Repositories\Holiday\HolidayRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;
use App\Repositories\TbTsuTokutenritu\TbTsuTokutenrituRepositoryInterface;
use App\Repositories\TbRaceIndex\TbRaceIndexRepositoryInterface;
use App\Repositories\TbRaceTenbo\TbRaceTenboRepositoryInterface;
use App\Repositories\FanData\FanDataRepositoryInterface;
use App\Repositories\FandataManual\FandataManualRepositoryInterface;
use App\Repositories\RaceTenboSensyuImage\RaceTenboSensyuImageRepositoryInterface;
use App\Repositories\TbRaceSyutujoWriteLog\TbRaceSyutujoWriteLogRepositoryInterface;
use App\Repositories\TbTsuEventfanmaster\TbTsuEventfanmasterRepositoryInterface;
use App\Repositories\TbTsuEventfan\TbTsuEventfanRepositoryInterface;
use App\Repositories\TbRaceSyutujoRacer\TbRaceSyutujoRacerRepositoryInterface;
use App\Repositories\Holding\HoldingRepositoryInterface;
use App\Repositories\TbTsuKaimon\TbTsuKaimonRepositoryInterface;
use App\Repositories\TbTsuInformation\TbTsuInformationRepositoryInterface;
use App\Repositories\TbTsuTopic\TbTsuTopicRepositoryInterface;
use App\Repositories\BannerManagement\BannerManagementRepositoryInterface;
use App\Library\ExchangeText;
use App\Services\KyogiCommonService;

class ExportSpTopDisplayService
{
    public $KaisaiMaster;
    public $TbTsuCalendar;
    public $ChushiJunen;
    public $Holiday;
    public $TbBoatRaceheader;
    public $TbTsuTokutenritu;
    public $TbRaceIndex;
    public $TbRaceTenbo;
    public $FanData;
    public $FandataManual;
    public $RaceTenboSensyuImage;
    public $TbRaceSyutujoWriteLog;
    public $TbTsuEventfanmaster;
    public $TbTsuEventfan;
    public $TbRaceSyutujoRacer;
    public $Holding;
    public $TbTsuKaimon;
    public $TbTsuInformation;
    public $TbTsuTopic;
    public $BannerManagement;
    public $ExchangeText;
    public $KyogiCommon;

    public function __construct(
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        TbTsuCalendarRepositoryInterface $TbTsuCalendar,
        ChushiJunenRepositoryInterface $ChushiJunen,
        HolidayRepositoryInterface $Holiday,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader,
        TbTsuTokutenrituRepositoryInterface $TbTsuTokutenritu,
        TbRaceIndexRepositoryInterface $TbRaceIndex,
        TbRaceTenboRepositoryInterface $TbRaceTenbo,
        FanDataRepositoryInterface $FanData,
        FandataManualRepositoryInterface $FandataManual,
        RaceTenboSensyuImageRepositoryInterface $RaceTenboSensyuImage,
        TbRaceSyutujoWriteLogRepositoryInterface $TbRaceSyutujoWriteLog,
        TbTsuEventfanmasterRepositoryInterface $TbTsuEventfanmaster,
        TbTsuEventfanRepositoryInterface $TbTsuEventfan,
        TbRaceSyutujoRacerRepositoryInterface $TbRaceSyutujoRacer,
        HoldingRepositoryInterface $Holding,
        TbTsuKaimonRepositoryInterface $TbTsuKaimon,
        TbTsuInformationRepositoryInterface $TbTsuInformation,
        TbTsuTopicRepositoryInterface $TbTsuTopic,
        BannerManagementRepositoryInterface $BannerManagement,
        ExchangeText $ExchangeText,
        KyogiCommonService $KyogiCommon
    ){
        $this->KaisaiMaster = $KaisaiMaster;
        $this->TbTsuCalendar = $TbTsuCalendar;
        $this->ChushiJunen = $ChushiJunen;
        $this->Holiday = $Holiday;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
        $this->TbTsuTokutenritu = $TbTsuTokutenritu;
        $this->TbRaceIndex = $TbRaceIndex;
        $this->TbRaceTenbo = $TbRaceTenbo;
        $this->FanData = $FanData;
        $this->FandataManual = $FandataManual;
        $this->RaceTenboSensyuImage = $RaceTenboSensyuImage;
        $this->TbRaceSyutujoWriteLog = $TbRaceSyutujoWriteLog;
        $this->TbTsuEventfanmaster = $TbTsuEventfanmaster;
        $this->TbTsuEventfan = $TbTsuEventfan;
        $this->TbRaceSyutujoRacer = $TbRaceSyutujoRacer;
        $this->Holding = $Holding;
        $this->TbTsuKaimon = $TbTsuKaimon;
        $this->TbTsuInformation = $TbTsuInformation;
        $this->TbTsuTopic = $TbTsuTopic;
        $this->BannerManagement = $BannerManagement;
        $this->ExchangeText = $ExchangeText;
        $this->KyogiCommon = $KyogiCommon;
    }

    
    public function index($request,$is_preview=false){
        $data = [];
        $jyo = config('const.JYO_CODE');
        $data['jyo'] = $jyo;

        $target_date = $request->input('preDate') ?? date('Ymd');
        $target_time = date('Hi');
        $data['target_date'] = $target_date;

        $tomorrow_date = date('Ymd', strtotime('+1 day'.$target_date));
        $data['tomorrow_date'] = $tomorrow_date;

        $kaisai = $this->TbTsuCalendar->getKaisai($target_date);
        $data['kaisai'] = $kaisai;

        $kaisai_start_date = false;
        if($kaisai){
            $kaisai_start_date = $kaisai->START_DATE;
            $kaisai_data = $kaisai;

            //?????????????????????
            $tokutenritu = $this->TbTsuTokutenritu->getRecordByBitweenDate($kaisai_start_date,$target_date);
            $data['tokutenritu'] = $tokutenritu;
        }else{
            $next_kaisai = $this->TbTsuCalendar->getJisetsuKaisai($target_date);
            if($next_kaisai){
                $kaisai_start_date = $next_kaisai->START_DATE;
                $kaisai_data = $next_kaisai;
            }

            //????????????????????????
            $race_index = $this->TbRaceIndex->getFirstRecordForPickup($next_kaisai->START_DATE,$next_kaisai->END_DATE);   
            $data['race_index'] = $race_index;

            $tenbo_url = '';

            if($race_index){

                $tenbo_url = $race_index->SP_TENBO_URL ?? '';

                if(!$tenbo_url){
                    $tenbo_url = $race_index->SP_SYUTUJO_URL ?? '';
                }

                if(!$tenbo_url){
                    $race_tenbo = $this->TbRaceTenbo->getFirstRecordForTop($race_index->ID);
                    
                    if($race_tenbo){
                        if(file_exists(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Tenbo/09/SP/t'.$race_tenbo->ID.'.htm')){
                            $tenbo_url = '/asp/htmlmade/Race/Tenbo/09/SP/t'.$race_tenbo->ID.'.htm';
                        }
                    }
                }
                if(!$tenbo_url){
                    $syutujo_write_log = $this->TbRaceSyutujoWriteLog->getFirstRecordByPK($race_index->ID);

                    if($syutujo_write_log){
                        if(file_exists(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Syutujo/09/SP/s'.$syutujo_write_log->ID.'.htm')){
                            $tenbo_url = '/asp/htmlmade/Race/Syutujo/09/SP/s'.$syutujo_write_log->ID.'.htm';
                        }
                    }
                }

            }

            $data['tenbo_url'] = $tenbo_url;

            $event_fan_master = $this->TbTsuEventfanmaster->getRecordForTop($kaisai_data->ID);
            $event_fan = $this->TbTsuEventfan->getRecordForTop($kaisai_data->ID);

            $data['event_fan_master'] = $event_fan_master;
            $data['event_fan'] = $event_fan;
            
        }

        $data['kaisai_start_date'] = $kaisai_start_date;
        $data['kaisai_data'] = $kaisai_data;

        //????????????????????????
        $tmp_date = $kaisai_data->START_DATE;
        $end_date = $kaisai_data->END_DATE;
        $kaisai_day_list = [];
        while($tmp_date <= $end_date){
            $kaisai_day_list[] = $tmp_date;
            $tmp_date = date("Ymd",strtotime("+1 day",strtotime($tmp_date)));
        }
        $data['kaisai_day_list'] = $kaisai_day_list;


        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;

        $kaimon_time = "0730";
        $st_time = '0000';
        $kaimon = $this->TbTsuKaimon->getFirstRecordForFront($target_date,$is_preview);
        if($kaimon){
            $kaimon_time = $kaimon->KAIMON_TIME;
            $st_time = $kaimon->ST_TIME;
        }else{
            $kaimon_time = "----";
            $st_time = '----';
        }
        $data['kaimon_time'] = $kaimon_time;
        $data['st_time'] = $st_time;

        //?????????????????????????????????????????????
        if($kaisai){
            $motor_check = $this->TbTsuCalendar->getMotorCheckDate($target_date);
        }else{
            $motor_check = $this->TbTsuCalendar->getMotorCheckDate($target_date,0);
        }
        $data['motor_check'] = $motor_check;

        //??????
        $honjyo_jyogai = $this->TbTsuCalendar->getHonjyoJyogai($target_date);
        $data['honjyo_jyogai'] = $honjyo_jyogai;
        
        //???????????????
        $sotomuke_jyogai = $this->TbTsuCalendar->getSotomukeJyogai($target_date);
        $data['sotomuke_jyogai'] = $sotomuke_jyogai;

        //??????????????????????????????
        $jyogai_chushi = $this->ChushiJunen->getChushiRecordForTop($target_date);
        $jyogai_chushi_array = [];
        foreach($jyogai_chushi as $item){
            $jyogai_chushi_array[substr($item->????????????,1,2)] = $item;
        }
        $data['jyogai_chushi_array'] = $jyogai_chushi_array;


        $headline = $this->TbTsuInformation->getFirstHeadlineSp($target_date);
        $data['headline'] = $headline;

        //???????????????????????????
        $topic = $this->TbTsuTopic->getAppearRecordForFront($target_date,'sp');
        $data['topic_array'] = $topic;


        //?????????????????????
        //????????????????????????????????????
        $news_all = [];
        $news_count = 1;
        $information = $this->TbTsuInformation->getRecordForSpTop($target_date.$target_time, false);
        foreach($information as $item){
            $row = [];
            $row['ID'] = $item->ID;
            $row['VIEW_DATE'] = date('Ymd',strtotime($item->VIEW_DATE));
            $row['TITLE'] = $item->TITLE;
            $row['TYPE'] = $item->TYPE;

            $row['TEXT'] = $item->TEXT;
            $row['IMAGE_1'] = $item->IMAGE_1;
            $row['IMAGE_2'] = $item->IMAGE_2;
            $row['IMAGE_3'] = $item->IMAGE_3;

            $row['NEW_FLG'] = $item->NEW_FLG;
            if($item->SP_LINK){
                $row['SP_LINK'] = $item->SP_LINK;
            }else{
                $row['SP_LINK'] = $item->PC_LINK;
            }
            $row['SP_LINK_WINDOW_FLG'] = $item->SP_LINK_WINDOW_FLG;
            $row['UPDATE_TIME'] = $item->UPDATE_TIME;
            $news_all[$row['VIEW_DATE']."_".$row['UPDATE_TIME'].'_'.str_pad($news_count, 4, '0', STR_PAD_LEFT)] = $row;
            $news_count++;
        }

        //??????????????????
        if(file_exists(config('const.EXPORT_PATH')."/asp/kyogi/09/motor_check/".$kaisai_start_date."_sp.htm")){
            
            if($kaisai_start_date){

                //????????????????????????????????????????????????????????????
                $motor_list = $this->TbMotorList->getFirstRecordForEvent($kaisai_start_date);

                if($motor_list){

                    $row = [];
                    $row['ID'] = "";
                    $row['VIEW_DATE'] = date('Ymd',strtotime('-1 day',strtotime($kaisai_start_date))); //??????
                    $row['TITLE'] = "?????????????????????".$kaisai_data->RACE_TITLE;
                    $row['TYPE'] = 1;

                    $row['TEXT'] = "";
                    $row['IMAGE_1'] = "";
                    $row['IMAGE_2'] = "";
                    $row['IMAGE_3'] = "";
        
                    $row['NEW_FLG'] = 1;
                    $row['SP_LINK'] = "/asp/kyogi/09/sp/motor/motor.htm";
                    $row['SP_LINK_WINDOW_FLG'] = 0;
                    $row['UPDATE_TIME'] = substr($motor_list->RESIST_TIME,0,12);
                    $news_all[$row['VIEW_DATE']."_".$row['UPDATE_TIME'].'_'.str_pad($news_count, 4, '0', STR_PAD_LEFT)] = $row;
                    $news_count++;

                }
            }
        }

        //?????????
        krsort($news_all);
        $data['news_all'] = $news_all;
        //?????????????????????

        return $data;
    }

    public function index_race_info($request){
        $data = [];
        
        $kaisai_flg = false;
        $chushi_flg = false;
        $stop_race_num = 99;

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;

        $target_date = date('Ymd');
        $target_date = '20210525';
        $data['target_date'] = $target_date;
        $target_time = date('Hi');
        $data['target_time'] = $target_time;
        
        $tomorrow_date = date('Ymd',strtotime('+1 day',strtotime($target_date)));
        //$data['tomorrow_date'] = $tomorrow_date;

        //$kaisai = $this->TbTsuCalendar->getKaisai($today_date);
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $tomorrow_kaisai = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$tomorrow_date);
        if($tomorrow_kaisai){
            $tomorrow_race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$tomorrow_date);
            $data['tomorrow_race_header'] = $tomorrow_race_header; 
        }

        //?????????????????????????????????????????????????????????????????????????????????????????????
        //$calendar = $this->TbTsuCalendar->getRecentRecordByDate($today_date);

        if($kaisai_master){
            $kaisai_flg = true;

            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
            

            //?????????????????????
            $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
            
            if($chushi_junen){
                //???????????????
                $chushi_flg = true;
                $stop_race_num = $chushi_junen->???????????????????????????;

            }else{
                $neer_ozz_race_number = $this->KyogiCommon->getNeerOzzRaceNumber($jyo,$target_date,$target_time);
                $neer_kekka_race_number = $this->KyogiCommon->getNeerKekkaRaceNumber($jyo,$target_date);
                $neer_kekka_race_number_tfinfo = $this->KyogiCommon->getNeerKekkaRaceNumberTfinfo($jyo,$target_date);

                if($neer_ozz_race_number == 0 && ( $neer_kekka_race_number == 12 || $neer_kekka_race_number_tfinfo == 12 )){
                    //???????????????
                    $target_race_num = "";
                    $shimekiri = "";

                }elseif($neer_ozz_race_number == 0 && ( $neer_kekka_race_number == 11 || $neer_kekka_race_number_tfinfo == 11 )){
                    //12???????????????????????????
                    $target_race_num = 12;
                    $shimekiri = $race_header->SIMEKIRI_JIKOKU12R;

                }else{

                    $target_race_num = $neer_ozz_race_number;
                    $prop_name = 'SIMEKIRI_JIKOKU'.$target_race_num.'R';
                    $shimekiri = $race_header->$prop_name;
                }

                $data['target_race_num'] = $target_race_num;
                $data['shimekiri'] = $shimekiri;
                $data['neer_ozz_race_number'] = $neer_ozz_race_number;
                $data['neer_kekka_race_number'] = $neer_kekka_race_number;
                $data['neer_kekka_race_number_tfinfo'] = $neer_kekka_race_number_tfinfo;

                if($target_race_num && $shimekiri){
                    //??????????????????????????????????????????????????????????????????????????????????????????
                    $syussou = $this->KyogiCommon->create_syussou_array($jyo,$target_date,$target_race_num);
                    $data['syussou'] = $syussou;


                }
            }
        
        }else{
            //?????????
            $kaisai_flg = false;
        }

        if($kaisai_flg){
            $Holding = $this->Holding->getFirstRecordForFront();

            if($Holding->?????????????????? > $target_time){
                //??????????????????
                $live_flg = 2;

            }elseif($Holding->?????????????????? < $target_time){
                //??????????????????
                $live_flg = 3;

            }else{
                //????????????????????????
                $live_flg = 1;

            }

            if($chushi_flg){
                //???????????????????????????
                $live_flg = 4;
            }

        }else{
            $live_flg = 0;
        }


        $data['kaisai_master'] = $kaisai_master;
        $data['tomorrow_kaisai'] = $tomorrow_kaisai;

        $data['kaisai_flg'] = $kaisai_flg;
        $data['chushi_flg'] = $chushi_flg;
        $data['stop_race_num'] = $stop_race_num;
        $data['live_flg'] = $live_flg;
        

        return $data;
    }


    


}