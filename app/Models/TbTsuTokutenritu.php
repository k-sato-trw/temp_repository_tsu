<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTsuTokutenritu extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_tsu_tokutenritu';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['TARGET_DATE', 'TYPE', 'TOUBAN', ];

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
        'TARGET_DATE',
        'TYPE',
        'TOUBAN',
        'DISP_NO',
        'RANK',
        'TOKUTENRITU',
        'SYUSSOU_COUNT',
        'TOKUTEN',
        'GENTEN',
        'TOKUTEN_TOTAL',
        'BIKOU',
        'BIKOU2',
        'UP_FILENAME',
        'APPEAR_FLG',
        'RESIST_TIME',
        'UPDATE_TIME',
    ];
}