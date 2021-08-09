<?php

namespace App\Http\Controllers\AdminKisya;

use App\Http\Controllers\AdminKisyaController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Services\AdminKisya\DeashiService;

class DeashiController extends AdminKisyaController
{
    public $_service;


    public function __construct(
        Route $route,
        DeashiService $DeashiService
    ){
        parent::__construct($route);
        $this->_service = $DeashiService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        return view('admin_kisya.deashi.index',$data);
    }


    public function view()
    {
        //サービスクラスで処理。
        $data = $this->_service->view();
        return view('admin_kisya.deashi.view',$data);
    }


    public function create(Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->create($request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin_kisya.deashi.create',$data);
    }


    public function upsert(Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->upsert($request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        //return view('admin_kisya.deashi.edit',$data);
    }


    public function delete(Request $request)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->delete($request);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }

    public function change_appear_flg(Request $request)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->change_appear_flg($request);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }


}