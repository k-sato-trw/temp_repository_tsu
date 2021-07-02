<?php

namespace App\Http\Controllers\Front\Sp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Services\Front\Sp\SpKyogiService;

class SpKyogiController extends Controller
{
    public $_service;


    public function __construct(
        SpKyogiService $SpKyogiService
    ){
        $this->_service = $SpKyogiService;
    }

    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        return view('front.sp.kaisai.index',$data);
    }

    public function movie(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->movie($request);
        return view('front.sp.kaisai.movie',$data);
    }

    public function movie_tenji(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->movie_tenji($request);
        return view('front.sp.kaisai.movie_tenji',$data);
    }

    public function movie_live(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->movie_live($request);
        return view('front.sp.kaisai.movie_live',$data);
    }

    /*
    public function odds_calc(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->odds_calc($request);
        return view('front.sp.kaisai.odds_calc',$data);
    }
    */


}