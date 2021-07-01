<?php

namespace App\Repositories\FanData;

use App\Models\FanData;

class FanDataRepository implements FanDataRepositoryInterface
{
    protected $FanData;

    /**
    * @param object $user
    */
    public function __construct(FanData $FanData)
    {
        $this->FanData = $FanData;
    }

    /**
     *  登録番号リストに当てはまるレコードを取得
     *
     * @var array $touban_list
     * @return object
     */
    public function getRecordByToubanList($touban_list)
    {        
        return $this->FanData
                    ->whereIn("Touban",$touban_list)
                    ->orderBy("Touban","ASC")
                    ->get();
    }

    /**
     *  登録番号リストに当てはまるレコードを取得 級別にソート
     *
     * @var array $touban_list
     * @var int $pre_page
     * @return object
     */
    public function getSortedRecordByToubanList($touban_list,$pre_page)
    {        
        return $this->FanData
                    ->whereIn('Touban',$touban_list)
                    ->orderByRaw("CASE 
                    WHEN (Kyu = 'A1') THEN 1 
                    WHEN (Kyu = 'A2') THEN 2 
                    WHEN (Kyu = 'B1') THEN 3 
                    WHEN (Kyu = 'B2') THEN 4 
                    ELSE 9999 END , Touban ASC")
                    ->paginate($pre_page);
    }

    /**
     *  全データ取得
     *
     * @return object
     */
    public function getAllRecord()
    {        
        return $this->FanData
                    ->get();
    }


    /**
     *  登録番号に当てはまるレコードを取得
     *
     * @var string $touban
     * @return object
     */
    public function getFirstRecordByTouban($touban)
    {        
        return $this->FanData
                    ->where("Touban",$touban)
                    ->first();
    }

    /**
     *  最新一件のレコードを取得
     *
     * @return object
     */
    public function getLastRecord()
    {        
        return $this->FanData
                    ->orderBy("NEN",'DESC')
                    ->orderBy("KI",'DESC')
                    ->first();
    }

}