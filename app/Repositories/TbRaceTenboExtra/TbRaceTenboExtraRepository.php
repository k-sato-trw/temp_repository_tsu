<?php

namespace App\Repositories\TbRaceTenboExtra;

use App\Models\TbRaceTenboExtra;

class TbRaceTenboExtraRepository implements TbRaceTenboExtraRepositoryInterface
{
    protected $TbRaceTenboExtra;

    /**
    * @param object $TbRaceTenboExtra
    */
    public function __construct(TbRaceTenboExtra $TbRaceTenboExtra)
    {
        $this->TbRaceTenboExtra = $TbRaceTenboExtra;
    }

    

    /**
     * 親テーブルのIDをもとにインサート処理
     *
     * @var object  $request
     * @var string  $id
     * @return object
     */
    public function insertRecord($request,$id)
    {
        $array = [
            'ID' => $id,
            'JYO' => config('const.JYO_CODE'),
        ];
        for($i=1;$i<=6;$i++){
            $temp = [
                'PICKUP_LEAD'.$i => $request->input('PICKUP_LEAD'.$i),
                'PICKUP_SEISEKI_STANDARD_DATE'.$i => $request->input('PICKUP_SEISEKI_STANDARD_DATE'.$i),
                'PICKUP_SEISEKI_DATE'.$i.'_1' => $request->input('PICKUP_SEISEKI_DATE'.$i.'_1'),
                'PICKUP_SEISEKI_JYO'.$i.'_1' => config('const.JYO_CODE'),
                'PICKUP_SEISEKI_GRADE'.$i.'_1' => $request->input('PICKUP_SEISEKI_GRADE'.$i.'_1'),
                'PICKUP_SEISEKI_y_'.$i.'_1' => $request->input('PICKUP_SEISEKI_y_'.$i.'_1'),
                'PICKUP_SEISEKI_j_'.$i.'_1' => $request->input('PICKUP_SEISEKI_j_'.$i.'_1'),
                'PICKUP_SEISEKI_v_'.$i.'_1' => $request->input('PICKUP_SEISEKI_v_'.$i.'_1'),
                'PICKUP_SEISEKI_e_'.$i.'_1' => $request->input('PICKUP_SEISEKI_e_'.$i.'_1'),
                'PICKUP_SEISEKI_DATE'.$i.'_2' => $request->input('PICKUP_SEISEKI_DATE'.$i.'_2'),
                'PICKUP_SEISEKI_JYO'.$i.'_2' => config('const.JYO_CODE'),
                'PICKUP_SEISEKI_GRADE'.$i.'_2' => $request->input('PICKUP_SEISEKI_GRADE'.$i.'_2'),
                'PICKUP_SEISEKI_y_'.$i.'_2' => $request->input('PICKUP_SEISEKI_y_'.$i.'_2'),
                'PICKUP_SEISEKI_j_'.$i.'_2' => $request->input('PICKUP_SEISEKI_j_'.$i.'_2'),
                'PICKUP_SEISEKI_v_'.$i.'_2' => $request->input('PICKUP_SEISEKI_v_'.$i.'_2'),
                'PICKUP_SEISEKI_e_'.$i.'_2' => $request->input('PICKUP_SEISEKI_e_'.$i.'_2'),
                'PICKUP_SEISEKI_DATE'.$i.'_3' => $request->input('PICKUP_SEISEKI_DATE'.$i.'_3'),
                'PICKUP_SEISEKI_JYO'.$i.'_3' => $request->input('PICKUP_SEISEKI_JYO'.$i.'_3'),
                'PICKUP_SEISEKI_GRADE'.$i.'_3' => $request->input('PICKUP_SEISEKI_GRADE'.$i.'_3'),
                'PICKUP_SEISEKI_y_'.$i.'_3' => $request->input('PICKUP_SEISEKI_y_'.$i.'_3'),
                'PICKUP_SEISEKI_j_'.$i.'_3' => $request->input('PICKUP_SEISEKI_j_'.$i.'_3'),
                'PICKUP_SEISEKI_v_'.$i.'_3' => $request->input('PICKUP_SEISEKI_v_'.$i.'_3'),
                'PICKUP_SEISEKI_e_'.$i.'_3' => $request->input('PICKUP_SEISEKI_e_'.$i.'_3'),
                'PICKUP_SEISEKI_DATE'.$i.'_4' => $request->input('PICKUP_SEISEKI_DATE'.$i.'_4'),
                'PICKUP_SEISEKI_JYO'.$i.'_4' => $request->input('PICKUP_SEISEKI_JYO'.$i.'_4'),
                'PICKUP_SEISEKI_GRADE'.$i.'_4' => $request->input('PICKUP_SEISEKI_GRADE'.$i.'_4'),
                'PICKUP_SEISEKI_y_'.$i.'_4' => $request->input('PICKUP_SEISEKI_y_'.$i.'_4'),
                'PICKUP_SEISEKI_j_'.$i.'_4' => $request->input('PICKUP_SEISEKI_j_'.$i.'_4'),
                'PICKUP_SEISEKI_v_'.$i.'_4' => $request->input('PICKUP_SEISEKI_v_'.$i.'_4'),
                'PICKUP_SEISEKI_e_'.$i.'_4' => $request->input('PICKUP_SEISEKI_e_'.$i.'_4'),
            ];
            $array = array_merge($array,$temp);
        }
        //新規作成
        $affected = $this->TbRaceTenboExtra
                        ->insert($array);

        return $affected;
    }
    
