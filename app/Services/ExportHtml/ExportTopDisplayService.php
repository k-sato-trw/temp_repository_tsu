<?php

namespace App\Services\ExportHtml;

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

class ExportTopDisplayService
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

        $kaisai = $this->TbTsuCalendar->getKaisai($target_date);
        $data['kaisai'] = $kaisai;

        $kaisai_start_date = false;
        if($kaisai){
            $kaisai_start_date = $kaisai->START_DATE;
            $kaisai_data = $kaisai;
        }else{
            $kaisai_tomorrow = $this->TbTsuCalendar->getJisetsuKaisai(date('Ymd', strtotime('+1 day'.$target_date)));
            if($kaisai_tomorrow){
                $kaisai_start_date = $kaisai_tomorrow->START_DATE;
                $kaisai_data = $kaisai_tomorrow;
            }
        }
        $data['kaisai_start_date'] = $kaisai_start_date;

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


        $headline = $this->TbTsuInformation->getFirstHeadlinePc($target_date);
        $data['headline'] = $headline;

        //???????????????????????????
        $topic = $this->TbTsuTopic->getAppearRecordForFront($target_date,'pc');
        $box_count = 0;
        $topic_array = [];
        $three_count = 0;
        $array_count = 0;
        foreach($topic as $item){
            if($item->BIG_FLAG){
                $box_count += 3;
                $three_count += 3;
            }else{
                $box_count += 1;
                $three_count += 1;
            }

            $topic_array[$array_count][$three_count] = $item;

            if($three_count == 3){
                $three_count = 0;
                $array_count += 1;
            }
        }
        $data['topic_array'] = $topic_array;
        $data['box_count'] = $box_count;


        //?????????????????????
        //????????????????????????????????????
        $news_all = [];
        $news_count = 1;
        $information = $this->TbTsuInformation->getRecordForPcTop($target_date.$target_time, false);
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
            $row['PC_LINK'] = $item->PC_LINK;
            $row['PC_LINK_WINDOW_FLG'] = $item->PC_LINK_WINDOW_FLG;
            $row['UPDATE_TIME'] = $item->UPDATE_TIME;
            $news_all[$row['VIEW_DATE']."_".$row['UPDATE_TIME'].'_'.str_pad($news_count, 4, '0', STR_PAD_LEFT)] = $row;
            $news_count++;
        }

        //??????????????????
        if(file_exists(config('const.EXPORT_PATH')."/asp/kyogi/09/motor_check/".$kaisai_start_date.".htm")){
            
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
                    $row['PC_LINK'] = "/asp/tsu/kaisai/kaisaiindex.htm?page=3";
                    $row['PC_LINK_WINDOW_FLG'] = 0;
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


        $banner = $this->BannerManagement->getRecordForFront($target_date,false);
        $data['banner'] = $banner;


        return $data;
    }

    public function index_race_info($request){
        $data = [];
        
        $kaisai_flg = false;
        $zenken_flg = false;

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;

        $today_date = date('Ymd');
        $today_time = date('Hi');
        $data['today_time'] = $today_time;
        //$today_date = '20210525';
        $data['today_date'] = $today_date;
        $tomorrow_date = date('Ymd',strtotime('+1 day',strtotime($today_date)));
        $data['tomorrow_date'] = $tomorrow_date;

        $kaisai = $this->TbTsuCalendar->getKaisai($today_date);
        //$kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$today_date);

        //?????????????????????????????????????????????????????????????????????????????????????????????
        $calendar = $this->TbTsuCalendar->getRecentRecordByDate($today_date);

        if($kaisai){
            $kaisai_flg = true;

            //????????????????????????
            $tmp_date = $kaisai->START_DATE;
            $end_date = $kaisai->END_DATE;
            $kaisai_day_list = [];
            while($tmp_date <= $end_date){
                $kaisai_day_list[] = $tmp_date;
                $tmp_date = date("Ymd",strtotime("+1 day",strtotime($tmp_date)));
            }
            $data['kaisai_day_list'] = $kaisai_day_list;


            //?????????????????????
            $chushi_junen = $this->ChushiJunen->getChushiRecordBitweenDate($kaisai->START_DATE,$kaisai->END_DATE);
            $chushi_junen_array = [];
            foreach($chushi_junen as $item){
                $chushi_junen_array[$item->????????????] = $item;
            }
            $data['chushi_junen_array'] = $chushi_junen_array;

            $holiday = $this->Holiday->getRecordBitweenDate($kaisai->START_DATE,$kaisai->END_DATE);
            $holiday_array = [];
            foreach($holiday as $item){
                $holiday_array[$holiday->HOLIDAYDATE] = $holiday->HOLIDAYNAME;
            }
            $data['holiday_array'] = $holiday_array;


            $highlight_date = "";
            if($today_time >= 1815){
                if($kaisai->END_DATE == $today_date){
                    //???????????????????????????
                    $highlight_date = $today_date;
                }else{
                    //????????????????????????
                    $highlight_date = $tomorrow_date;
                }
            }else{
                $highlight_date = $today_date;
            }

            //???????????????
            foreach($kaisai_day_list as $key=>$item){
                if($highlight_date == $item){
                    if($key == 0){
                        $highlight_label = "??????";
                        $highlight_day = 1;
                    }elseif($highlight_date == $kaisai->END_DATE){
                        $highlight_label = "?????????";
                        $highlight_day = 0;
                    }else{
                        $highlight_label = ($key + 1)."??????";
                        $highlight_day = ($key + 1);
                    }
                    break;
                }
            }

            $data['highlight_label'] = $highlight_label;
            $data['highlight_day'] = $highlight_day;

            
            $tokutenritu = $this->TbTsuTokutenritu->getRecordByBitweenDate($kaisai->START_DATE,$today_date);
            $data['tokutenritu'] = $tokutenritu;

        }else{
            //???????????????????????????
            //$next_kaisai = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$tomorrow_date);
            $next_kaisai = $this->TbTsuCalendar->getJisetsuKaisai($today_date);
            $zenken_flg = true;

            //????????????????????????
            $tmp_date = $next_kaisai->START_DATE;
            $end_date = $next_kaisai->END_DATE;
            $kaisai_day_list = [];
            while($tmp_date <= $end_date){
                $kaisai_day_list[] = $tmp_date;
                $tmp_date = date("Ymd",strtotime("+1 day",strtotime($tmp_date)));
            }
            $data['kaisai_day_list'] = $kaisai_day_list;


            //?????????????????????
            $chushi_junen = $this->ChushiJunen->getChushiRecordBitweenDate($next_kaisai->START_DATE,$next_kaisai->END_DATE);
            $chushi_junen_array = [];
            foreach($chushi_junen as $item){
                $chushi_junen_array[$item->????????????] = $item;
            }
            $data['chushi_junen_array'] = $chushi_junen_array;


            $holiday = $this->Holiday->getRecordBitweenDate($next_kaisai->START_DATE,$next_kaisai->END_DATE);
            $holiday_array = [];
            foreach($holiday as $item){
                $holiday_array[$holiday->HOLIDAYDATE] = $holiday->HOLIDAYNAME;
            }
            $data['holiday_array'] = $holiday_array;

            $race_index = $this->TbRaceIndex->getFirstRecordForPickup($next_kaisai->START_DATE,$next_kaisai->END_DATE);
            
            $data['race_index'] = $race_index;

            if($race_index){
                
                $race_tenbo = $this->TbRaceTenbo->getFirstRecordForTop($race_index->ID);

                if($race_tenbo){
                    if(date('md',strtotime($today_date)) <= "0630"){
                        $kibetu_date = date('Y',strtotime($today_date))."0701";
                        $next_kibetu = date('Y',strtotime($today_date))."2";
                        $now_nenki = date('Y',strtotime($today_date))."1";
                    }else{
                        $kibetu_date = date('Y',strtotime($today_date))."0101";
                        $next_kibetu = (date('Y',strtotime($today_date)) + 1)."1";
                        $now_nenki = date('Y',strtotime($today_date))."2";
                    }
                    $race_tenbo->TITLE = $this->ExchangeText->compile($race_tenbo->TITLE);
                    $race_tenbo->LETTER_BODY = $this->ExchangeText->compile($race_tenbo->LETTER_BODY);

                    $event_fan_master = $this->TbTsuEventfanmaster->getRecordForTop($calendar->ID);
                    $event_fan = $this->TbTsuEventfan->getRecordForTop($calendar->ID);

                    //???????????????????????????
                    $leader_array = [];
                    $leader_list = [];
                    for($i=1;$i<=6;$i++){
                        $prop_name = "LEADER".$i;
                        if($race_tenbo->$prop_name){
                            $leader_array[$prop_name] = $race_tenbo->$prop_name;
                            $leader_list[] = $race_tenbo->$prop_name;
                        }
                    }

                    $fandata = $this->FanData->getRecordByToubanList($leader_list);
                    $fandata_array = [];
                    foreach($fandata as $item){
                        $fandata_array[$item->Touban] = $item;
                    }


                    $fandata_manual = $this->FandataManual->getRecordByToubanList($leader_list,$next_kibetu);
                    $fandata_manual_array = [];
                    foreach($fandata_manual as $item){
                        $fandata_manual_array[$item->Touban] = $item;
                    }
                    
    
                    $sensyu_image = $this->RaceTenboSensyuImage->getRecordByToubanList($leader_list);
                    $sensyu_image_array = [];
                    foreach($sensyu_image as $item){
                        $sensyu_image_array[$item->??????] = $item;
                    }
                }

                $syutujo_write_log = $this->TbRaceSyutujoWriteLog->getFirstRecordByPK($race_index->ID);
            }

            

        }

        $data['kaisai'] = $kaisai;
        $data['calendar'] = $calendar;
        $data['next_kaisai'] = $next_kaisai ?? [];

        $data['kaisai_flg'] = $kaisai_flg;
        $data['zenken_flg'] = $zenken_flg;

        $data['race_index'] = $race_index ?? [];
        $data['race_tenbo'] = $race_tenbo ?? [];
        $data['syutujo_write_log'] = $syutujo_write_log ?? [];
        $data['kibetu_date'] = $kibetu_date ?? [];
        $data['next_kibetu'] = $next_kibetu ?? [];
        $data['now_nenki'] = $now_nenki ?? [];

        $data['event_fan_master'] = $event_fan_master ?? [];
        $data['event_fan'] = $event_fan ?? [];
        $data['leader_array'] = $leader_array ?? [];
        $data['fandata_array'] = $fandata_array ?? [];
        $data['fandata_manual_array'] = $fandata_manual_array ?? [];
        $data['sensyu_image_array'] = $sensyu_image_array ?? [];
        

        return $data;
    }


    public function index_kaisai_jokyo($request){
        $data = [];
        
        $kaisai_flg = false;

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;

        $target_date = date('Ymd');
        $target_time = date('Hi');
        $data['target_time'] = $target_time;
        //$target_date = '20210525';
        $data['target_date'] = $target_date;
        $tomorrow_date = date('Ymd',strtotime('+1 day',strtotime($target_date)));
        $data['tomorrow_date'] = $tomorrow_date;


        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;

        $kaisai_flg = false;
        if($kaisai_master){

            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
            $data['race_header'] = $race_header;

            $neer_ozz_race_number = $this->KyogiCommon->getNeerOzzRaceNumber($jyo,$target_date,$target_time);
            $neer_kekka_race_number = $this->KyogiCommon->getNeerKekkaRaceNumber($jyo,$target_date);
            $neer_kekka_race_number_tfinfo = $this->KyogiCommon->getNeerKekkaRaceNumberTfinfo($jyo,$target_date);

            $chushi_flg = false;
            if($chushi_junen){
                $chushi_flg = true;
            }else{
                if($neer_ozz_race_number == 0 && ($neer_kekka_race_number == 12 || $neer_kekka_race_number_tfinfo == 12)){
                    //???????????????
                    $race_num = "";
                    $shimekiri = "";
                    $race12_flg = 0;

                }elseif($neer_ozz_race_number == 0 && ($neer_kekka_race_number == 11 || $neer_kekka_race_number_tfinfo == 11)){
                    //12?????????????????????
                    $race_num = "12";
                    $prop_name = "SIMEKIRI_JIKOKU12R";
                    $shimekiri = $race_header->$prop_name;
                    if($shimekiri){
                        $shimekiri = substr($shimekiri,0,2).":".substr($shimekiri,2,2);
                    }
                    $race12_flg = 1;

                }else{
                    $race_num = $neer_ozz_race_number;
                    $prop_name = "SIMEKIRI_JIKOKU".$race_num."R";
                    $shimekiri = $race_header->$prop_name;
                    if($shimekiri){
                        $shimekiri = substr($shimekiri,0,2).":".substr($shimekiri,2,2);
                    }

                }
            }

            $kaisai_flg = true;
            

            $data['neer_ozz_race_number'] = $neer_ozz_race_number;
            $data['neer_kekka_race_number'] = $neer_kekka_race_number;
            $data['neer_kekka_race_number_tfinfo'] = $neer_kekka_race_number_tfinfo;

        }else{
            //?????????
            $kaisai_flg = false;
        }

        
        $holding = $this->Holding->getFirstRecordForFront();

        if($kaisai_flg){
            if($holding->?????????????????? > $target_time){
                // ??????????????????
                $live_flg = 2;

            }elseif($holding->?????????????????? < $target_time){
                // ??????????????????
                $live_flg = 3;

            }else{
                // ????????????????????????
                $live_flg = 1;

            }

            if($chushi_junen){
                // ???????????????

			    // ???????????????????????????
                $live_flg = 4;
            }
        }else{
            $live_flg = 0;
        }

        if($live_flg == 3){
            $race_num = "";
            $shimekiri = "";
            $race12_flg = 0;
        }



        $data['race_num'] = $race_num ?? "";
        $data['shimekiri'] = $shimekiri ?? "";
        $data['race12_flg'] = $race12_flg ?? 0;
        $data['kaisai_flg'] = $kaisai_flg;
        $data['chushi_flg'] = $chushi_flg ?? false;


        return $data;
    }


    public function top_race_movie($request){
        $data = [];

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;

        $target_date = date('Ymd');
        $target_time = date('Hi');
        //$target_time = '1900';
        $data['target_time'] = $target_time;
        //$target_date = '20210525';
        $data['target_date'] = $target_date;
        $tomorrow_date = date('Ymd',strtotime('+1 day',strtotime($target_date)));
        $data['tomorrow_date'] = $tomorrow_date;


        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;

        $next_kaisai = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$tomorrow_date);
        $data['next_kaisai'] = $next_kaisai;

        
        $next_race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$tomorrow_date);
        $data['next_race_header'] = $next_race_header;

        if($next_race_header){
            $syussou = $this->KyogiCommon->create_syussou_array($jyo,$tomorrow_date,12);
            $data['syussou'] = $syussou;
        }

        $holding = $this->Holding->getFirstRecordForFront();

        if($kaisai_master){
            if($holding->?????????????????? > $target_time){
                // ??????????????????
                $live_flg = 2;

            }elseif($holding->?????????????????? < $target_time){
                // ??????????????????
                $live_flg = 3;

            }else{
                // ????????????????????????
                $live_flg = 1;

            }

            if($chushi_junen){
                // ???????????????

                // ???????????????????????????
                $live_flg = 4;
            }
        }else{
            $live_flg = 0;
        }

        
        $data['live_flg'] = $live_flg ?? "";

        

        return $data;
    }


}