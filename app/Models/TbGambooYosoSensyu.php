<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbGambooYosoSensyu extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boatinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_gamboo_yoso_sensyu';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['TARGET_DATE', 'JYO', 'RACE_NUMBER', 'TEIBAN', ];

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
        'TEIBAN',
        'YOSO_SHINNYU',
        'YOSO_MARK',
        'MUTCHUP_1',
        'MUTCHUP_2',
        'MUTCHUP_3',
        'MUTCHUP_4',
        'MUTCHUP_5',
        'MUTCHUP_6',
        'FIRST_POINT',
        'SECOND_POINT',
        'THIRD_POINT',
        'OVERALL_POINT',
        'RESIST_TIME',
        'UPDATE_TIME',
    ];
}