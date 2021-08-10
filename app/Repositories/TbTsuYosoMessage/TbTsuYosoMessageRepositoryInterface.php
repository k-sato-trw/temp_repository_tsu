<?php

namespace App\Repositories\TbTsuYosoMessage;

interface TbTsuYosoMessageRepositoryInterface
{

    /**
     * PC用レコードを取得
     *
     * @var string $jyo
     * @var string $target_datetime
     * @return object
     */
    public function getFirstRecordForPc($jyo,$target_datetime,$is_preview = false);

    /**
     * SP用レコードを取得
     *
     * @var string $jyo
     * @var string $target_datetime
     * @return object
     */
    public function getFirstRecordForSp($jyo,$target_datetime,$is_preview = false);

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