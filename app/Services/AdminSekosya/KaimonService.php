<?php

namespace App\Services\AdminSekosya;

use App\Repositories\TbTsuEventfanmaster\TbTsuEventfanmasterRepositoryInterface;
use App\Repositories\TbTsuMonthInfo\TbTsuMonthInfoRepositoryInterface;
use App\Repositories\TbTsuCalendar\TbTsuCalendarRepositoryInterface;
use App\Repositories\TbTsuKaimon\TbTsuKaimonRepositoryInterface;
use App\Services\GeneralService;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;

class KaimonService
{
    public $TbTsuEventfanmaster;
    public $TbTsuMonthInfo;
    public $TbTsuCalendar;
    public $TbTsuKaimon;
    public $GeneralService;

    public function __construct(
        TbTsuEventfanmasterRepositoryInterface $TbTsuEventfanmaster,
        TbTsuMonthInfoRepositoryInterface $TbTsuMonthInfo,
        TbTsuCalendarRepositoryInterface $TbTsuCalendar,
        TbTsuKaimonRepositoryInterface $TbTsuKaimon,
        GeneralService $General
    ){
        $this->TbTsuEventfanmaster = $TbTsuEventfanmaster;
        $this->TbTsuMonthInfo = $TbTsuMonthInfo;
        $this->TbTsuCalendar = $TbTsuCalendar;
        $this->TbTsuKaimon = $TbTsuKaimon;
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
        
        {
            //開門時間データ呼び出し

            //一月分のデータ呼び出し
            $kaimon = $this->TbTsuKaimon->getOneMonthRecord($now_year.$now_month.'01',$now_year.$now_month.$now_month_last_day);

            //日付ごとに、配列成形
            $kaimon_array = [];
            foreach($kaimon as $item){
                $kaimon_array[$item->TARGET_DATE] = $item;
            }

            $data['kaimon_array'] = $kaimon_array;

        }


        return $data;
    }


    public function create($target_date ,$request){ //本場新規作成画面

        $data = [];

        $data['target_date'] = $target_date;

        $data['start_date'] = $target_date;

        $data['end_date'] = $target_date;



        if($request->isMethod('post')){
            //POST処理
            
            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config("kaimon");
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );



            //登録処理
            $date_list = [];

            $tmp_date = $request->input('start_date');
            while($tmp_date <= $request->input('end_date')){
                $date_list[] = $tmp_date;
                $tmp_date = date('Ymd',strtotime('+1 day',strtotime($tmp_date)));
            }
            
            $post_result = $this->TbTsuKaimon->UpsertRecordByDateList($date_list,$request);

            $success_count = 0;
            $failure_count = 0;

            foreach($post_result as $item){
                if($item){
                    $success_count++;
                }else{
                    $failure_count++;
                }
            }
            
            $data['post_result'] = $post_result;
            $data['redirect_url'] = "/admin_sekosya/kaimon/";
            if(!$failure_count){
                $data['redirect_message'] = "すべての処理が正常に終了しました";
            }else{
                $data['redirect_message'] = $success_count."個の処理が実行され、".$failure_count."個の処理が失敗しました";
            }

        }

