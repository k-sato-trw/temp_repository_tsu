<?php

namespace App\Services;

class FuncYoso3RentanChangeService
{
    //3連単予想変換丸写し

    public static function FuncYoso3RentanChange( $argdata , $strAryYoso ,$strAryYosoMark ,$strAryYosoKumi){
        //予想データ3連単変換

        for($intLoopCount2 = 1;$intLoopCount2 <= 2;$intLoopCount2++){
            //1件目、2件目

            $strTempMae = "";

            if( $strAryYosoMark[$intLoopCount2][1][$argdata] == "1" || $strAryYosoMark[$intLoopCount2][1][$argdata] == "3" || $strAryYosoMark[$intLoopCount2][1][$argdata] == "5" ){
                // - または < または <-

                if( $strAryYosoMark[$intLoopCount2][2][$argdata] == "1" || $strAryYosoMark[$intLoopCount2][2][$argdata] == "3" || $strAryYosoMark[$intLoopCount2][2][$argdata] == "5" ){
                    // - または < または <-

                    //前-中-後
					$strAryYosoKumi = self::FuncYosoPattern1($argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi);

                }elseif($strAryYosoMark[$intLoopCount2][2][$argdata] == "2"){
                    // =

                    //前-中-後
                    $strAryYosoKumi = self::FuncYosoPattern1($argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi);

                    //前-後-中(中と後が入れ替わるパターン）
                    $strAryYosoKumi = self::FuncYosoPattern2($argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi);

                }elseif($strAryYosoMark[$intLoopCount2][2][$argdata] == "9"){
                    // 流
                    
                    //前-中-流
                    $strAryYosoKumi = self::FuncYosoPattern4($argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi);

                }

            }elseif($strAryYosoMark[$intLoopCount2][1][$argdata] == "2"){
                // =
                if( $strAryYosoMark[$intLoopCount2][2][$argdata] == "1" || $strAryYosoMark[$intLoopCount2][2][$argdata] == "3" || $strAryYosoMark[$intLoopCount2][2][$argdata] == "5" ){
                    // - または < または <-

                    //前-中-後
					$strAryYosoKumi = self::FuncYosoPattern1($argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi);

                    //中-前-後(前と中が入れ替わるパターン）
					$strAryYosoKumi = self::FuncYosoPattern3($argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi);

                }elseif($strAryYosoMark[$intLoopCount2][2][$argdata] == "2"){
                    // =
                    
					//前-中-後
					$strAryYosoKumi = self::FuncYosoPattern1($argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi);

					//中-前-後(前と中が入れ替わるパターン）
					$strAryYosoKumi = self::FuncYosoPattern3($argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi);

					//前-後-中(中と後が入れ替わるパターン）
					$strAryYosoKumi = self::FuncYosoPattern2($argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi);

                }elseif($strAryYosoMark[$intLoopCount2][2][$argdata] == "9"){
                    // 流

					//前-中-流
					$strAryYosoKumi = self::FuncYosoPattern4($argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi);
                    
					//中-前-流
					$strAryYosoKumi = self::FuncYosoPattern5($argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi);
                }

            }elseif($strAryYosoMark[$intLoopCount2][1][$argdata] == "8"){
                // B
                
                //ボックス
                $strAryYosoKumi = self::FuncYosoPattern6($argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi);
                
            }elseif($strAryYosoMark[$intLoopCount2][1][$argdata] == "9"){
                // 流

                if( $strAryYosoMark[$intLoopCount2][2][$argdata] == "1" || $strAryYosoMark[$intLoopCount2][2][$argdata] == "3" || $strAryYosoMark[$intLoopCount2][2][$argdata] == "5" ){
                    // - または < または <-

                    //前-流-後
					$strAryYosoKumi = self::FuncYosoPattern7($argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi);
                
                }elseif($strAryYosoMark[$intLoopCount2][2][$argdata] == "2"){
                    // =

                    //前-流-後
					$strAryYosoKumi = self::FuncYosoPattern7($argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi);

                    //前-後-流
					$strAryYosoKumi = self::FuncYosoPattern8($argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi);

                }elseif($strAryYosoMark[$intLoopCount2][2][$argdata] == "9"){
                    // 流

                    //前-流-流
					$strAryYosoKumi = self::FuncYosoPattern9($argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi);

                }

            }

        }

        return $strAryYosoKumi;
    }
    
