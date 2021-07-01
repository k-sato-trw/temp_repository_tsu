<?php

namespace App\Repositories\TbTsuMailmagazine;

use App\Models\TbTsuMailmagazine;

class TbTsuMailmagazineRepository implements TbTsuMailmagazineRepositoryInterface
{
    protected $TbTsuMailmagazine;

    /**
    * @param object $TbTsuMailmagazine
    */
    public function __construct(TbTsuMailmagazine $TbTsuMailmagazine)
    {
        $this->TbTsuMailmagazine = $TbTsuMailmagazine;
    }

    /**
     * 一月分のレコード取得
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getOneMonthRecord($start_date,$end_date)
    {
        return $this->TbTsuMailmagazine
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->orderBy('TARGET_DATE', 'asc')
                    ->orderBy('ID', 'asc')
                    ->get();
    }

    /**
     * IDで1レコードを取得
     *
     * @var string $target_date
     * @var string $id
     * @return object
     */
    public function getFirstRecordByPK($target_date,$id)
    {
        return $this->TbTsuMailmagazine
                    ->where('TARGET_DATE',$target_date)
                    ->where('ID','=',$id)
                    ->first();
    }

    /**
     * 最大IDのレコードを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getLastRecord($target_date)
    {
        return $this->TbTsuMailmagazine
                    ->where('TARGET_DATE',$target_date)
                    ->orderBy('ID', 'desc')
                    ->first();
    }

    /**
     * インサート処理
     *
     * @var object  $request
     * @var string $target_date
     * @return object
     */
    public function insertRecord($request,$target_date)
    {
        //既存データ確認
        {
            $last_ID = $this->getLastRecord($target_date);
            if($last_ID){
                $next_ID = $last_ID->ID + 1;
            }else{
                $next_ID = 0;
            }
        }

        $new_datetime = date('YmdHis');

        //新規作成
        $affected = $this->TbTsuMailmagazine
                            ->insert([
                                'TARGET_DATE' => $target_date,
                                'ID' => $next_ID,
                                'SENSYU_INFO_PREFACE' => $request->input('A_01'),
                                'SENSYU_INFO_FLG' => $request->input('A_no1'),
                                'SENSYU_INFO_TEXT1' => $request->input('A_021'),
                                'SENSYU_INFO_TEIBANFLG1' => $request->input('A_031'),
                                'SENSYU_INFO_TOUBAN11' => $request->input('A_04_11'),
                                'SENSYU_INFO_TOUBAN12' => $request->input('A_04_12'),
                                'SENSYU_INFO_TOUBAN13' => $request->input('A_04_13'),
                                'SENSYU_INFO_TOUBAN14' => $request->input('A_04_14'),
                                'SENSYU_INFO_TOUBAN15' => $request->input('A_04_15'),
                                'SENSYU_INFO_TOUBAN16' => $request->input('A_04_16'),
                                'SENSYU_INFO_TEXT2' => $request->input('A_022'),
                                'SENSYU_INFO_TEIBANFLG2' => $request->input('A_032'),
                                'SENSYU_INFO_TOUBAN21' => $request->input('A_04_21'),
                                'SENSYU_INFO_TOUBAN22' => $request->input('A_04_22'),
                                'SENSYU_INFO_TOUBAN23' => $request->input('A_04_23'),
                                'SENSYU_INFO_TOUBAN24' => $request->input('A_04_24'),
                                'SENSYU_INFO_TOUBAN25' => $request->input('A_04_25'),
                                'SENSYU_INFO_TOUBAN26' => $request->input('A_04_26'),
                                'FAN_EVENT_FLG' => $request->input('A_no2'),
                                'FAN_EVENT_TEXT' => $request->input('B_01'),
                                'JONAI_FLG' => $request->input('A_no3'),
                                'OPEN_TIME_FLG' => $request->input('time_no'),
                                'OPEN_TIME_DATE1' => $request->input('C_01_3_1'),
                                'OPEN_TIME_DATE2' => $request->input('C_01_3_2'),
                                'OPEN_TIME_DATE3' => $request->input('C_01_3_3'),
                                'OPEN_TIME_DATE4' => $request->input('C_01_3_4'),
                                'OPEN_TIME' => $request->input('C_01_1'),
                                'OPEN_TIME2' => $request->input('C_01_2'),
                                'OPEN_TIME11' => $request->input('C_01_4_1'),
                                'OPEN_TIME12' => $request->input('C_01_5_1'),
                                'OPEN_TIME21' => $request->input('C_01_4_2'),
                                'OPEN_TIME22' => $request->input('C_01_5_2'),
                                'OPEN_TIME31' => $request->input('C_01_4_3'),
                                'OPEN_TIME32' => $request->input('C_01_5_3'),
                                'OPEN_TIME41' => $request->input('C_01_4_4'),
                                'OPEN_TIME42' => $request->input('C_01_5_4'),
                                'START_TIME' => $request->input('C_02_1'),
                                'START_TIME2' => $request->input('C_02_2'),
                                'DEADLINE_TIME' => $request->input('C_03_1'),
                                'DEADLINE_TIME2' => $request->input('C_03_2'),
                                'NEXT_EXHIBITION_FLG' => $request->input('A_no5'),
                                'NEXT_EXHIBITION_DATE1' => $request->input('D_01_1'),
                                'NEXT_EXHIBITION_DATE2' => $request->input('D_02_1'),
                                'NEXT_EXHIBITION_DATE3' => $request->input('D_03_1'),
                                'NEXT_EXHIBITION1' => $request->input('D_01_2'),
                                'NEXT_EXHIBITION2' => $request->input('D_02_2'),
                                'NEXT_EXHIBITION3' => $request->input('D_03_2'),
                                'FREE_FLG' => $request->input('A_no6'),
                                'FREE_TEXT' => $request->input('E_01'),
                                'EDIT_NAME' => $request->input('name'),
                                'SAVE_FLG' => 1,
                                'UPDATE_TIME' => $new_datetime,
                            ]);

        return $affected;
    }

