<?php

namespace App\Http\Controllers\Front\Sp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\Front\Sp\SpResultService;

class SpResultController extends Controller
{
    public $_service;


    public function __construct(
        SpResultService $SpResultService
    ){
        $this->_service = $SpResultService;
    }


    public function result(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->result($request);
        return view('front.sp.result.result',$data);
    }


    public function result_01(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->result_01($request);
        return view('front.sp.result.result_01',$data);
    }

    public function result_02(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->result_02($request);
        return view('front.sp.result.result_02',$data);
    }



}