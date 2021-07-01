<?php

namespace App\Repositories\Holding;

interface HoldingRepositoryInterface
{

    /**
     * 場に対応した1レコードを取得
     *
     * @return object
     */
    public function getFirstRecordForFront();

}