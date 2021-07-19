<?php

namespace App\Repositories\TbBoatSyussou;

use App\Models\TbBoatSyussou;

class TbBoatSyussouRepository implements TbBoatSyussouRepositoryInterface
{
    protected $TbBoatSyussou;

    /**
    * @param object $user
    */
    public function __construct(TbBoatSyussou $TbBoatSyussou)
    {
        $this->TbBoatSyussou = $TbBoatSyussou;
    }

    /**
     * JYO, TARGET_DATE, RACE_NUM で該当レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_num
     * @return object
     */
    public function getRecordByPK($jyo,$target_date,$race_num)
    {
        return $this->TbBoatSyussou
                    ->where("JYO","=",$jyo)
                    ->where("TARGET_DATE","=",$target_date)
                    ->where("RACE_NUMBER","=",$race_num)
                    ->orderBy("TEIBAN","ASC")
                    ->get();
    }


    /**
     * プロフィール出力用優勝データを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @var string $touban
     * @return object
     */
    public function getYushoRecordForProfile($jyo,$start_date,$end_date,$touban = false)
    {
        $query = $this->TbBoatSyussou
                    ->select(['TARGET_DATE','RACE_NUMBER' , 'RACE_SYUBETU_CODE'])
                    ->where("JYO","=",$jyo)
                    ->where("TARGET_DATE",">=",$start_date)
                    ->where("TARGET_DATE","<=",$end_date)
                    ->where(function($query){
                        $query->where('RACE_SYUBETU_CODE','06')
                        ->orWhere('RACE_SYUBETU_CODE','92')
                        ->orWhere('RACE_SYUBETU_CODE','05');
                    });

                    if($touban){
                        $query->where("TOUBAN","=",$touban);
                    }
                    
        $result = $query->groupBy("TARGET_DATE")
                    ->groupBy("RACE_NUMBER")
                    ->groupBy("RACE_SYUBETU_CODE")
                    ->orderBy("TARGET_DATE","DESC")
                    ->orderByRaw('LENGTH(RACE_NUMBER)')
                    ->orderBy('RACE_NUMBER','ASC')
                    ->get();
        return $result;
    }

    /**
     * プロフィール出力用データを取得
     *
     * @var string $touban
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getFirstRecordForProfile($touban,$jyo,$start_date,$end_date)
    {
        return $this->TbBoatSyussou
                    ////->select(['TARGET_DATE','RACE_NUMBER' , 'RACE_SYUBETU_CODE'])
                    ->where("TOUBAN","=",$touban)
                    ->where("JYO","=",$jyo)
                    ->where("TARGET_DATE",">=",$start_date)
                    ->where("TARGET_DATE","<=",$end_date)
                    ->orderBy("TARGET_DATE","DESC")
                    ->orderByRaw('LENGTH(RACE_NUMBER)')
                    ->orderBy('RACE_NUMBER','ASC')
                    ->first();
    }

    

    /**
     * プロフィール出力用、直近成績データを取得
     *
     * @var string $touban
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getFirstChokkinRecordForProfile($touban,$jyo,$target_date)
    {
        return $this->TbBoatSyussou
                    ->where("TOUBAN","=",$touban)
                    ->where("JYO","=",$jyo)
                    ->where("TARGET_DATE","<=",$target_date)
                    ->orderBy("TARGET_DATE","DESC")
                    ->orderByRaw('LENGTH(RACE_NUMBER)')
                    ->orderBy('RACE_NUMBER','ASC')
                    ->first();
    }

    /**
     * フロントモーター履歴　規定日より前の特定場のモーターNOを降順で取得
     * boat_kekkaと一対一でjoinする。
     *
     * @var string $target_date
     * @var string $jyo
     * @var string $motor_no
     * @return object
     */
    public function getMotorRirekiJoinKekka($target_date,$jyo,$motor_no)
    {
        return $this->TbBoatSyussou
                    ->join('tb_boat_kekka',function($join){
                        $join->on('tb_boat_syussou.JYO','=','tb_boat_kekka.JYO')
                        ->on('tb_boat_syussou.TARGET_DATE','=','tb_boat_kekka.TARGET_DATE')
                        ->on('tb_boat_syussou.RACE_NUMBER','=','tb_boat_kekka.RACE_NUMBER')
                        ->on('tb_boat_syussou.TEIBAN','=','tb_boat_kekka.TEIBAN');
                    })
                    ->join('tb_boat_raceheader',function($join){
                        $join->on('tb_boat_syussou.JYO','=','tb_boat_raceheader.JYO')
                        ->on('tb_boat_syussou.TARGET_DATE','=','tb_boat_raceheader.TARGET_DATE');
                    })
                    ->where('tb_boat_syussou.TARGET_DATE','<',$target_date)
                    ->where('tb_boat_syussou.JYO','=',$jyo)
                    ->where('MOTOR_NO','=',$motor_no)
                    ->orderBy('tb_boat_syussou.TARGET_DATE','DESC')
                    ->orderByRaw('LENGTH(tb_boat_syussou.RACE_NUMBER) DESC')
                    ->orderBy('tb_boat_syussou.RACE_NUMBER','DESC')
                    ->limit(100)
                    ->get();
    }

