<?php

namespace App\Repositories\TbRaceSyutujo;

interface TbRaceSyutujoRepositoryInterface
{

    /**
     * IDで1レコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordByPK($id);

    /**
     * IDをキーにしてアップサート
     *
     * @var object  $request
     * @var string $id
     * @return object
     */
    public function UpsertRecordByPK($request,$id);

}