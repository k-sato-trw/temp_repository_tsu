<?php

namespace App\Repositories\TbTsuTokutenritu;

use App\Models\TbTsuTokutenritu;

class TbTsuTokutenrituRepository implements TbTsuTokutenrituRepositoryInterface
{
    protected $TbTsuTokutenritu;

    /**
    * @param object $TbTsuTokutenritu
    */
    public function __construct(TbTsuTokutenritu $TbTsuTokutenritu)
    {
        $this->TbTsuTokutenritu = $TbTsuTokutenritu;
    }

    
    /**
     * 指定した日付のデータを全取得
     *
     * @var string $keisai_date
     * @return object
     */
    public function deleteRecordByDate($keisai_date)
    {
        return $this->TbTsuTokutenritu
                    ->where('TARGET_DATE', $keisai_date)
                    ->delete();
    }

    
    /**
     * インサート処理
     *
     * @var array  $insert_query
     * @return object
     */
    public function insertRecord($insert_query)
    {

        //新規作成
        $affected = $this->TbTsuTokutenritu
                        ->insert($insert_query);

        return $affected;
    }


    /**
     * 指定日付のレコードの掲載フラグを変更
     *
     * @var string $keisai_date
     * @var string $appear_flg
     * @return object
     */
    public function changeAppearFlg($keisai_date,$appear_flg)
    {
        return $this->TbTsuTokutenritu
                    ->where('TARGET_DATE', $keisai_date)
                    ->update([
                        'APPEAR_FLG' => $appear_flg,
                    ]);
                    
    }

    /**
     * 指定した期間のデータを取得
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordByBitweenDate($start_date,$end_date)
    {
        return $this->TbTsuTokutenritu
                    ->where('TARGET_DATE','>=', $start_date)
                    ->where('TARGET_DATE','<=', $end_date)
                    ->where('APPEAR_FLG','=', "1")
                    ->orderBy('TARGET_DATE','DESC')
                    ->get();
    }

    /**
     * 指定した日付のデータをランク順に取得
     *
     * @var string $target_date
     * @var string $is_preview
     * @return object
     */
    public function getRankingByDate($target_date,$is_preview = false)
    {
        $query = $this->TbTsuTokutenritu
                    ->where('TARGET_DATE','=', $target_date);

        if(!$is_preview){
            $query->where('APPEAR_FLG','=', "1");
        }

        return $query->orderByRaw('LENGTH(`RANK`)')
                    ->orderBy('RANK','ASC')
                    ->get();
    }

}