<?php

namespace App\Repositories\BannerManagement;

interface BannerManagementRepositoryInterface
{

    /**
     * 全レコードをページネート取得
     *
     * @var int $page_pre
     * @return object
     */
    public function getAllRecord($status,$page_pre);

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
     * インサート処理
     *
     * @var object  $request
     * @var string  $file_name
     * @return object
     */
    public function insertRecord($request,$file_name);

    /**
     * IDで検索してupdate
     *
     * @var object $request
     * @var string $id
     * @var string $file_name
     * @return object
     */
    public function updateRecord($request,$id,$file_name);

    /**
     * IDで1レコードを削除
     *
     * @var string $id
     * @return object
     */
    public function deleteFirstRecordByPK($id);

    /**
     * インデックス表示用のレコード取得
     *
     * @var string $target_date
     * @var string $is_preview
     * @return object
     */
    public function getRecordForFront($target_date,$is_preview = false);

}