<?php

namespace App\Repositories\TbRaceSyutujoRacer;

use App\Models\TbRaceSyutujoRacer;

class TbRaceSyutujoRacerRepository implements TbRaceSyutujoRacerRepositoryInterface
{
    protected $TbRaceSyutujoRacer;

    /**
    * @param object $TbRaceSyutujoRacer
    */
    public function __construct(TbRaceSyutujoRacer $TbRaceSyutujoRacer)
    {
        $this->TbRaceSyutujoRacer = $TbRaceSyutujoRacer;
    }


    /**
     * IDをもとにレコードを取得　マークでソート
     *
     * @var int $id
     * @return object
     */
    public function getRecordByPK($id)
    {
        return $this->TbRaceSyutujoRacer
                    ->where('ID',$id)
                    ->where('JYO',config("const.JYO_CODE"))
                    ->orderByRaw("CASE 
                    WHEN (YOSO = '◎') THEN 1 
                    WHEN (YOSO = '○') THEN 2 
                    WHEN (YOSO = '▲') THEN 3 
                    WHEN (YOSO = '△') THEN 4 
                    WHEN (YOSO = '×') THEN 5 
                    ELSE 9999 END , Touban ASC")
                    ->get();
    }

    /**
     * IDと予想をもとにレコードを取得
     *
     * @var int $id
     * @var string $yoso
     * @return object
     */
    public function getRecordByPKAndYoso($id,$yoso)
    {
        $query = $this->TbRaceSyutujoRacer
                        ->where('ID',$id)
                        ->where('JYO',config("const.JYO_CODE"));
        if($yoso){
            $query->where('YOSO',$yoso);
        }else{
            $query->where(function($query) {
                        $query->where('YOSO', '')
                            ->orWhere('YOSO',null);
                    });
        }
        $result = $query->where('APPEAR_FLG',1)->get();

        return $result;
    }

    /**
     * インサート処理
     *
     * @var object  $request
     * @var int  $id
     * @return object
     */
    public function insertRecord($request,$id)
    {
        $new_datetime = date('YmdHi');

        //新規作成
        $affected = $this->TbRaceSyutujoRacer
                        ->insert([
                            'ID' => $id,
                            'JYO' => config("const.JYO_CODE"),
                            'TOUBAN' => $request->input('TOUBAN'),
                            'APPEAR_FLG' => $request->input('APPEAR_FLG'),
                            'SENSYU_NAME' => $request->input('SENSYU_NAME'),
                            'AGE' => $request->input('AGE'),
                            'ADDRESS' => $request->input('ADDRESS'),
                            'SEX' => $request->input('SEX'),
                            'KYU' => $request->input('KYU'),
                            'ALLWIN' => $request->input('ALLWIN'),
                            'ALL2WIN' => $request->input('ALL2WIN'),
                            'ALLAVGST' => $request->input('ALLAVGST'),
                            'ALLCOUNT' => $request->input('ALLCOUNT'),
                            'BIRTHDAY' => $request->input('BIRTHDAY'),
                            'EDITOR_NAME' => $request->input('EDITOR_NAME'),
                            'RESIST_TIME' => $new_datetime,
                            'UPDATE_TIME' => $new_datetime,
                        ]);

        return $affected;
    }

    /**
     * ID、当番で1レコードを取得
     *
     * @var int $id
     * @var string $touban
     * @return object
     */
    public function getFirstRecordByPK($id,$touban)
    {
        return $this->TbRaceSyutujoRacer
                    ->where('ID',$id)
                    ->where('JYO',config("const.JYO_CODE"))
                    ->where('TOUBAN',$touban)
                    ->first();
    }

    /**
     * ID、当番をキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @var string $touban
     * @return object
     */
    public function UpdateRecordByPK($request,$id,$touban)
    {

        $affected = $this->TbRaceSyutujoRacer
                            ->where('ID', $id)
                            ->where('JYO',config("const.JYO_CODE"))
                            ->where('TOUBAN',$touban)
                            ->update([
                                'APPEAR_FLG' => $request->input('APPEAR_FLG'),
                                'SENSYU_NAME' => $request->input('SENSYU_NAME'),
                                'AGE' => $request->input('AGE'),
                                'ADDRESS' => $request->input('ADDRESS'),
                                'SEX' => $request->input('SEX'),
                                'KYU' => $request->input('KYU'),
                                'ALLWIN' => $request->input('ALLWIN'),
                                'ALL2WIN' => $request->input('ALL2WIN'),
                                'ALLAVGST' => $request->input('ALLAVGST'),
                                'ALLCOUNT' => $request->input('ALLCOUNT'),
                                'BIRTHDAY' => $request->input('BIRTHDAY'),
                                'EDITOR_NAME' => $request->input('EDITOR_NAME'),
                                'UPDATE_TIME' => date('YmdHi'),
                            ]);
        return $affected;
    }

    /**
     * IDと登録番号で1レコードを削除
     *
     * @var int $id
     * @var string $touban
     * @return object
     */
    public function deleteFirstRecordByPK($id, $touban)
    {
        return $this->TbRaceSyutujoRacer
                    ->where('ID', $id)
                    ->where('JYO',config('const.JYO_CODE'))
                    ->where('TOUBAN', $touban)
                    ->delete();
    }

    
    /**
     * IDと登録番号で1レコードの予想を削除
     *
     * @var int $id
     * @var string $touban
     * @return object
     */
    public function clearYosoByPK($id, $touban)
    {
        return $this->TbRaceSyutujoRacer
                    ->where('ID', $id)
                    ->where('JYO',config('const.JYO_CODE'))
                    ->where('TOUBAN', $touban)
                    ->update([
                        'YOSO' => '',
                        'UPDATE_TIME' => date('YmdHi'),
                    ]);
    }
    
    /**
     * 1レコードの予想を更新
     *
     * @var int $id
     * @var object $request
     * @return object
     */
    public function updateYosoByPK($request,$id)
    {
        $touban = $request->input('TOUBAN');
        $yoso = $request->input('YOSO');

        return $this->TbRaceSyutujoRacer
                    ->where('ID', $id)
                    ->where('JYO',config('const.JYO_CODE'))
                    ->where('TOUBAN', $touban)
                    ->update([
                        'YOSO' => $yoso,
                        'UPDATE_TIME' => date('YmdHi'),
                    ]);
    }


    /**
     * レース展望の出場表用、追加リスト・除外リスト作成の為、掲載フラグを条件に追加
     *
     * @var int $id
     * @var int $appear_flg
     * @return object
     */
    public function getRecordForRaceTenbo($id,$appear_flg)
    {
        return $this->TbRaceSyutujoRacer
                    ->where('ID',$id)
                    ->where('JYO',config("const.JYO_CODE"))
                    ->where('APPEAR_FLG',$appear_flg)
                    ->orderByRaw("CASE 
                    WHEN (YOSO = '◎') THEN 1 
                    WHEN (YOSO = '○') THEN 2 
                    WHEN (YOSO = '▲') THEN 3 
                    WHEN (YOSO = '△') THEN 4 
                    WHEN (YOSO = '×') THEN 5 
                    ELSE 9999 END , Touban ASC")
                    ->get();
    }


}