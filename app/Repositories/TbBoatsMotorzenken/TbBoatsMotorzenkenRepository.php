<?php

namespace App\Repositories\TbBoatsMotorzenken;

use App\Models\TbBoatsMotorzenken;

class TbBoatsMotorzenkenRepository implements TbBoatsMotorzenkenRepositoryInterface
{
    protected $TbBoatsMotorzenken;

    /**
    * @param object $TbBoatsMotorzenken
    */
    public function __construct(TbBoatsMotorzenken $TbBoatsMotorzenken)
    {
        $this->TbBoatsMotorzenken = $TbBoatsMotorzenken;
    }


    /**
     * モーターのランキングデータを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getMotorRanking($target_date)
    {
        return $this->TbBoatsMotorzenken
                    ->where('JYO',config('const.JYO_CODE'))
                    ->where('TARGET_STARTDATE',$target_date)
                    ->orderBy('MOTOR_NIRENRITU', 'DESC')
                    ->orderBy('TOUBAN', 'ASC')
                    ->get();
    }

    /**
     * 前検タイムランキングデータを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getTimeRanking($target_date)
    {
        return $this->TbBoatsMotorzenken
                    ->where('JYO',config('const.JYO_CODE'))
                    ->where('TARGET_STARTDATE',$target_date)
                    ->orderBy('ZENKEN_TIME', 'ASC')
                    ->orderBy('TOUBAN', 'ASC')
                    ->limit(10)
                    ->get();
    }

    /**
     * TOP表示用前検データを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordForNews($target_date)
    {
        return $this->TbBoatsMotorzenken
                    ->where('JYO',config('const.JYO_CODE'))
                    ->where('TARGET_STARTDATE',$target_date)
                    ->first();
    }

    /**
     * モーター切り替え日検索用データを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getMotorChangeCount($target_date)
    {
        return $this->TbBoatsMotorzenken
                    ->selectRaw("TARGET_STARTDATE, COUNT(`MOTOR_NIRENRITU` != '0.0' OR NULL ) as count")
                    ->where('JYO',config('const.JYO_CODE'))
                    ->where('TARGET_STARTDATE','<=',$target_date)
                    ->groupBy('TARGET_STARTDATE')
                    ->orderBy('TARGET_STARTDATE','DESC')
                    ->get();
    }

    /**
     * ボート切り替え日検索用データを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getBoatChangeCount($target_date)
    {
        return $this->TbBoatsMotorzenken
                    ->selectRaw("TARGET_STARTDATE, COUNT(`BOAT_NIRENRITU` != '0.0' OR NULL ) as count")
                    ->where('JYO',config('const.JYO_CODE'))
                    ->where('TARGET_STARTDATE','<=',$target_date)
                    ->groupBy('TARGET_STARTDATE')
                    ->orderBy('TARGET_STARTDATE','DESC')
                    ->get();
    }

    /**
     * 指定日のモーターリストを取得
     *
     * @var string $target_date
     * @var string $sort
     * @return object
     */
    public function getMotorList($target_date,$sort)
    {
        /**
         * 
         * 1:機番 昇順
         * 2:登番　昇順
         * 3:前検タイム　昇順
         * 4:2連率　降順
         * 5:優出　降順
         * 6:優勝　降順
         * 
         */
        $query = $this->TbBoatsMotorzenken
                    ->join('tb_motor_list',function($join){
                        $join->on('tb_boats_motorzenken.JYO','=','tb_motor_list.JYO')
                        ->on('tb_boats_motorzenken.TARGET_STARTDATE','=','tb_motor_list.TARGET_DATE')
                        ->on('tb_boats_motorzenken.MOTOR_NO','=','tb_motor_list.MOTOR_NO');
                    })
                    ->where('tb_boats_motorzenken.JYO',config('const.JYO_CODE'))
                    ->where('TARGET_STARTDATE','=',$target_date);

                if($sort == 1){
                    $query->orderBy('tb_boats_motorzenken.MOTOR_NO','ASC');
                }elseif($sort == 2){
                    $query->orderBy('tb_boats_motorzenken.TOUBAN','ASC');
                }elseif($sort == 3){
                    $query->orderBy('tb_boats_motorzenken.ZENKEN_TIME','ASC');
                }elseif($sort == 4){
                    $query->orderBy('tb_boats_motorzenken.MOTOR_NIRENRITU','DESC');
                }elseif($sort == 5){
                    $query->orderBy('tb_motor_list.YUSHUTU_CNT','DESC');
                }elseif($sort == 6){
                    $query->orderBy('tb_motor_list.YUSHO_CNT','DESC');
                }

        $result = $query->get();
        
        return $result;
    }

    /**
     * 指定日のモーターリストを取得 SPの場合ソート条件が異なる
     *
     * @var string $target_date
     * @var string $sort
     * @return object
     */
    public function getMotorListForSp($target_date,$sort)
    {
        /**
         * $sort 内訳
         * 0:機番　昇順
         * 1:2連率　降順(URL上は無印)
         * 2:前検タイム　昇順
         * 
         */
        $query = $this->TbBoatsMotorzenken
                    ->join('tb_motor_list',function($join){
                        $join->on('tb_boats_motorzenken.JYO','=','tb_motor_list.JYO')
                        ->on('tb_boats_motorzenken.TARGET_STARTDATE','=','tb_motor_list.TARGET_DATE')
                        ->on('tb_boats_motorzenken.MOTOR_NO','=','tb_motor_list.MOTOR_NO');
                    })
                    ->where('tb_boats_motorzenken.JYO',config('const.JYO_CODE'))
                    ->where('TARGET_STARTDATE','=',$target_date);

                if($sort == 0){
                    $query->orderBy('tb_boats_motorzenken.MOTOR_NIRENRITU','DESC');
                }elseif($sort == 1){
                    $query->orderBy('tb_boats_motorzenken.MOTOR_NO','ASC');
                }elseif($sort == 2){
                    $query->orderBy('tb_boats_motorzenken.ZENKEN_TIME','ASC');
                }

        $result = $query->get();
        
        return $result;
    }


    /**
     * ボートNoリストデータを取得
     *
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getBoatList($start_date,$end_date)
    {
        return $this->TbBoatsMotorzenken
                    ->where('JYO',config('const.JYO_CODE'))
                    ->where('TARGET_STARTDATE','>=',$start_date)
                    ->where('TARGET_STARTDATE','<=',$end_date)
                    ->orderBy('TARGET_STARTDATE','DESC')
                    ->get();
    }


}