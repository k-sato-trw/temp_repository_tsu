<?php

namespace App\Repositories\Holiday;

interface HolidayRepositoryInterface
{

    /**
     * フロントカレンダー表示用にレコード用の取得
     *
     * @return object
     */
    public function getAllRecordForFrontCalendar();

    /**
     * 開催ページ用に指定日レコードを取得
     *
     * @param string $target_date
     * @return object
     */
    public function getFirstRecordByDate($target_date);

    /**
     * 開催ページ用に指定日範囲レコードを取得
     *
     * @param string $start_date
     * @param string $end_date
     * @return object
     */
    public function getRecordBitweenDate($start_date,$end_date);

}