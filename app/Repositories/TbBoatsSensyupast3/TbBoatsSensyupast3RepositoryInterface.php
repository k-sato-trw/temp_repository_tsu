<?php

namespace App\Repositories\TbBoatsSensyupast3;

interface TbBoatsSensyupast3RepositoryInterface
{

    /**
     * 登録番号でレコード取得
     *
     * @var string $touban
     * @return object
     */
    public function getfirstRecordByTouban($touban);

}