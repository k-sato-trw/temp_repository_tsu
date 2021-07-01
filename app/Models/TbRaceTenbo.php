<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbRaceTenbo extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_race_tenbo';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['ID', 'JYO', ];

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
        'JYO',
        'SPECIAL',
        'LEADER1',
        'LEADER2',
        'LEADER3',
        'LEADER4',
        'LEADER5',
        'LEADER6',
        'LEADER7',
        'LEADER8',
        'LEADER9',
        'LEADER10',
        'LEADER11',
        'LEADER12',
        'DREAM_DATE1',
        'DREAM_DATE2',
        'DREAM_FLG1',
        'DREAM_FLG2',
        'TITLE',
        'LETTER_BODY',
        'PICKUP',
        'PICKUP_TITLE',
        'PICKUP_LETTER_BODY',
        'CLASSIFICATION',
        'PICKUP_DATE',
        'DATE1',
        'PRIMARY1',
        'SECONDPLACE1',
        'VICTORY1',
        'SPARE1',
        'DATE2',
        'PRIMARY2',
        'SECONDPLACE2',
        'VICTORY2',
        'SPARE2',
        'DATE3',
        'PRIMARY3',
        'SECONDPLACE3',
        'VICTORY3',
        'SPARE3',
        'REMARKS',
        'HEADER',
        'IMAGE_FILE',
        'FUTTER',
        'PC_URL',
        'SP_URL',
        'EDITOR_NAME',
        'RESIST_TIME',
        'UPDATE_TIME',
        'LEADTITLE',
        'LEADLETTER_BODY',
        'KINKYOREMARKS',
        'KINKYOWIN',
        'KINKYO2WIN',
        'KINKYO3WIN',
        'KINKYOVICTORYGAME',
        'KINKYOVICTORY',
        'KINKYOREMARKS2',
        'KINKYOWIN2',
        'KINKYO2WIN2',
        'KINKYO3WIN2',
        'KINKYOVICTORYGAME2',
        'KINKYOVICTORY2',
        'PICKUP2',
        'PICKUP_TITLE2',
        'PICKUP_LETTER_BODY2',
        'CLASSIFICATION2',
        'PICKUP_DATE2',
        'DATE12',
        'PRIMARY12',
        'SECONDPLACE12',
        'VICTORY12',
        'SPARE12',
        'DATE22',
        'PRIMARY22',
        'SECONDPLACE22',
        'VICTORY22',
        'SPARE22',
        'DATE32',
        'PRIMARY32',
        'SECONDPLACE32',
        'VICTORY32',
        'SPARE32',
        'LEADER1_PRIORITY',
        'LEADER2_PRIORITY',
        'LEADER3_PRIORITY',
        'LEADER4_PRIORITY',
        'LEADER5_PRIORITY',
        'LEADER6_PRIORITY',
        'LEADER7_PRIORITY',
        'LEADER8_PRIORITY',
        'LEADER9_PRIORITY',
        'LEADER10_PRIORITY',
        'LEADER11_PRIORITY',
        'LEADER12_PRIORITY',
    ];
}