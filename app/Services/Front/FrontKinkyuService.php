<?php

namespace App\Services\Front;

use App\Repositories\TbTsuKinkyuKokuti\TbTsuKinkyuKokutiRepositoryInterface;

class FrontKinkyuService
{
    public $TbTsuKinkyuKokuti;

    public function __construct(
        TbTsuKinkyuKokutiRepositoryInterface $TbTsuKinkyuKokuti
    ){
        $this->TbTsuKinkyuKokuti = $TbTsuKinkyuKokuti;
    }


    public function message($request){

        $target_datetime = date('Ymdhi');
        $device = $request->input('device') ?? 0;
        $is_preview = $request->input('preview') ?? false;
        $preview_id = $request->input('preview_id') ?? false;


        $kinkyu = $this->TbTsuKinkyuKokuti->getFirstRecordForFront($target_datetime, $device, $is_preview ,$preview_id);

        $data['kinkyu'] = $kinkyu;
        $data['device'] = $device;

        return $data;
    }


}