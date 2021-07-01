<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\TbBoatSyussou\TbBoatSyussouRepositoryInterface;
use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\ChushiJunen\ChushiJunenRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;
use App\Repositories\Holding\HoldingRepositoryInterface;
use App\Repositories\TbBoatOzzinfo\TbBoatOzzinfoRepositoryInterface;
use App\Services\GeneralService;    

class GetKinkyoController extends Controller
{

    public $TbBoatSyussou;
    public $KaisaiMaster;
    public $ChushiJunen;
    public $TbBoatRaceheader;
    public $Holding;
    public $TbBoatOzzinfo;
    public $General;

    public function __construct(
        TbBoatSyussouRepositoryInterface $TbBoatSyussou,
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        ChushiJunenRepositoryInterface $ChushiJunen,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader,
        HoldingRepositoryInterface $Holding,
        TbBoatOzzinfoRepositoryInterface $TbBoatOzzinfo,
        GeneralService $GeneralService
    ){
        $this->TbBoatSyussou = $TbBoatSyussou;
        $this->KaisaiMaster = $KaisaiMaster;
        $this->ChushiJunen = $ChushiJunen;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
        $this->Holding = $Holding;
        $this->TbBoatOzzinfo = $TbBoatOzzinfo;
        $this->General = $GeneralService;
    }

    public function json(Request $request)
    {

        $target_date = $request->input('target_date');
        $touban = $request->input('touban');
        $type = $request->input('type') ?? 'all';

        if($type == 'all'){
            $kinkyo_rireki_array = $this->TbBoatSyussou->getKinkyoRirekiJoinKekka($target_date,$touban);
        }elseif($type == 'touchi'){
            $kinkyo_rireki_array = $this->TbBoatSyussou->getKinkyoTouchiRirekiJoinKekka($target_date,$touban,config('const.JYO_CODE'));
        }

        //節間判定用レースタイトル
        $race_title = $kinkyo_rireki_array[0]->RACE_TITLE ?? "";
        $kinkyo_rireki_3 = [];
        $kinkyo_end_date=$kinkyo_rireki_array[0]->TARGET_DATE ?? "";
        //文字列にする
        //$kinkyo_race_rireki_n = "";
        $kinkyo_yosen_rireki_n = "";
        $kinkyo_junyu_rireki_n = "";
        $kinkyo_yusyo_rireki_n = "";
        $kinkyo_temp_yosen_rireki_n = ""; //優勝、準優がでていない時の仮の格納、順優のみであれば順優後予選に、優勝・準優が無ければ予選として確定

        $junyu_flg = false;
        $rireki_count = 1;
        $setsukan_end = false;
        $rireki_array_end = false;

        foreach($kinkyo_rireki_array as $key => $kinkyo_rireki_row){

            //配列格納ではなく、この段階で文字列作成まで進める
            if($kinkyo_rireki_row->RACE_SYUBETU_CODE == '06' || $kinkyo_rireki_row->RACE_SYUBETU_CODE == '96' ){
                //優勝
                //$kinkyo_race_rireki_n = $this->KyogiCommon->yusho_tyakujun_to_image($kinkyo_rireki_row->TYAKUJUN).$kinkyo_race_rireki_n;
                $kinkyo_yusyo_rireki_n = $kinkyo_rireki_row->TYAKUJUN.$kinkyo_yusyo_rireki_n;

            }elseif($kinkyo_rireki_row->RACE_SYUBETU_CODE == '05'){
                //準優勝
                //$kinkyo_race_rireki_n = $this->KyogiCommon->junyu_tyakujun_to_image($kinkyo_rireki_row->TYAKUJUN).$kinkyo_race_rireki_n;
                $kinkyo_junyu_rireki_n = $kinkyo_rireki_row->TYAKUJUN.$kinkyo_junyu_rireki_n;
                $junyu_flg = true;
            }elseif($junyu_flg){
                $kinkyo_yosen_rireki_n = $kinkyo_rireki_row->TYAKUJUN.$kinkyo_yosen_rireki_n;
            }else{
                $kinkyo_temp_yosen_rireki_n = $kinkyo_rireki_row->TYAKUJUN.$kinkyo_temp_yosen_rireki_n;
            }

            //次があるか、あった場合同じタイトルかのフラグチェック
            if(isset($kinkyo_rireki_array[$key + 1])){
                if($race_title != $kinkyo_rireki_array[$key + 1]->RACE_TITLE){
                    $setsukan_end = true;
                    $rireki_array_end = false;
                }else{
                    $setsukan_end = false;
                    $rireki_array_end = false;
                }
            }else{
                $setsukan_end = true;
                $rireki_array_end = true;
            }

            if($setsukan_end){
                //節間が変わった場合、終了処理

                //値の整形
                if(!$junyu_flg){
                    $kinkyo_yosen_rireki_n = $kinkyo_temp_yosen_rireki_n;
                    $kinkyo_temp_yosen_rireki_n = "";
                }
                //2021.03 江戸川 [一般]
                $kinkyo_lavel = date('Y.m',strtotime($kinkyo_rireki_row->TARGET_DATE)).
                                " ".
                                $this->General->jyocode_to_jyoname($kinkyo_rireki_row->JYO).
                                " [".
                                $this->General->gradenumber_to_gradename_for_tokyo_next($kinkyo_rireki_row->GRADE_CODE).
                                "]";

                //名前、級、レース配列
                $kinkyo_rireki_3[$rireki_count]['kinkyo_grade'] = $kinkyo_rireki_row->GRADE_CODE;
                $kinkyo_rireki_3[$rireki_count]['kinkyo_jyo'] = $kinkyo_rireki_row->JYO;
                $kinkyo_rireki_3[$rireki_count]['kinkyo_start_date'] = $kinkyo_rireki_row->TARGET_DATE;
                $kinkyo_rireki_3[$rireki_count]['kinkyo_end_date'] = $kinkyo_end_date;
                $kinkyo_rireki_3[$rireki_count]['kinkyo_yosen_rireki_n'] = $kinkyo_yosen_rireki_n;
                $kinkyo_rireki_3[$rireki_count]['kinkyo_junyu_rireki_n'] = $kinkyo_junyu_rireki_n;
                $kinkyo_rireki_3[$rireki_count]['kinkyo_yusyo_rireki_n'] = $kinkyo_yusyo_rireki_n;
                $kinkyo_rireki_3[$rireki_count]['kinkyo_temp_yosen_rireki_n'] = $kinkyo_temp_yosen_rireki_n;
                $kinkyo_rireki_3[$rireki_count]['kinkyo_label'] = $kinkyo_lavel;

                //履歴がすでに3ある場合、と配列が最終列の場合は終了
                if($rireki_count >= 3 || $rireki_array_end){
                    break;
                }

                //次の節間の設定
                $rireki_count++;
                
                $race_title = $kinkyo_rireki_array[$key + 1]->RACE_TITLE;
                $kinkyo_end_date = $kinkyo_rireki_array[$key + 1]->TARGET_DATE;
                //$kinkyo_race_rireki_n = "";
                $kinkyo_yosen_rireki_n = "";
                $kinkyo_junyu_rireki_n = "";
                $kinkyo_yusyo_rireki_n = "";
                $kinkyo_temp_yosen_rireki_n = "";
                $junyu_flg = false;

            }
        }
        
        return json_encode($kinkyo_rireki_3);
    }

}