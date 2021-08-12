<?php

namespace App\Services\Admin;

use App\Repositories\TbTsuMailmagazine\TbTsuMailmagazineRepositoryInterface;
use App\Repositories\TbTsuCalendar\TbTsuCalendarRepositoryInterface;
use App\Repositories\TbRaceIndex\TbRaceIndexRepositoryInterface;
use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\TbTsuKaimon\TbTsuKaimonRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;
use App\Repositories\FanData\FanDataRepositoryInterface;
use App\Services\Admin\CalendarService;
use App\Services\KyogiCommonService;

class MailMagazineService
{
    public $TbTsuMailmagazine;
    public $TbTsuCalendar;
    public $TbRaceIndex;
    public $KaisaiMaster;
    public $TbTsuKaimon;
    public $TbBoatRaceheader;
    public $FanData;
    public $CalendarService;
    public $KyogiCommon;

    public function __construct(
        TbTsuMailmagazineRepositoryInterface $TbTsuMailmagazine,
        TbTsuCalendarRepositoryInterface $TbTsuCalendar,
        TbRaceIndexRepositoryInterface $TbRaceIndex,
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        TbTsuKaimonRepositoryInterface $TbTsuKaimon,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader,
        FanDataRepositoryInterface $FanData,
        CalendarService $CalendarService,
        KyogiCommonService $KyogiCommon
    ){
        $this->TbTsuMailmagazine = $TbTsuMailmagazine;
        $this->TbTsuCalendar = $TbTsuCalendar;
        $this->TbRaceIndex = $TbRaceIndex;
        $this->KaisaiMaster = $KaisaiMaster;
        $this->TbTsuKaimon = $TbTsuKaimon;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
        $this->FanData = $FanData;
        $this->CalendarService = $CalendarService;
        $this->KyogiCommon = $KyogiCommon;
    }


    public function index($request){

        $now_date = date("Ymd");

        if(!is_null($request->input('now_year_month'))){
            $now_date = $request->input('now_year_month') ."01";
        }

        $jyo = config('const.JYO_CODE');

        $data['now_date'] = $now_date;
        { //日付データ整理

            $now_year = date("Y",strtotime($now_date));
            $now_month = date("m",strtotime($now_date));
            $now_day = date("d",strtotime($now_date));

            if($now_month == 12){
                $now_month_last_day = date("d",strtotime('-1 day',strtotime(($now_year + 1) . '0101')));
            }else{
                $now_month_last_day = date("d",strtotime('-1 day',strtotime($now_year . str_pad($now_month + 1, 2, '0', STR_PAD_LEFT) . '01')));
            }

            //前月次月
            if($now_month == 12){
                $next_year_month = ($now_year + 1)."01";
                $prev_year_month = $now_year.str_pad(($now_month - 1 ), 2, '0', STR_PAD_LEFT);
            }elseif($now_month == 1){
                $next_year_month = $now_year.str_pad(($now_month + 1 ), 2, '0', STR_PAD_LEFT);
                $prev_year_month = ($now_year - 1)."12";
            }else{
                $next_year_month = $now_year.str_pad(($now_month + 1 ), 2, '0', STR_PAD_LEFT);
                $prev_year_month = $now_year.str_pad(($now_month - 1 ), 2, '0', STR_PAD_LEFT);
            }

            $data['now_year'] = $now_year;
            $data['now_month'] = $now_month;
            $data['now_day'] = $now_day;
            $data['now_month_last_day'] = $now_month_last_day;
            $data['week_label'] = ['日','月','火','水','木','金','土',];
            
            $data['next_year_month'] = $next_year_month;
            $data['prev_year_month'] = $prev_year_month;

            //日付レイアウト作成
            $day_layout = [];
            for($day=1;$day<=$now_month_last_day;$day++){
                $day_layout[$day] = [
                    "type" => "blank", //空:blank　登録先頭:head　登録中身:copy　休館:close
                    "colspan" => 0,
                    "record" => false, //レコード本体
                ];
            }

        }

        { //カレンダーデータ　本場

            $lines = $this->CalendarService->mold_calendar_layout(
                $day_layout,
                1,
                1,
                ["09"],
                null,
                $now_year,
                $now_month,
                $now_month_last_day
            );
            
            $lines = $this->CalendarService->insert_close_day(
                1,
                $lines,
                $now_year,
                $now_month,
                $now_month_last_day
            );

            $honjyo_array = $lines[1];
            $data['honjyo_array'] = $honjyo_array;

        }

        //前検日の日程を抽出
        $one_month_kaisai = $this->KaisaiMaster->getOneMonthRecord($jyo,date('Ymd',strtotime($now_year.'/'.$now_month.'/1')),date('Ymd',strtotime($now_year.'/'.$now_month.'/'.$now_month_last_day)));

        $zenken = [];
        foreach($one_month_kaisai as $item){
            $zenken[] = (date('d',strtotime($item->開始日付)) - 1);
        }
        $data['zenken'] = $zenken;

        
        $mail_magazine = $this->TbTsuMailmagazine->getOneMonthRecord(date('Ymd',strtotime($now_year.'/'.$now_month.'/1')),date('Ymd',strtotime($now_year.'/'.$now_month.'/'.$now_month_last_day)));
        $mail_magazine_array=[];
        foreach($mail_magazine as $item){
            $mail_magazine_array[date('j',strtotime($item->TARGET_DATE))][$item->ID] = $item;
        }
        $data['mail_magazine_array'] = $mail_magazine_array;
        

        return $data;
    }


