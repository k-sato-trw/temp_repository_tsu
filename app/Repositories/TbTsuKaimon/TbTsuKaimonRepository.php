<?php

namespace App\Repositories\TbTsuKaimon;

use App\Models\TbTsuKaimon;

class TbTsuKaimonRepository implements TbTsuKaimonRepositoryInterface
{
    protected $TbTsuKaimon;

    /**
    * @param object $TbTsuKaimon
    */
    public function __construct(TbTsuKaimon $TbTsuKaimon)
    {
        $this->TbTsuKaimon = $TbTsuKaimon;
    }

    
    /**
     * IDで1レコードを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordByPK($target_date)
    {
        return $this->TbTsuKaimon
                    ->where('TARGET_DATE','=',$target_date)
                    ->first();
    }


    /**
     * 一月分のデータ呼び出し
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getOneMonthRecord($start_date,$end_date)
    {
        return $this->TbTsuKaimon
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->orderBy('TARGET_DATE','asc')
                    ->get();
    }

    /**
     * 日付リストに基づき複数行をアップサート処理
     *
     * @var array $date_list
     * @var object $request
     * @return object
     */
    public function upsertRecordByDateList($date_list,$request)
    {

        $result = [];
        $now_datetime = date('YmdHi');

        foreach($date_list as $target_date){

            $result[] =  $this->TbTsuKaimon
                    ->upsert([
                        'TARGET_DATE' => $target_date,
                        'KAIMON_TIME' => $request->input('KAIMON_TIME'),
                        'ST_TIME' => $request->input('ST_TIME'),
                        'APPEAR_FLG' => $request->input('APPEAR_FLG'),
                        'RESIST_TIME' => $now_datetime,
                        'UPDATE_TIME' => $now_datetime,
                    ],
                    ['TARGET_DATE'],
                    ['KAIMON_TIME','ST_TIME','APPEAR_FLG','UPDATE_TIME']);
        }

        return $result;
    }

    /**
     * 日付リストに基づき複数行をデリート処理
     *
     * @var array $date_list
     * @return object
     */
    public function deleteRecordByDateList($date_list)
    {

        return $this->TbTsuKaimon
            ->whereIn('TARGET_DATE',$date_list)
            ->delete();

    }

    

    /**
     * 年月を指定して掲載フラグをアップデート
     *
     * @var string $target_year_month
     * @var int $appear_flg
     * @return object
     */
    public function changeAppearFlg($target_year_month,$appear_flg)
    {

        $new_datetime = date('YmdHi');

        $affected = $this->TbTsuKaimon
                            ->where('target_date','LIKE',$target_year_month.'%')
                            ->update([
                                'APPEAR_FLG' => $appear_flg,
                                'UPDATE_TIME' => $new_datetime,
                            ]);
        return $affected;
    }


    /**
     * フロント展望表示用データ呼び出し
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getOneMonthRecordForFront($start_date,$end_date)
    {
        return $this->TbTsuKaimon
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->where('APPEAR_FLG','1')
                    ->orderBy('TARGET_DATE','asc')
                    ->get();
    }

}