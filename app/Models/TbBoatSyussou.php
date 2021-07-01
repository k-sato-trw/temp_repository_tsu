<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbBoatSyussou extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boatinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_boat_syussou';

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
        'RACE_TITLE',
        'KAKE_SIKI',
        'RACE_SYUBETU_CODE',
        'RACE_SYUBETU_NAME',
        'RACE_NAME',
        'KYORI',
        'SHINNYU_KOTEI_FLG',
        'SIMEKIRI_JIKOKU',
        'HASSOU_JIKOKU',
        'BOAT_CODE',
        'TOUBAN',
        'SENSYU_NAME',
        'HOME_TOWN',
        'KYU_BETU',
        'AGE',
        'TAIJYU',
        'SEX',
        'ST_AVERAGE',
        'ALL_SHOURITU',
        'ALL_NIRENTAIRITU',
        'ALL_SANRENTAIRITU',
        'TOUTI_SHOURITU',
        'TOUTI_NIRENTAIRITU',
        'TOUTI_SANRENTAIRITU',
        'F_COUNT',
        'L_COUNT',
        'MOTOR_CHANGE_FLG',
        'MOTOR_NO',
        'MOTOR2RENTAIRITU',
        'BOAT_CHANGE_FLG',
        'BOAT_NO',
        'BOAT_2RENRITU',
        'HAYAMI',
        'TYOKUZEN_COMMENT',
        'KETUJO_FLG',
        'KONSETU11_DATE',
        'KONSETU11_RACENUMBER',
        'KONSETU11_WAKUBAN',
        'KONSETU11_RACESYUBETU',
        'KONSETU11_TYAKUJUN',
        'KONSETU11_SHINNYU',
        'KONSETU11_STTIMING',
        'KONSETU12_DATE',
        'KONSETU12_RACENUMBER',
        'KONSETU12_WAKUBAN',
        'KONSETU12_RACESYUBETU',
        'KONSETU12_TYAKUJUN',
        'KONSETU12_SHINNYU',
        'KONSETU12_STTIMING',
        'KONSETU21_DATE',
        'KONSETU21_RACENUMBER',
        'KONSETU21_WAKUBAN',
        'KONSETU21_RACESYUBETU',
        'KONSETU21_TYAKUJUN',
        'KONSETU21_SHINNYU',
        'KONSETU21_STTIMING',
        'KONSETU22_DATE',
        'KONSETU22_RACENUMBER',
        'KONSETU22_WAKUBAN',
        'KONSETU22_RACESYUBETU',
        'KONSETU22_TYAKUJUN',
        'KONSETU22_SHINNYU',
        'KONSETU22_STTIMING',
        'KONSETU31_DATE',
        'KONSETU31_RACENUMBER',
        'KONSETU31_WAKUBAN',
        'KONSETU31_RACESYUBETU',
        'KONSETU31_TYAKUJUN',
        'KONSETU31_SHINNYU',
        'KONSETU31_STTIMING',
        'KONSETU32_DATE',
        'KONSETU32_RACENUMBER',
        'KONSETU32_WAKUBAN',
        'KONSETU32_RACESYUBETU',
        'KONSETU32_TYAKUJUN',
        'KONSETU32_SHINNYU',
        'KONSETU32_STTIMING',
        'KONSETU41_DATE',
        'KONSETU41_RACENUMBER',
        'KONSETU41_WAKUBAN',
        'KONSETU41_RACESYUBETU',
        'KONSETU41_TYAKUJUN',
        'KONSETU41_SHINNYU',
        'KONSETU41_STTIMING',
        'KONSETU42_DATE',
        'KONSETU42_RACENUMBER',
        'KONSETU42_WAKUBAN',
        'KONSETU42_RACESYUBETU',
        'KONSETU42_TYAKUJUN',
        'KONSETU42_SHINNYU',
        'KONSETU42_STTIMING',
        'KONSETU51_DATE',
        'KONSETU51_RACENUMBER',
        'KONSETU51_WAKUBAN',
        'KONSETU51_RACESYUBETU',
        'KONSETU51_TYAKUJUN',
        'KONSETU51_SHINNYU',
        'KONSETU51_STTIMING',
        'KONSETU52_DATE',
        'KONSETU52_RACENUMBER',
        'KONSETU52_WAKUBAN',
        'KONSETU52_RACESYUBETU',
        'KONSETU52_TYAKUJUN',
        'KONSETU52_SHINNYU',
        'KONSETU52_STTIMING',
        'KONSETU61_DATE',
        'KONSETU61_RACENUMBER',
        'KONSETU61_WAKUBAN',
        'KONSETU61_RACESYUBETU',
        'KONSETU61_TYAKUJUN',
        'KONSETU61_SHINNYU',
        'KONSETU61_STTIMING',
        'KONSETU62_DATE',
        'KONSETU62_RACENUMBER',
        'KONSETU62_WAKUBAN',
        'KONSETU62_RACESYUBETU',
        'KONSETU62_TYAKUJUN',
        'KONSETU62_SHINNYU',
        'KONSETU62_STTIMING',
        'KONSETU71_DATE',
        'KONSETU71_RACENUMBER',
        'KONSETU71_WAKUBAN',
        'KONSETU71_RACESYUBETU',
        'KONSETU71_TYAKUJUN',
        'KONSETU71_SHINNYU',
        'KONSETU71_STTIMING',
        'KONSETU72_DATE',
        'KONSETU72_RACENUMBER',
        'KONSETU72_WAKUBAN',
        'KONSETU72_RACESYUBETU',
        'KONSETU72_TYAKUJUN',
        'KONSETU72_SHINNYU',
        'KONSETU72_STTIMING',
        'KONSETU81_DATE',
        'KONSETU81_RACENUMBER',
        'KONSETU81_WAKUBAN',
        'KONSETU81_RACESYUBETU',
        'KONSETU81_TYAKUJUN',
        'KONSETU81_SHINNYU',
        'KONSETU81_STTIMING',
        'KONSETU82_DATE',
        'KONSETU82_RACENUMBER',
        'KONSETU82_WAKUBAN',
        'KONSETU82_RACESYUBETU',
        'KONSETU82_TYAKUJUN',
        'KONSETU82_SHINNYU',
        'KONSETU82_STTIMING',
        'KONSETU91_DATE',
        'KONSETU91_RACENUMBER',
        'KONSETU91_WAKUBAN',
        'KONSETU91_RACESYUBETU',
        'KONSETU91_TYAKUJUN',
        'KONSETU91_SHINNYU',
        'KONSETU91_STTIMING',
        'KONSETU92_DATE',
        'KONSETU92_RACENUMBER',
        'KONSETU92_WAKUBAN',
        'KONSETU92_RACESYUBETU',
        'KONSETU92_TYAKUJUN',
        'KONSETU92_SHINNYU',
        'KONSETU92_STTIMING',
        'RESIST_TIME',
    ];
}
