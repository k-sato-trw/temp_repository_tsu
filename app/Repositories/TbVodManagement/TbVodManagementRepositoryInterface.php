<?php

namespace App\Repositories\TbVodManagement;

interface TbVodManagementRepositoryInterface
{

    /**
     * 出走書き出しの為に優勝レコード取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getYusyoRecordForSyussou($jyo,$target_date);

    /**
     * 出走書き出しの為にレコード取得、IDのルールが特殊なため、IDリストで指定
     *
     * @var string $jyo
     * @var array $movie_id_list
     * @return object
     */
    public function getRecordByMovieIdList($jyo,$movie_id_list);

    /**
     * 指定のムービーIDをもとにのレコード呼び出し
     *
     * @var string $jyo
     * @var string $movie_id
     * @return object
     */
    public function getFirstRecordByMovieId($jyo,$movie_id);

    /**
     * リプレイ用6節分のレコード取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function get6SetsuRepalyRecord($jyo,$start_date,$end_date);

    /**
     * リプレイ用1節分の展示レコード取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function get1SetsuTenjiRecord($jyo,$start_date,$end_date);

    /**
     * リプレイ用1節分のインタビューレコード取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function get1SetsuInterviewRecord($jyo,$start_date,$end_date);

    /**
     * リプレイ用優勝戦レコード取得
     *
     * @var string $jyo
     * @return object
     */
    public function getYushoRecord($jyo);

    /**
     * リプレイ用に一定範囲のレコードを取得取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getReplayRecordByDate($jyo,$start_date,$end_date);

    /**
     * 特定日の展示レコード取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getTenjiRecordByDate($jyo,$target_date);

}