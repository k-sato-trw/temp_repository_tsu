<?php

namespace App\Repositories\FandataManual;

use App\Models\FandataManual;

class FandataManualRepository implements FandataManualRepositoryInterface
{
    protected $FandataManual;

    /**
    * @param object $FandataManual
    */
    public function __construct(FandataManual $FandataManual)
    {
        $this->FandataManual = $FandataManual;
    }


    /**
     *  登録番号リストから指定した年と期に当てはまるレコードを取得
     *
     * @var array $touban_list
     * @var int $year
     * @var int $period
     * @return object
     */
    public function getRecordByYearAndPeriod($touban_list,$year,$period)
    {        
        return $this->FandataManual
                    ->whereIn("Touban",$touban_list)
                    ->where("Nen",$year)
                    ->where("Ki",$period)
                    ->get();
    }

    /**
     * 最新1レコードを取得
     *
     * @return object
     */
    public function getLatestRecord()
    {
        return $this->FandataManual
                    ->orderBy('KiStart','DESC')
                    ->first();
    }

    /**
     *  登録番号リストに当てはまるレコードを取得
     *
     * @var array $touban_list
     * @var string $next_kibetu
     * @return object
     */
    public function getRecordByToubanList($touban_list,$next_kibetu)
    {        
        $nen = substr($next_kibetu,0,4);
        $ki =  substr($next_kibetu,4,1);
        return $this->FandataManual
                    ->whereIn("Touban",$touban_list)
                    ->where("Nen",$nen)
                    ->where("Ki",$ki)
                    ->orderBy("Touban","ASC")
                    ->get();
    }

}