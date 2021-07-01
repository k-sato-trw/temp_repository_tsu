<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbMikuniAssen extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_mikuni_assen';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['ID', 'TOUBAN', 'START_DATE', 'END_DATE', ];

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
        'TOUBAN',
        'START_DATE',
        'END_DATE',
        'TEXT',
        'APPEAR_FLG',
        'EDITOR_NAME',
        'RESIST_TIME',
        'UPDATE_TIME',
    ];
}