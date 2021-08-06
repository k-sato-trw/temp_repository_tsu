<?php

namespace App\Services\ExportHtml;

use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\TbVodManagement\TbVodManagementRepositoryInterface;
use App\Repositories\TbBoatSyussou\TbBoatSyussouRepositoryInterface;
use App\Services\ExportHtml\ExportKaisaiService;
use App\Services\KyogiCommonService;

class ExportPlaybackService
{
    public $KaisaiMaster;
    public $TbVodManagement;
    public $TbBoatSyussou;
    public $ExportKaisaiService;
    public $KyogiCommon;

    public function __construct(
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        TbVodManagementRepositoryInterface $TbVodManagement,
        TbBoatSyussouRepositoryInterface $TbBoatSyussou,
        ExportKaisaiService $ExportKaisaiService,
        KyogiCommonService $KyogiCommon
    ){
        $this->KaisaiMaster = $KaisaiMaster;
        $this->TbVodManagement = $TbVodManagement;
        $this->ExportKaisaiService = $ExportKaisaiService;
        $this->KyogiCommon = $KyogiCommon;
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

    public function play_b_mov_create($request){
        $data = [];

        $write_flg = false;

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;
        
        $target_date = $request->input('yd') ?? date('Ymd');
        $target_date = '20210612';
        $data['target_date'] = $target_date;
        
        
        //開催データ取り直し
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;


        $output_vod = [];
        if($kaisai_master){
            $vod = $this->TbVodManagement->getYusyoRecordForPlayback($jyo,$kaisai_master->終了日付);

            foreach($vod as $item){

                //書き出し判定

                //対応する結果データがあるか
                $neer_kekka_race_number = $this->KyogiCommon->getNeerKekkaRaceNumber($jyo,$kaisai_master->終了日付);
                if($neer_kekka_race_number >=  (int)substr($item->MOVIE_ID,-2) ){

                    //該当のHTMLがまだ出力されていない
                    if(!file_exists(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/play_b_mov/play_b_mov_'.$item->MOVIE_ID.'.htm')){
                        $write_flg = true;
                        $output_vod[$item->MOVIE_ID]['vod'] = $item;

                        $vod_target_date = $item->TARGET_DATE;
                        $vod_race_num = (int) substr($item->MOVIE_ID,-2);

                        //リプレイと処理が同じなので、流用
                        $data_syssou = $this->ExportKaisaiService->replay_syusso($request,$vod_target_date,$vod_race_num);
                        $data_harai  = $this->ExportKaisaiService->replay_harai($request,$vod_target_date,$vod_race_num);
                        $data_kekka  = $this->ExportKaisaiService->replay_kekka($request,$vod_target_date,$vod_race_num);
                        $data_sub  = $this->ExportKaisaiService->replay_sub($request,$vod_target_date,$vod_race_num);

                        $output_vod[$item->MOVIE_ID]['data_syssou'] = $data_syssou;
                        $output_vod[$item->MOVIE_ID]['data_harai'] = $data_harai;
                        $output_vod[$item->MOVIE_ID]['data_kekka'] = $data_kekka;
                        $output_vod[$item->MOVIE_ID]['data_sub'] = $data_sub;
                    }

                }   
            }
        }

        $data['output_vod'] = $output_vod;
        $data['write_flg'] = $write_flg;

        return $data;
    }

}