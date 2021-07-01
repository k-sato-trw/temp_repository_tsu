<?php

namespace App\Services\ExportHtml;

use App\Repositories\TbBoatsJyokisetubetu\TbBoatsJyokisetubetuRepositoryInterface;

class ExportSuimenService
{
    public $TbBoatsJyokisetubetu;

    public function __construct(
        TbBoatsJyokisetubetuRepositoryInterface $TbBoatsJyokisetubetu
    ){
        $this->TbBoatsJyokisetubetu = $TbBoatsJyokisetubetu;
    }


    public function index($request){

        $data['haru'] = $this->TbBoatsJyokisetubetu->getFirstRecordBySeason('haru');
        $data['natu'] = $this->TbBoatsJyokisetubetu->getFirstRecordBySeason('natu');
        $data['aki']  = $this->TbBoatsJyokisetubetu->getFirstRecordBySeason('aki');
        $data['fuyu'] = $this->TbBoatsJyokisetubetu->getFirstRecordBySeason('fuyu');

        return $data;
    }

}