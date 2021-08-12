<?php

namespace App\Repositories\TbTsuTopic;

interface TbTsuTopicRepositoryInterface
{

    /**
     * 全レコードをページネイトで取得
     *
     * @var string $pre_page
     * @return object
     */
    public function getAllRecord($pre_page);


    /**
     * 日付基準で現在表示対象になっているレコード取得
     *
     * @var string $target_date
     * @var string $device
     * @return object
     */
    public function getAppearRecord($target_date,$device);

    /**
     * 予備レコード取得
     *
     * @return object
     */
    public function getYobiRecord();

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
     * IDをキーにしてアップデート
     *
     * @var object $request
     * @var string $id
     * @var string $file_name
     * @return object
     */
    public function UpdateRecordByPK($request,$id,$file_name);

    /**
     * IDで1レコードを削除
     *
     * @var string $id
     * @return object
     */
    public function deleteFirstRecordByPK($id);


    /**
     * 日付文字列とモード判定で重複データチェック
     *
     * @var string $target_datetime
     * @var int $view_point
     * @var int $id
     * @return int
     */
    public function checkDuplicate($target_datetime,$view_point,$id);

    
    /**
     * フロント用日付基準で現在表示対象になっているレコード取得
     *
     * @var string $target_date
     * @var string $device
     * @return object
     */
    public function getAppearRecordForFront($target_date,$device,$is_preview=false);

}