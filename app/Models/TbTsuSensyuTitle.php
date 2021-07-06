<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTsuSensyuTitle extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_tsu_sensyu_title';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['TOUBAN', 'VIC_DATE', 'VIC_JYO', ];

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
        'VIC_DATE',
        'VIC_JYO',
        'VIC_GRADE',
        'VIC_TITLE',
        'UPDATE_TIME',
        'RESIST_TIME',
    ];
}