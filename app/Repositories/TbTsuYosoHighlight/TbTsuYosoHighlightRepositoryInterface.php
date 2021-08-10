<?php

namespace App\Repositories\TbTsuYosoHighlight;

interface TbTsuYosoHighlightRepositoryInterface
{

    /**
     * 管理サイト表示用　指定日付のデータを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordByDate($target_date);

    /**
     * アップサート処理
     *
     * @var object  $request
     * @return object
     */
    public function upsertRecord($request);

    /**
     * 一定範囲の日付のデータを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordBitweenDate($jyo,$start_date,$end_date);

    /**
     * フロント表示用　指定日付のデータを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $is_preview
     * @return object
     */
    public function getFirstRecordForFront($jyo,$target_date,$is_preview = false);

    /**
     * SPフロント表示用　節間日付のデータを全て取得
     *
     * @var string $jyo
     * @var array $target_date_list
     * @var string $is_preview
     * @return object
     */
    public function getRecordForFront($jyo,$target_date_list,$is_preview = false);

}