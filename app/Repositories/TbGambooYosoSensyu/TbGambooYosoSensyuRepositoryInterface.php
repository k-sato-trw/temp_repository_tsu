<?php

namespace App\Repositories\TbGambooYosoSensyu;

interface TbGambooYosoSensyuRepositoryInterface
{

    /**
     * 1レース分のレコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getOneRaceRecord($jyo,$target_date,$race_num);

}