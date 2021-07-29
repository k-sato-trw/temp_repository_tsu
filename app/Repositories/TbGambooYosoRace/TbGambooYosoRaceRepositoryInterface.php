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

    /**
     * 指定期間分の全レースレコードを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordForTekichuritsu($jyo,$start_date,$end_date);

}