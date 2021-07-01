<?php

namespace App\Repositories\TbBoatsMotorzenken;

interface TbBoatsMotorzenkenRepositoryInterface
{

    /**
     * ランキングデータを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getMotorRanking($target_date);

    /**
     * 前検タイムランキングデータを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getTimeRanking($target_date);

    /**
     * TOP表示用前検データを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordForNews($target_date);

    /**
     * モーター切り替え日検索用データを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getMotorChangeCount($target_date);

    /**
     * 指定日のモーターリストを取得
     *
     * @var string $target_date
     * @var string $sort
     * @return object
     */
    public function getMotorList($target_date,$sort);

    /**
     * 指定日のモーターリストを取得 SPの場合ソート条件が異なる
     *
     * @var string $target_date
     * @var string $sort
     * @return object
     */
    public function getMotorListForSp($target_date,$sort);

}