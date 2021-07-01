<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTsuMailmagazine extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_tsu_mailmagazine';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['TARGET_DATE', 'ID', ];

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
        'ID',
        'TARGET_TIME',
        'SENSYU_INFO_PREFACE',
        'SENSYU_INFO_FLG',
        'SENSYU_INFO_TEXT1',
        'SENSYU_INFO_TEIBANFLG1',
        'SENSYU_INFO_TOUBAN11',
        'SENSYU_INFO_TOUBAN12',
        'SENSYU_INFO_TOUBAN13',
        'SENSYU_INFO_TOUBAN14',
        'SENSYU_INFO_TOUBAN15',
        'SENSYU_INFO_TOUBAN16',
        'SENSYU_INFO_TEXT2',
        'SENSYU_INFO_TEIBANFLG2',
        'SENSYU_INFO_TOUBAN21',
        'SENSYU_INFO_TOUBAN22',
        'SENSYU_INFO_TOUBAN23',
        'SENSYU_INFO_TOUBAN24',
        'SENSYU_INFO_TOUBAN25',
        'SENSYU_INFO_TOUBAN26',
        'SENSYU_INFO_TEXT3',
        'SENSYU_INFO_TEIBANFLG3',
        'SENSYU_INFO_TOUBAN31',
        'SENSYU_INFO_TOUBAN32',
        'SENSYU_INFO_TOUBAN33',
        'SENSYU_INFO_TOUBAN34',
        'SENSYU_INFO_TOUBAN35',
        'SENSYU_INFO_TOUBAN36',
        'SENSYU_INFO_TEXT4',
        'SENSYU_INFO_TEIBANFLG4',
        'SENSYU_INFO_TOUBAN41',
        'SENSYU_INFO_TOUBAN42',
        'SENSYU_INFO_TOUBAN43',
        'SENSYU_INFO_TOUBAN44',
        'SENSYU_INFO_TOUBAN45',
        'SENSYU_INFO_TOUBAN46',
        'SENSYU_INFO_TEXT5',
        'SENSYU_INFO_TEIBANFLG5',
        'SENSYU_INFO_TOUBAN51',
        'SENSYU_INFO_TOUBAN52',
        'SENSYU_INFO_TOUBAN53',
        'SENSYU_INFO_TOUBAN54',
        'SENSYU_INFO_TOUBAN55',
        'SENSYU_INFO_TOUBAN56',
        'FAN_EVENT_FLG',
        'FAN_EVENT_TEXT',
        'JONAI_FLG',
        'OPEN_TIME_FLG',
        'OPEN_TIME_DATE1',
        'OPEN_TIME_DATE2',
        'OPEN_TIME_DATE3',
        'OPEN_TIME_DATE4',
        'OPEN_TIME',
        'OPEN_TIME2',
        'OPEN_TIME11',
        'OPEN_TIME12',
        'OPEN_TIME21',
        'OPEN_TIME22',
        'OPEN_TIME31',
        'OPEN_TIME32',
        'OPEN_TIME41',
        'OPEN_TIME42',
        'START_TIME',
        'START_TIME2',
        'DEADLINE_TIME',
        'DEADLINE_TIME2',
        'NEXT_EXHIBITION_FLG',
        'NEXT_EXHIBITION_DATE1',
        'NEXT_EXHIBITION_DATE2',
        'NEXT_EXHIBITION_DATE3',
        'NEXT_EXHIBITION1',
        'NEXT_EXHIBITION2',
        'NEXT_EXHIBITION3',
        'FREE_FLG',
        'FREE_TEXT',
        'EDIT_NAME',
        'SAVE_FLG',
        'UPDATE_TIME',
        'RESIST_TIME',
        'TOKU_FLG',
    ];
}