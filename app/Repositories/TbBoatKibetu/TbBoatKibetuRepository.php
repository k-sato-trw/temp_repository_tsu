<?php

namespace App\Repositories\TbBoatKibetu;

use App\Models\TbBoatKibetu;

class TbBoatKibetuRepository implements TbBoatKibetuRepositoryInterface
{
    protected $TbBoatKibetu;

    /**
    * @param object $TbBoatKibetu
    */
    public function __construct(TbBoatKibetu $TbBoatKibetu)
    {
        $this->TbBoatKibetu = $TbBoatKibetu;
    }


    /**
     * 登録番号で1レコードを取得
     *
     * @var string $touban
     * @return object
     */
    public function getFirstRecordByPK($touban)
    {
        return $this->TbBoatKibetu
                    ->where('TOUBAN','=',$touban)
                    ->first();
    }

    
    /**
     * 最新のレコード一件取得
     *
     * @return object
     */
    public function getLastRecord()
    {
        return $this->TbBoatKibetu
                    ->orderBy("TALLY_START_DATE",'DESC')
                    ->orderBy("TALLY_END_DATE",'DESC')
                    ->first();
    }

    

}