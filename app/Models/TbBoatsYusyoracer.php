<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbBoatsYusyoracer extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boatinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_boats_yusyoracer';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['TARGET_MONTH', 'TARGET_DATE', 'JYO', 'TOUBAN', ];

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
        'TARGET_MONTH',
        'TARGET_DATE',
        'JYO',
        'TOUBAN',
        'SENSYU_NAME',
        'GRADE_CODE',
        'RACE_NAME',
        'RACE_NUMBER',
        'KIMARITE',
        'SHUKEI_KIKAN',
        'KAISAI_DAYS',
        'RACE_TITLE',
        'RESIST_TIME',
    ];
}