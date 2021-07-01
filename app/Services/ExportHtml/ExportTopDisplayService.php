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
        $this->ExchangeText = $ExchangeText;
        $this->KyogiCommon = $KyogiCommon;
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
        $today_date = '20210525';
        $data['today_date'] = $today_date;
        $tomorrow_date = date('Ymd',strtotime('+1 day',strtotime($today_date)));
        $data['tomorrow_date'] = $tomorrow_date;


        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$today_date);

        //本日を含め直近のカレンダーを検索、非開催日の場合次の開催を取得
        $calendar = $this->TbTsuCalendar->getRecentRecordByDate($today_date);

        if($kaisai_master){
            $kaisai_flg = true;

            //開催日リスト作成
            $tmp_date = $kaisai_master->開始日付;
            $end_date = $kaisai_master->終了日付;
            $kaisai_day_list = [];
            while($tmp_date <= $end_date){
                $kaisai_day_list[] = $tmp_date;
                $tmp_date = date("Ymd",strtotime("+1 day",strtotime($tmp_date)));
            }
            $data['kaisai_day_list'] = $kaisai_day_list;


            //中止データ取得
            $chushi_junen = $this->ChushiJunen->getChushiRecordBitweenDate($kaisai_master->開始日付,$kaisai_master->終了日付);
            $chushi_junen_array = [];
            foreach($chushi_junen as $item){
                $chushi_junen_array[$item->中止日付] = $item;
            }
            $data['chushi_junen_array'] = $chushi_junen_array;

            $holiday = $this->Holiday->getRecordBitweenDate($kaisai_master->開始日付,$kaisai_master->終了日付);
            $holiday_array = [];
            foreach($holiday as $item){
                $holiday_array[$holiday->HOLIDAYDATE] = $holiday->HOLIDAYNAME;
            }
            $data['holiday_array'] = $holiday_array;


            $highlight_date = "";
            if($today_time >= 1815){
                if($kaisai_master->終了日付 == $today_date){
                    //最終日の場合は当日
                    $highlight_date = $today_date;
                }else{
                    //最終日以外は翌日
                    $highlight_date = $tomorrow_date;
                }
            }else{
                $highlight_date = $today_date;
            }

            //〇日目算出
            foreach($kaisai_day_list as $key=>$item){
                if($highlight_date == $item){
                    if($key == 0){
                        $highlight_label = "初日";
                        $highlight_day = 1;
                    }elseif($highlight_date == $kaisai_master->終了日付){
                        $highlight_label = "最終日";
                        $highlight_day = 0;
                    }else{
                        $highlight_label = ($key + 1)."日目";
                        $highlight_day = ($key + 1);
                    }
                    break;
                }
            }

            $data['highlight_label'] = $highlight_label;
            $data['highlight_day'] = $highlight_day;

            
            $tokutenritu = $this->TbTsuTokutenritu->getRecordByBitweenDate($kaisai_master->開始日付,$today_date);
            $data['tokutenritu'] = $tokutenritu;

        }else{
            //非開催　前検日確認
            $next_kaisai = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$tomorrow_date);
            $zenken_flg = true;

            //開催日リスト作成
            $tmp_date = $next_kaisai->開始日付;
            $end_date = $next_kaisai->終了日付;
            $kaisai_day_list = [];
            while($tmp_date <= $end_date){
                $kaisai_day_list[] = $tmp_date;
                $tmp_date = date("Ymd",strtotime("+1 day",strtotime($tmp_date)));
            }
            $data['kaisai_day_list'] = $kaisai_day_list;


            //中止データ取得
            $chushi_junen = $this->ChushiJunen->getChushiRecordBitweenDate($next_kaisai->開始日付,$next_kaisai->終了日付);
            $chushi_junen_array = [];
            foreach($chushi_junen as $item){
                $chushi_junen_array[$item->中止日付] = $item;
            }
            $data['chushi_junen_array'] = $chushi_junen_array;


            $holiday = $this->Holiday->getRecordBitweenDate($next_kaisai->開始日付,$next_kaisai->終了日付);
            $holiday_array = [];
            foreach($holiday as $item){
                $holiday_array[$holiday->HOLIDAYDATE] = $holiday->HOLIDAYNAME;
            }
            $data['holiday_array'] = $holiday_array;

            $race_index = $this->TbRaceIndex->getFirstRecordForPickup($next_kaisai->開始日付,$next_kaisai->終了日付);
            
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

                    //ピックアップデータ
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
                        $sensyu_image_array[$item->登番] = $item;
                    }
                }

                $syutujo_write_log = $this->TbRaceSyutujoWriteLog->getFirstRecordByPK($race_index->ID);
            }

            

        }

        $data['kaisai_master'] = $kaisai_master;
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
        $target_date = '20210525';
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
                    //レース終了
                    $race_num = "";
                    $shimekiri = "";
                    $race12_flg = 0;

                }elseif($neer_ozz_race_number == 0 && ($neer_kekka_race_number == 11 || $neer_kekka_race_number_tfinfo == 11)){
                    //12レース発売締切
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
            //非開催
            $kaisai_flg = false;
        }

        
        $holding = $this->Holding->getFirstRecordForFront();

        if($kaisai_flg){
            if($holding->実況開始時間 > $target_time){
                // ライブ開始前
                $live_flg = 2;

            }elseif($holding->実況終了時間 < $target_time){
                // ライブ終了後
                $live_flg = 3;

            }else{
                // ライブ実況時間内
                $live_flg = 1;

            }

            if($chushi_junen){
                // 中止の場合

			    // 中止フラグで上書き
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
        $target_time = '1900';
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
            if($holding->実況開始時間 > $target_time){
                // ライブ開始前
                $live_flg = 2;

            }elseif($holding->実況終了時間 < $target_time){
                // ライブ終了後
                $live_flg = 3;

            }else{
                // ライブ実況時間内
                $live_flg = 1;

            }

            if($chushi_junen){
                // 中止の場合

                // 中止フラグで上書き
                $live_flg = 4;
            }
        }else{
            $live_flg = 0;
        }

        
        $data['live_flg'] = $live_flg ?? "";

        

        return $data;
    }


}