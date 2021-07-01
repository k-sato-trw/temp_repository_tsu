<?php

namespace App\Repositories\TbBoatOzzinfo;

interface TbBoatOzzinfoRepositoryInterface
{

    /**
     * 指定レース1レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getFirstRecordByPK($jyo,$target_date,$race_num);

}