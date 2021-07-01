<?php

namespace App\Repositories\FanData;

interface FanDataRepositoryInterface
{
    /**
     *  登録番号リストに当てはまるレコードを取得
     *
     * @var array $touban_list
     * @return object
     */
    public function getRecordByToubanList($touban_list);

    /**
     *  登録番号リストに当てはまるレコードを取得 級別にソート
     *
     * @var array $touban_list
     * @var int $pre_page
     * @return object
     */
    public function getSortedRecordByToubanList($touban_list,$pre_page);

    /**
     *  全データ取得
     *
     * @return object
     */
    public function getAllRecord();

    /**
     *  登録番号に当てはまるレコードを取得
     *
     * @var string $touban
     * @return object
     */
    public function getFirstRecordByTouban($touban);

    
    /**
     *  最新一件のレコードを取得
     *
     * @return object
     */
    public function getLastRecord();

}