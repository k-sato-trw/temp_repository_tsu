<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Services\Admin\RaceIndexService;
use App\Services\ExportHtml\ExportTenboService;
use App\Services\ExportHtml\Sp\ExportSpTenboService;
use App\Services\ExportHtml\ExportSyutujoService;
use App\Services\ExportHtml\Sp\ExportSpSyutujoService;

class RaceIndexController extends AdminController
{
    public $_service;


    public function __construct(
        Route $route,
        RaceIndexService $RaceIndexService
    ){
        parent::__construct($route);
        $this->_service = $RaceIndexService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        return view('admin.race_index.index',$data);
    }


    public function create( Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->create( $request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.race_index.create',$data);
    }


    public function edit($id ,Request $request)
    {
        //サービスクラスで処理。getの場合はアサイン変数作成。postの場合は成否問わずリダイレクト
        $data = $this->_service->edit($id ,$request);
        if(isset($data['redirect_url'])){
            return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
        }
        return view('admin.race_index.edit',$data);
    }


    public function delete($id)
    {
        //サービスクラスで処理。処理後リダイレクト
        $data = $this->_service->delete($id);
        return redirect($data['redirect_url'])->with('flash_message', $data['redirect_message']);
    }

    public function preview_tenbo_pc($id ,ExportTenboService $_service ,Request $request)
    {
        $request->merge(['ID'=>$id]);
        $data = $_service->index($request);
        return view('front.tenbo.index',$data);
    }

    public function preview_tenbo_sp($id ,ExportSpTenboService $_service ,Request $request)
    {
        $request->merge(['ID'=>$id]);
        $data = $_service->index($request);
        return view('front.sp.tenbo.index',$data);
    }

    public function preview_syutujo_pc($id ,ExportSyutujoService $_service ,Request $request)
    {
        $request->merge(['ID'=>$id]);
        $data = $_service->index($request);
        return view('front.syutujo.index',$data);
    }

    public function preview_syutujo_sp($id ,ExportSpSyutujoService $_service ,Request $request)
    {
        $request->merge(['ID'=>$id]);
        $data = $_service->index($request);
        return view('front.sp.syutujo.index',$data);
    }

}