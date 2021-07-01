<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Services\Admin\MailMagazineService;

class MailMagazineController extends AdminController
{
    public $_service;


    public function __construct(
        Route $route,
        MailMagazineService $MailMagazineService
    ){
        parent::__construct($route);
        $this->_service = $MailMagazineService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        return view('admin.mail_magazine.index',$data);
    }


    public function create($target_date,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->create($target_date,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.mail_magazine.create',$data);
    }


    public function edit($target_date,$id,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->edit($target_date,$id,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.mail_magazine.edit',$data);
    }


    public function delete($target_date,$id)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->delete($target_date,$id);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }


}