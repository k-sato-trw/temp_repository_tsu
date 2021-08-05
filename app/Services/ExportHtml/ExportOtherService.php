<?php

namespace App\Services\ExportHtml;

use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Services\KyogiCommonService;

class ExportOtherService
{

    public $KaisaiMaster;
    public $KyogiCommon;

    public function __construct(
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        KyogiCommonService $KyogiCommon
    ){
        $this->KaisaiMaster = $KaisaiMaster;
        $this->KyogiCommon = $KyogiCommon;
    }


    public function syusso_jumper($request){

        $jyo = config('const.JYO_CODE');
        $target_date = date('Ymd');
        $target_date = "20210620";

        $data['target_date'] = $target_date;


        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;
        if($kaisai_master){
            $neer_kekka_race_number = $this->KyogiCommon->getNeerKekkaRaceNumber($jyo,$kaisai_master->終了日付);

            if($neer_kekka_race_number == 12){
                $data['race_num'] = $neer_kekka_race_number;
            }else{
                $data['race_num'] = $neer_kekka_race_number + 1;
            }
            
        }
        return $data;
    }

}