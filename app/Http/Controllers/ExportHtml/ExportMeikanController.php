<?php

namespace App\Http\Controllers\ExportHtml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\ExportMeikanService;

class ExportMeikanController extends Controller
{
    public $_service;


    public function __construct(
        ExportMeikanService $ExportMeikanService
    ){
        $this->_service = $ExportMeikanService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/06meikan/06meikan.htm', view('front.meikan.index',$data));
        return '書き出し完了<br><a href="/06meikan/06meikan.htm">/06meikan/06meikan.htm</a>';
    }


    public function racer_data_create(Request $request)
    {
        $message = "";

        //サービスクラスで処理。
        $data = $this->_service->racer_data_create($request);
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/htmlmade/tsu/06meikan/racer_data.htm', view('front.meikan.racer_data_create',$data));
        $message .= '書き出し完了<br><a href="/asp/htmlmade/tsu/06meikan/racer_data.htm">/asp/htmlmade/tsu/06meikan/racer_data.htm</a><br>';

        foreach($data['touban_array'] as $touban => $item){

            $data['touban'] = $touban;
            $data['target_touban_array'] = $item;

            File::put(config('const.EXPORT_PATH').'/asp/htmlmade/tsu/06meikan/racer_data/'.$touban.'.htm', view('front.meikan.detail',$data));
            $message .= '書き出し完了<br><a href="/asp/htmlmade/tsu/06meikan/racer_data/'.$touban.'.htm">/asp/htmlmade/tsu/06meikan/racer_data/'.$touban.'.htm</a><br>';
            
            File::put(config('const.EXPORT_PATH').'/asp/htmlmade/tsu/sp/06meikan/racer_data/'.$touban.'.htm', view('front.sp.meikan.detail',$data));
            $message .= '書き出し完了<br><a href="/asp/htmlmade/tsu/sp/06meikan/racer_data/'.$touban.'.htm">/asp/htmlmade/tsu/sp/06meikan/racer_data/'.$touban.'.htm</a><br>';
            
        }

        return $message;
    }

}