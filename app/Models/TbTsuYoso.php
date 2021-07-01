<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTsuYoso extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_tsu_yoso';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['JYO', 'TARGET_DATE', 'RACE_NUM', ];

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
        'TARGET_DATE',
        'RACE_NUM',
        'EVALUATION1',
        'EVALUATION2',
        'EVALUATION3',
        'EVALUATION4',
        'EVALUATION5',
        'EVALUATION6',
        'ENTRY',
        'MEMO',
        'CONFIDENCE',
        'PUSHING_FLG',
        'APPEAR_FLG',
        'UPDATE_TIME',
        'RESIST_TIME',
    ];
}