<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTsuEventfan extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_tsu_eventfan';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['ID', 'SUB_ID', 'THIRD_ID', ];

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
        'SUB_ID',
        'THIRD_ID',
        'TYPE',
        'TITLE',
        'TEXT',
        'IMAGE1',
        'IMAGE2',
        'IMAGE3',
        'NOIMAGE',
        'APPEAR_FLG',
        'TURN',
        'EDITOR_NAME',
        'RESIST_TIME',
        'UPDATE_TIME',
    ];
}