<?php

namespace App\Services\Front;

use App\Repositories\FanData\FanDataRepositoryInterface;

class FrontJsService
{
    public $TbHeiwaInformation;

    public function __construct(
        FanDataRepositoryInterface $FanData
    ){
        $this->FanData = $FanData;
    }


    public function make_player($request){
        
        $data = [];

        $FanData = $this->FanData->getAllRecord();

        $output = "";
        foreach($FanData as $item){
            $row = "";
            for($i=1;$i<=52;$i++){

                if($i == 1){
                    $row .= $item->KenID;
                }elseif($i == 5){
                    $row .= ":::".$item->Touban;
                }elseif($i == 10){
                    $row .= ":::".$item->NameK;
                }else{
                    $row .= ":::0";
                }

            }
            
            if($output){
                $output .= ",'".$row."'";
            }else{
                $output .= "'".$row."'";
            }
        }

        $data['output'] = $output;
        
        return $data;
    }

}