<?php

namespace App\Services\ExportHtml;

use App\Repositories\TbTsuCalendar\TbTsuCalendarRepositoryInterface;
use App\Repositories\TbTsuEventfan\TbTsuEventfanRepositoryInterface;
use App\Repositories\TbTsuEventfanmaster\TbTsuEventfanmasterRepositoryInterface;
use App\Library\ExchangeText;

class ExportEventService
{
    public $TbTsuCalendar;
    public $TbTsuEventfan;
    public $TbTsuEventfanmaster;
    public $ExchangeText;

    public function __construct(
        TbTsuCalendarRepositoryInterface $TbTsuCalendar,
        TbTsuEventfanRepositoryInterface $TbTsuEventfan,
        TbTsuEventfanmasterRepositoryInterface $TbTsuEventfanmaster,
        ExchangeText $ExchangeText
    ){
        $this->TbTsuCalendar = $TbTsuCalendar;
        $this->TbTsuEventfan = $TbTsuEventfan;
        $this->TbTsuEventfanmaster = $TbTsuEventfanmaster;
        $this->ExchangeText = $ExchangeText;
    }


    public function index($request){
        if(strpos(url()->current(),'/admin/') !== false){
            $is_preview = true;
        }else{
            $is_preview = false;
        }

        $target_date = date('Ymd');

        //カレンダー
        $calendar= $this->TbTsuCalendar->getRecordForEvent($target_date,$is_preview);
        $calendar_array=[];
        $id_list = [];
        foreach($calendar as $item){
            $calendar_array[$item->ID] = $item;
            $id_list[] = $item->ID;
        }

        //イベントマスター
        $event_master = $this->TbTsuEventfanmaster->getRecordForEvent($id_list,$is_preview);
        $event_master_array=[];
        $event_master_id_list = [];
        foreach($event_master as $item){
            $event_master_array[$item->ID][$item->SUB_ID] = $item;
            $row['ID'] = $item->ID;
            $row['SUB_ID'] = $item->SUB_ID;
            $event_master_id_list[] = $row;
        }

        //イベント
        $event = $this->TbTsuEventfan->getRecordForEvent($event_master_id_list,$is_preview);
        $event_array=[];
        foreach($event as $item){
            $item->TEXT = $this->ExchangeText->compile_sp($item->TEXT,[
                config('const.IMAGE_PATH.EVENT_FAN').$item->IMAGE1,
                config('const.IMAGE_PATH.EVENT_FAN').$item->IMAGE2,
                config('const.IMAGE_PATH.EVENT_FAN').$item->IMAGE3
            ]);
            $event_array[$item->ID][$item->SUB_ID][$item->THIRD_ID] = $item;
        }
        
        $data['calendar_array'] = $calendar_array;
        $data['event_master_array'] = $event_master_array;
        $data['event_array'] = $event_array;
        $data['weeks'] = ['日','月','火','水','木','金','土',];
        $data['grade_label'] = [
            1 => 'SG',
            2 => 'G1',
            3 => 'G2',
            4 => 'G3',
        ];

        return $data;
    }

}