<?php

namespace App\Http\Controllers\ExportHtml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\ExportDemeService;

class ExportDemeController extends Controller
{
    public $_service;


    public function __construct(
        ExportDemeService $ExportDemeService
    ){
        $this->_service = $ExportDemeService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/02deme/02deme.htm', view('front.deme.index',$data));
        return '書き出し完了<br><a href="/02deme/02deme.htm">/02deme/02deme.htm</a>';
    }


}