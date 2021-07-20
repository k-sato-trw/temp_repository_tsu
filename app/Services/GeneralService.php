<?php

namespace App\Services;

class GeneralService
{

    public static function number_to_alphabet($numbar){
        $array = [
            1 => "A",
            2 => "B",
            3 => "C",
            4 => "D",
            5 => "E",
            6 => "F",
            7 => "G",
            8 => "H",
            9 => "I",
            10 => "J",
            11 => "K",
            12 => "L",
            13 => "M",
            14 => "N",
            15 => "O",
            16 => "P",
            17 => "Q",
            18 => "R",
            19 => "S",
            20 => "T",
            21 => "U",
            22 => "V",
            23 => "W",
            24 => "X",
            25 => "Y",
            26 => "Z",
        ];

        if(isset($array[$numbar])){
            return $array[$numbar];
        }else{
            return $numbar;
        }
    }

    public static function alphabet_to_number($alphabet){
        
        $array = [
            "A" => 1,
            "B" => 2,
            "C" => 3,
            "D" => 4,
            "E" => 5,
            "F" => 6,
            "G" => 7,
            "H" => 8,
            "I" => 9,
            "J" => 10,
            "K" => 11,
            "L" => 12,
            "M" => 13,
            "N" => 14,
            "O" => 15,
            "P" => 16,
            "Q" => 17,
            "R" => 18,
            "S" => 19,
            "T" => 20,
            "U" => 21,
            "V" => 22,
            "W" => 23,
            "X" => 24,
            "Y" => 25,
            "Z" => 26,
        ];

        if(isset($array[$alphabet])){
            return $array[$alphabet];
        }else{
            return $alphabet;
        }

    }

    public static function jyocode_to_jyoname($jyo_code){
        $array = [
            "01" => "桐生",
            "02" => "戸田",
            "03" => "江戸川",
            "04" => "平和島",
            "05" => "多摩川",
            "06" => "浜名湖",
            "07" => "蒲郡",
            "08" => "常滑",
            "09" => "津",
            "10" => "三国",
            "11" => "びわこ",
            "12" => "住之江",
            "13" => "尼崎",
            "14" => "鳴門",
            "15" => "丸亀",
            "16" => "児島",
            "17" => "宮島",
            "18" => "徳山",
            "19" => "下関",
            "20" => "若松",
            "21" => "芦屋",
            "22" => "福岡",
            "23" => "唐津",
            "24" => "大村",
        ];

        if(isset($array[$jyo_code])){
            return $array[$jyo_code];
        }else{
            return $jyo_code;
        }
    }

    
    public static function jyocode_to_tvname_in_calendar($jyo_code){
        $array = [
            "31" => "[TV]JLC680HD",
            "32" => "[TV]JLC681HD",
            "33" => "[TV]JLC682HD",
            "34" => "[TV]JLC683HD",
            "35" => "[TV]JLC684HDレディース",
            "36" => "[TV]JLC685HDWプラス",
            "37" => "[TV]JLC686HDプラス",
            "38" => "[TV]JLC687HDプラス",
        ];

        if(isset($array[$jyo_code])){
            return $array[$jyo_code];
        }else{
            return $jyo_code;
        }
    }

    public static function jyocode_to_tv_number_for_cms_calendar($jyo_code){
        $array = [
            "31" => "0",
            "32" => "1",
            "33" => "2",
            "34" => "3",
            "35" => "4",
            "36" => "5",
            "37" => "6",
            "38" => "7",
        ];

        if(isset($array[$jyo_code])){
            return $array[$jyo_code];
        }else{
            return $jyo_code;
        }
    }

    public static function jyocode_to_tv_image_number_for_fornt_calendar($jyo_code){
        $array = [
            "80" => "0",
            "81" => "1",
            "82" => "2",
            "83" => "3",
            "84" => "4",
            "85" => "5",
            "86" => "6",
            "89" => "7",
        ];

        if(isset($array[$jyo_code])){
            return $array[$jyo_code];
        }else{
            return $jyo_code;
        }
    }



