<?php

namespace App\Http\Controllers\ExportHtml\Sp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\Sp\ExportSpSuimenService;

class ExportSpSuimenController extends Controller
{
    public $_service;


    public function __construct(
        ExportSpSuimenService $ExportSpSuimenService
    ){
        $this->_service = $ExportSpSuimenService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/sp/02suimen/02suimen.htm', view('front.sp.suimen.index',$data));
        return '書き出し完了<br><a href="/sp/02suimen/02suimen.htm">/sp/02suimen/02suimen.htm</a>';
    }


}