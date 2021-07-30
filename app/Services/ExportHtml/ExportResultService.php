<?php

namespace App\Services\ExportHtml;

use App\Repositories\TbBoatKekka\TbBoatKekkaRepositoryInterface;
use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\Holiday\HolidayRepositoryInterface;

class ExportResultService
{
    public $TbBoatKekka;
    public $KaisaiMaster;
    public $Holiday;

    public function __construct(
        TbBoatKekkaRepositoryInterface $TbBoatKekka,
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        HolidayRepositoryInterface $Holiday
    ){
        $this->TbBoatKekka = $TbBoatKekka;
        $this->KaisaiMaster = $KaisaiMaster;
        $this->Holiday = $Holiday;
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

}