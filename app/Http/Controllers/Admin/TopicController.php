<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Services\Admin\TopicService;
use App\Services\ExportHtml\ExportTopDisplayService;
use App\Services\ExportHtml\Sp\ExportSpTopDisplayService;

class TopicController extends AdminController
{
    public $_service;


    public function __construct(
        Route $route,
        TopicService $TopicService
    ){
        parent::__construct($route);
        $this->_service = $TopicService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        return view('admin.topic.index',$data);
    }


    public function create(Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->create($request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.topic.create',$data);
    }


    public function edit($id,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->edit($id,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.topic.edit',$data);
    }


    public function delete($id)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->delete($id);
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