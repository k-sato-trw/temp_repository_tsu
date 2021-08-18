<?php

namespace App\Services\ExportHtml;

use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;
use App\Repositories\TbBoatSyussou\TbBoatSyussouRepositoryInterface;
use App\Repositories\Holiday\HolidayRepositoryInterface;
use App\Services\ExportHtml\ExportKaisaiService;
use App\Services\KyogiCommonService;

class ExportPdfService
{
    public $KaisaiMaster;
    public $TbBoatRaceheader;
    public $TbBoatSyussou;
    public $Holiday;
    public $ExportKaisai;
    public $KyogiCommon;

    public function __construct(
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader,
        TbBoatSyussouRepositoryInterface $TbBoatSyussou,
        HolidayRepositoryInterface $Holiday,
        ExportKaisaiService $ExportKaisai,
        KyogiCommonService $KyogiCommon
    ){
        $this->KaisaiMaster = $KaisaiMaster;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
        $this->TbBoatSyussou = $TbBoatSyussou;
        $this->Holiday = $Holiday;
        $this->ExportKaisai = $ExportKaisai;
        $this->KyogiCommon = $KyogiCommon;
    }


    public function yoso_pdf($request){
        $jyo = config('const.JYO_CODE');

        
        //処理対象日を判定
        $tomorrow_flg = false;
        $today_date = date('Ymd');
        $today_date = '20210524';
        $tomorrow_date = date('Ymd',strtotime('+1 day',strtotime($today_date)));

        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$tomorrow_date);
        $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$tomorrow_date);

        if($kaisai_master && $race_header){
            //両方あれば、対象日確定
            $tomorrow_flg = true;
            $target_date = $tomorrow_date;
        }else{
            //無い場合は、当日判定
            $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$today_date);
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$today_date);
            $target_date = $today_date;

        }

        if($kaisai_master){
            //開催マスターがある場合、開催日リスト作成
            $kaisai_date_list = [];
            $tmp_date = $kaisai_master->開始日付;
            $start_month = date("m",strtotime($tmp_date));
            $change_after = false;
            while($tmp_date <= $kaisai_master->終了日付){
                
                $row = [];
                $row['date'] = $tmp_date;
                if(date("m",strtotime($tmp_date)) != $start_month && $change_after == false){
                    $row['month_change'] = true;
                    $change_after = true;
                }else{
                    $row['month_change'] = false;
                }

                if($tmp_date == $target_date){
                    $row['is_today'] = true;
                }else{
                    $row['is_today'] = false;
                }

                $kaisai_date_list[] = $row;
                $tmp_date = date("Ymd",strtotime('+1 day',strtotime($tmp_date)));
            }
            $data['kaisai_date_list'] = $kaisai_date_list;
        }

        $data['kaisai_master'] = $kaisai_master;
        $data['race_header'] = $race_header;
        $data['target_date'] = $target_date;
        $data['tomorrow_flg'] = $tomorrow_flg;

        {
            $neer_kekka_race_number = $this->KyogiCommon->getNeerKekkaRaceNumber($jyo,$target_date);
            $data['neer_kekka_race_number'] = $neer_kekka_race_number;
        }

        $write_flg = false;
        if($kaisai_master){
            if($neer_kekka_race_number < 13){
                //最終レース結果が出ていない
                $write_flg = true;
            }
        }
        $data['write_flg'] = $write_flg;

        if($kaisai_master){
            
            $race_data = [];
            for($race_num = 1;$race_num <= 12;$race_num++){
                $temp_data = $this->ExportKaisai->yoso01($request,$target_date,$race_num,$tomorrow_flg);
                $temp_data_st = $this->ExportKaisai->st01($request,$target_date,$race_num,$tomorrow_flg);

                $temp_data['ozz_info_array'] = $temp_data_st['ozz_info_array'];
                $temp_data['tyokuzen_array'] = $temp_data_st['tyokuzen_array'];

                //出走に紐づく着順をレース種別に合わせて変換
                $syussou = $temp_data['syussou'];
                foreach($syussou as $teiban => $item){
                    $tyakujun = "";

                    for($num1 = 1 ;$num1 <= 9 ;$num1 ++){
                        for($num2 = 1 ;$num2 <= 2 ;$num2 ++){
                            $prop_name_tyakujun = 'KONSETU'.$num1.$num2.'_TYAKUJUN';
                            if($item->$prop_name_tyakujun){
                                //出走種別を調べる
                                
                                $prop_name_date = 'KONSETU'.$num1.$num2.'_DATE';
                                $prop_name_racenumber = 'KONSETU'.$num1.$num2.'_RACENUMBER';
                                $temp_syussou = $this->TbBoatSyussou->getFirstRecordByPK($jyo,$item->$prop_name_date,$item->$prop_name_racenumber,$teiban);

                                if(mb_strpos($temp_syussou->RACE_SYUBETU_NAME,'準優') !== false){
                                    $tyakujun .= '<img src="/pdf_yoso/images/j'.$this->KyogiCommon->tyakujun_to_number($item->$prop_name_tyakujun).'.png" alt="'.$this->KyogiCommon->tyakujun_to_number($item->$prop_name_tyakujun).'"/>';
                                }elseif(mb_strpos($temp_syussou->RACE_SYUBETU_NAME,'記者選抜戦') !== false){
                                    $tyakujun .= '<img src="/pdf_yoso/images/t'.$this->KyogiCommon->tyakujun_to_number($item->$prop_name_tyakujun).'.png" alt="'.$this->KyogiCommon->tyakujun_to_number($item->$prop_name_tyakujun).'"/>';
                                }elseif(mb_strpos($temp_syussou->RACE_SYUBETU_NAME,'ドリーム') !== false){
                                    $tyakujun .= '<img src="/pdf_yoso/images/d'.$this->KyogiCommon->tyakujun_to_number($item->$prop_name_tyakujun).'.png" alt="'.$this->KyogiCommon->tyakujun_to_number($item->$prop_name_tyakujun).'"/>';
                                }else{
                                    $tyakujun .= $item->$prop_name_tyakujun;
                                }
                            }
                        }
                    }

                    $temp_data['tyakujun'][$teiban] = $tyakujun;

                }

                $race_data[$race_num] = $temp_data;

            }
            $data['race_data'] = $race_data;

            
            $holiday = $this->Holiday->getRecordBitweenDate($kaisai_master->開始日付,$kaisai_master->終了日付);
            $holiday_array = [];
            foreach($holiday as $item){
                $holiday_array[$item->HOLIDAYDATE] = $item;
            }
            $data['holiday_array'] = $holiday_array;
        }


        return $data;
    }

}