    /**
     * IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $target_date
     * @var string $id
     * @return object
     */
    public function UpdateRecordByPK($request,$target_date,$id)
    {

        $new_datetime = date('YmdHis');

        $affected = $this->TbTsuMailmagazine
                            ->where('TARGET_DATE', $target_date)
                            ->where('ID', $id)
                            ->update([
                                'SENSYU_INFO_PREFACE' => $request->input('A_01'),
                                'SENSYU_INFO_FLG' => $request->input('A_no1'),
                                'SENSYU_INFO_TEXT1' => $request->input('A_021'),
                                'SENSYU_INFO_TEIBANFLG1' => $request->input('A_031'),
                                'SENSYU_INFO_TOUBAN11' => $request->input('A_04_11'),
                                'SENSYU_INFO_TOUBAN12' => $request->input('A_04_12'),
                                'SENSYU_INFO_TOUBAN13' => $request->input('A_04_13'),
                                'SENSYU_INFO_TOUBAN14' => $request->input('A_04_14'),
                                'SENSYU_INFO_TOUBAN15' => $request->input('A_04_15'),
                                'SENSYU_INFO_TOUBAN16' => $request->input('A_04_16'),
                                'SENSYU_INFO_TEXT2' => $request->input('A_022'),
                                'SENSYU_INFO_TEIBANFLG2' => $request->input('A_032'),
                                'SENSYU_INFO_TOUBAN21' => $request->input('A_04_21'),
                                'SENSYU_INFO_TOUBAN22' => $request->input('A_04_22'),
                                'SENSYU_INFO_TOUBAN23' => $request->input('A_04_23'),
                                'SENSYU_INFO_TOUBAN24' => $request->input('A_04_24'),
                                'SENSYU_INFO_TOUBAN25' => $request->input('A_04_25'),
                                'SENSYU_INFO_TOUBAN26' => $request->input('A_04_26'),
                                'FAN_EVENT_FLG' => $request->input('A_no2'),
                                'FAN_EVENT_TEXT' => $request->input('B_01'),
                                'JONAI_FLG' => $request->input('A_no3'),
                                'OPEN_TIME_FLG' => $request->input('time_no'),
                                'OPEN_TIME_DATE1' => $request->input('C_01_3_1'),
                                'OPEN_TIME_DATE2' => $request->input('C_01_3_2'),
                                'OPEN_TIME_DATE3' => $request->input('C_01_3_3'),
                                'OPEN_TIME_DATE4' => $request->input('C_01_3_4'),
                                'OPEN_TIME' => $request->input('C_01_1'),
                                'OPEN_TIME2' => $request->input('C_01_2'),
                                'OPEN_TIME11' => $request->input('C_01_4_1'),
                                'OPEN_TIME12' => $request->input('C_01_5_1'),
                                'OPEN_TIME21' => $request->input('C_01_4_2'),
                                'OPEN_TIME22' => $request->input('C_01_5_2'),
                                'OPEN_TIME31' => $request->input('C_01_4_3'),
                                'OPEN_TIME32' => $request->input('C_01_5_3'),
                                'OPEN_TIME41' => $request->input('C_01_4_4'),
                                'OPEN_TIME42' => $request->input('C_01_5_4'),
                                'START_TIME' => $request->input('C_02_1'),
                                'START_TIME2' => $request->input('C_02_2'),
                                'DEADLINE_TIME' => $request->input('C_03_1'),
                                'DEADLINE_TIME2' => $request->input('C_03_2'),
                                'NEXT_EXHIBITION_FLG' => $request->input('A_no5'),
                                'NEXT_EXHIBITION_DATE1' => $request->input('D_01_1'),
                                'NEXT_EXHIBITION_DATE2' => $request->input('D_02_1'),
                                'NEXT_EXHIBITION_DATE3' => $request->input('D_03_1'),
                                'NEXT_EXHIBITION1' => $request->input('D_01_2'),
                                'NEXT_EXHIBITION2' => $request->input('D_02_2'),
                                'NEXT_EXHIBITION3' => $request->input('D_03_2'),
                                'FREE_FLG' => $request->input('A_no6'),
                                'FREE_TEXT' => $request->input('E_01'),
                                'EDIT_NAME' => $request->input('name'),
                                //'SAVE_FLG' => 1,
                                'UPDATE_TIME' => $new_datetime,
                            ]);
        return $affected;
    }

    /**
     * IDで1レコードを削除
     *
     * @var string $target_date
     * @var string $id
     * @return object
     */
    public function deleteFirstRecordByPK($target_date,$id)
    {
        return $this->TbTsuMailmagazine
                    ->where('TARGET_DATE', $target_date)
                    ->where('ID', $id)
                    ->delete();
    }

}