<?php

namespace App\Services\Admin;

use App\Repositories\TbTsuEventfanmaster\TbTsuEventfanmasterRepositoryInterface;
use App\Repositories\TbTsuMonthInfo\TbTsuMonthInfoRepositoryInterface;
use App\Repositories\TbTsuCalendar\TbTsuCalendarRepositoryInterface;
use App\Services\GeneralService;
use Illuminate\Support\Facades\DB;

class CalendarService
{
    public $TbTsuEventfanmaster;
    public $TbTsuMonthInfo;
    public $TbTsuCalendar;
    public $GeneralService;

    public function __construct(
        TbTsuEventfanmasterRepositoryInterface $TbTsuEventfanmaster,
        TbTsuMonthInfoRepositoryInterface $TbTsuMonthInfo,
        TbTsuCalendarRepositoryInterface $TbTsuCalendar,
        GeneralService $General
    ){
        $this->TbTsuEventfanmaster = $TbTsuEventfanmaster;
        $this->TbTsuMonthInfo = $TbTsuMonthInfo;
        $this->TbTsuCalendar = $TbTsuCalendar;
        $this->General = $General;
    }


    public function index($request){
        
        $now_date = date("Ymd");

        if(!is_null($request->input('now_year_month'))){
            $now_date = $request->input('now_year_month') ."01";
        }

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
            
            $lines = $this->insert_close_day(
                3,
                $lines,
                $now_year,
                $now_month,
                $now_month_last_day
            );

            $data['honjyonai_lines'] = $lines;

        }
        
        
        { //カレンダーデータ　外向け
            
            $lines = $this->mold_calendar_layout(
                $day_layout,
                4,
                11,
                ["01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24",],
                null,
                $now_year,
                $now_month,
                $now_month_last_day
            );
            
            
            $lines = $this->insert_close_day(
                4,
                $lines,
                $now_year,
                $now_month,
                $now_month_last_day
            );
            
            $data['sotomuke_lines'] = $lines;

        }


        { //カレンダーデータ　イベントファン用
            
            $lines = $this->mold_calendar_layout(
                $day_layout,
                5,
                1,
                [],
                null,
                $now_year,
                $now_month,
                $now_month_last_day
            );
            
            $data['event_fan_lines'] = $lines;

        }

        /*
        { //tb_heiwajima_event_masterのIDリストを出力
            $event_master = $this->TbTsuEventfanmaster->getIdList();
            
            $event_master_id_list = [];
            foreach($event_master as $item){
                $event_master_id_list[] = $item->ID;
            }
            $data['event_master_id_list'] = $event_master_id_list;
        }
        */

        
        { //月コメントデータを呼ぶ
            $month_info = $this->TbTsuMonthInfo->getFirstRecordByDate($now_date);

            if($month_info){
                $data['month_info'] = $month_info;
            }
        }
        


