<?php

namespace App\Repositories\TbTsuYosoTenji;

interface TbTsuYosoTenjiRepositoryInterface
{

    /**
     * 指定のレースで1レコードを取得
     *
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getFirstRecordByDate($target_date,$race_num);

    /**
     * 指定期間の全レースのレコードを取得
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordForTekichuritsu($start_date,$end_date);

}