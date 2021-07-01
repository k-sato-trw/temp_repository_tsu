<?php

namespace App\Http\Controllers\Front\Sp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\Front\Sp\SpEventService;

class SpEventController extends Controller
{
    public $_service;


    public function __construct(
        SpEventService $SpEventService
    ){
        $this->_service = $SpEventService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        return view('front.sp.event.index',$data);
    }


}