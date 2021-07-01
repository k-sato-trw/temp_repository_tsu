<?php

namespace App\Repositories\TbBoatKekkainfo;

use App\Models\TbBoatKekkainfo;

class TbBoatKekkainfoRepository implements TbBoatKekkainfoRepositoryInterface
{
    protected $TbBoatKekkainfo;

    /**
    * @param object $TbBoatKekkainfo
    */
    public function __construct(TbBoatKekkainfo $TbBoatKekkainfo)
    {
        $this->TbBoatKekkainfo = $TbBoatKekkainfo;
    }

    /**
     * 場コードと日付で取得出来る最終レースナンバーレコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getLastRaceNumberRecordByPK($jyo,$target_date)
    {
        return $this->TbBoatKekkainfo
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','=',$target_date)
                    ->where(function($query){
                        $query->where('TYAKU11','!=','')
                            ->orWhere('TANSYO1','like','M%');
                    })
                    ->orderByRaw('LENGTH(RACE_NUMBER) DESC')
                    ->orderBy('RACE_NUMBER','DESC')
                    ->first();

    }

    /**
     * 場コードと日付とレースナンバーでレコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $race_number
     * @return object
     */
    public function getFirstRecordByPK($jyo,$target_date,$race_number)
    {
        return $this->TbBoatKekkainfo
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','=',$target_date)
                    ->where('RACE_NUMBER','=',$race_number)
                    ->first();

    }


    /**
     * 場コードと日付でそのレースの全レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @return object
     */
    public function getRecordByDate($jyo,$target_date)
    {
        return $this->TbBoatKekkainfo
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','=',$target_date)
                    ->orderByRaw('LENGTH(RACE_NUMBER) ASC')
                    ->orderBy('RACE_NUMBER')
                    ->get();

    }

    /**
     * レース番号基準でレース結果検索用レコードを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @var array  $race_num_list
     * 
     * @return object
     */
    public function getRaceKekkaByRaceNum($jyo,$start_date,$end_date,$race_num_list)
    {
        $query = $this->TbBoatKekkainfo
                    ->where("JYO","=",$jyo)
                    ->where("STOP_CODE","=","0");

                if($end_date){
                    $query->where("TARGET_DATE",">=",$start_date)
                    ->where("TARGET_DATE","<=",$end_date);
                }else{
                    $query->where("TARGET_DATE","=",$start_date);
                }
                $query->whereIn("RACE_NUMBER",$race_num_list);
                
        return $query->orderBy('TARGET_DATE','DESC')
                    ->orderByRaw('LENGTH(RACE_NUMBER) ASC')
                    ->orderBy('RACE_NUMBER','ASC')
                    ->get();
        
    }

    /**
     * 登録番号でレース結果検索用レコードを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @var string $touban
     * 
     * @return object
     */
    public function getRaceKekkaByTouban($jyo,$start_date,$end_date,$touban)
    {
        $query = $this->TbBoatKekkainfo
                    ->join('tb_boat_kekka', function ($join) {
                        $join->on('tb_boat_kekkainfo.JYO', '=', 'tb_boat_kekka.JYO')
                        ->on('tb_boat_kekkainfo.TARGET_DATE', '=', 'tb_boat_kekka.TARGET_DATE')
                        ->on('tb_boat_kekkainfo.RACE_NUMBER', '=', 'tb_boat_kekka.RACE_NUMBER');
                    })
                    ->where("tb_boat_kekkainfo.JYO","=",$jyo)
                    ->where("tb_boat_kekkainfo.STOP_CODE","=","0");

                if($end_date){
                    $query->where("tb_boat_kekkainfo.TARGET_DATE",">=",$start_date)
                    ->where("tb_boat_kekkainfo.TARGET_DATE","<=",$end_date);
                }else{
                    $query->where("tb_boat_kekkainfo.TARGET_DATE","=",$start_date);
                }
                $query->where("tb_boat_kekka.TOUBAN",$touban);
                
        return $query->orderBy('tb_boat_kekkainfo.TARGET_DATE','DESC')
                    ->orderByRaw('LENGTH(tb_boat_kekkainfo.RACE_NUMBER) ASC')
                    ->orderBy('tb_boat_kekkainfo.RACE_NUMBER','ASC')
                    ->get();
        
    }

    /**
     * 出目基準でレース結果検索用レコードを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @var array  $deme_list
     * @var string  $deme_len
     * 
     * @return object
     */
    public function getRaceKekkaByDemeList($jyo,$start_date,$end_date,$deme_list,$deme_len)
    {
        $query = $this->TbBoatKekkainfo
                    ->where("JYO","=",$jyo)
                    ->where("STOP_CODE","=","0");

                if($end_date){
                    $query->where("TARGET_DATE",">=",$start_date)
                    ->where("TARGET_DATE","<=",$end_date);
                }else{
                    $query->where("TARGET_DATE","=",$start_date);
                }

                if($deme_len == 2){
                    $query->whereIn("NIRENTAN1",$deme_list);
                }else{
                    $query->whereIn("SANRENTAN1",$deme_list);
                }
                
                
        return $query->orderBy('TARGET_DATE','DESC')
                    ->orderByRaw('LENGTH(RACE_NUMBER) ASC')
                    ->orderBy('RACE_NUMBER','ASC')
                    ->get();
        
    }

    /**
     * 登録番号でレース結果検索用レコードを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @var string $kimarite
     * 
     * @return object
     */
    public function getRaceKekkaByKimarite($jyo,$start_date,$end_date,$kimarite)
    {
        $query = $this->TbBoatKekkainfo
                    ->join('tb_boat_kekka', function ($join) {
                        $join->on('tb_boat_kekkainfo.JYO', '=', 'tb_boat_kekka.JYO')
                        ->on('tb_boat_kekkainfo.TARGET_DATE', '=', 'tb_boat_kekka.TARGET_DATE')
                        ->on('tb_boat_kekkainfo.RACE_NUMBER', '=', 'tb_boat_kekka.RACE_NUMBER');
                    })
                    ->where("tb_boat_kekkainfo.JYO","=",$jyo)
                    ->where("tb_boat_kekkainfo.STOP_CODE","=","0");

                if($end_date){
                    $query->where("tb_boat_kekkainfo.TARGET_DATE",">=",$start_date)
                    ->where("tb_boat_kekkainfo.TARGET_DATE","<=",$end_date);
                }else{
                    $query->where("tb_boat_kekkainfo.TARGET_DATE","=",$start_date);
                }
                $query->whereRaw("REPLACE(tb_boat_kekka.KIMARITE,'　','') = '".$kimarite."'");
                
        return $query->orderBy('tb_boat_kekkainfo.TARGET_DATE','DESC')
                    ->orderByRaw('LENGTH(tb_boat_kekkainfo.RACE_NUMBER) ASC')
                    ->orderBy('tb_boat_kekkainfo.RACE_NUMBER','ASC')
                    ->get();
        
    }


    /**
     * wakuristuページ用一年分レコードを取得
     *
     * @var string $jyo
     * @var int $race_num
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordForWakuritsu($jyo,$race_num,$start_date,$end_date)
    {
        return $this->TbBoatKekkainfo
                    ->where('JYO','=',$jyo)
                    ->where('RACE_NUMBER','=',$race_num)
                    ->where('TYAKU11','!=',"")
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->orderBy('TARGET_DATE')
                    ->get();

    }

}