<?php

namespace App\Services\Front\Sp;

use App\Repositories\TbTsuInformation\TbTsuInformationRepositoryInterface;
use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\TbMotorList\TbMotorListRepositoryInterface;
use App\Library\ExchangeText;

class SpInfoService
{
    public $TbTsuInformation;
    public $KaisaiMaster;
    public $TbMotorList;

    public function __construct(
        TbTsuInformationRepositoryInterface $TbTsuInformation,
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        TbMotorListRepositoryInterface $TbMotorList,
        ExchangeText $ExchangeText
    ){
        $this->TbTsuInformation = $TbTsuInformation;
        $this->KaisaiMaster = $KaisaiMaster;
        $this->TbMotorList = $TbMotorList;
        $this->ExchangeText = $ExchangeText;
    }


    public function index($request,$is_preview=false){

        if(strpos(url()->current(),'/admin/') !== false){
            $is_preview = true;
        }else{
            $is_preview = false;
        }

        
        $data['select_id'] = $request->input('ID') ?? false;

        $target_year = $request->input('Year') ?? date('Y');
        $data['target_year'] = $target_year;

        $information = $this->TbTsuInformation->getRecordForSpTop($target_year,$is_preview);
        $information_array = [];
        foreach($information as $key=>$item){
            //ソートのため、表示日付と更新時間でキーを作成。　のちのモーターリストと更新時間の桁数が違うので、二桁増やす
            $information_array[$item->VIEW_DATE.$item->UPDATE_TIME."00"] = $item;
            $information_array[$item->VIEW_DATE.$item->UPDATE_TIME."00"]->TEXT = $this->ExchangeText->compile_event($item->TEXT,[]);
        }


        $display_news = $this->TbTsuInformation->getDisplayYearListSp();
        
        $year_list = [];
        foreach($display_news as $item){
            if(!in_array(substr($item->VIEW_DATE,0,4),$year_list)){
                $year_list[] = substr($item->VIEW_DATE,0,4);
            }
        }
        $data['year_list'] = $year_list;

        
        $data['news_class'] = [
            0 => '',
            1 => 'cate_update',
            2 => 'cate_news',
            3 => 'cate_important',
        ];

        {
            $today_date = date('Ymd');
            $today_date = '20210524';
            $tomorrow_date = date('Ymd',strtotime('+1 day',strtotime($today_date)));
            $jyo = config('const.JYO_CODE');

            $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$tomorrow_date);
            $kaisai_flg = false;
            if($kaisai_master ){
                $kaisai_flg = true;
            }else{
                $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$today_date);
                if($kaisai_master ){
                    $kaisai_flg = true;
                }
            }

            if($kaisai_flg){
                $motor_list = $this->TbMotorList->getFirstRecordForEvent($kaisai_master->開始日付);
                if($motor_list){
                    $row=[];
                    $row['ID'] = "000";
                    $row['VIEW_DATE'] = $kaisai_master->開始日付;
                    $row['TITLE'] = "モーター抽選結果｜".$kaisai_master->開催名称;
                    $row['TEXT'] = "";
                    $row['TYPE'] = "1";
                    $row['NEW_FLG'] = "1";
                    $row['SP_LINK'] = "/asp/kyogi/09/sp/motor/motor.htm";
                    $row['SP_LINK_WINDOW_FLG'] = "0";

                    $information_array[$kaisai_master->開始日付.$motor_list->UPDATE_TIME] = (object) $row;
                }
            }
        }

        //最後にキーソート
        krsort($information_array);
        $data['information_array'] = $information_array;

        return $data;
    }

}