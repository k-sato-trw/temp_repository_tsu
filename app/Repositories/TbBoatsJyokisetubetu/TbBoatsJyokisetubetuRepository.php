<?php

namespace App\Repositories\TbBoatsJyokisetubetu;

use App\Models\TbBoatsJyokisetubetu;

class TbBoatsJyokisetubetuRepository implements TbBoatsJyokisetubetuRepositoryInterface
{
    protected $TbBoatsJyokisetubetu;

    /**
    * @param object $TbBoatsJyokisetubetu
    */
    public function __construct(TbBoatsJyokisetubetu $TbBoatsJyokisetubetu)
    {
        $this->TbBoatsJyokisetubetu = $TbBoatsJyokisetubetu;
    }


    /**
     * IDで1レコードを取得
     *
     * @var string $season
     * @return object
     */
    public function getFirstRecordBySeason($season)
    {
        return $this->TbBoatsJyokisetubetu
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->where('kisetu_name','=',$season)
                    ->orderBy('target_date','DESC')
                    ->first();
    }


}