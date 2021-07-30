<?php

namespace App\Repositories\KaisaiMaster;

interface KaisaiMasterRepositoryInterface
{
    /**
     * JYO, TARGET_DATE で期間に当てはまる一件を取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordByDateBitween($jyo,$target_date);
    
    /**
     * JYO, TARGET_DATE で該当日一日のみを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordByDate($jyo,$target_date);

    /**
     * JYO, TARGET_DATE から一番近い日付のレコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getRecentRecordByDate($jyo,$target_date);

    /**
     * JYO, で最新日のみを取得
     *
     * @var string $jyo
     * @return object
     */
    public function getLastRecordByDate($jyo);

    /**
     * JYO, TARGET_DATE から終了したレースで一番近い日付のレコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getEndRecordByDate($jyo,$target_date);

    /**
     * 月の開催レースを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getOneMonthRecord($jyo,$start_date,$end_date);
    

    /**
     * プロフィール出力用にレコード取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordForProfile($jyo,$target_date);

    /**
     * 汎用フロント用にレコード取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordForFront($jyo,$target_date);

    /**
     * JYO, TARGET_DATE から直近の日付のレコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getRecentRecordForFront($jyo,$target_date);

    
    /**
     * JYO, TARGET_DATE から当日含め過去6節分の直近のレコードを6件取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function get6RecordForReplay($jyo,$target_date);

    /**
     * JYO, TARGET_DATE で期間に当てはまる全場開催を取得
     *
     * @var string $target_date
     * @return object
     */
    public function getAllJyoRecordByDateBitween($target_date);

    /**
     * JYO, TARGET_DATE から当日含め過去2節分の直近のレコードを2件取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function get2RecordForReplay($jyo,$target_date);

    /**
     * 結果検索用　一定期間の開催レースを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordForResult($jyo,$start_date,$end_date);

}