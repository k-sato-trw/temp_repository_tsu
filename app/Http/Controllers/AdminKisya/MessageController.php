<?php

namespace App\Http\Controllers\AdminKisya;

use App\Http\Controllers\AdminKisyaController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Services\AdminKisya\MessageService;
use App\Services\ExportHtml\ExportKaisaiService;
use App\Services\Front\Sp\SpKyogiService;

class MessageController extends AdminKisyaController
{
    public $_service;
    public $ExportKaisaiService;
    public $SpKyogiService;


    public function __construct(
        Route $route,
        MessageService $MessageService,
        ExportKaisaiService $ExportKaisaiService,
        SpKyogiService $SpKyogiService
    ){
        parent::__construct($route);
        $this->_service = $MessageService;
        $this->ExportKaisaiService = $ExportKaisaiService;
        $this->SpKyogiService = $SpKyogiService;
    }


    public function edit(Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->edit($request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin_kisya.message.edit',$data);
    }

    
    public function change_appear_flg(Request $request)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->change_appear_flg($request);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }

    
    public function preview_pc(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->ExportKaisaiService->kaisai_index($request,true);
        return view('front.kaisai.kaisai_index',$data);
    }

    public function preview_sp(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->SpKyogiService->index($request,true);
        return view('front.sp.kaisai.index',$data);
    }


}