<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbRaceTenboExtra extends Model
{
    use HasFactory;

    protected $connection = 'mysql_kyotei';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_race_tenbo_extra';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['ID', 'JYO' ];

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
        'PICKUP_LEAD1',
        'PICKUP_LEAD2',
        'PICKUP_LEAD3',
        'PICKUP_LEAD4',
        'PICKUP_LEAD5',
        'PICKUP_LEAD6',
        'PICKUP_SEISEKI_STANDARD_DATE1',
        'PICKUP_SEISEKI_STANDARD_DATE2',
        'PICKUP_SEISEKI_STANDARD_DATE3',
        'PICKUP_SEISEKI_STANDARD_DATE4',
        'PICKUP_SEISEKI_STANDARD_DATE5',
        'PICKUP_SEISEKI_STANDARD_DATE6',
        'PICKUP_SEISEKI_DATE1_1',
        'PICKUP_SEISEKI_DATE1_2',
        'PICKUP_SEISEKI_DATE1_3',
        'PICKUP_SEISEKI_DATE1_4',
        'PICKUP_SEISEKI_DATE2_1',
        'PICKUP_SEISEKI_DATE2_2',
        'PICKUP_SEISEKI_DATE2_3',
        'PICKUP_SEISEKI_DATE2_4',
        'PICKUP_SEISEKI_DATE3_1',
        'PICKUP_SEISEKI_DATE3_2',
        'PICKUP_SEISEKI_DATE3_3',
        'PICKUP_SEISEKI_DATE3_4',
        'PICKUP_SEISEKI_DATE4_1',
        'PICKUP_SEISEKI_DATE4_2',
        'PICKUP_SEISEKI_DATE4_3',
        'PICKUP_SEISEKI_DATE4_4',
        'PICKUP_SEISEKI_DATE5_1',
        'PICKUP_SEISEKI_DATE5_2',
        'PICKUP_SEISEKI_DATE5_3',
        'PICKUP_SEISEKI_DATE5_4',
        'PICKUP_SEISEKI_DATE6_1',
        'PICKUP_SEISEKI_DATE6_2',
        'PICKUP_SEISEKI_DATE6_3',
        'PICKUP_SEISEKI_DATE6_4',
        'PICKUP_SEISEKI_GRADE1_1',
        'PICKUP_SEISEKI_GRADE1_2',
        'PICKUP_SEISEKI_GRADE1_3',
        'PICKUP_SEISEKI_GRADE1_4',
        'PICKUP_SEISEKI_GRADE2_1',
        'PICKUP_SEISEKI_GRADE2_2',
        'PICKUP_SEISEKI_GRADE2_3',
        'PICKUP_SEISEKI_GRADE2_4',
        'PICKUP_SEISEKI_GRADE3_1',
        'PICKUP_SEISEKI_GRADE3_2',
        'PICKUP_SEISEKI_GRADE3_3',
        'PICKUP_SEISEKI_GRADE3_4',
        'PICKUP_SEISEKI_GRADE4_1',
        'PICKUP_SEISEKI_GRADE4_2',
        'PICKUP_SEISEKI_GRADE4_3',
        'PICKUP_SEISEKI_GRADE4_4',
        'PICKUP_SEISEKI_GRADE5_1',
        'PICKUP_SEISEKI_GRADE5_2',
        'PICKUP_SEISEKI_GRADE5_3',
        'PICKUP_SEISEKI_GRADE5_4',
        'PICKUP_SEISEKI_GRADE6_1',
        'PICKUP_SEISEKI_GRADE6_2',
        'PICKUP_SEISEKI_GRADE6_3',
        'PICKUP_SEISEKI_GRADE6_4',
        'PICKUP_SEISEKI_JYO1_1',
        'PICKUP_SEISEKI_JYO1_2',
        'PICKUP_SEISEKI_JYO1_3',
        'PICKUP_SEISEKI_JYO1_4',
        'PICKUP_SEISEKI_JYO2_1',
        'PICKUP_SEISEKI_JYO2_2',
        'PICKUP_SEISEKI_JYO2_3',
        'PICKUP_SEISEKI_JYO2_4',
        'PICKUP_SEISEKI_JYO3_1',
        'PICKUP_SEISEKI_JYO3_2',
        'PICKUP_SEISEKI_JYO3_3',
        'PICKUP_SEISEKI_JYO3_4',
        'PICKUP_SEISEKI_JYO4_1',
        'PICKUP_SEISEKI_JYO4_2',
        'PICKUP_SEISEKI_JYO4_3',
        'PICKUP_SEISEKI_JYO4_4',
        'PICKUP_SEISEKI_JYO5_1',
        'PICKUP_SEISEKI_JYO5_2',
        'PICKUP_SEISEKI_JYO5_3',
        'PICKUP_SEISEKI_JYO5_4',
        'PICKUP_SEISEKI_JYO6_1',
        'PICKUP_SEISEKI_JYO6_2',
        'PICKUP_SEISEKI_JYO6_3',
        'PICKUP_SEISEKI_JYO6_4',
        'PICKUP_SEISEKI_y_1_1',
        'PICKUP_SEISEKI_y_1_2',
        'PICKUP_SEISEKI_y_1_3',
        'PICKUP_SEISEKI_y_1_4',
        'PICKUP_SEISEKI_j_1_1',
        'PICKUP_SEISEKI_j_1_2',
        'PICKUP_SEISEKI_j_1_3',
        'PICKUP_SEISEKI_j_1_4',
        'PICKUP_SEISEKI_v_1_1',
        'PICKUP_SEISEKI_v_1_2',
        'PICKUP_SEISEKI_v_1_3',
        'PICKUP_SEISEKI_v_1_4',
        'PICKUP_SEISEKI_e_1_1',
        'PICKUP_SEISEKI_e_1_2',
        'PICKUP_SEISEKI_e_1_3',
        'PICKUP_SEISEKI_e_1_4',
        'PICKUP_SEISEKI_y_2_1',
        'PICKUP_SEISEKI_y_2_2',
        'PICKUP_SEISEKI_y_2_3',
        'PICKUP_SEISEKI_y_2_4',
        'PICKUP_SEISEKI_j_2_1',
        'PICKUP_SEISEKI_j_2_2',
        'PICKUP_SEISEKI_j_2_3',
        'PICKUP_SEISEKI_j_2_4',
        'PICKUP_SEISEKI_v_2_1',
        'PICKUP_SEISEKI_v_2_2',
        'PICKUP_SEISEKI_v_2_3',
        'PICKUP_SEISEKI_v_2_4',
        'PICKUP_SEISEKI_e_2_1',
        'PICKUP_SEISEKI_e_2_2',
        'PICKUP_SEISEKI_e_2_3',
        'PICKUP_SEISEKI_e_2_4',
        'PICKUP_SEISEKI_y_3_1',
        'PICKUP_SEISEKI_y_3_2',
        'PICKUP_SEISEKI_y_3_3',
        'PICKUP_SEISEKI_y_3_4',
        'PICKUP_SEISEKI_j_3_1',
        'PICKUP_SEISEKI_j_3_2',
        'PICKUP_SEISEKI_j_3_3',
        'PICKUP_SEISEKI_j_3_4',
        'PICKUP_SEISEKI_v_3_1',
        'PICKUP_SEISEKI_v_3_2',
        'PICKUP_SEISEKI_v_3_3',
        'PICKUP_SEISEKI_v_3_4',
        'PICKUP_SEISEKI_e_3_1',
        'PICKUP_SEISEKI_e_3_2',
        'PICKUP_SEISEKI_e_3_3',
        'PICKUP_SEISEKI_e_3_4',
        'PICKUP_SEISEKI_y_4_1',
        'PICKUP_SEISEKI_y_4_2',
        'PICKUP_SEISEKI_y_4_3',
        'PICKUP_SEISEKI_y_4_4',
        'PICKUP_SEISEKI_j_4_1',
        'PICKUP_SEISEKI_j_4_2',
        'PICKUP_SEISEKI_j_4_3',
        'PICKUP_SEISEKI_j_4_4',
        'PICKUP_SEISEKI_v_4_1',
        'PICKUP_SEISEKI_v_4_2',
        'PICKUP_SEISEKI_v_4_3',
        'PICKUP_SEISEKI_v_4_4',
        'PICKUP_SEISEKI_e_4_1',
        'PICKUP_SEISEKI_e_4_2',
        'PICKUP_SEISEKI_e_4_3',
        'PICKUP_SEISEKI_e_4_4',
        'PICKUP_SEISEKI_y_5_1',
        'PICKUP_SEISEKI_y_5_2',
        'PICKUP_SEISEKI_y_5_3',
        'PICKUP_SEISEKI_y_5_4',
        'PICKUP_SEISEKI_j_5_1',
        'PICKUP_SEISEKI_j_5_2',
        'PICKUP_SEISEKI_j_5_3',
        'PICKUP_SEISEKI_j_5_4',
        'PICKUP_SEISEKI_v_5_1',
        'PICKUP_SEISEKI_v_5_2',
        'PICKUP_SEISEKI_v_5_3',
        'PICKUP_SEISEKI_v_5_4',
        'PICKUP_SEISEKI_e_5_1',
        'PICKUP_SEISEKI_e_5_2',
        'PICKUP_SEISEKI_e_5_3',
        'PICKUP_SEISEKI_e_5_4',
        'PICKUP_SEISEKI_y_6_1',
        'PICKUP_SEISEKI_y_6_2',
        'PICKUP_SEISEKI_y_6_3',
        'PICKUP_SEISEKI_y_6_4',
        'PICKUP_SEISEKI_j_6_1',
        'PICKUP_SEISEKI_j_6_2',
        'PICKUP_SEISEKI_j_6_3',
        'PICKUP_SEISEKI_j_6_4',
        'PICKUP_SEISEKI_v_6_1',
        'PICKUP_SEISEKI_v_6_2',
        'PICKUP_SEISEKI_v_6_3',
        'PICKUP_SEISEKI_v_6_4',
        'PICKUP_SEISEKI_e_6_1',
        'PICKUP_SEISEKI_e_6_2',
        'PICKUP_SEISEKI_e_6_3',
        'PICKUP_SEISEKI_e_6_4',
        'RESIST_TIME',
        'UPDATE_TIME',
    ];
}