        return $data;
    }

    public function edit($target_date ,$request){ //本場編集画面

        $kaimon = $this->TbTsuKaimon->getFirstRecordByPK($target_date);
        $data['kaimon'] = $kaimon;

        $now_year = date("Y",strtotime($target_date));
        $now_month = date("m",strtotime($target_date));

        if($now_month == 12){
            $now_month_last_day = date("d",strtotime('-1 day',strtotime(($now_year + 1) . '0101')));
        }else{
            $now_month_last_day = date("d",strtotime('-1 day',strtotime($now_year . str_pad($now_month + 1, 2, '0', STR_PAD_LEFT) . '01')));
        }

        $one_month_kaimon = $this->TbTsuKaimon->getOneMonthRecord($now_year.$now_month.'01',$now_year.$now_month.$now_month_last_day);
        
        //開始日と終了日の割り出し
        $array_count = 1;
        $target_array_count = false;
        $grouping_result = [];
        $tmp_KAIMON_TIME = "";
        $tmp_ST_TIME = "";
        $tmp_APPEAR_FLG = "";
        $tmp_date = "";
        
        foreach($one_month_kaimon as $item){
            if(!$grouping_result){
                $tmp_KAIMON_TIME = $item->KAIMON_TIME;
                $tmp_ST_TIME = $item->ST_TIME;
                $tmp_APPEAR_FLG = $item->APPEAR_TIME;
                $tmp_date = date('j',strtotime($item->TARGET_DATE)) -1; //日付の連続性を確認

                $grouping_result[$array_count]['start_date'] = $item->TARGET_DATE;
                $grouping_result[$array_count]['end_date'] = $item->TARGET_DATE;
            }

            if(
                $tmp_KAIMON_TIME == $item->KAIMON_TIME &&
                $tmp_ST_TIME == $item->ST_TIME &&
                $tmp_APPEAR_FLG == $item->APPEAR_TIME &&
                $tmp_date + 1 == date('j',strtotime($item->TARGET_DATE))  //日付が連続していなかった場合は別グループと判断
            ){
                //すべて同じだった場合、同一グループと判定
                $grouping_result[$array_count]['end_date'] = $item->TARGET_DATE;

            }else{
                //一つでも異なる場合は、違うグループと判定

                $array_count += 1;
                $tmp_KAIMON_TIME = $item->KAIMON_TIME;
                $tmp_ST_TIME = $item->ST_TIME;
                $tmp_APPEAR_FLG = $item->APPEAR_TIME;

                $grouping_result[$array_count]['start_date'] = $item->TARGET_DATE;
                $grouping_result[$array_count]['end_date'] = $item->TARGET_DATE;
            }

            if($item->TARGET_DATE == $target_date){
                $target_array_count = $array_count;
            }

            $tmp_date = date('j',strtotime($item->TARGET_DATE));

        }

        $start_date = $grouping_result[$target_array_count]['start_date'];
        $end_date = $grouping_result[$target_array_count]['end_date'];
        
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;


        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config("kaimon");
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );




            //登録処理

            $date_list = [];

            $tmp_date = $request->input('start_date');
            while($tmp_date <= $request->input('end_date')){
                $date_list[] = $tmp_date;
                $tmp_date = date('Ymd',strtotime('+1 day',strtotime($tmp_date)));
            }
            
            $post_result = $this->TbTsuKaimon->UpsertRecordByDateList($date_list,$request);

            $success_count = 0;
            $failure_count = 0;

            foreach($post_result as $item){
                if($item){
                    $success_count++;
                }else{
                    $failure_count++;
                }
            }
            

            $data['post_result'] = $post_result;
            $data['redirect_url'] = "/admin_sekosya/kaimon/";
            if(!$failure_count){
                $data['redirect_message'] = "すべての処理が正常に終了しました";
            }else{
                $data['redirect_message'] = $success_count."個の処理が実行され、".$failure_count."個の処理が失敗しました";
            }

        }

        return $data;
    }

    public function delete($request){
        $tmp_date = $request->input('start_date');
        while($tmp_date <= $request->input('end_date')){
            $date_list[] = $tmp_date;
            $tmp_date = date('Ymd',strtotime('+1 day',strtotime($tmp_date)));
        }

        $post_result = $this->TbTsuKaimon->DeleteRecordByDateList($date_list);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = "admin_sekosya/kaimon/";
        if($post_result){
            $data['redirect_message'] = "データを削除しました";
        }else{
            $data['redirect_message'] = "データの削除に失敗しました";
        }
        
        return $data;
    }

    public function change_appear_flg($target_year_month,$appear_flg){

        $data['redirect_url'] = 'admin_sekosya/kaimon/';

        $post_result = $this->TbTsuKaimon->changeAppearFlg($target_year_month,$appear_flg);

        $data['post_result'] = $post_result;
        if($post_result){
            $data['redirect_message'] = '指定データの掲載フラグを変更しました';
        }else{
            $data['redirect_message'] = '掲載フラグの変更に失敗しました';
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
        $config["kaimon"] = [
            "config" => [
                'start_date' => ['required','digits:8'],
                'end_date' => ['required','digits:8'],
                'KAIMON_TIME' => ['digits:4'],
                'ST_TIME' => ['digits:4'],
                'APPEAR_FLG' => [],
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