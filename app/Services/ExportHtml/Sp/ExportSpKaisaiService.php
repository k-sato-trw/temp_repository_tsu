<?php

namespace App\Services\ExportHtml\Sp;

use App\Repositories\TbBoatSyussou\TbBoatSyussouRepositoryInterface;
use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\ChushiJunen\ChushiJunenRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;
use App\Repositories\Holding\HoldingRepositoryInterface;
use App\Repositories\TbBoatOzzinfo\TbBoatOzzinfoRepositoryInterface;
use App\Repositories\TbBoatOzz\TbBoatOzzRepositoryInterface;
use App\Repositories\RensyoKekka\RensyoKekkaRepositoryInterface;
use App\Repositories\TbMotorList\TbMotorListRepositoryInterface;
use App\Repositories\TbBoatKekkainfo\TbBoatKekkainfoRepositoryInterface;
use App\Repositories\TbBoatKekka\TbBoatKekkaRepositoryInterface;
use App\Repositories\TbVodManagement\TbVodManagementRepositoryInterface;
use App\Repositories\TbBoatTyokuzen\TbBoatTyokuzenRepositoryInterface;
use App\Repositories\TbTsuYosoHighlight\TbTsuYosoHighlightRepositoryInterface;
use App\Repositories\TbTsuYosoMessage\TbTsuYosoMessageRepositoryInterface;
use App\Repositories\TbTsuTokutenritu\TbTsuTokutenrituRepositoryInterface;
use App\Repositories\Holiday\HolidayRepositoryInterface;
use App\Repositories\TbBoatsMotorzenken\TbBoatsMotorzenkenRepositoryInterface;
use App\Repositories\TbTsuYoso\TbTsuYosoRepositoryInterface;
use App\Repositories\TbTsuYosoAshi\TbTsuYosoAshiRepositoryInterface;
use App\Repositories\TbTsuYosoTenji\TbTsuYosoTenjiRepositoryInterface;
use App\Repositories\TbGambooYosoSensyu\TbGambooYosoSensyuRepositoryInterface;
use App\Repositories\TbGambooYosoRace\TbGambooYosoRaceRepositoryInterface;
use App\Services\KyogiCommonService;
use App\Services\FuncYosoTekichuritsuService;

class ExportSpKaisaiService
{
    public $TbBoatSyussou;
    public $KaisaiMaster;
    public $ChushiJunen;
    public $TbBoatRaceheader;
    public $Holding;
    public $TbBoatOzzinfo;
    public $TbBoatOzz;
    public $RensyoKekka;
    public $TbMotorList;
    public $TbBoatKekkainfo;
    public $TbBoatKekka;
    public $TbVodManagement;
    public $TbBoatTyokuzen;
    public $TbTsuYosoHighlight;
    public $TbTsuYosoMessage;
    public $TbTsuTokutenritu;
    public $Holiday;
    public $TbBoatsMotorzenken;
    public $TbTsuYoso;
    public $TbTsuYosoAshi;
    public $TbTsuYosoTenji;
    public $TbGambooYosoSensyu;
    public $TbGambooYosoRace;
    public $KyogiCommon;
    public $FuncYosoTekichuritsu;

    public function __construct(
        TbBoatSyussouRepositoryInterface $TbBoatSyussou,
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        ChushiJunenRepositoryInterface $ChushiJunen,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader,
        HoldingRepositoryInterface $Holding,
        TbBoatOzzinfoRepositoryInterface $TbBoatOzzinfo,
        TbBoatOzzRepositoryInterface $TbBoatOzz,
        RensyoKekkaRepositoryInterface $RensyoKekka,
        TbMotorListRepositoryInterface $TbMotorList,
        TbBoatKekkainfoRepositoryInterface $TbBoatKekkainfo,
        TbBoatKekkaRepositoryInterface $TbBoatKekka,
        TbVodManagementRepositoryInterface $TbVodManagement,
        TbBoatTyokuzenRepositoryInterface $TbBoatTyokuzen,
        TbTsuYosoHighlightRepositoryInterface $TbTsuYosoHighlight,
        TbTsuYosoMessageRepositoryInterface $TbTsuYosoMessage,
        TbTsuTokutenrituRepositoryInterface $TbTsuTokutenritu,
        HolidayRepositoryInterface $Holiday,
        TbBoatsMotorzenkenRepositoryInterface $TbBoatsMotorzenken,
        TbTsuYosoRepositoryInterface $TbTsuYoso,
        TbTsuYosoAshiRepositoryInterface $TbTsuYosoAshi,
        TbTsuYosoTenjiRepositoryInterface $TbTsuYosoTenji,
        TbGambooYosoSensyuRepositoryInterface $TbGambooYosoSensyu,
        TbGambooYosoRaceRepositoryInterface $TbGambooYosoRace,
        KyogiCommonService $KyogiCommon,
        FuncYosoTekichuritsuService $FuncYosoTekichuritsu
    ){
        $this->TbBoatSyussou = $TbBoatSyussou;
        $this->KaisaiMaster = $KaisaiMaster;
        $this->ChushiJunen = $ChushiJunen;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
        $this->Holding = $Holding;
        $this->TbBoatOzzinfo = $TbBoatOzzinfo;
        $this->TbBoatOzz = $TbBoatOzz;
        $this->RensyoKekka = $RensyoKekka;
        $this->TbMotorList = $TbMotorList;
        $this->TbBoatKekkainfo = $TbBoatKekkainfo;
        $this->TbBoatKekka = $TbBoatKekka;
        $this->TbVodManagement = $TbVodManagement;
        $this->TbBoatTyokuzen = $TbBoatTyokuzen;
        $this->TbTsuYosoHighlight = $TbTsuYosoHighlight;
        $this->TbTsuYosoMessage = $TbTsuYosoMessage;
        $this->TbTsuTokutenritu = $TbTsuTokutenritu;
        $this->Holiday = $Holiday;
        $this->TbBoatsMotorzenken = $TbBoatsMotorzenken;
        $this->TbTsuYoso = $TbTsuYoso;
        $this->TbTsuYosoAshi = $TbTsuYosoAshi;
        $this->TbTsuYosoTenji = $TbTsuYosoTenji;
        $this->TbGambooYosoSensyu = $TbGambooYosoSensyu;
        $this->TbGambooYosoRace = $TbGambooYosoRace;
        $this->KyogiCommon = $KyogiCommon;
        $this->FuncYosoTekichuritsu = $FuncYosoTekichuritsu;
    }

    public function motor($request){
        $data = [];

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;
        $target_time = date('Hi');
        $data['target_time'] = $target_time;

        $sort = $request->input('page') ?? 0;
        

        {
            //処理対象日を判定
            $tomorrow_flg = false;
            $today_date = date('Ymd');
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

        }

        if(!$kaisai_master){
            //非開催は前節表示
            $kaisai_master = $this->KaisaiMaster->getEndRecordByDate($jyo,$today_date);
        }

        {
            //最後のレース算出(最新の一つ前)
            $before_race = $this->KaisaiMaster->getEndRecordByDate($jyo, $kaisai_master->開始日付);
        }

        {
            //モーター交換日を算出
            //カウント0の日付がモーター交換日
            $motor_change_count = $this->TbBoatsMotorzenken->getMotorChangeCount($target_date);

            $motor_change_day = false;
            foreach ($motor_change_count as $item) {
                if ($item->count == 0) {
                    $motor_change_day = $item->TARGET_STARTDATE;
                    break;
                }
            }

            $motor_change_race = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo, $motor_change_day);;
        }

        {
            //対象のレースの開催日を基準にモーターリスト作成
            $motor_list = $this->TbBoatsMotorzenken->getMotorListForSp($kaisai_master->開始日付, $sort);
            $motor_list_array = [];
            //同率順位処理
            $true_rank = 1;
            $display_rank = 1;
            $temp_data = 0;
            foreach ($motor_list as $item) {
                
                /*
                    0:2連率　降順
                    1:機番 昇順
                    2:前検タイム　昇順
                */
                $row = [];
                if (in_array($sort, [0,2])) {
                    if ($sort == 2) {
                        $hikaku_target = $item->ZENKEN_TIME;
                    } elseif ($sort == 0) {
                        $hikaku_target = $item->MOTOR_NIRENRITU;
                    } 

                    if ($temp_data != $hikaku_target) {
                        $display_rank = $true_rank;
                        $temp_data = $hikaku_target;
                    }
                }

                $row['rank'] = $display_rank;
                $row['record'] = $item; 
                
                { //モーターNOに基づいて3節前までの使用履歴を算出

                    $motor_rireki_array = $this->TbBoatSyussou->getMotorRirekiJoinKekka($kaisai_master->開始日付, $jyo, $item->MOTOR_NO, $motor_change_day);

                    //節間判定用レースタイトル
                    $race_title = $motor_rireki_array[0]->RACE_TITLE ?? "";
                    $motor_rireki_3 = [];
                    $motor_end_date = $motor_rireki_array[0]->TARGET_DATE ?? "";
                    //文字列にする
                    $race_rireki_n = "";
                    $rireki_count = 1;
                    $setsukan_end = false;
                    $rireki_array_end = false;

                    foreach($motor_rireki_array as $key => $motor_rireki_row){


                        //配列格納ではなく、この段階で文字列作成まで進める
                        if ($motor_rireki_row->RACE_SYUBETU_CODE == '06' || $motor_rireki_row->RACE_SYUBETU_CODE == '92') {
                            //優勝
                            $race_rireki_n = $this->KyogiCommon->yusho_tyakujun_to_image_kaisai_motor_sp($motor_rireki_row->TYAKUJUN) . $race_rireki_n;
                            
                        } elseif ($motor_rireki_row->RACE_SYUBETU_CODE == '05') {
                            //準優勝
                            $race_rireki_n = $this->KyogiCommon->junyu_tyakujun_to_image_kaisai_motor_sp($motor_rireki_row->TYAKUJUN) . $race_rireki_n;
                            
                        } else {
                            $race_rireki_n = $motor_rireki_row->TYAKUJUN . $race_rireki_n;
                        }

                        //次があるか、あった場合同じタイトルかのフラグチェック
                        if (isset($motor_rireki_array[$key + 1])) {
                            if ($race_title != $motor_rireki_array[$key + 1]->RACE_TITLE) {
                                $setsukan_end = true;
                                $rireki_array_end = false;
                            } else {
                                $setsukan_end = false;
                                $rireki_array_end = false;
                            }
                        } else {
                            $setsukan_end = true;
                            $rireki_array_end = true;
                        }


                        if ($setsukan_end) {
                            //節間が変わった場合、終了処理


                            //履歴が1以上の場合は、$motor_rireki_3に$race_rireki_nを格納
                            if ($rireki_count >= 1) {
                                //名前、級、レース配列
                                $motor_rireki_3[$rireki_count]['sensyu_name'] = str_replace('　', '', $motor_rireki_row->SENSYU_NAME);
                                $motor_rireki_3[$rireki_count]['kyu_betu'] = $motor_rireki_row->KYU_BETU;
                                $motor_rireki_3[$rireki_count]['tyakujun'] = $race_rireki_n;

                                $motor_rireki_3[$rireki_count]['grade'] = $motor_rireki_row->GRADE_CODE;
                                $motor_rireki_3[$rireki_count]['start_date'] = $motor_rireki_row->TARGET_DATE;
                                $motor_rireki_3[$rireki_count]['end_date'] = $motor_end_date;
                                $motor_rireki_3[$rireki_count]['sex'] = $motor_rireki_row->SEX;

                            }

                            //履歴がすでに3ある場合、と配列が最終列の場合は終了
                            if ($rireki_count >= 3 || $rireki_array_end) {
                                break;
                            }

                            //次の節間の設定
                            $rireki_count++;

                            $motor_end_date = $motor_rireki_array[$key + 1]->TARGET_DATE;
                            $race_title = $motor_rireki_array[$key + 1]->RACE_TITLE;
                            $race_rireki_n = "";
                        }
                    }

                    $row['motor_rireki_3'] = $motor_rireki_3;
                }

                $syussou_count_array = $this->TbBoatSyussou->getMotorSyussouCount($motor_change_day,$kaisai_master->開始日付,$jyo,$item->BOAT_NO);
                $row['syussou_count'] = count($syussou_count_array);

                $motor_list_array[] = $row;

                $true_rank++;
            }
            $data['motor_list_array'] = $motor_list_array;
        }

        $data['motor_change_race'] = $motor_change_race;
        $data['before_race'] = $before_race;
        $data['sort'] = $sort;

        $data['kaisai_master'] = $kaisai_master;
        $data['target_date'] = $target_date;
        $data['tomorrow_flg'] = $tomorrow_flg;

