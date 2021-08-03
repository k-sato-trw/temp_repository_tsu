<?php

namespace App\Services\Front;

use App\Repositories\TbVodManagement\TbVodManagementRepositoryInterface;

class FrontReplayService
{
    public $TbVodManagement;

    public function __construct(
        TbVodManagementRepositoryInterface $TbVodManagement
    ){
        $this->TbVodManagement = $TbVodManagement;
    }


    public function replay_movie($request){

        $movie_id = $request->input('MovieID');
        $jyo = config('const.JYO_CODE');

        if(strlen($movie_id) == 14){
            $type=1;
        }else{
            $type=2;
        }
        $data['type'] = $type;
        $data['movie_id'] = $movie_id;

        $vod = $this->TbVodManagement->getFirstRecordByMovieId($jyo,$movie_id);

        $data['vod'] = $vod;

        return $data;
    }

    
}