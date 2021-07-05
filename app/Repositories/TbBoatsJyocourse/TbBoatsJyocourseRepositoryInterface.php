<?php

namespace App\Repositories\TbBoatsJyocourse;

interface TbBoatsJyocourseRepositoryInterface
{

    /**
     * 予想マイデータページ用
     *
     * @return object
     */
    public function getFirstRecordForFront();

}