    public static function FuncYosoPattern1( $argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi){
        //※元コードでは、intLoopCount2がグローバル変数として使われている模様

        //予想パターン1
        //前-中-後

		//前
        $strTempMae = $strAryYoso[$intLoopCount2][1][1][$argdata];

        for($intLoopCount5 = 1;$intLoopCount5 <= 3;$intLoopCount5++){
            //中
			$strTempNaka = $strAryYoso[$intLoopCount2][$intLoopCount5][2][$argdata];

            for($intLoopCount4 = 1;$intLoopCount4 <= 3;$intLoopCount4++){
                
                //後
				$strTempAto = $strAryYoso[$intLoopCount2][$intLoopCount4][3][$argdata];
                
                if($strTempMae != "" && $strTempNaka != "" && $strTempAto != ""){
                    //全て揃っている

                    if($strTempMae != $strTempNaka && $strTempMae != $strTempAto && $strTempNaka != $strTempAto){
                        //全て違う値

                        if(!in_array($strTempMae.$strTempNaka.$strTempAto, $strAryYosoKumi[$argdata] ?? [] )){
                            //被りデータ無

                            //予想データ代入
                            $strAryYosoKumi[$argdata][] = $strTempMae.$strTempNaka.$strTempAto;
                        }
                    }
                }
            }
        }

        return $strAryYosoKumi;
    }

    
    public static function FuncYosoPattern2( $argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi){
        //予想パターン2
        //前-後-中(中と後が入れ替わるパターン）

		//前
        $strTempMae = $strAryYoso[$intLoopCount2][1][1][$argdata];

        for($intLoopCount5 = 1;$intLoopCount5 <= 3;$intLoopCount5++){
            //中
			$strTempNaka = $strAryYoso[$intLoopCount2][$intLoopCount5][3][$argdata];

            for($intLoopCount4 = 1;$intLoopCount4 <= 3;$intLoopCount4++){
                
                //後
				$strTempAto = $strAryYoso[$intLoopCount2][$intLoopCount4][2][$argdata];
                
                if($strTempMae != "" && $strTempNaka != "" && $strTempAto != ""){
                    //全て揃っている

                    if($strTempMae != $strTempNaka && $strTempMae != $strTempAto && $strTempNaka != $strTempAto){
                        //全て違う値

                        if(!in_array($strTempMae.$strTempNaka.$strTempAto, $strAryYosoKumi[$argdata]  ?? [] )){
                            //被りデータ無

                            //予想データ代入
                            $strAryYosoKumi[$argdata][] = $strTempMae.$strTempNaka.$strTempAto;
                        }
                    }
                }
            }
        }

        return $strAryYosoKumi;
    }

    public static function FuncYosoPattern3( $argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi){
        //予想パターン3
        //中-前-後(前と中が入れ替わるパターン）

		//中
        $strTempNaka = $strAryYoso[$intLoopCount2][1][1][$argdata];

        for($intLoopCount5 = 1;$intLoopCount5 <= 3;$intLoopCount5++){
            
            //前
			$strTempMae = $strAryYoso[$intLoopCount2][$intLoopCount5][2][$argdata];

            for($intLoopCount4 = 1;$intLoopCount4 <= 3;$intLoopCount4++){
                
                //後
				$strTempAto = $strAryYoso[$intLoopCount2][$intLoopCount4][3][$argdata];
                
                if($strTempMae != "" && $strTempNaka != "" && $strTempAto != ""){
                    //全て揃っている

                    if($strTempMae != $strTempNaka && $strTempMae != $strTempAto && $strTempNaka != $strTempAto){
                        //全て違う値

                        if(!in_array($strTempMae.$strTempNaka.$strTempAto, $strAryYosoKumi[$argdata]  ?? [] )){
                            //被りデータ無

                            //予想データ代入
                            $strAryYosoKumi[$argdata][] = $strTempMae.$strTempNaka.$strTempAto;
                        }
                    }
                }
            }
        }

        return $strAryYosoKumi;
    }


