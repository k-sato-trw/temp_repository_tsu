<?php

namespace App\Repositories\TbBoatsSensyusyussou2;

use App\Models\TbBoatsSensyusyussou2;

class TbBoatsSensyusyussou2Repository implements TbBoatsSensyusyussou2RepositoryInterface
{
    protected $TbBoatsSensyusyussou2;

    /**
    * @param object $TbBoatsSensyusyussou2
    */
    public function __construct(TbBoatsSensyusyussou2 $TbBoatsSensyusyussou2)
    {
        $this->TbBoatsSensyusyussou2 = $TbBoatsSensyusyussou2;
    }


    /**
     * 登録番号でレコードを取得
     *
     * @var string $touban
     * @var string $now_date
     * @return object
     */
    public function getRecordByTouban($touban,$now_date)
    {
        return $this->TbBoatsSensyusyussou2
                    ->select('TARGET_STARTDATE', 'TARGET_ENDDATE', 'RACE_TITLE','JYO')
                    ->where([['TOUBAN','=',$touban],['TARGET_ENDDATE','>=',$now_date]])
                    ->groupBy('TARGET_STARTDATE', 'TARGET_ENDDATE', 'RACE_TITLE','JYO')
                    ->get();
    }

     /**
     * プロフィール表示用で当日1レコードを取得
     *
     * @var string $touban
     * @var string $now_date
     * @return object
     */
    public function getFirstTodayRecordForProfile($touban,$now_date)
    {
        return $this->TbBoatsSensyusyussou2
                    ->where('TOUBAN','=',$touban)
                    ->where('TARGET_STARTDATE','<=',$now_date)
                    ->where('TARGET_ENDDATE','>=',$now_date)
                    ->orderBy('TARGET_DATE', 'DESC')
                    ->orderBy('TARGET_STARTDATE', 'ASC')
                    ->first();
    }

    /**
     * プロフィール表示用で2日前までのレコードを取得
     *
     * @var string $touban
     * @var string $now_date
     * @return object
     */
    public function getBeforeRecordForProfile($touban,$now_date)
    {
        return $this->TbBoatsSensyusyussou2
                    ->where('TOUBAN','=',$touban)
                    ->where('TARGET_ENDDATE','>=',$now_date)
                    ->where('TARGET_DATE','>',date('Ymd',strtotime('-2 day',strtotime($now_date))))
                    ->orderBy('TARGET_DATE', 'DESC')
                    ->orderBy('TARGET_STARTDATE', 'ASC')
                    ->get();
    }
    
    /**
     * レース展望の出場者表示用で1節間レコードを取得
     *
     * @var string $jyo
     * @var string $target_start_date
     * @return object
     */
    public function get1SetuRecord($jyo,$target_start_date)
    {
        return $this->TbBoatsSensyusyussou2
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_STARTDATE','=',$target_start_date)
                    ->orderBy('TOUBAN', 'ASC')
                    ->get();
    }

    /**
     * 東京NEXT表示用で該当登録番号の直近4レコードを取得
     *
     * @var string $touban
     * @var string $now_date
     * @return object
     */
    public function getRecentRecord($touban,$now_date)
    {
        return $this->TbBoatsSensyusyussou2
                    ->where('TOUBAN','=',$touban)
                    ->where('TARGET_STARTDATE','>',$now_date)
                    ->orderBy('TARGET_DATE', 'DESC')
                    ->orderBy('TARGET_STARTDATE', 'ASC')
                    ->limit(4)
                    ->get();
    }

}