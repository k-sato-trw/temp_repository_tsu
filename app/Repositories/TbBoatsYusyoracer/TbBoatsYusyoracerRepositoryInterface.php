<?php

namespace App\Repositories\TbBoatsYusyoracer;

interface TbBoatsYusyoracerRepositoryInterface
{

    /**
     * 登録番号でレコード取得
     *
     * @var string $touban
     * @return object
     */
    public function getfirstRecordByTouban($touban);

    /**
     * 登録番号と指定期間でレコード数取得
     *
     * @var string $jyo
     * @var string $touban
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getCountTouchiYusyoBitweenDate($jyo,$touban,$start_date,$end_date);

    /**
     * 登録番号と指定期間で全場レコード数取得
     *
     * @var string $touban
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getCountYusyoBitweenDate($touban,$start_date,$end_date);

    /**
     * 登録番号リストから最終レコード取得
     *
     * @var string $touban_list
     * @return object
     */
    public function getfirstRecordByToubanList($touban_list);

    /**
     * 登録番号リストから一月の優勝レコード取得
     *
     * @var string $touban_list
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordByToubanList($touban_list,$start_date,$end_date);

    /**
     * 登録番号リストから指定日付より未来のSG優勝レコード取得
     *
     * @var string $touban_list
     * @var string $target_date
     * @return object
     */
    public function getSgRecordForSgHistory($touban_list,$target_date);

    /**
     * 登録番号かつ指定日付より未来レコード取得
     *
     * @var string $touban
     * @var string $target_date
     * @return object
     */
    public function getFutureRecord($touban,$target_date);
}