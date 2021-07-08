<?php

namespace App\Http\Controllers\ExportHtml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\ExportCalService;

class ExportCalController extends Controller
{
    public $_service;


    public function __construct(
        ExportCalService $ExportCalService
    ){
        $this->_service = $ExportCalService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/01cal/01cal.htm', view('front.cal.index',$data));
        return '書き出し完了<br><a href="/01cal/01cal.htm">/01cal/01cal.htm</a>';
    }


}