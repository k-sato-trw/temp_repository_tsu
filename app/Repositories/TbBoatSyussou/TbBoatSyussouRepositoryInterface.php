<?php

namespace App\Repositories\TbBoatSyussou;

interface TbBoatSyussouRepositoryInterface
{
    /**
     * JYO, TARGET_DATE, RACE_NUM で該当レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getRecordByPK($jyo,$target_date,$race_num);

    /**
     * 記者CMS 出足データの該当レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getRecordByDate($jyo,$target_date);

    /**
     * 記者CMS 節間出足データの該当レコードを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getSetsukanRecord($jyo,$start_date,$end_date);

    /**
     * プロフィール出力用優勝データを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @var string $touban
     * @return object
     */
    public function getYushoRecordForProfile($jyo,$start_date,$end_date,$touban = false);

    /**
     * プロフィール出力用データを取得
     *
     * @var string $touban
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getFirstRecordForProfile($touban,$jyo,$start_date,$end_date);

    /**
     * プロフィール出力用、直近成績データを取得
     *
     * @var string $touban
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getFirstChokkinRecordForProfile($touban,$jyo,$target_date);


    /**
     * フロントモーター履歴　規定日より前の特定場のモーターNOを降順で取得
     * boat_kekkaと一対一でjoinする。
     *
     * @var string $target_date
     * @var string $jyo
     * @var string $motor_no
     * @return object
     */
    public function getMotorRirekiJoinKekka($target_date,$jyo,$motor_no);

    /**
     * フロント直近三節の履歴　登番に対して規定日より前のデータを降順で取得
     * boat_kekkaと一対一でjoinする。
     *
     * @var string $target_date
     * @var string $touban
     * @return object
     */
    public function getKinkyoRirekiJoinKekka($target_date,$touban);

    /**
     * フロント直近当地の履歴　登番に対して規定日より前のデータを降順で取得
     * boat_kekkaとtb_boat_raceheaderで一対一対一でjoinする。
     *
     * @var string $target_date
     * @var string $touban
     * @var string $jyo
     * @return object
     */
    public function getKinkyoTouchiRirekiJoinKekka($target_date,$touban,$jyo);

    /**
     * フロント直近当地の履歴 展望ページ出場リスト用　複数登録番号を一括で取得
     * 登番に対して規定日より前のデータを降順で取得
     * boat_kekkaとtb_boat_raceheaderで一対一対一でjoinする。
     *
     * @var string $target_date
     * @var array $touban_list
     * @var string $jyo
     * @return object
     */
    public function getKinkyoTouchiRirekiJoinKekkaAll($target_date, $touban_list, $jyo);

    /**
     * リプレイ用に複数の検索条件 で該当レコードを取得
     *
     * @var string $jyo
     * @var array $search_conditions
     * @return object
     */
    public function getRecordForReplay($jyo,$search_conditions);

    /**
     * SP競技のメニュー表示用、指定日の全レースのレース名を収集
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getRecordForSpKyogi($jyo,$target_date);

    /**
     * 出場表用優出カウントを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @var string $touban
     * @return object
     */
    public function getYusyutuCount($jyo,$start_date,$end_date,$touban);

    /**
     * 東京NEXT表示用、指定日の全場レースを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getAllJyoRecordByDate($target_date);

    /**
     * JYO, TARGET_DATE で一日分の該当レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getRecordBkDate($jyo,$target_date);


    /**
     * デビュー用データを取得
     *
     * @var string $touban
     * @return object
     */
    public function getDebutRecordForProfile($touban);

    
    /**
     * ボートNOに基づいて期間中の出走データを取得
     * boat_kekkaと一対一でjoinする。
     *
     * @var string $start_date
     * @var string $end_date
     * @var string $jyo
     * @var string $motor_no
     * @return object
     */
    public function getBoatSyussouCount($start_date,$end_date,$jyo,$boat_no);


    /**
     * モーターNOに基づいて期間中の出走データを取得
     * boat_kekkaと一対一でjoinする。
     *
     * @var string $start_date
     * @var string $end_date
     * @var string $jyo
     * @var string $motor_no
     * @return object
     */
    public function getMotorSyussouCount($start_date,$end_date,$jyo,$motor_no);

    /**
     * JYO, TARGET_DATE, RACE_NUM 艇番 で該当レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @var string $teiban
     * @return object
     */
    public function getFirstRecordByPK($jyo,$target_date,$race_num,$teiban);

}