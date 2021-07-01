<?php

namespace App\Repositories\TbBoatRaceheader;

use App\Models\TbBoatRaceheader;

class TbBoatRaceheaderRepository implements TbBoatRaceheaderRepositoryInterface
{
    protected $TbBoatRaceheader;

    /**
    * @param object $TbBoatRaceheader
    */
    public function __construct(TbBoatRaceheader $TbBoatRaceheader)
    {
        $this->TbBoatRaceheader = $TbBoatRaceheader;
    }

    /**
     * 場コードと日付で1レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordByPK($jyo,$target_date)
    {
        return $this->TbBoatRaceheader
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','=',$target_date)
                    ->first();
    }

    /**
     * 場コードと日付リストでレコードを取得
     *
     * @var string $jyo
     * @var array $date_list
     * @return object
     */
    public function getRecordByDateList($jyo,$date_list)
    {
        return $this->TbBoatRaceheader
                    ->where('JYO','=',$jyo)
                    ->whereIn('TARGET_DATE',$date_list)
                    ->orderBy('TARGET_DATE')
                    ->get();
    }

    /**
     * 日付で全場レコードを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getAllJyoRecordByDate($target_date)
    {
        return $this->TbBoatRaceheader
                    ->where('TARGET_DATE','=',$target_date)
                    ->get();
    }

}