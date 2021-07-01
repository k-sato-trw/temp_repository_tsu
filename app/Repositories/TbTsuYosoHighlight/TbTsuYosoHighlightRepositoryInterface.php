<?php

namespace App\Repositories\TbTsuYosoHighlight;

interface TbTsuYosoHighlightRepositoryInterface
{

    /**
     * 一定範囲の日付のデータを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordBitweenDate($jyo,$start_date,$end_date);

}