<?php

namespace App\Repositories\TbTsuInformation;

interface TbTsuInformationRepositoryInterface
{

    /**
     * 全レコードをページネイトで取得
     *
     * @var string $pre_page
     * @return object
     */
    public function getAllRecord($pre_page);

    /**
     * レコードを年単位で取得
     *
     * @var string $year
     * @return object
     */
    public function getRecordByYear($year);

    /**
     * 存在する年リストを取得
     *
     * @return object
     */
    public function getYearList();

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
     * @var array $file_name
     * @return object
     */
    public function insertRecord($request,$file_name);

    /**
     * IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @var array $file_name
     * @return object
     */
    public function UpdateRecordByPK($request,$id,$file_name);

    /**
     * IDで1レコードを削除
     *
     * @var string $id
     * @return object
     */
    public function deleteFirstRecordByPK($id);

    /**
     * 施工者CMS IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @var array $file_name
     * @return object
     */
    public function UpdateRecordForAdminSekosya($request,$id,$file_name);

    /**
     * 施工者CMS インサート処理
     *
     * @var object  $request
     * @var array $file_name
     * @return object
     */
    public function insertRecordForAdminSekosya($request,$file_name);

    /**
     * IDをキーにして掲載フラグをアップデート
     *
     * @var string $id
     * @var int $appear_flg
     * @return object
     */
    public function changeAppearFlg($id,$appear_flg);


    /**
     * フロント表示用レコードを取得
     *
     * @var string $target_year
     * @var string $is_preview
     * @return object
     */
    public function getRecordForFront($target_year,$is_preview = false);


    /**
     * SPフロント表示用レコードを取得
     *
     * @var string $target_year
     * @var string $is_preview
     * @return object
     */
    public function getRecordForFrontSp($target_year,$is_preview = false);


    /**
     * フロント表示可能な「年」を取得
     *
     * @return object
     */
    public function getDisplayYearList();


    /**
     * SPフロント表示可能な「年」を取得
     *
     * @return object
     */
    public function getDisplayYearListSp();
    

}