<?php

namespace App\Repositories\TbTsuYosoAshi;

use App\Models\TbTsuYosoAshi;

class TbTsuYosoAshiRepository implements TbTsuYosoAshiRepositoryInterface
{
    protected $TbTsuYosoAshi;

    /**
    * @param object $TbTsuYosoAshi
    */
    public function __construct(TbTsuYosoAshi $TbTsuYosoAshi)
    {
        $this->TbTsuYosoAshi = $TbTsuYosoAshi;
    }

    
    /**
     * IDで1レコードを取得
     *
     * @var string $touban
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getLatestRecordByTouban($touban,$start_date,$end_date)
    {
        return $this->TbTsuYosoAshi
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->where('TOUBAN','=',$touban)
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->where('APPEAR_FLG','=','1')
                    ->orderBy('TARGET_DATE', 'desc')
                    ->first();
    }

    /**
     * 最大IDのレコードを取得
     *
     * @return object
     */
    public function getLastRecord()
    {
        return $this->TbTsuYosoAshi
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
        $affected = $this->TbTsuYosoAshi
                        ->insert([
                            'ID' => $next_ID,
                            'START_DATE' => $request->input('START_DATE'),
                            'END_DATE' => $request->input('END_DATE'),
                            'TEXT' => $request->input('TEXT'),
                            'APPEAR_FLG' => $request->input('APPEAR_FLG'),
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

        $affected = $this->TbTsuYosoAshi
                            ->where('ID', $id)
                            ->update([
                                'START_DATE' => $request->input('START_DATE'),
                                'END_DATE' => $request->input('END_DATE'),
                                'TEXT' => $request->input('TEXT'),
                                'APPEAR_FLG' => $request->input('APPEAR_FLG'),
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
        return $this->TbTsuYosoAshi
                    ->where('ID', $id)
                    ->delete();
    }

}