    /**
     * IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @return object
     */
    public function UpdateRecordByPK($request,$id)
    {

        $array = [];
        for($i=1;$i<=6;$i++){
            $temp = [
                'PICKUP_LEAD'.$i => $request->input('PICKUP_LEAD'.$i),
                'PICKUP_SEISEKI_STANDARD_DATE'.$i => $request->input('PICKUP_SEISEKI_STANDARD_DATE'.$i),
                'PICKUP_SEISEKI_DATE'.$i.'_1' => $request->input('PICKUP_SEISEKI_DATE'.$i.'_1'),
                'PICKUP_SEISEKI_JYO'.$i.'_1' => config('const.JYO_CODE'),
                'PICKUP_SEISEKI_GRADE'.$i.'_1' => $request->input('PICKUP_SEISEKI_GRADE'.$i.'_1'),
                'PICKUP_SEISEKI_y_'.$i.'_1' => $request->input('PICKUP_SEISEKI_y_'.$i.'_1'),
                'PICKUP_SEISEKI_j_'.$i.'_1' => $request->input('PICKUP_SEISEKI_j_'.$i.'_1'),
                'PICKUP_SEISEKI_v_'.$i.'_1' => $request->input('PICKUP_SEISEKI_v_'.$i.'_1'),
                'PICKUP_SEISEKI_e_'.$i.'_1' => $request->input('PICKUP_SEISEKI_e_'.$i.'_1'),
                'PICKUP_SEISEKI_DATE'.$i.'_2' => $request->input('PICKUP_SEISEKI_DATE'.$i.'_2'),
                'PICKUP_SEISEKI_JYO'.$i.'_2' => config('const.JYO_CODE'),
                'PICKUP_SEISEKI_GRADE'.$i.'_2' => $request->input('PICKUP_SEISEKI_GRADE'.$i.'_2'),
                'PICKUP_SEISEKI_y_'.$i.'_2' => $request->input('PICKUP_SEISEKI_y_'.$i.'_2'),
                'PICKUP_SEISEKI_j_'.$i.'_2' => $request->input('PICKUP_SEISEKI_j_'.$i.'_2'),
                'PICKUP_SEISEKI_v_'.$i.'_2' => $request->input('PICKUP_SEISEKI_v_'.$i.'_2'),
                'PICKUP_SEISEKI_e_'.$i.'_2' => $request->input('PICKUP_SEISEKI_e_'.$i.'_2'),
                'PICKUP_SEISEKI_DATE'.$i.'_3' => $request->input('PICKUP_SEISEKI_DATE'.$i.'_3'),
                'PICKUP_SEISEKI_JYO'.$i.'_3' => $request->input('PICKUP_SEISEKI_JYO'.$i.'_3'),
                'PICKUP_SEISEKI_GRADE'.$i.'_3' => $request->input('PICKUP_SEISEKI_GRADE'.$i.'_3'),
                'PICKUP_SEISEKI_y_'.$i.'_3' => $request->input('PICKUP_SEISEKI_y_'.$i.'_3'),
                'PICKUP_SEISEKI_j_'.$i.'_3' => $request->input('PICKUP_SEISEKI_j_'.$i.'_3'),
                'PICKUP_SEISEKI_v_'.$i.'_3' => $request->input('PICKUP_SEISEKI_v_'.$i.'_3'),
                'PICKUP_SEISEKI_e_'.$i.'_3' => $request->input('PICKUP_SEISEKI_e_'.$i.'_3'),
                'PICKUP_SEISEKI_DATE'.$i.'_4' => $request->input('PICKUP_SEISEKI_DATE'.$i.'_4'),
                'PICKUP_SEISEKI_JYO'.$i.'_4' => $request->input('PICKUP_SEISEKI_JYO'.$i.'_4'),
                'PICKUP_SEISEKI_GRADE'.$i.'_4' => $request->input('PICKUP_SEISEKI_GRADE'.$i.'_4'),
                'PICKUP_SEISEKI_y_'.$i.'_4' => $request->input('PICKUP_SEISEKI_y_'.$i.'_4'),
                'PICKUP_SEISEKI_j_'.$i.'_4' => $request->input('PICKUP_SEISEKI_j_'.$i.'_4'),
                'PICKUP_SEISEKI_v_'.$i.'_4' => $request->input('PICKUP_SEISEKI_v_'.$i.'_4'),
                'PICKUP_SEISEKI_e_'.$i.'_4' => $request->input('PICKUP_SEISEKI_e_'.$i.'_4'),
            ];
            $array = array_merge($array,$temp);
        }

        $affected = $this->TbRaceTenboExtra
                            ->where('ID', $id)
                            ->where('JYO', config('const.JYO_CODE'))
                            ->update($array);
        return $affected;
    }

}