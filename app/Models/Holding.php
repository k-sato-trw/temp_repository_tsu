<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holding extends Model
{
    use HasFactory;

    protected $connection = 'mysql_tfinfo';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'holding';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['場コード', ];

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
        '場コード',
        '実況開始時間',
        '実況終了時間',
        '結果表示時間',
        '出走明日時間',
    ];
}