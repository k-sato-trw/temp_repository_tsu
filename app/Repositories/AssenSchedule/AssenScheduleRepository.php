<?php

namespace App\Repositories\AssenSchedule;

use App\Models\AssenSchedule;

class AssenScheduleRepository implements AssenScheduleRepositoryInterface
{
    protected $AssenSchedule;

    /**
    * @param object $AssenSchedule
    */
    public function __construct(AssenSchedule $AssenSchedule)
    {
        $this->AssenSchedule = $AssenSchedule;
    }


    /**
     * 場のテーブルをすべて取得
     *
     * @return object
     */
    public function getAllRecord()
    {
        return $this->AssenSchedule
                    ->where('場コード',config('const.JYO_CODE'))
                    ->orderBy('登録番号','ASC')
                    ->get();
    }


    /**
     * インサート処理
     *
     * @var object  $request
     * @return object
     */
    public function insertRecord($request)
    {
        //新規作成
        $affected = $this->AssenSchedule
                            ->insert([
                                '場コード' => config('const.JYO_CODE'),
                                '登録番号' => $request->input('登録番号'),
                            ]);

        return $affected;
    }


    /**
     * IDで1レコードを削除
     *
     * @var string $touban
     * @return object
     */
    public function deleteFirstRecordByPK($touban)
    {
        return $this->AssenSchedule
                    ->where('登録番号', $touban)
                    ->delete();
    }

}