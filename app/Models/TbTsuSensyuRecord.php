<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTsuSensyuRecord extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_tsu_sensyu_record';

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
        'TARGET_DATE',
        'DEBUT_DATE',
        'DEBUT_JYO',
        'DEBUT_SEISEKI',
        'SG_COUNT',
        'G1_COUNT',
        'G2_COUNT',
        'G3_COUNT',
        'IP_COUNT',
        'UPDATE_TIME',
        'RESIST_TIME',
    ];
}