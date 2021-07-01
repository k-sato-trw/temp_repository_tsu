<?php

namespace App\Http\Controllers\ExportHtml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\ExportKaisaiService;
use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;

class ExportKaisaiController extends Controller
{
    public $_service;
    public $KaisaiMaster;
    public $TbBoatRaceheader;


    public function __construct(
        ExportKaisaiService $ExportKaisaiService,
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader
    ){
        $this->_service = $ExportKaisaiService;
        $this->KaisaiMaster = $KaisaiMaster;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
    }

    public function js_info(Request $request)
    {

        //サービスクラスで処理。
        $data = $this->_service->js_info($request);

        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/Jsinfo.js', view('front.kaisai.js_info',$data));
        return '書き出し完了<br><a href="/asp/kyogi/09/pc/Jsinfo.js">/asp/kyogi/09/pc/Jsinfo.js</a>';

    }

    public function syussou01(Request $request)
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
                $data = $this->_service->syussou01($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT).'_'.$data['target_date'];
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/syusso01/syusso01'.$file_name.'.htm', view('front.kaisai.syussou01',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/syusso01/syusso01'.$file_name.'.htm">/asp/kyogi/09/pc/syusso01/syusso01'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            return '処理対象データなし';
        }
        
    }

    public function syussou02(Request $request)
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
                $data = $this->_service->syussou02($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT).'_'.$data['target_date'];
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/syusso02/syusso02'.$file_name.'.htm', view('front.kaisai.syussou02',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/syusso02/syusso02'.$file_name.'.htm">/asp/kyogi/09/pc/syusso02/syusso02'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            return '処理対象データなし';
        }
        
    }

    public function syussou03(Request $request)
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
                $data = $this->_service->syussou03($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT).'_'.$data['target_date'];
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/syusso03/syusso03'.$file_name.'.htm', view('front.kaisai.syussou03',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/syusso03/syusso03'.$file_name.'.htm">/asp/kyogi/09/pc/syusso03/syusso03'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            return '処理対象データなし';
        }
        
    }

    
    public function syussou04(Request $request)
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
                $data = $this->_service->syussou04($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT).'_'.$data['target_date'];
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/syusso04/syusso04'.$file_name.'.htm', view('front.kaisai.syussou04',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/syusso04/syusso04'.$file_name.'.htm">/asp/kyogi/09/pc/syusso04/syusso04'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            return '処理対象データなし';
        }
        
    }

    public function odds01(Request $request)
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
                $data = $this->_service->odds01($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT).'_'.$data['target_date'];
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/odds01/odds01'.$file_name.'.htm', view('front.kaisai.odds01',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/odds01/odds01'.$file_name.'.htm">/asp/kyogi/09/pc/odds01/odds01'.$file_name.'.htm</a><br>';
            }

            return $message;
        }else{
            return '処理対象データなし';
        }
        
    }

    public function odds02(Request $request)
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
                $data = $this->_service->odds02($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT).'_'.$data['target_date'];
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/odds02/odds02'.$file_name.'.htm', view('front.kaisai.odds02',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/odds02/odds02'.$file_name.'.htm">/asp/kyogi/09/pc/odds02/odds02'.$file_name.'.htm</a><br>';
            }

            return $message;
        }else{
            return '処理対象データなし';
        }
        
    }

    public function odds03(Request $request)
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
                $data = $this->_service->odds03($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT).'_'.$data['target_date'];
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/odds03/odds03'.$file_name.'.htm', view('front.kaisai.odds03',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/odds03/odds03'.$file_name.'.htm">/asp/kyogi/09/pc/odds03/odds03'.$file_name.'.htm</a><br>';
            }

            return $message;
        }else{
            return '処理対象データなし';
        }
        
    }
    
    public function odds04(Request $request)
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
                $data = $this->_service->odds04($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT).'_'.$data['target_date'];
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/odds04/odds04'.$file_name.'.htm', view('front.kaisai.odds04',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/odds04/odds04'.$file_name.'.htm">/asp/kyogi/09/pc/odds04/odds04'.$file_name.'.htm</a><br>';
            }

            return $message;
        }else{
            return '処理対象データなし';
        }
        
    }
    
    
    public function yoso01(Request $request)
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
                $data = $this->_service->yoso01($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT).'_'.$data['target_date'];
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/yoso01/yoso01'.$file_name.'.htm', view('front.kaisai.yoso01',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/yoso01/yoso01'.$file_name.'.htm">/asp/kyogi/09/pc/yoso01/yoso01'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            return '処理対象データなし';
        }
        
    }

    public function yoso01st(Request $request)
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
                //サービスクラスで処理。 予想とスタート展示を合体
                $data = $this->_service->yoso01($request,$target_date,$race_num,$tomorrow_flg);
                $data_st = $this->_service->st01($request,$target_date,$race_num,$tomorrow_flg);

                $data['ozz_info_array'] = $data_st['ozz_info_array'];
                $data['tyokuzen_array'] = $data_st['tyokuzen_array'];

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT).'_'.$data['target_date'];
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/yoso01st/yoso01st'.$file_name.'.htm', view('front.kaisai.yoso01st',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/yoso01st/yoso01st'.$file_name.'.htm">/asp/kyogi/09/pc/yoso01st/yoso01st'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            return '処理対象データなし';
        }
        
    }


    public function yoso02(Request $request)
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
                //サービスクラスで処理。出走とvpawor合体
                $data = $this->_service->syussou01($request,$target_date,$race_num,$tomorrow_flg);
                $data = $this->_service->vpower($data);

                

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT).'_'.$data['target_date'];
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/yoso02/yoso02'.$file_name.'.htm', view('front.kaisai.yoso02',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/yoso02/yoso02'.$file_name.'.htm">/asp/kyogi/09/pc/yoso02/yoso02'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            return '処理対象データなし';
        }
        
    }

    

    public function st01(Request $request)
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
                $data = $this->_service->st01($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT).'_'.$data['target_date'];
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/st01/st01'.$file_name.'.htm', view('front.kaisai.st01',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/st01/st01'.$file_name.'.htm">/asp/kyogi/09/pc/st01/st01'.$file_name.'.htm</a><br>';

            }

            return $message;
        }else{
            return '処理対象データなし';
        }
        
    }

    public function kekka01(Request $request)
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
                $data = $this->_service->kekka01($request,$target_date,$race_num,$tomorrow_flg);

                $file_name = str_pad($data['race_num'], 2, '0', STR_PAD_LEFT).'_'.$data['target_date'];
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/kekka01/kekka01'.$file_name.'.htm', view('front.kaisai.kekka01',$data));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/kekka01/kekka01'.$file_name.'.htm">/asp/kyogi/09/pc/kekka01/kekka01'.$file_name.'.htm</a><br>';


            }

            return $message;
        }else{
            return '処理対象データなし';
        }
        
    }

