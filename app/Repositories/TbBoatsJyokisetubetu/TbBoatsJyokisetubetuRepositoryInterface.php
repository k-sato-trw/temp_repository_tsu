<?php

namespace App\Repositories\TbBoatsJyokisetubetu;

interface TbBoatsJyokisetubetuRepositoryInterface
{

    /**
     * IDで1レコードを取得
     *
     * @var string $season
     * @return object
     */
    public function getFirstRecordBySeason($season);

}