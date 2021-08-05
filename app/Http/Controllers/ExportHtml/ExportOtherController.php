<?php

namespace App\Http\Controllers\ExportHtml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\ExportOtherService;

class ExportOtherController extends Controller
{
    public $_service;


    public function __construct(
        ExportOtherService $ExportOtherService
    ){
        $this->_service = $ExportOtherService;
    }


    public function syusso_jumper(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->syusso_jumper($request);

        if($data['kaisai_master']){
            //ソースを受け取り静的に書き出し処理
            File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/syusso_jumper.htm', view('front.other.syusso_jumper',$data));
            return '書き出し完了<br><a href="/asp/kyogi/09/pc/syusso_jumper.htm">/asp/kyogi/09/pc/syusso_jumper.htm</a>';
        }
    }

    public function sitemap_jumper(Request $request)
    {
        //サービスクラスで処理。
        //$data = $this->_service->sitemap_jumper($request);
        $data = [];

        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/sitemap_jumper.htm', view('front.other.sitemap_jumper',$data));
        return '書き出し完了<br><a href="/asp/kyogi/09/pc/sitemap_jumper.htm">/asp/kyogi/09/pc/sitemap_jumper.htm</a>';
        
    }


}