    public static function gradenumber_to_gradename_in_calendar($gradenumber){
        $array = [
            1 => "SG",
            2 => "GⅠ",
            3 => "GⅡ",
            4 => "GⅢ",
            5 => "",
        ];

        if(isset($array[$gradenumber])){
            return $array[$gradenumber];
        }else{
            return $gradenumber;
        }
    }

    public static function gradenumber_to_gradename_for_front_calendar($gradenumber){
        $array = [
            1 => "SG",
            2 => "G1",
            3 => "G2",
            4 => "G3",
            5 => "G0",
        ];

        if(isset($array[$gradenumber])){
            return $array[$gradenumber];
        }else{
            return $gradenumber;
        }
    }

    public static function gradenumber_to_gradename_for_cms_calendar($gradenumber){
        $array = [
            0 => "SG",
            1 => "G1",
            2 => "G2",
            3 => "G3",
        ];

        if(isset($array[$gradenumber])){
            return $array[$gradenumber];
        }else{
            return '';
        }
    }

    public static function gradenumber_to_gradename_for_front_syussou($gradenumber){
        $array = [
            0 => "SG",
            1 => "G1",
            2 => "G2",
            3 => "G3",
            4 => "G0",
            5 => "G3",
        ];

        if(isset($array[$gradenumber])){
            return $array[$gradenumber];
        }else{
            return $gradenumber;
        }
    }
    

    public static function gradenumber_to_gradename_for_plofile($gradenumber){
        $array = [
            0 => "SG",
            1 => "GⅠ",
            2 => "GⅡ",
            3 => "GⅢ",
            5 => "GⅢ",
        ];

        if(isset($array[$gradenumber])){
            return $array[$gradenumber];
        }else{
            return "一般";
        }
    }

    

    public static function gradenumber_to_gradename_for_syutujo($gradenumber){
        $array = [
            0 => "SG",
            1 => "G1",
            2 => "G2",
            3 => "G3",
            5 => "G3",
        ];

        if(isset($array[$gradenumber])){
            return $array[$gradenumber];
        }else{
            return "一般";
        }
    }

    public static function gradenumber_to_gradename_for_tokyo_next($gradenumber){
        $array = [
            0 => "SG",
            1 => "G1",
            2 => "G2",
            3 => "G3",
        ];

        if(isset($array[$gradenumber])){
            return $array[$gradenumber];
        }else{
            return "一般";
        }
    }

    public static function gradenumber_to_gradename_for_tokyo_next_image($gradenumber){
        $array = [
            0 => "sg",
            1 => "g1",
            2 => "g2",
            3 => "g3",
            5 => "g3",
        ];

        if(isset($array[$gradenumber])){
            return $array[$gradenumber];
        }else{
            return "g0";
        }
    }

    public static function weeknumber_to_weekalphabet($weeknumber){
        $array = [
            0 => "sun",
            1 => "mon",
            2 => "tue",
            3 => "wed",
            4 => "thu",
            5 => "fri",
            6 => "sat",
        ];

        if(isset($array[$weeknumber])){
            return $array[$weeknumber];
        }else{
            return $weeknumber;
        }
    }

    public static function jyocode_to_jyoname2($jyo_code){
        $array = [
            "01" => "桐生",
            "02" => "戸田",
            "03" => "江戸川",
            "04" => "平和島",
            "05" => "多摩川",
            "06" => "浜名湖",
            "07" => "蒲郡",
            "08" => "常滑",
            "09" => "津",
            "10" => "三国",
            "11" => "びわこ",
            "12" => "住之江",
            "13" => "尼崎",
            "14" => "鳴門",
            "15" => "丸亀",
            "16" => "児島",
            "17" => "宮島",
            "18" => "徳山",
            "19" => "下関",
            "20" => "若松",
            "21" => "芦屋",
            "22" => "福岡",
            "23" => "唐津",
            "24" => "大村",

            "80" => "[TV]680ch",
            "81" => "[TV]681ch",
            "82" => "[TV]682ch",
            "83" => "[TV]683ch",
            "84" => "[TV]684ch",
            "85" => "[TV]685ch",
            "86" => "[TV]686ch",
            "89" => "[TV]687ch",
            "99" => "平和島劇場追加",
            "77" => "イベントファン用",
            "87" => "[TV]240ch(現在未使用)",
            "88" => "[TV]ケーブルテレビ品川(現在未使用)",
        ];

        if(isset($array[$jyo_code])){
            return $array[$jyo_code];
        }else{
            return $jyo_code;
        }
    }

    
    public static function information_type_label($number){
        $array = [
            1 => "更新",
            2 => "お知らせ",
            3 => "重要",
        ];

        if(isset($array[$number])){
            return $array[$number];
        }else{
            return $number;
        }
    }

