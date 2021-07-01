<?php

namespace App\Repositories\TbMotorList;

use App\Models\TbMotorList;

class TbMotorListRepository implements TbMotorListRepositoryInterface
{
    protected $TbMotorList;

    /**
    * @param object $TbMotorList
    */
    public function __construct(TbMotorList $TbMotorList)
    {
        $this->TbMotorList = $TbMotorList;
    }

    /**
     * 一定の期間に属するレコードを抽出
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getNirenrituRanking($start_date,$end_date)
    {
        return $this->TbMotorList
                    ->select('MOTOR_NO','NIRENRITU')
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->where('NIRENRITU','!=','0.0')
                    ->groupBy('MOTOR_NO')
                    ->groupBy('NIRENRITU')
                    ->orderByRaw(' (NIRENRITU * 1) DESC')
                    ->get();
    }

    /**
     * 日付で1レコードを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordBydate($target_date)
    {
        return $this->TbMotorList
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->where('TARGET_DATE','=',$target_date)
                    ->orderBy('TARGET_DATE','desc')
                    ->first();
    }

    /**
     * 日付で1レコードを取得
     *
     * @var string $motor_no
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getLatestRecordByMotorNo($motor_no,$start_date,$end_date)
    {
        return $this->TbMotorList
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->where('MOTOR_NO','=',str_pad($motor_no, 3, '0', STR_PAD_LEFT))
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->orderBy('TARGET_DATE','desc')
                    ->first();
    }

    /**
     * イベント用に1レコードを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordForEvent($target_date)
    {

        return $this->TbMotorList
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->where('TARGET_DATE','>=',$target_date)
                    ->orderBy('TARGET_DATE','desc')
                    ->first();
    }


    

}