    /**
     * フロント直近三節の履歴　登番に対して規定日より前のデータを降順で取得
     * boat_kekkaとtb_boat_raceheaderで一対一対一でjoinする。
     *
     * @var string $target_date
     * @var string $touban
     * @return object
     */
    public function getKinkyoRirekiJoinKekka($target_date,$touban)
    {
        return $this->TbBoatSyussou
                    ->join('tb_boat_kekka',function($join){
                        $join->on('tb_boat_syussou.JYO','=','tb_boat_kekka.JYO')
                        ->on('tb_boat_syussou.TARGET_DATE','=','tb_boat_kekka.TARGET_DATE')
                        ->on('tb_boat_syussou.RACE_NUMBER','=','tb_boat_kekka.RACE_NUMBER')
                        ->on('tb_boat_syussou.TEIBAN','=','tb_boat_kekka.TEIBAN');
                    })
                    ->join('tb_boat_raceheader',function($join){
                        $join->on('tb_boat_syussou.JYO','=','tb_boat_raceheader.JYO')
                        ->on('tb_boat_syussou.TARGET_DATE','=','tb_boat_raceheader.TARGET_DATE');
                    })
                    ->where('tb_boat_syussou.TARGET_DATE','<',$target_date)
                    ->where('tb_boat_syussou.TOUBAN','=',$touban)
                    ->orderBy('tb_boat_syussou.TARGET_DATE','DESC')
                    ->orderByRaw('LENGTH(tb_boat_syussou.RACE_NUMBER) DESC')
                    ->orderBy('tb_boat_syussou.RACE_NUMBER','DESC')
                    ->limit(100)
                    ->get();
    }

    /**
     * フロント直近当地の履歴　登番に対して規定日より前のデータを降順で取得
     * boat_kekkaとtb_boat_raceheaderで一対一対一でjoinする。
     *
     * @var string $target_date
     * @var string $touban
     * @var string $jyo
     * @return object
     */
    public function getKinkyoTouchiRirekiJoinKekka($target_date,$touban,$jyo)
    {
        return $this->TbBoatSyussou
                    ->join('tb_boat_kekka',function($join){
                        $join->on('tb_boat_syussou.JYO','=','tb_boat_kekka.JYO')
                        ->on('tb_boat_syussou.TARGET_DATE','=','tb_boat_kekka.TARGET_DATE')
                        ->on('tb_boat_syussou.RACE_NUMBER','=','tb_boat_kekka.RACE_NUMBER')
                        ->on('tb_boat_syussou.TEIBAN','=','tb_boat_kekka.TEIBAN');
                    })
                    ->join('tb_boat_raceheader',function($join){
                        $join->on('tb_boat_syussou.JYO','=','tb_boat_raceheader.JYO')
                        ->on('tb_boat_syussou.TARGET_DATE','=','tb_boat_raceheader.TARGET_DATE');
                    })
                    ->where('tb_boat_syussou.JYO','=',$jyo)
                    ->where('tb_boat_syussou.TARGET_DATE','<',$target_date)
                    ->where('tb_boat_syussou.TOUBAN','=',$touban)
                    ->orderBy('tb_boat_syussou.TARGET_DATE','DESC')
                    ->orderByRaw('LENGTH(tb_boat_syussou.RACE_NUMBER) DESC')
                    ->orderBy('tb_boat_syussou.RACE_NUMBER','DESC')
                    ->limit(100)
                    ->get();
    }

    

