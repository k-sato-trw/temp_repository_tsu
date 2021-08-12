<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Services\Admin\CalendarService;
//プレビュー
use App\Services\ExportHtml\ExportCalService;
use App\Services\Front\Sp\SpCalService;

class CalendarController extends AdminController
{
    public $_service;


    public function __construct(
        Route $route,
        CalendarService $CalendarService
    ){
        parent::__construct($route);
        $this->_service = $CalendarService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        return view('admin.calendar.index',$data);
    }


    public function create($mode, $target_date,$target_line ,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->create($mode, $target_date,$target_line ,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.calendar.'.$mode.'_create',$data);
    }


    public function edit($mode, $id ,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->edit($mode, $id ,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.calendar.'.$mode.'_edit',$data);
    }


    public function delete($id)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->delete($id);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }

    
    public function change_appear_flg(Request $request)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->change_appear_flg($request);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }


    public function upsert_month_info(Request $request)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->upsert_month_info($request);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }


    public function preview_pc(ExportCalService $_service ,Request $request)
    {
        //サービスクラスで処理。
        $data = $_service->index($request);
        return view('front.cal.index',$data);
    }
    

    public function preview_sp(SpCalService $_service ,Request $request)
    {
        //サービスクラスで処理。
        $data = $_service->index($request);
        return view('front.sp.cal.index',$data);
    }


}