    public static function create_holdentry_layout(){
        $array = [
            'TYPE' => '',
            'JYO' => '',
            'START_DATE' => '',
            'END_DATE' => '',
            'RACE_TITLE' => '',
            'CALENDAR_RACE_TITLE' => '',
            'GRADE' => '',
            'RACE_TYPE' => '',
            'LADY_FLG' => 0,
            'VIEW_LINE' => '',
            'APPEAR_FLG' => 0,
            'EDITOR_NAME' => '',
        ];

        return $array;
    }

    public static function create_jyo_options($mode){
        $array = [];
        $array['honjyonai'] = [
            "01" => "桐生",
            "02" => "戸田",
            "03" => "江戸川",
            "04" => "平和島",
            "05" => "多摩川",
            "06" => "浜名湖",
            "07" => "蒲郡",
            "08" => "常滑",
            "10" => "三国",
            "11" => "びわこ",
            "12" => "住之江",
            "13" => "尼崎",
            "14" => "鳴門",
            "15" => "丸亀",
            "16" => "児島",
            "17" => "宮島",
            "18" => "徳山",
            "19" => "下関",
            "20" => "若松",
            "21" => "芦屋",
            "22" => "福岡",
            "23" => "唐津",
            "24" => "大村",
        ];

        $array['tv'] = [
            "31" => "[TV]JLC680HD",
            "32" => "[TV]JLC681HD",
            "33" => "[TV]JLC682HD",
            "34" => "[TV]JLC683HD",
            "35" => "[TV]JLC684HDレディース",
            "36" => "[TV]JLC685HDWプラス",
            "37" => "[TV]JLC686HDプラス",
            "38" => "[TV]JLC687HDプラス",
        ];

        $array['sotomuke'] = [
            "01" => "桐生",
            "02" => "戸田",
            "03" => "江戸川",
            "04" => "平和島",
            "05" => "多摩川",
            "06" => "浜名湖",
            "07" => "蒲郡",
            "08" => "常滑",
            "09" => "津",
            "10" => "三国",
            "11" => "びわこ",
            "12" => "住之江",
            "13" => "尼崎",
            "14" => "鳴門",
            "15" => "丸亀",
            "16" => "児島",
            "17" => "宮島",
            "18" => "徳山",
            "19" => "下関",
            "20" => "若松",
            "21" => "芦屋",
            "22" => "福岡",
            "23" => "唐津",
            "24" => "大村",
        ];

        return $array[$mode];
    }

    public static function create_line_options($mode){
        $array = [];
        $array['honjyonai'] = [
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
        ];

        $array['sotomuke'] = [
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
            7 => 7,
            8 => 8,
            9 => 9,
            10 => 10,
            11 => 11,
        ];

        return $array[$mode];
    }

    public static function create_grade_options_in_raceindex(){

        $array = [
            0 => '一般',
            1 => 'G3',
            2 => 'G2',
            3 => 'G1',
            4 => 'SG',
        ];

        return $array;
    }

    public static function create_kyu_options_in_syutujo_racer(){

        $array = [
            '' => '',
            'A1' => 'A1',
            'A2' => 'A2',
            'B1' => 'B1',
            'B2' => 'B2',
        ];

        return $array;
    }

    public static function create_yoso_options_in_syutujo_racer(){

        $array = [
            '' => '',
            '◎' => '◎',
            '○' => '○',
            '▲' => '▲',
            '△' => '△',
            '×' => '×',
        ];

        return $array;
    }