    /**
     * フロント直近当地の履歴 展望ページ出場リスト用　複数登録番号を一括で取得
     * 登番に対して規定日より前のデータを降順で取得
     * boat_kekkaとtb_boat_raceheaderで一対一対一でjoinする。
     *
     * @var string $target_date
     * @var array $touban_list
     * @var string $jyo
     * @return object
     */
    public function getKinkyoTouchiRirekiJoinKekkaAll($target_date, $touban_list, $jyo)
    {
        return $this->TbBoatSyussou
            ->join('tb_boat_kekka', function ($join) {
                $join->on('tb_boat_syussou.JYO', '=', 'tb_boat_kekka.JYO')
                    ->on('tb_boat_syussou.TARGET_DATE', '=', 'tb_boat_kekka.TARGET_DATE')
                    ->on('tb_boat_syussou.RACE_NUMBER', '=', 'tb_boat_kekka.RACE_NUMBER')
                    ->on('tb_boat_syussou.TEIBAN', '=', 'tb_boat_kekka.TEIBAN');
            })
            ->join('tb_boat_raceheader', function ($join) {
                $join->on('tb_boat_syussou.JYO', '=', 'tb_boat_raceheader.JYO')
                    ->on('tb_boat_syussou.TARGET_DATE', '=', 'tb_boat_raceheader.TARGET_DATE');
            })
            ->where('tb_boat_syussou.JYO', '=', $jyo)
            ->where('tb_boat_syussou.TARGET_DATE', '<=', $target_date)
            ->whereIn('tb_boat_syussou.TOUBAN', $touban_list)
            ->orderBy('tb_boat_syussou.TARGET_DATE', 'DESC')
            ->orderByRaw('LENGTH(tb_boat_syussou.RACE_NUMBER) DESC')
            ->orderBy('tb_boat_syussou.RACE_NUMBER', 'DESC')
            ->limit(count($touban_list) * 100)
            ->get();
    }



    /**
     * リプレイ用に複数の検索条件 で該当レコードを取得
     *
     * @var string $jyo
     * @var array $search_conditions
     * @return object
     */
    public function getRecordForReplay($jyo,$search_conditions)
    {
        $query = $this->TbBoatSyussou
                    ->where("JYO","=",$jyo)
                    ->where("TEIBAN","=",'1');
                    $query->where(function($sub_query) use($search_conditions) {
                        foreach($search_conditions as $key => $codition){
                            //var_dump($codition['target_date']);
                            if($key == 0){
                                $sub_query->where(function($sub_query) use($codition) {
                                    $sub_query->where("TARGET_DATE","=",$codition['target_date'])
                                                ->where("RACE_NUMBER","=",$codition['race_number']);
                                });
                            }else{
                                $sub_query->orWhere(function($sub_query) use($codition) {
                                    $sub_query->where("TARGET_DATE","=",$codition['target_date'])
                                                ->where("RACE_NUMBER","=",$codition['race_number']);
                                });
                            }
                        }
                    });  

        return $query->get();
    }


    /**
     * SP競技のメニュー表示用、指定日の全レースのレース名を収集
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getRecordForSpKyogi($jyo,$target_date)
    {
        return $this->TbBoatSyussou
                    ->where("JYO","=",$jyo)
                    ->where("TARGET_DATE","=",$target_date)
                    ->where("TEIBAN","=",'1')
                    ->orderByRaw('LENGTH(RACE_NUMBER)')
                    ->orderBy('RACE_NUMBER','ASC')
                    ->get();
    }


    /**
     * 出場表用優出カウントを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @var string $touban
     * @return object
     */
    public function getYusyutuCount($jyo,$start_date,$end_date,$touban)
    {
        return $this->TbBoatSyussou
                    ->where("JYO","=",$jyo)
                    ->where("TARGET_DATE",">=",$start_date)
                    ->where("TARGET_DATE","<=",$end_date)
                    ->where(function($query){
                        $query->where('RACE_SYUBETU_CODE','06')
                        ->orWhere('RACE_SYUBETU_CODE','92');
                    })
                    ->where("TOUBAN","=",$touban)
                    ->count();
    }


