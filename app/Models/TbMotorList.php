<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbMotorList extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boatinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_motor_list';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['JYO', 'TARGET_DATE', 'MOTOR_NO', ];

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
        'MOTOR_NO',
        'NIRENRITU',
        'YUSHUTU_CNT',
        'YUSHO_CNT',
        'RECODE_TIME',
        'RESIST_TIME',
        'UPDATE_TIME',
        'ZENKEN_TIME',
    ];
}