<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbBoatKekkainfo extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boatinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_boat_kekkainfo';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['JYO', 'TARGET_DATE', 'RACE_NUMBER', ];

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
        'STOP_CODE',
        'STOP_NAME',
        'KAKE_SIKI',
        'FUSEIRITU',
        'HENKAN',
        'TYAKU11',
        'TYAKU12',
        'TYAKU13',
        'TYAKU21',
        'TYAKU22',
        'TYAKU23',
        'TYAKU31',
        'TYAKU32',
        'TYAKU33',
        'TANSYO1',
        'TANSYO_MONEY1',
        'TANSYO2',
        'TANSYO_MONEY2',
        'TANSYO3',
        'TANSYO_MONEY3',
        'FUKUSYO1',
        'FUKUSYO_MONEY1',
        'FUKUSYO2',
        'FUKUSYO_MONEY2',
        'FUKUSYO3',
        'FUKUSYO_MONEY3',
        'FUKUSYO4',
        'FUKUSYO_MONEY4',
        'FUKUSYO5',
        'FUKUSYO_MONEY5',
        'NIRENTAN1',
        'NIRENTAN_MONEY1',
        'NIRENTAN_NINKI1',
        'NIRENTAN2',
        'NIRENTAN_MONEY2',
        'NIRENTAN_NINKI2',
        'NIRENFUKU1',
        'NIRENFUKU_MONEY1',
        'NIRENFUKU_NINKI1',
        'NIRENFUKU2',
        'NIRENFUKU_MONEY2',
        'NIRENFUKU_NINKI2',
        'KAKURENFUKU1',
        'KAKURENFUKU_MONEY1',
        'KAKURENFUKU_NINKI1',
        'KAKURENFUKU2',
        'KAKURENFUKU_MONEY2',
        'KAKURENFUKU_NINKI2',
        'KAKURENFUKU3',
        'KAKURENFUKU_MONEY3',
        'KAKURENFUKU_NINKI3',
        'KAKURENFUKU4',
        'KAKURENFUKU_MONEY4',
        'KAKURENFUKU_NINKI4',
        'KAKURENFUKU5',
        'KAKURENFUKU_MONEY5',
        'KAKURENFUKU_NINKI5',
        'SANRENTAN1',
        'SANRENTAN_MONEY1',
        'SANRENTAN_NINKI1',
        'SANRENTAN2',
        'SANRENTAN_MONEY2',
        'SANRENTAN_NINKI2',
        'SANRENFUKU1',
        'SANRENFUKU_MONEY1',
        'SANRENFUKU_NINKI1',
        'SANRENFUKU2',
        'SANRENFUKU_MONEY2',
        'SANRENFUKU_NINKI2',
        'TENKOU',
        'HAKO',
        'KAZAMUKI1',
        'KAZAMUKI2',
        'FUSOKU',
        'KION',
        'SUION',
        'RYUSOKU',
        'SUII',
        'MANCHO_JIKOKU',
        'KANCHO_JIKOKU',
        'RACE_NAME',
        'RESIST_TIME',
    ];
}