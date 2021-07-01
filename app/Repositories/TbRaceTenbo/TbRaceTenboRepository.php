<?php

namespace App\Repositories\TbRaceTenbo;

use App\Models\TbRaceTenbo;
use App\Models\TbRaceTenboExtra;

class TbRaceTenboRepository implements TbRaceTenboRepositoryInterface
{
    protected $TbRaceTenbo;

    /**
    * @param object $TbRaceTenbo
    */
    public function __construct(TbRaceTenbo $TbRaceTenbo)
    {
        $this->TbRaceTenbo = $TbRaceTenbo;
    }


    /**
     * IDレストをもとにをレコード取得
     *
     * @var array $id_list
     * @return object
     */
    public function getRecordByIdlist($id_list)
    {
        return $this->TbRaceTenbo
                    ->where('JYO',config('const.JYO_CODE'))
                    ->whereIn('ID',$id_list)
                    ->orderBy('ID', 'asc')->get();
    }
    

    /**
     * IDで1レコードを削除
     *
     * @var string $id
     * @return object
     */
    public function deleteFirstRecordByPK($id)
    {
        return $this->TbRaceTenbo
                    ->where('ID', $id)
                    ->where('JYO',config("const.JYO_CODE"))
                    ->delete();
    }

    /**
     * IDで1レコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordByPK($id)
    {
        return $this->TbRaceTenbo
                    ->join('tb_race_tenbo_extra',function($join){
                        $join->on('tb_race_tenbo.JYO','=','tb_race_tenbo_extra.JYO')
                        ->on('tb_race_tenbo.ID','=','tb_race_tenbo_extra.ID');
                    })
                    ->where('tb_race_tenbo.ID','=',$id)
                    ->where('tb_race_tenbo.JYO',config("const.JYO_CODE"))
                    ->first();
    }

    /**
     * 親テーブルのIDをもとにインサート処理
     *
     * @var object  $request
     * @var string  $id
     * @return object
     */
    public function insertRecord($request,$id)
    {
        //新規作成
        $affected = $this->TbRaceTenbo
                        ->insert([
                            'ID' => $id,
                            'JYO' => config('const.JYO_CODE'),
                            'LEADER1' => $request->input('LEADER1'),
                            'LEADER2' => $request->input('LEADER2'),
                            'LEADER3' => $request->input('LEADER3'),
                            'LEADER4' => $request->input('LEADER4'),
                            'LEADER5' => $request->input('LEADER5'),
                            'LEADER6' => $request->input('LEADER6'),
                            'TITLE' => $request->input('TITLE'),
                            'LETTER_BODY' => $request->input('LETTER_BODY'),
                            'LEADTITLE' => $request->input('LEADTITLE'),
                            'LEADLETTER_BODY' => $request->input('LEADLETTER_BODY'),
                            'EDITOR_NAME' => $request->input('EDITOR_NAME'),
                        ]);

        return $affected;
    }
    
    /**
     * IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @return object
     */
    public function UpdateRecordByPK($request,$id)
    {
        $affected = $this->TbRaceTenbo
                            ->where('ID', $id)
                            ->where('JYO', config('const.JYO_CODE'))
                            ->update([
                                'LEADER1' => $request->input('LEADER1'),
                                'LEADER2' => $request->input('LEADER2'),
                                'LEADER3' => $request->input('LEADER3'),
                                'LEADER4' => $request->input('LEADER4'),
                                'LEADER5' => $request->input('LEADER5'),
                                'LEADER6' => $request->input('LEADER6'),
                                'TITLE' => $request->input('TITLE'),
                                'LETTER_BODY' => $request->input('LETTER_BODY'),
                                'LEADTITLE' => $request->input('LEADTITLE'),
                                'LEADLETTER_BODY' => $request->input('LEADLETTER_BODY'),
                                'EDITOR_NAME' => $request->input('EDITOR_NAME'),
                            ]);
        return $affected;
    }

    /**
     * IDで1レコードを取得(TOP非開催表示用データ)
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordForTop($id)
    {
        return $this->TbRaceTenbo
                    ->where('ID','=',$id)
                    ->where('JYO',config("const.JYO_CODE"))
                    ->first();
    }


    
}