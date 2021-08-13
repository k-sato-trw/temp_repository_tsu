<?php

namespace App\Services\ExportHtml;

use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\TbBoatKekkainfo\TbBoatKekkainfoRepositoryInterface;
use App\Repositories\TbBoatKekka\TbBoatKekkaRepositoryInterface;
use App\Repositories\FanData\FanDataRepositoryInterface;

class ExportDemeService
{
    public $KaisaiMaster;
    public $TbBoatKekkainfo;
    public $TbBoatKekka;
    public $FanData;

    public function __construct(
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        TbBoatKekkainfoRepositoryInterface $TbBoatKekkainfo,
        TbBoatKekkaRepositoryInterface $TbBoatKekka,
        FanDataRepositoryInterface $FanData
    ){
        $this->KaisaiMaster = $KaisaiMaster;
        $this->TbBoatKekkainfo = $TbBoatKekkainfo;
        $this->TbBoatKekka = $TbBoatKekka;
        $this->FanData = $FanData;
    }


    public function index($request){
        $data = [];

        $target_date = date('Ymd');
        $one_year_ago = date('Ymd', strtotime('-1 year', strtotime($target_date)));
        $jyo = config('const.JYO_CODE');


        $kaisai_after = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo, $target_date);
        if(!$kaisai_after){
            //現在開催が無い場合、直近のレースを参照
            $kaisai_after = $this->KaisaiMaster->getEndRecordByDate($jyo, $target_date);
        }

        $kaisai_before = $this->KaisaiMaster->getRecentRecordByDate($jyo,$one_year_ago);

        //集計期間
        $after_date = $kaisai_after->終了日付;
        $before_date = $kaisai_before->開始日付;

        $before_date ='20200701';
        $kekka_info = $this->TbBoatKekkainfo->getRecordForDeme($jyo,$before_date,$after_date);

        $sanrentan_total_count = 0;
        $nirentan_total_count = 0;
        $sanrentan_count = [];
        $nirentan_count = [];
        $sanrentan_haito_sum = [];
        $nirentan_haito_sum = [];

        foreach($kekka_info as $item){
            //3連単記録
            if($item->SANRENTAN1){
                if(isset($sanrentan_count[$item->SANRENTAN1])){
                    $sanrentan_count[$item->SANRENTAN1]++;
                    $sanrentan_haito_sum[$item->SANRENTAN1] += $item->SANRENTAN_MONEY1;
                }else{
                    $sanrentan_count[$item->SANRENTAN1] = 1;
                    $sanrentan_haito_sum[$item->SANRENTAN1] = $item->SANRENTAN_MONEY1;
                }
                $sanrentan_total_count++;
            }

            if($item->SANRENTAN2){
                if(isset($sanrentan_count[$item->SANRENTAN2])){
                    $sanrentan_count[$item->SANRENTAN2]++;
                    $sanrentan_haito_sum[$item->SANRENTAN2] += $item->SANRENTAN_MONEY2;
                }else{
                    $sanrentan_count[$item->SANRENTAN2] = 1;
                    $sanrentan_haito_sum[$item->SANRENTAN2] = $item->SANRENTAN_MONEY2;
                }
                $sanrentan_total_count++;
            }

            //2連単記録
            if($item->NIRENTAN1){
                if(isset($nirentan_count[$item->NIRENTAN1])){
                    $nirentan_count[$item->NIRENTAN1]++;
                    $nirentan_haito_sum[$item->NIRENTAN1] += $item->NIRENTAN_MONEY1;
                }else{
                    $nirentan_count[$item->NIRENTAN1] = 1;
                    $nirentan_haito_sum[$item->NIRENTAN1] = $item->NIRENTAN_MONEY1;
                }
                $nirentan_total_count++;
            }

            if($item->NIRENTAN2){
                if(isset($nirentan_count[$item->NIRENTAN2])){
                    $nirentan_count[$item->NIRENTAN2]++;
                    $nirentan_haito_sum[$item->NIRENTAN2] += $item->NIRENTAN_MONEY2;
                }else{
                    $nirentan_count[$item->NIRENTAN2] = 1;
                    $nirentan_haito_sum[$item->NIRENTAN2] = $item->NIRENTAN_MONEY2;
                }
                $nirentan_total_count++;
            }

        }

