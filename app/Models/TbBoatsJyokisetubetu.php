<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbBoatsJyokisetubetu extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boatinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_boats_jyokisetubetu';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['JYO', 'TARGET_DATE', 'KISETU_NAME', ];

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
        'KISETU_NAME',
        'SHUKEI_FDATE',
        'SHUKEI_EDATE',
        'COURSE_SINNYURITU11',
        'COURSE_SINNYURITU12',
        'COURSE_SINNYURITU13',
        'COURSE_SINNYURITU14',
        'COURSE_SINNYURITU15',
        'COURSE_SINNYURITU16',
        'COURSE_SINNYURITU21',
        'COURSE_SINNYURITU22',
        'COURSE_SINNYURITU23',
        'COURSE_SINNYURITU24',
        'COURSE_SINNYURITU25',
        'COURSE_SINNYURITU26',
        'COURSE_SINNYURITU31',
        'COURSE_SINNYURITU32',
        'COURSE_SINNYURITU33',
        'COURSE_SINNYURITU34',
        'COURSE_SINNYURITU35',
        'COURSE_SINNYURITU36',
        'COURSE_SINNYURITU41',
        'COURSE_SINNYURITU42',
        'COURSE_SINNYURITU43',
        'COURSE_SINNYURITU44',
        'COURSE_SINNYURITU45',
        'COURSE_SINNYURITU46',
        'COURSE_SINNYURITU51',
        'COURSE_SINNYURITU52',
        'COURSE_SINNYURITU53',
        'COURSE_SINNYURITU54',
        'COURSE_SINNYURITU55',
        'COURSE_SINNYURITU56',
        'COURSE_SINNYURITU61',
        'COURSE_SINNYURITU62',
        'COURSE_SINNYURITU63',
        'COURSE_SINNYURITU64',
        'COURSE_SINNYURITU65',
        'COURSE_SINNYURITU66',
        'RESIST_TIME',
    ];
}