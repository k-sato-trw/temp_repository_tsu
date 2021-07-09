<?php

namespace App\Http\Controllers\ExportHtml\Sp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\Sp\ExportSpKaisaiService;
use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;

class ExportSpKaisaiController extends Controller
{
    public $_service;
    public $KaisaiMaster;
    public $TbBoatRaceheader;


    public function __construct(
        ExportSpKaisaiService $ExportSpKaisaiService,
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader
    ){
        $this->_service = $ExportSpKaisaiService;
        $this->KaisaiMaster = $KaisaiMaster;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
    }


    
    public function syusso_hyoka(Request $request)
    {

        //アクセスされた時点での日付から処理対象日を割り出し、その日付の12レース分処理(多分)
        //締切時間を過ぎた場合は、処理対象外になるようだが、明確な条件を確かめる時間が無いので、その日一日の処理は継続するかも・・
        $jyo = config('const.JYO_CODE');

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

            

        }

        $message = "";
        if($kaisai_master){
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。
                $data = $this->_service->syusso_hyoka($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/syusso_hyoka'.$file_name.'.htm', view('front.sp.kaisai.syusso_hyoka',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/syusso_hyoka'.$file_name.'.htm">/asp/kyogi/09/sp/syusso_hyoka'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。

                $file_name = str_pad($race_num, 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/syusso_hyoka'.$file_name.'.htm', view('front.sp.kaisai.hikaisai',['title'=>'選手評価']));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/syusso_hyoka'.$file_name.'.htm">/asp/kyogi/09/sp/syusso_hyoka'.$file_name.'.htm</a><br>';


            }

            return $message;
        }
        
    }
    

    public function syusso_seiseki(Request $request)
    {

        //アクセスされた時点での日付から処理対象日を割り出し、その日付の12レース分処理(多分)
        //締切時間を過ぎた場合は、処理対象外になるようだが、明確な条件を確かめる時間が無いので、その日一日の処理は継続するかも・・
        $jyo = config('const.JYO_CODE');

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

            

        }

        $message = "";
        if($kaisai_master){
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。
                $data = $this->_service->syusso_seiseki($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/syusso_seiseki'.$file_name.'.htm', view('front.sp.kaisai.syusso_seiseki',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/syusso_seiseki'.$file_name.'.htm">/asp/kyogi/09/sp/syusso_seiseki'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。

                $file_name = str_pad($race_num, 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/syusso_seiseki'.$file_name.'.htm', view('front.sp.kaisai.hikaisai',['title'=>'今節成績']));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/syusso_seiseki'.$file_name.'.htm">/asp/kyogi/09/sp/syusso_seiseki'.$file_name.'.htm</a><br>';


            }

            return $message;
        }
        
    }

    public function syusso_all_past(Request $request)
    {

        //アクセスされた時点での日付から処理対象日を割り出し、その日付の12レース分処理(多分)
        //締切時間を過ぎた場合は、処理対象外になるようだが、明確な条件を確かめる時間が無いので、その日一日の処理は継続するかも・・
        $jyo = config('const.JYO_CODE');

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

            

        }

        $message = "";
        if($kaisai_master){
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。
                $data = $this->_service->syusso_all_past($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/syusso_allpast'.$file_name.'.htm', view('front.sp.kaisai.syusso_all_past',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/syusso_allpast'.$file_name.'.htm">/asp/kyogi/09/sp/syusso_allpast'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。

                $file_name = str_pad($race_num, 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/syusso_allpast'.$file_name.'.htm', view('front.sp.kaisai.hikaisai',['title'=>'全国過去2節']));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/syusso_allpast'.$file_name.'.htm">/asp/kyogi/09/sp/syusso_allpast'.$file_name.'.htm</a><br>';


            }

            return $message;
        }
        
    }

    public function syusso_here_past(Request $request)
    {

        //アクセスされた時点での日付から処理対象日を割り出し、その日付の12レース分処理(多分)
        //締切時間を過ぎた場合は、処理対象外になるようだが、明確な条件を確かめる時間が無いので、その日一日の処理は継続するかも・・
        $jyo = config('const.JYO_CODE');

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

            

        }

