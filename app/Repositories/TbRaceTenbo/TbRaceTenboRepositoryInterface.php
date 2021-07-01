<?php

namespace App\Repositories\TbRaceTenbo;

interface TbRaceTenboRepositoryInterface
{

    
    /**
     * IDレストをもとにをレコード取得
     *
     * @var array $id_list
     * @return object
     */
    public function getRecordByIdlist($id_list);
    
    /**
     * IDで1レコードを削除
     *
     * @var string $id
     * @return object
     */
    public function deleteFirstRecordByPK($id);

    /**
     * IDで1レコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordByPK($id);

    /**
     * 親テーブルのIDをもとにインサート処理
     *
     * @var object  $request
     * @var string  $id
     * @return object
     */
    public function insertRecord($request,$id);

    /**
     * IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @return object
     */
    public function UpdateRecordByPK($request,$id);

    /**
     * IDで1レコードを取得(TOP非開催表示用データ)
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordForTop($id);
    

}