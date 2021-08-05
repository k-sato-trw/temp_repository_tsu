<?php

namespace App\Repositories\TbVodManagement;

use App\Models\TbVodManagement;

class TbVodManagementRepository implements TbVodManagementRepositoryInterface
{
    protected $TbVodManagement;

    /**
    * @param object $TbVodManagement
    */
    public function __construct(TbVodManagement $TbVodManagement)
    {
        $this->TbVodManagement = $TbVodManagement;
    }

    /**
     * 出走書き出しの為に優勝レコード取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getYusyoRecordForSyussou($jyo,$target_date)
    {
        return $this->TbVodManagement
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('CHECK_FLG','1')
                    ->where('YUSHO_FLG','1')
                    ->first();
    }

    /**
     * 優勝プレイバックの為にレコード取得(優勝戦が複数ある可能性)
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getYusyoRecordForPlayback($jyo,$target_date)
    {
        return $this->TbVodManagement
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('CHECK_FLG','1')
                    ->where('YUSHO_FLG','1')
                    ->get();
    }

    /**
     * 出走書き出しの為にレコード取得、IDのルールが特殊なため、IDリストで指定
     *
     * @var string $jyo
     * @var array $movie_id_list
     * @return object
     */
    public function getRecordByMovieIdList($jyo,$movie_id_list)
    {
        return $this->TbVodManagement
                    ->where('JYO','=',$jyo)
                    ->whereIn('MOVIE_ID',$movie_id_list)
                    ->where('CHECK_FLG','1')
                    ->orderBy('MOVIE_ID')
                    ->get();
    }

    /**
     * 指定のムービーIDをもとにのレコード呼び出し
     *
     * @var string $jyo
     * @var string $movie_id
     * @return object
     */
    public function getFirstRecordByMovieId($jyo,$movie_id)
    {
        return $this->TbVodManagement
                    ->where('JYO','=',$jyo)
                    ->where('MOVIE_ID',$movie_id)
                    ->where('CHECK_FLG','1')
                    ->first();
    }

    /**
     * リプレイ用6節分のレコード取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function get6SetsuRepalyRecord($jyo,$start_date,$end_date)
    {
        return $this->TbVodManagement
                    ->selectRaw(' * , SUBSTRING(MOVIE_ID,-2) as RACE_NUMBER')
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->where('MOVIE_ID','NOT LIKE','%99%')
                    ->where('MOVIE_ID','NOT LIKE','Interview%')
                    ->where('MOVIE_ID','NOT LIKE','%test')
                    ->where('CHECK_FLG','1')
                    ->get();
    }

    /**
     * リプレイ用1節分の展示レコード取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function get1SetsuTenjiRecord($jyo,$start_date,$end_date)
    {
        return $this->TbVodManagement
                    ->selectRaw(' * , SUBSTRING(MOVIE_ID,-2) as RACE_NUMBER')
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->where('MOVIE_ID','LIKE','%99%')
                    ->where('MOVIE_ID','NOT LIKE','Interview%')
                    ->where('MOVIE_ID','NOT LIKE','%test')
                    ->where('CHECK_FLG','1')
                    ->get();
    }

    /**
     * リプレイ用1節分のインタビューレコード取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function get1SetsuInterviewRecord($jyo,$start_date,$end_date)
    {
        return $this->TbVodManagement
                    ->selectRaw(' * , SUBSTRING(MOVIE_ID,-2) as RACE_NUMBER')
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->where('MOVIE_ID','NOT LIKE','%99%')
                    ->where('MOVIE_ID','LIKE','Interview%')
                    ->where('MOVIE_ID','NOT LIKE','%test')
                    ->where('CHECK_FLG','1')
                    ->get();
    }

    /**
     * リプレイ用優勝戦レコード取得
     *
     * @var string $jyo
     * @return object
     */
    public function getYushoRecord($jyo)
    {
        $target_date = date('Ymd',strtotime('-1 year',strtotime(date('Ymd'))));
        return $this->TbVodManagement
                    ->selectRaw(' * , SUBSTRING(MOVIE_ID,-2) as RACE_NUMBER')
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','>=',$target_date)
                    ->where('MOVIE_ID','NOT LIKE','%99%')
                    ->where('MOVIE_ID','NOT LIKE','Interview%')
                    ->where('MOVIE_ID','NOT LIKE','%test')
                    ->where('CHECK_FLG','1')
                    ->where('YUSHO_FLG','1')
                    ->orderBy('TARGET_DATE','DESC')
                    ->orderBy('MOVIE_ID','DESC')
                    ->get();
    }


    /**
     * リプレイ用に一定範囲のレコードを取得取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getReplayRecordByDate($jyo,$start_date,$end_date)
    {
        return $this->TbVodManagement
                    ->selectRaw(' * , SUBSTRING(MOVIE_ID,-2) as RACE_NUMBER')
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->where('MOVIE_ID','NOT LIKE','%99%')
                    ->where('MOVIE_ID','NOT LIKE','Interview%')
                    ->where('MOVIE_ID','NOT LIKE','%test')
                    ->where('CHECK_FLG','1')
                    ->get();
    }

    /**
     * 特定日の展示レコード取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getTenjiRecordByDate($jyo,$target_date)
    {
        return $this->TbVodManagement
                    ->selectRaw(' * , SUBSTRING(MOVIE_ID,-2) as RACE_NUMBER')
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('MOVIE_ID','LIKE','%99%')
                    ->where('MOVIE_ID','NOT LIKE','Interview%')
                    ->where('MOVIE_ID','NOT LIKE','%test')
                    ->where('CHECK_FLG','1')
                    ->get();
    }

}