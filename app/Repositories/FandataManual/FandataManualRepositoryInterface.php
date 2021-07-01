<?php

namespace App\Repositories\FandataManual;

interface FandataManualRepositoryInterface
{

    /**
     * 最新1レコードを取得
     *
     * @return object
     */
    public function getLatestRecord();

    /**
     *  登録番号リストに当てはまるレコードを取得
     *
     * @var array $touban_list
     * @var string $next_kibetu
     * @return object
     */
    public function getRecordByToubanList($touban_list,$next_kibetu);

}