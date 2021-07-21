<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\GeneralService;

class RedirectLogController extends Controller
{

    public function tsu_sp_kyogi()
    {
        if(GeneralService::is_android()){
            return redirect()->to('/asp/log/tsu_sp_kyogi_android.asp');
        }elseif(GeneralService::is_apple_mobile()){
            return redirect()->to('/asp/log/tsu_sp_kyogi_iphone.asp');
        }else{
            return redirect()->to('/asp/log/tsu_sp_kyogi_pc.asp');
        }
    }

    public function tsu_sp_kyogi_pc()
    {
        return redirect()->away('https://ib.mbrace.or.jp/');
    }

    public function tsu_sp_kyogi_android()
    {
        return redirect()->away('https://spweb.brtb.jp/');
    }

    public function tsu_sp_kyogi_iphone()
    {
        return redirect()->away('https://spweb.brtb.jp/');
    }

    
    
}