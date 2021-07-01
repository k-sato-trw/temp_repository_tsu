<?php

namespace App\Repositories\TbBoatOzz;

interface TbBoatOzzRepositoryInterface
{

    /**
     * かけ式ごとに配当レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @var string $kake_siki
     * @return object
     */
    public function getRecord($jyo,$target_date,$race_num,$kake_siki);

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
    public function getRanking($jyo,$target_date,$race_num,$kake_siki,$sort_condition);

    /**
     * SPのオッズ計算用処理
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getRecordForOddsCalc($jyo,$target_date,$race_num);

    /**
     * SPのオッズ検索用処理
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @var string $kake_siki
     * @return object
     */
    public function getRecordForOddsSearch($jyo,$target_date,$race_num,$kake_siki);

}