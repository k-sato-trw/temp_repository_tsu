<?php

namespace App\Repositories\TbTsuEventfan;

use App\Models\TbTsuEventfan;

class TbTsuEventfanRepository implements TbTsuEventfanRepositoryInterface
{
    protected $TbTsuEventfan;

    /**
    * @param object $TbTsuEventfan
    */
    public function __construct(TbTsuEventfan $TbTsuEventfan)
    {
        $this->TbTsuEventfan = $TbTsuEventfan;
    }

    /**
     * 全レコードをページネイトで取得
     *
     * @var string $id
     * @return object
     */
    public function getRecord($id)
    {
        return $this->TbTsuEventfan
                    ->where('ID','=',$id)
                    ->orderBy('ID', 'desc')
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
    public function getFirstRecordByPK($id,$sub_id,$third_id)
    {
        return $this->TbTsuEventfan
                    ->where('ID','=',$id)
                    ->where('SUB_ID','=',$sub_id)
                    ->where('THIRD_ID','=',$third_id)
                    ->first();
    }

    /**
     * 最大IDのレコードを取得
     *
     * @var string $id
     * @var string $sub_id
     * @return object
     */
    public function getLastRecord($id,$sub_id)
    {
        return $this->TbTsuEventfan
                    ->where('ID','=',$id)
                    ->where('SUB_ID','=',$sub_id)
                    ->orderBy('THIRD_ID', 'desc')
                    ->first();
    }

    /**
     * インサート処理
     *
     * @var string $id
     * @var string $sub_id
     * @var array $file_name
     * @var object  $request
     * @return object
     */
    public function insertRecord($request,$id,$sub_id,$file_name)
    {
        //既存データ確認
        {
            $last_ID = $this->getLastRecord($id,$sub_id);
            $next_THIRD_ID = $last_ID->THIRD_ID + 1;
        }

        $new_datetime = date('YmdHis');

        //新規作成
        $affected = $this->TbTsuEventfan
                        ->insert([
                            'ID' => $id,
                            'SUB_ID' => $sub_id,
                            'THIRD_ID' => $next_THIRD_ID,
                            'TYPE' => $request->input('TYPE'),
                            'TITLE' => $request->input('TITLE'),
                            'TEXT' => $request->input('TEXT'),
                            'IMAGE1' => $file_name[1],
                            'IMAGE2' => $file_name[2],
                            'IMAGE3' => $file_name[3],
                            'NOIMAGE' => $request->input('NOIMAGE'),
                            'APPEAR_FLG' => $request->input('APPEAR_FLG'),
                            'TURN' => $request->input('TURN'),
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
     * @var string $third_id
     * @var array $file_name
     * @return object
     */
    public function UpdateRecordByPK($request,$id,$sub_id,$third_id,$file_name)
    {

        $new_datetime = date('YmdHis');

        $affected = $this->TbTsuEventfan
                            ->where('ID', $id)
                            ->where('SUB_ID', $sub_id)
                            ->where('THIRD_ID', $third_id)
                            ->update([

                                'TYPE' => $request->input('TYPE'),
                                'TITLE' => $request->input('TITLE'),
                                'TEXT' => $request->input('TEXT'),
                                'IMAGE1' => $file_name[1],
                                'IMAGE2' => $file_name[2],
                                'IMAGE3' => $file_name[3],
                                'NOIMAGE' => $request->input('NOIMAGE'),
                                'APPEAR_FLG' => $request->input('APPEAR_FLG'),
                                'TURN' => $request->input('TURN'),
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
     * @var string $third_id
     * @return object
     */
    public function deleteFirstRecordByPK($id,$sub_id,$third_id)
    {
        return $this->TbTsuEventfan
                    ->where('ID', $id)
                    ->where('SUB_ID', $sub_id)
                    ->where('THIRD_ID', $third_id)
                    ->delete();
    }


    /**
     * TOP 非開催表示用データ取得
     *
     * @var string $id
     * @return object
     */
    public function getRecordForTop($id)
    {
        return $this->TbTsuEventfan
                    ->where('ID','=',$id)
                    ->where('APPEAR_FLG','=','1')
                    ->orderBy('ID', 'desc')
                    ->orderBy('SUB_ID', 'desc')
                    ->get();
    }


    /**
     * イベントページ用データ取得
     * 
     * @var array $multi_id_list
     * @var int $is_preview
     * @return object
     */
    public function getRecordForEvent($multi_id_list,$is_preview)
    {
        $query = $this->TbTsuEventfan;

        foreach($multi_id_list as $array){
            $query->orWhere(function($query2) use($array){
                $query2->where('ID','=',$array['ID'])
                        ->where('SUB_ID','=',$array['SUB_ID']);
            });
        }

        if(!$is_preview){
            $query->where('APPEAR_FLG','=','1');
        }
        return $query->orderBy('ID', 'desc')
                    ->orderBy('SUB_ID', 'desc')
                    ->get();
    }
    

}