/*
    public function syussou_kinkyo(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->syussou_kinkyo($request);

        $file_name = $data['jyo'].str_pad($data['race_num'], 2, '0', STR_PAD_LEFT);
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/tbk/textvision/text/'.$file_name.'syussou_kinkyo.htm', view('front.text_vision.syussou_kinkyo',$data));
        return '書き出し完了<br><a href="/asp/tbk/textvision/text/'.$file_name.'syussou_kinkyo.htm">/asp/tbk/textvision/text/'.$file_name.'syussou_kinkyo.htm</a>';
            
    }

    public function syussou_motor(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->syussou_motor($request);

        $file_name = $data['jyo'].str_pad($data['race_num'], 2, '0', STR_PAD_LEFT);
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/tbk/textvision/text/'.$file_name.'syussou_motor.htm', view('front.text_vision.syussou_motor',$data));
        return '書き出し完了<br><a href="/asp/tbk/textvision/text/'.$file_name.'syussou_motor.htm">/asp/tbk/textvision/text/'.$file_name.'syussou_motor.htm</a>';
            
    }
*/

    public function replay_list(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->replay_list($request);

        $message = "";
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/replay_list.htm', view('front.kaisai.replay_list',$data));
        $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/replay_list.htm">/asp/kyogi/09/pc/replay_list.htm</a><br>';
        
        File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/JSreplay.js', view('front.kaisai.js_replay',$data));
        $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/JSreplay.js">/asp/kyogi/09/pc/JSreplay.js</a><br>';
            
        return $message;
    }

    public function race_telop(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->race_telop($request);

        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/race_telop.htm', view('front.kaisai.race_telop',$data));
        return '書き出し完了<br><a href="/asp/kyogi/09/pc/race_telop.htm">/asp/kyogi/09/pc/race_telop.htm</a><br>';
    }
    
    public function race_sub(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->race_sub($request);

        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/race_sub.htm', view('front.kaisai.race_sub',$data));
        return '書き出し完了<br><a href="/asp/kyogi/09/pc/race_sub.htm">/asp/kyogi/09/pc/race_sub.htm</a><br>';
    }
    
    public function race_data(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->race_data($request);

        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/race_data.htm', view('front.kaisai.race_data',$data));
        return '書き出し完了<br><a href="/asp/kyogi/09/pc/race_data.htm">/asp/kyogi/09/pc/race_data.htm</a><br>';
    }

    
    public function race_movie(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->race_movie($request);

        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/race_movie.htm', view('front.kaisai.race_movie',$data));
        return '書き出し完了<br><a href="/asp/kyogi/09/pc/race_movie.htm">/asp/kyogi/09/pc/race_movie.htm</a><br>';
    }
    
    
    public function race_movie_reload(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->race_movie($request);

        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/race_movie_reload.htm', view('front.kaisai.race_movie_reload',$data));
        return '書き出し完了<br><a href="/asp/kyogi/09/pc/race_movie_reload.htm">/asp/kyogi/09/pc/race_movie_reload.htm</a><br>';
    }

     
    public function kaisai_index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->kaisai_index($request);

        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/tsu/kaisai/kaisaiindex.htm', view('front.kaisai.kaisai_index',$data));
        return '書き出し完了<br><a href="/asp/tsu/kaisai/kaisaiindex.htm">/asp/tsu/kaisai/kaisaiindex.htm</a><br>';
    }


    
    public function setu_kekka(Request $request)
    {
        $jyo = config('const.JYO_CODE');

        //処理対象日を判定
        $today_date = date('Ymd');
        $today_date = '20210525';

        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween($jyo,$today_date);
        
        if($kaisai_master){
            $message = "開催処理<br>";

            //ファイル名生成の為、開催日数カウント
            $tmp_date = $kaisai_master->開始日付;
            $end_date = $kaisai_master->終了日付;
            $date_count = 1;
            $file_name_date_count = 0;
            $date_list = [];
            while($tmp_date <= $end_date){
                if($today_date == $tmp_date){
                    $file_name_date_count = $date_count;
                }

                if($tmp_date == $kaisai_master->開始日付){
                    $date_list[$tmp_date] = "初日";
                }elseif($tmp_date == $kaisai_master->終了日付){
                    $date_list[$tmp_date] = "最終日";
                }else{
                    $date_list[$tmp_date] = $date_count."日目";
                }
                $tmp_date = date("Ymd",strtotime("+1 day",strtotime($tmp_date)));

                $date_count++;
            }

            //開催データがある場合、本日分のみ出力
            $data = $this->_service->setu_kekka($request);
            //ソースを受け取り静的に書き出し処理
            File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/setu_kekka/setu_kekka0'.$file_name_date_count.'.htm', view('front.kaisai.setu_kekka',$data));
            $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/setu_kekka/setu_kekka0'.$file_name_date_count.'.htm">/asp/kyogi/09/pc/setu_kekka/setu_kekka0'.$file_name_date_count.'.htm</a><br>';

            //js出力
            $data['date_list'] = $date_list;
            File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/setu_kekka/setu_kekka.js', view('front.kaisai.setu_kekka_js',$data));
            $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/setu_kekka/setu_kekka.js">/asp/kyogi/09/pc/setu_kekka/setu_kekka.js</a><br>';

            return $message;
        }else{
            //開催データが無い場合、からデータを8つ出力
            $message = "非開催処理<br>";
            for($date_count = 1;$date_count<=8;$date_count++){
                //ソースを受け取り静的に書き出し処理
                File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/setu_kekka/setu_kekka0'.$date_count.'.htm', view('front.kaisai.setu_kekka_nodata',[]));
                $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/setu_kekka/setu_kekka0'.$date_count.'.htm">/asp/kyogi/09/pc/setu_kekka/setu_kekka0'.$date_count.'.htm</a><br>';   
            }


            return $message;

        }
        
    }

    public function create_pc_tokuten(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->create_pc_tokuten($request);

        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/yosen.htm', view('front.kaisai.yosen',$data));
        return '書き出し完了<br><a href="/asp/kyogi/09/pc/yosen.htm">/asp/kyogi/09/pc/yosen.htm</a><br>';
    }

}