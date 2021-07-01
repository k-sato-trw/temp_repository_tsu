<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbBoatTyokuzen extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boatinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_boat_tyokuzen';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['JYO', 'TARGET_DATE', 'RACE_NUMBER', 'TEIBAN'];

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
        'TEIBAN',
        'TOUBAN',
        'SENSYU_NAME',
        'SEX',
        'TAIJYU',
        'TYOSEI_JYURYO',
        'ST_COURSE',
        'ST_KUBUN',
        'ST_TIMING',
        'TENJI_TIME',
        'TORANSAMU',
        'BACKUE',
        'BACKSITA',
        'TILT_KAKUDO',
        'BUHIN1',
        'BUHIN_KOSUU1',
        'BUHIN2',
        'BUHIN_KOSUU2',
        'BUHIN3',
        'BUHIN_KOSUU3',
        'BUHIN4',
        'BUHIN_KOSUU4',
        'BUHIN5',
        'BUHIN_KOSUU5',
        'BUHIN6',
        'BUHIN_KOSUU6',
        'BUHIN7',
        'BUHIN_KOSUU7',
        'BUHIN8',
        'BUHIN_KOSUU8',
        'MOTOR_CHANGE_FLG',
        'MOTOR_NO',
        'MOTOR_2RENRITU',
        'NEWMOTOR_NO',
        'NEWMOTOR_2RENRITU',
        'BOAT_CHANGE_FLG',
        'BOAT_NO',
        'BOAT_2RENRITU',
        'NEWBOAT_NO',
        'NEWBOAT_2RENRITU',
        'ST_JIKO_CD',
        'RESIST_TIME',
    ];
}
