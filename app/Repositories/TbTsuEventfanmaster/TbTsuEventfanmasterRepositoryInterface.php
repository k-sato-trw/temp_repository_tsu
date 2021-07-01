<?php

namespace App\Repositories\TbTsuEventfanmaster;

interface TbTsuEventfanmasterRepositoryInterface
{

    /**
     * カレンダーに対応したレコードを取得
     *
     * @var int $id
     * @return object
     */
    public function getRecord($id);

    /**
     * IDで1レコードを取得
     *
     * @var string $id
     * @var string $sub_id
     * @return object
     */
    public function getFirstRecordByPK($id,$sub_id);

    /**
     * 同一カレンダーで最大IDのレコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getLastRecord($id);

    /**
     * インサート処理
     *
     * @var object  $request
     * @var string  $id
     * @return object
     */
    public function insertRecord($request,$id);

    /**
     * IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @var string $sub_id
     * @return object
     */
    public function UpdateRecordByPK($request,$id,$sub_id);

    /**
     * IDで1レコードを削除
     *
     * @var string $id
     * @var string $sub_id
     * @return object
     */
    public function deleteFirstRecordByPK($id,$sub_id);

    /**
     * TOPページ 非開催表示用データ取得
     *
     * @var int $id
     * @return object
     */
    public function getRecordForTop($id);

    /**
     * イベントページ用データ取得
     *
     * @var int $id
     * @var int $is_preview
     * @return object
     */
    public function getRecordForEvent($id,$is_preview=false);

}