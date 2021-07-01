<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTsuTopic extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_tsu_topic';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['ID', ];

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
        'START_DATE',
        'END_DATE',
        'IMAGE',
        'PC_URL',
        'SP_URL',
        'PC_BLANK_FLG',
        'SP_BLANK_FLG',
        'PC_APPEAR_FLG',
        'SP_APPEAR_FLG',
        'VIEW_POINT',
        'BIG_FLAG',
        'APPEAR_FLG',
        'RESIST_TIME',
        'UPDATE_TIME',
    ];
}