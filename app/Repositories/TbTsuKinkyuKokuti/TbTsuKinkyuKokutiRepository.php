<?php

namespace App\Repositories\TbTsuKinkyuKokuti;

use App\Models\TbTsuKinkyuKokuti;

class TbTsuKinkyuKokutiRepository implements TbTsuKinkyuKokutiRepositoryInterface
{
    protected $TbTsuKinkyuKokuti;

    /**
    * @param object $TbTsuKinkyuKokuti
    */
    public function __construct(TbTsuKinkyuKokuti $TbTsuKinkyuKokuti)
    {
        $this->TbTsuKinkyuKokuti = $TbTsuKinkyuKokuti;
    }

    /**
     * 全レコードをページネイトで取得
     *
     * @var string $pre_page
     * @return object
     */
    public function getAllRecord($year,$pre_page)
    {
        return $this->TbTsuKinkyuKokuti
                    ->where('START_DATE','LIKE',$year.'%')
                    ->orderBy('ID', 'desc')
                    ->paginate($pre_page);
    }


    /**
     * レコードを年単位で取得
     *
     * @var string $year
     * @return object
     */
    public function getRecordByYear($year)
    {
        return $this->TbTsuKinkyuKokuti
                    ->where('START_DATE','>=',$year.'0101')
                    ->where('START_DATE','<=',$year.'1231')
                    ->orderBy('START_DATE', 'desc')
                    ->orderBy('ID', 'desc')
                    ->get();
    }
    
    /**
     * 存在する年リストを取得
     *
     * @return object
     */
    public function getYearList()
    {
        return $this->TbTsuKinkyuKokuti
                    ->selectRaw('LEFT( START_DATE ,4) as VIEW_YEAR')
                    ->orderBy('VIEW_YEAR', 'desc')
                    ->groupBy('VIEW_YEAR')
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
        return $this->TbTsuKinkyuKokuti
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
        return $this->TbTsuKinkyuKokuti
                    ->orderBy('ID', 'desc')
                    ->first();
    }

    /**
     * インサート処理
     *
     * @var object  $request
     * @return object
     */
    public function insertRecord($request)
    {
        //既存データ確認
        {
            $last_ID = $this->getLastRecord();
            $next_ID = $last_ID->ID + 1;
        }

        $new_datetime = date('YmdHis');

        //新規作成
        $affected = $this->TbTsuKinkyuKokuti
                        ->insert([
                            'ID' => $next_ID,
                            'START_DATE' => $request->input('START_DATE'),
                            'END_DATE' => $request->input('END_DATE'),
                            'TITLE' => $request->input('TITLE'),
                            'HONBUN' => $request->input('HONBUN'),
                            'PC_FLG' => $request->input('PC_FLG'),
                            'SP_FLG' => $request->input('SP_FLG'),
                            'MB_FLG' => $request->input('MB_FLG'),
                            'EDITOR_NAME' => $request->input('EDITOR_NAME'),
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
     * @return object
     */
    public function UpdateRecordByPK($request,$id)
    {

        $new_datetime = date('YmdHis');

        $affected = $this->TbTsuKinkyuKokuti
                            ->where('ID', $id)
                            ->update([
                                'START_DATE' => $request->input('START_DATE'),
                                'END_DATE' => $request->input('END_DATE'),
                                'TITLE' => $request->input('TITLE'),
                                'HONBUN' => $request->input('HONBUN'),
                                'PC_FLG' => $request->input('PC_FLG'),
                                'SP_FLG' => $request->input('SP_FLG'),
                                'MB_FLG' => $request->input('MB_FLG'),
                                'EDITOR_NAME' => $request->input('EDITOR_NAME'),
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
        return $this->TbTsuKinkyuKokuti
                    ->where('ID', $id)
                    ->delete();
    }


    /**
     * 施工者CMS用　IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @return object
     */
    public function UpdateRecordForAdminSekosya($request,$id)
    {

        $new_datetime = date('YmdHis');

        $affected = $this->TbTsuKinkyuKokuti
                            ->where('ID', $id)
                            ->update([
                                'START_DATE' => $request->input('txtdate1'),
                                'END_DATE' => $request->input('txtdate2'),
                                'TITLE' => $request->input('title'),
                                'HONBUN' => $request->input('honbun'),
                                'PC_FLG' => $request->input('pc_check'),
                                'SP_FLG' => $request->input('sp_check'),
                                'MB_FLG' => $request->input('mb_check'),
                                'EDITOR_NAME' => $request->input('editor'),
                                'UPDATE_TIME' => $new_datetime,
                            ]);
        return $affected;
    }


    /**
     * 施工者CMS用　インサート処理
     *
     * @var object  $request
     * @return object
     */
    public function insertRecordForAdminSekosya($request)
    {
        //既存データ確認
        {
            $last_ID = $this->getLastRecord();
            $next_ID = $last_ID->ID + 1;
        }

        $new_datetime = date('YmdHis');

        //新規作成
        $affected = $this->TbTsuKinkyuKokuti
                        ->insert([
                            'ID' => $next_ID,
                            'START_DATE' => $request->input('txtdate1'),
                            'END_DATE' => $request->input('txtdate2'),
                            'TITLE' => $request->input('title'),
                            'HONBUN' => $request->input('honbun'),
                            'PC_FLG' => $request->input('pc_check'),
                            'SP_FLG' => $request->input('sp_check'),
                            'MB_FLG' => $request->input('mb_check'),
                            'EDITOR_NAME' => $request->input('editor'),
                            'APPEAR_FLG' => 0,
                            'RESIST_TIME' => $new_datetime,
                            'UPDATE_TIME' => $new_datetime,
                        ]);

        return $affected;
    }

    

    /**
     * IDをキーにして掲載フラグをアップデート
     *
     * @var string $id
     * @var int $appear_flg
     * @return object
     */
    public function changeAppearFlg($id,$appear_flg)
    {

        $new_datetime = date('YmdHi');

        $affected = $this->TbTsuKinkyuKokuti
                            ->where('ID', $id)
                            ->update([
                                'APPEAR_FLG' => $appear_flg,
                                'UPDATE_TIME' => $new_datetime,
                            ]);
        return $affected;
    }


}