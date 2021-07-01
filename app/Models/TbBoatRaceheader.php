<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbBoatRaceheader extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boatinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_boat_raceheader';

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
        'STOP_CODE',
        'KAISAI_DAYS',
        'KAISAI_ALLDAYS',
        'GRADE_CODE',
        'SUMMER_FLG',
        'NIGHTER_FLG',
        'SIMEKIRI_JIKOKU1R',
        'SIMEKIRI_JIKOKU2R',
        'SIMEKIRI_JIKOKU3R',
        'SIMEKIRI_JIKOKU4R',
        'SIMEKIRI_JIKOKU5R',
        'SIMEKIRI_JIKOKU6R',
        'SIMEKIRI_JIKOKU7R',
        'SIMEKIRI_JIKOKU8R',
        'SIMEKIRI_JIKOKU9R',
        'SIMEKIRI_JIKOKU10R',
        'SIMEKIRI_JIKOKU11R',
        'SIMEKIRI_JIKOKU12R',
        'HASSOU_JIKOKU1R',
        'HASSOU_JIKOKU2R',
        'HASSOU_JIKOKU3R',
        'HASSOU_JIKOKU4R',
        'HASSOU_JIKOKU5R',
        'HASSOU_JIKOKU6R',
        'HASSOU_JIKOKU7R',
        'HASSOU_JIKOKU8R',
        'HASSOU_JIKOKU9R',
        'HASSOU_JIKOKU10R',
        'HASSOU_JIKOKU11R',
        'HASSOU_JIKOKU12R',
        'RESIST_TIME',
    ];
}