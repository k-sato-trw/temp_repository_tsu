<?php

namespace App\Repositories\BangumiData;

use App\Models\BangumiData;

class BangumiDataRepository implements BangumiDataRepositoryInterface
{
    protected $BangumiData;

    /**
    * @param object $user
    */
    public function __construct(BangumiData $BangumiData)
    {
        $this->BangumiData = $BangumiData;
    }

    /**
     * JYO, TARGET_DATE で全レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getRecordByDate($jyo,$target_date)
    {
        return $this->BangumiData
                    ->where("場コード","=",$jyo)
                    ->where("開催日付","=",$target_date)
                    ->get();
    }

    
}