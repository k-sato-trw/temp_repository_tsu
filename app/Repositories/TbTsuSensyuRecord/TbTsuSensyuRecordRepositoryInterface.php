<?php

namespace App\Repositories\TbTsuSensyuRecord;

interface TbTsuSensyuRecordRepositoryInterface
{

    /**
     * IDで1レコードを取得
     *
     * @var string $touban
     * @return object
     */
    public function getFirstRecordByPK($touban);

    /**
     * インサート処理
     *
     * @var array  $insert_data
     * @return object
     */
    public function insertRecord($insert_data);

    /**
     * IDをキーにしてアップデート
     *
     * @var array  $update_data
     * @var string $touban
     * @return object
     */
    public function UpdateRecordByPK($update_data,$touban);

}