        return $data;
    }

    
    public function pdf($request){
        $data = [];

        $jyo = config('const.JYO_CODE');
        $data['jyo'] = $jyo;

        $today_date = date('Ymd');
        
        
        $tomorrow_date = date('Ymd',strtotime('+1 day',strtotime($today_date)));

        //番組表PDF処理
        //明日の日付のファイルがあるか
        $file_list = glob(public_path(config('const.PDF_PATH.BANGUMIHYO').$tomorrow_date."*.pdf"));
        if($file_list){
            $target_date = $tomorrow_date;
        }else{
            //明日の日付で無い場合今日の日付であるかどうか
            $file_list = glob(public_path(config('const.PDF_PATH.BANGUMIHYO').$today_date."*.pdf"));
            if($file_list){
                $target_date = $today_date;
            }
        }

        
        //いずれかのファイルがある場合
        $file_name_list = [];
        $yoso_file_name = '';
        if($file_list){
            foreach($file_list as $file_name){
                $file_name_list[] = preg_replace("|.*/|","",$file_name);
            }
            // ファイル名から何日目かを取得
            $display_date =  (int) substr($file_name_list[0],8,2);

            $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
            $data['kaisai_master'] = $kaisai_master;

            if($display_date == 1){
                $display_date = '初日';
            }elseif($target_date == $kaisai_master->終了日付){
                $display_date = '最終日';
            }else{
                $display_date = $display_date.'日目';
            }

            //中止判定
            $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
            $data['chushi_junen'] = $chushi_junen;

            //予想PDF処理
            $yoso_file_list = glob(public_path(config('const.PDF_PATH.YOSO_PDF').$target_date.".pdf"));
            $yoso_file_name = '';
            if($yoso_file_list){
                $yoso_file_name = $target_date.".pdf";
            }
        }


        $data['target_date'] = $target_date ?? false;
        $data['file_name_list'] = $file_name_list;
        $data['yoso_file_name'] = $yoso_file_name;
        $data['display_date'] = $display_date ?? false;

        return $data;
    }

    public function syusso_hyoka($request,$target_date,$race_num,$tomorrow_flg){
        $data = [];
        $is_preview = false;
    
        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;
        $data['race_num'] = $race_num;
        
        
        //改めて開催データ取り直し
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;

        $data['tomorrow_flg'] = $tomorrow_flg;
        $data['target_date'] = $target_date;

        if($kaisai_master){
            $syussou = $this->KyogiCommon->create_syussou_array($jyo,$target_date,$race_num);    
            $data['syussou'] = $syussou;

            $yoso_ashi_array = [];
            foreach($syussou as $teiban => $item){
                //最新の出足データを１件引き抜く
                $yoso_ashi = $this->TbTsuYosoAshi->getLatestRecordByTouban($item->TOUBAN,$kaisai_master->開始日付,$target_date);
                $yoso_ashi_array[$teiban] = $yoso_ashi;

            }
            $data['yoso_ashi_array'] = $yoso_ashi_array;

            $yoso_tenji = $this->TbTsuYosoTenji->getFirstRecordByDate($target_date,$race_num);
            $data['yoso_tenji'] = $yoso_tenji;

            $yoso = $this->TbTsuYoso->getFirstRecordByDate($target_date,$race_num);
            $data['yoso'] = $yoso;


            {
                $loop_count1 = 0;
                $loop_count2 = 0;
                $loop_count3 = 0;
                $loop_count4 = 0;
                $loop_count5 = 0;
                $loop_count6 = 0;

                //展示予想表示のための計算処理
                for($loop_count1=1;$loop_count1<=2;$loop_count1++){
                    $prop_name_favolite = "FAVOLITE".$loop_count1."11";
                    if($yoso_tenji->$prop_name_favolite){
                        $favolite_box_nagashi_flg = 0;
						$loop_count3 = 1;

                        
                        $prop_name_favolite_mark = "FAVOLITE_MARK".$loop_count1.$loop_count3;
                        if($yoso_tenji->$prop_name_favolite_mark == 8){
                            //ボックスフラグ
                            $favolite_box_nagashi_flg = 1;
                        }elseif($yoso_tenji->$prop_name_favolite_mark == 9){
                            //流しフラグ
                            $favolite_box_nagashi_flg = 2;
                        }

                        if($favolite_box_nagashi_flg == 0){
                            for($loop_count4=1;$loop_count4<=3;$loop_count4++){
                                $loop_count5=2;
                                $prop_name_favolite2 = "FAVOLITE".$loop_count1.$loop_count4.$loop_count5;
                                if($yoso_tenji->$prop_name_favolite2){
                                    $loop_count6 = $loop_count6 + 1;
                                    break;
                                }
                            }

                            
                            for($loop_count4=1;$loop_count4<=3;$loop_count4++){
                                $loop_count5=3;
                                $prop_name_favolite2 = "FAVOLITE".$loop_count1.$loop_count4.$loop_count5;
                                if($yoso_tenji->$prop_name_favolite2){
                                    $loop_count6 = $loop_count6 + 1;
                                }
                            }


                        }elseif($favolite_box_nagashi_flg == 1){

                            $loop_count6 = 2;

                        }elseif($favolite_box_nagashi_flg == 2){

                            $loop_count6 = $loop_count6 + 1;

                            //初期化
                            $favolite_box_nagashi_flg = 0;

                            $prop_name_favolite_mark = "FAVOLITE_MARK".$loop_count1.$loop_count3;
                            if($yoso_tenji->$prop_name_favolite_mark == 8){
                                //ここボックスはおかしい
                                
                            }elseif($yoso_tenji->$prop_name_favolite_mark == 9){
                                //流しフラグ
                                $favolite_box_nagashi_flg = 2;
                            }

                            if(!$favolite_box_nagashi_flg){
                                //通常

                                for($loop_count4=1;$loop_count4<=3;$loop_count4++){
                                    $loop_count5 = 3;
                                    $prop_name_favolite2 = "FAVOLITE".$loop_count1.$loop_count4.$loop_count5;
                                    if($yoso_tenji->$prop_name_favolite2){
                                        $loop_count6 = $loop_count6 + 1;
                                    }
                                }
                            }elseif($favolite_box_nagashi_flg == 2){
                                $loop_count6 = $loop_count6 + 1;
                            }

                        }
                        
                    }else{
                        //頭がない時

                        $prop_name_favolite3 = "FAVOLITE".$loop_count1."12";
                        $prop_name_favolite4 = "FAVOLITE".$loop_count1."22";
                        $prop_name_favolite5 = "FAVOLITE".$loop_count1."32";

                        if(
                            $yoso_tenji->$prop_name_favolite3 != "" &&
                            $yoso_tenji->$prop_name_favolite4 != "" &&
                            $yoso_tenji->$prop_name_favolite5 != "" 
                        ){
                            $loop_count6 = 1;
                            $favolite_box_nagashi_flg = 0;

                            $prop_name_favolite_mark = "FAVOLITE_MARK".$loop_count1."1";
                            if($yoso_tenji->$prop_name_favolite_mark == 8){
                                //ボックスフラグ
                                $favolite_box_nagashi_flg = 1;
                                
                            }elseif($yoso_tenji->$prop_name_favolite_mark == 9){
                                //流しフラグ
                                $favolite_box_nagashi_flg = 2;
                            }
                        }
                    }

                    if($loop_count6 >= 1){
                        //データあり

                        //本命表示フラグ
                        $favolite_flg = true;
                    }
                }

                $data['favolite_flg'] = $favolite_flg;
            }

            {
                $loop_count1 = 0;
                $loop_count2 = 0;
                $loop_count3 = 0;
                $loop_count4 = 0;
                $loop_count5 = 0;
                $loop_count6 = 0;

                $rich_flg=0;

                //穴フォーカスのための計算処理
                for($loop_count1=1;$loop_count1<=2;$loop_count1++){
                    
                    $prop_name_rich = "RICH".$loop_count1."11";
                    if($yoso_tenji->$prop_name_rich){

                        $rich_box_nagashi_flg = 0;
                        $loop_count3 = 1;

                        $prop_name_rich_mark = "RICH_MARK".$loop_count1.$loop_count3;
                        if($yoso_tenji->$prop_name_rich_mark == 8){
                            //ボックスフラグ
                            $rich_box_nagashi_flg = 1;
                        }elseif($yoso_tenji->$prop_name_rich_mark == 8){
                            //流しフラグ
                            $rich_box_nagashi_flg = 2;
                        }

                        if($rich_box_nagashi_flg == 0){
                            //通常
                            for($loop_count4=1;$loop_count4<=3;$loop_count4++){
                                $loop_count5 = 2;
                                $prop_name_rich2 = "RICH".$loop_count1.$loop_count4.$loop_count5;
                                if($yoso_tenji->$prop_name_rich2){
                                    $loop_count6 = $loop_count6 + 1;
                                    break;
                                }
                            }

                            for($loop_count4=1;$loop_count4<=3;$loop_count4++){
                                $loop_count5 = 3;
                                $prop_name_rich2 = "RICH".$loop_count1.$loop_count4.$loop_count5;
                                if($yoso_tenji->$prop_name_rich2){
                                    $loop_count6 = $loop_count6 + 1;
                                }
                            }

                        }elseif($rich_box_nagashi_flg == 1){

                            $loop_count6 = 2;

                        }elseif($rich_box_nagashi_flg == 2){

                            $loop_count6 = $loop_count6 + 1;
                            
                            //初期化
                            $rich_box_nagashi_flg = 0;
                            $prop_name_rich_mark = "RICH_MARK".$loop_count1.$loop_count3;
                            if($yoso_tenji->$prop_name_rich_mark == 8){
                                //ここボックスはおかしい
                                
                            }elseif($yoso_tenji->$prop_name_rich_mark == 8){
                                
                                $rich_box_nagashi_flg = 2;
                            }

                            if($rich_box_nagashi_flg == 0){

                                for($loop_count4=1;$loop_count4<=3;$loop_count4++){
                                    $loop_count5 = 3;
                                    $prop_name_rich2 = "RICH".$loop_count1.$loop_count4.$loop_count5;
                                    if($yoso_tenji->$prop_name_rich2){
                                        $loop_count6 = $loop_count6 + 1;
                                    }
                                }

                            }elseif($rich_box_nagashi_flg == 2){
                                $loop_count6 = $loop_count6 + 1;
                            }

                        }
                    }else{
                        // 頭がない時
                        $prop_name_rich3 = "RICH".$loop_count1."12";
                        $prop_name_rich4 = "RICH".$loop_count1."22";
                        $prop_name_rich5 = "RICH".$loop_count1."32";

                        if(
                            $yoso_tenji->$prop_name_rich3 != "" &&
                            $yoso_tenji->$prop_name_rich4 != "" &&
                            $yoso_tenji->$prop_name_rich5 != "" 
                        ){
                            $loop_count6 = 1;
                            $rich_box_nagashi_flg = 0;

                            $prop_name_rich_mark = "RICH_MARK".$loop_count1."1";
                            if($yoso_tenji->$prop_name_rich_mark == 8){
                                //ボックスフラグ
                                $rich_box_nagashi_flg = 1;
                                
                            }elseif($yoso_tenji->$prop_name_rich_mark == 9){
                                //流しフラグ
                                $rich_box_nagashi_flg = 2;
                            }
                        }
                    }

                    if($loop_count6 >= 1){
                        $rich_flg = 1;
                    }

                }  // for($loop_count1=1;$loop_count1<=2;$loop_count1++)

                $data['rich_flg'] = $rich_flg;
            }



            {
                //■■■ 出走系データ処理

                //欠場情報
                $ozz_info = $this->TbBoatOzzinfo->getFirstRecordByPK($jyo,$target_date,$race_num);
                $ozz_info_array = [1=>'',2=>'',3=>'',4=>'',5=>'',6=>''];
                if($ozz_info){
                    for($i = 1; $i <= 6; $i++){
                        $prop_name = "KETUJO_HENKAN".$i;
                        $ozz_info_array[$i] = $ozz_info->$prop_name;
                    }
                }
                $data['ozz_info_array'] = $ozz_info_array;


                //日付表示用
                $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
                $data['race_header'] = $race_header;

                //締切日作成
                $prop_name = "SIMEKIRI_JIKOKU".$race_num."R";
                $shimekiri_jikoku = $race_header->$prop_name;
                $data['shimekiri_jikoku'] = $shimekiri_jikoku;
            }
            
        }

        return $data;
    }


    /**
     * htmlメーカーから必ずクエリパラメータ付きでリクエストされる
     * jyo = 2桁jyoコード
     * race_num　=　数値レース番号
     */
    public function syusso_seiseki($request,$target_date,$race_num,$tomorrow_flg){
        $data = [];

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        
        $data['jyo'] = $jyo;
        $data['race_num'] = $race_num;
        
        
        //改めて開催データ取り直し
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;

        $data['tomorrow_flg'] = $tomorrow_flg;
        $data['target_date'] = $target_date;

        
        if($kaisai_master){
               
            $syussou = $this->KyogiCommon->create_syussou_array($jyo,$target_date,$race_num);    
            $data['syussou'] = $syussou;

            //欠場情報
            $ozz_info = $this->TbBoatOzzinfo->getFirstRecordByPK($jyo,$target_date,$race_num);
            $ozz_info_array = [1=>'',2=>'',3=>'',4=>'',5=>'',6=>''];
            if($ozz_info){
                for($i = 1; $i <= 6; $i++){
                    $prop_name = "KETUJO_HENKAN".$i;
                    $ozz_info_array[$i] = $ozz_info->$prop_name;
                }
            }
            $data['ozz_info_array'] = $ozz_info_array;

            
            //開催日リスト作成
            $tmp_date = $kaisai_master->開始日付;
            $end_date = $kaisai_master->終了日付;
            $kaisai_day_list = [];
            $kaisai_day_list_label = [];
            $day_count = 1;
            while($tmp_date <= $end_date){
                $kaisai_day_list[] = $tmp_date;
                if($tmp_date == $kaisai_master->開始日付){
                    $kaisai_day_list_label[] = "初日";
                }else if($tmp_date == $end_date){
                    $kaisai_day_list_label[] = "最終日";
                }else{
                    $kaisai_day_list_label[] = $day_count."日目";
                }
                $tmp_date = date("Ymd",strtotime("+1 day",strtotime($tmp_date)));

                $day_count++;
            }

            //開催日リストを元にSTランキングデータ作成
            $st_ranking = [];
            foreach($kaisai_day_list as $item){
                for($race_num_count=1;$race_num_count<=12;$race_num_count++){
                    $top_st = $this->TbBoatKekka->getTopSt($jyo,$item,$race_num_count);
                    if($top_st){
                        $st_ranking[$item][$race_num_count] = $top_st->START_TIMING;
                    }else{
                        $st_ranking[$item][$race_num_count] = "";
                    }
                }
            }
            $data['st_ranking'] = $st_ranking;
            


            $race_header = $this->TbBoatRaceheader->getRecordByDateList($jyo,$kaisai_day_list);
            $kaisai_alldays = $race_header[0]->KAISAI_ALLDAYS ?? 6;
            $konsetsu_race_header = [];
            foreach($race_header as $item){
                //$konsetsu_race_header[$item->TARGET_DATE] = $item;
                $konsetsu_race_header[] = $item;
            }

            $data['kaisai_day_list'] = $kaisai_day_list;
            $data['kaisai_day_list_label'] = $kaisai_day_list_label;
            $data['konsetsu_race_header'] = $konsetsu_race_header;
            $data['kaisai_alldays'] = $kaisai_alldays;

            //日付表示用
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
            $data['race_header'] = $race_header;

            //締切日作成
            $prop_name = "SIMEKIRI_JIKOKU".$race_num."R";
            $shimekiri_jikoku = $race_header->$prop_name;
            $data['shimekiri_jikoku'] = $shimekiri_jikoku;
            
        }

        
        return $data;
    }


    public function syusso_all_past($request,$target_date,$race_num,$tomorrow_flg){
        $data = [];

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');

        
        $data['jyo'] = $jyo;
        $data['race_num'] = $race_num;
        
        
        //改めて開催データ取り直し
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;

        $data['tomorrow_flg'] = $tomorrow_flg;
        $data['target_date'] = $target_date;



        if($kaisai_master){
               
            $syussou = $this->KyogiCommon->create_syussou_array($jyo,$target_date,$race_num);

            //欠場情報
            $ozz_info = $this->TbBoatOzzinfo->getFirstRecordByPK($jyo,$target_date,$race_num);
            $ozz_info_array = [1=>'',2=>'',3=>'',4=>'',5=>'',6=>''];
            if($ozz_info){
                for($i = 1; $i <= 6; $i++){
                    $prop_name = "KETUJO_HENKAN".$i;
                    $ozz_info_array[$i] = $ozz_info->$prop_name;
                }
            }
            $data['ozz_info_array'] = $ozz_info_array;

            foreach($syussou as $teiban => $syussou_row){

                $kinkyo_rireki_array = $this->TbBoatSyussou->getKinkyoRirekiJoinKekka($kaisai_master->開始日付,$syussou_row->TOUBAN);

                //節間判定用レースタイトル
                $race_title = $kinkyo_rireki_array[0]->RACE_TITLE ?? "";
                $kinkyo_rireki_2 = [];
                $kinkyo_end_date=$kinkyo_rireki_array[0]->TARGET_DATE ?? "";
                //文字列にする
                $kinkyo_race_rireki_n = "";
                $rireki_count = 1;
                $setsukan_end = false;
                $rireki_array_end = false;

                foreach($kinkyo_rireki_array as $key => $kinkyo_rireki_row){

                    //配列格納ではなく、この段階で文字列作成まで進める
                    if($kinkyo_rireki_row->RACE_SYUBETU_CODE == '06' || $kinkyo_rireki_row->RACE_SYUBETU_CODE == '96' ){
                        //優勝
                        $kinkyo_race_rireki_n = $this->KyogiCommon->yusho_tyakujun_to_image_sp($kinkyo_rireki_row->TYAKUJUN).$kinkyo_race_rireki_n;
                    }elseif($kinkyo_rireki_row->RACE_SYUBETU_CODE == '05'){
                        //準優勝
                        $kinkyo_race_rireki_n = $this->KyogiCommon->junyu_tyakujun_to_image_sp($kinkyo_rireki_row->TYAKUJUN).$kinkyo_race_rireki_n;
                    }else{
                        $kinkyo_race_rireki_n = $kinkyo_rireki_row->TYAKUJUN.$kinkyo_race_rireki_n;
                    }

                    //次があるか、あった場合同じタイトルかのフラグチェック
                    if(isset($kinkyo_rireki_array[$key + 1])){
                        if($race_title != $kinkyo_rireki_array[$key + 1]->RACE_TITLE){
                            $setsukan_end = true;
                            $rireki_array_end = false;
                        }else{
                            $setsukan_end = false;
                            $rireki_array_end = false;
                        }
                    }else{
                        $setsukan_end = true;
                        $rireki_array_end = true;
                    }

                    if($setsukan_end){
                        //節間が変わった場合、終了処理

                        //名前、級、レース配列
                        $kinkyo_rireki_2[$rireki_count]['kinkyo_grade'] = $kinkyo_rireki_row->GRADE_CODE;
                        $kinkyo_rireki_2[$rireki_count]['kinkyo_jyo'] = $kinkyo_rireki_row->JYO;
                        $kinkyo_rireki_2[$rireki_count]['kinkyo_start_date'] = $kinkyo_rireki_row->TARGET_DATE;
                        $kinkyo_rireki_2[$rireki_count]['kinkyo_end_date'] = $kinkyo_end_date;
                        $kinkyo_rireki_2[$rireki_count]['kinkyo_tyakujun'] = $kinkyo_race_rireki_n;

                        //履歴がすでに3ある場合、と配列が最終列の場合は終了
                        if($rireki_count >= 2 || $rireki_array_end){
                            break;
                        }

                        //次の節間の設定
                        $rireki_count++;
                        
                        $race_title = $kinkyo_rireki_array[$key + 1]->RACE_TITLE;
                        $kinkyo_end_date = $kinkyo_rireki_array[$key + 1]->TARGET_DATE;
                        $kinkyo_race_rireki_n = "";

                    }
                }

                $syussou[$teiban]['kinkyo_rireki_2'] = $kinkyo_rireki_2;

                
            }

            $data['syussou'] = $syussou;

            

            //日付表示用
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
            $data['race_header'] = $race_header;

            //締切日作成
            $prop_name = "SIMEKIRI_JIKOKU".$race_num."R";
            $shimekiri_jikoku = $race_header->$prop_name;
            $data['shimekiri_jikoku'] = $shimekiri_jikoku;
        }
        
        return $data;
    }
    
    public function syusso_here_past($request,$target_date,$race_num,$tomorrow_flg){
        $data = [];

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');

        
        $data['jyo'] = $jyo;
        $data['race_num'] = $race_num;
        
        
        //改めて開催データ取り直し
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;

        $data['tomorrow_flg'] = $tomorrow_flg;
        $data['target_date'] = $target_date;



        if($kaisai_master){
               
            $syussou = $this->KyogiCommon->create_syussou_array($jyo,$target_date,$race_num);

            //欠場情報
            $ozz_info = $this->TbBoatOzzinfo->getFirstRecordByPK($jyo,$target_date,$race_num);
            $ozz_info_array = [1=>'',2=>'',3=>'',4=>'',5=>'',6=>''];
            if($ozz_info){
                for($i = 1; $i <= 6; $i++){
                    $prop_name = "KETUJO_HENKAN".$i;
                    $ozz_info_array[$i] = $ozz_info->$prop_name;
                }
            }
            $data['ozz_info_array'] = $ozz_info_array;

            foreach($syussou as $teiban => $syussou_row){

                $touchi_rireki_array = $this->TbBoatSyussou->getKinkyoTouchiRirekiJoinKekka($kaisai_master->開始日付,$syussou_row->TOUBAN,$jyo);

                //節間判定用レースタイトル
                $race_title = $touchi_rireki_array[0]->RACE_TITLE ?? "";
                $touchi_rireki_2 = [];
                $touchi_end_date=$touchi_rireki_array[0]->TARGET_DATE ?? "";
                //文字列にする
                $touchi_race_rireki_n = "";
                $rireki_count = 1;
                $setsukan_end = false;
                $rireki_array_end = false;

                foreach($touchi_rireki_array as $key => $touchi_rireki_row){

                    //配列格納ではなく、この段階で文字列作成まで進める
                    if($touchi_rireki_row->RACE_SYUBETU_CODE == '06' || $touchi_rireki_row->RACE_SYUBETU_CODE == '96' ){
                        //優勝
                        $touchi_race_rireki_n = $this->KyogiCommon->yusho_tyakujun_to_image_sp($touchi_rireki_row->TYAKUJUN).$touchi_race_rireki_n;
                    }elseif($touchi_rireki_row->RACE_SYUBETU_CODE == '05'){
                        //準優勝
                        $touchi_race_rireki_n = $this->KyogiCommon->junyu_tyakujun_to_image_sp($touchi_rireki_row->TYAKUJUN).$touchi_race_rireki_n;
                    }else{
                        $touchi_race_rireki_n = $touchi_rireki_row->TYAKUJUN.$touchi_race_rireki_n;
                    }

                    //次があるか、あった場合同じタイトルかのフラグチェック
                    if(isset($touchi_rireki_array[$key + 1])){
                        if($race_title != $touchi_rireki_array[$key + 1]->RACE_TITLE){
                            $setsukan_end = true;
                            $rireki_array_end = false;
                        }else{
                            $setsukan_end = false;
                            $rireki_array_end = false;
                        }
                    }else{
                        $setsukan_end = true;
                        $rireki_array_end = true;
                    }

                    if($setsukan_end){
                        //節間が変わった場合、終了処理

                        //名前、級、レース配列
                        $touchi_rireki_2[$rireki_count]['touchi_grade'] = $touchi_rireki_row->GRADE_CODE;
                        $touchi_rireki_2[$rireki_count]['touchi_jyo'] = $touchi_rireki_row->JYO;
                        $touchi_rireki_2[$rireki_count]['touchi_start_date'] = $touchi_rireki_row->TARGET_DATE;
                        $touchi_rireki_2[$rireki_count]['touchi_end_date'] = $touchi_end_date;
                        $touchi_rireki_2[$rireki_count]['touchi_tyakujun'] = $touchi_race_rireki_n;

                        //履歴がすでに3ある場合、と配列が最終列の場合は終了
                        if($rireki_count >= 3 || $rireki_array_end){
                            break;
                        }

                        //次の節間の設定
                        $rireki_count++;
                        
                        $race_title = $touchi_rireki_array[$key + 1]->RACE_TITLE;
                        $touchi_end_date = $touchi_rireki_array[$key + 1]->TARGET_DATE;
                        $touchi_race_rireki_n = "";

                    }
                }

                $syussou[$teiban]['touchi_rireki_2'] = $touchi_rireki_2;

                
            }

            $data['syussou'] = $syussou;

            

            //日付表示用
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
            $data['race_header'] = $race_header;

            //締切日作成
            $prop_name = "SIMEKIRI_JIKOKU".$race_num."R";
            $shimekiri_jikoku = $race_header->$prop_name;
            $data['shimekiri_jikoku'] = $shimekiri_jikoku;
        }
        
        return $data;
    }

    public function syusso_motor($request,$target_date,$race_num,$tomorrow_flg){
        $data = [];

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;
        $data['race_num'] = $race_num;
        
        
        //改めて開催データ取り直し
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;

        $data['tomorrow_flg'] = $tomorrow_flg;
        $data['target_date'] = $target_date;

        {
            //モーター交換日を算出
            //カウント0の日付がモーター交換日
            $motor_change_count = $this->TbBoatsMotorzenken->getMotorChangeCount($target_date);
            
            $motor_change_day = false;
            foreach($motor_change_count as $item){
                if($item->count == 0){
                    $motor_change_day = $item->TARGET_STARTDATE;
                    break;
                }
            }

            $data['motor_change_day'] = $motor_change_day;

        }


        if($kaisai_master){
               
            $syussou = $this->KyogiCommon->create_syussou_array($jyo,$target_date,$race_num);

            //欠場情報
            $ozz_info = $this->TbBoatOzzinfo->getFirstRecordByPK($jyo,$target_date,$race_num);
            $ozz_info_array = [1=>'',2=>'',3=>'',4=>'',5=>'',6=>''];
            if($ozz_info){
                for($i = 1; $i <= 6; $i++){
                    $prop_name = "KETUJO_HENKAN".$i;
                    $ozz_info_array[$i] = $ozz_info->$prop_name;
                }
            }
            $data['ozz_info_array'] = $ozz_info_array;

            $motor_list = $this->TbMotorList->getFirstRecordBydate($target_date);
            $motor_list_array = [];


            //syussouの子データとして、モーター履歴を最大3つ作成
            //$motor_rireki[1～6][1～3] = [名前,級,戦績文字列]
            //戦績を出すために、レースヘッダを戦績分だすので、一旦
            //$motor_rireki[1～6][1～3][*n]の形にする
            foreach($syussou as $teiban => $syussou_row){

                //
                $motor_rireki_array = $this->TbBoatSyussou->getMotorRirekiJoinKekka($kaisai_master->開始日付,$jyo,$syussou_row->MOTOR_NO);

                //最新のモーターリストデータを１件引き抜く
                $motor_list = $this->TbMotorList->getLatestRecordByMotorNo($syussou_row->MOTOR_NO,$kaisai_master->開始日付,$target_date);
                $syussou[$teiban]['motor_list'] = $motor_list;

                //節間判定用レースタイトル
                $race_title = $motor_rireki_array[0]->RACE_TITLE ?? "";
                $motor_rireki_2 = [];
                //文字列にする
                $race_rireki_n = "";
                $rireki_count = 1;
                $setsukan_end = false;
                $rireki_array_end = false;

                foreach($motor_rireki_array as $key => $motor_rireki_row){


                    //配列格納ではなく、この段階で文字列作成まで進める
                    if($motor_rireki_row->RACE_SYUBETU_CODE == '06' || $motor_rireki_row->RACE_SYUBETU_CODE == '96' ){
                        //優勝
                        $race_rireki_n = $this->KyogiCommon->yusho_tyakujun_to_image_sp($motor_rireki_row->TYAKUJUN).$race_rireki_n;
                    }elseif($motor_rireki_row->RACE_SYUBETU_CODE == '05'){
                        //準優勝
                        $race_rireki_n = $this->KyogiCommon->junyu_tyakujun_to_image_sp($motor_rireki_row->TYAKUJUN).$race_rireki_n;
                    }else{
                        $race_rireki_n = $motor_rireki_row->TYAKUJUN.$race_rireki_n;
                    }

                    //次があるか、あった場合同じタイトルかのフラグチェック
                    if(isset($motor_rireki_array[$key + 1])){
                        if($race_title != $motor_rireki_array[$key + 1]->RACE_TITLE){
                            $setsukan_end = true;
                            $rireki_array_end = false;
                        }else{
                            $setsukan_end = false;
                            $rireki_array_end = false;
                        }
                    }else{
                        $setsukan_end = true;
                        $rireki_array_end = true;
                    }


                    if($setsukan_end){
                        //節間が変わった場合、終了処理


                        //履歴が1以上の場合は、$motor_rireki_2に$race_rireki_nを格納
                        if($rireki_count >= 1){
                            //名前、級、レース配列
                            
                            $motor_rireki_2[$rireki_count]['sensyu_name'] = str_replace('　','',$motor_rireki_row->SENSYU_NAME);
                            $motor_rireki_2[$rireki_count]['kyu_betu'] = $motor_rireki_row->KYU_BETU;
                            $motor_rireki_2[$rireki_count]['grade'] = $motor_rireki_row->GRADE_CODE;
                            $motor_rireki_2[$rireki_count]['sex'] = $motor_rireki_row->SEX;
                            $motor_rireki_2[$rireki_count]['tyakujun'] = $race_rireki_n;
                        }

                        //履歴がすでに3ある場合、と配列が最終列の場合は終了
                        if($rireki_count >= 2 || $rireki_array_end){
                            break;
                        }

                        //次の節間の設定
                        $rireki_count++;
                        
                        $race_title = $motor_rireki_array[$key + 1]->RACE_TITLE;
                        $race_rireki_n = "";

                    }

                }
                
                $syussou[$teiban]['motor_rireki_2'] = $motor_rireki_2;
                
            }

            $data['syussou'] = $syussou;
            
            
            //日付表示用
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
            $data['race_header'] = $race_header;

            //締切日作成
            $prop_name = "SIMEKIRI_JIKOKU".$race_num."R";
            $shimekiri_jikoku = $race_header->$prop_name;
            $data['shimekiri_jikoku'] = $shimekiri_jikoku;
        }


        return $data;
    }

    
    public function syusso_wakuritsu($request,$target_date,$race_num,$tomorrow_flg){
        $data = [];

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;
        $data['race_num'] = $race_num;

        //改めて開催データ取り直し
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;

        $data['tomorrow_flg'] = $tomorrow_flg;
        $data['target_date'] = $target_date;

        //一日前の日付とそこから一年前のデータを取得
        $yesterday_date = date('Ymd',strtotime('-1 day',strtotime($target_date)));
        $year_ago_date = date('Ymd',strtotime('-1 year',strtotime($yesterday_date)));


        //格納配列の初期化処理
        /*
         * intAry2TyakuRaceCount[0～6]
         * intAry2TyakuCount[0～6][0～6]
         * intAry3TyakuRaceCount[0～6][0～6]
         * intAry3TyakuCount[0～6][0～6][0～6]
         */
        $nityaku_race_count = [];
        $nityaku_count = [];
        $santyaku_race_count = [];
        $santyaku_count = [];

        for($i=1;$i<=6;$i++){
            $nityaku_race_count[$i] = 0;

            for($j=1;$j<=6;$j++){
                $nityaku_count[$i][$j] = 0;
                $santyaku_race_count[$i][$j] = 0;
                
                for($k=1;$k<=6;$k++){
                    $santyaku_count[$i][$j][$k] = 0;

                }
            }
        }


        $kekka_info = $this->TbBoatKekkainfo->getRecordForWakuritsu($jyo,$race_num,$year_ago_date,$yesterday_date);
        foreach($kekka_info as $item){
            if($item->NIRENTAN1 != "" && $item->NIRENTAN1 != 'M5'){
                //データ有

                //カウント
                $nityaku_count[substr($item->NIRENTAN1,0,1)][substr($item->NIRENTAN1,1,1)] += 1;
                //2着までの総レース数カウント
                $nityaku_race_count[substr($item->NIRENTAN1,0,1)] += 1;
            }

            if($item->NIRENTAN2 != "" ){
                //カウント
                $nityaku_count[substr($item->NIRENTAN2,0,1)][substr($item->NIRENTAN2,1,1)] += 1;
                //2着までの総レース数カウント
                $nityaku_race_count[substr($item->NIRENTAN2,0,1)] += 1;
            }

            //2着まで
            //++++++++++++++++++

            //++++++++++++++++++
            //3着まで

            if($item->SANRENTAN1 != "" && $item->SANRENTAN1 != 'M5'){
                //データ有

                //カウント
                $santyaku_count[substr($item->SANRENTAN1,0,1)][substr($item->SANRENTAN1,1,1)][substr($item->SANRENTAN1,2,1)] += 1;
                //3着までの総レース数カウント
                $santyaku_race_count[substr($item->SANRENTAN1,0,1)][substr($item->SANRENTAN1,1,1)] += 1;
            }

            if($item->SANRENTAN2 != "" ){
                //カウント
                $santyaku_count[substr($item->SANRENTAN2,0,1)][substr($item->SANRENTAN2,1,1)][substr($item->SANRENTAN2,2,1)] += 1;
                //3着までの総レース数カウント
                $santyaku_race_count[substr($item->SANRENTAN2,0,1)][substr($item->SANRENTAN2,1,1)] += 1;
            }
            //3着まで
		    //++++++++++++++++++
        }
        
        $data['nityaku_race_count'] = $nityaku_race_count;
        $data['nityaku_count'] = $nityaku_count;
        $data['santyaku_race_count'] = $santyaku_race_count;
        $data['santyaku_count'] = $santyaku_count;

        return $data;
    }


    public function yoso_kisha_eve($request,$target_date,$race_num,$tomorrow_flg){
        $data = [];
        $is_preview = false;
    
        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;
        $data['race_num'] = $race_num;
        
        
        //改めて開催データ取り直し
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;

        $data['tomorrow_flg'] = $tomorrow_flg;
        $data['target_date'] = $target_date;

        if($kaisai_master){
            $syussou = $this->KyogiCommon->create_syussou_array($jyo,$target_date,$race_num);    
            $data['syussou'] = $syussou;

            $yoso_ashi_array = [];
            foreach($syussou as $teiban => $item){
                //最新の出足データを１件引き抜く
                $yoso_ashi = $this->TbTsuYosoAshi->getLatestRecordByTouban($item->TOUBAN,$kaisai_master->開始日付,$target_date);
                $yoso_ashi_array[$teiban] = $yoso_ashi;

            }
            $data['yoso_ashi_array'] = $yoso_ashi_array;

            $yoso_tenji = $this->TbTsuYosoTenji->getFirstRecordByDate($target_date,$race_num);
            $data['yoso_tenji'] = $yoso_tenji;

            $yoso = $this->TbTsuYoso->getFirstRecordByDate($target_date,$race_num);
            $data['yoso'] = $yoso;

            $push = $this->TbTsuYoso->getPushing($target_date);
            $push_text = "";
            foreach($push as $item){
                if($push_text){
                    $push_text .= " / ".$item->RACE_NUM."R";
                }else{
                    $push_text .= $item->RACE_NUM."R";
                }

            }
            $data['push_text'] = $push_text;


            {
                //■■■ 出走系データ処理

                //欠場情報
                $ozz_info = $this->TbBoatOzzinfo->getFirstRecordByPK($jyo,$target_date,$race_num);
                $ozz_info_array = [1=>'',2=>'',3=>'',4=>'',5=>'',6=>''];
                $ketujyo_teiban_list = [];
                if($ozz_info) {
                    for ($i = 1; $i <= 6; $i++) {
                        $prop_name = "KETUJO_HENKAN" . $i;
                        $ozz_info_array[$i] = $ozz_info->$prop_name;
                        if ($ozz_info->$prop_name == 2) {
                            $ketujyo_teiban_list[] = $i;
                        }
                    }
                }
                $data['ozz_info_array'] = $ozz_info_array;

                
                //開催日リスト作成
                $tmp_date = $kaisai_master->開始日付;
                $end_date = $kaisai_master->終了日付;
                $kaisai_day_list = [];
                $kaisai_day_list_label = [];
                $day_count = 1;
                while($tmp_date <= $end_date){
                    $kaisai_day_list[] = $tmp_date;
                    if($tmp_date == $kaisai_master->開始日付){
                        $kaisai_day_list_label[] = "初日";
                    }else if($tmp_date == $end_date){
                        $kaisai_day_list_label[] = "最終日";
                    }else{
                        $kaisai_day_list_label[] = $day_count."日目";
                    }
                    $tmp_date = date("Ymd",strtotime("+1 day",strtotime($tmp_date)));

                    $day_count++;
                }

                //開催日リストを元にSTランキングデータ作成
                $st_ranking = [];
                foreach($kaisai_day_list as $item){
                    for($race_num_count=1;$race_num_count<=12;$race_num_count++){
                        $top_st = $this->TbBoatKekka->getTopSt($jyo,$item,$race_num_count);
                        if($top_st){
                            $st_ranking[$item][$race_num_count] = $top_st->START_TIMING;
                        }else{
                            $st_ranking[$item][$race_num_count] = "";
                        }
                    }
                }
                $data['st_ranking'] = $st_ranking;
                


                $race_header = $this->TbBoatRaceheader->getRecordByDateList($jyo,$kaisai_day_list);
                $kaisai_alldays = $race_header[0]->KAISAI_ALLDAYS ?? 6;
                $konsetsu_race_header = [];
                foreach($race_header as $item){
                    //$konsetsu_race_header[$item->TARGET_DATE] = $item;
                    $konsetsu_race_header[] = $item;
                }

                $data['kaisai_day_list'] = $kaisai_day_list;
                $data['kaisai_day_list_label'] = $kaisai_day_list_label;
                $data['konsetsu_race_header'] = $konsetsu_race_header;
                $data['kaisai_alldays'] = $kaisai_alldays;

                //日付表示用
                $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
                $data['race_header'] = $race_header;

                //締切日作成
                $prop_name = "SIMEKIRI_JIKOKU".$race_num."R";
                $shimekiri_jikoku = $race_header->$prop_name;
                $data['shimekiri_jikoku'] = $shimekiri_jikoku;
            }
        }

        return $data;
    }

    
    public function yoso_kisha_tenji($request,$target_date,$race_num,$tomorrow_flg){
        $data = [];
        $is_preview = false;
    
        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;
        $data['race_num'] = $race_num;
        
        
        //改めて開催データ取り直し
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;

        $data['tomorrow_flg'] = $tomorrow_flg;
        $data['target_date'] = $target_date;

        if($kaisai_master){
            $syussou = $this->KyogiCommon->create_syussou_array($jyo,$target_date,$race_num);    
            $data['syussou'] = $syussou;

            //動画情報取得
            $vod_manegiment = $this->TbVodManagement->getFirstRecordByMovieId($jyo,$target_date."99".$jyo.str_pad($race_num, 2, '0', STR_PAD_LEFT));
            $data['vod_manegiment'] = $vod_manegiment;

            $yoso_tenji = $this->TbTsuYosoTenji->getFirstRecordByDate($target_date,$race_num);
            $data['yoso_tenji'] = $yoso_tenji;

            $yoso = $this->TbTsuYoso->getFirstRecordByDate($target_date,$race_num);
            $data['yoso'] = $yoso;


            {
                $loop_count1 = 0;
                $loop_count2 = 0;
                $loop_count3 = 0;
                $loop_count4 = 0;
                $loop_count5 = 0;
                $loop_count6 = 0;

                //展示予想表示のための計算処理
                for($loop_count1=1;$loop_count1<=2;$loop_count1++){
                    $prop_name_favolite = "FAVOLITE".$loop_count1."11";
                    if($yoso_tenji->$prop_name_favolite){
                        $favolite_box_nagashi_flg = 0;
						$loop_count3 = 1;

                        
                        $prop_name_favolite_mark = "FAVOLITE_MARK".$loop_count1.$loop_count3;
                        if($yoso_tenji->$prop_name_favolite_mark == 8){
                            //ボックスフラグ
                            $favolite_box_nagashi_flg = 1;
                        }elseif($yoso_tenji->$prop_name_favolite_mark == 9){
                            //流しフラグ
                            $favolite_box_nagashi_flg = 2;
                        }

                        if($favolite_box_nagashi_flg == 0){
                            for($loop_count4=1;$loop_count4<=3;$loop_count4++){
                                $loop_count5=2;
                                $prop_name_favolite2 = "FAVOLITE".$loop_count1.$loop_count4.$loop_count5;
                                if($yoso_tenji->$prop_name_favolite2){
                                    $loop_count6 = $loop_count6 + 1;
                                    break;
                                }
                            }

                            
                            for($loop_count4=1;$loop_count4<=3;$loop_count4++){
                                $loop_count5=3;
                                $prop_name_favolite2 = "FAVOLITE".$loop_count1.$loop_count4.$loop_count5;
                                if($yoso_tenji->$prop_name_favolite2){
                                    $loop_count6 = $loop_count6 + 1;
                                }
                            }


                        }elseif($favolite_box_nagashi_flg == 1){

                            $loop_count6 = 2;

                        }elseif($favolite_box_nagashi_flg == 2){

                            $loop_count6 = $loop_count6 + 1;

                            //初期化
                            $favolite_box_nagashi_flg = 0;

                            $prop_name_favolite_mark = "FAVOLITE_MARK".$loop_count1.$loop_count3;
                            if($yoso_tenji->$prop_name_favolite_mark == 8){
                                //ここボックスはおかしい
                                
                            }elseif($yoso_tenji->$prop_name_favolite_mark == 9){
                                //流しフラグ
                                $favolite_box_nagashi_flg = 2;
                            }

                            if(!$favolite_box_nagashi_flg){
                                //通常

                                for($loop_count4=1;$loop_count4<=3;$loop_count4++){
                                    $loop_count5 = 3;
                                    $prop_name_favolite2 = "FAVOLITE".$loop_count1.$loop_count4.$loop_count5;
                                    if($yoso_tenji->$prop_name_favolite2){
                                        $loop_count6 = $loop_count6 + 1;
                                    }
                                }
                            }elseif($favolite_box_nagashi_flg == 2){
                                $loop_count6 = $loop_count6 + 1;
                            }

                        }
                        
                    }else{
                        //頭がない時

                        $prop_name_favolite3 = "FAVOLITE".$loop_count1."12";
                        $prop_name_favolite4 = "FAVOLITE".$loop_count1."22";
                        $prop_name_favolite5 = "FAVOLITE".$loop_count1."32";

                        if(
                            $yoso_tenji->$prop_name_favolite3 != "" &&
                            $yoso_tenji->$prop_name_favolite4 != "" &&
                            $yoso_tenji->$prop_name_favolite5 != "" 
                        ){
                            $loop_count6 = 1;
                            $favolite_box_nagashi_flg = 0;

                            $prop_name_favolite_mark = "FAVOLITE_MARK".$loop_count1."1";
                            if($yoso_tenji->$prop_name_favolite_mark == 8){
                                //ボックスフラグ
                                $favolite_box_nagashi_flg = 1;
                                
                            }elseif($yoso_tenji->$prop_name_favolite_mark == 9){
                                //流しフラグ
                                $favolite_box_nagashi_flg = 2;
                            }
                        }
                    }

                    if($loop_count6 >= 1){
                        //データあり

                        //本命表示フラグ
                        $favolite_flg = true;
                    }
                }

                $data['favolite_flg'] = $favolite_flg;
            }

            {
                $loop_count1 = 0;
                $loop_count2 = 0;
                $loop_count3 = 0;
                $loop_count4 = 0;
                $loop_count5 = 0;
                $loop_count6 = 0;

                $rich_flg=0;

                //穴フォーカスのための計算処理
                for($loop_count1=1;$loop_count1<=2;$loop_count1++){
                    
                    $prop_name_rich = "RICH".$loop_count1."11";
                    if($yoso_tenji->$prop_name_rich){

                        $rich_box_nagashi_flg = 0;
                        $loop_count3 = 1;

                        $prop_name_rich_mark = "RICH_MARK".$loop_count1.$loop_count3;
                        if($yoso_tenji->$prop_name_rich_mark == 8){
                            //ボックスフラグ
                            $rich_box_nagashi_flg = 1;
                        }elseif($yoso_tenji->$prop_name_rich_mark == 8){
                            //流しフラグ
                            $rich_box_nagashi_flg = 2;
                        }

                        if($rich_box_nagashi_flg == 0){
                            //通常
                            for($loop_count4=1;$loop_count4<=3;$loop_count4++){
                                $loop_count5 = 2;
                                $prop_name_rich2 = "RICH".$loop_count1.$loop_count4.$loop_count5;
                                if($yoso_tenji->$prop_name_rich2){
                                    $loop_count6 = $loop_count6 + 1;
                                    break;
                                }
                            }

                            for($loop_count4=1;$loop_count4<=3;$loop_count4++){
                                $loop_count5 = 3;
                                $prop_name_rich2 = "RICH".$loop_count1.$loop_count4.$loop_count5;
                                if($yoso_tenji->$prop_name_rich2){
                                    $loop_count6 = $loop_count6 + 1;
                                }
                            }

                        }elseif($rich_box_nagashi_flg == 1){

                            $loop_count6 = 2;

                        }elseif($rich_box_nagashi_flg == 2){

                            $loop_count6 = $loop_count6 + 1;
                            
                            //初期化
                            $rich_box_nagashi_flg = 0;
                            $prop_name_rich_mark = "RICH_MARK".$loop_count1.$loop_count3;
                            if($yoso_tenji->$prop_name_rich_mark == 8){
                                //ここボックスはおかしい
                                
                            }elseif($yoso_tenji->$prop_name_rich_mark == 8){
                                
                                $rich_box_nagashi_flg = 2;
                            }

                            if($rich_box_nagashi_flg == 0){

                                for($loop_count4=1;$loop_count4<=3;$loop_count4++){
                                    $loop_count5 = 3;
                                    $prop_name_rich2 = "RICH".$loop_count1.$loop_count4.$loop_count5;
                                    if($yoso_tenji->$prop_name_rich2){
                                        $loop_count6 = $loop_count6 + 1;
                                    }
                                }

                            }elseif($rich_box_nagashi_flg == 2){
                                $loop_count6 = $loop_count6 + 1;
                            }

                        }
                    }else{
                        // 頭がない時
                        $prop_name_rich3 = "RICH".$loop_count1."12";
                        $prop_name_rich4 = "RICH".$loop_count1."22";
                        $prop_name_rich5 = "RICH".$loop_count1."32";

                        if(
                            $yoso_tenji->$prop_name_rich3 != "" &&
                            $yoso_tenji->$prop_name_rich4 != "" &&
                            $yoso_tenji->$prop_name_rich5 != "" 
                        ){
                            $loop_count6 = 1;
                            $rich_box_nagashi_flg = 0;

                            $prop_name_rich_mark = "RICH_MARK".$loop_count1."1";
                            if($yoso_tenji->$prop_name_rich_mark == 8){
                                //ボックスフラグ
                                $rich_box_nagashi_flg = 1;
                                
                            }elseif($yoso_tenji->$prop_name_rich_mark == 9){
                                //流しフラグ
                                $rich_box_nagashi_flg = 2;
                            }
                        }
                    }

                    if($loop_count6 >= 1){
                        $rich_flg = 1;
                    }

                }  // for($loop_count1=1;$loop_count1<=2;$loop_count1++)

                $data['rich_flg'] = $rich_flg;
            }



            {
                //■■■ 出走系データ処理

                //欠場情報
                $ozz_info = $this->TbBoatOzzinfo->getFirstRecordByPK($jyo,$target_date,$race_num);
                $ozz_info_array = [1=>'',2=>'',3=>'',4=>'',5=>'',6=>''];
                $ketujyo_teiban_list = [];
                if($ozz_info) {
                    for ($i = 1; $i <= 6; $i++) {
                        $prop_name = "KETUJO_HENKAN" . $i;
                        $ozz_info_array[$i] = $ozz_info->$prop_name;
                        if ($ozz_info->$prop_name == 2) {
                            $ketujyo_teiban_list[] = $i;
                        }
                    }
                }
                $data['ozz_info_array'] = $ozz_info_array;

                
                //開催日リスト作成
                $tmp_date = $kaisai_master->開始日付;
                $end_date = $kaisai_master->終了日付;
                $kaisai_day_list = [];
                $kaisai_day_list_label = [];
                $day_count = 1;
                while($tmp_date <= $end_date){
                    $kaisai_day_list[] = $tmp_date;
                    if($tmp_date == $kaisai_master->開始日付){
                        $kaisai_day_list_label[] = "初日";
                    }else if($tmp_date == $end_date){
                        $kaisai_day_list_label[] = "最終日";
                    }else{
                        $kaisai_day_list_label[] = $day_count."日目";
                    }
                    $tmp_date = date("Ymd",strtotime("+1 day",strtotime($tmp_date)));

                    $day_count++;
                }

                //開催日リストを元にSTランキングデータ作成
                $st_ranking = [];
                foreach($kaisai_day_list as $item){
                    for($race_num_count=1;$race_num_count<=12;$race_num_count++){
                        $top_st = $this->TbBoatKekka->getTopSt($jyo,$item,$race_num_count);
                        if($top_st){
                            $st_ranking[$item][$race_num_count] = $top_st->START_TIMING;
                        }else{
                            $st_ranking[$item][$race_num_count] = "";
                        }
                    }
                }
                $data['st_ranking'] = $st_ranking;
                


                $race_header = $this->TbBoatRaceheader->getRecordByDateList($jyo,$kaisai_day_list);
                $kaisai_alldays = $race_header[0]->KAISAI_ALLDAYS ?? 6;
                $konsetsu_race_header = [];
                foreach($race_header as $item){
                    //$konsetsu_race_header[$item->TARGET_DATE] = $item;
                    $konsetsu_race_header[] = $item;
                }

                $data['kaisai_day_list'] = $kaisai_day_list;
                $data['kaisai_day_list_label'] = $kaisai_day_list_label;
                $data['konsetsu_race_header'] = $konsetsu_race_header;
                $data['kaisai_alldays'] = $kaisai_alldays;

                //日付表示用
                $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
                $data['race_header'] = $race_header;

                //締切日作成
                $prop_name = "SIMEKIRI_JIKOKU".$race_num."R";
                $shimekiri_jikoku = $race_header->$prop_name;
                $data['shimekiri_jikoku'] = $shimekiri_jikoku;
            }


            {
                //本命・穴系の処理
                $neer_kekka_race_number = $this->KyogiCommon->getNeerKekkaRaceNumber($jyo,$target_date);
                $data['neer_kekka_race_number'] = $neer_kekka_race_number;

                $tyokuzen = $this->TbBoatTyokuzen->getRecentTenjiRecord($jyo,$target_date);
                $neer_start_exhibition = $tyokuzen->RACE_NUMBER ?? 0;
                $data['neer_start_exhibition'] = $neer_start_exhibition;

                //3連単着順有のレースで抽出
                //初期化
                $strTempData = "000";		//枠番
                $strTempData2 = "000";	//枠番同着
                $intTempData = 0;			//払い戻し金
                $intTempData2 = 0;		//払い戻し金同着

                $kekka_info = $this->TbBoatKekkainfo->getRecordForKishaTenji($jyo,$target_date,$race_num);
                
                $data['kekka_info'] = $kekka_info;

                if($kekka_info){
                    if(strpos($kekka_info->SANRENTAN1 , 'MS') !== false){
                        //不成立
                        $strTempData = "999";
                    }else{
                        //成立

                        $strTempData = $kekka_info->SANRENTAN1;
                        $intTempData = $kekka_info->SANRENTAN_MONEY1;

                        //同着加味
                        if($kekka_info->SANRENTAN2){
                            $strTempData2 = $kekka_info->SANRENTAN2;
                            $intTempData2 = $kekka_info->SANRENTAN_MONEY2;
                        }

                    }
                }

                $data['strTempData'] = $strTempData;
                $data['strTempData2'] = $strTempData2;
                $data['intTempData'] = $intTempData;
                $data['intTempData2'] = $intTempData2;


                //3連単変換用の処理
                $strAryTenjiEvaluation =[];
                $strAryYosoMark =[];
                $strAryYoso =[];
                if($yoso_tenji){
                   
                    for($intLoopCount2 = 1;$intLoopCount2 <= 6;$intLoopCount2++){
                        $prop_name = 'EVALUATION'.$intLoopCount2;
                        $strAryTenjiEvaluation[$intLoopCount2] = $yoso_tenji->$prop_name;
                    }

                    $strComment = $yoso_tenji->COMMENT;

                    for($intLoopCount2 = 1;$intLoopCount2 <= 2;$intLoopCount2++){

                        for($intLoopCount3 = 1;$intLoopCount3 <= 2;$intLoopCount3++){

                            $intLoopCount4 = 1;
                            $prop_name = 'FAVOLITE_MARK'.$intLoopCount2.$intLoopCount3;
                            $strAryYosoMark[$intLoopCount2][$intLoopCount3][$intLoopCount4] = $yoso_tenji->$prop_name;

                            $intLoopCount4 = 2;
                            $prop_name = 'RICH_MARK'.$intLoopCount2.$intLoopCount3;
                            $strAryYosoMark[$intLoopCount2][$intLoopCount3][$intLoopCount4] = $yoso_tenji->$prop_name;

                        }

                        for($intLoopCount3 = 1;$intLoopCount3 <= 3;$intLoopCount3++){

                            for($intLoopCount4 = 1;$intLoopCount4 <= 3;$intLoopCount4++){

                                $intLoopCount5 = 1;
                                $prop_name = 'FAVOLITE'.$intLoopCount2.$intLoopCount3.$intLoopCount4;
                                $strAryYoso[$intLoopCount2][$intLoopCount3][$intLoopCount4][$intLoopCount5] = $yoso_tenji->$prop_name;
                                
                                $intLoopCount5 = 2;
                                $prop_name = 'RICH'.$intLoopCount2.$intLoopCount3.$intLoopCount4;
                                $strAryYoso[$intLoopCount2][$intLoopCount3][$intLoopCount4][$intLoopCount5] = $yoso_tenji->$prop_name;

                            }

                        }
                    }
                   
                }

                $data['strAryYoso'] = $strAryYoso;
                $data['strAryYosoMark'] = $strAryYosoMark;
                $data['strAryTenjiEvaluation'] = $strAryTenjiEvaluation;
                $data['strAryYosoKumi'] = [];

                {
                    $ozz_3rentan = $this->TbBoatOzz->getRecord($data['jyo'],$data['target_date'],$data['race_num'], 3);
    
                    $bairitu_3rentan = [];
                    foreach ($ozz_3rentan as $item) {
                        if (in_array($item->NUMBER1, $ketujyo_teiban_list) || in_array($item->NUMBER2, $ketujyo_teiban_list) || in_array($item->NUMBER3, $ketujyo_teiban_list)) {
                            $bairitu_3rentan[$item->NUMBER1][$item->NUMBER2][$item->NUMBER3] = "-";
                        } else {
                            $bairitu_3rentan[$item->NUMBER1][$item->NUMBER2][$item->NUMBER3] = $item->BAIRITU;
                        }
                    }
                    $data['bairitu_3rentan'] = $bairitu_3rentan;
                }

            }
            
        }

        return $data;
    }


    public function odds_3rentanpuku($request,$target_date,$race_num,$tomorrow_flg){
        $data = [];

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;
        $data['race_num'] = $race_num;
        
        $target_time = date('Hi');
        $target_time = '1000';
        $data['target_time'] = $target_time;

        
        
        //改めて開催データ取り直し
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;

        $data['tomorrow_flg'] = $tomorrow_flg;
        $data['target_date'] = $target_date;

        if($kaisai_master){
            $syussou = $this->KyogiCommon->create_syussou_array($jyo,$target_date,$race_num);    
            $data['syussou'] = $syussou;

            //欠場情報
            $ozz_info = $this->TbBoatOzzinfo->getFirstRecordByPK($jyo,$target_date,$race_num);
            $ozz_info_array = [1=>'',2=>'',3=>'',4=>'',5=>'',6=>''];
            $ketujyo_teiban_list = [];
            if($ozz_info){
                for($i = 1; $i <= 6; $i++){
                    $prop_name = "KETUJO_HENKAN".$i;
                    $ozz_info_array[$i] = $ozz_info->$prop_name;
                    if( $ozz_info->$prop_name == 2){
                        $ketujyo_teiban_list[] = $i;
                    }
                }
            }
            $data['ozz_info_array'] = $ozz_info_array;

            //欠場者の名前変換
            foreach($syussou as $teiban=> $item){
                if(in_array($teiban,$ketujyo_teiban_list)){
                    $syussou[$teiban]->SENSYU_NAME = "欠場";
                }
            }


            $ozz_3rentan = $this->TbBoatOzz->getRecord($jyo, $target_date, $race_num, 3);
            $bairitu_3rentan = [];
            foreach($ozz_3rentan as $item){
                if(in_array($item->NUMBER1,$ketujyo_teiban_list) || in_array($item->NUMBER2,$ketujyo_teiban_list) || in_array($item->NUMBER3,$ketujyo_teiban_list)){
                    $bairitu_3rentan[$item->NUMBER1][$item->NUMBER2][$item->NUMBER3] = "-";
                }else{
                    $bairitu_3rentan[$item->NUMBER1][$item->NUMBER2][$item->NUMBER3] = $item->BAIRITU;
                }
            }
            $data['bairitu_3rentan'] = $bairitu_3rentan;

            $ozz_3renpuku = $this->TbBoatOzz->getRecord($jyo, $target_date, $race_num, 4);
            $bairitu_3renpuku = [];
            foreach($ozz_3renpuku as $item){
                if(in_array($item->NUMBER1,$ketujyo_teiban_list) || in_array($item->NUMBER2,$ketujyo_teiban_list) || in_array($item->NUMBER3,$ketujyo_teiban_list)){
                    $bairitu_3renpuku[$item->NUMBER1][$item->NUMBER2][$item->NUMBER3] = "-";
                }else{
                    $bairitu_3renpuku[$item->NUMBER1][$item->NUMBER2][$item->NUMBER3] = $item->BAIRITU;
                }
            }
            $data['bairitu_3renpuku'] = $bairitu_3renpuku;


            {
                $ozz_3rentan_top20 = $this->TbBoatOzz->getRanking($jyo, $target_date, $race_num, 3,'ASC');
                $bairitu_3rentan_top20 = [];
                //同率順位処理
                $true_rank = 1;
                $display_rank = 1;
                $temp_bairiti = 0;
                foreach($ozz_3rentan_top20 as $item){
                    $row=[];
                    if($temp_bairiti != $item->BAIRITU){
                        $display_rank = $true_rank;
                        $temp_bairiti = $item->BAIRITU;
                    }
                    $row['rank'] = $display_rank;
                    $row['record'] = $item;
                    $bairitu_3rentan_top20[] = $row;
                    
                    $true_rank++;
                }
                $data['bairitu_3rentan_top20'] = $bairitu_3rentan_top20;
            }

            {

                $result_neer_kekka_race_number = 0;

                $neer_kekka_race_number = $this->KyogiCommon->getNeerKekkaRaceNumber($jyo,$target_date);
                $neer_kekka_race_number_tfinfo = $this->KyogiCommon->getNeerKekkaRaceNumberTfinfo($jyo,$target_date);

                if($neer_kekka_race_number){
                    $result_neer_kekka_race_number = $neer_kekka_race_number;
                }

                if($neer_kekka_race_number_tfinfo){

                    if($result_neer_kekka_race_number < $neer_kekka_race_number_tfinfo){
                        $result_neer_kekka_race_number = $neer_kekka_race_number_tfinfo;
                    }

                }
                
                $data['result_neer_kekka_race_number'] = $result_neer_kekka_race_number;
                $data['neer_kekka_race_number'] = $neer_kekka_race_number;
                $data['neer_kekka_race_number_tfinfo'] = $neer_kekka_race_number_tfinfo;


            }


            //日付表示用
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
            $data['race_header'] = $race_header;

            //締切日作成
            $prop_name = "SIMEKIRI_JIKOKU".$race_num."R";
            $shimekiri_jikoku = $race_header->$prop_name;
            $data['shimekiri_jikoku'] = $shimekiri_jikoku;
        }

        return $data;
    }

    public function odds_2rentanpuku($request,$target_date,$race_num,$tomorrow_flg){
        $data = [];

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;
        $data['race_num'] = $race_num;
        
        $target_time = date('Hi');
        $target_time = '1000';
        $data['target_time'] = $target_time;

        
        
        //改めて開催データ取り直し
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;

        $data['tomorrow_flg'] = $tomorrow_flg;
        $data['target_date'] = $target_date;

        if($kaisai_master){
            $syussou = $this->KyogiCommon->create_syussou_array($jyo,$target_date,$race_num);    
            $data['syussou'] = $syussou;

            //欠場情報
            $ozz_info = $this->TbBoatOzzinfo->getFirstRecordByPK($jyo,$target_date,$race_num);
            $ozz_info_array = [1=>'',2=>'',3=>'',4=>'',5=>'',6=>''];
            $ketujyo_teiban_list = [];
            if($ozz_info){
                for($i = 1; $i <= 6; $i++){
                    $prop_name = "KETUJO_HENKAN".$i;
                    $ozz_info_array[$i] = $ozz_info->$prop_name;
                    if( $ozz_info->$prop_name == 2){
                        $ketujyo_teiban_list[] = $i;
                    }
                }
            }
            $data['ozz_info_array'] = $ozz_info_array;

            //欠場者の名前変換
            foreach($syussou as $teiban=> $item){
                if(in_array($teiban,$ketujyo_teiban_list)){
                    $syussou[$teiban]->SENSYU_NAME = "欠場";
                }
            }


            $ozz_2rentan = $this->TbBoatOzz->getRecord($jyo, $target_date, $race_num, 1);
            $bairitu_2rentan = [];
            foreach($ozz_2rentan as $item){
                if(in_array($item->NUMBER1,$ketujyo_teiban_list) || in_array($item->NUMBER3,$ketujyo_teiban_list)){
                    $bairitu_2rentan[$item->NUMBER1][$item->NUMBER3] = "-";
                }else{
                    $bairitu_2rentan[$item->NUMBER1][$item->NUMBER3] = $item->BAIRITU;
                }
            }
            $data['bairitu_2rentan'] = $bairitu_2rentan;

            $ozz_2renpuku = $this->TbBoatOzz->getRecord($jyo, $target_date, $race_num, 2);
            $bairitu_2renpuku = [];
            foreach($ozz_2renpuku as $item){
                if(in_array($item->NUMBER1,$ketujyo_teiban_list) || in_array($item->NUMBER3,$ketujyo_teiban_list)){
                    $bairitu_2renpuku[$item->NUMBER1][$item->NUMBER3] = "-";
                }else{
                    $bairitu_2renpuku[$item->NUMBER1][$item->NUMBER3] = $item->BAIRITU;
                }
            }
            $data['bairitu_2renpuku'] = $bairitu_2renpuku;

            $ozz_tansyo = $this->TbBoatOzz->getRecord($jyo, $target_date, $race_num, 5);
            $bairitu_tansyo = [];
            foreach($ozz_tansyo as $item){
                if(in_array($item->NUMBER1,$ketujyo_teiban_list)){
                    $bairitu_tansyo[$item->NUMBER1] = "-";
                }else{
                    $bairitu_tansyo[$item->NUMBER1] = $item->BAIRITU;
                }
            }
            $data['bairitu_tansyo'] = $bairitu_tansyo;
            

            $ozz_fukusyo = $this->TbBoatOzz->getRecord($jyo, $target_date, $race_num, 6);
            $bairitu_fukusyo = [];
            foreach($ozz_fukusyo as $item){
                if(in_array($item->NUMBER1,$ketujyo_teiban_list)){
                    $bairitu_fukusyo[$item->NUMBER1] = "-";
                }else{
                    $bairitu_fukusyo[$item->NUMBER1] = str_replace("-","～",$item->BAIRITU);
                }
            }
            $data['bairitu_fukusyo'] = $bairitu_fukusyo;

            
            $ozz_kakurenpuku = $this->TbBoatOzz->getRecord($jyo, $target_date, $race_num, 7);
            $bairitu_kakurenpuku = [];
            foreach($ozz_kakurenpuku as $item){
                if(in_array($item->NUMBER1,$ketujyo_teiban_list) || in_array($item->NUMBER3,$ketujyo_teiban_list)){
                    $bairitu_kakurenpuku[$item->NUMBER1][$item->NUMBER3] = "-";
                }else{
                    $bairitu_kakurenpuku[$item->NUMBER1][$item->NUMBER3] = str_replace("-","～",$item->BAIRITU);
                }
            }
            $data['bairitu_kakurenpuku'] = $bairitu_kakurenpuku;


            {

                $ozz_2rentan_top20 = $this->TbBoatOzz->getRanking($jyo, $target_date, $race_num, 1,'ASC');
                $bairitu_2rentan_top20 = [];
                //同率順位処理
                $true_rank = 1;
                $display_rank = 1;
                $temp_bairiti = 0;
                foreach($ozz_2rentan_top20 as $item){
                    $row=[];
                    if($temp_bairiti != $item->BAIRITU){
                        $display_rank = $true_rank;
                        $temp_bairiti = $item->BAIRITU;
                    }
                    $row['rank'] = $display_rank;
                    $row['record'] = $item;
                    $bairitu_2rentan_top20[] = $row;
                    
                    $true_rank++;
                }
                $data['bairitu_2rentan_top20'] = $bairitu_2rentan_top20;

            }

            {

                $result_neer_kekka_race_number = 0;

                $neer_kekka_race_number = $this->KyogiCommon->getNeerKekkaRaceNumber($jyo,$target_date);
                $neer_kekka_race_number_tfinfo = $this->KyogiCommon->getNeerKekkaRaceNumberTfinfo($jyo,$target_date);

                if($neer_kekka_race_number){
                    $result_neer_kekka_race_number = $neer_kekka_race_number;
                }

                if($neer_kekka_race_number_tfinfo){

                    if($result_neer_kekka_race_number < $neer_kekka_race_number_tfinfo){
                        $result_neer_kekka_race_number = $neer_kekka_race_number_tfinfo;
                    }

                }
                
                $data['result_neer_kekka_race_number'] = $result_neer_kekka_race_number;
                $data['neer_kekka_race_number'] = $neer_kekka_race_number;
                $data['neer_kekka_race_number_tfinfo'] = $neer_kekka_race_number_tfinfo;


            }



            //日付表示用
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
            $data['race_header'] = $race_header;

            //締切日作成
            $prop_name = "SIMEKIRI_JIKOKU".$race_num."R";
            $shimekiri_jikoku = $race_header->$prop_name;
            $data['shimekiri_jikoku'] = $shimekiri_jikoku;
        }

        return $data;
    }


    public function kekka_detail($request,$target_date,$race_num,$tomorrow_flg){
        $data = [];

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;
        $data['race_num'] = $race_num;
        
        $target_time = date('Hi');
        $target_time = '1000';
        $data['target_time'] = $target_time;

        
        
        //改めて開催データ取り直し
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;

        $data['tomorrow_flg'] = $tomorrow_flg;
        $data['target_date'] = $target_date;

        if($kaisai_master){

            $syussou = $this->KyogiCommon->create_syussou_array($jyo,$target_date,$race_num);    
            $data['syussou'] = $syussou;

            $kekka = $this->TbBoatKekka->getRaceKekka($jyo,$target_date,$race_num);
            
            foreach($kekka as $key=>$item){
                $SENSYU_NAME = $item->SENSYU_NAME;
                $SENSYU_NAME = str_replace("　　"," ", $SENSYU_NAME);
                $SENSYU_NAME = str_replace("　"," ", $SENSYU_NAME);
                $kekka[$key]->SENSYU_NAME = $SENSYU_NAME;

            } 
            $data['kekka'] = $kekka;

            $kekka_info = $this->TbBoatKekkainfo->getFirstRecordByPK($jyo,$target_date,$race_num);
            $data['kekka_info'] = $kekka_info;

            {
                //結果情報をかけ式に合わせて配列作成
                $tansyo_array = []; //不成立文字番0 配列要素上限3
                $fukusyo_array = []; //不成立文字番1 配列要素上限5
                $nirentan_array = []; //不成立文字番2 配列要素上限2
                $nirenfuku_array = []; //不成立文字番3 配列要素上限2
                $sanrentan_array = []; //不成立文字番4 配列要素上限2
                $sanrenfuku_array = []; //不成立文字番5 配列要素上限2
                $kakurenfuku_array = []; //不成立文字番6 配列要素上限5

                $fuseiritu_array = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

                if($kekka_info){

                    //不成立フラグを一文字ずつ分割
                    $fuseiritu_array = str_split($kekka_info->FUSEIRITU);


                    //単勝
                    for($i=1;$i<3;$i++){
                        $prop_name = "TANSYO".$i; 
                        if($kekka_info->$prop_name){
                            $tansyo_array[$i]['TANSYO'] = $kekka_info->$prop_name;
                            $prop_name = "TANSYO_MONEY".$i; 
                            $tansyo_array[$i]['TANSYO_MONEY'] = $kekka_info->$prop_name;
                        }
                    }

                    //複勝
                    for($i=1;$i<5;$i++){
                        $prop_name = "FUKUSYO".$i; 
                        if($kekka_info->$prop_name){
                            $fukusyo_array[$i]['FUKUSYO'] = $kekka_info->$prop_name;
                            $prop_name = "FUKUSYO_MONEY".$i; 
                            $fukusyo_array[$i]['FUKUSYO_MONEY'] = $kekka_info->$prop_name;
                        }
                    }

                    //2連単
                    for($i=1;$i<2;$i++){
                        $prop_name = "NIRENTAN".$i; 
                        if($kekka_info->$prop_name){
                            $nirentan_array[$i]['NIRENTAN'] = $kekka_info->$prop_name;
                            $prop_name = "NIRENTAN_MONEY".$i; 
                            $nirentan_array[$i]['NIRENTAN_MONEY'] = $kekka_info->$prop_name;
                            $prop_name = "NIRENTAN_NINKI".$i; 
                            $nirentan_array[$i]['NIRENTAN_NINKI'] = $kekka_info->$prop_name;
                        }
                    }

                    //2連複
                    for($i=1;$i<2;$i++){
                        $prop_name = "NIRENFUKU".$i; 
                        if($kekka_info->$prop_name){
                            $nirenfuku_array[$i]['NIRENFUKU'] = $kekka_info->$prop_name;
                            $prop_name = "NIRENFUKU_MONEY".$i; 
                            $nirenfuku_array[$i]['NIRENFUKU_MONEY'] = $kekka_info->$prop_name;
                            $prop_name = "NIRENFUKU_NINKI".$i; 
                            $nirenfuku_array[$i]['NIRENFUKU_NINKI'] = $kekka_info->$prop_name;
                        }
                    }


                    //3連単
                    for($i=1;$i<2;$i++){
                        $prop_name = "SANRENTAN".$i; 
                        if($kekka_info->$prop_name){
                            $sanrentan_array[$i]['SANRENTAN'] = $kekka_info->$prop_name;
                            $prop_name = "SANRENTAN_MONEY".$i; 
                            $sanrentan_array[$i]['SANRENTAN_MONEY'] = $kekka_info->$prop_name;
                            $prop_name = "SANRENTAN_NINKI".$i; 
                            $sanrentan_array[$i]['SANRENTAN_NINKI'] = $kekka_info->$prop_name;
                        }
                    }


                    //3連複
                    for($i=1;$i<2;$i++){
                        $prop_name = "SANRENFUKU".$i; 
                        if($kekka_info->$prop_name){
                            $sanrenfuku_array[$i]['SANRENFUKU'] = $kekka_info->$prop_name;
                            $prop_name = "SANRENFUKU_MONEY".$i; 
                            $sanrenfuku_array[$i]['SANRENFUKU_MONEY'] = $kekka_info->$prop_name;
                            $prop_name = "SANRENFUKU_NINKI".$i; 
                            $sanrenfuku_array[$i]['SANRENFUKU_NINKI'] = $kekka_info->$prop_name;
                        }
                    }
                    
                    //拡連複
                    for($i=1;$i<5;$i++){
                        $prop_name = "KAKURENFUKU".$i; 
                        if($kekka_info->$prop_name){
                            $kakurenfuku_array[$i]['KAKURENFUKU'] = $kekka_info->$prop_name;
                            $prop_name = "KAKURENFUKU_MONEY".$i; 
                            $kakurenfuku_array[$i]['KAKURENFUKU_MONEY'] = $kekka_info->$prop_name;
                            $prop_name = "KAKURENFUKU_NINKI".$i; 
                            $kakurenfuku_array[$i]['KAKURENFUKU_NINKI'] = $kekka_info->$prop_name;
                        }
                    }
                
                }

                $data['tansyo_array'] = $tansyo_array; 
                $data['fukusyo_array'] = $fukusyo_array; 
                $data['nirentan_array'] = $nirentan_array; 
                $data['nirenfuku_array'] = $nirenfuku_array; 
                $data['sanrentan_array'] = $sanrentan_array; 
                $data['sanrenfuku_array'] = $sanrenfuku_array; 
                $data['kakurenfuku_array'] = $kakurenfuku_array; 

                $data['fuseiritu_array'] = $fuseiritu_array;

            }

            
            //日付表示用
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
            $data['race_header'] = $race_header;

            //締切日作成
            $prop_name = "SIMEKIRI_JIKOKU".$race_num."R";
            $shimekiri_jikoku = $race_header->$prop_name;
            $data['shimekiri_jikoku'] = $shimekiri_jikoku;


            {
                //スリット用データ成形
                $kekka = $this->TbBoatKekka->getRaceKekka($jyo,$target_date,$race_num);

                $kekka_array = [];
                foreach($kekka as $item){
                    $kekka_array[$item->TEIBAN]['record'] = $item;

                    $right_margin = 110;
                    $st_timing = (double)$item->START_TIMING;

                    if($item->TYAKUJUN == 'F'){
                        //フライング
                        if($st_timing >= 0.11){
                            $right_margin = 0;
                        }else{
                            $right_margin = $right_margin - $st_timing * 100 * 3;
                        }
                    }elseif($item->TYAKUJUN == 'L'){
                        //出遅れ何もしない
                        $right_margin = 400;
                    }else{
                        if($st_timing){
                            if($st_timing >= 0.00 && $st_timing <= 0.30){
                                $right_margin = $right_margin + $st_timing * 100 * 3;

                            }elseif($st_timing >= 0.31 && $st_timing <= 0.90){
                                $right_margin = $right_margin + (0.30 * 100 * 3) + (($st_timing - 0.30 ) * 100);
                            
                            }elseif($st_timing >= 0.91 ){
                                $right_margin = 400;
                            }
                        }else{
                            $right_margin = 400;
                        }
                    }

                    $kekka_array[$item->TEIBAN]['right_margin'] = $right_margin;

                }
                ksort($kekka_array);
                $data['kekka_array'] = $kekka_array;
            }

            $neer_kekka_race_number = $this->KyogiCommon->getNeerKekkaRaceNumber($jyo,$target_date);
            $data['neer_kekka_race_number'] = $neer_kekka_race_number;
        
        }

        return $data;
    }


    public function vpower($data){
        

        //VPower取得
        $yoso_syussou = $this->TbGambooYosoSensyu->getOneRaceRecord((int)$data['jyo'],$data['target_date'],$data['race_num']);

        $yoso_syussou_array=[];
        $overall_poin_sum = (double)0;
        if($yoso_syussou){
            foreach($yoso_syussou as $item){
                $yoso_syussou_array[$item->TEIBAN] = $item;
                $overall_poin_sum += (double)$item->OVERALL_POINT;
            }
        }

        //ポイント合算して、パーセント表示に成形と同時に降順に順位づけ
        $score_array=[];
        foreach($yoso_syussou_array as $teiban => $item){
            $yoso_syussou_array[$teiban]->PERCENT = number_format(( (double)$item->OVERALL_POINT / $overall_poin_sum ) * 100 ,1);
            $score_array[$teiban] = number_format(( (double)$item->OVERALL_POINT / $overall_poin_sum ) * 100 ,1);
        }

        arsort($score_array);

        $lank_array=[];
        $count_lank=1;
        $disp_lank=1;
        $temp_score=(double)999;
        foreach($score_array as $teiban => $item){
            if($item != $temp_score){
                $disp_lank = $count_lank;
            }

            $lank_array[$teiban] = $disp_lank;

            $count_lank++;
        }


        $data['yoso_syussou_array'] = $yoso_syussou_array;
        $data['lank_array'] = $lank_array;

        
        $yoso_race = $this->TbGambooYosoRace->getOneRaceFirstRecord($data['jyo'],$data['target_date'],$data['race_num']);

        $yoso_race_sanrentan=[];
        $yoso_race_nirentan=[];
        if($yoso_race){
            for($count=1;$count<=6;$count++){
                $prop_name = "SANRENTAN_".$count;
                $yoso_race_sanrentan[] = str_split($yoso_race->$prop_name);
                
                $prop_name = "NIRENTAN_".$count;
                $yoso_race_nirentan[] = str_split($yoso_race->$prop_name);
            }
        }

        $data['yoso_race_sanrentan'] = $yoso_race_sanrentan;
        $data['yoso_race_nirentan'] = $yoso_race_nirentan;


        $ozz_3rentan = $this->TbBoatOzz->getRecord($data['jyo'],$data['target_date'],$data['race_num'], 3);    
        $bairitu_3rentan = [];
        foreach($ozz_3rentan as $item){
            $bairitu_3rentan[$item->NUMBER1][$item->NUMBER2][$item->NUMBER3] = $item->BAIRITU;
        }
        $data['bairitu_3rentan'] = $bairitu_3rentan;

        $ozz_2rentan = $this->TbBoatOzz->getRecord($data['jyo'],$data['target_date'],$data['race_num'], 1);
        $bairitu_2rentan = [];
        foreach($ozz_2rentan as $item){
            $bairitu_2rentan[$item->NUMBER1][$item->NUMBER3] = $item->BAIRITU;
        }
        $data['bairitu_2rentan'] = $bairitu_2rentan;


        $kekka_info = $this->TbBoatKekkainfo->getFirstRecordByPK($data['jyo'],$data['target_date'],$data['race_num']);
        $data['kekka_info'] = $kekka_info;

        return $data;
    }



    public function cyoku($request,$target_date,$race_num,$tomorrow_flg){
        $data = [];

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');

        
        $data['jyo'] = $jyo;
        $data['race_num'] = $race_num;
        
        
        //改めて開催データ取り直し
        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$target_date);
        $data['kaisai_master'] = $kaisai_master;

        $chushi_junen = $this->ChushiJunen->getFirstRecordForFront($jyo,$target_date);
        $data['chushi_junen'] = $chushi_junen;

        $data['tomorrow_flg'] = $tomorrow_flg;
        $data['target_date'] = $target_date;



        if($kaisai_master){
               
            $syussou = $this->KyogiCommon->create_syussou_array($jyo,$target_date,$race_num);    
            $data['syussou'] = $syussou;

            //動画情報取得
            $vod_manegiment = $this->TbVodManagement->getFirstRecordByMovieId($jyo,$target_date."99".$jyo.str_pad($race_num, 2, '0', STR_PAD_LEFT));
            $data['vod_manegiment'] = $vod_manegiment;

            $tyokuzen = $this->TbBoatTyokuzen->getRecentTenjiRecord($jyo,$target_date);
            $neer_start_exhibition = $tyokuzen->RACE_NUMBER ?? 0;
            $data['neer_start_exhibition'] = $neer_start_exhibition;
            
            //欠場情報
            $ozz_info = $this->TbBoatOzzinfo->getFirstRecordByPK($jyo,$target_date,$race_num);
            $ozz_info_array = [1=>'',2=>'',3=>'',4=>'',5=>'',6=>''];
            if($ozz_info){
                for($i = 1; $i <= 6; $i++){
                    $prop_name = "KETUJO_HENKAN".$i;
                    $ozz_info_array[$i] = $ozz_info->$prop_name;
                }
            }

            $data['ozz_info_array'] = $ozz_info_array;
            
            $tyokuzen = $this->TbBoatTyokuzen->getRecordByPK($jyo, $target_date, $race_num);
            $tyokuzen_array = [];
            foreach($tyokuzen as $item){
                $tyokuzen_array[$item->TEIBAN]['record'] = $item;

                $right_margin = 110;
                $st_timing = (double)$item->ST_TIMING;

                if($item->ST_JICO_CD == 'F'){
                    //フライング
                    if($st_timing >= 0.11){
                        $right_margin = 40;
                    }else{
                        $right_margin = $right_margin - $st_timing * 100 * 2;
                    }
                }elseif($item->ST_JICO_CD == 'L'){
                    //出遅れ何もしない
                    $right_margin = 400;
                }else{
                    if($st_timing >= 0.00 && $st_timing <= 0.30){
                        $right_margin = $right_margin + $st_timing * 100 * 2 * 2;

                    }elseif($st_timing >= 0.31 && $st_timing <= 0.90){
                        $right_margin = $right_margin + (0.50 * 100 * 2 * 2) + (($st_timing - 0.50 ) * 100 * 2);
                    
                    }elseif($st_timing >= 0.91 ){
                        $right_margin = 400;
                    }
                }

                $tyokuzen_array[$item->TEIBAN]['right_margin'] = $right_margin;

                //部品交換情報を成形
                $buhin = "";
                for($i=1;$i<=8;$i++){
                    $prop_buhin = "BUHIN".$i;
                    $prop_buhin_kosuu = "BUHIN_KOSUU".$i;
                    if($item->$prop_buhin){
                        if($buhin){
                            $buhin .= "、".$item->$prop_buhin.'×'.((int)$item->$prop_buhin_kosuu);
                        }else{
                            $buhin .= $item->$prop_buhin.'×'.((int)$item->$prop_buhin_kosuu);
                        }
                    }
                }
                $tyokuzen_array[$item->TEIBAN]['buhin'] = $buhin;

                //今節平均STを算出
                $avg = $this->TbBoatKekka->getStAvg($item->TOUBAN,$jyo,$kaisai_master->開始日付,$target_date);
                $tyokuzen_array[$item->TEIBAN]['st_avg'] = $avg->avg;
            }

            $data['tyokuzen_array'] = $tyokuzen_array;

            $tyokuzen_cg = $this->TbBoatTyokuzen->getRecordForCg($jyo, $target_date, $race_num);
            $data['tyokuzen_cg'] = $tyokuzen_cg;

            
            //日付表示用
            $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);
            $data['race_header'] = $race_header;
            
            //締切日作成
            $prop_name = "SIMEKIRI_JIKOKU".$race_num."R";
            $shimekiri_jikoku = $race_header->$prop_name;
            $data['shimekiri_jikoku'] = $shimekiri_jikoku;

        }
        
        return $data;
    }


    public function race_num_button($request){
        $data = [];

        
        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;
        $target_time = date('Hi');
        $target_time = '1100';
        $data['target_time'] = $target_time;

        {
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

            //開催マスターがある場合、開催日リスト作成
            $temp_date = $kaisai_master->開始日付;
            $end_date = $kaisai_master->終了日付;
            $kaisai_date_list = [];
            while($temp_date <= $end_date){
                $kaisai_date_list[] = $temp_date;
                $temp_date = date("Ymd",strtotime('+1 day',strtotime($temp_date)));
            }

            $data['kaisai_master'] = $kaisai_master;
            $data['race_header'] = $race_header;
            $data['target_date'] = $target_date;
            $data['kaisai_date_list'] = $kaisai_date_list;
            $data['tomorrow_flg'] = $tomorrow_flg;
        }

        {
            $neer_ozz_race_number = $this->KyogiCommon->getNeerOzzRaceNumber($jyo,$target_date,$target_time);
            $neer_kekka_race_number = $this->KyogiCommon->getNeerKekkaRaceNumber($jyo,$target_date);
            $neer_kekka_race_number_tfinfo = $this->KyogiCommon->getNeerKekkaRaceNumberTfinfo($jyo,$target_date);
            
            $data['neer_ozz_race_number'] = $neer_ozz_race_number;
            $data['neer_kekka_race_number'] = $neer_kekka_race_number;
            $data['neer_kekka_race_number_tfinfo'] = $neer_kekka_race_number_tfinfo;
        }

        return $data;
    }
    
    
    public function create_sp_tokuten($request){
        $data = [];

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;
        
        $target_time = date('Hi');
        $target_time = '1100';
        $data['target_time'] = $target_time;

        {
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
            
            $yesterday_date = date('Ymd',strtotime('-1 day',strtotime($target_date)));

            //開催マスターがある場合、開催日リスト作成
            $temp_date = $kaisai_master->開始日付;
            $end_date = $kaisai_master->終了日付;
            $kaisai_date_list = [];
            $kaisai_date_label_list = [];
            $day_count = 1;
            while($temp_date <= $end_date){
                $kaisai_date_list[] = $temp_date;
                if($temp_date == $kaisai_master->開始日付){
                    $kaisai_date_label_list[$temp_date] = '初日';
                }elseif($temp_date == $kaisai_master->終了日付){
                    $kaisai_date_label_list[$temp_date] = '最終日';
                }else{
                    $kaisai_date_label_list[$temp_date] = $day_count.'日目';
                }
                $temp_date = date("Ymd",strtotime('+1 day',strtotime($temp_date)));
                $day_count++;
            }

            $data['kaisai_master'] = $kaisai_master;
            $data['race_header'] = $race_header;
            $data['target_date'] = $target_date;
            $data['kaisai_date_list'] = $kaisai_date_list;
            $data['kaisai_date_label_list'] = $kaisai_date_label_list;
            $data['tomorrow_flg'] = $tomorrow_flg;
            $data['yesterday_date'] = $yesterday_date;
        }

        {
            $tokutenritu = $this->TbTsuTokutenritu->getRankingByDate($target_date);
            $data['tokutenritu'] = $tokutenritu;

            $syussou = $this->TbBoatSyussou->getRecordBkDate($jyo,$target_date);
            $syussou_array = [];
            foreach($syussou as $item){
                if(!isset($syussou_array[$item->TOUBAN])){
                    $syussou_array[$item->TOUBAN] = $item;
                }
            }
            $data['syussou_array'] = $syussou_array;
        }

        return $data;
    }

    public function Top_MidokotoYosokekka($request){
        $data = [];

        $jyo = $request->input('jyo') ?? config('const.JYO_CODE');
        $data['jyo'] = $jyo;

        {
            //処理対象日を判定
            $tomorrow_flg = false;
            $today_date = $request->input('yd') ?? date('Ymd');
            $today_date = '20210619';
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

            //開催マスターがある場合、開催日リスト作成
            $temp_date = $kaisai_master->開始日付;
            $end_date = $kaisai_master->終了日付;
            $kaisai_date_list = [];
            $kaisai_date_list_date_onry = [];
            $day_count = 1;
            while($temp_date <= $end_date){
                if($temp_date == $kaisai_master->開始日付){
                    $kaisai_date_list[$temp_date] = '初日';
                }elseif($temp_date == $kaisai_master->終了日付){
                    $kaisai_date_list[$temp_date] = '最終日';
                }else{
                    $kaisai_date_list[$temp_date] = $day_count.'日目';
                }
                $kaisai_date_list_date_onry[] = $temp_date;
                $temp_date = date("Ymd",strtotime('+1 day',strtotime($temp_date)));
                $day_count++;
            }
            krsort($kaisai_date_list);

            $data['kaisai_master'] = $kaisai_master;
            $data['race_header'] = $race_header;
            $data['target_date'] = $target_date;
            $data['today_date'] = $today_date;
            $data['tomorrow_date'] = $tomorrow_date;
            $data['kaisai_date_list'] = $kaisai_date_list;
            $data['tomorrow_flg'] = $tomorrow_flg;
        }

        //pcと異なり、今節レースを全て収集
        $yoso_highlight = $this->TbTsuYosoHighlight->getRecordForFront($jyo,$kaisai_date_list_date_onry,$is_preview = false);        
        $data['yoso_highlight'] = $yoso_highlight;


        $yoso = $this->TbTsuYoso->getPushing($target_date);
        $data['yoso'] = $yoso;


        //的中率処理
        
        if($kaisai_master){
            $neer_kekka_race_number = $this->KyogiCommon->getNeerKekkaRaceNumber($jyo,$target_date);

            if($tomorrow_flg){

                $strYosoDate = $today_date;
            
            }else{

                // 表示日付の直近レース結果が12レースの時
                if($neer_kekka_race_number == 12){
                    
                    //表示日付含む
                    $strYosoDate = $today_date;
                
                }else{

                    //前日分まで
                    $strYosoDate = date('Ymd',strtotime('-1 day',strtotime($today_date)));

                }

            }

            $data['strYosoDate'] = $strYosoDate;

            $strAryYosoKumi = [];

            if($kaisai_master->開始日付 <= $strYosoDate){
            //初日以降で集計できる時
            
                $yoso_tenji = $this->TbTsuYosoTenji->getRecordForTekichuritsu($kaisai_master->開始日付 , $strYosoDate);

                foreach($yoso_tenji as $item){
                    
                    //$type は1=本命か2=穴かの選択
                    $type = 1;
                    $strAryYosoKumi[$item->TARGET_DATE][$item->RACE_NUM][$type] = $this->FuncYosoTekichuritsu->FuncYosoTekichuritsu($item,$type);

                    $type = 2;
                    $strAryYosoKumi[$item->TARGET_DATE][$item->RACE_NUM][$type] = $this->FuncYosoTekichuritsu->FuncYosoTekichuritsu($item,$type);
                }
        

                $kekka_info = $this->TbBoatKekkainfo->getRecordForTekichuritsu($jyo,$kaisai_master->開始日付 , $strYosoDate);
                $data['kekka_info'] = $kekka_info;

                //記者予想の的中カウント
                $kisya_hit_count = 0;
                $kisya_mansyu_count = 0;
                
                foreach($kekka_info as $test_key => $kekka_info_row){

                    if(strpos($kekka_info_row->SANRENTAN1,'MS') === false){
                    
                    
                        if(isset($strAryYosoKumi[$kekka_info_row->TARGET_DATE][$kekka_info_row->RACE_NUMBER])){

                            $target_kumi = $strAryYosoKumi[$kekka_info_row->TARGET_DATE][$kekka_info_row->RACE_NUMBER];


                            foreach($target_kumi as $type => $kumi_array){
                                //大穴と本命
                                
                                foreach($kumi_array as $kumi_array2){
                                    //予想の数
                                    
                                    foreach($kumi_array2 as $kumi){
                                        //予想一つから想定される当選パターン

                                        //予想をすべてチェック
                                        if($kekka_info_row->SANRENTAN1 == $kumi){
                                            $kisya_hit_count++;
                                            
                                            //万舟チェック
                                            if($kekka_info_row->SANRENTAN_MONEY1 >= 10000){
                                                $kisya_mansyu_count++;
                                            }
                                        }

                                        //同着だった場合
                                        if($kekka_info_row->SANRENTAN2 == $kumi){
                                            $kisya_hit_count++;

                                            //万舟チェック
                                            if($kekka_info_row->SANRENTAN_MONEY2 >= 10000){
                                                $kisya_mansyu_count++;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                //var_dump($kisya_hit_count);
                //var_dump(count($kekka_info));


                //v-power予想
                $v_power = $this->TbGambooYosoRace->getRecordForTekichuritsu($jyo,$kaisai_master->開始日付 , $strYosoDate);
                
                $strAryYosoKumi = [];
                foreach($v_power as $item){

                    //6カラム集計
                    $row = [];
                    for($i=1;$i<=6;$i++){
                        $prop_name = 'SANRENTAN_'.$i;
                        $row[] = $item->$prop_name;
                    }

                    $strAryYosoKumi[$item->TARGET_DATE][$item->RACE_NUMBER] = $row;
                }
                
                
                //vpower予想の的中カウント
                $v_power_hit_count = 0;
                $v_power_mansyu_count = 0;
                foreach($kekka_info as $kekka_info_row){
                    if(isset($strAryYosoKumi[$kekka_info_row->TARGET_DATE][$kekka_info_row->RACE_NUMBER])){ 

                        $target_kumi = $strAryYosoKumi[$kekka_info_row->TARGET_DATE][$kekka_info_row->RACE_NUMBER];

                        foreach($target_kumi as $kumi){
                            //予想をすべてチェック

                            if($kekka_info_row->SANRENTAN1 == $kumi){
                                $v_power_hit_count++;

                                //万舟チェック
                                if($kekka_info_row->SANRENTAN_MONEY1 >= 10000){
                                    $v_power_mansyu_count++;
                                }
                            }

                            //同着だった場合
                            if($kekka_info_row->SANRENTAN2 == $kumi){
                                $v_power_hit_count++;

                                //万舟チェック
                                if($kekka_info_row->SANRENTAN_MONEY2 >= 10000){
                                    $v_power_mansyu_count++;
                                }
                            }
                            
                        }

                    }
                }
                
                $data['kisya_hit_count'] = $kisya_hit_count;
                $data['v_power_hit_count'] = $v_power_hit_count;
                $data['kisya_mansyu_count'] = $kisya_mansyu_count;
                $data['v_power_mansyu_count'] = $v_power_mansyu_count;

                //表示可否判定
                //記者かV_powerどちらか確率10%を超えていたら、表示
                if( ($kisya_hit_count / count($kekka_info)) >= 0.1 || ($v_power_hit_count / count($kekka_info)) >= 0.1 ){
                    $data['hit_count_display_flg'] = true; 
                }else{
                    $data['hit_count_display_flg'] = false; 
                }

                //万舟の場合、一つでもあれば
                if($kisya_mansyu_count || $v_power_mansyu_count){
                    $data['mansyu_count_display_flg'] = true; 
                }else{
                    $data['mansyu_count_display_flg'] = false; 
                }
        
            }

        }
    
        

        return $data;
    }

}