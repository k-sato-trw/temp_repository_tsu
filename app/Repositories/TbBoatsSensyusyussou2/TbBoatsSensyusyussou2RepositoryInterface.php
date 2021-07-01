<?php

namespace App\Repositories\TbBoatsSensyusyussou2;

interface TbBoatsSensyusyussou2RepositoryInterface
{

    
    /**
     * 登録番号でレコードを取得
     *
     * @var string $touban
     * @var string $now_date
     * @return object
     */
    public function getRecordByTouban($touban,$now_date);

    /**
     * プロフィール表示用で当日1レコードを取得
     *
     * @var string $touban
     * @var string $now_date
     * @return object
     */
    public function getFirstTodayRecordForProfile($touban,$now_date);

    /**
     * プロフィール表示用で2日前までのレコードを取得
     *
     * @var string $touban
     * @var string $now_date
     * @return object
     */
    public function getBeforeRecordForProfile($touban,$now_date);

    /**
     * レース展望の出場者表示用で1節間レコードを取得
     *
     * @var string $jyo
     * @var string $target_start_date
     * @return object
     */
    public function get1SetuRecord($jyo,$target_start_date);

    /**
     * 東京NEXT表示用で該当登録番号の直近1レコードを取得
     *
     * @var string $touban
     * @var string $now_date
     * @return object
     */
    public function getRecentRecord($touban,$now_date);

}