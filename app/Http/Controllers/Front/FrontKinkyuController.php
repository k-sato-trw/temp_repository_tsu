<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\Front\FrontKinkyuService;

class FrontKinkyuController extends Controller
{
    public $_service;


    public function __construct(
        FrontKinkyuService $FrontKinkyuService
    ){
        $this->_service = $FrontKinkyuService;
    }


    public function message(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->message($request);
        return view('front.kinkyu.message',$data);
    }


}