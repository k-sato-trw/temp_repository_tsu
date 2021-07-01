<?php

namespace App\Repositories\TbGambooYosoSensyu;

use App\Models\TbGambooYosoSensyu;

class TbGambooYosoSensyuRepository implements TbGambooYosoSensyuRepositoryInterface
{
    protected $TbGambooYosoSensyu;

    /**
    * @param object $TbGambooYosoSensyu
    */
    public function __construct(TbGambooYosoSensyu $TbGambooYosoSensyu)
    {
        $this->TbGambooYosoSensyu = $TbGambooYosoSensyu;
    }

    /**
     * 1レース分のレコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getOneRaceRecord($jyo,$target_date,$race_num)
    {
        return $this->TbGambooYosoSensyu
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('RACE_NUMBER','=',$race_num)
                    ->orderBy('TEIBAN', 'asc')
                    ->get();
    }


}