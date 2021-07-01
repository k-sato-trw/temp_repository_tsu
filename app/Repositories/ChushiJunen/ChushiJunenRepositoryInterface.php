<?php

namespace App\Repositories\ChushiJunen;

interface ChushiJunenRepositoryInterface
{

    /**
     * 時間で1レコードを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordByDate($target_date);

    /**
     * フロント表示用に判定を取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordForFront($jyo,$target_date);

    /**
     * フロントカレンダー表示用に本場中止レコードを取得
     *
     * @var int $now_year
     * @var int $now_month
     * @return object
     */
    public function getHonjyoChushiRecordForClendar($now_year,$now_month);

    /**
     * フロントカレンダー表示用に本場以外の中止レコードを取得
     *
     * @var int $now_year
     * @var int $now_month
     * @return object
     */
    public function getJyogaiChushiRecordForClendar($now_year,$now_month);

    /**
     * フロントカレンダー表示用に劇場日中の中止レコードを取得
     *
     * @var int $now_year
     * @var int $now_month
     * @return object
     */
    public function getGekijyoChushiRecordForClendar($now_year,$now_month);

    /**
     * フロントTOP表示用に指定日の中止レコードをすべて取得
     *
     * @var string $target_date
     * @return object
     */
    public function getChushiRecordForTop($target_date);

    /**
     * フロントTOP表示用に指定範囲日の中止レコードを取得
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getChushiRecordBitweenDate($start_date,$end_date);

}