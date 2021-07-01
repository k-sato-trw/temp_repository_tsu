<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTsuCalendar extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_tsu_calendar';

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
        'TYPE',
        'JYO',
        'START_DATE',
        'END_DATE',
        'RACE_TITLE',
        'CALENDAR_RACE_TITLE',
        'GRADE',
        'RACE_TYPE',
        'LADY_FLG',
        'VIEW_LINE',
        'APPEAR_FLG',
        'EDITOR_NAME',
        'RESIST_TIME',
        'UPDATE_TIME',
    ];
}