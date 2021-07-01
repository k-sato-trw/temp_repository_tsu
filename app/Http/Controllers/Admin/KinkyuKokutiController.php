<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Services\Admin\KinkyuKokutiService;

class KinkyuKokutiController extends AdminController
{
    public $_service;


    public function __construct(
        Route $route,
        KinkyuKokutiService $KinkyuKokutiService
    ){
        parent::__construct($route);
        $this->_service = $KinkyuKokutiService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        return view('admin.kinkyu_kokuti.index',$data);
    }


    public function view($id)
    {
        //サービスクラスで処理。
        $data = $this->_service->view($id);
        return view('admin.kinkyu_kokuti.view',$data);
    }


    public function create(Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->create($request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.kinkyu_kokuti.create',$data);
    }


    public function edit($id,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->edit($id,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.kinkyu_kokuti.edit',$data);
    }


    public function delete($id)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->delete($id);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }


}