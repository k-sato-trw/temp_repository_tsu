<?php

namespace App\Repositories\TbGambooYosoRace;

interface TbGambooYosoRaceRepositoryInterface
{

    /**
     * 1レース分のレコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getOneRaceFirstRecord($jyo,$target_date,$race_num);

}