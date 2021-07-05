<?php

namespace App\Services\ExportHtml\Sp;

use App\Repositories\AssenSchedule\AssenScheduleRepositoryInterface;
use App\Repositories\FanData\FanDataRepositoryInterface;

class ExportSpMeikanService
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


    public function index($request){

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
        $kyu_count['A1'] = 0;
        $kyu_count['A2'] = 0;
        $kyu_count['B1'] = 0;
        $kyu_count['B2'] = 0;

        $touban_count = [];
        $touban_count['N1'] = 0;
        $touban_count['N2'] = 0;
        $touban_count['N3'] = 0;
        $touban_count['N4'] = 0;
        $lady_count = 0;
        $kibetu_nen = "";
        $kibetu_ki = "";
        foreach($fan_data as $item){
            $fan_data_array[$item->Touban] = $item;

            //級カウント
            if($item->Kyu == "A1"){
                $kyu_count['A1']++;
            }elseif($item->Kyu == "A2"){
                $kyu_count['A2']++;
            }elseif($item->Kyu == "B1"){
                $kyu_count['B1']++;
            }elseif($item->Kyu == "B2"){
                $kyu_count['B2']++;
            }


            //登番カウント
            if($item->Touban <= 4000){
                $fan_data_array[$item->Touban]->touban_count = "N1";
                $touban_count['N1']++;
            }elseif($item->Touban <= 4500){
                $fan_data_array[$item->Touban]->touban_count = "N2";
                $touban_count['N2']++;
            }elseif($item->Touban <= 5500){
                $fan_data_array[$item->Touban]->touban_count = "N3";
                $touban_count['N3']++;
            }else{
                $fan_data_array[$item->Touban]->touban_count = "N4";
                $touban_count['N4']++;
            }

            //女性カウント
            if($item->Sei == 2){
                $lady_count++;
            }


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
        $data['kyu_count'] = $kyu_count;
        $data['touban_count'] = $touban_count;
        $data['lady_count'] = $lady_count;


        return $data;
    }


}