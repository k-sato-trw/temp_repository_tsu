<?php

namespace App\Http\Controllers\AdminKisya;

use App\Http\Controllers\AdminKisyaController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Services\AdminKisya\MessageService;

class MessageController extends AdminKisyaController
{
    public $_service;


    public function __construct(
        Route $route,
        MessageService $MessageService
    ){
        parent::__construct($route);
        $this->_service = $MessageService;
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


}