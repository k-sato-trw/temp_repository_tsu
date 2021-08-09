<?php

namespace App\Repositories\TbTsuYosoAshi;

use App\Models\TbTsuYosoAshi;

class TbTsuYosoAshiRepository implements TbTsuYosoAshiRepositoryInterface
{
    protected $TbTsuYosoAshi;

    /**
    * @param object $TbTsuYosoAshi
    */
    public function __construct(TbTsuYosoAshi $TbTsuYosoAshi)
    {
        $this->TbTsuYosoAshi = $TbTsuYosoAshi;
    }

    
    /**
     * IDで1レコードを取得
     *
     * @var string $touban
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getLatestRecordByTouban($touban,$start_date,$end_date)
    {
        return $this->TbTsuYosoAshi
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->where('TOUBAN','=',$touban)
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->where('APPEAR_FLG','=','1')
                    ->orderBy('TARGET_DATE', 'desc')
                    ->first();
    }

    /**
     * IDリストと日付でレコードを取得
     *
     * @var array $touban_list
     * @var string $target_date
     * @return object
     */
    public function getRecordByToubanList($touban_list,$target_date)
    {
        return $this->TbTsuYosoAshi
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('KIKYO_FLG','=',0)
                    ->whereIn('TOUBAN',$touban_list)
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->orderBy('TOUBAN', 'asc')
                    ->get();
    }

    /**
     * IDリスト除外と日付でレコードを取得
     *
     * @var array $touban_list
     * @var string $target_date
     * @return object
     */
    public function getRecordNotToubanList($touban_list,$target_date)
    {
        return $this->TbTsuYosoAshi
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('KIKYO_FLG','=',0)
                    ->whereNotIn('TOUBAN',$touban_list)
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->orderBy('TOUBAN', 'asc')
                    ->get();
    }

    /**
     * 帰郷フラグと日付でレコードを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getKikyouRecordByToubanList($target_date)
    {
        return $this->TbTsuYosoAshi
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('KIKYO_FLG','=',1)
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->orderBy('TOUBAN', 'asc')
                    ->get();
    }


    /**
     * 新規作成処理
     *
     * @var object  $request
     * @return object
     */
    public function insertRecord($request)
    {
        //既存データ確認
        {
            $exist = $this->TbTsuYosoAshi
                    ->where('TARGET_DATE','=',$request->input('TARGET_DATE'))
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->where('TOUBAN','=',$request->input('TOUBAN'))
                    ->first();
        }

        $new_datetime = date('YmdHis');

        if(!$exist){
            //新規作成
            $affected = $this->TbTsuYosoAshi
                        ->insert([
                            'JYO' => config('const.JYO_CODE'),
                            'TARGET_DATE' => $request->input('TARGET_DATE'),
                            'TOUBAN' => $request->input('TOUBAN'),
                            'MOTOR_NO' => $request->input('KIBAN'),
                            'KIKYO_FLG' => 0,
                            'APPEAR_FLG' => 0,
                            'RESIST_TIME' => $new_datetime,
                            'UPDATE_TIME' => $new_datetime,
                        ]);
        }else{
            $affected = false;
        }
        

        return $affected;
    }


    /**
     * アップサート処理
     *
     * @var array  $insert_data
     * @return object
     */
    public function upsertRecord($insert_data)
    {
        //既存データ確認
        {
            $exist = $this->TbTsuYosoAshi
                    ->where('TARGET_DATE','=',$insert_data['TARGET_DATE'])
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->where('TOUBAN','=',$insert_data['TOUBAN'])
                    ->first();
        }

        $new_datetime = date('YmdHis');

        if($exist){

            //編集
            $affected = $this->TbTsuYosoAshi
                        ->where([
                            'JYO' => config('const.JYO_CODE'),
                            'TARGET_DATE' => $insert_data['TARGET_DATE'],
                            'TOUBAN' => $insert_data['TOUBAN'],
                            'MOTOR_NO' => $insert_data['MOTOR_NO'],
                        ])
                        ->update([
                            'DEASHI' => $insert_data['DEASHI'],
                            'NOBIASHI' => $insert_data['NOBIASHI'],
                            'KIKYO_FLG' => $insert_data['KIKYO_FLG'],
                            'UPDATE_TIME' => $new_datetime,
                        ]);
        }else{

            //新規作成
            $affected = $this->TbTsuYosoAshi
                        ->insert([
                            'JYO' => config('const.JYO_CODE'),
                            'TARGET_DATE' => $insert_data['TARGET_DATE'],
                            'TOUBAN' => $insert_data['TOUBAN'],
                            'MOTOR_NO' => $insert_data['MOTOR_NO'],
                            'DEASHI' => $insert_data['DEASHI'],
                            'NOBIASHI' => $insert_data['NOBIASHI'],
                            'KIKYO_FLG' => $insert_data['KIKYO_FLG'],
                            'APPEAR_FLG' => 0,
                            'RESIST_TIME' => $new_datetime,
                            'UPDATE_TIME' => $new_datetime,
                        ]);
        }

        return $affected;
    }

    /**
     * IDで1レコードを削除
     *
     * @var object $request
     * @return object
     */
    public function deleteFirstRecordByPK($request)
    {
        return $this->TbTsuYosoAshi
                    ->where('TARGET_DATE', $request->input('TARGET_DATE'))
                    ->where('TOUBAN', $request->input('TOUBAN'))
                    ->delete();
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

        return $this->TbTsuYosoAshi
                    ->where('TARGET_DATE', $request->input('TARGET_DATE'))
                    ->update([
                        'APPEAR_FLG' => $request->input('APPEAR_FLG'),
                        'UPDATE_TIME' => $new_datetime,
                    ]);
    }

    
}