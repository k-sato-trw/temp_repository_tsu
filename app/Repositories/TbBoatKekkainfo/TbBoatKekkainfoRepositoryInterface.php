<?php

namespace App\Repositories\TbBoatKekkainfo;

interface TbBoatKekkainfoRepositoryInterface
{

    /**
     * 場コードと日付で取得出来る最終レースナンバーレコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getLastRaceNumberRecordByPK($jyo,$target_date);

    /**
     * 場コードと日付とレースナンバーでレコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_number
     * @return object
     */
    public function getFirstRecordByPK($jyo,$target_date,$race_number);

    /**
     * 場コードと日付でそのレースの全レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getRecordByDate($jyo,$target_date);

    /**
     * レース番号基準でレース結果検索用レコードを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @var array  $race_num_list
     * 
     * @return object
     */
    public function getRaceKekkaByRaceNum($jyo,$start_date,$end_date,$race_num_list);

    /**
     * 登録番号でレース結果検索用レコードを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @var string $touban
     * 
     * @return object
     */
    public function getRaceKekkaByTouban($jyo,$start_date,$end_date,$touban);

    /**
     * 出目基準でレース結果検索用レコードを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @var array  $deme_list
     * @var string  $deme_len
     * 
     * @return object
     */
    public function getRaceKekkaByDemeList($jyo,$start_date,$end_date,$deme_list,$deme_len);

    /**
     * 登録番号でレース結果検索用レコードを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @var string $kimarite
     * 
     * @return object
     */
    public function getRaceKekkaByKimarite($jyo,$start_date,$end_date,$kimarite);

    /**
     * wakuristuページ用一年分レコードを取得
     *
     * @var string $jyo
     * @var int $race_num
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordForWakuritsu($jyo,$race_num,$start_date,$end_date);

    /**
     * 3連単着順有のレースで抽出
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getRecordForKishaTenji($jyo,$target_date,$race_num);

    /**
     * 一定期間のレースを抽出
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordForTekichuritsu($jyo,$start_date,$end_date);

    /**
     * 出目集計用　一定期間のレースを抽出
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordForDeme($jyo,$start_date,$end_date);

    /**
     * 配当金集計用　一定期間のレースを抽出
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordForHaito($jyo,$start_date,$end_date);

}