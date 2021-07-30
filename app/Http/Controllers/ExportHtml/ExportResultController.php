<?php

namespace App\Http\Controllers\ExportHtml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\ExportResultService;

class ExportResultController extends Controller
{
    public $_service;


    public function __construct(
        ExportResultService $ExportResultService
    ){
        $this->_service = $ExportResultService;
    }


    public function result(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->result($request);
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/03result_tsu/03result_tsu.htm', view('front.result.result',$data));
        return '書き出し完了<br><a href="/03result_tsu/03result_tsu.htm">/03result_tsu/03result_tsu.htm</a>';
    }


}