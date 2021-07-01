<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbVodManagement extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_vod_management';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['TARGET_DATE', 'JYO', 'MOVIE_ID', ];

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
        'MOVIE_ID',
        'MOVIE_URL',
        'CHECK_FLG',
        'YUSHO_FLG',
        'SUBSTRAGE_FLG',
        'RESIST_TIME',
        'CHECK_TIME',
        'UPDATE_TIME',
    ];
}