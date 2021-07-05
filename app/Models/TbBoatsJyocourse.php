<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbBoatsJyocourse extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boatinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_boats_jyocourse';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['JYO', 'TARGET_DATE', ];

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
        'SHUKEI_FDATE',
        'SHUKEI_EDATE',
        'COURSE_TYAKU11',
        'COURSE_TYAKU12',
        'COURSE_TYAKU13',
        'COURSE_TYAKU14',
        'COURSE_TYAKU15',
        'COURSE_TYAKU16',
        'COURSE_NIGE1',
        'COURSE_MAKURI1',
        'COURSE_SASI1',
        'COURSE_MAKURIZASI1',
        'COURSE_TUKEMAI1',
        'COURSE_NUKI1',
        'COURSE_MEGUMARE1',
        'COURSE_TYAKU21',
        'COURSE_TYAKU22',
        'COURSE_TYAKU23',
        'COURSE_TYAKU24',
        'COURSE_TYAKU25',
        'COURSE_TYAKU26',
        'COURSE_NIGE2',
        'COURSE_MAKURI2',
        'COURSE_SASI2',
        'COURSE_MAKURIZASI2',
        'COURSE_TUKEMAI2',
        'COURSE_NUKI2',
        'COURSE_MEGUMARE2',
        'COURSE_TYAKU31',
        'COURSE_TYAKU32',
        'COURSE_TYAKU33',
        'COURSE_TYAKU34',
        'COURSE_TYAKU35',
        'COURSE_TYAKU36',
        'COURSE_NIGE3',
        'COURSE_MAKURI3',
        'COURSE_SASI3',
        'COURSE_MAKURIZASI3',
        'COURSE_TUKEMAI3',
        'COURSE_NUKI3',
        'COURSE_MEGUMARE3',
        'COURSE_TYAKU41',
        'COURSE_TYAKU42',
        'COURSE_TYAKU43',
        'COURSE_TYAKU44',
        'COURSE_TYAKU45',
        'COURSE_TYAKU46',
        'COURSE_NIGE4',
        'COURSE_MAKURI4',
        'COURSE_SASI4',
        'COURSE_MAKURIZASI4',
        'COURSE_TUKEMAI4',
        'COURSE_NUKI4',
        'COURSE_MEGUMARE4',
        'COURSE_TYAKU51',
        'COURSE_TYAKU52',
        'COURSE_TYAKU53',
        'COURSE_TYAKU54',
        'COURSE_TYAKU55',
        'COURSE_TYAKU56',
        'COURSE_NIGE5',
        'COURSE_MAKURI5',
        'COURSE_SASI5',
        'COURSE_MAKURIZASI5',
        'COURSE_TUKEMAI5',
        'COURSE_NUKI5',
        'COURSE_MEGUMARE5',
        'COURSE_TYAKU61',
        'COURSE_TYAKU62',
        'COURSE_TYAKU63',
        'COURSE_TYAKU64',
        'COURSE_TYAKU65',
        'COURSE_TYAKU66',
        'COURSE_NIGE6',
        'COURSE_MAKURI6',
        'COURSE_SASI6',
        'COURSE_MAKURIZASI6',
        'COURSE_TUKEMAI6',
        'COURSE_NUKI6',
        'COURSE_MEGUMARE6',
        'RESIST_TIME',
    ];
}