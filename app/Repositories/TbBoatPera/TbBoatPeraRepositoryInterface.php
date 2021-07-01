<?php

namespace App\Repositories\TbBoatPera;

interface TbBoatPeraRepositoryInterface
{

    /**
     * レース単位でプロペラ情報を取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getRecordForOneRace($jyo,$target_date,$race_num);

}