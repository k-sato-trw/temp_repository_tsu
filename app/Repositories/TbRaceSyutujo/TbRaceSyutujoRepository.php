<?php

namespace App\Repositories\TbRaceSyutujo;

use App\Models\TbRaceSyutujo;

class TbRaceSyutujoRepository implements TbRaceSyutujoRepositoryInterface
{
    protected $TbRaceSyutujo;

    /**
    * @param object $TbRaceSyutujo
    */
    public function __construct(TbRaceSyutujo $TbRaceSyutujo)
    {
        $this->TbRaceSyutujo = $TbRaceSyutujo;
    }


    /**
     * IDで1レコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordByPK($id)
    {
        return $this->TbRaceSyutujo
                    ->where('ID',$id)
                    ->where('JYO',config("const.JYO_CODE"))
                    ->first();
    }

    /**
     * IDをキーにしてアップサート
     *
     * @var object  $request
     * @var string $id
     * @return object
     */
    public function UpsertRecordByPK($request,$id)
    {

        $new_datetime = date('YmdHi');

        $affected = $this->TbRaceSyutujo
                            ->updateOrInsert(
                                [
                                    'ID' => $id,
                                    'JYO' => config('const.JYO_CODE'),
                                ],
                                [
                                    'ALL_PERIOD' => '',
                                    'TOUTI_PERIOD' => '',
                                    'REMARKS' => $request->input('REMARKS'),
                                    'SPECIAL' => 0,
                                    'EDITOR_NAME' => $request->input('EDITOR_NAME'),
                                    'RESIST_TIME' => $new_datetime,
                                    'UPDATE_TIME' => $new_datetime,
                                ]
                            );
        return $affected;
    }


}