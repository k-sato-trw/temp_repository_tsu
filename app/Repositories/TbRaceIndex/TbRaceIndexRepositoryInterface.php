<?php

namespace App\Repositories\TbRaceIndex;

interface TbRaceIndexRepositoryInterface
{

    /**
     * レコード取得、日付があった場合は日付判定
     *
     * @var int $pre_page
     * @var string $date_ymd
     * @return object
     */
    public function getRecord($pre_page,$date_ymd = "");
    
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
     * @return object
     */
    public function insertRecord($request);
    
    /**
     * IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @return object
     */
    public function UpdateRecordByPK($request,$id);
    
    /**
     * IDで1レコードを削除
     *
     * @var string $id
     * @return object
     */
    public function deleteFirstRecordByPK($id);

    /**
     * フロントカレンダー用レコードを取得
     *
     * @var string $now_year
     * @var string $now_month
     * @return object
     */
    public function getRecordForCalendar($now_year,$now_month);

    
    /**
     * TOPピックアップ表示用レコードを取得
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getFirstRecordForPickup($start_date,$end_date);

    /**
     * まだ終了していないレコードを取得
     *
     * @var string $taget_date
     * @return object
     */
    public function getUnfinishedRecord($taget_date);


    /**
     * カレンダー用に展望レコードとjoinしたものを取得
     *
     * @var string $now_year
     * @var string $now_month
     * @return object
     */
    public function getTenboForCalendar($now_year,$now_month);

}