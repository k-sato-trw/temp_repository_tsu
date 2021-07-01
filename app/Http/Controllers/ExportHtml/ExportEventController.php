<?php

namespace App\Http\Controllers\ExportHtml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\ExportEventService;

class ExportEventController extends Controller
{
    public $_service;


    public function __construct(
        ExportEventService $ExportEventService
    ){
        $this->_service = $ExportEventService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/04event/04event.htm', view('front.event.index',$data));
        return '書き出し完了<br><a href="/04event/04event.htm">/04event/04event.htm</a>';
    }


}