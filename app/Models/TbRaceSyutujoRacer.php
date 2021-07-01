<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbRaceSyutujoRacer extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_race_syutujo_racer';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['ID', 'JYO', 'TOUBAN', ];

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
        'JYO',
        'TOUBAN',
        'APPEAR_FLG',
        'YOSO',
        'SENSYU_NAME',
        'AGE',
        'ADDRESS',
        'SEX',
        'KYU',
        'ALLWIN',
        'ALL2WIN',
        'ALLAVGST',
        'ALLCOUNT',
        'BIRTHDAY',
        'RESIST_TIME',
        'UPDATE_TIME',
        'EDITOR_NAME',
    ];
}