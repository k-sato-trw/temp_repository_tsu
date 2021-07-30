<?php

namespace App\Repositories\TbBoatKekka;

use App\Models\TbBoatKekka;

class TbBoatKekkaRepository implements TbBoatKekkaRepositoryInterface
{
    protected $TbBoatKekka;

    /**
    * @param object $TbBoatKekka
    */
    public function __construct(TbBoatKekka $TbBoatKekka)
    {
        $this->TbBoatKekka = $TbBoatKekka;
    }


    /**
     * プロフィール出力用データを取得
     *
     * @var string $touban
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getFirstRecordForProfile($touban,$jyo,$start_date,$end_date)
    {
        return $this->TbBoatKekka
                    ->where("TOUBAN","=",$touban)
                    ->where("JYO","=",$jyo)
                    ->where("TARGET_DATE",">=",$start_date)
                    ->where("TARGET_DATE","<=",$end_date)
                    ->orderBy("TARGET_DATE","DESC")
                    ->orderByRaw('LENGTH(RACE_NUMBER)')
                    ->orderBy('RACE_NUMBER','ASC')
                    ->first();
    }
    
    /**
     * スタート展示用今節(当日は含まない)STの平均値を求める
     *
     * @var string $touban
     * @var string $jyo
     * @var string $start_date
     * @var string $target_date
     * @return object
     */
    public function getStAvg($touban,$jyo,$start_date,$target_date)
    {
        return $this->TbBoatKekka
                    ->selectRaw('AVG(START_TIMING) as avg')
                    ->where("TOUBAN","=",$touban)
                    ->where("JYO","=",$jyo)
                    ->where("TARGET_DATE",">=",$start_date)
                    ->where("TARGET_DATE","<",$target_date)
                    ->where("START_TIMING","!=",'')
                    ->orderBy("TARGET_DATE","DESC")
                    ->orderByRaw('LENGTH(RACE_NUMBER)')
                    ->orderBy('RACE_NUMBER','ASC')
                    ->first();
    }

    /**
     * あるレースの結果レコードを取得(6艇分)
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getRaceKekka($jyo,$target_date,$race_num)
    {
        return $this->TbBoatKekka
                    ->where("JYO","=",$jyo)
                    ->where("TARGET_DATE","=",$target_date)
                    ->where("RACE_NUMBER","=",$race_num)
                    ->orderBy('TYAKUJUN','ASC')
                    ->orderBy('TEIBAN','ASC')
                    ->get();
    }

    

    /**
     * あるレースのSTトップを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getTopSt($jyo,$target_date,$race_num)
    {
        return $this->TbBoatKekka
                    ->where("JYO","=",$jyo)
                    ->where("TARGET_DATE","=",$target_date)
                    ->where("RACE_NUMBER","=",$race_num)
                    ->where("TYAKUJUN","!=",'F')
                    ->where("TYAKUJUN","!=",'L')
                    ->orderBy('START_TIMING','ASC')
                    ->first();
    }


    /**
     * デビューレースの開催分全結果を取得
     *
     * @var string $jyo
     * @var string $touban
     * @return object
     */
    public function getDebutRaceKekka($jyo,$touban,$start_date,$end_date)
    {
        return $this->TbBoatKekka
                    ->where("JYO","=",$jyo)
                    ->where("TARGET_DATE",">=",$start_date)
                    ->where("TARGET_DATE","<=",$end_date)
                    ->where("TOUBAN","=",$touban)
                    ->orderBy('TARGET_DATE','ASC')
                    ->orderByRaw('LENGTH(RACE_NUMBER) ASC')
                    ->orderBy('RACE_NUMBER','ASC')
                    ->get();
    }

    /**
     * 結果検索用、最新結果が存在する日付のレコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getLastRecord($jyo,$target_date)
    {
        return $this->TbBoatKekka
                    ->where("JYO","=",$jyo)
                    ->where("TARGET_DATE","<=",$target_date)
                    ->orderBy('TARGET_DATE','DESC')
                    ->first();
    }



}