    public static function FuncYosoPattern4( $argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi){
        //予想パターン4
        //前-中-流

        //前
        $strTempMae = $strAryYoso[$intLoopCount2][1][1][$argdata];

        for($intLoopCount5 = 1;$intLoopCount5 <= 3;$intLoopCount5++){
            
            //中
            $strTempNaka = $strAryYoso[$intLoopCount2][$intLoopCount5][2][$argdata];

            for($intLoopCount4 = 1;$intLoopCount4 <= 6;$intLoopCount4++){
                
                //後
                $strTempAto = $intLoopCount4;
                
                if($strTempMae != "" && $strTempNaka != "" && $strTempAto != ""){
                    //全て揃っている

                    if($strTempMae != $strTempNaka && $strTempMae != $strTempAto && $strTempNaka != $strTempAto){
                        //全て違う値

                        if(!in_array($strTempMae.$strTempNaka.$strTempAto, $strAryYosoKumi[$argdata]  ?? [] )){
                            //被りデータ無

                            //予想データ代入
                            $strAryYosoKumi[$argdata][] = $strTempMae.$strTempNaka.$strTempAto;
                        }
                    }
                }
            }
        }

        return $strAryYosoKumi;
    }

    public static function FuncYosoPattern5( $argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi){
        //予想パターン5
        //中-前-流

        //中
        $strTempNaka = $strAryYoso[$intLoopCount2][1][1][$argdata];

        for($intLoopCount5 = 1;$intLoopCount5 <= 3;$intLoopCount5++){
            
            //前
            $strTempMae = $strAryYoso[$intLoopCount2][$intLoopCount5][2][$argdata];

            for($intLoopCount4 = 1;$intLoopCount4 <= 6;$intLoopCount4++){
                
                //後
                $strTempAto = $intLoopCount4;
                
                if($strTempMae != "" && $strTempNaka != "" && $strTempAto != ""){
                    //全て揃っている

                    if($strTempMae != $strTempNaka && $strTempMae != $strTempAto && $strTempNaka != $strTempAto){
                        //全て違う値

                        if(!in_array($strTempMae.$strTempNaka.$strTempAto, $strAryYosoKumi[$argdata]  ?? [] )){
                            //被りデータ無

                            //予想データ代入
                            $strAryYosoKumi[$argdata][] = $strTempMae.$strTempNaka.$strTempAto;
                        }
                    }
                }
            }
        }

        return $strAryYosoKumi;
    }

    public static function FuncYosoPattern6( $argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi){
        //予想パターン6
        //ボックス

        if($strAryYoso[$intLoopCount2][1][2][$argdata] != "" && $strAryYoso[$intLoopCount2][2][2][$argdata] != "" && $strAryYoso[$intLoopCount2][3][2][$argdata] != ""){
            //全てデータ有

            for($intLoopCount5 = 1;$intLoopCount5 <= 3;$intLoopCount5++){

                for($intLoopCount4 = 1;$intLoopCount4 <= 3;$intLoopCount4++){

                    for($intLoopCount6 = 1;$intLoopCount6 <= 3;$intLoopCount6++){

                        $strTempMae = $strAryYoso[$intLoopCount2][$intLoopCount5][2][$argdata];
						$strTempNaka = $strAryYoso[$intLoopCount2][$intLoopCount4][2][$argdata];
						$strTempAto = $strAryYoso[$intLoopCount2][$intLoopCount6][2][$argdata];

                        if($strTempMae != $strTempNaka && $strTempMae != $strTempAto && $strTempNaka != $strTempAto){
                            //全て違う値

                            if(!in_array($strTempMae.$strTempNaka.$strTempAto, $strAryYosoKumi[$argdata]  ?? [] )){
                                //被りデータ無

                                //予想データ代入
                                $strAryYosoKumi[$argdata][] = $strTempMae.$strTempNaka.$strTempAto;
                            }
                        }
                    }
                }
            }

        }
        
        return $strAryYosoKumi;
    }

