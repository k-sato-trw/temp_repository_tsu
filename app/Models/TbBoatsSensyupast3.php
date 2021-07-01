<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbBoatsSensyupast3 extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boatinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_boats_sensyupast3';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['TOUBAN', 'TARGET_DATE', ];

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
        'TOUBAN',
        'TARGET_DATE',
        'JYO1',
        'GRADE_CODE1',
        'START_DATE1',
        'END_DATE1',
        'SETUKAN_SEISEKI1',
        'JYO2',
        'GRADE_CODE2',
        'START_DATE2',
        'END_DATE2',
        'SETUKAN_SEISEKI2',
        'JYO3',
        'GRADE_CODE3',
        'START_DATE3',
        'END_DATE3',
        'SETUKAN_SEISEKI3',
        'RESIST_TIME',
    ];
}