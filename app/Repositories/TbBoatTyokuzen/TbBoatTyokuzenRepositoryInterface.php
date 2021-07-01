<?php

namespace App\Repositories\TbBoatTyokuzen;

interface TbBoatTyokuzenRepositoryInterface
{
    /**
     * JYO, TARGET_DATE, RACE_NUM で該当レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getRecordByPK($jyo,$target_date,$race_num);

    /**
     * JYO, TARGET_DATE, RACE_NUM で該当レコードを取得
     * CG表示用コース番号順
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getRecordForCg($jyo,$target_date,$race_num);

    /**
     * JYO, TARGET_DATE, 直近スタートの展示レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getRecentTenjiRecord($jyo,$target_date);

}