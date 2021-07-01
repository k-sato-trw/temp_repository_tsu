<?php

namespace App\Repositories\TbRaceIndex;

use App\Models\TbRaceIndex;

class TbRaceIndexRepository implements TbRaceIndexRepositoryInterface
{
    protected $TbRaceIndex;

    /**
    * @param object $TbRaceIndex
    */
    public function __construct(TbRaceIndex $TbRaceIndex)
    {
        $this->TbRaceIndex = $TbRaceIndex;
    }


    /**
     * レコード取得、日付があった場合は日付判定
     *
     * @var int $pre_page
     * @var string $date_ymd
     * @return object
     */
    public function getRecord($pre_page,$date_ymd = "")
    {
        $query = $this->TbRaceIndex
                    ->where('JYO',config('const.JYO_CODE'));
        if($date_ymd){
            $query->where('END_DATE',">",$date_ymd);
        }
        $result = $query->orderBy('START_DATE', 'desc')->paginate(10);
        
        return $result;
    }

    /**
     * IDで1レコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordByPK($id)
    {
        return $this->TbRaceIndex
                    ->where('ID',$id)
                    ->where('JYO',config("const.JYO_CODE"))
                    ->first();
    }

    /**
     * 最大IDのレコードを取得
     *
     * @return object
     */
    public function getLastRecord()
    {
        return $this->TbRaceIndex   
                    ->where('JYO',config("const.JYO_CODE"))
                    ->orderBy('ID', 'desc')
                    ->first();
    }


    /**
     * インサート処理
     *
     * @var object  $request
     * @return object
     */
    public function insertRecord($request)
    {
        //既存データ確認
        {
            $last_ID = $this->getLastRecord();
            $next_ID = $last_ID->ID + 1;
        }

        $new_datetime = date('YmdHis');

        //新規作成
        $affected = $this->TbRaceIndex
                        ->insert([                            
                            'ID' => $next_ID,
                            'JYO' => config('const.JYO_CODE'),
                            'START_DATE' => $request->input('START_DATE'),
                            'END_DATE' => $request->input('END_DATE'),
                            'GRADE' => $request->input('GRADE'),
                            'RACE_TITLE' => $request->input('RACE_TITLE'),
                            'PC_TENBO_URL' => $request->input('PC_TENBO_URL'),
                            'SP_TENBO_URL' => $request->input('SP_TENBO_URL'),
                            'PC_SYUTUJO_URL' => $request->input('PC_SYUTUJO_URL'),
                            'SP_SYUTUJO_URL' => $request->input('SP_SYUTUJO_URL'),
                            'EDITOR_NAME' => $request->input('EDITOR_NAME'),
                            'RESIST_TIME' => $new_datetime,
                            'UPDATE_TIME' => $new_datetime,
                        ]);

        return $affected;
    }


    /**
     * IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @return object
     */
    public function UpdateRecordByPK($request,$id)
    {
        $new_datetime = date('YmdHis');

        $affected = $this->TbRaceIndex
                            ->where('JYO',config("const.JYO_CODE"))
                            ->where('ID', $id)
                            ->update([
                                'START_DATE' => $request->input('START_DATE'),
                                'END_DATE' => $request->input('END_DATE'),
                                'GRADE' => $request->input('GRADE'),
                                'RACE_TITLE' => $request->input('RACE_TITLE'),
                                'PC_TENBO_URL' => $request->input('PC_TENBO_URL'),
                                'SP_TENBO_URL' => $request->input('SP_TENBO_URL'),
                                'PC_SYUTUJO_URL' => $request->input('PC_SYUTUJO_URL'),
                                'SP_SYUTUJO_URL' => $request->input('SP_SYUTUJO_URL'),
                                'EDITOR_NAME' => $request->input('EDITOR_NAME'),
                                'UPDATE_TIME' => $new_datetime,
                            ]);
        return $affected;
    }

    /**
     * IDで1レコードを削除
     *
     * @var string $id
     * @return object
     */
    public function deleteFirstRecordByPK($id)
    {
        return $this->TbRaceIndex
                    ->where('ID', $id)
                    ->where('JYO',config("const.JYO_CODE"))
                    ->delete();
    }

    /**
     * フロントカレンダー用レコードを取得
     *
     * @var string $now_year
     * @var string $now_month
     * @return object
     */
    public function getRecordForCalendar($now_year,$now_month)
    {
        return $this->TbRaceIndex
                    ->where('JYO',config("const.JYO_CODE"))
                    ->where(function($query) use($now_year,$now_month) {
                        $query->where('START_DATE','like',$now_year.$now_month.'%')
                            ->orWhere('END_DATE','like',$now_year.$now_month.'%');
                    })
                    ->get();
    }

    /**
     * TOPピックアップ表示用レコードを取得
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getFirstRecordForPickup($start_date,$end_date)
    {
        return $this->TbRaceIndex
                    ->where('JYO',config("const.JYO_CODE"))
                    ->where('START_DATE','<=',$start_date)
                    ->where('END_DATE','>=',$end_date)
                    ->orderBy('START_DATE')
                    ->orderBy('END_DATE')
                    ->orderBy('RACE_TITLE')
                    ->orderBy('ID','DESC')
                    ->first();
    }

    /**
     * まだ終了していないレコードを取得
     *
     * @var string $taget_date
     * @return object
     */
    public function getUnfinishedRecord($taget_date)
    {
        return $this->TbRaceIndex
                    ->where('JYO',config("const.JYO_CODE"))
                    ->where('END_DATE','>=',$taget_date)
                    ->orderBy('START_DATE','ASC')
                    ->get();
    }

}