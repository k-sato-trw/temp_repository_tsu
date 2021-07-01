<?php

namespace App\Repositories\TbRaceSyutujoRacer;

interface TbRaceSyutujoRacerRepositoryInterface
{

    /**
     * IDをもとにレコードを取得　マークでソート
     *
     * @var int $id
     * @return object
     */
    public function getRecordByPK($id);

    /**
     * IDと予想をもとにレコードを取得
     *
     * @var int $id
     * @var string $yoso
     * @return object
     */
    public function getRecordByPKAndYoso($id,$yoso);

    /**
     * インサート処理
     *
     * @var object  $request
     * @var int  $id
     * @return object
     */
    public function insertRecord($request,$id);

    /**
     * ID、当番で1レコードを取得
     *
     * @var int $id
     * @var string $touban
     * @return object
     */
    public function getFirstRecordByPK($id,$touban);

    /**
     * ID、当番をキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @var string $touban
     * @return object
     */
    public function UpdateRecordByPK($request,$id,$touban);

    /**
     * IDと登録番号で1レコードを削除
     *
     * @var int $id
     * @var string $touban
     * @return object
     */
    public function deleteFirstRecordByPK($id, $touban);

    /**
     * IDと登録番号で1レコードの予想を削除
     *
     * @var int $id
     * @var string $touban
     * @return object
     */
    public function clearYosoByPK($id, $touban);

    /**
     * 1レコードの予想を更新
     *
     * @var int $id
     * @var object $request
     * @return object
     */
    public function updateYosoByPK($request,$id);

    /**
     * レース展望の出場表用、追加リスト・除外リスト作成の為、掲載フラグを条件に追加
     *
     * @var int $id
     * @var int $appear_flg
     * @return object
     */
    public function getRecordForRaceTenbo($id,$appear_flg);

}