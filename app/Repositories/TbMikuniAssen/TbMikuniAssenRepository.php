<?php

namespace App\Repositories\TbMikuniAssen;

use App\Models\TbMikuniAssen;

class TbMikuniAssenRepository implements TbMikuniAssenRepositoryInterface
{
    protected $TbMikuniAssen;

    /**
    * @param object $TbMikuniAssen
    */
    public function __construct(TbMikuniAssen $TbMikuniAssen)
    {
        $this->TbMikuniAssen = $TbMikuniAssen;
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
        return $this->TbMikuniAssen
                    ->where([['TOUBAN','=',$touban],['END_DATE','>=',$now_date]])
                    ->get();
    }


    /**
     * IDで1レコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordByPK($id)
    {
        return $this->TbMikuniAssen
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
        return $this->TbMikuniAssen
                    ->orderBy('ID', 'desc')
                    ->first();
    }


    /**
     * IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @var string $touban
     * @return object
     */
    public function UpdateRecordByPK($request,$id,$touban)
    {

        $new_datetime = date('YmdHis');

        $affected = $this->TbMikuniAssen
                            ->where('ID', $id)
                            ->update([
                                'TOUBAN' => $touban,
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
     * インサート処理
     *
     * @var object  $request
     * @var string  $touban
     * @return object
     */
    public function insertRecord($request,$touban)
    {
        //既存データ確認
        {
            $last_ID = $this->getLastRecord();
            $next_ID = $last_ID->ID + 1;
        }

        $new_datetime = date('YmdHis');

        //新規作成
        $affected = $this->TbMikuniAssen
                        ->insert([
                            'ID' => $next_ID,
                            'TOUBAN' => $touban,
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
     * IDで1レコードを削除
     *
     * @var string $id
     * @return object
     */
    public function deleteFirstRecordByPK($id)
    {
        return $this->TbMikuniAssen
                    ->where('ID', $id)
                    ->delete();
    }


    /**
     * プロフィール用のレコードを取得
     *
     * @var string $touban
     * @var string $now_date
     * @return object
     */
    public function getRecordByToubanForProfile($touban,$now_date)
    {
        return $this->TbMikuniAssen
                    ->where([
                        ['TOUBAN','=',$touban],
                        ['END_DATE','>=',$now_date],
                        ['APPEAR_FLG','1']
                    ])
                    ->get();
    }


}