    public static function create_week_label(){

        $array = [
            0 => '日',
            1 => '月',
            2 => '火',
            3 => '水',
            4 => '木',
            5 => '金',
            6 => '土',
        ];

        return $array;
    }

    public static function week_label($number){
        $array = [
            0 => '日',
            1 => '月',
            2 => '火',
            3 => '水',
            4 => '木',
            5 => '金',
            6 => '土',
        ];

        if(isset($array[$number])){
            return $array[$number];
        }else{
            return $number;
        }
    }

    public static function create_display_date($start_date,$end_date){
        
        $start_y = date('Y',strtotime($start_date));
        $start_m = date('n',strtotime($start_date));
        $start_d = date('j',strtotime($start_date));
        
        $end_y = date('Y',strtotime($end_date));
        $end_m = date('n',strtotime($end_date));
        $end_d = date('j',strtotime($end_date));

        $display_date = "";
        if(date('Y') !== $start_y){
            $display_date = $start_y."/";
        }

        if($start_y == $end_y && $start_m == $end_m){
            $display_date .= $start_m."/".$start_d."～".$end_d;
        }elseif($start_y == $end_y){
            $display_date .= $start_m."/".$start_d."～".$end_m."/".$end_d;
        }else{
            $display_date .= $start_m."/".$start_d."～".$end_y."/".$end_m."/".$end_d;
        }
        

        return $display_date;
    }

    public static function create_display_date_short($start_date,$end_date){
        
        $start_y = substr(date('Y',strtotime($start_date)),2,2);
        $start_m = date('n',strtotime($start_date));
        $start_d = date('j',strtotime($start_date));
        
        $end_y = substr(date('Y',strtotime($end_date)),2,2);
        $end_m = date('n',strtotime($end_date));
        $end_d = date('j',strtotime($end_date));

        $display_date = "";
        if(substr(date('Y'),2,2) !== $start_y){
            $display_date = $start_y."/";
        }

        if($start_y == $end_y && $start_m == $end_m){
            $display_date .= $start_m."/".$start_d."～".$end_d;
        }elseif($start_y == $end_y){
            $display_date .= $start_m."/".$start_d."～".$end_m."/".$end_d;
        }else{
            $display_date .= $start_m."/".$start_d."～".$end_y."/".$end_m."/".$end_d;
        }
        

        return $display_date;
    }

    public static function create_display_date_with_week($start_date,$end_date){

        $week = self::create_week_label();
        
        $start_y = date('Y',strtotime($start_date));
        $start_m = date('n',strtotime($start_date));
        $start_d = date('j',strtotime($start_date));
        
        $end_y = date('Y',strtotime($end_date));
        $end_m = date('n',strtotime($end_date));
        $end_d = date('j',strtotime($end_date));

        $display_date = "";
        if(date('Y') !== $start_y){
            $display_date = $start_y."/";
        }

        if($start_y == $end_y && $start_m == $end_m){
            $display_date .= $start_m."/".$start_d."（".$week[date("w",strtotime($start_date))]."）～".$end_d."（".$week[date("w",strtotime($end_date))]."）";
        }elseif($start_y == $end_y){
            $display_date .= $start_m."/".$start_d."（".$week[date("w",strtotime($start_date))]."）～".$end_m."/".$end_d."（".$week[date("w",strtotime($end_date))]."）";
        }else{
            $display_date .= $start_m."/".$start_d."（".$week[date("w",strtotime($start_date))]."）～".$end_y."/".$end_m."/".$end_d."（".$week[date("w",strtotime($end_date))]."）";
        }
        

        return $display_date;
    }

