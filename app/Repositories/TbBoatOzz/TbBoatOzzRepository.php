<?php

namespace App\Repositories\TbBoatOzz;

use App\Models\TbBoatOzz;

class TbBoatOzzRepository implements TbBoatOzzRepositoryInterface
{
    protected $TbBoatOzz;

    /**
    * @param object $TbBoatOzz
    */
    public function __construct(TbBoatOzz $TbBoatOzz)
    {
        $this->TbBoatOzz = $TbBoatOzz;
    }


    /**
     * かけ式ごとに配当レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @var string $kake_siki
     * @return object
     */
    public function getRecord($jyo,$target_date,$race_num,$kake_siki)
    {
        return $this->TbBoatOzz
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('RACE_NUMBER','=',$race_num)
                    ->where('KAKE_SIKI','=',$kake_siki)
                    ->orderBy('NUMBER1','asc')
                    ->orderBy('NUMBER2','asc')
                    ->orderBy('NUMBER3','asc')
                    ->get();
    }

    /**
     * かけ式とソート条件ごとにランキング用レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @var string $kake_siki
     * @var string $sort_condition
     * @return object
     */
    public function getRanking($jyo,$target_date,$race_num,$kake_siki,$sort_condition)
    {
        return $this->TbBoatOzz
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('RACE_NUMBER','=',$race_num)
                    ->where('KAKE_SIKI','=',$kake_siki)
                    ->orderByRaw('LENGTH(BAIRITU) '.$sort_condition)
                    ->orderBy('BAIRITU',$sort_condition)
                    ->orderBy('NUMBER1','asc')
                    ->orderBy('NUMBER2','asc')
                    ->orderBy('NUMBER3','asc')
                    ->limit(20)
                    ->get();
    }

    /**
     * SPのオッズ計算用処理
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getRecordForOddsCalc($jyo,$target_date,$race_num)
    {
        return $this->TbBoatOzz
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('RACE_NUMBER','=',$race_num)
                    ->where('BAIRITU','!=','-')
                    ->get();
    }

    /**
     * SPのオッズ検索用処理
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @var string $kake_siki
     * @return object
     */
    public function getRecordForOddsSearch($jyo,$target_date,$race_num,$kake_siki)
    {
        return $this->TbBoatOzz
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('RACE_NUMBER','=',$race_num)
                    ->where('KAKE_SIKI','=',$kake_siki)
                    ->where('BAIRITU','!=','-')
                    ->get();
    }

    

}