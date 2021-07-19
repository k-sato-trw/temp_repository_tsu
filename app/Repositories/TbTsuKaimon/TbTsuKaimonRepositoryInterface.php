<?php

namespace App\Repositories\TbTsuKaimon;

interface TbTsuKaimonRepositoryInterface
{

    /**
     * IDで1レコードを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordByPK($target_date);


    /**
     * 一月分のデータ呼び出し
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getOneMonthRecord($start_date,$end_date);

    /**
     * 日付リストに基づき複数行をアップサート処理
     *
     * @var array $date_list
     * @var object $request
     * @return object
     */
    public function upsertRecordByDateList($date_list,$request);

    /**
     * 日付リストに基づき複数行をデリート処理
     *
     * @var array $date_list
     * @return object
     */
    public function deleteRecordByDateList($date_list);

    /**
     * 年月を指定して掲載フラグをアップデート
     *
     * @var string $target_year_month
     * @var int $appear_flg
     * @return object
     */
    public function changeAppearFlg($target_year_month,$appear_flg);

    /**
     * フロント展望表示用データ呼び出し
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getOneMonthRecordForFront($start_date,$end_date);

}