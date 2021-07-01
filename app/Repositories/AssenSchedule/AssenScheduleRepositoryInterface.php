<?php

namespace App\Repositories\AssenSchedule;

interface AssenScheduleRepositoryInterface
{

    /**
     * 場のテーブルをすべて取得
     *
     * @return object
     */
    public function getAllRecord();

    /**
     * インサート処理
     *
     * @var object  $request
     * @return object
     */
    public function insertRecord($request);

    /**
     * IDで1レコードを削除
     *
     * @var string $touban
     * @return object
     */
    public function deleteFirstRecordByPK($touban);

}