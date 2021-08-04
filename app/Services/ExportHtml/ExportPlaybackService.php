<?php

namespace App\Services\ExportHtml;

use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\TbVodManagement\TbVodManagementRepositoryInterface;
use App\Repositories\TbBoatSyussou\TbBoatSyussouRepositoryInterface;

class ExportPlaybackService
{
    public $KaisaiMaster;
    public $TbVodManagement;
    public $TbBoatSyussou;

    public function __construct(
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        TbVodManagementRepositoryInterface $TbVodManagement,
        TbBoatSyussouRepositoryInterface $TbBoatSyussou
    ){
        $this->KaisaiMaster = $KaisaiMaster;
        $this->TbVodManagement = $TbVodManagement;
        $this->TbBoatSyussou = $TbBoatSyussou;
    }


    public function play_back($request){

        $data = [];

        $jyo = config('const.JYO_CODE');
        $data['jyo'] = $jyo;
        //優勝戦
        $vod = $this->TbVodManagement->getYushoRecord($jyo);
        $vod_yusho_record = [];
        $search_conditions = [];
        $kaisai_name_list = [];
        foreach($vod as $item){
            $vod_yusho_record[substr($item->TARGET_DATE,0,4)][$item->TARGET_DATE][(int)$item->RACE_NUMBER] = $item;

            $row = [];
            $row['target_date'] = (int)$item->TARGET_DATE;
            $row['race_number'] = (int)$item->RACE_NUMBER;
            $search_conditions[] = $row;

            //表示レース名の為に開催マスターからリスト作成
            $kaisai = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$item->TARGET_DATE);
            if($kaisai){
                $kaisai_name_list[$item->TARGET_DATE] = $kaisai->開催名称;
            }else{
                //基本起こりえないが、開催マスターのデータが無かった時にエラーを回避する為
                $kaisai_name_list[$item->TARGET_DATE] = "";
            }
        }
        $data['vod_yusho_record'] = $vod_yusho_record;
        $data['kaisai_name_list'] = $kaisai_name_list;

        $syussou = $this->TbBoatSyussou->getRecordForReplay($jyo,$search_conditions);
        $syussou_array=[];
        foreach($syussou as $item){
            $syussou_array[$item->TARGET_DATE][$item->RACE_NUMBER] = $item;
        }
        $data['syussou_array'] = $syussou_array;

        
        return $data;
    }


}