        return $data;
    }


    public function create($mode, $target_date,$target_line ,$request){ //本場新規作成画面

        $data = [];

        $data['target_date'] = $target_date;

        $data['target_line'] = $target_line;


        //mode別セレクトオプション設定
        if($mode == "honjyonai"){
            $data['jyo_options'] = $this->General::create_jyo_options($mode);
            $data['line_options'] = $this->General::create_line_options($mode);
        }elseif($mode == "tv"){
            $data['jyo_options'] = $this->General::create_jyo_options($mode);
        }elseif($mode == "sotomuke"){
            $data['jyo_options'] = $this->General::create_jyo_options($mode);
            $data['line_options'] = $this->General::create_line_options($mode);
        }

        if($request->isMethod('post')){
            //POST処理
            
            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config("calendar");
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //基本バリデーション成功後のみのバリデーション処理追加
            {
                $validate_config = $this->create_validate_config_calendar_after($request,$mode);
                $request->validate(
                    $validate_config['config'],
                    $validate_config['message']
                );
            }

            //空の値を補完する為、配列化してnull値補完
            {
                //null値処理
                $posts = $request->all();
                if(!isset($posts['APPEAR_FLG'])){
                    $posts['APPEAR_FLG'] = 0;
                }
                if(!isset($posts['LADY_FLG'])){
                    $posts['LADY_FLG'] = '';
                }
                if(is_null($posts['EDITOR_NAME'])){
                    $posts['EDITOR_NAME'] = '';
                }
                
            }

            
            $full_layout = $this->General->create_holdentry_layout();
            $insert_array = array_replace($full_layout,$posts);

            //登録処理
            $post_result = $this->TbTsuCalendar->insertRecord($insert_array,$mode);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = "admin/calendar/";
            if($post_result){
                $data['redirect_message'] = "データを更新しました";
            }else{
                $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
            }


        }

        return $data;
    }

    public function edit($mode , $id ,$request){ //本場編集画面
        $holdentry = $this->TbTsuCalendar->getFirstRecordByPK($id);

        $data['holdentry'] = $holdentry;

        //mode別セレクトオプション設定
        if($mode == "honjyonai"){
            $data['jyo_options'] = $this->General::create_jyo_options($mode);
            $data['line_options'] = $this->General::create_line_options($mode);
        }elseif($mode == "tv"){
            $data['jyo_options'] = $this->General::create_jyo_options($mode);
        }elseif($mode == "sotomuke"){
            $data['jyo_options'] = $this->General::create_jyo_options($mode);
            $data['line_options'] = $this->General::create_line_options($mode);
        }

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config("calendar");
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );
 
            //基本バリデーション成功後のみのバリデーション処理追加
            {
                $validate_config = $this->create_validate_config_calendar_after($request,$mode,$id);
                $request->validate(
                    $validate_config['config'],
                    $validate_config['message']
                );
            }
 

            {
                //null値処理
                $posts = $request->all();
                if(!isset($posts['APPEAR_FLG'])){
                    $posts['APPEAR_FLG'] = 0;
                }
                if(!isset($posts['LADY_FLG'])){
                    $posts['LADY_FLG'] = '';
                }
                if(is_null($posts['EDITOR_NAME'])){
                    $posts['EDITOR_NAME'] = '';
                }
            }

    
            $full_layout = $this->General->create_holdentry_layout();
            $insert_array = array_replace($full_layout,$posts);

            //登録処理
            $post_result = $this->TbTsuCalendar->UpdateRecordByPK($insert_array,$id,$mode);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = "admin/calendar/";
            if($post_result){
                $data['redirect_message'] = "データを更新しました";
            }else{
                $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
            }

        }

        return $data;
    }

    public function delete($id){
        $post_result = $this->TbTsuCalendar->deleteFirstRecordByPK($id);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = "admin/calendar/";
        if($post_result){
            $data['redirect_message'] = "データを削除しました";
        }else{
            $data['redirect_message'] = "データの削除に失敗しました";
        }
        
        return $data;
    }

    public function change_appear_flg($request){ //一括更新

        if($request->isMethod('post')){

            $post_result = $this->TbTsuCalendar->ChangeAppearFlg($request);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = "admin/calendar?now_year_month";
            if($post_result){
                $data['redirect_message'] = "データを更新しました";
            }else{
                $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
            }
        }
        return $data;
    }

    public function upsert_month_info($request){ //月コメント更新

        $month_info = $this->TbTsuMonthInfo->getFirstRecordByDate($request->input('TARGET_MONTH'));

        if($request->isMethod('post')){

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config("month_info");
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //画像登録があった場合
            {
                if($request->delete_PDF_FILE){
                        
                    //画像削除の場合  
                    $delete_target = $month_info->PDF_FILE;

                    //対象ファイルを削除
                    $target_path = public_path(config('const.IMAGE_PATH.MONTH_INFO'));
                    if (file_exists($target_path.$delete_target)) {
                        unlink($target_path.$delete_target);
                    }

                    $file_name = "";
                        
                }elseif($file = $request->PDF_FILE){
                    $file = $request->PDF_FILE;
                        
                    //保存するファイルに名前をつける    
                    $file_name = $request->TARGET_MONTH.'.'.$file->getClientOriginalExtension();

                    //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
                    $target_path = public_path(config('const.IMAGE_PATH.MONTH_INFO'));
                    $file->move($target_path,$file_name);

                }else{

                    if($month_info){
                        $file_name = $month_info->PDF_FILE;
                    }else{
                        $file_name = '';
                    }
                }
            }


            $post_result = $this->TbTsuMonthInfo->upsertRecord($request ,$file_name);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin/calendar?now_year_month='.$request->input('TARGET_DATE');
            if($post_result){
                $data['redirect_message'] = "データを更新しました";
            }else{
                $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
            }
        }
        return $data;
    }

    
    public function create_validate_config($type)
    {
        $config["calendar"] = [
            "config" => [
                'START_DATE' => ['required','digits:8',],
                'END_DATE' => ['required','digits:8',],
                'RACE_TITLE' => ['max:128'],
                'CALENDAR_RACE_TITLE' => ['max:128'],
                'EDITOR_NAME' => ['max:32'],
            ],
            "message" => [
            ],
        ];
        $config["month_info"] = [
            "config" => [
                'PDF_FILE' => ['nullable','file'],
                'PDF_FLAG' => [],
                'CAL_TEXT' => ['max:500',],
                'CAL_TEXT_FLG' => [],
            ],
            "message" => [
            ],
        ];

        return $config[$type];
    }

    public function create_validate_config_calendar_after($request ,$mode,$id = 0)
    {
        return [
            "config" => [
                'START_DATE' => [function ($attribute, $value, $fail) use($request,$mode,$id)  {
                    $start_date = $request->input('START_DATE');
                    $end_date = $request->input('END_DATE');

                    if($start_date > $end_date){
                        return $fail('開始日が終了日の日付より未来になっています');
                    }
                    
                    //日ごとに配列化
                    $date_array = [];
                    for($i = $start_date; $i <= $end_date; $i++){
                        $date_array[] = $i;
                    }

                    //該当日と重なるデータがあるか
                    foreach($date_array as $item){
                        $check = $this->TbTsuCalendar->checkDuplicate($item,$mode,$request->input('VIEW_LINE'),$id);
                        
                        if($check){
                            return $fail('重複する日付が存在します');
                        }
                    }
                }],
            ],
            "message" => [
            ],
        ];
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
            $holdentry = $this->TbTsuCalendar->getLine($type,$line_count, $jyo_array, $race_type_array, $now_year, $now_month);

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