        $message = "";
        if($kaisai_master){
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。
                $data = $this->_service->syusso_here_past($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/syusso_herepast'.$file_name.'.htm', view('front.sp.kaisai.syusso_here_past',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/syusso_herepast'.$file_name.'.htm">/asp/kyogi/09/sp/syusso_herepast'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。

                $file_name = str_pad($race_num, 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/syusso_herepast'.$file_name.'.htm', view('front.sp.kaisai.hikaisai',['title'=>'当地過去2節']));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/syusso_herepast'.$file_name.'.htm">/asp/kyogi/09/sp/syusso_herepast'.$file_name.'.htm</a><br>';


            }

            return $message;
        }
        
    }

    public function syusso_motor(Request $request)
    {

        //アクセスされた時点での日付から処理対象日を割り出し、その日付の12レース分処理(多分)
        //締切時間を過ぎた場合は、処理対象外になるようだが、明確な条件を確かめる時間が無いので、その日一日の処理は継続するかも・・
        $jyo = config('const.JYO_CODE');

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

            

        }

        $message = "";
        if($kaisai_master){
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。
                $data = $this->_service->syusso_motor($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/syusso_motor'.$file_name.'.htm', view('front.sp.kaisai.syusso_motor',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/syusso_motor'.$file_name.'.htm">/asp/kyogi/09/sp/syusso_motor'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。

                $file_name = str_pad($race_num, 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/syusso_motor'.$file_name.'.htm', view('front.sp.kaisai.hikaisai',['title'=>'モーター履歴']));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/syusso_motor'.$file_name.'.htm">/asp/kyogi/09/sp/syusso_motor'.$file_name.'.htm</a><br>';


            }

            return $message;
        }
        
    }

    

    public function syusso_wakuritsu(Request $request)
    {

        //アクセスされた時点での日付から処理対象日を割り出し、その日付の12レース分処理(多分)
        //締切時間を過ぎた場合は、処理対象外になるようだが、明確な条件を確かめる時間が無いので、その日一日の処理は継続するかも・・
        $jyo = config('const.JYO_CODE');

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

            

        }

        $message = "";
        if($kaisai_master){
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。
                $data = $this->_service->syusso_wakuritsu($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/syusso_wakuritsu'.$file_name.'.htm', view('front.sp.kaisai.syusso_wakuritsu',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/syusso_wakuritsu'.$file_name.'.htm">/asp/kyogi/09/sp/syusso_wakuritsu'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。

                $file_name = str_pad($race_num, 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/syusso_wakuritsu'.$file_name.'.htm', "<!---データ非表示--->");
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/syusso_wakuritsu'.$file_name.'.htm">/asp/kyogi/09/sp/syusso_wakuritsu'.$file_name.'.htm</a><br>';


            }

            return $message;
        }
        
    }
    

    public function yoso_kisha_eve(Request $request)
    {

        //アクセスされた時点での日付から処理対象日を割り出し、その日付の12レース分処理(多分)
        //締切時間を過ぎた場合は、処理対象外になるようだが、明確な条件を確かめる時間が無いので、その日一日の処理は継続するかも・・
        $jyo = config('const.JYO_CODE');

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

            

        }

        $message = "";
        if($kaisai_master){
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。
                $data = $this->_service->yoso_kisha_eve($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/yoso_kishaeve'.$file_name.'.htm', view('front.sp.kaisai.yoso_kisha_eve',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/yoso_kishaeve'.$file_name.'.htm">/asp/kyogi/09/sp/yoso_kishaeve'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。

                $file_name = str_pad($race_num, 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/yoso_kishaeve'.$file_name.'.htm', view('front.sp.kaisai.hikaisai',['title'=>'記者前夜版']));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/yoso_kishaeve'.$file_name.'.htm">/asp/kyogi/09/sp/yoso_kishaeve'.$file_name.'.htm</a><br>';


            }

            return $message;
        }
        
    }


