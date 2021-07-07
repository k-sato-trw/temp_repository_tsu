<?php

namespace App\Http\Controllers\ExportHtml\Sp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
//処理が膨大なので一旦PCのサービスと共有
use App\Services\ExportHtml\ExportMotorService;

class ExportSpMotorController extends Controller
{
    public $_service;


    public function __construct(
        ExportMotorService $ExportMotorService
    ){
        $this->_service = $ExportMotorService;
    }


    public function motor(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->motor($request);
        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/sp/02motor/02motor.htm', view('front.sp.motor.motor',$data));
        return '書き出し完了<br><a href="/asp/kyogi/09/sp/02motor/02motor.htm">/asp/kyogi/09/sp/02motor/02motor.htm</a>';
    }


}