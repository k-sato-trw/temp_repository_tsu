<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Services\Admin\EventFanMasterService;

class EventFanMasterController extends AdminController
{
    public $_service;


    public function __construct(
        Route $route,
        EventFanMasterService $EventFanMasterService
    ){
        parent::__construct($route);
        $this->_service = $EventFanMasterService;
    }


    public function index_view($id,Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($id,$request);
        return view('admin.event_fan_master.index',$data);
    }


    public function create($id,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->create($id,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.event_fan_master.create',$data);
    }


    public function edit($id,$sub_id,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->edit($id,$sub_id,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.event_fan_master.edit',$data);
    }


    public function delete($id,$sub_id)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->delete($id,$sub_id);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }

    public function create_event_fan($id,$sub_id,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->create_event_fan($id,$sub_id,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.event_fan_master.create_event_fan',$data);
    }


    public function edit_event_fan($id,$sub_id,$third_id,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->edit_event_fan($id,$sub_id,$third_id,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.event_fan_master.edit_event_fan',$data);
    }


    public function delete_event_fan($id,$sub_id,$third_id)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->delete_event_fan($id,$sub_id,$third_id);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }


}