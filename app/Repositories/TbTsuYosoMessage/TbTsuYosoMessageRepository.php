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
     * 一つのレコードを取得
     *
     * @return object
     */
    public function getFirstRecord()
    {
        return $this->TbTsuYosoMessage
                    ->first();
    }


    /**
     * アップデート処理
     *
     * @var object  $request
     * @return object
     */
    public function updateRecord($request)
    {

        $new_datetime = date('YmdHis');


        //編集
        $affected = $this->TbTsuYosoMessage
                    ->where([
                        'JYO' => config('const.JYO_CODE'),
                    ])
                    ->update([
                        'START_DATE' => $request->input('START_DATE'),
                        'END_DATE' => $request->input('END_DATE'),
                        'SAMPLE1' => $request->input('SAMPLE1'),
                        'SAMPLE2' => $request->input('SAMPLE2'),
                        'SAMPLE3' => $request->input('SAMPLE3'),
                        'COMMENT' => $request->input('COMMENT'),
                        'PC_APPEAR_FLG' => $request->input('PC_APPEAR_FLG'),
                        'SP_APPEAR_FLG' => $request->input('SP_APPEAR_FLG'),
                        'UPDATE_TIME' => $new_datetime,
                    ]);
        

        return $affected;
    }

    /**
     * 公開フラグ変更
     *
     * @var object $request
     * @return object
     */
    public function changeAppearFlg($request)
    {
        $new_datetime = date('YmdHis');

        return $this->TbTsuYosoMessage
                    ->where([
                        'JYO' => config('const.JYO_CODE'),
                    ])
                    ->update([
                        'APPEAR_FLG' => $request->input('APPEAR_FLG'),
                        'UPDATE_TIME' => $new_datetime,
                    ]);
    }

    
}