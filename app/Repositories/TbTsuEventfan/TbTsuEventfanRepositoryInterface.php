<?php

namespace App\Repositories\TbTsuEventfan;

interface TbTsuEventfanRepositoryInterface
{

    /**
     * 全レコードをページネイトで取得
     *
     * @var string $id
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
    public function getFirstRecordByPK($id,$sub_id,$third_id);

    /**
     * 最大IDのレコードを取得
     *
     * @var string $id
     * @var string $sub_id
     * @return object
     */
    public function getLastRecord($id,$sub_id);

    /**
     * インサート処理
     *
     * @var string $id
     * @var string $sub_id
     * @var array $file_name
     * @var object  $request
     * @return object
     */
    public function insertRecord($request,$id,$sub_id,$file_name);


    /**
     * IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @var string $sub_id
     * @var string $third_id
     * @var array $file_name
     * @return object
     */
    public function UpdateRecordByPK($request,$id,$sub_id,$third_id,$file_name);

    /**
     * IDで1レコードを削除
     *
     * @var string $id
     * @var string $sub_id
     * @var string $third_id
     * @return object
     */
    public function deleteFirstRecordByPK($id,$sub_id,$third_id);

    /**
     * TOP 非開催表示用データ取得
     *
     * @var string $id
     * @return object
     */
    public function getRecordForTop($id);

    /**
     * イベントページのフロント表示用データを取得
     *
     * @var string $target_date
     * @var int $is_preview
     * @return object
     */
    public function getRecordForEvent($target_date,$is_preview);

}