<?php

namespace App\Http\Controllers\AdminSekosya;

use App\Http\Controllers\AdminSekosyaController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Services\AdminSekosya\SekosyaKinkyuKokutiService;
use App\Services\Front\FrontKinkyuService;

class SekosyaKinkyuKokutiController extends AdminSekosyaController
{
    public $_service;


    public function __construct(
        Route $route,
        SekosyaKinkyuKokutiService $SekosyaKinkyuKokutiService
    ){
        parent::__construct($route);
        $this->_service = $SekosyaKinkyuKokutiService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        return view('admin_sekosya.sekosya_kinkyu_kokuti.index',$data);
    }


    public function view($id)
    {
        //サービスクラスで処理。
        $data = $this->_service->view($id);
        return view('admin_sekosya.sekosya_kinkyu_kokuti.view',$data);
    }


    public function create(Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->create($request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin_sekosya.sekosya_kinkyu_kokuti.create',$data);
    }


    public function edit($id,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->edit($id,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin_sekosya.sekosya_kinkyu_kokuti.edit',$data);
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


    public function preview_pc($id,FrontKinkyuService $_service ,Request $request)
    {
        //サービスクラスで処理。
        $request->merge([
            'device' => 0,
            'preview_id' => $id,
        ]);
        $data = $_service->message($request,true);
        return view('front.kinkyu.message',$data);
    }

   
    public function preview_sp($id,FrontKinkyuService $_service ,Request $request)
    {
        //サービスクラスで処理。
        $request->merge([
            'device' => 1,
            'preview_id' => $id,
        ]);
        $data = $_service->message($request,true);
        return view('front.kinkyu.message',$data);
    }


}