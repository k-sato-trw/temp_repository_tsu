<?php

namespace App\Repositories\Holiday;

use App\Models\Holiday;

class HolidayRepository implements HolidayRepositoryInterface
{
    protected $Holiday;

    /**
    * @param object $Holiday
    */
    public function __construct(Holiday $Holiday)
    {
        $this->Holiday = $Holiday;
    }

    /**
     * フロントカレンダー表示用にレコード用の取得
     *
     * @return object
     */
    public function getAllRecordForFrontCalendar()
    {
        return $this->Holiday
                    ->get();
    }

    /**
     * 開催ページ用に指定日レコードを取得
     *
     * @param string $target_date
     * @return object
     */
    public function getFirstRecordByDate($target_date)
    {
        return $this->Holiday
                    ->where("HOLIDAYDATE",$target_date)
                    ->first();
    }

    /**
     * 開催ページ用に指定日範囲レコードを取得
     *
     * @param string $start_date
     * @param string $end_date
     * @return object
     */
    public function getRecordBitweenDate($start_date,$end_date)
    {
        return $this->Holiday
                    ->where("HOLIDAYDATE",'>=',$start_date)
                    ->where("HOLIDAYDATE",'<=',$end_date)
                    ->get();
    }


}