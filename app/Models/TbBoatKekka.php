<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbBoatKekka extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boatinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_boat_kekka';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['JYO', 'TARGET_DATE', 'RACE_NUMBER', 'TEIBAN', ];

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
        'TEIBAN',
        'TOUBAN',
        'SENSYU_NAME',
        'SEX',
        'TYAKUJUN',
        'RACE_TIME',
        'SHINNYU_COURSE',
        'START_TIMING',
        'SIKKAKU',
        'KIMARITE',
        'RESIST_TIME',
    ];
}