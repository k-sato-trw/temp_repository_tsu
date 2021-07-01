<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerManagement extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'バナー管理テーブル';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['場コード', 'バナーID', ];

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
        'バナーID',
        '掲載開始日時',
        '掲載終了日時',
        '縦軸',
        '横軸',
        'イメージURL',
        'イメージの高さ',
        'イメージの幅',
        'リンク先URL',
        '別画面',
        'ALT',
        '担当者',
        '更新日時',
        'SORT',
        'APPEAR_FLG',
    ];
}