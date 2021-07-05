<?php

namespace App\Http\Controllers\ExportHtml\Sp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\Sp\ExportSpMeikanService;

class ExportSpMeikanController extends Controller
{
    public $_service;


    public function __construct(
        ExportSpMeikanService $ExportSpMeikanService
    ){
        $this->_service = $ExportSpMeikanService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/sp/06meikan/06meikan.htm', view('front.sp.meikan.index',$data));
        return '書き出し完了<br><a href="/sp/06meikan/06meikan.htm">/sp/06meikan/06meikan.htm</a>';
    }


}