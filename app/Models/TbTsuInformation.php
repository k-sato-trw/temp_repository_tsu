<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTsuInformation extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_tsu_information';

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
        'TYPE',
        'PC_APPEAR_FLG',
        'SP_APPEAR_FLG',
        'MB_APPEAR_FLG',
        'START_DATE',
        'END_DATE',
        'VIEW_DATE',
        'NEW_FLG',
        'TITLE',
        'HEADLINE_TITLE',
        'HEADLINE_FLG',
        'TEXT',
        'PC_LINK',
        'PC_LINK_WINDOW_FLG',
        'SP_LINK',
        'SP_LINK_WINDOW_FLG',
        'MB_LINK',
        'MB_LINK_WINDOW_FLG',
        'IMAGE_1',
        'IMAGE_2',
        'IMAGE_3',
        'APPEAR_FLG',
        'RESIST_TIME',
        'UPDATE_TIME',
        'EDITOR_NAME',
        'AUTO_ID',
    ];
}