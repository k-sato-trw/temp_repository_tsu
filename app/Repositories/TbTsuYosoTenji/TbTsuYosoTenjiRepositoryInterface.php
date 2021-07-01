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

}