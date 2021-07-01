<?php

namespace App\Services;

use App\Repositories\TbBoatSyussou\TbBoatSyussouRepositoryInterface;
use App\Repositories\TbBoatTyokuzen\TbBoatTyokuzenRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;
use App\Repositories\TbBoatKekkainfo\TbBoatKekkainfoRepositoryInterface;
use App\Repositories\TbBoatKekka\TbBoatKekkaRepositoryInterface;
use App\Repositories\RensyoKekka\RensyoKekkaRepositoryInterface;

class KyogiCommonService
{
    public $TbBoatSyussou;
    public $TbBoatTyokuzen;
    public $TbBoatRaceheader;
    public $TbBoatKekkainfo;
    public $TbBoatKekka;
    public $RensyoKekka;

    public function __construct(
        TbBoatSyussouRepositoryInterface $TbBoatSyussou,
        TbBoatTyokuzenRepositoryInterface $TbBoatTyokuzen,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader,
        TbBoatKekkainfoRepositoryInterface $TbBoatKekkainfo,
        TbBoatKekkaRepositoryInterface $TbBoatKekka,
        RensyoKekkaRepositoryInterface $RensyoKekka
    ){
        $this->TbBoatSyussou = $TbBoatSyussou;
        $this->TbBoatTyokuzen = $TbBoatTyokuzen;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
        $this->TbBoatKekkainfo = $TbBoatKekkainfo;
        $this->TbBoatKekka = $TbBoatKekka;
        $this->RensyoKekka = $RensyoKekka;
    }


    /**
     * 出走表出力時の6列配列の成形
    */
    public function create_syussou_array($jyo,$target_date,$race_num){
        //選択状態にある日付に紐づく選手6名呼び出し
        $syussou = $this->TbBoatSyussou->getRecordByPK($jyo,$target_date,$race_num);
            
        //選択状態にある日付に紐づく選手6名の直前データを呼び出し
        $tyokuzen = $this->TbBoatTyokuzen->getRecordByPK($jyo,$target_date,$race_num);
        

        //表示用に艇番をキーにして成形、さらにファンデータ用に登録番号リスト作成
        //さらに直前のデータで変更が存在した場合、変更後の値に変換
        $syssou_array = [];
        foreach($syussou as $key => $item){
            
            $syssou_array[$item->TEIBAN] = $item;
            
            if($tyokuzen[$key]->MOTOR_CHANGE_FLG){ //モーターに変更がある
                $syssou_array[$item->TEIBAN]->MOTOR_NO = $tyokuzen[$key]->NEWMOTOR_NO;
                $syssou_array[$item->TEIBAN]->MOTOR2RENTAIRITU = $tyokuzen[$key]->NEWMOTOR_2RENRITU;
            }

            if($tyokuzen[$key]->BOAT_CHANGE_FLG){ //ボートに変更がある
                $syssou_array[$item->TEIBAN]->BOAT_NO = $tyokuzen[$key]->NEWBOAT_NO;
                $syssou_array[$item->TEIBAN]->BOAT_2RENRITU = $tyokuzen[$key]->NEWBOAT_2RENRITU;
            }

            //展示タイム追加
            $syssou_array[$item->TEIBAN]->TENJI_TIME = $tyokuzen[$key]->TENJI_TIME;

            {//出力用にデータ成形 デザイン依存度の高いものは呼び出し元で、改めて成形
                $syssou_array[$item->TEIBAN]->SENSYU_NAME = str_replace("　　"," ", $syssou_array[$item->TEIBAN]->SENSYU_NAME);
                $syssou_array[$item->TEIBAN]->SENSYU_NAME = str_replace("　"," ", $syssou_array[$item->TEIBAN]->SENSYU_NAME);
                $syssou_array[$item->TEIBAN]->RACE_NAME = str_replace("　","", $syssou_array[$item->TEIBAN]->RACE_NAME);
                $syssou_array[$item->TEIBAN]->HOME_TOWN = str_replace("　","", $syssou_array[$item->TEIBAN]->HOME_TOWN);
                //$syssou_array[$item->TEIBAN]->HAYAMI = ($syssou_array[$item->TEIBAN]->HAYAMI)?$syssou_array[$item->TEIBAN]->HAYAMI."<br><span>R</span>":"";
            }

        }
                            
        return $syssou_array;
    }

    public function yusho_tyakujun_to_image($tyakujun,$small_flg=false)
    {
        $array = [
            "1" => "1",
            "2" => "2",
            "3" => "3",
            "4" => "4",
            "5" => "5",
            "6" => "6",
            "F" => "7",
            "L" => "8",
            "転" => "9",
            "落" => "10",
            "欠" => "11",
            "妨" => "12",
            "工" => "13",
            "沈" => "14",
            "失" => "15",
            "不" => "16",
        ];

        if($small_flg){
            $image_serfix = "_s";
            $image_size = "14";
        }else{
            $image_serfix = "";
            $image_size= "14";
        }

        if(isset($array[$tyakujun])){
            return '<img src="/kaisai/images/kako'.$array[$tyakujun].'_y'.$image_serfix . '.png" alt="'.$tyakujun.'" width="'.$image_size.'" height="'.$image_size.'">';
        }else{
            return $tyakujun;
        }
    }

