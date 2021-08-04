<?php

namespace App\Http\Controllers\ExportHtml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\ExportPlaybackService;

class ExportPlaybackController extends Controller
{
    public $_service;


    public function __construct(
        ExportPlaybackService $ExportPlaybackService
    ){
        $this->_service = $ExportPlaybackService;
    }


    public function play_back(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->play_back($request);
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/03play_b/03play_b.htm', view('front.play_back.play_back',$data));
        return '書き出し完了<br><a href="/03play_b/03play_b.htm">/03play_b/03play_b.htm</a>';
    }


}