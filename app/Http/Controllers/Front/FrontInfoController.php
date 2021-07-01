<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\Front\FrontInfoService;

class FrontInfoController extends Controller
{
    public $_service;


    public function __construct(
        FrontInfoService $FrontInfoService
    ){
        $this->_service = $FrontInfoService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        return view('front.info.index',$data);
    }


}