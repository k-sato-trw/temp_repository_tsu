<?php

namespace App\Repositories\TbTsuYosoMessage;

use App\Models\TbTsuYosoMessage;

class TbTsuYosoMessageRepository implements TbTsuYosoMessageRepositoryInterface
{
    protected $TbTsuYosoMessage;

    /**
    * @param object $TbTsuYosoMessage
    */
    public function __construct(TbTsuYosoMessage $TbTsuYosoMessage)
    {
        $this->TbTsuYosoMessage = $TbTsuYosoMessage;
    }


    /**
     * 日付をもとにレコードを取得
     *
     * @var string $jyo
     * @var string $target_datetime
     * @return object
     */
    public function getRecordByDatetime($jyo,$target_datetime)
    {
        return $this->TbTsuYosoMessage
                    ->where('JYO','=',$jyo)
                    ->where('PC_APPEAR_FLG','=',1)
                    ->where('APPEAR_FLG','=',1)
                    ->where('START_DATE','<=',$target_datetime)
                    ->where('END_DATE','>=',$target_datetime)
                    ->get();
    }

    /**
     * 最大IDのレコードを取得
     *
     * @return object
     */
    public function getLastRecord()
    {
        return $this->TbTsuYosoMessage
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
        $affected = $this->TbTsuYosoMessage
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

        $affected = $this->TbTsuYosoMessage
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
        return $this->TbTsuYosoMessage
                    ->where('ID', $id)
                    ->delete();
    }

}