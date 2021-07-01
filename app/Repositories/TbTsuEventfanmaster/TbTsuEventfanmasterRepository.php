<?php

namespace App\Repositories\TbTsuEventfanmaster;

use App\Models\TbTsuEventfanmaster;

class TbTsuEventfanmasterRepository implements TbTsuEventfanmasterRepositoryInterface
{
    protected $TbTsuEventfanmaster;

    /**
    * @param object $TbTsuEventfanmaster
    */
    public function __construct(TbTsuEventfanmaster $TbTsuEventfanmaster)
    {
        $this->TbTsuEventfanmaster = $TbTsuEventfanmaster;
    }

    /**
     * カレンダーに対応したレコードを取得
     *
     * @var int $id
     * @return object
     */
    public function getRecord($id)
    {
        return $this->TbTsuEventfanmaster
                    ->where('ID','=',$id)
                    ->orderBy('SUB_ID', 'desc')
                    ->get();
    }

    /**
     * IDで1レコードを取得
     *
     * @var string $id
     * @var string $sub_id
     * @return object
     */
    public function getFirstRecordByPK($id,$sub_id)
    {
        return $this->TbTsuEventfanmaster
                    ->where('ID','=',$id)
                    ->where('SUB_ID','=',$sub_id)
                    ->first();
    }

    /**
     * 同一カレンダーで最大IDのレコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getLastRecord($id)
    {
        return $this->TbTsuEventfanmaster
                    ->where('ID',$id)
                    ->orderBy('SUB_ID', 'desc')
                    ->first();
    }

    /**
     * インサート処理
     *
     * @var object  $request
     * @var string  $id
     * @return object
     */
    public function insertRecord($request,$id)
    {
        //既存データ確認
        {
            $last_ID = $this->getLastRecord($id);
            $next_SUB_ID = $last_ID->SUB_ID + 1;
        }

        $new_datetime = date('YmdHis');

        //新規作成
        $affected = $this->TbTsuEventfanmaster
                        ->insert([
                            'ID' => $id,
                            'SUB_ID' => $next_SUB_ID,
                            'START_DATE' => $request->input('START_DATE'),
                            'END_DATE' => $request->input('END_DATE'),
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
     * @var string $sub_id
     * @return object
     */
    public function UpdateRecordByPK($request,$id,$sub_id)
    {

        $new_datetime = date('YmdHis');

        $affected = $this->TbTsuEventfanmaster
                            ->where('ID', $id)
                            ->where('SUB_ID', $sub_id)
                            ->update([
                                'START_DATE' => $request->input('START_DATE'),
                                'END_DATE' => $request->input('END_DATE'),
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
     * @var string $sub_id
     * @return object
     */
    public function deleteFirstRecordByPK($id,$sub_id)
    {
        return $this->TbTsuEventfanmaster
                    ->where('ID', $id)
                    ->where('SUB_ID', $sub_id)
                    ->delete();
    }


    /**
     * TOPページ 非開催表示用データ取得
     *
     * @var int $id
     * @return object
     */
    public function getRecordForTop($id)
    {
        return $this->TbTsuEventfanmaster
                    ->where('ID','=',$id)
                    ->where('APPEAR_FLG','=','1')
                    ->get();
    }

    /**
     * イベントページ用データ取得
     *
     * @var array $id_list
     * @var int $is_preview
     * @return object
     */
    public function getRecordForEvent($id_list,$is_preview=false)
    {
        $query = $this->TbTsuEventfanmaster
                    ->whereIn('ID',$id_list);

        if(!$is_preview){
            $query->where('APPEAR_FLG','=','1');
        }

        return $query->get();
    }

}