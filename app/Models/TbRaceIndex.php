<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbRaceIndex extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_race_index';

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
        'START_DATE',
        'END_DATE',
        'GRADE',
        'RACE_TITLE',
        'PC_TENBO_URL',
        'MB_TENBO_URL',
        'SP_TENBO_URL',
        'PC_SYUTUJO_URL',
        'MB_SYUTUJO_URL',
        'SP_SYUTUJO_URL',
        'EDITOR_NAME',
        'RESIST_TIME',
        'UPDATE_TIME',
        'SUMINOE_TYPE',
    ];
}