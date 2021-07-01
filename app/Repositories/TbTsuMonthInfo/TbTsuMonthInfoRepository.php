<?php

namespace App\Repositories\TbTsuMonthInfo;

use App\Models\TbTsuMonthInfo;

class TbTsuMonthInfoRepository implements TbTsuMonthInfoRepositoryInterface
{
    protected $TbTsuMonthInfo;

    /**
    * @param object $TbTsuMonthInfo
    */
    public function __construct(TbTsuMonthInfo $TbTsuMonthInfo)
    {
        $this->TbTsuMonthInfo = $TbTsuMonthInfo;
    }

    /**
     * 日付文字列で1レコードを取得
     *
     * @var string $now_date
     * @return object
     */
    public function getFirstRecordByDate($now_date)
    {
        //桁数チェック
        if(mb_strlen($now_date) != 6){
            $now_date = date("Ym",strtotime($now_date));
        }
        return $this->TbTsuMonthInfo
                    ->where('TARGET_MONTH',"=",$now_date)
                    ->first();
    }

    /**
     * 最大IDのレコードを取得
     *
     * @return object
     */
    public function getLastRecord()
    {
        return $this->TbTsuMonthInfo
                    ->orderBy('ID', 'desc')
                    ->first();
    }


    /**
     * TARGET_DATE で1レコード有無を判定してupsert
     *
     * @var object  $request
     * @var string  $file_name
     * @return object
     */
    public function upsertRecord($request, $file_name)
    {

        $new_datetime = date('YmdHis');
        
        $check = $this->getFirstRecordByDate($request->input('TARGET_MONTH'));
        
        if($check){
            //更新
            $affected = $this->TbTsuMonthInfo
            ->where('TARGET_MONTH', $request->input('TARGET_MONTH'))
            ->update([
                'PDF_FILE' => $file_name,
                'PDF_FLAG' => $request->input('PDF_FLAG'),
                'CAL_TEXT' => $request->input('CAL_TEXT'),
                'CAL_TEXT_FLG' => $request->input('CAL_TEXT_FLG'),
                "UPDATE_TIME" => $new_datetime,
            ]);

        }else{
            //新規作成
            $affected = $this->TbTsuMonthInfo
            ->insert([
                "TARGET_MONTH" => $request->input('TARGET_MONTH'),
                'PDF_FILE' => $file_name,
                'PDF_FLAG' => $request->input('PDF_FLAG'),
                'CAL_TEXT' => $request->input('CAL_TEXT'),
                'CAL_TEXT_FLG' => $request->input('CAL_TEXT_FLG'),
                "RESIST_TIME" => $new_datetime,
                "UPDATE_TIME" => $new_datetime,
            ]);

        }

        return $affected;
    }

    
}