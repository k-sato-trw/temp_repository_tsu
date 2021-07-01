<?php

namespace App\Repositories\TbBoatTyokuzen;

use App\Models\TbBoatTyokuzen;

class TbBoatTyokuzenRepository implements TbBoatTyokuzenRepositoryInterface
{
    protected $TbBoatTyokuzen;

    /**
    * @param object $user
    */
    public function __construct(TbBoatTyokuzen $TbBoatTyokuzen)
    {
        $this->TbBoatTyokuzen = $TbBoatTyokuzen;
    }

    /**
     * JYO, TARGET_DATE, RACE_NUM で該当レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getRecordByPK($jyo,$target_date,$race_num)
    {
        return $this->TbBoatTyokuzen
                    ->where("JYO","=",$jyo)
                    ->where("TARGET_DATE","=",$target_date)
                    ->where("RACE_NUMBER","=",$race_num)
                    ->orderBy("TEIBAN","ASC")
                    ->get();
    }

    /**
     * JYO, TARGET_DATE, RACE_NUM で該当レコードを取得
     * CG表示用コース番号順
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getRecordForCg($jyo,$target_date,$race_num)
    {
        return $this->TbBoatTyokuzen
                    ->where("JYO","=",$jyo)
                    ->where("TARGET_DATE","=",$target_date)
                    ->where("RACE_NUMBER","=",$race_num)
                    ->orderBy("ST_COURSE","ASC")
                    ->get();
    }


    /**
     * JYO, TARGET_DATE, 直近スタートの展示レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getRecentTenjiRecord($jyo,$target_date)
    {
        return $this->TbBoatTyokuzen
                    ->where("JYO","=",$jyo)
                    ->where("TARGET_DATE","=",$target_date)
                    ->where("ST_TIMING","!=","")
                    ->where("ST_TIMING","!=",null)
                    ->orderByRaw("LENGTH(RACE_NUMBER) DESC")
                    ->orderBy("RACE_NUMBER","DESC")
                    ->first();
    }

}