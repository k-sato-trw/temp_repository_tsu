<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbGambooYosoRace extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boatinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_gamboo_yoso_race';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['TARGET_DATE', 'JYO', 'RACE_NUMBER', ];

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
        'TARGET_DATE',
        'JYO',
        'RACE_NUMBER',
        'NIRENTAN_1',
        'NIRENTAN_2',
        'NIRENTAN_3',
        'NIRENTAN_4',
        'NIRENTAN_5',
        'NIRENTAN_6',
        'SANRENTAN_1',
        'SANRENTAN_2',
        'SANRENTAN_3',
        'SANRENTAN_4',
        'SANRENTAN_5',
        'SANRENTAN_6',
        'CONFIDENCE',
        'RESIST_TIME',
        'UPDATE_TIME',
    ];
}