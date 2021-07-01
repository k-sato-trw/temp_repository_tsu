<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbBoatsSensyusyussou2 extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boatinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_boats_sensyusyussou2';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['TOUBAN', 'TARGET_DATE', 'TARGET_STARTDATE', 'TARGET_ENDDATE', ];

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
        'TARGET_STARTDATE',
        'TARGET_ENDDATE',
        'JYO',
        'RACE_TITLE',
        'GRADE_CODE',
        'RESIST_TIME',
    ];
}