<?php

namespace App\Repositories\TbRaceTenboExtra;

interface TbRaceTenboExtraRepositoryInterface
{

    /**
     * 親テーブルのIDをもとにインサート処理
     *
     * @var object  $request
     * @var string  $id
     * @return object
     */
    public function insertRecord($request,$id);

    /**
     * IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @return object
     */
    public function UpdateRecordByPK($request,$id);

}