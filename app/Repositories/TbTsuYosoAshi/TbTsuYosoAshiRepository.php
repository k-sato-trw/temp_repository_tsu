<?php

namespace App\Repositories\TbTsuYosoAshi;

use App\Models\TbTsuYosoAshi;

class TbTsuYosoAshiRepository implements TbTsuYosoAshiRepositoryInterface
{
    protected $TbTsuYosoAshi;

    /**
    * @param object $TbTsuYosoAshi
    */
    public function __construct(TbTsuYosoAshi $TbTsuYosoAshi)
    {
        $this->TbTsuYosoAshi = $TbTsuYosoAshi;
    }

    
    /**
     * IDで1レコードを取得
     *
     * @var string $touban
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getLatestRecordByTouban($touban,$start_date,$end_date)
    {
        return $this->TbTsuYosoAshi
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->where('TOUBAN','=',$touban)
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->where('APPEAR_FLG','=','1')
                    ->orderBy('TARGET_DATE', 'desc')
                    ->first();
    }

    /**
     * IDリストと日付でレコードを取得
     *
     * @var array $touban_list
     * @var string $target_date
     * @return object
     */
    public function getRecordByToubanList($touban_list,$target_date)
    {
        return $this->TbTsuYosoAshi
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('KIKYO_FLG','=',0)
                    ->whereIn('TOUBAN',$touban_list)
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->orderBy('TOUBAN', 'asc')
                    ->get();
    }

    /**
     * IDリスト除外と日付でレコードを取得
     *
     * @var array $touban_list
     * @var string $target_date
     * @return object
     */
    public function getRecordNotToubanList($touban_list,$target_date)
    {
        return $this->TbTsuYosoAshi
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('KIKYO_FLG','=',0)
                    ->whereNotIn('TOUBAN',$touban_list)
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->orderBy('TOUBAN', 'asc')
                    ->get();
    }

    /**
     * 帰郷フラグと日付でレコードを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getKikyouRecordByToubanList($target_date)
    {
        return $this->TbTsuYosoAshi
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('KIKYO_FLG','=',1)
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->orderBy('TOUBAN', 'asc')
                    ->get();
    }




    
}