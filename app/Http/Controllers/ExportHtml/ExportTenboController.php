<?php

namespace App\Http\Controllers\ExportHtml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\ExportTenboService;

class ExportTenboController extends Controller
{
    public $_service;


    public function __construct(
        ExportTenboService $ExportTenboService
    ){
        $this->_service = $ExportTenboService;
    }


    public function index(Request $request)
    {
        $id = $request->input('ID') ?? false;
        
        if($id){
            //サービスクラスで処理。
            $data = $this->_service->index($request);

            //ソースを受け取り静的に書き出し処理
            File::put(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Tenbo/09/PC/t'.$id.'.htm', view('front.tenbo.index',$data));
            return '書き出し完了<br><a href="/asp/htmlmade/Race/Tenbo/09/PC/t'.$id.'.htm">/asp/htmlmade/Race/Tenbo/09/PC/t'.$id.'.htm</a>';
        }else{
            return '不正な操作です。処理を中断します。';
        }
    }

    public function select_js_create(Request $request)
    {
        $message = "";
        //サービスクラスで処理。
        $data = $this->_service->select_js_create($request,$device='pc');
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Tenbo/09/PC/09select.js', view('front.tenbo.select_js_create',$data));
        $message .= '書き出し完了<br><a href="/asp/htmlmade/Race/Tenbo/09/PC/09select.js">/asp/htmlmade/Race/Tenbo/09/PC/09select.js</a><br>';

        
        $data = $this->_service->select_js_create($request,$device='sp');
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Tenbo/09/SP/09select.js', view('front.sp.tenbo.select_js_create',$data));
        $message .= '書き出し完了<br><a href="/asp/htmlmade/Race/Tenbo/09/SP/09select.js">/asp/htmlmade/Race/Tenbo/09/SP/09select.js</a><br>';
        
        return $message;
    }


}