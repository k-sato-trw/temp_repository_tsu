<?php

namespace App\Repositories\TbBoatKekka;

interface TbBoatKekkaRepositoryInterface
{

    /**
     * プロフィール出力用データを取得
     *
     * @var string $touban
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getFirstRecordForProfile($touban,$jyo,$start_date,$end_date);

    /**
     * スタート展示用今節(当日は含まない)STの平均値を求める
     *
     * @var string $touban
     * @var string $jyo
     * @var string $start_date
     * @var string $target_date
     * @return object
     */
    public function getStAvg($touban,$jyo,$start_date,$target_date);

    /**
     * あるレースの結果レコードを取得(6艇分)
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getRaceKekka($jyo,$target_date,$race_num);

    /**
     * あるレースのSTトップを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getTopSt($jyo,$target_date,$race_num);

}