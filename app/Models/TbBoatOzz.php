<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbBoatOzz extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boatinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_boat_ozz';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['JYO', 'TARGET_DATE', 'RACE_NUMBER', 'KAKE_SIKI', 'NUMBER1', 'NUMBER2', 'NUMBER3', ];

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
        'KAKE_SIKI',
        'NUMBER1',
        'NUMBER2',
        'NUMBER3',
        'BAIRITU',
        'UPDATE_TIME',
        'RESIST_TIME',
    ];
}