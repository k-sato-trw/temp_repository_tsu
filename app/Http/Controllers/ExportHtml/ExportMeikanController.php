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


}