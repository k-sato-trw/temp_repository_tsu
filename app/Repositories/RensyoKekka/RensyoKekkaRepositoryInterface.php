<?php

namespace App\Repositories\RensyoKekka;

interface RensyoKekkaRepositoryInterface
{

    /**
     * IDで1レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordForFront($jyo,$target_date);

}