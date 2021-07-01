<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbRaceSyutujoWriteLog extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_race_syutujo_write_log';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['ID', 'JYO', ];

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
        'ID',
        'JYO',
        'TARGET_DATE',
        'NEN_KI',
        'SUCCESS_FLG',
        'SUCCESS_FLG_SP',
        'SUCCESS_FLG_MB',
        'FAILURE_TOUBAN',
        'RESIST_TIME',
        'UPDATE_TIME',
    ];
}