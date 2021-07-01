<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbBoatKibetu extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boatinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_boat_kibetu';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['TOUBAN', ];

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
        'SYORITU',
        'RENRITU_2',
        'RENRITU_3',
        'SYUSSOUKAI',
        'YUSYOSYUTU',
        'YUSYOKAI',
        'ST',
        'F_COUNT',
        'L_COUNT',
        'NOURYOKU',
        'P1',
        'P2',
        'P3',
        'P4',
        'P5',
        'P6',
        'TALLY_START_DATE',
        'TALLY_END_DATE',
        'RESIST_TIME',
    ];
}