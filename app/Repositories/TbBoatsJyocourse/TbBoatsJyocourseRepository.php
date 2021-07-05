<?php

namespace App\Repositories\TbBoatsJyocourse;

use App\Models\TbBoatsJyocourse;

class TbBoatsJyocourseRepository implements TbBoatsJyocourseRepositoryInterface
{
    protected $TbBoatsJyocourse;

    /**
    * @param object $TbBoatsJyocourse
    */
    public function __construct(TbBoatsJyocourse $TbBoatsJyocourse)
    {
        $this->TbBoatsJyocourse = $TbBoatsJyocourse;
    }

    /**
     * 予想マイデータページ用
     *
     * @return object
     */
    public function getFirstRecordForFront()
    {
        return $this->TbBoatsJyocourse
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->orderBy('TARGET_DATE', 'desc')
                    ->first();
    }

}