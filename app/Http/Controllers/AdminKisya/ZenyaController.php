<?php

namespace App\Http\Controllers\AdminKisya;

use App\Http\Controllers\AdminKisyaController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Services\AdminKisya\ZenyaService;
use App\Services\ExportHtml\ExportKaisaiService;
use App\Services\ExportHtml\Sp\ExportSpKaisaiService;

class ZenyaController extends AdminKisyaController
{
    public $_service;
    public $ExportKaisaiService;
    public $ExportSpKaisaiService;


    public function __construct(
        Route $route,
        ZenyaService $ZenyaService,
        ExportKaisaiService $ExportKaisaiService,
        ExportSpKaisaiService $ExportSpKaisaiService
    ){
        parent::__construct($route);
        $this->_service = $ZenyaService;
        $this->ExportKaisaiService = $ExportKaisaiService;
        $this->ExportSpKaisaiService = $ExportSpKaisaiService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        return view('admin_kisya.zenya.index',$data);
    }


    public function upsert(Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->upsert($request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        //return view('admin_kisya.zenya.edit',$data);
    }


    public function change_appear_flg_all(Request $request)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->change_appear_flg_all($request);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
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
        $data = $this->ExportKaisaiService->yoso01($request,$request->input('target_date'),$request->input('race_num'),false,true);
        return view('front.kaisai.yoso01',$data);
    }

    public function preview_sp(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->ExportSpKaisaiService->yoso_kisha_eve($request,$request->input('target_date'),$request->input('race_num'),false,true);
        return view('front.sp.kaisai.yoso_kisha_eve_preview',$data);
    }


}