<?php

namespace App\Http\Controllers\ExportHtml\Sp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\Sp\ExportSpDemeService;

class ExportSpDemeController extends Controller
{
    public $_service;


    public function __construct(
        ExportSpDemeService $ExportSpDemeService
    ){
        $this->_service = $ExportSpDemeService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/sp/02deme/02deme.htm', view('front.sp.deme.index',$data));
        return '書き出し完了<br><a href="/sp/02deme/02deme.htm">/sp/02deme/02deme.htm</a>';
    }


}