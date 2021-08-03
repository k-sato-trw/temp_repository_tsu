<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\Front\FrontReplayService;

class FrontReplayController extends Controller
{
    public $_service;


    public function __construct(
        FrontReplayService $FrontReplayService
    ){
        $this->_service = $FrontReplayService;
    }


    public function replay_movie(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->replay_movie($request);
        return view('front.replay.replay_movie',$data);
    }

}