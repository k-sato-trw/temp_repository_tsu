<?php

namespace App\Repositories\Holding;

use App\Models\Holding;

class HoldingRepository implements HoldingRepositoryInterface
{
    protected $Holding;

    /**
    * @param object $Holding
    */
    public function __construct(Holding $Holding)
    {
        $this->Holding = $Holding;
    }


    /**
     * 場に対応した1レコードを取得
     *
     * @return object
     */
    public function getFirstRecordForFront()
    {
        return $this->Holding
                    ->where('場コード','=',config('const.JYO_CODE'))
                    ->first();
    }

    
}