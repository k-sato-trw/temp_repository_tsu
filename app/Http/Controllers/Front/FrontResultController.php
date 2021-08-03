<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\Front\FrontResultService;

class FrontResultController extends Controller
{
    public $_service;


    public function __construct(
        FrontResultService $FrontResultService
    ){
        $this->_service = $FrontResultService;
    }


    public function result_race(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->result_race($request);
        return view('front.result.result_race',$data);
    }

    public function result_detail(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->result_detail($request);
        return view('front.result.result_detail',$data);
    }



}