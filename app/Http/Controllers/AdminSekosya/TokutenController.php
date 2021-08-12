<?php

namespace App\Http\Controllers\AdminSekosya;

use App\Http\Controllers\AdminSekosyaController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Services\AdminSekosya\TokutenService;
use App\Services\ExportHtml\ExportKaisaiService;
use App\Services\ExportHtml\Sp\ExportSpKaisaiService;

class TokutenController extends AdminSekosyaController
{
    public $_service;


    public function __construct(
        Route $route,
        TokutenService $TokutenService
    ){
        parent::__construct($route);
        $this->_service = $TokutenService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->index($request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin_sekosya.tokuten.index',$data);
    }

    public function change_appear_flg($appear_flg,Request $request)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->change_appear_flg($appear_flg,$request);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }

    
    public function preview_pc(ExportKaisaiService $_service ,Request $request)
    {
        //サービスクラスで処理。
        $data = $_service->create_pc_tokuten($request,true);
        return view('front.kaisai.yosen',$data);
    }

    public function preview_sp(ExportSpKaisaiService $_service ,Request $request)
    {
        //サービスクラスで処理。
        $data = $_service->create_sp_tokuten($request,true);
        return view('front.sp.kaisai.yosen',$data);
    }

}