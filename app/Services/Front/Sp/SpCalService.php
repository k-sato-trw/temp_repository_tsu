<?php

namespace App\Services\Front\Sp;

use App\Repositories\TbTsuCalendar\TbTsuCalendarRepositoryInterface;
use App\Repositories\Holiday\HolidayRepositoryInterface;
use App\Repositories\ChushiJunen\ChushiJunenRepositoryInterface;
use App\Repositories\TbTsuMonthInfo\TbTsuMonthInfoRepositoryInterface;
use App\Repositories\TbRaceIndex\TbRaceIndexRepositoryInterface;
use App\Repositories\TbRaceTenbo\TbRaceTenboRepositoryInterface;
use App\Services\GeneralService;

class SpCalService
{
    public $TbTsuCalendar;
    public $Holiday;
    public $ChushiJunen;
    public $TbTsuMonthInfo;
    public $TbRaceIndex;
    public $TbRaceTenbo;
    public $GeneralService;

    public function __construct(
        TbTsuCalendarRepositoryInterface $TbTsuCalendar,
        HolidayRepositoryInterface $Holiday,
        ChushiJunenRepositoryInterface $ChushiJunen,
        TbTsuMonthInfoRepositoryInterface $TbTsuMonthInfo,
        TbRaceIndexRepositoryInterface $TbRaceIndex,
        TbRaceTenboRepositoryInterface $TbRaceTenbo,
        GeneralService $General
    ){
        $this->TbTsuCalendar = $TbTsuCalendar;
        $this->Holiday = $Holiday;
        $this->ChushiJunen = $ChushiJunen;
        $this->TbTsuMonthInfo = $TbTsuMonthInfo;
        $this->TbRaceIndex = $TbRaceIndex;
        $this->TbRaceTenbo = $TbRaceTenbo;
        $this->General = $General;

        if(strpos(url()->current(),'/admin/') !== false){
            $this->is_preview = true;
        }else{
            $this->is_preview = false;
        }
    }


    public function index($request){
        $data = [];

        $now_date = $request->input('yd') ?? date('Ymd');

        
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

            $lines = $this->mold_calendar_layout(
                $day_layout,
                1,
                1,
                ["09"],
                null,
                $now_year,
                $now_month,
                $now_month_last_day
            );
            
            $lines = $this->insert_close_day(
                1,
                $lines,
                $now_year,
                $now_month,
                $now_month_last_day
            );

            $data['honjyo_array'] = $lines[1];

        }

        { //カレンダーデータ　TV
            
            $lines = $this->mold_calendar_layout(
                $day_layout,
                2,
                1,
                ["31","32","33","34","35","36","37","38"],
                null,
                $now_year,
                $now_month,
                $now_month_last_day
            );
            
            $data['tv_lines'] = $lines;

        }

        { //カレンダーデータ　本場内
            
            $lines = $this->mold_calendar_layout(
                $day_layout,
                3,
                5,
                ["01","02","03","05","04","06","07","08","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24",],
                null,
                $now_year,
                $now_month,
                $now_month_last_day
            );

            $result_lines = [];
            foreach($lines as $line_number => $line){
                
                //データが一つでもあるかの存在確認
                $data_exists =  false;
                for($day = 1; $day <= $now_month_last_day; $day++){
                    if($line[$day]['type'] != "blank"){
                        $data_exists =  true;
                        break;
                    }
                }

                if($data_exists){
                    $result_lines[$line_number] = $line;
                }
            }
            $lines = $result_lines;
            
            $lines = $this->insert_close_day(
                3,
                $lines,
                $now_year,
                $now_month,
                $now_month_last_day
            );

            $data['honjyonai_lines'] = $lines;

        }
        
        
        { //月コメントデータを呼ぶ
            $month_info = $this->TbTsuMonthInfo->getFirstRecordByDate($now_date);

            if($month_info){
                $data['month_info'] = $month_info;
            }
        }
        

        $last_record = $this->TbTsuCalendar->getLastRecordForCalendar();
        $data['last_date'] = $last_record->END_DATE;

        $data['week_label'] = ['日','月','火','水','木','金','土',];