    public static function FuncYosoPattern7( $argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi){
        //予想パターン7
        //前-流-後

        //前
        $strTempMae = $strAryYoso[$intLoopCount2][1][1][$argdata];

        for($intLoopCount5 = 1;$intLoopCount5 <= 6;$intLoopCount5++){
            
            //中
            $strTempNaka = $intLoopCount5;

            for($intLoopCount4 = 1;$intLoopCount4 <= 3;$intLoopCount4++){
                
                //後
                $strTempAto =  $strAryYoso[$intLoopCount2][$intLoopCount4][3][$argdata];
                
                if($strTempMae != "" && $strTempNaka != "" && $strTempAto != ""){
                    //全て揃っている

                    if($strTempMae != $strTempNaka && $strTempMae != $strTempAto && $strTempNaka != $strTempAto){
                        //全て違う値

                        if(!in_array($strTempMae.$strTempNaka.$strTempAto, $strAryYosoKumi[$argdata]  ?? [] )){
                            //被りデータ無

                            //予想データ代入
                            $strAryYosoKumi[$argdata][] = $strTempMae.$strTempNaka.$strTempAto;
                        }
                    }
                }
            }
        }

        return $strAryYosoKumi;
    }

    public static function FuncYosoPattern8( $argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi){
        //予想パターン8
        //前-後-流

        //前
        $strTempMae = $strAryYoso[$intLoopCount2][1][1][$argdata];

        for($intLoopCount5 = 1;$intLoopCount5 <= 6;$intLoopCount5++){
            
            //後
            $strTempAto = $intLoopCount5;

            for($intLoopCount4 = 1;$intLoopCount4 <= 3;$intLoopCount4++){
                
                //中
                $strTempNaka =  $strAryYoso[$intLoopCount2][$intLoopCount4][3][$argdata];
                
                if($strTempMae != "" && $strTempNaka != "" && $strTempAto != ""){
                    //全て揃っている

                    if($strTempMae != $strTempNaka && $strTempMae != $strTempAto && $strTempNaka != $strTempAto){
                        //全て違う値

                        if(!in_array($strTempMae.$strTempNaka.$strTempAto, $strAryYosoKumi[$argdata]  ?? [] )){
                            //被りデータ無

                            //予想データ代入
                            $strAryYosoKumi[$argdata][] = $strTempMae.$strTempNaka.$strTempAto;
                        }
                    }
                }
            }
        }

        return $strAryYosoKumi;
    }

    public static function FuncYosoPattern9( $argdata , $intLoopCount2 , $strAryYoso ,$strAryYosoKumi){
        //予想パターン9
        //前-流-流

        //前
        $strTempMae = $strAryYoso[$intLoopCount2][1][1][$argdata];

        for($intLoopCount5 = 1;$intLoopCount5 <= 6;$intLoopCount5++){
            
            //中
            $strTempNaka = $intLoopCount5;

            for($intLoopCount4 = 1;$intLoopCount4 <= 6;$intLoopCount4++){
                
                //後
                $strTempAto =  $intLoopCount4;
                
                if($strTempMae != "" && $strTempNaka != "" && $strTempAto != ""){
                    //全て揃っている

                    if($strTempMae != $strTempNaka && $strTempMae != $strTempAto && $strTempNaka != $strTempAto){
                        //全て違う値

                        if(!in_array($strTempMae.$strTempNaka.$strTempAto, $strAryYosoKumi[$argdata]  ?? [] )){
                            //被りデータ無

                            //予想データ代入
                            $strAryYosoKumi[$argdata][] = $strTempMae.$strTempNaka.$strTempAto;
                        }
                    }
                }
            }
        }

        return $strAryYosoKumi;
    }
}