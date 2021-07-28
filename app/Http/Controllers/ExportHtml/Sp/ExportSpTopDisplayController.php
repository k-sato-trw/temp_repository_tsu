<?php

namespace App\Http\Controllers\ExportHtml\Sp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\Sp\ExportSpTopDisplayService;

class ExportSpTopDisplayController extends Controller
{
    public $_service;


    public function __construct(
        ExportSpTopDisplayService $ExportSpTopDisplayService
    ){
        $this->_service = $ExportSpTopDisplayService;
    }

    public function index(Request $request)
    {

        //サービスクラスで処理。
        $data = $this->_service->index($request);

        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/sp/index.htm', view('front.sp.top_display.index',$data));
        return '書き出し完了<br><a href="/sp/index.htm">/sp/index.htm</a>';

    }

    public function index_race_info(Request $request)
    {

        //サービスクラスで処理。
        $data = $this->_service->index_race_info($request);

        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/tsu/sp/topdisplay/indexRaceInfo.htm', view('front.sp.top_display.index_race_info',$data));
        return '書き出し完了<br><a href="/asp/tsu/sp/topdisplay/indexRaceInfo.htm">/asp/tsu/sp/topdisplay/indexRaceInfo.htm</a>';

    }


}