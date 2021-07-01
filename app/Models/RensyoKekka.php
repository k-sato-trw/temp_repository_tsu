<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RensyoKekka extends Model
{
    use HasFactory;

    protected $connection = 'mysql_tfinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = '連勝結果';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['場コード', '開催日付', 'レース番号', 'SEQ', '賭式' ];

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
        'SEQ',
        '番号前',
        '番号中',
        '番号後',
        '賭式',
        '賭式コード',
        '金額',
        '決まり手コード',
        '決まり手',
        '人気',
        '備考',
        '登録日付',
        '更新日付',
        'msrepl_synctran_ts',
    ];
}