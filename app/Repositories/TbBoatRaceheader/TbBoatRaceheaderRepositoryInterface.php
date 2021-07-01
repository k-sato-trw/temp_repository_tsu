<?php

namespace App\Repositories\TbBoatRaceheader;

interface TbBoatRaceheaderRepositoryInterface
{

    /**
     * 場コードと日付で1レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordByPK($jyo,$target_date);

    /**
     * 場コードと日付リストでレコードを取得
     *
     * @var string $jyo
     * @var array $date_list
     * @return object
     */
    public function getRecordByDateList($jyo,$date_list);

    
    /**
     * 日付で全場レコードを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getAllJyoRecordByDate($target_date);

}