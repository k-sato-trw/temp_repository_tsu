<?php

namespace App\Repositories\TbTsuYosoTenji;

interface TbTsuYosoTenjiRepositoryInterface
{

    /**
     * 管理画面用指定のレースで1レコードを取得
     *
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getFirstRecordByPK($target_date,$race_num);

    /**
     * アップサート処理
     *
     * @var object  $request
     * @return object
     */
    public function upsertRecord($request);

    /**
     * 公開フラグ変更
     *
     * @var object $request
     * @return object
     */
    public function changeAppearFlg($request);

    /**
     * 12レース公開フラグ変更
     *
     * @var object $request
     * @return object
     */
    public function changeAppearFlgAll($request);

    /**
     * 指定のレースで1レコードを取得
     *
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getFirstRecordByDate($target_date,$race_num,$is_preview = false);

    /**
     * 指定期間の全レースのレコードを取得
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordForTekichuritsu($start_date,$end_date);

}