<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaisaiMaster extends Model
{
    use HasFactory;

    protected $connection = 'mysql_tfinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = '開催マスター';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['場コード', '開催名称', '開始日付', '終了日付', '開催区分'];

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
        '開催名称',
        '開始日付',
        '終了日付',
        '開催区分',
        '登録日付',
        '更新日付',
    ];
}
