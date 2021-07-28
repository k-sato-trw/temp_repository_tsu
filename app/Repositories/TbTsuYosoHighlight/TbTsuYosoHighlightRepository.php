<?php

namespace App\Repositories\TbTsuYosoHighlight;

use App\Models\TbTsuYosoHighlight;

class TbTsuYosoHighlightRepository implements TbTsuYosoHighlightRepositoryInterface
{
    protected $TbTsuYosoHighlight;

    /**
    * @param object $TbTsuYosoHighlight
    */
    public function __construct(TbTsuYosoHighlight $TbTsuYosoHighlight)
    {
        $this->TbTsuYosoHighlight = $TbTsuYosoHighlight;
    }


    /**
     * 一定範囲の日付のデータを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordBitweenDate($jyo,$start_date,$end_date)
    {
        return $this->TbTsuYosoHighlight
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->where('APPEAR_FLG','1')
                    ->orderBy('TARGET_DATE','DESC')
                    ->get();
    }

    /**
     * フロント表示用　指定日付のデータを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $is_preview
     * @return object
     */
    public function getFirstRecordForFront($jyo,$target_date,$is_preview = false)
    {
        $query = $this->TbTsuYosoHighlight
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','=',$target_date);

        if(!$is_preview){
            $query->where('APPEAR_FLG','1');
        }
                    
        return $query->orderBy('TARGET_DATE','DESC')
                    ->first();
    }

    
    /**
     * SPフロント表示用　節間日付のデータを全て取得
     *
     * @var string $jyo
     * @var array $target_date_list
     * @var string $is_preview
     * @return object
     */
    public function getRecordForFront($jyo,$target_date_list,$is_preview = false)
    {
        $query = $this->TbTsuYosoHighlight
                    ->where('JYO','=',$jyo)
                    ->whereIn('TARGET_DATE',$target_date_list);

        if(!$is_preview){
            $query->where('APPEAR_FLG','1');
        }
                    
        return $query->orderBy('TARGET_DATE','DESC')
                    ->get();
    }



}