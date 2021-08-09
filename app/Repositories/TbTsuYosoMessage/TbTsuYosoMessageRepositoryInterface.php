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

    /**
     * 一つのレコードを取得
     *
     * @return object
     */
    public function getFirstRecord();

    /**
     * アップデート処理
     *
     * @var object  $request
     * @return object
     */
    public function updateRecord($request);

}