<?php

namespace App\Repositories\TbTsuYosoAshi;

interface TbTsuYosoAshiRepositoryInterface
{

    /**
     * IDで1レコードを取得
     *
     * @var string $touban
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getLatestRecordByTouban($touban,$start_date,$end_date);


    /**
     * IDリストと日付でレコードを取得
     *
     * @var array $touban_list
     * @var string $target_date
     * @return object
     */
    public function getRecordByToubanList($touban_list,$target_date);

    /**
     * IDリスト除外と日付でレコードを取得
     *
     * @var array $touban_list
     * @var string $target_date
     * @return object
     */
    public function getRecordNotToubanList($touban_list,$target_date);

    /**
     * 帰郷フラグと日付でレコードを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getKikyouRecordByToubanList($target_date);

}