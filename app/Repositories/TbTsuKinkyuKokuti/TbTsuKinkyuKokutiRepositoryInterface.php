<?php

namespace App\Repositories\TbTsuKinkyuKokuti;

interface TbTsuKinkyuKokutiRepositoryInterface
{

    /**
     * 全レコードをページネイトで取得
     *
     * @var string $pre_page
     * @return object
     */
    public function getAllRecord($year,$pre_page);

     /**
     * 存在する年リストを取得
     *
     * @return object
     */
    public function getYearList();

    /**
     * レコードを年単位で取得
     *
     * @var string $year
     * @return object
     */
    public function getRecordByYear($year);

    /**
     * IDで1レコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordByPK($id);

    /**
     * 最大IDのレコードを取得
     *
     * @return object
     */
    public function getLastRecord();

    /**
     * インサート処理
     *
     * @var object  $request
     * @return object
     */
    public function insertRecord($request);

    /**
     * IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @return object
     */
    public function UpdateRecordByPK($request,$id);

    /**
     * IDで1レコードを削除
     *
     * @var string $id
     * @return object
     */
    public function deleteFirstRecordByPK($id);

    /**
     * 施工者CMS用　IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @return object
     */
    public function UpdateRecordForAdminSekosya($request,$id);

    /**
     * 施工者CMS用　インサート処理
     *
     * @var object  $request
     * @return object
     */
    public function insertRecordForAdminSekosya($request);

    /**
     * IDをキーにして掲載フラグをアップデート
     *
     * @var string $id
     * @var int $appear_flg
     * @return object
     */
    public function changeAppearFlg($id,$appear_flg);

}