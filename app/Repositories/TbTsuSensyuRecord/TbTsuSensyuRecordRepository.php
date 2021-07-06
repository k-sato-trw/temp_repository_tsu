<?php

namespace App\Repositories\TbTsuSensyuRecord;

use App\Models\TbTsuSensyuRecord;

class TbTsuSensyuRecordRepository implements TbTsuSensyuRecordRepositoryInterface
{
    protected $TbTsuSensyuRecord;

    /**
    * @param object $TbTsuSensyuRecord
    */
    public function __construct(TbTsuSensyuRecord $TbTsuSensyuRecord)
    {
        $this->TbTsuSensyuRecord = $TbTsuSensyuRecord;
    }

    /**
     * IDで1レコードを取得
     *
     * @var string $touban
     * @return object
     */
    public function getFirstRecordByPK($touban)
    {
        return $this->TbTsuSensyuRecord
                    ->where('TOUBAN','=',$touban)
                    ->first();
    }

    /**
     * インサート処理
     *
     * @var array  $insert_data
     * @return object
     */
    public function insertRecord($insert_data)
    {
       
        $new_datetime = date('YmdHis');

        //新規作成
        $affected = $this->TbTsuSensyuRecord
                        ->insert([
                            'TOUBAN' => $insert_data['TOUBAN'],
                            'TARGET_DATE' => $insert_data['TARGET_DATE'],
                            'DEBUT_DATE' => $insert_data['DEBUT_DATE'],
                            'DEBUT_JYO' => $insert_data['DEBUT_JYO'],
                            'DEBUT_SEISEKI' => $insert_data['DEBUT_SEISEKI'],
                            'SG_COUNT' => $insert_data['SG_COUNT'],
                            'G1_COUNT' => $insert_data['G1_COUNT'],
                            'G2_COUNT' => $insert_data['G2_COUNT'],
                            'G3_COUNT' => $insert_data['G3_COUNT'],
                            'IP_COUNT' => $insert_data['IP_COUNT'],
                            'RESIST_TIME' => $new_datetime,
                            'UPDATE_TIME' => $new_datetime,

                        ]);

        return $affected;
    }

    /**
     * IDをキーにしてアップデート
     *
     * @var array  $update_data
     * @var string $touban
     * @return object
     */
    public function UpdateRecordByPK($update_data,$touban)
    {

        $new_datetime = date('YmdHis');

        $affected = $this->TbTsuSensyuRecord
                            ->where('TOUBAN', $touban)
                            ->update([
                                'TARGET_DATE' => $update_data['TARGET_DATE'],
                                'SG_COUNT' => $update_data['SG_COUNT'],
                                'G1_COUNT' => $update_data['G1_COUNT'],
                                'G2_COUNT' => $update_data['G2_COUNT'],
                                'G3_COUNT' => $update_data['G3_COUNT'],
                                'IP_COUNT' => $update_data['IP_COUNT'],
                                'UPDATE_TIME' => $new_datetime,
                            ]);
        return $affected;
    }


    
}