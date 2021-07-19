<?php

namespace App\Http\Controllers\ExportHtml\Sp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\Sp\ExportSpTenboService;

class ExportSpTenboController extends Controller
{
    public $_service;


    public function __construct(
        ExportSpTenboService $ExportSpTenboService
    ){
        $this->_service = $ExportSpTenboService;
    }


    public function index(Request $request)
    {
        $id = $request->input('ID') ?? false;
        
        if($id){
            //サービスクラスで処理。
            $data = $this->_service->index($request);

            //ソースを受け取り静的に書き出し処理
            File::put(config('const.EXPORT_PATH').'/asp/htmlmade/Race/Tenbo/09/SP/t'.$id.'.htm', view('front.sp.tenbo.index',$data));
            return '書き出し完了<br><a href="/asp/htmlmade/Race/Tenbo/09/SP/t'.$id.'.htm">/asp/htmlmade/Race/Tenbo/09/SP/t'.$id.'.htm</a>';
        }else{
            return '不正な操作です。処理を中断します。';
        }
    }

}