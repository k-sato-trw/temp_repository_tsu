<?php

namespace App\Repositories\TbBoatsYusyoracer;

use App\Models\TbBoatsYusyoracer;

class TbBoatsYusyoracerRepository implements TbBoatsYusyoracerRepositoryInterface
{
    protected $TbBoatsYusyoracer;

    /**
    * @param object $TbBoatsYusyoracer
    */
    public function __construct(TbBoatsYusyoracer $TbBoatsYusyoracer)
    {
        $this->TbBoatsYusyoracer = $TbBoatsYusyoracer;
    }

    /**
     * 登録番号でレコード取得
     *
     * @var string $touban
     * @return object
     */
    public function getfirstRecordByTouban($touban)
    {
        return $this->TbBoatsYusyoracer
                    ->where('TOUBAN','=',$touban)
                    ->orderBy('TARGET_DATE', 'desc')
                    ->first();
    }

    /**
     * 登録番号と指定期間でレコード数取得
     *
     * @var string $jyo
     * @var string $touban
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getCountTouchiYusyoBitweenDate($jyo,$touban,$start_date,$end_date)
    {
        return $this->TbBoatsYusyoracer
                    ->where('TOUBAN','=',$touban)
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->count();
    }

    /**
     * 登録番号と指定期間で全場レコード数取得
     *
     * @var string $touban
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getCountYusyoBitweenDate($touban,$start_date,$end_date)
    {
        return $this->TbBoatsYusyoracer
                    ->where('TOUBAN','=',$touban)
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->count();
    }

    /**
     * 登録番号リストから最終レコード取得
     *
     * @var string $touban_list
     * @return object
     */
    public function getfirstRecordByToubanList($touban_list)
    {
        return $this->TbBoatsYusyoracer
                    ->whereIn('TOUBAN',$touban_list)
                    ->orderBy('TARGET_DATE', 'desc')
                    ->orderBy('JYO', 'asc')
                    ->orderBy('RACE_NUMBER', 'asc')
                    ->first();
    }


    /**
     * 登録番号リストから一月の優勝レコード取得
     *
     * @var string $touban_list
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordByToubanList($touban_list,$start_date,$end_date)
    {
        return $this->TbBoatsYusyoracer
                    ->whereIn('TOUBAN',$touban_list)
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->orderBy('TARGET_DATE', 'desc')
                    ->orderBy('JYO', 'asc')
                    ->orderBy('RACE_NUMBER', 'asc')
                    ->get();
    }

    /**
     * 登録番号リストから指定日付より未来のSG優勝レコード取得
     *
     * @var string $touban_list
     * @var string $target_date
     * @return object
     */
    public function getSgRecordForSgHistory($touban_list,$target_date)
    {
        return $this->TbBoatsYusyoracer
                    ->whereIn('TOUBAN',$touban_list)
                    ->where('TARGET_DATE','>',$target_date)
                    ->where('GRADE_CODE','=','0')
                    ->orderBy('TARGET_DATE', 'asc')
                    ->orderBy('JYO', 'asc')
                    ->orderBy('RACE_NUMBER', 'asc')
                    ->get();
    }

    

}