<?php

namespace App\Services\Front\Sp;

use App\Repositories\TbBoatKekka\TbBoatKekkaRepositoryInterface;
use App\Repositories\TbBoatKekkainfo\TbBoatKekkainfoRepositoryInterface;
use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\ChushiJunen\ChushiJunenRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;
use App\Repositories\Holiday\HolidayRepositoryInterface;
use App\Services\KyogiCommonService;

class SpResultService
{
    public $TbBoatKekka;
    public $TbBoatKekkainfo;
    public $KaisaiMaster;
    public $ChushiJunen;
    public $TbBoatRaceheader;
    public $Holiday;
    public $KyogiCommon;

    public function __construct(
        TbBoatKekkaRepositoryInterface $TbBoatKekka,
        TbBoatKekkainfoRepositoryInterface $TbBoatKekkainfo,
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        ChushiJunenRepositoryInterface $ChushiJunen,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader,
        HolidayRepositoryInterface $Holiday,
        KyogiCommonService $KyogiCommon
    ){
        $this->TbBoatKekka = $TbBoatKekka;
        $this->TbBoatKekkainfo = $TbBoatKekkainfo;
        $this->KaisaiMaster = $KaisaiMaster;
        $this->ChushiJunen = $ChushiJunen;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
        $this->Holiday = $Holiday;
        $this->KyogiCommon = $KyogiCommon;
    }


    public function result($request){
        $data = [];

        $jyo = config('const.JYO_CODE');
        $target_date = date('Ymd');
        $data['jyo'] = $jyo;
        $data['target_date'] = $target_date;

        // 60日前の日付取得
        $start_date = date('Ymd',strtotime('-60 day',strtotime($target_date)));

        //最新レース結果日付取得
        $last_kekka = $this->TbBoatKekka->getLastRecord($jyo,$target_date);
        $data['last_kekka'] = $last_kekka;

        //直近60日含む節を取得
        $kaisai_list = $this->KaisaiMaster->getRecordForResult($jyo,$start_date,$last_kekka->TARGET_DATE);
        $data['kaisai_list'] = $kaisai_list;

        $kaisai_last_record = $kaisai_list[0];
        $data['kaisai_last_record'] = $kaisai_last_record;


        //年度ごとにまとめ上げ
        $kaisai_array = [];
        foreach($kaisai_list as $item){
            $kaisai_array[substr($item->開始日付,0,4)][] = $item;
        }
        $data['kaisai_array'] = $kaisai_array;

        $holiday = $this->Holiday->getRecordBitweenDate($start_date,$target_date);
        $holiday_array = [];
        foreach($holiday as $item){
            $holiday_array[$item->HOLIDAYDATE] = $item;
        }
        $data['holiday_array'] = $holiday_array;


        return $data;
    }

    public function result_01($request){
        $data = [];

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $target_date = $request->input('yd') ?? date('Ymd');
        $data['jyo'] = $jyo;
        $data['target_date'] = $target_date;

        
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;
        $data['stop_race_num'] = $chushi_junen->中止開始レース番号 ?? 99;


        if($kaisai_master){

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
            $data['kaisai_date_list'] = $kaisai_date_list;

            //中止情報取得
            $chushi_junen = $this->ChushiJunen->getChushiRecordBitweenDate($kaisai_master->開始日付,$kaisai_master->終了日付);
            $chushi_junen_array = [];
            foreach($chushi_junen as $item){
                $chushi_junen_array[$item->中止日付] = $item;
            }
            $data['chushi_junen_array'] = $chushi_junen_array;

            //本日のレース結果用レコード配列
            $kekka_info_today_all = $this->TbBoatKekkainfo->getRecordByDate($jyo,$target_date);
            $data['kekka_info_today_all'] = $kekka_info_today_all;


            //日付表示用
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
            $data['race_header'] = $race_header;


        }


        return $data;
    }

    public function result_02($request){
        $data = [];

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;
        $race_num = $request->input('racenum') ?? 1;
        $data['race_num'] = $race_num;
        
        $target_date = $request->input('yd') ?? date('Ymd');
        $data['target_date'] = $target_date;
        
        
        //改めて開催データ取り直し
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;


        if($kaisai_master){

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
            $data['kaisai_date_list'] = $kaisai_date_list;

            $syussou = $this->KyogiCommon->create_syussou_array($jyo,$target_date,$race_num);    
            $data['syussou'] = $syussou;

            $kekka = $this->TbBoatKekka->getRaceKekka($jyo,$target_date,$race_num);
            
            foreach($kekka as $key=>$item){
                $SENSYU_NAME = $item->SENSYU_NAME;
                $SENSYU_NAME = str_replace("　　"," ", $SENSYU_NAME);
                $SENSYU_NAME = str_replace("　"," ", $SENSYU_NAME);
                $kekka[$key]->SENSYU_NAME = $SENSYU_NAME;
            } 
            $data['kekka'] = $kekka;

            $kekka_info = $this->TbBoatKekkainfo->getFirstRecordByPK($jyo,$target_date,$race_num);
            $data['kekka_info'] = $kekka_info;

            {
                //結果情報をかけ式に合わせて配列作成
                $tansyo_array = []; //不成立文字番0 配列要素上限3
                $fukusyo_array = []; //不成立文字番1 配列要素上限5
                $nirentan_array = []; //不成立文字番2 配列要素上限2
                $nirenfuku_array = []; //不成立文字番3 配列要素上限2
                $sanrentan_array = []; //不成立文字番4 配列要素上限2
                $sanrenfuku_array = []; //不成立文字番5 配列要素上限2
                $kakurenfuku_array = []; //不成立文字番6 配列要素上限5

                $fuseiritu_array = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

                if($kekka_info){

                    //不成立フラグを一文字ずつ分割
                    $fuseiritu_array = str_split($kekka_info->FUSEIRITU);


                    //単勝
                    for($i=1;$i<3;$i++){
                        $prop_name = "TANSYO".$i; 
                        if($kekka_info->$prop_name){
                            $tansyo_array[$i]['TANSYO'] = $kekka_info->$prop_name;
                            $prop_name = "TANSYO_MONEY".$i; 
                            $tansyo_array[$i]['TANSYO_MONEY'] = $kekka_info->$prop_name;
                        }
                    }

                    //複勝
                    for($i=1;$i<5;$i++){
                        $prop_name = "FUKUSYO".$i; 
                        if($kekka_info->$prop_name){
                            $fukusyo_array[$i]['FUKUSYO'] = $kekka_info->$prop_name;
                            $prop_name = "FUKUSYO_MONEY".$i; 
                            $fukusyo_array[$i]['FUKUSYO_MONEY'] = $kekka_info->$prop_name;
                        }
                    }

                    //2連単
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

                    //2連複
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


                    //3連単
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


                    //3連複
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
                    
                    //拡連複
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

            
            //日付表示用
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
            $data['race_header'] = $race_header;


            
        
        }

        return $data;
    }
}