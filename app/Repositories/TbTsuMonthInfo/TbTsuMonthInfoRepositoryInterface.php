<?php

namespace App\Repositories\TbTsuMonthInfo;

interface TbTsuMonthInfoRepositoryInterface
{

    /**
     * 日付文字列で1レコードを取得
     *
     * @var string $now_date
     * @return object
     */
    public function getFirstRecordByDate($now_date);

    /**
     * 最大IDのレコードを取得
     *
     * @return object
     */
    public function getLastRecord();

    /**
     * TARGET_DATE で1レコード有無を判定してupsert
     *
     * @var object  $request
     * @var string  $file_name
     * @return object
     */
    public function upsertRecord($request, $file_name);

}