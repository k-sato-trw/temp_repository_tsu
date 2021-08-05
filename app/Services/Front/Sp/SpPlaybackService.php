<?php

namespace App\Services\Front\Sp;

use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\TbVodManagement\TbVodManagementRepositoryInterface;
use App\Repositories\TbBoatSyussou\TbBoatSyussouRepositoryInterface;
use App\Services\Front\Sp\SpKyogiService;
use App\Services\KyogiCommonService;

class SpPlaybackService
{
    public $KaisaiMaster;
    public $TbVodManagement;
    public $TbBoatSyussou;
    public $SpKyogiService;
    public $KyogiCommon;

    public function __construct(
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        TbVodManagementRepositoryInterface $TbVodManagement,
        TbBoatSyussouRepositoryInterface $TbBoatSyussou,
        SpKyogiService $SpKyogiService,
        KyogiCommonService $KyogiCommon
    ){
        $this->KaisaiMaster = $KaisaiMaster;
        $this->TbVodManagement = $TbVodManagement;
        $this->SpKyogiService = $SpKyogiService;
        $this->KyogiCommon = $KyogiCommon;
    }


    public function play_back($request){

        $data = [];

        $jyo = config('const.JYO_CODE');
        $data['jyo'] = $jyo;
        //優勝戦
        $vod = $this->TbVodManagement->getYushoRecord($jyo);
        $vod_yusho_record_grade = [];
        $vod_yusho_record_nograde = [];
        $search_conditions = [];
        $kaisai_name_list = [];
        foreach($vod as $item){
            //$vod_yusho_record[substr($item->TARGET_DATE,0,4)][$item->TARGET_DATE][(int)$item->RACE_NUMBER] = $item;

            $row = [];
            $row['target_date'] = (int)$item->TARGET_DATE;
            $row['race_number'] = (int)$item->RACE_NUMBER;
            $search_conditions[] = $row;

            //表示レース名の為に開催マスターからリスト作成
            $kaisai = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$item->TARGET_DATE);
            if($kaisai){
                $kaisai_name_list[$item->TARGET_DATE] = $kaisai->開催名称;

                //グレードとノングレードを分ける
                if(
                    mb_strpos($kaisai->開催名称,"SG") !== false ||
                    mb_strpos($kaisai->開催名称,"G1") !== false ||
                    mb_strpos($kaisai->開催名称,"G2") !== false ||
                    mb_strpos($kaisai->開催名称,"G3") !== false 
                ){
                    $vod_yusho_record_grade[substr($item->TARGET_DATE,0,4)][$item->TARGET_DATE][(int)$item->RACE_NUMBER] = $item;
                }else{
                    $vod_yusho_record_nograde[substr($item->TARGET_DATE,0,4)][$item->TARGET_DATE][(int)$item->RACE_NUMBER] = $item;
                }

            }else{
                //基本起こりえないが、開催マスターのデータが無かった時にエラーを回避する為
                $kaisai_name_list[$item->TARGET_DATE] = "";
            }

            
        }
        $data['vod_yusho_record_grade'] = $vod_yusho_record_grade;
        $data['vod_yusho_record_nograde'] = $vod_yusho_record_nograde;
        $data['kaisai_name_list'] = $kaisai_name_list;
/*
        $syussou = $this->TbBoatSyussou->getRecordForReplay($jyo,$search_conditions);
        $syussou_array=[];
        foreach($syussou as $item){
            $syussou_array[$item->TARGET_DATE][$item->RACE_NUMBER] = $item;
        }
        $data['syussou_array'] = $syussou_array;
*/
        
        return $data;
    }

    public function play_back_race($request){
        $data = [];

        $movie_id = $request->input('movieid') ?? false;

        //$vod = $this->TbVodManagement->getFirstRecordByMovieId($jyo,$movie_id);

        $request->merge([
            'jyo' => config('const.JYO_CODE'),
            'racenum' => (int)substr($movie_id,-2),
            'yd' => substr($movie_id,0,8),
        ]);

        $data = $this->SpKyogiService->replay_race($request);

        $data['movie_id'] = $movie_id;

        return $data;
    }

}