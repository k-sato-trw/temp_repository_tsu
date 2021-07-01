<?php

namespace App\Repositories\TbMikuniAssen;

interface TbMikuniAssenRepositoryInterface
{

    /**
     * 登録番号でレコードを取得
     *
     * @var string $touban
     * @var string $now_date
     * @return object
     */
    public function getRecordByTouban($touban,$now_date);

    /**
     * IDで1レコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordByPK($id);

    /**
     * 最大IDのレコードを取得
     *
     * @return object
     */
    public function getLastRecord();

    /**
     * IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @var string $touban
     * @return object
     */
    public function UpdateRecordByPK($request,$id,$touban);

    /**
     * インサート処理
     *
     * @var object  $request
     * @var string  $touban
     * @return object
     */
    public function insertRecord($request,$touban);

    /**
     * IDで1レコードを削除
     *
     * @var string $id
     * @return object
     */
    public function deleteFirstRecordByPK($id);

    /**
     * プロフィール用のレコードを取得
     *
     * @var string $touban
     * @var string $now_date
     * @return object
     */
    public function getRecordByToubanForProfile($touban,$now_date);

}