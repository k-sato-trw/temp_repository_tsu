<?php

namespace App\Repositories\TbTsuYosoTenji;

use App\Models\TbTsuYosoTenji;

class TbTsuYosoTenjiRepository implements TbTsuYosoTenjiRepositoryInterface
{
    protected $TbTsuYosoTenji;

    /**
    * @param object $TbTsuYosoTenji
    */
    public function __construct(TbTsuYosoTenji $TbTsuYosoTenji)
    {
        $this->TbTsuYosoTenji = $TbTsuYosoTenji;
    }

    
    /**
     * 指定のレースで1レコードを取得
     *
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getFirstRecordByDate($target_date,$race_num)
    {
        return $this->TbTsuYosoTenji
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('RACE_NUM','=',$race_num)
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->where('APPEAR_FLG','=','1')
                    ->first();
    }

    /**
     * 最大IDのレコードを取得
     *
     * @return object
     */
    public function getLastRecord()
    {
        return $this->TbTsuYosoTenji
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
        $affected = $this->TbTsuYosoTenji
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

        $affected = $this->TbTsuYosoTenji
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
        return $this->TbTsuYosoTenji
                    ->where('ID', $id)
                    ->delete();
    }

}