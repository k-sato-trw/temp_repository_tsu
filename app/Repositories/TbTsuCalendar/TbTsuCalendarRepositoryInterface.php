<?php

namespace App\Repositories\TbTsuCalendar;

interface TbTsuCalendarRepositoryInterface
{

    /**
     * 日付文字列とモード判定で重複データチェック
     *
     * @var string $target_date
     * @var string $mode
     * @var int $line
     * @var int $id
     * 
     * @return int
     */
    public function checkDuplicate($target_date,$mode,$line,$id);

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
     * カレンダーの1ライン分を取得
     *
     * @var int $type
     * @var int $line_count
     * @var array $jyo_array
     * @var array $race_type_array
     * @var string $now_year
     * @var string $now_month
     * @return object
     */
    public function getLine(
        $type,
        $line_count,
        $jyo_array,
        $race_type_array,
        $now_year,
        $now_month
    );

    /**
     * 休館日を取得
     *
     * @var int $type
     * @var string $now_year
     * @var string $now_month
     * @return object
     */
    public function getCloseDay($type,$now_year,$now_month);

    /**
     * インサート処理
     *
     * @var array $insert_array
     * @var string $mode
     * @return object
     */
    public function insertRecord($insert_array,$mode);

    /**
     * IDをキーにしてアップデート
     *
     * @var array $insert_array
     * @var string $id
     * @var string $mode
     * @return object
     */
    public function UpdateRecordByPK($insert_array,$id,$mode);

    /**
     * IDで1レコードを削除
     *
     * @var string $id
     * @return object
     */
    public function deleteFirstRecordByPK($id);

    /**
     * 掲載フラグを一斉更新
     *
     * @var object $request
     * @return object
     */
    public function ChangeAppearFlg($request);

    /**
     * 直近の日付のデータを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getRecentRecordByDate($target_date);

    
    /**
     * イベントページのフロント表示用データを取得
     *
     * @var string $target_date
     * @var int $is_preview
     * @return object
     */
    public function getRecordForEvent($target_date,$is_preview);

    /**
     * フロント用カレンダーの1ライン分を取得
     *
     * @var string $type
     * @var int $line_count
     * @var array $jyo_array
     * @var array $race_type_array
     * @var string $now_year
     * @var string $now_month
     * @var string $is_preview
     * @return object
     */
    public function getLineForFront(
        $type,
        $line_count,
        $jyo_array,
        $race_type_array,
        $now_year,
        $now_month,
        $is_preview = false
    );

    /**
     * カレンダー用に表示判定になっているものでもっとも未来の1レコードを取得
     *
     * @return object
     */
    public function getLastRecordForCalendar();

    /**
     * フロント表示用に指定の開始日の1レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $is_preview
     * @return object
     */
    public function getFirstRecordForFront($jyo,$target_date,$is_preview = false);

    /**
     * フロントTOP表示用に場外発売レコードを取得
     *
     * @var string $target_date
     * @var string $is_preview
     * @return object
     */
    public function getJyogaiRecordForTop($target_date,$is_preview = false);
    
    /**
     * フロントTOP表示用に劇場発売レコードを取得
     *
     * @var string $target_date
     * @var string $geki_racetype
     * @var string $is_preview
     * @return object
     */
    public function getgekiJyoRecordForTop($target_date,$geki_racetype,$is_preview = false);

    /**
     * フロントTOP表示用に指定日の休館レコードを取得
     *
     * @var string $target_date
     * @var string $is_preview
     * @return object
     */
    public function getKyukanRecordForTop($target_date,$is_preview = false);

    /**
     * TOPニュース表示用にレコードを取得
     *
     * @var string $target_date
     * @var string $is_preview
     * @return object
     */
    public function getRecordForNews($target_date,$is_preview = false);

}