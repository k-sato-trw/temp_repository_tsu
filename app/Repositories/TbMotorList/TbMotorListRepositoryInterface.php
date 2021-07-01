<?php

namespace App\Repositories\TbMotorList;

interface TbMotorListRepositoryInterface
{

    /**
     * 一定の期間に属するレコードを抽出
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getNirenrituRanking($start_date,$end_date);

    /**
     * 日付で1レコードを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordBydate($target_date);

    
    /**
     * 日付で1レコードを取得
     *
     * @var string $motor_no
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getLatestRecordByMotorNo($motor_no,$start_date,$end_date);

    
    /**
     * イベント用に1レコードを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordForEvent($target_date);

}