<?php

namespace App\Repositories\TbTsuYosoTenji;

use App\Models\TbTsuYosoTenji;

class TbTsuYosoTenjiRepository implements TbTsuYosoTenjiRepositoryInterface
{
    protected $TbTsuYosoTenji;

    /**
    * @param object $TbTsuYosoTenji
    */
    public function __construct(TbTsuYosoTenji $TbTsuYosoTenji)
    {
        $this->TbTsuYosoTenji = $TbTsuYosoTenji;
    }

    
    /**
     * 指定のレースで1レコードを取得
     *
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getFirstRecordByDate($target_date,$race_num)
    {
        return $this->TbTsuYosoTenji
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('RACE_NUM','=',$race_num)
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->where('APPEAR_FLG','=','1')
                    ->first();
    }

    /**
     * 指定期間の全レースのレコードを取得
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordForTekichuritsu($start_date,$end_date)
    {
        return $this->TbTsuYosoTenji
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->where('APPEAR_FLG','=','1')
                    ->get();
    }

}