        return $data;
    }



    //カレンダー形成処理
    public function mold_calendar_layout(
        $day_layout,
        $type,
        $max_line,
        $jyo_array = [],
        $race_type_array = [],
        $now_year,
        $now_month,
        $now_month_last_day
    )
    {
    
        $lines = [];

        for($line_count = 1; $line_count <= $max_line; $line_count++){
            
            //基本レイアウトコピー
            $calendar_one_line = $day_layout;

            //1ライン分のデータ取得            
            $holdentry = $this->TbTsuCalendar->getLineForFront($type,$line_count, $jyo_array, $race_type_array, $now_year, $now_month,$this->is_preview);

            foreach($holdentry as $item){
                //配列としてコピー
                $target_array = [];
                
                $target_array['ID'] = $item->ID;
                $target_array['TYPE'] = $item->TYPE;
                $target_array['JYO'] = $item->JYO;
                $target_array['START_DATE'] = $item->START_DATE;
                $target_array['END_DATE'] = $item->END_DATE;
                $target_array['RACE_TITLE'] = $item->RACE_TITLE;
                $target_array['CALENDAR_RACE_TITLE'] = $item->CALENDAR_RACE_TITLE;
                $target_array['GRADE'] = $item->GRADE;
                $target_array['RACE_TYPE'] = $item->RACE_TYPE;
                $target_array['LADY_FLG'] = $item->LADY_FLG;
                $target_array['VIEW_LINE'] = $item->VIEW_LINE;
                $target_array['APPEAR_FLG'] = $item->APPEAR_FLG;

                
                //先月の日付があった場合成形
                if($target_array['START_DATE'] < $now_year . $now_month . '01'){
                    $target_array['START_DATE'] = $now_year . $now_month . '01';
                }
            
                //来月の日付があった場合成形
                if($target_array['END_DATE'] > $now_year . $now_month . $now_month_last_day){
                    $target_array['END_DATE'] = $now_year . $now_month . $now_month_last_day;
                }

                //日付のみ抽出 0パディングなし
                $start_day = date('j', strtotime($target_array['START_DATE']));
                $end_day = date('j', strtotime($target_array['END_DATE']));

                //日数算出 = colspan
                $colspan = (int) $target_array['END_DATE'] - (int) $target_array['START_DATE'] + 1;

                //レイアウトに情報を入れ込み
                for($day = $start_day;$day <= $end_day;$day++){

                    if($day == $start_day){
                        //初日の場合、各データ入れ込み
                        $calendar_one_line[$day]['type'] = "head";

                    }else{
                        //初日で無い場合はコピー
                        $calendar_one_line[$day]['type'] = "copy";

                    }
                    $calendar_one_line[$day]['colspan'] = $colspan;
                    $calendar_one_line[$day]['record'] = $target_array;

                    $colspan--;
                }

            }

            $lines[$line_count] = $calendar_one_line;

        } // lineのloop

        return $lines;
    }

    //休館日処理
    public function insert_close_day(
        $type,
        $lines,
        $now_year,
        $now_month,
        $now_month_last_day)
    {

        $close_day = $this->TbTsuCalendar->getCloseDay($type,$now_year,$now_month);

        foreach($close_day as $item){
            //配列としてコピー
            $target_array = [];
            $target_array['ID'] = $item->ID;
            $target_array['TYPE'] = $item->TYPE;
            $target_array['JYO'] = $item->JYO;
            $target_array['START_DATE'] = $item->START_DATE;
            $target_array['END_DATE'] = $item->END_DATE;
            $target_array['RACE_TITLE'] = $item->RACE_TITLE;
            $target_array['CALENDAR_RACE_TITLE'] = $item->CALENDAR_RACE_TITLE;
            $target_array['GRADE'] = $item->GRADE;
            $target_array['RACE_TYPE'] = $item->RACE_TYPE;
            $target_array['LADY_FLG'] = $item->LADY_FLG;
            $target_array['VIEW_LINE'] = $item->VIEW_LINE;
            $target_array['APPEAR_FLG'] = $item->APPEAR_FLG;

            //先月の日付があった場合成形
            if($target_array['START_DATE'] < $now_year . $now_month . '01'){
                $target_array['START_DATE'] = $now_year . $now_month . '01';
            }
        
            //来月の日付があった場合成形
            if($target_array['END_DATE'] > $now_year . $now_month . $now_month_last_day){
                $target_array['END_DATE'] = $now_year . $now_month . $now_month_last_day;
            }

            //日数算出 = colspan
            $close_colspan = (int) $target_array['END_DATE'] - (int) $target_array['START_DATE'] + 1;

            //日付のみ抽出 0パディングなし
            $start_day = date('j', strtotime($target_array['START_DATE']));
            $end_day = date('j', strtotime($target_array['END_DATE']));

            //レイアウトに情報を入れ込み
            for($day = $start_day; $day <= $end_day; $day++){

                //休館初日かどうか →　close or copy
                if($day == $start_day){
                    $override_type = "close";
                }else{
                    $override_type = "copy";
                }

                foreach($lines as $line_number => $line){

                    if($line[$day]['type'] == "blank" || $day == $now_month_last_day){
                        //元がblank →　上書きするだけ

                    }else{

                        //元がhead or copy
                        if($line[$day + 1]['type'] == "copy"){
                            //次の日がcopy →　次の日にheadを移す
                            $lines[$line_number][$day + 1]['type'] = "head";
                        }

                        //元がcopyの場合かつ、休館初日の場合のみ　親のheadのcolspanを減らす
                        if($line[$day]['type'] == "copy" && $day == $start_day){
                            for($colspan_minus = 1;$colspan_minus < 32; $colspan_minus++){
                                $lines[$line_number][$day - $colspan_minus]['colspan'] = $colspan_minus;
                                if($lines[$line_number][$day - $colspan_minus]['type'] == "head"){
                                    break;
                                }
                            }
                        }

                    
                    }

                    //1行目
                    if($line_number == 1){
                        $lines[$line_number][$day]['type'] = $override_type;
                        if($override_type == "close"){
                            $lines[$line_number][$day]['colspan'] = $close_colspan;
                            $lines[$line_number][$day]['record'] = $target_array;
                        }
                    }else{
                        //その他行 → copy確定で同じ工程
                        $lines[$line_number][$day]['type'] = 'copy';
                    }
                }

            }

        }
        return $lines;

    }

}