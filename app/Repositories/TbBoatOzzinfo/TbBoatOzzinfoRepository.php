<?php

namespace App\Repositories\TbBoatOzzinfo;

use App\Models\TbBoatOzzinfo;

class TbBoatOzzinfoRepository implements TbBoatOzzinfoRepositoryInterface
{
    protected $TbBoatOzzinfo;

    /**
    * @param object $TbBoatOzzinfo
    */
    public function __construct(TbBoatOzzinfo $TbBoatOzzinfo)
    {
        $this->TbBoatOzzinfo = $TbBoatOzzinfo;
    }

    

    /**
     * 指定レース1レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getFirstRecordByPK($jyo,$target_date,$race_num)
    {
        return $this->TbBoatOzzinfo
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('RACE_NUMBER','=',$race_num)
                    ->first();
    }

}