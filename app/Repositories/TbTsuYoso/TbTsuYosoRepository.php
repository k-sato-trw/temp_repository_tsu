<?php

namespace App\Repositories\TbTsuYoso;

use App\Models\TbTsuYoso;

class TbTsuYosoRepository implements TbTsuYosoRepositoryInterface
{
    protected $TbTsuYoso;

    /**
    * @param object $TbTsuYoso
    */
    public function __construct(TbTsuYoso $TbTsuYoso)
    {
        $this->TbTsuYoso = $TbTsuYoso;
    }

    /**
     * 指定のレースで1レコードを取得
     *
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getFirstRecordByPK($target_date,$race_num)
    {
        return $this->TbTsuYoso
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
            $exist = $this->TbTsuYoso
                    ->where('TARGET_DATE','=',$request->input('TARGET_DATE'))
                    ->where('RACE_NUM','=',$request->input('RACE_NUM'))
                    ->first();
        }

        $new_datetime = date('YmdHis');

        if($exist){

            //編集
            $affected = $this->TbTsuYoso
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
                            'ENTRY' => $request->input('ENTRY'),
                            'MEMO' => $request->input('MEMO'),
                            'CONFIDENCE' => $request->input('CONFIDENCE'),
                            'PUSHING_FLG' => $request->input('RACE_FLG'),
                            'UPDATE_TIME' => $new_datetime,
                        ]);
        }else{

            //新規作成
            $affected = $this->TbTsuYoso
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
                            'ENTRY' => $request->input('ENTRY'),
                            'MEMO' => $request->input('MEMO'),
                            'CONFIDENCE' => $request->input('CONFIDENCE'),
                            'PUSHING_FLG' => $request->input('RACE_FLG'),
                            'APPEAR_FLG' => 0,
                            'RESIST_TIME' => $new_datetime,
                            'UPDATE_TIME' => $new_datetime,
                        ]);
        }

        return $affected;
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
        $query = $this->TbTsuYoso
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('RACE_NUM','=',$race_num)
                    ->where('JYO','=',config('const.JYO_CODE'));

        if(!$is_preview){
            $query->where('APPEAR_FLG','=','1');
        }
                    
        return $query->first();
    }

    /**
     * 指定の日付レースでプッシュ対象を取得
     *
     * @var string $target_date
     * @return object
     */
    public function getPushing($target_date,$is_preview = false)
    {
        $query = $this->TbTsuYoso
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('JYO','=',config('const.JYO_CODE'));

        if(!$is_preview){
            $query->where('APPEAR_FLG','=','1');
        }

        return $query->where('PUSHING_FLG','=','1')
                    ->orderByRaw('LENGTH(RACE_NUM)')
                    ->orderBy('RACE_NUM')
                    ->get();
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

        return $this->TbTsuYoso
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

        return $this->TbTsuYoso
                    ->where('TARGET_DATE', $request->input('TARGET_DATE'))
                    ->update([
                        'APPEAR_FLG' => $request->input('APPEAR_FLG'),
                        'UPDATE_TIME' => $new_datetime,
                    ]);
    }



    

}