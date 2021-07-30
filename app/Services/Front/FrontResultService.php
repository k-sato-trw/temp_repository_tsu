<?php

namespace App\Services\Front;

use App\Repositories\TbBoatKekka\TbBoatKekkaRepositoryInterface;
use App\Repositories\TbBoatKekkainfo\TbBoatKekkainfoRepositoryInterface;
use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\ChushiJunen\ChushiJunenRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;

class FrontResultService
{
    public $TbBoatKekka;
    public $TbBoatKekkainfo;
    public $KaisaiMaster;
    public $ChushiJunen;
    public $TbBoatRaceheader;

    public function __construct(
        TbBoatKekkaRepositoryInterface $TbBoatKekka,
        TbBoatKekkainfoRepositoryInterface $TbBoatKekkainfo,
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        ChushiJunenRepositoryInterface $ChushiJunen,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader
    ){
        $this->TbBoatKekka = $TbBoatKekka;
        $this->TbBoatKekkainfo = $TbBoatKekkainfo;
        $this->KaisaiMaster = $KaisaiMaster;
        $this->ChushiJunen = $ChushiJunen;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
    }


    public function result_race($request){
        $data = [];

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $target_date = $request->input('yd') ?? date('Ymd');
        $data['jyo'] = $jyo;
        $data['target_date'] = $target_date;

        
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

            //本日のレース結果用レコード配列
            $kekka_info_today_all = $this->TbBoatKekkainfo->getRecordByDate($jyo,$target_date);
            $data['kekka_info_today_all'] = $kekka_info_today_all;


            //日付表示用
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
            $data['race_header'] = $race_header;


        }


        return $data;
    }

}