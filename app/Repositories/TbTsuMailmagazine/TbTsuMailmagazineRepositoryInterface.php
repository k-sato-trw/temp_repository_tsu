<?php

namespace App\Repositories\TbTsuMailmagazine;

interface TbTsuMailmagazineRepositoryInterface
{

    /**
     * 一月分のレコード取得
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getOneMonthRecord($start_date,$end_date);

    /**
     * IDで1レコードを取得
     *
     * @var string $target_date
     * @var string $id
     * @return object
     */
    public function getFirstRecordByPK($target_date,$id);

    /**
     * 最大IDのレコードを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getLastRecord($target_date);

    /**
     * インサート処理
     *
     * @var object  $request
     * @var string $target_date
     * @return object
     */
    public function insertRecord($request,$target_date);

    /**
     * IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $target_date
     * @var string $id
     * @return object
     */
    public function UpdateRecordByPK($request,$target_date,$id);

    /**
     * IDで1レコードを削除
     *
     * @var string $target_date
     * @var string $id
     * @return object
     */
    public function deleteFirstRecordByPK($target_date,$id);

}