<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BangumiData extends Model
{
    use HasFactory;

    protected $connection = 'mysql_tfinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = '番組データ';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['場コード', '開催日付', 'レース番号', '艇番号', '登番'];

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        '場コード',
        '開催日付',
        'レース番号',
        '艇番号',
        '登番',
        '選期',
        '選手名',
        '年齢',
        '性別',
        '出身地',
        '体重',
        '級',
        '全国勝率',
        '全国複勝率',
        '当地勝率',
        '当地複勝率',
        'モーター番号',
        'モーター複勝率',
        'ボート番号',
        'ボート複勝率',
        '今節成績',
        '早見表',
        '着順',
        'スタート展示進入',
        'スタート展示タイム',
        'スタート展示SD情報',
        '展示タイム',
        '進入',
        'スタートタイミング',
        'レースタイム',
        '欠場失格',
        'F',
        'L',
        '当日体重',
        '備考',
        '登録日付',
        '更新日付',
    ];
}
