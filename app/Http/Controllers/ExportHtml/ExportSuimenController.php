<?php

namespace App\Http\Controllers\ExportHtml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\ExportSuimenService;

class ExportSuimenController extends Controller
{
    public $_service;


    public function __construct(
        ExportSuimenService $ExportSuimenService
    ){
        $this->_service = $ExportSuimenService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/02suimen/02suimen.htm', view('front.suimen.index',$data));
        return '書き出し完了<br><a href="/02suimen/02suimen.htm">/02suimen/02suimen.htm</a>';
    }


}