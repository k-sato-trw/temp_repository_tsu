<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FanData extends Model
{
    use HasFactory;

    protected $connection = 'mysql_boat';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fandata';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['Touban'];

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
        'Touban',
        'NameK',
        'NameH',
        'KenID',
        'Kyu',
        'Seinen',
        'Seineny',
        'Seinenm',
        'Seinend',
        'Nenrei',
        'Shincho',
        'Taijyu',
        'Ketueki',
        'Syoritu1',
        'Fukusyo1',
        'Chak11',
        'Chak21',
        'Syukai1',
        'Yusyutu1',
        'Syoritu2',
        'Fukusyo2',
        'Chak12',
        'Chak22',
        'Syukai2',
        'Yusyutu2',
        'Syoritu3',
        'Fukusyo3',
        'Chak13',
        'Chak23',
        'Syukai3',
        'Yusyutu3',
        'Syoritu4',
        'Fukusyo4',
        'Chak14',
        'Chak24',
        'Syukai4',
        'Yusyutu4',
        'Kaisu1',
        'FukusyoS1',
        'SttimingS1',
        'StJuni1',
        'Kaisu2',
        'FukusyoS2',
        'SttimingS2',
        'StJuni2',
        'Kaisu3',
        'FukusyoS3',
        'SttimingS3',
        'StJuni3',
        'Kaisu4',
        'FukusyoS4',
        'SttimingS4',
        'StJuni4',
        'Kaisu5',
        'FukusyoS5',
        'SttimingS5',
        'StJuni5',
        'Kaisu6',
        'FukusyoS6',
        'SttimingS6',
        'StJuni6',
        'Kaisu7',
        'FukusyoS7',
        'SttimingS7',
        'StJuni7',
        'Kaisu8',
        'FukusyoS8',
        'SttimingS8',
        'StJuni8',
        'Kaisu9',
        'FukusyoS9',
        'SttimingS9',
        'StJuni9',
        'Kaisu10',
        'FukusyoS10',
        'SttimingS10',
        'StJuni10',
        'Kaisu11',
        'FukusyoS11',
        'SttimingS11',
        'StJuni11',
        'Kaisu12',
        'FukusyoS12',
        'SttimingS12',
        'StJuni12',
        'TaiikaEtc',
        'Maeqyu1',
        'Maeqyu2',
        'Maeqyu3',
        'Znouryoku',
        'Knouryoku',
        'Nouryokusa',
        'NobEtc',
        'Nen',
        'Ki',
        'FromyyEtc',
        'Kibetu',
        'Filer2',
        'Sttiming',
        'Sei',
        'Yusyo',
        'Filer3',
    ];
}
