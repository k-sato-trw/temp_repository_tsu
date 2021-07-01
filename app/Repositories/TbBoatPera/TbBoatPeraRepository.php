<?php

namespace App\Repositories\TbBoatPera;

use App\Models\TbBoatPera;

class TbBoatPeraRepository implements TbBoatPeraRepositoryInterface
{
    protected $TbBoatPera;

    /**
    * @param object $TbBoatPera
    */
    public function __construct(TbBoatPera $TbBoatPera)
    {
        $this->TbBoatPera = $TbBoatPera;
    }


    /**
     * レース単位でプロペラ情報を取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getRecordForOneRace($jyo,$target_date,$race_num)
    {
        return $this->TbBoatPera
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('RACE_NUMBER','=',$race_num)
                    ->orderBy('TEIBAN')
                    ->get();
    }

}