    public function create($target_date,$request){

        $data = [];
        $week_label = ['日','月','火','水','木','金','土',];
        $data['week_label'] = $week_label;

        $jyo = config('const.JYO_CODE');


        //直近カレンダー
        $calendar = $this->TbTsuCalendar->getRecentRecordByDate($target_date);
        $data['calendar'] = $calendar;

        
        //直近レースインデックス
        $race_index = $this->TbRaceIndex->getUnfinishedRecord($target_date);
        //複数取得なので、先頭のレコードのみ
        $data['race_index'] = $race_index;

        $data['target_date'] = $target_date;

        //初期値系処理
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;
        if($kaisai_master){
            $syussou = $this->KyogiCommon->create_syussou_array($jyo,$kaisai_master->開始日付,12);    
            $data['syussou'] = $syussou;
            $data['kaisai_title'] = date('n/j',strtotime($kaisai_master->開始日付)) ."(". $week_label[date('w',strtotime($kaisai_master->開始日付))] . ") " .$kaisai_master->開催名称;

            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$kaisai_master->開始日付);
            $kaimon = $this->TbTsuKaimon->getFirstRecordByPK($kaisai_master->開始日付);
            
            $data['kaimon_time1'] = substr($kaimon->KAIMON_TIME,0,2);
            $data['kaimon_time2'] = substr($kaimon->KAIMON_TIME,2,2);
            $data['st_time1'] = substr($kaimon->ST_TIME,0,2);
            $data['st_time2'] = substr($kaimon->ST_TIME,2,2);

            $data['simekiri_jikoku1'] = substr($race_header->SIMEKIRI_JIKOKU12R,0,2);
            $data['simekiri_jikoku2'] = substr($race_header->SIMEKIRI_JIKOKU12R,2,2);

        }else{
            $data['syussou'] = [];
            $data['kaisai_title'] = "";
            
            $data['kaimon_time1'] = "";
            $data['kaimon_time2'] = "";;
            $data['st_time1'] = "";;
            $data['st_time2'] = "";;

            $data['simekiri_jikoku1'] = "";;
            $data['simekiri_jikoku2'] = "";;
        }


        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            /*
            $validate_config = $this->create_validate_config();
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );
            */

            //保存処理
            $post_result = $this->TbTsuMailmagazine->insertRecord($request,$target_date);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin/mail_magazine/';
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    public function edit($target_date,$id,$request){

        $mail_magazine = $this->TbTsuMailmagazine->getFirstRecordByPK($target_date,$id);

        $data['mail_magazine'] = $mail_magazine;
        $data['week_label'] = ['日','月','火','水','木','金','土',];


        //直近カレンダー
        $calendar = $this->TbTsuCalendar->getRecentRecordByDate($target_date);
        $data['calendar'] = $calendar;

        
        //直近レースインデックス
        $race_index = $this->TbRaceIndex->getUnfinishedRecord($target_date);
        //複数取得なので、先頭のレコードのみ
        $data['race_index'] = $race_index[0];

        $data['target_date'] = $target_date;
        $data['id'] = $id;

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            /*$validate_config = $this->create_validate_config();
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );*/

            //保存処理
            $post_result = $this->TbTsuMailmagazine->UpdateRecordByPK($request,$target_date,$id);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin/mail_magazine/';
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    
    public function yoyaku($target_date,$id,$request){

        $mail_magazine = $this->TbTsuMailmagazine->getFirstRecordByPK($target_date,$id);

        $data['mail_magazine'] = $mail_magazine;
        $data['week_label'] = ['日','月','火','水','木','金','土',];


        //直近カレンダー
        $calendar = $this->TbTsuCalendar->getRecentRecordByDate($target_date);
        $data['calendar'] = $calendar;

        
        //直近レースインデックス
        $race_index = $this->TbRaceIndex->getUnfinishedRecord($target_date);
        //複数取得なので、先頭のレコードのみ
        $data['race_index'] = $race_index[0];

        $data['target_date'] = $target_date;
        $data['id'] = $id;

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            /*$validate_config = $this->create_validate_config();
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );*/

            //保存処理
            $post_result = $this->TbTsuMailmagazine->UpdateRecordByPK($request,$target_date,$id);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin/mail_magazine/';
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }


    public function preview($target_date,$id,$request){

        $mail_magazine = $this->TbTsuMailmagazine->getFirstRecordByPK($target_date,$id);

        $data['mail_magazine'] = $mail_magazine;
        $data['week_label'] = ['日','月','火','水','木','金','土',];


        //直近カレンダー
        $calendar = $this->TbTsuCalendar->getRecentRecordByDate($target_date);
        $data['calendar'] = $calendar;

        
        //直近レースインデックス
        $race_index = $this->TbRaceIndex->getUnfinishedRecord($target_date);
        //複数取得なので、先頭のレコードのみ
        $data['race_index'] = $race_index[0];

        $data['target_date'] = $target_date;
        $data['id'] = $id;


        $fan_data = $this->FanData->getAllRecord();
        $fan_data_array = [];
        foreach($fan_data as $item){
            $fan_data_array[$item->Touban] = $item;
        }
        $data['fan_data_array'] = $fan_data_array;

        return $data;
    }


    public function delete($target_date,$id){
        $post_result = $this->TbTsuMailmagazine->deleteFirstRecordByPK($target_date,$id);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin/mail_magazine/';
        if($post_result){
            $data['redirect_message'] = 'データを削除しました';
        }else{
            $data['redirect_message'] = 'データの削除に失敗しました';
        }

        return $data;
    }

    public function create_validate_config()
    {
        return [
            'config' => [
                'START_DATE' => ['nullable','max:12','min:12'],
                'END_DATE' => ['nullable','max:12','min:12'],
                'TEXT' => ['required','max:140'],
                'APPEAR_FLG' => [],
                'EDITOR_NAME' => ['required','max:64'],
            ],
            'message' => [
            ],
        ];
    }

}