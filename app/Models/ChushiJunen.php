<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChushiJunen extends Model
{
    use HasFactory;

    protected $connection = 'mysql_tfinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = '中止順延テーブル';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = [];

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
        '開催区分',
        '中止日付',
        '中止フラグ',
        '中止開始レース番号',
        '掲載フラグ',
        '編集者',
        '登録日付',
        '更新日付',
    ];
}