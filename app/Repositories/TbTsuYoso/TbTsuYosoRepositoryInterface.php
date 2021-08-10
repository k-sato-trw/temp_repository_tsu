<?php

namespace App\Repositories\TbTsuYoso;

interface TbTsuYosoRepositoryInterface
{

    /**
     * 指定のレースで1レコードを取得
     *
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getFirstRecordByPK($target_date,$race_num);

    /**
     * 指定のレースで1レコードを取得
     *
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getFirstRecordByDate($target_date,$race_num,$is_preview = false);

    /**
     * 指定の日付レースでプッシュ対象を取得
     *
     * @var string $target_date
     * @return object
     */
    public function getPushing($target_date);

    
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

}