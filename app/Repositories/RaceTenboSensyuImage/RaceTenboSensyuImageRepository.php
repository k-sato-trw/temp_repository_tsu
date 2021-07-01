<?php

namespace App\Repositories\RaceTenboSensyuImage;

use App\Models\RaceTenboSensyuImage;

class RaceTenboSensyuImageRepository implements RaceTenboSensyuImageRepositoryInterface
{
    protected $RaceTenboSensyuImage;

    /**
    * @param object $RaceTenboSensyuImage
    */
    public function __construct(RaceTenboSensyuImage $RaceTenboSensyuImage)
    {
        $this->RaceTenboSensyuImage = $RaceTenboSensyuImage;
    }


    /**
     * 登番を基準にレコードを取得
     *
     * @var int $pre_page
     * @var string $touban
     * @return object
     */
    public function getRecordByTouban($pre_page,$touban = 0)
    {

        if($touban){
            return $this->RaceTenboSensyuImage
                    ->where('登番',"like","%".$touban."%")
                    ->paginate($pre_page);
        }else{
            return $this->RaceTenboSensyuImage->paginate($pre_page);
        }
    }

    /**
     * 登番で1レコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordByTouban($touban)
    {
        return $this->RaceTenboSensyuImage
                    ->where('登番','=',$touban)
                    ->first();
    }

    

    /**
     * 登番リストでレコードを取得
     *
     * @var array $touban_list
     * @return object
     */
    public function getRecordByToubanList($touban_list)
    {
        return $this->RaceTenboSensyuImage
                    ->whereIn('登番',$touban_list)
                    ->get();
    }
    

    /**
     * インサート処理
     *
     * @var object  $request
     * @var string  $file_name
     * @return object
     */
    public function insertRecord($request,$file_name)
    {
        //新規作成
        $affected = $this->RaceTenboSensyuImage
                        ->insert([
                            '登番' => $request->input('登番'),
                            '名前' => $request->input('名前'),
                            '出身' => $request->input('出身'),
                            '性別' => $request->input('性別'),
                            '画像名' => $file_name,
                        ]);

        return $affected;
    }

    
    /**
     * 登録番号をキーにしてアップデート
     *
     * @var object $request
     * @var string $touban
     * @var string $file_name
     * @return object
     */
    public function UpdateRecordByTouban($request,$touban,$file_name)
    {

        $new_datetime = date('YmdHis');

        $affected = $this->RaceTenboSensyuImage
                            ->where('登番', $touban)
                            ->update([
                                '名前' => $request->input('名前'),
                                '出身' => $request->input('出身'),
                                '性別' => $request->input('性別'),
                                '画像名' => $file_name,
                            ]);
        return $affected;
    }

    

    /**
     * IDで1レコードを削除
     *
     * @var string $touban
     * @return object
     */
    public function deleteFirstRecordByTouban($touban)
    {
        return $this->RaceTenboSensyuImage
                    ->where('登番', $touban)
                    ->delete();
    }

}