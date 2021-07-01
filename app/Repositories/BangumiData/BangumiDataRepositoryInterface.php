<?php

namespace App\Repositories\BangumiData;

interface BangumiDataRepositoryInterface
{
    /**
     * JYO, TARGET_DATE で全レコードを取得
     *
     * @var string $JYO
     * @var string $TARGET_DATE
     * @return object
     */
    public function getRecordByDate($jyo,$target_date);
}