<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Front\FrontJsService;

class FrontJsController extends Controller
{

    public $_service;

    
    public function __construct(
        FrontJsService $FrontJsService
    ){
        $this->_service = $FrontJsService;
    }

    public function make_player(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->make_player($request);
        return view('front.js.make_player',$data);
    }
    
}
