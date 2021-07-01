<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTsuKinkyuKokuti extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_tsu_kinkyu_kokuti';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['ID', ];

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
        'START_DATE',
        'END_DATE',
        'TITLE',
        'HONBUN',
        'PC_FLG',
        'SP_FLG',
        'MB_FLG',
        'EDITOR_NAME',
        'APPEAR_FLG',
        'RESIST_TIME',
        'UPDATE_TIME',
    ];
}