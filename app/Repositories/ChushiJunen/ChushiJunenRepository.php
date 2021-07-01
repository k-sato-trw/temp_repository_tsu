<?php

namespace App\Repositories\ChushiJunen;

use App\Models\ChushiJunen;

class ChushiJunenRepository implements ChushiJunenRepositoryInterface
{
    protected $ChushiJunen;

    /**
    * @param object $ChushiJunen
    */
    public function __construct(ChushiJunen $ChushiJunen)
    {
        $this->ChushiJunen = $ChushiJunen;
    }

    /**
     * 時間で1レコードを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordByDate($target_date)
    {
        return $this->ChushiJunen
                    ->where('場コード','=',config('const.JYO_CODE'))
                    ->where('中止開始レース番号','<',7)
                    ->where(function($query) {
                        $query->where('開催区分', '000')
                              ->orWhere('開催区分', '0');
                    })
                    ->where('中止日付','=',$target_date)
                    ->first();
    }

    /**
     * フロント表示用に判定を取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordForFront($jyo,$target_date)
    {

        return $this->ChushiJunen
                    ->where('場コード','=',$jyo)
                    ->where(function($query) {
                        $query->where('開催区分', '000')
                              ->orWhere('開催区分', '0')
                              ->orWhere('開催区分', Null);
                    })
                    ->where('中止日付','=',$target_date)
                    ->where('掲載フラグ','=','1')
                    ->first();
    }

    /**
     * フロントカレンダー表示用に本場中止レコードを取得
     *
     * @var int $now_year
     * @var int $now_month
     * @return object
     */
    public function getHonjyoChushiRecordForClendar($now_year,$now_month)
    {

        $taget_year_month = date("Ym",strtotime($now_year."/".$now_month."/1"));

        return $this->ChushiJunen
                    ->where('場コード','=',config('const.JYO_CODE'))
                    ->where(function($query) {
                        $query->where('開催区分', '000')
                              ->orWhere('開催区分', '0')
                              ->orWhere('開催区分', Null);
                    })
                    ->where('中止日付','LIKE',$taget_year_month."%")
                    ->where('掲載フラグ','=','1')
                    ->get();
    }

    

    /**
     * フロントカレンダー表示用に本場以外の中止レコードを取得
     *
     * @var int $now_year
     * @var int $now_month
     * @return object
     */
    public function getJyogaiChushiRecordForClendar($now_year,$now_month)
    {

        $taget_year_month = date("Ym",strtotime($now_year."/".$now_month."/1"));

        return $this->ChushiJunen
                    ->where('場コード','=',config('const.JYO_CODE'))
                    ->where(function($query) {
                        $query->where('開催区分','LIKE', '1%')
                              ->orWhere('開催区分','LIKE', '2%');
                    })
                    ->where('中止日付','LIKE',$taget_year_month."%")
                    ->where('掲載フラグ','=','1')
                    ->get();
    }

     /**
     * フロントカレンダー表示用に劇場日中の中止レコードを取得
     *
     * @var int $now_year
     * @var int $now_month
     * @return object
     */
    public function getGekijyoChushiRecordForClendar($now_year,$now_month)
    {

        $taget_year_month = date("Ym",strtotime($now_year."/".$now_month."/1"));

        return $this->ChushiJunen
                    ->where('場コード','=',config('const.JYO_CODE'))
                    ->where(function($query) {
                        $query->where('開催区分','LIKE', '1%')
                              ->orWhere('開催区分','LIKE', '2%')
                              ->orWhere('開催区分', '000')
                              ->orWhere('開催区分', '0');
                    })
                    ->where('中止日付','LIKE',$taget_year_month."%")
                    ->where('掲載フラグ','=','1')
                    ->get();
    }

    /**
     * フロントTOP表示用に指定日の中止レコードをすべて取得
     *
     * @var string $target_date
     * @return object
     */
    public function getChushiRecordForTop($target_date)
    {

        return $this->ChushiJunen
                    ->where('場コード','=',config('const.JYO_CODE'))
                    ->where(function($query) {
                        $query->where('開催区分','LIKE', '1%')
                              ->orWhere('開催区分','LIKE', '2%');
                    })
                    ->where('中止日付','=',$target_date."%")
                    ->where('掲載フラグ','=','1')
                    ->get();
    }

    /**
     * フロントTOP表示用に指定範囲日の中止レコードを取得
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getChushiRecordBitweenDate($start_date,$end_date)
    {

        return $this->ChushiJunen
                    ->where('場コード','=',config('const.JYO_CODE'))
                    ->where(function($query) {
                        $query->where('開催区分','=', '000')
                              ->orWhere('開催区分','=', '0');
                    })
                    ->where('中止日付','>=',$start_date)
                    ->where('中止日付','<=',$end_date)
                    ->where('掲載フラグ','=','1')
                    ->get();
    }
    
}
