<?php

namespace App\Repositories\RaceTenboSensyuImage;

interface RaceTenboSensyuImageRepositoryInterface
{

    /**
     * 登番を基準にレコードを取得
     *
     * @var int $pre_page
     * @var string $touban
     * @return object
     */
    public function getRecordByTouban($pre_page,$touban = 0);

    /**
     * 登番で1レコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordByTouban($touban);

    /**
     * 登番リストでレコードを取得
     *
     * @var array $touban_list
     * @return object
     */
    public function getRecordByToubanList($touban_list);

    /**
     * インサート処理
     *
     * @var object  $request
     * @var string  $file_name
     * @return object
     */
    public function insertRecord($request,$file_name);

    /**
     * 登録番号をキーにしてアップデート
     *
     * @var object $request
     * @var string $touban
     * @var string $file_name
     * @return object
     */
    public function UpdateRecordByTouban($request,$touban,$file_name);

    /**
     * IDで1レコードを削除
     *
     * @var string $touban
     * @return object
     */
    public function deleteFirstRecordByTouban($touban);

}