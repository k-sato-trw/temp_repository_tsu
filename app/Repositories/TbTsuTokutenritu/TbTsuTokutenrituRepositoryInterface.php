<?php

namespace App\Repositories\TbTsuTokutenritu;

interface TbTsuTokutenrituRepositoryInterface
{

    /**
     * 指定した日付のデータを全取得
     *
     * @var string $keisai_date
     * @return object
     */
    public function deleteRecordByDate($keisai_date);


    /**
     * インサート処理
     *
     * @var array  $insert_query
     * @return object
     */
    public function insertRecord($insert_query);

    
    /**
     * 指定日付のレコードの掲載フラグを変更
     *
     * @var string $keisai_date
     * @var string $appear_flg
     * @return object
     */
    public function changeAppearFlg($keisai_date,$appear_flg);

    /**
     * 指定した期間のデータを取得
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordByBitweenDate($start_date,$end_date);

    /**
     * 指定した日付のデータをランク順に取得
     *
     * @var string $target_date
     * @return object
     */
    public function getRankingByDate($target_date);

}