    /**
     * 東京NEXT表示用、指定日の全場レースを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getAllJyoRecordByDate($target_date)
    {
        return $this->TbBoatSyussou
                    ->join('tb_boat_kekka',function($join){
                        $join->on('tb_boat_syussou.JYO','=','tb_boat_kekka.JYO')
                        ->on('tb_boat_syussou.TARGET_DATE','=','tb_boat_kekka.TARGET_DATE')
                        ->on('tb_boat_syussou.RACE_NUMBER','=','tb_boat_kekka.RACE_NUMBER')
                        ->on('tb_boat_syussou.TEIBAN','=','tb_boat_kekka.TEIBAN');
                    })
                    ->where("tb_boat_syussou.TARGET_DATE","=",$target_date)
                    ->orderByRaw('LENGTH(tb_boat_syussou.RACE_NUMBER) DESC')
                    ->orderBy('tb_boat_syussou.RACE_NUMBER','DESC')
                    ->get();
    }


    /**
     * JYO, TARGET_DATE で一日分の該当レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getRecordBkDate($jyo,$target_date)
    {
        return $this->TbBoatSyussou
                    ->where("JYO","=",$jyo)
                    ->where("TARGET_DATE","=",$target_date)
                    ->orderBy("TEIBAN","ASC")
                    ->get();
    }


    /**
     * デビュー用データを取得
     *
     * @var string $touban
     * @return object
     */
    public function getDebutRecordForProfile($touban)
    {
        return $this->TbBoatSyussou
                    ////->select(['TARGET_DATE','RACE_NUMBER' , 'RACE_SYUBETU_CODE'])
                    ->where("TOUBAN","=",$touban)
                    ->orderBy("TARGET_DATE","ASC")
                    ->orderByRaw('LENGTH(RACE_NUMBER)')
                    ->orderBy('RACE_NUMBER','ASC')
                    ->first();
    }


    /**
     * ボートNOに基づいて期間中の出走データを取得
     * boat_kekkaと一対一でjoinする。
     *
     * @var string $start_date
     * @var string $end_date
     * @var string $jyo
     * @var string $motor_no
     * @return object
     */
    public function getBoatSyussouCount($start_date,$end_date,$jyo,$boat_no)
    {
        return $this->TbBoatSyussou
                    ->join('tb_boat_kekka',function($join){
                        $join->on('tb_boat_syussou.JYO','=','tb_boat_kekka.JYO')
                        ->on('tb_boat_syussou.TARGET_DATE','=','tb_boat_kekka.TARGET_DATE')
                        ->on('tb_boat_syussou.RACE_NUMBER','=','tb_boat_kekka.RACE_NUMBER')
                        ->on('tb_boat_syussou.TEIBAN','=','tb_boat_kekka.TEIBAN');
                    })
                    ->join('tb_boat_raceheader',function($join){
                        $join->on('tb_boat_syussou.JYO','=','tb_boat_raceheader.JYO')
                        ->on('tb_boat_syussou.TARGET_DATE','=','tb_boat_raceheader.TARGET_DATE');
                    })
                    ->where('tb_boat_syussou.TARGET_DATE','>=',$start_date)
                    ->where('tb_boat_syussou.TARGET_DATE','<',$end_date)
                    ->where('tb_boat_syussou.JYO','=',$jyo)
                    ->where('tb_boat_syussou.BOAT_NO','=',$boat_no)
                    ->orderBy('tb_boat_syussou.TARGET_DATE','ASC')
                    ->orderByRaw('LENGTH(tb_boat_syussou.RACE_NUMBER) ASC')
                    ->orderBy('tb_boat_syussou.RACE_NUMBER','ASC')
                    ->get();
    }


    /**
     * モーターNOに基づいて期間中の出走データを取得
     * boat_kekkaと一対一でjoinする。
     *
     * @var string $start_date
     * @var string $end_date
     * @var string $jyo
     * @var string $motor_no
     * @return object
     */
    public function getMotorSyussouCount($start_date,$end_date,$jyo,$motor_no)
    {
        return $this->TbBoatSyussou
                    ->join('tb_boat_kekka',function($join){
                        $join->on('tb_boat_syussou.JYO','=','tb_boat_kekka.JYO')
                        ->on('tb_boat_syussou.TARGET_DATE','=','tb_boat_kekka.TARGET_DATE')
                        ->on('tb_boat_syussou.RACE_NUMBER','=','tb_boat_kekka.RACE_NUMBER')
                        ->on('tb_boat_syussou.TEIBAN','=','tb_boat_kekka.TEIBAN');
                    })
                    ->join('tb_boat_raceheader',function($join){
                        $join->on('tb_boat_syussou.JYO','=','tb_boat_raceheader.JYO')
                        ->on('tb_boat_syussou.TARGET_DATE','=','tb_boat_raceheader.TARGET_DATE');
                    })
                    ->where('tb_boat_syussou.TARGET_DATE','>=',$start_date)
                    ->where('tb_boat_syussou.TARGET_DATE','<',$end_date)
                    ->where('tb_boat_syussou.JYO','=',$jyo)
                    ->where('tb_boat_syussou.MOTOR_NO','=',$motor_no)
                    ->orderBy('tb_boat_syussou.TARGET_DATE','ASC')
                    ->orderByRaw('LENGTH(tb_boat_syussou.RACE_NUMBER) ASC')
                    ->orderBy('tb_boat_syussou.RACE_NUMBER','ASC')
                    ->get();
    }
}