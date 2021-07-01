<?php

namespace App\Repositories\TbRaceSyutujoWriteLog;

interface TbRaceSyutujoWriteLogRepositoryInterface
{

    /**
     * IDレストをもとにをレコード取得
     *
     * @var array $id_list
     * @return object
     */
    public function getRecordByIdlist($id_list);
    
    /**
     * IDで1レコードを削除
     *
     * @var string $id
     * @return object
     */
    public function deleteFirstRecordByPK($id);

    /**
     * IDで1レコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordByPK($id);

    /**
     * フロント表示用にIDレストをもとにをレコード取得 
     *
     * @var array $id_list
     * @return object
     */
    public function getRecordByIdlistForFront($id_list);

    /**
     * 出場表出力の記録処理
     *
     * @var string $id
     * @var string $jyo
     * @var array $log_data
     * @var string $device
     * @var string $is_success
     * @return object
     */
    public function upsertLog($id,$jyo,$log_data,$device,$is_success);

}