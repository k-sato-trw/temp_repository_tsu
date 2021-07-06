<?php

namespace App\Repositories\TbTsuSensyuTitle;

interface TbTsuSensyuTitleRepositoryInterface
{

    /**
     * IDでレコードを取得
     *
     * @var string $touban
     * @return object
     */
    public function getRecordByPK($touban);

}