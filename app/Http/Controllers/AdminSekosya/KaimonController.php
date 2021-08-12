<?php

namespace App\Http\Controllers\AdminSekosya;

use App\Http\Controllers\AdminSekosyaController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Services\AdminSekosya\KaimonService;
//プレビュー
use App\Services\ExportHtml\ExportTopDisplayService;
use App\Services\ExportHtml\Sp\ExportSpTopDisplayService;

class KaimonController extends AdminSekosyaController
{
    public $_service;


    public function __construct(
        Route $route,
        KaimonService $KaimonService
    ){
        parent::__construct($route);
        $this->_service = $KaimonService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        return view('admin_sekosya.kaimon.index',$data);
    }


    public function create($target_date,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->create($target_date ,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin_sekosya.kaimon.create',$data);
    }


    public function edit($target_date ,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->edit($target_date ,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin_sekosya.kaimon.edit',$data);
    }


    public function delete(Request $request)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->delete($request);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }

    
    public function change_appear_flg($target_year_month,$appear_flg)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->change_appear_flg($target_year_month,$appear_flg);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }

    public function preview_pc(ExportTopDisplayService $_service ,Request $request)
    {
        //サービスクラスで処理。
        $data = $_service->index($request,true);
        return view('front.top_display.index',$data);
    }

   
    public function preview_sp(ExportSpTopDisplayService $_service ,Request $request)
    {
        //サービスクラスで処理。
        $data = $_service->index($request,true);
        return view('front.sp.top_display.index',$data);
    }


}