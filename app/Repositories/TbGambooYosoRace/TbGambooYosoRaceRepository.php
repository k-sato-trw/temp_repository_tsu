<?php

namespace App\Repositories\TbGambooYosoRace;

use App\Models\TbGambooYosoRace;

class TbGambooYosoRaceRepository implements TbGambooYosoRaceRepositoryInterface
{
    protected $TbGambooYosoRace;

    /**
    * @param object $TbGambooYosoRace
    */
    public function __construct(TbGambooYosoRace $TbGambooYosoRace)
    {
        $this->TbGambooYosoRace = $TbGambooYosoRace;
    }

    /**
     * 1レース分のレコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getOneRaceFirstRecord($jyo,$target_date,$race_num)
    {
        return $this->TbGambooYosoRace
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('RACE_NUMBER','=',$race_num)
                    ->first();
    }

}