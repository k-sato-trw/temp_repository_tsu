<?php

namespace App\Repositories\TbBoatsSensyupast3;

use App\Models\TbBoatsSensyupast3;

class TbBoatsSensyupast3Repository implements TbBoatsSensyupast3RepositoryInterface
{
    protected $TbBoatsSensyupast3;

    /**
    * @param object $TbBoatsSensyupast3
    */
    public function __construct(TbBoatsSensyupast3 $TbBoatsSensyupast3)
    {
        $this->TbBoatsSensyupast3 = $TbBoatsSensyupast3;
    }


    /**
     * 登録番号でレコード取得
     *
     * @var string $touban
     * @return object
     */
    public function getfirstRecordByTouban($touban)
    {
        return $this->TbBoatsSensyupast3
                    ->where('TOUBAN','=',$touban)
                    ->orderBy('TARGET_DATE', 'desc')
                    ->first();
    }

    /**/

    /**
     * IDで1レコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordByPK($id)
    {
        return $this->TbBoatsSensyupast3
                    ->where('ID','=',$id)
                    ->first();
    }

    /**
     * 最大IDのレコードを取得
     *
     * @return object
     */
    public function getLastRecord()
    {
        return $this->TbBoatsSensyupast3
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
        $affected = $this->TbBoatsSensyupast3
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

        $affected = $this->TbBoatsSensyupast3
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
        return $this->TbBoatsSensyupast3
                    ->where('ID', $id)
                    ->delete();
    }

}