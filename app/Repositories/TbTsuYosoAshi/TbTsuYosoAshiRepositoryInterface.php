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

}