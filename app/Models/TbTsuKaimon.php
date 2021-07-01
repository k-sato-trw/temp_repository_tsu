<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTsuKaimon extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_tsu_kaimon';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['TARGET_DATE', ];

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
        'KAIMON_TIME',
        'ST_TIME',
        'APPEAR_FLG',
        'RESIST_TIME',
        'UPDATE_TIME',
    ];
}