    public static function create_display_date_with_week_span($start_date,$end_date){

        $week = self::create_week_label();
        
        $start_y = date('Y',strtotime($start_date));
        $start_m = date('n',strtotime($start_date));
        $start_d = date('j',strtotime($start_date));
        
        $end_y = date('Y',strtotime($end_date));
        $end_m = date('n',strtotime($end_date));
        $end_d = date('j',strtotime($end_date));

        $display_date = "";
        if(date('Y') !== $start_y){
            $display_date = $start_y."/";
        }

        if($start_y == $end_y && $start_m == $end_m){
            $display_date .= $start_m."/".$start_d."<span>（".$week[date("w",strtotime($start_date))]."）</span>～".$end_d."<span>（".$week[date("w",strtotime($end_date))]."）</span>";
        }elseif($start_y == $end_y){
            $display_date .= $start_m."/".$start_d."<span>（".$week[date("w",strtotime($start_date))]."）</span>～".$end_m."/".$end_d."<span>（".$week[date("w",strtotime($end_date))]."）</span>";
        }else{
            $display_date .= $start_m."/".$start_d."<span>（".$week[date("w",strtotime($start_date))]."）</span>～".$end_y."/".$end_m."/".$end_d."<span>（".$week[date("w",strtotime($end_date))]."）</span>";
        }
        

        return $display_date;
    }

    public static function create_display_date_for_pc_event($start_date,$end_date,$week_class_flg=false){

        $week = self::create_week_label();
        
        $start_y = date('Y',strtotime($start_date));
        $start_m = date('n',strtotime($start_date));
        $start_d = date('j',strtotime($start_date));
        
        $end_y = date('Y',strtotime($end_date));
        $end_m = date('n',strtotime($end_date));
        $end_d = date('j',strtotime($end_date));

        $display_date = "";

        $start_week_class = "";
        $end_week_class = "";
        if($week_class_flg){
            if(date("w",strtotime($start_date)) == 0){
                $start_week_class = "class='sun'";
            }elseif(date("w",strtotime($start_date)) == 6){
                $start_week_class = "class='sat'";
            }

            if(date("w",strtotime($end_date)) == 0){
                $end_week_class = "class='sun'";
            }elseif(date("w",strtotime($end_date)) == 6){
                $end_week_class = "class='sat'";
            }
        }


        if( $start_m != $end_m){
            $display_date .= $start_m."/".$start_d."<span ".$start_week_class." >(".$week[date("w",strtotime($start_date))].")</span>～".$end_m."/".$end_d."<span ".$end_week_class." >(".$week[date("w",strtotime($end_date))].")</span>";
        }else{
            $display_date .= $start_m."/".$start_d."<span ".$start_week_class." >(".$week[date("w",strtotime($start_date))].")</span>～".$end_d."<span ".$end_week_class." >(".$week[date("w",strtotime($end_date))].")</span>";
        }
        

        return $display_date;
    }

    public static function number_to_month_name($number){
        $array = [
            1 => "January",
            2 => "February",
            3 => "March",
            4 => "April",
            5 => "May",
            6 => "June",
            7 => "July",
            8 => "August",
            9 => "September",
            10 => "October",
            11 => "November",
            12 => "December",
        ];

        if(isset($array[$number])){
            return $array[$number];
        }else{
            return $number;
        }
    }

    public static function yoso_options_to_number($number){

        $array = [
            '◎' => '1',
            '○' => '2',
            '△' => '3',
            '×' => '4',
        ];

        if(isset($array[$number])){
            return $array[$number];
        }else{
            return $number;
        }
    }

    public static function is_apple_mobile(){
         //エージェント判定アサイン
         $ua = $_SERVER['HTTP_USER_AGENT'];

         //スマホと判定する文字リスト
         $ua_list = array('iPhone','iPad','iPod');
         $is_apple = false;
         foreach ($ua_list as $ua_smt) {
             //ユーザーエージェントに文字リストの単語を含む場合はTRUE、それ以外はFALSE
             if (strpos($ua, $ua_smt) !== false) {
                 $is_apple = true;
             }
         }

         return $is_apple;

    }

    public static function is_android(){
        //エージェント判定アサイン
        $ua = $_SERVER['HTTP_USER_AGENT'];

        $is_android = false;
        //ユーザーエージェントに文字リストの単語を含む場合はTRUE、それ以外はFALSE
        if (strpos($ua, 'Android') !== false) {
            $is_android = true;
        }
        

        return $is_android;

   }

}