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
     * 管理画面用指定のレースで1レコードを取得
     *
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getFirstRecordByPK($target_date,$race_num)
    {
        return $this->TbTsuYosoTenji
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('RACE_NUM','=',$race_num)
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->first();
    }


    


    /**
     * アップサート処理
     *
     * @var object  $request
     * @return object
     */
    public function upsertRecord($request)
    {
        //既存データ確認
        {
            $exist = $this->TbTsuYosoTenji
                    ->where('TARGET_DATE','=',$request->input('TARGET_DATE'))
                    ->where('RACE_NUM','=',$request->input('RACE_NUM'))
                    ->first();
        }

        $new_datetime = date('YmdHis');

        if($exist){

            //編集
            $affected = $this->TbTsuYosoTenji
                        ->where([
                            'JYO' => config('const.JYO_CODE'),
                            'TARGET_DATE' => $request->input('TARGET_DATE'),
                            'RACE_NUM' => $request->input('RACE_NUM'),
                        ])
                        ->update([
                            'EVALUATION1' => $request->input('EVALUATION1'),
                            'EVALUATION2' => $request->input('EVALUATION2'),
                            'EVALUATION3' => $request->input('EVALUATION3'),
                            'EVALUATION4' => $request->input('EVALUATION4'),
                            'EVALUATION5' => $request->input('EVALUATION5'),
                            'EVALUATION6' => $request->input('EVALUATION6'),
                            'COMMENT' => $request->input('COMMENT'),
                            'FAVOLITE111' => $request->input('FAVOLITE111'),
                            'FAVOLITE112' => $request->input('FAVOLITE112'),
                            'FAVOLITE113' => $request->input('FAVOLITE113'),
                            'FAVOLITE121' => $request->input('FAVOLITE121'),
                            'FAVOLITE122' => $request->input('FAVOLITE122'),
                            'FAVOLITE123' => $request->input('FAVOLITE123'),
                            'FAVOLITE131' => $request->input('FAVOLITE131'),
                            'FAVOLITE132' => $request->input('FAVOLITE132'),
                            'FAVOLITE133' => $request->input('FAVOLITE133'),
                            'FAVOLITE211' => $request->input('FAVOLITE211'),
                            'FAVOLITE212' => $request->input('FAVOLITE212'),
                            'FAVOLITE213' => $request->input('FAVOLITE213'),
                            'FAVOLITE221' => $request->input('FAVOLITE221'),
                            'FAVOLITE222' => $request->input('FAVOLITE222'),
                            'FAVOLITE223' => $request->input('FAVOLITE223'),
                            'FAVOLITE231' => $request->input('FAVOLITE231'),
                            'FAVOLITE232' => $request->input('FAVOLITE232'),
                            'FAVOLITE233' => $request->input('FAVOLITE233'),
                            'FAVOLITE_MARK11' => $request->input('FAVOLITE_MARK11'),
                            'FAVOLITE_MARK12' => $request->input('FAVOLITE_MARK12'),
                            'FAVOLITE_MARK21' => $request->input('FAVOLITE_MARK21'),
                            'FAVOLITE_MARK22' => $request->input('FAVOLITE_MARK22'),
                            'RICH111' => $request->input('RICH111'),
                            'RICH112' => $request->input('RICH112'),
                            'RICH113' => $request->input('RICH113'),
                            'RICH121' => $request->input('RICH121'),
                            'RICH122' => $request->input('RICH122'),
                            'RICH123' => $request->input('RICH123'),
                            'RICH131' => $request->input('RICH131'),
                            'RICH132' => $request->input('RICH132'),
                            'RICH133' => $request->input('RICH133'),
                            'RICH211' => $request->input('RICH211'),
                            'RICH212' => $request->input('RICH212'),
                            'RICH213' => $request->input('RICH213'),
                            'RICH221' => $request->input('RICH221'),
                            'RICH222' => $request->input('RICH222'),
                            'RICH223' => $request->input('RICH223'),
                            'RICH231' => $request->input('RICH231'),
                            'RICH232' => $request->input('RICH232'),
                            'RICH233' => $request->input('RICH233'),
                            'RICH_MARK11' => $request->input('RICH_MARK11'),
                            'RICH_MARK12' => $request->input('RICH_MARK12'),
                            'RICH_MARK21' => $request->input('RICH_MARK21'),
                            'RICH_MARK22' => $request->input('RICH_MARK22'),
                            'UPDATE_TIME' => $new_datetime,
                        ]);
        }else{

            //新規作成
            $affected = $this->TbTsuYosoTenji
                        ->insert([
                            'JYO' => config('const.JYO_CODE'),
                            'TARGET_DATE' => $request->input('TARGET_DATE'),
                            'RACE_NUM' => $request->input('RACE_NUM'),
                            'EVALUATION1' => $request->input('EVALUATION1'),
                            'EVALUATION2' => $request->input('EVALUATION2'),
                            'EVALUATION3' => $request->input('EVALUATION3'),
                            'EVALUATION4' => $request->input('EVALUATION4'),
                            'EVALUATION5' => $request->input('EVALUATION5'),
                            'EVALUATION6' => $request->input('EVALUATION6'),
                            'COMMENT' => $request->input('COMMENT'),
                            'FAVOLITE111' => $request->input('FAVOLITE111'),
                            'FAVOLITE112' => $request->input('FAVOLITE112'),
                            'FAVOLITE113' => $request->input('FAVOLITE113'),
                            'FAVOLITE121' => $request->input('FAVOLITE121'),
                            'FAVOLITE122' => $request->input('FAVOLITE122'),
                            'FAVOLITE123' => $request->input('FAVOLITE123'),
                            'FAVOLITE131' => $request->input('FAVOLITE131'),
                            'FAVOLITE132' => $request->input('FAVOLITE132'),
                            'FAVOLITE133' => $request->input('FAVOLITE133'),
                            'FAVOLITE211' => $request->input('FAVOLITE211'),
                            'FAVOLITE212' => $request->input('FAVOLITE212'),
                            'FAVOLITE213' => $request->input('FAVOLITE213'),
                            'FAVOLITE221' => $request->input('FAVOLITE221'),
                            'FAVOLITE222' => $request->input('FAVOLITE222'),
                            'FAVOLITE223' => $request->input('FAVOLITE223'),
                            'FAVOLITE231' => $request->input('FAVOLITE231'),
                            'FAVOLITE232' => $request->input('FAVOLITE232'),
                            'FAVOLITE233' => $request->input('FAVOLITE233'),
                            'FAVOLITE_MARK11' => $request->input('FAVOLITE_MARK11'),
                            'FAVOLITE_MARK12' => $request->input('FAVOLITE_MARK12'),
                            'FAVOLITE_MARK21' => $request->input('FAVOLITE_MARK21'),
                            'FAVOLITE_MARK22' => $request->input('FAVOLITE_MARK22'),
                            'RICH111' => $request->input('RICH111'),
                            'RICH112' => $request->input('RICH112'),
                            'RICH113' => $request->input('RICH113'),
                            'RICH121' => $request->input('RICH121'),
                            'RICH122' => $request->input('RICH122'),
                            'RICH123' => $request->input('RICH123'),
                            'RICH131' => $request->input('RICH131'),
                            'RICH132' => $request->input('RICH132'),
                            'RICH133' => $request->input('RICH133'),
                            'RICH211' => $request->input('RICH211'),
                            'RICH212' => $request->input('RICH212'),
                            'RICH213' => $request->input('RICH213'),
                            'RICH221' => $request->input('RICH221'),
                            'RICH222' => $request->input('RICH222'),
                            'RICH223' => $request->input('RICH223'),
                            'RICH231' => $request->input('RICH231'),
                            'RICH232' => $request->input('RICH232'),
                            'RICH233' => $request->input('RICH233'),
                            'RICH_MARK11' => $request->input('RICH_MARK11'),
                            'RICH_MARK12' => $request->input('RICH_MARK12'),
                            'RICH_MARK21' => $request->input('RICH_MARK21'),
                            'RICH_MARK22' => $request->input('RICH_MARK22'),
                            'APPEAR_FLG' => 0,
                            'RESIST_TIME' => $new_datetime,
                            'UPDATE_TIME' => $new_datetime,
                        ]);
        }

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

        return $this->TbTsuYosoTenji
                    ->where('TARGET_DATE', $request->input('TARGET_DATE'))
                    ->where('RACE_NUM', $request->input('RACE_NUM'))
                    ->update([
                        'APPEAR_FLG' => $request->input('APPEAR_FLG'),
                        'UPDATE_TIME' => $new_datetime,
                    ]);
    }

    /**
     * 12レース公開フラグ変更
     *
     * @var object $request
     * @return object
     */
    public function changeAppearFlgAll($request)
    {
        $new_datetime = date('YmdHis');

        return $this->TbTsuYosoTenji
                    ->where('TARGET_DATE', $request->input('TARGET_DATE'))
                    ->update([
                        'APPEAR_FLG' => $request->input('APPEAR_FLG'),
                        'UPDATE_TIME' => $new_datetime,
                    ]);
    }


    /**
     * 指定のレースで1レコードを取得
     *
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getFirstRecordByDate($target_date,$race_num,$is_preview = false)
    {
        $query = $this->TbTsuYosoTenji
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('RACE_NUM','=',$race_num)
                    ->where('JYO','=',config('const.JYO_CODE'));

        if(!$is_preview){
            $query->where('APPEAR_FLG','=','1');
        }
                    
        return $query->first();
    }

    /**
     * 指定期間の全レースのレコードを取得
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordForTekichuritsu($start_date,$end_date)
    {
        return $this->TbTsuYosoTenji
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->where('APPEAR_FLG','=','1')
                    ->get();
    }

}