<?php

namespace App\Services\ExportHtml;

use App\Repositories\AssenSchedule\AssenScheduleRepositoryInterface;
use App\Repositories\FanData\FanDataRepositoryInterface;

class ExportMeikanService
{
    public $AssenSchedule;
    public $FanData;

    public function __construct(
        AssenScheduleRepositoryInterface $AssenSchedule,
        FanDataRepositoryInterface $FanData
    ){
        $this->AssenSchedule = $AssenSchedule;
        $this->FanData = $FanData;
    }


    public function index(Request $request){

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
        $touban_count = [];
        $lady_count = 0;
        $kibetu_nen = "";
        $kibetu_ki = "";
        foreach($fan_data as $item){
            $fan_data_array[$item->Touban] = $item;

            //級カウント

            //登番カウント


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


        return $data;
    }


}