    public function yoso_kisha_tenji(Request $request)
    {

        //アクセスされた時点での日付から処理対象日を割り出し、その日付の12レース分処理(多分)
        //締切時間を過ぎた場合は、処理対象外になるようだが、明確な条件を確かめる時間が無いので、その日一日の処理は継続するかも・・
        $jyo = config('const.JYO_CODE');

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

            

        }

        $message = "";
        if($kaisai_master){
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。
                $data = $this->_service->yoso_kisha_tenji($request,$target_date,$race_num,$tomorrow_flg);
                $data_cyoku = $this->_service->cyoku($request,$target_date,$race_num,$tomorrow_flg);

                $data['tyokuzen_array'] = $data_cyoku['tyokuzen_array'];
                $data['tyokuzen_cg'] = $data_cyoku['tyokuzen_cg'];

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/yoso_kishatenji'.$file_name.'.htm', view('front.sp.kaisai.yoso_kisha_tenji',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/yoso_kishatenji'.$file_name.'.htm">/asp/kyogi/09/sp/yoso_kishatenji'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。

                $file_name = str_pad($race_num, 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/yoso_kishatenji'.$file_name.'.htm', view('front.sp.kaisai.hikaisai',['title'=>'記者展示直後']));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/yoso_kishatenji'.$file_name.'.htm">/asp/kyogi/09/sp/yoso_kishatenji'.$file_name.'.htm</a><br>';


            }

            return $message;
        }
        
    }

    public function yoso_vpower(Request $request)
    {

        //アクセスされた時点での日付から処理対象日を割り出し、その日付の12レース分処理(多分)
        //締切時間を過ぎた場合は、処理対象外になるようだが、明確な条件を確かめる時間が無いので、その日一日の処理は継続するかも・・
        $jyo = config('const.JYO_CODE');

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

            

        }

        $message = "";
        if($kaisai_master){
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。
                $data = $this->_service->syusso_seiseki($request,$target_date,$race_num,$tomorrow_flg);
                $data = $this->_service->vpower($data);


                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/yoso_vpower'.$file_name.'.htm', view('front.sp.kaisai.yoso_vpower',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/yoso_vpower'.$file_name.'.htm">/asp/kyogi/09/sp/yoso_vpower'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。

                $file_name = str_pad($race_num, 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/yoso_vpower'.$file_name.'.htm', view('front.sp.kaisai.hikaisai',['title'=>'V-POWER']));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/yoso_vpower'.$file_name.'.htm">/asp/kyogi/09/sp/yoso_vpower'.$file_name.'.htm</a><br>';


            }

            return $message;
        }
        
    }


    public function odds_3rentanpuku(Request $request)
    {

        //アクセスされた時点での日付から処理対象日を割り出し、その日付の12レース分処理(多分)
        //締切時間を過ぎた場合は、処理対象外になるようだが、明確な条件を確かめる時間が無いので、その日一日の処理は継続するかも・・
        $jyo = config('const.JYO_CODE');

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

        }

        $message = "";
        if($kaisai_master){
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。
                $data = $this->_service->odds_3rentanpuku($request,$target_date,$race_num,$tomorrow_flg);


                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/odds_3rentanpuku'.$file_name.'.htm', view('front.sp.kaisai.odds_3rentanpuku',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/odds_3rentanpuku'.$file_name.'.htm">/asp/kyogi/09/sp/odds_3rentanpuku'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。

                $file_name = str_pad($race_num, 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/odds_3rentanpuku'.$file_name.'.htm', view('front.sp.kaisai.hikaisai',['title'=>'3連単・複']));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/odds_3rentanpuku'.$file_name.'.htm">/asp/kyogi/09/sp/odds_3rentanpuku'.$file_name.'.htm</a><br>';


            }

            return $message;
        }
        
    }

    public function odds_2rentanpuku(Request $request)
    {

        //アクセスされた時点での日付から処理対象日を割り出し、その日付の12レース分処理(多分)
        //締切時間を過ぎた場合は、処理対象外になるようだが、明確な条件を確かめる時間が無いので、その日一日の処理は継続するかも・・
        $jyo = config('const.JYO_CODE');

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

        }

        $message = "";
        if($kaisai_master){
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。
                $data = $this->_service->odds_2rentanpuku($request,$target_date,$race_num,$tomorrow_flg);


                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/odds_2rentanpuku'.$file_name.'.htm', view('front.sp.kaisai.odds_2rentanpuku',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/odds_2rentanpuku'.$file_name.'.htm">/asp/kyogi/09/sp/odds_2rentanpuku'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。

                $file_name = str_pad($race_num, 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/odds_2rentanpuku'.$file_name.'.htm', view('front.sp.kaisai.hikaisai',['title'=>'2連単・複・単勝・複勝・拡連複']));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/odds_2rentanpuku'.$file_name.'.htm">/asp/kyogi/09/sp/odds_2rentanpuku'.$file_name.'.htm</a><br>';


            }

            return $message;
        }
        
    }

    public function kekka_detail(Request $request)
    {

        //アクセスされた時点での日付から処理対象日を割り出し、その日付の12レース分処理(多分)
        //締切時間を過ぎた場合は、処理対象外になるようだが、明確な条件を確かめる時間が無いので、その日一日の処理は継続するかも・・
        $jyo = config('const.JYO_CODE');

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

        }

        $message = "";
        if($kaisai_master){
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。
                $data = $this->_service->kekka_detail($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/Kekka_Detail'.$file_name.'.htm', view('front.sp.kaisai.kekka_detail',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/Kekka_Detail'.$file_name.'.htm">/asp/kyogi/09/sp/Kekka_Detail'.$file_name.'.htm</a><br>';

            }

            return $message;
        }else{
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。

                $file_name = str_pad($race_num, 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/Kekka_Detail'.$file_name.'.htm', view('front.sp.kaisai.hikaisai',['title'=>'結果詳細']));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/Kekka_Detail'.$file_name.'.htm">/asp/kyogi/09/sp/Kekka_Detail'.$file_name.'.htm</a><br>';

            }

            return $message;
        }
        
    }

    

    public function cyoku(Request $request)
    {

        //アクセスされた時点での日付から処理対象日を割り出し、その日付の12レース分処理(多分)
        //締切時間を過ぎた場合は、処理対象外になるようだが、明確な条件を確かめる時間が無いので、その日一日の処理は継続するかも・・
        $jyo = config('const.JYO_CODE');

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

            

        }

        $message = "";
        if($kaisai_master){
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。
                $data = $this->_service->cyoku($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/Cyoku'.$file_name.'.htm', view('front.sp.kaisai.cyoku',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/Cyoku'.$file_name.'.htm">/asp/kyogi/09/sp/Cyoku'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            for($race_num = 1;$race_num <= 12;$race_num++){
                //サービスクラスで処理。

                $file_name = str_pad($race_num, 2, '0', STR_PAD_LEFT);
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/Cyoku'.$file_name.'.htm', view('front.sp.kaisai.hikaisai',['title'=>'直前情報＆スタ展']));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/sp/Cyoku'.$file_name.'.htm">/asp/kyogi/09/sp/Cyoku'.$file_name.'.htm</a><br>';


            }

            return $message;
        }
        
    }


    public function race_num_button(Request $request)
    {

        //サービスクラスで処理。
        $data = $this->_service->race_num_button($request);

        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/racenum_btn.htm', view('front.sp.kaisai.race_num_button',$data));
        return '書き出し完了<br><a href="/asp/kyogi/09/sp/racenum_btn.htm">/asp/kyogi/09/sp/racenum_btn.htm</a>';

    }

    public function create_sp_tokuten(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->create_sp_tokuten($request);

        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/yosen.htm', view('front.sp.kaisai.yosen',$data));
        return '書き出し完了<br><a href="/asp/kyogi/09/sp/yosen.htm">/asp/kyogi/09/sp/yosen.htm</a><br>';
    }

}