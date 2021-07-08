<?php

namespace App\Http\Controllers\Front\Sp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\Front\Sp\SpCalService;

class SpCalController extends Controller
{
    public $_service;


    public function __construct(
        SpCalService $SpCalService
    ){
        $this->_service = $SpCalService;
    }


    public function index(Request $request)
    {
        //サービスクラスで処理。
        $data = $this->_service->index($request);
        return view('front.sp.cal.index',$data);
    }


}