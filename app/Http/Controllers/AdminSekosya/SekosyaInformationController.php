<?php

namespace App\Http\Controllers\AdminSekosya;

use App\Http\Controllers\AdminSekosyaController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Services\AdminSekosya\SekosyaInformationService;
use App\Services\Front\FrontInfoService;
use App\Services\Front\Sp\SpInfoService;

class SekosyaInformationController extends AdminSekosyaController
{
    public $_service;


    public function __construct(
        Route $route,
        SekosyaInformationService $SekosyaInformationService
    ){
        parent::__construct($route);
        $this->_service = $SekosyaInformationService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        return view('admin_sekosya.sekosya_information.index',$data);
    }


    public function create(Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->create($request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin_sekosya.sekosya_information.create',$data);
    }


    public function edit($id,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->edit($id,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin_sekosya.sekosya_information.edit',$data);
    }


    public function delete($id)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->delete($id);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }

    
    public function change_appear_flg($id,$appear_flg)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->change_appear_flg($id,$appear_flg);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }

    public function preview_pc(FrontInfoService $_service ,Request $request)
    {
        //サービスクラスで処理。
        $data = $_service->index($request,true);
        return view('front.info.index',$data);
    }

   
    public function preview_sp(SpInfoService $_service ,Request $request)
    {
        //サービスクラスで処理。
        $data = $_service->index($request,true);
        return view('front.sp.info.index',$data);
    }


}