<?php

namespace App\Http\Controllers\ExportHtml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\ExportPdfService;

class ExportPdfController extends Controller
{
    public $_service;


    public function __construct(
        ExportPdfService $ExportPdfService
    ){
        $this->_service = $ExportPdfService;
    }


    public function yoso_pdf(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->yoso_pdf($request);

        if($data['write_flg']){
            //ソースを受け取り静的に書き出し処理
            File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pdf_tsu/'.$data['target_date'].'.htm', view('front.pdf.yoso_pdf',$data));
            return '書き出し完了<br><a href="/asp/kyogi/09/pdf_tsu/'.$data['target_date'].'.htm">/asp/kyogi/09/pdf_tsu/'.$data['target_date'].'.htm</a>';
        }else{
            return '書き出し条件が成立しないため、処理を中断しました';
        }
    }


}