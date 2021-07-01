<?php

namespace App\Repositories\RensyoKekka;

use App\Models\RensyoKekka;

class RensyoKekkaRepository implements RensyoKekkaRepositoryInterface
{
    protected $RensyoKekka;

    /**
    * @param object $RensyoKekka
    */
    public function __construct(RensyoKekka $RensyoKekka)
    {
        $this->RensyoKekka = $RensyoKekka;
    }

    /**
     * IDで1レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordForFront($jyo,$target_date)
    {
        return $this->RensyoKekka
                    ->where('場コード',$jyo)
                    ->where('開催日付','=',$target_date)
                    ->orderBy('レース番号','DESC')
                    ->first();
    }

}