<?php

namespace App\Repositories\TbTsuSensyuTitle;

use App\Models\TbTsuSensyuTitle;

class TbTsuSensyuTitleRepository implements TbTsuSensyuTitleRepositoryInterface
{
    protected $TbTsuSensyuTitle;

    /**
    * @param object $TbTsuSensyuTitle
    */
    public function __construct(TbTsuSensyuTitle $TbTsuSensyuTitle)
    {
        $this->TbTsuSensyuTitle = $TbTsuSensyuTitle;
    }

    /**
     * IDでレコードを取得
     *
     * @var string $touban
     * @return object
     */
    public function getRecordByPK($touban)
    {
        return $this->TbTsuSensyuTitle
                    ->where('TOUBAN','=',$touban)
                    ->orderBy('VIC_DATE')
                    ->get();
    }

    /**
     * インサート処理
     *
     * @var array  $insert_data
     * @return object
     */
    public function insertRecord($insert_data)
    {

        //新規作成
        $affected = $this->TbTsuSensyuTitle
                        ->insert($insert_data);

        return $affected;
    }


}