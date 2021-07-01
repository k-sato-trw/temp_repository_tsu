<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTsuYosoMessage extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_tsu_yoso_message';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['JYO', ];

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
        'JYO',
        'START_DATE',
        'END_DATE',
        'SAMPLE1',
        'SAMPLE2',
        'SAMPLE3',
        'COMMENT',
        'PC_APPEAR_FLG',
        'SP_APPEAR_FLG',
        'MB_APPEAR_FLG',
        'APPEAR_FLG',
        'RESIST_TIME',
        'UPDATE_TIME',
    ];
}