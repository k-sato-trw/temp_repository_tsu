<?php

namespace App\Http\Controllers\ExportHtml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\Front\FrontInfoService;

class ExportInfoController extends Controller
{
    public $_service;


    public function __construct(
        FrontInfoService $FrontInfoService
    ){
        $this->_service = $FrontInfoService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/info/info.htm', view('front.info.index',$data));
        return '書き出し完了<br><a href="/info/info.htm">/info/info.htm</a>';
    }


}