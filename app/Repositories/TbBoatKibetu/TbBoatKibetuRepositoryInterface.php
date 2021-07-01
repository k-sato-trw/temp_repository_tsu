<?php

namespace App\Repositories\TbBoatKibetu;

interface TbBoatKibetuRepositoryInterface
{

    /**
     * 登録番号で1レコードを取得
     *
     * @var string $touban
     * @return object
     */
    public function getFirstRecordByPK($touban);

    
    /**
     * 最新のレコード一件取得
     *
     * @return object
     */
    public function getLastRecord();

}