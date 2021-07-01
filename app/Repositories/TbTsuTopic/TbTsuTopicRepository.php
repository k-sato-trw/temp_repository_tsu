<?php

namespace App\Repositories\TbTsuTopic;

use App\Models\TbTsuTopic;

class TbTsuTopicRepository implements TbTsuTopicRepositoryInterface
{
    protected $TbTsuTopic;

    /**
    * @param object $TbTsuTopic
    */
    public function __construct(TbTsuTopic $TbTsuTopic)
    {
        $this->TbTsuTopic = $TbTsuTopic;
    }

    /**
     * 全レコードをページネイトで取得
     *
     * @var string $pre_page
     * @return object
     */
    public function getAllRecord($pre_page)
    {
        return $this->TbTsuTopic
                    ->orderBy('ID', 'desc')
                    ->paginate($pre_page);
    }

    /**
     * 日付基準で現在表示対象になっているレコード取得
     *
     * @var string $target_date
     * @var string $device
     * @return object
     */
    public function getAppearRecord($target_date,$device)
    {
        $query = $this->TbTsuTopic
                    ->where('START_DATE','<=',$target_date)
                    ->where('END_DATE','>=',$target_date)
                    ->where('VIEW_POINT','>=',1)
                    ->where('VIEW_POINT','<=',15)
                    ->where('APPEAR_FLG',1);
        if($device == "pc"){
            $query->where('PC_APPEAR_FLG',1);
        }elseif($device == "sp"){
            $query->where('SP_APPEAR_FLG',1);
        }

        return $query->orderBy('VIEW_POINT', 'asc')
                    ->get();
    }

    
    /**
     * 予備レコード取得
     *
     * @return object
     */
    public function getYobiRecord()
    {
        $query = $this->TbTsuTopic
                    ->where('VIEW_POINT','>=',16)
                    ->where('VIEW_POINT','<=',18);

        return $query->orderBy('VIEW_POINT', 'asc')
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
        return $this->TbTsuTopic
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
        return $this->TbTsuTopic
                    ->orderBy('ID', 'desc')
                    ->first();
    }

    /**
     * インサート処理
     *
     * @var object  $request
     * @var string  $file_name
     * @return object
     */
    public function insertRecord($request,$file_name)
    {
        //既存データ確認
        {
            $last_ID = $this->getLastRecord();
            $next_ID = $last_ID->ID + 1;
        }

        $new_datetime = date('YmdHis');

        //新規作成
        $affected = $this->TbTsuTopic
                        ->insert([
                            'ID' => $next_ID,                            
                            'START_DATE' => $request->input('START_DATE'),
                            'END_DATE' => $request->input('END_DATE'),
                            'IMAGE' => $file_name,
                            'PC_URL' => $request->input('PC_URL'),
                            'SP_URL' => $request->input('SP_URL'),
                            'PC_BLANK_FLG' => $request->input('PC_BLANK_FLG'),
                            'SP_BLANK_FLG' => $request->input('SP_BLANK_FLG'),
                            'PC_APPEAR_FLG' => $request->input('PC_APPEAR_FLG'),
                            'SP_APPEAR_FLG' => $request->input('SP_APPEAR_FLG'),
                            'VIEW_POINT' => $request->input('VIEW_POINT'),
                            'BIG_FLAG' => $request->input('BIG_FLAG'),
                            'APPEAR_FLG' => $request->input('APPEAR_FLG'),
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
     * @var string $file_name
     * @return object
     */
    public function UpdateRecordByPK($request,$id,$file_name)
    {

        $new_datetime = date('YmdHis');

        $affected = $this->TbTsuTopic
                            ->where('ID', $id)
                            ->update([
                                'START_DATE' => $request->input('START_DATE'),
                                'END_DATE' => $request->input('END_DATE'),
                                'IMAGE' => $file_name,
                                'PC_URL' => $request->input('PC_URL'),
                                'SP_URL' => $request->input('SP_URL'),
                                'PC_BLANK_FLG' => $request->input('PC_BLANK_FLG'),
                                'SP_BLANK_FLG' => $request->input('SP_BLANK_FLG'),
                                'PC_APPEAR_FLG' => $request->input('PC_APPEAR_FLG'),
                                'SP_APPEAR_FLG' => $request->input('SP_APPEAR_FLG'),
                                'VIEW_POINT' => $request->input('VIEW_POINT'),
                                'BIG_FLAG' => $request->input('BIG_FLAG'),
                                'APPEAR_FLG' => $request->input('APPEAR_FLG'),
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
        return $this->TbTsuTopic
                    ->where('ID', $id)
                    ->delete();
    }


    /**
     * 日付文字列とモード判定で重複データチェック
     *
     * @var string $target_datetime
     * @var int $view_point
     * @var int $id
     * @return int
     */
    public function checkDuplicate($target_datetime,$view_point,$id)
    {
        $check = $this->TbTsuTopic
            ->where('START_DATE' , '<=' ,$target_datetime)
            ->where('END_DATE' , '>=' ,$target_datetime);
        
        if($id){ //IDが存在する場合EDITなので、同一IDは除外
            $check->where('ID' , '!=' ,$id);
        }

        $check->where('VIEW_POINT','=',$view_point);        

        return $check->count();
    }

}