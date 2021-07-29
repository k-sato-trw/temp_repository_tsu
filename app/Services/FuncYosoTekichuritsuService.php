<?php

namespace App\Services;

use App\Repositories\TbBoatKekkainfo\TbBoatKekkainfoRepositoryInterface;
use App\Services\FuncYoso3RentanChangeService;

class FuncYosoTekichuritsuService
{

    public $TbBoatKekkainfo;
    public $FuncYoso3RentanChange;


    public function __construct(
        TbBoatKekkainfoRepositoryInterface $TbBoatKekkainfo,
        FuncYoso3RentanChangeService $FuncYoso3RentanChange
    ){
        $this->TbBoatKekkainfo = $TbBoatKekkainfo;
        $this->FuncYoso3RentanChange = $FuncYoso3RentanChange;
    }

    //予想的中率計算

    public function FuncYosoTekichuritsu($yoso_tenji,$type){
        /*
            $YOSO_TENJI　対象予想展示データ1レコード分

        */

        //■■予想的中率処理↓
        {

            //3連単着順有のレースで抽出
            //初期化
            $strTempData = "000";		//枠番
            $strTempData2 = "000";	//枠番同着
            $intTempData = 0;			//払い戻し金
            $intTempData2 = 0;		//払い戻し金同着

            $kekka_info = $this->TbBoatKekkainfo->getRecordForKishaTenji($yoso_tenji->JYO,$yoso_tenji->TARGET_DATE,$yoso_tenji->RACE_NUM);
            
            $data['kekka_info'] = $kekka_info;

            if($kekka_info){
                if(strpos($kekka_info->SANRENTAN1 , 'MS') !== false){
                    //不成立
                    $strTempData = "999";
                }else{
                    //成立

                    $strTempData = $kekka_info->SANRENTAN1;
                    $intTempData = $kekka_info->SANRENTAN_MONEY1;

                    //同着加味
                    if($kekka_info->SANRENTAN2){
                        $strTempData2 = $kekka_info->SANRENTAN2;
                        $intTempData2 = $kekka_info->SANRENTAN_MONEY2;
                    }

                }
            }


            //3連単変換用の処理
            $strAryTenjiEvaluation =[];
            $strAryYosoMark =[];
            $strAryYoso =[];
            if($yoso_tenji){
               
                for($intLoopCount2 = 1;$intLoopCount2 <= 6;$intLoopCount2++){
                    $prop_name = 'EVALUATION'.$intLoopCount2;
                    $strAryTenjiEvaluation[$intLoopCount2] = $yoso_tenji->$prop_name;
                }

                $strComment = $yoso_tenji->COMMENT;

                for($intLoopCount2 = 1;$intLoopCount2 <= 2;$intLoopCount2++){

                    for($intLoopCount3 = 1;$intLoopCount3 <= 2;$intLoopCount3++){

                        $intLoopCount4 = 1;
                        $prop_name = 'FAVOLITE_MARK'.$intLoopCount2.$intLoopCount3;
                        $strAryYosoMark[$intLoopCount2][$intLoopCount3][$intLoopCount4] = $yoso_tenji->$prop_name;

                        $intLoopCount4 = 2;
                        $prop_name = 'RICH_MARK'.$intLoopCount2.$intLoopCount3;
                        $strAryYosoMark[$intLoopCount2][$intLoopCount3][$intLoopCount4] = $yoso_tenji->$prop_name;

                    }

                    for($intLoopCount3 = 1;$intLoopCount3 <= 3;$intLoopCount3++){

                        for($intLoopCount4 = 1;$intLoopCount4 <= 3;$intLoopCount4++){

                            $intLoopCount5 = 1;
                            $prop_name = 'FAVOLITE'.$intLoopCount2.$intLoopCount3.$intLoopCount4;
                            $strAryYoso[$intLoopCount2][$intLoopCount3][$intLoopCount4][$intLoopCount5] = $yoso_tenji->$prop_name;
                            
                            $intLoopCount5 = 2;
                            $prop_name = 'RICH'.$intLoopCount2.$intLoopCount3.$intLoopCount4;
                            $strAryYoso[$intLoopCount2][$intLoopCount3][$intLoopCount4][$intLoopCount5] = $yoso_tenji->$prop_name;

                        }

                    }
                }
               
            }

            $strAryYosoKumi = [];
            
            $strAryYosoKumi = $this->FuncYoso3RentanChange->FuncYoso3RentanChange( $type , $strAryYoso , $strAryYosoMark ,$strAryYosoKumi);

        }
        //■■予想的中率処理↑

        return $strAryYosoKumi;

    }

        
}