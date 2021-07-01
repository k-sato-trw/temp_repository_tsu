<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbBoatOzzinfo extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boatinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_boat_ozzinfo';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['JYO', 'TARGET_DATE', 'RACE_NUMBER', ];

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
        'RACE_NUMBER',
        'RACE_NAME',
        'STOP_CODE',
        'VOTE_HOUSIKI',
        'KETUJO_HENKAN1',
        'KETUJO_HENKAN2',
        'KETUJO_HENKAN3',
        'KETUJO_HENKAN4',
        'KETUJO_HENKAN5',
        'KETUJO_HENKAN6',
        'RESIST_TIME',
        'UPDATE_TIME',
    ];
}