    public function junyu_tyakujun_to_image($tyakujun,$small_flg=false)
    {
        $array = [
            "1" => "1",
            "2" => "2",
            "3" => "3",
            "4" => "4",
            "5" => "5",
            "6" => "6",
            "F" => "7",
            "L" => "8",
            "転" => "9",
            "落" => "10",
            "欠" => "11",
            "妨" => "12",
            "工" => "13",
            "沈" => "14",
            "失" => "15",
            "不" => "16",
        ];

        if($small_flg){
            $image_serfix = "_s";
            $image_size = "14";
        }else{
            $image_serfix = "";
            $image_size= "14";
        }

        if(isset($array[$tyakujun])){
            return '<img src="/kaisai/images/kako'.$array[$tyakujun].'_j'.$image_serfix . '.png" alt="'.$tyakujun.'" width="'.$image_size.'" height="'.$image_size.'">';
        }else{
            return $tyakujun;
        }
    }

    public function yusho_tyakujun_to_image_sp($tyakujun)
    {
        $array = [
            "1" => "1",
            "2" => "2",
            "3" => "3",
            "4" => "4",
            "5" => "5",
            "6" => "6",
            "F" => "7",
            "L" => "8",
            "転" => "9",
            "落" => "10",
            "欠" => "11",
            "妨" => "12",
            "工" => "13",
            "沈" => "14",
            "失" => "15",
            "不" => "16",
        ];

        if(isset($array[$tyakujun])){
            return '<span class="icon_y_'.$array[$tyakujun].'"></span>';
        }else{
            return $tyakujun;
        }
    }

    public function junyu_tyakujun_to_image_sp($tyakujun)
    {
        $array = [
            "1" => "1",
            "2" => "2",
            "3" => "3",
            "4" => "4",
            "5" => "5",
            "6" => "6",
            "F" => "7",
            "L" => "8",
            "転" => "9",
            "落" => "10",
            "欠" => "11",
            "妨" => "12",
            "工" => "13",
            "沈" => "14",
            "失" => "15",
            "不" => "16",
        ];

        if(isset($array[$tyakujun])){
            return '<span class="icon_j_'.$array[$tyakujun].'"></span>';
        }else{
            return $tyakujun;
        }
    }

    function getNeerOzzRaceNumber($jyo,$target_date,$target_time){
        //objBoatData.getNeerOzzRaceNumber() の再現↓
        $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);

        //直近オッズレース番号
        $neer_ozz_race_number = 0;
        $plus_minute  = 0; //差分計算用変数
        $minus_minute = 1; //差分計算用変数
        $lag = $plus_minute - $minus_minute;
        if($race_header){
            for($i=1;$i<=12;$i++){
                $prop_name = "SIMEKIRI_JIKOKU".$i."R";
                if($race_header->$prop_name){
                    $true_time = date('Hi',strtotime( $lag .' minute',strtotime($target_date.$target_time)));
                    if($true_time < $race_header->$prop_name){
                        $neer_ozz_race_number = $i;
                        break;
                    }
                }
            }
        }
        //objBoatData.getNeerOzzRaceNumber() の再現↑

        return $neer_ozz_race_number;
    }

    
    function getNeerOzzRaceNumber8pun($jyo,$target_date,$target_time){
        //objBoatData.getNeerOzzRaceNumber() の再現↓
        $race_header = $this->TbBoatRaceheader->getFirstRecordByPK($jyo,$target_date);

        //直近オッズレース番号
        $neer_ozz_race_number = 0;
        $plus_minute  = 6; //差分計算用変数
        $minus_minute = 0; //差分計算用変数
        $lag = $plus_minute - $minus_minute;
        if($race_header){
            for($i=1;$i<=12;$i++){
                $prop_name = "SIMEKIRI_JIKOKU".$i."R";
                if($race_header->$prop_name){
                    $true_time = date('Hi',strtotime( $lag .' minute',strtotime($target_date.$target_time)));
                    if($true_time < $race_header->$prop_name){
                        $neer_ozz_race_number = $i;
                        break;
                    }
                }
            }
        }
        //objBoatData.getNeerOzzRaceNumber() の再現↑

        return $neer_ozz_race_number;
    }

    function getNeerKekkaRaceNumber($jyo,$target_date){
        //objBoatData.getNeerKekkaRaceNumber() の再現↓
        $kekka_info = $this->TbBoatKekkainfo->getLastRaceNumberRecordByPK($jyo,$target_date);
        if($kekka_info){
            $neer_kekka_race_number = $kekka_info->RACE_NUMBER;
        }else{
            $neer_kekka_race_number = 0;
        }
        //objBoatData.getNeerKekkaRaceNumber() の再現↑
        return $neer_kekka_race_number;
    }

    function getNeerKekkaRaceNumberTfinfo($jyo,$target_date){
        //objBoatData.getNeerKekkaRaceNumberTfinfo() の再現↓
        $rensyo_kekka = $this->RensyoKekka->getFirstRecordForFront($jyo,$target_date);
        if($rensyo_kekka){
            $neer_kekka_race_number_tfinfo = $rensyo_kekka->レース番号;
        }else{
            $neer_kekka_race_number_tfinfo = 0;
        }
        //objBoatData.getNeerKekkaRaceNumberTfinfo() の再現↑
        return $neer_kekka_race_number_tfinfo;
    }

    
}