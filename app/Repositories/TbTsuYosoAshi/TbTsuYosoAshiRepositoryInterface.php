<?php

namespace App\Repositories\TbTsuYosoAshi;

interface TbTsuYosoAshiRepositoryInterface
{

    /**
     * IDで1レコードを取得
     *
     * @var string $touban
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getLatestRecordByTouban($touban,$start_date,$end_date);


    /**
     * IDリストと日付でレコードを取得
     *
     * @var array $touban_list
     * @var string $target_date
     * @return object
     */
    public function getRecordByToubanList($touban_list,$target_date);

    /**
     * IDリスト除外と日付でレコードを取得
     *
     * @var array $touban_list
     * @var string $target_date
     * @return object
     */
    public function getRecordNotToubanList($touban_list,$target_date);

    /**
     * 帰郷フラグと日付でレコードを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getKikyouRecordByToubanList($target_date);

    /**
     * 新規作成処理
     *
     * @var object  $request
     * @return object
     */
    public function insertRecord($request);

    /**
     * アップサート処理
     *
     * @var array  $insert_data
     * @return object
     */
    public function upsertRecord($insert_data);


    /**
     * コピー自動処理用呼び出し　翌日データが無い場合、今日用のデータを明日にコピーする
     *
     * @var string $target_date
     * @var string $tomorrow_date
     * @return object
     */
    public function copyTomorrow($target_date,$tomorrow_date);

}