        //出力用データ成形
        $result_sanrentan_rank = [];
        foreach($sanrentan_count as $deme => $deme_count){
            $row = [];
            $row['deme1'] = substr($deme,0,1);
            $row['deme2'] = substr($deme,1,1);
            $row['deme3'] = substr($deme,2,1);
            $row['senyu'] = round($deme_count / $sanrentan_total_count * 100 ,1);
            $row['haito'] = $sanrentan_haito_sum[$deme] / $deme_count;
            $result_sanrentan_rank[$deme] = $row;
        }

        //ソート処理
        $sort_condition1 = [];
        $sort_condition2 = [];
        foreach($result_sanrentan_rank as $deme => $row){
            $sort_condition1[$deme] = $row['senyu'];
            $sort_condition2[$deme] = $row['haito'];
        }
        array_multisort($sort_condition1, SORT_DESC,
                        $sort_condition2, SORT_DESC,
                        $result_sanrentan_rank);

        //同率を考慮してランク数を決定
        $display_count = 1;
        $real_count = 1;
        $temp_value = 999;
        foreach($result_sanrentan_rank as $key => $row){
            if($temp_value != $row['senyu']){
                $display_count = $real_count;
                $temp_value = $row['senyu'];
            }
            $result_sanrentan_rank[$key]['rank'] = $display_count;
            $real_count ++;
        }


        //2連単も同様
        //出力用データ成形
        $result_nirentan_rank = [];
        foreach($nirentan_count as $deme => $deme_count){
            $row = [];
            $row['deme1'] = substr($deme,0,1);
            $row['deme2'] = substr($deme,1,1);
            $row['senyu'] = round($deme_count / $nirentan_total_count * 100 ,1);
            $row['haito'] = $nirentan_haito_sum[$deme] / $deme_count;
            $result_nirentan_rank[$deme] = $row;
        }

        //ソート処理
        $sort_condition1 = [];
        $sort_condition2 = [];
        foreach($result_nirentan_rank as $deme => $row){
            $sort_condition1[$deme] = $row['senyu'];
            $sort_condition2[$deme] = $row['haito'];
        }
        array_multisort($sort_condition1, SORT_DESC,
                        $sort_condition2, SORT_DESC,
                        $result_nirentan_rank);

        //同率を考慮してランク数を決定
        $display_count = 1;
        $real_count = 1;
        $temp_value = 999;
        foreach($result_nirentan_rank as $key => $row){
            if($temp_value != $row['senyu']){
                $display_count = $real_count;
                $temp_value = $row['senyu'];
            }
            $result_nirentan_rank[$key]['rank'] = $display_count;
            $real_count ++;
        }

        $data['after_date'] = $after_date;
        $data['before_date'] = $before_date;
        $data['result_sanrentan_rank'] = $result_sanrentan_rank;
        $data['result_nirentan_rank'] = $result_nirentan_rank;
        

        //配当金ランキング処理
        $fan_data = $this->FanData->getAllRecord();
        $fan_data_name_array = [];
        foreach($fan_data as $item){
            $name_k = $item->NameK;
            $name_k = str_replace('　　','△',$name_k);
            $name_k = str_replace('　','',$name_k);
            $name_k = str_replace('△','　',$name_k);
            $fan_data_array[$item->Touban] = $name_k;
        }
        $data['fan_data_array'] = $fan_data_array;


        $haito_before_date = "20030915";
        $kekka_info_haito = $this->TbBoatKekkainfo->getRecordForHaito($jyo,$haito_before_date,$after_date);
        
        //同率を考慮してランク数を決定
        $result_haito = [];
        $display_count = 1;
        $real_count = 1;
        $temp_value = 9999999999999;
        foreach($kekka_info_haito as $key => $item){
            if($temp_value != $item->SANRENTAN_MONEY1){
                $display_count = $real_count;
                $temp_value = $item->SANRENTAN_MONEY1;
            }
            $row = [];
            $row['rank'] = $display_count;
            $row['record'] = $item;


            //kekkaレコードから登録番号取得
            $kekka = $this->TbBoatKekka->getRaceKekka($jyo,$item->TARGET_DATE,$item->RACE_NUMBER);
            $kekka_array = [];
            foreach($kekka as $kekka_row){
                $kekka_array[$kekka_row->TEIBAN] = $kekka_row->TOUBAN;
            }
            $row['kekka'] = $kekka_array;

            $result_haito[] = $row;

            $real_count ++;
        }

        $data['result_haito'] = $result_haito;
        $data['haito_before_date'] = $haito_before_date;


        return $data;
    }

}