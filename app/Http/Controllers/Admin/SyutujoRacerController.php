<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Services\Admin\SyutujoRacerService;

class SyutujoRacerController extends AdminController
{
    public $_service;


    public function __construct(
        Route $route,
        SyutujoRacerService $SyutujoRacerService
    ){
        parent::__construct($route);
        $this->_service = $SyutujoRacerService;
    }


    public function view($id)
    {
        //サービスクラスで処理。
        $data = $this->_service->view($id);
        return view('admin.syutujo_racer.view',$data);
    }


    public function create($id ,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->create($id ,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.syutujo_racer.create',$data);
    }


    public function edit($id,$touban ,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->edit($id,$touban ,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.syutujo_racer.edit',$data);
    }


    public function delete($id,$touban)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->delete($id,$touban);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }


    public function delete_yoso($id,$touban)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->delete_yoso($id,$touban);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }


    public function update_yoso($id,Request $request)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->update_yoso($id,$request);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }


    public function upsert_syutujo($id,Request $request)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->upsert_syutujo($id,$request);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }
}