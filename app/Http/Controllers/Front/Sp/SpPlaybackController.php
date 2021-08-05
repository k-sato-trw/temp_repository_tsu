<?php

namespace App\Http\Controllers\Front\Sp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\Front\Sp\SpPlaybackService;

class SpPlaybackController extends Controller
{
    public $_service;


    public function __construct(
        SpPlaybackService $SpPlaybackService
    ){
        $this->_service = $SpPlaybackService;
    }


    public function play_back(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->play_back($request);
        return view('front.sp.play_back.play_back',$data);
    }
    
    public function play_back_race(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->play_back_race($request);
        return view('front.sp.play_back.play_back_race',$data);
    }


}