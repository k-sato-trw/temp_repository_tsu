<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Services\Admin\AssenService;

class AssenController extends AdminController
{
    public $_service;


    public function __construct(
        Route $route,
        AssenService $AssenService
    ){
        parent::__construct($route);
        $this->_service = $AssenService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        return view('admin.assen.index',$data);
    }


    public function view($touban)
    {
        //サービスクラスで処理。
        $data = $this->_service->view($touban);
        return view('admin.assen.view',$data);
    }


    public function create(Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->create($request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.assen.create',$data);
    }


    public function edit($id ,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->edit($id ,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.assen.edit',$data);
    }


    public function create_assen($touban,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->create_assen($touban,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.assen.create_assen',$data);
    }

    public function delete($touban)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->delete($touban);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }

    public function delete_assen($id)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->delete_assen($id);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }


}