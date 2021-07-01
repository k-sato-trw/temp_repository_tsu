<?php

namespace App\Repositories\TbTsuYoso;

use App\Models\TbTsuYoso;

class TbTsuYosoRepository implements TbTsuYosoRepositoryInterface
{
    protected $TbTsuYoso;

    /**
    * @param object $TbTsuYoso
    */
    public function __construct(TbTsuYoso $TbTsuYoso)
    {
        $this->TbTsuYoso = $TbTsuYoso;
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
        return $this->TbTsuYoso
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('RACE_NUM','=',$race_num)
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->where('APPEAR_FLG','=','1')
                    ->first();
    }

    /**
     * 指定の日付レースでプッシュ対象を取得
     *
     * @var string $target_date
     * @return object
     */
    public function getPushing($target_date)
    {
        return $this->TbTsuYoso
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->where('APPEAR_FLG','=','1')
                    ->where('PUSHING_FLG','=','1')
                    ->orderByRaw('LENGTH(RACE_NUM)')
                    ->orderBy('RACE_NUM')
                    ->get();
    }


    

}