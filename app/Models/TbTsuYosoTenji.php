<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbTsuYosoTenji extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_tsu_yoso_tenji';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['JYO', 'TARGET_DATE', 'RACE_NUM', ];

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
        'RACE_NUM',
        'EVALUATION1',
        'EVALUATION2',
        'EVALUATION3',
        'EVALUATION4',
        'EVALUATION5',
        'EVALUATION6',
        'COMMENT',
        'FAVOLITE111',
        'FAVOLITE112',
        'FAVOLITE113',
        'FAVOLITE121',
        'FAVOLITE122',
        'FAVOLITE123',
        'FAVOLITE131',
        'FAVOLITE132',
        'FAVOLITE133',
        'FAVOLITE211',
        'FAVOLITE212',
        'FAVOLITE213',
        'FAVOLITE221',
        'FAVOLITE222',
        'FAVOLITE223',
        'FAVOLITE231',
        'FAVOLITE232',
        'FAVOLITE233',
        'FAVOLITE311',
        'FAVOLITE312',
        'FAVOLITE313',
        'FAVOLITE321',
        'FAVOLITE322',
        'FAVOLITE323',
        'FAVOLITE331',
        'FAVOLITE332',
        'FAVOLITE333',
        'FAVOLITE411',
        'FAVOLITE412',
        'FAVOLITE413',
        'FAVOLITE421',
        'FAVOLITE422',
        'FAVOLITE423',
        'FAVOLITE431',
        'FAVOLITE432',
        'FAVOLITE433',
        'FAVOLITE511',
        'FAVOLITE512',
        'FAVOLITE513',
        'FAVOLITE521',
        'FAVOLITE522',
        'FAVOLITE523',
        'FAVOLITE531',
        'FAVOLITE532',
        'FAVOLITE533',
        'FAVOLITE611',
        'FAVOLITE612',
        'FAVOLITE613',
        'FAVOLITE621',
        'FAVOLITE622',
        'FAVOLITE623',
        'FAVOLITE631',
        'FAVOLITE632',
        'FAVOLITE633',
        'FAVOLITE_MARK11',
        'FAVOLITE_MARK12',
        'FAVOLITE_MARK21',
        'FAVOLITE_MARK22',
        'FAVOLITE_MARK31',
        'FAVOLITE_MARK32',
        'FAVOLITE_MARK41',
        'FAVOLITE_MARK42',
        'FAVOLITE_MARK51',
        'FAVOLITE_MARK52',
        'FAVOLITE_MARK61',
        'FAVOLITE_MARK62',
        'RICH111',
        'RICH112',
        'RICH113',
        'RICH121',
        'RICH122',
        'RICH123',
        'RICH131',
        'RICH132',
        'RICH133',
        'RICH211',
        'RICH212',
        'RICH213',
        'RICH221',
        'RICH222',
        'RICH223',
        'RICH231',
        'RICH232',
        'RICH233',
        'RICH311',
        'RICH312',
        'RICH313',
        'RICH321',
        'RICH322',
        'RICH323',
        'RICH331',
        'RICH332',
        'RICH333',
        'RICH411',
        'RICH412',
        'RICH413',
        'RICH421',
        'RICH422',
        'RICH423',
        'RICH431',
        'RICH432',
        'RICH433',
        'RICH511',
        'RICH512',
        'RICH513',
        'RICH521',
        'RICH522',
        'RICH523',
        'RICH531',
        'RICH532',
        'RICH533',
        'RICH611',
        'RICH612',
        'RICH613',
        'RICH621',
        'RICH622',
        'RICH623',
        'RICH631',
        'RICH632',
        'RICH633',
        'RICH_MARK11',
        'RICH_MARK12',
        'RICH_MARK21',
        'RICH_MARK22',
        'RICH_MARK31',
        'RICH_MARK32',
        'RICH_MARK41',
        'RICH_MARK42',
        'RICH_MARK51',
        'RICH_MARK52',
        'RICH_MARK61',
        'RICH_MARK62',
        'APPEAR_FLG',
        'UPDATE_TIME',
        'RESIST_TIME',
    ];
}