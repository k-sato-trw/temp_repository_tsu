<?php

namespace App\Repositories\TbTsuYosoMessage;

interface TbTsuYosoMessageRepositoryInterface
{

    /**
     * 日付をもとにレコードを取得
     *
     * @var string $jyo
     * @var string $target_datetime
     * @return object
     */
    public function getRecordByDatetime($jyo,$target_datetime);

}