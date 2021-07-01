<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbBoatsMotorzenken extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boatinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_boats_motorzenken';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['JYO', 'TARGET_STARTDATE', 'TOUBAN', ];

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
        'TARGET_STARTDATE',
        'TOUBAN',
        'SENSYU_NAME',
        'MOTOR_NO',
        'MOTOR_NIRENRITU',
        'BOAT_NO',
        'BOAT_NIRENRITU',
        'ZENKEN_TIME',
        'SEX',
        'KYU_BETU',
        'RESIST_TIME',
    ];
}