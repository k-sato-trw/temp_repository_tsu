<?php

namespace App\Services\AdminSekosya;

use App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface;
use App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface;
use App\Repositories\TbTsuInformation\TbTsuInformationRepositoryInterface;
use App\Repositories\TbTsuTokutenritu\TbTsuTokutenrituRepositoryInterface;

class TokutenService
{
    public $KaisaiMaster;
    public $TbBoatRaceheader;
    public $TbTsuInformation;
    public $TbTsuTokutenritu;

    public function __construct(
        KaisaiMasterRepositoryInterface $KaisaiMaster,
        TbBoatRaceheaderRepositoryInterface $TbBoatRaceheader,
        TbTsuInformationRepositoryInterface $TbTsuInformation,
        TbTsuTokutenrituRepositoryInterface $TbTsuTokutenritu
    ){
        $this->KaisaiMaster = $KaisaiMaster;
        $this->TbBoatRaceheader = $TbBoatRaceheader;
        $this->TbTsuInformation = $TbTsuInformation;
        $this->TbTsuTokutenritu = $TbTsuTokutenritu;
    }


    public function index($request){
        $data = [];

        $now_date = date("Ymd");
        $data['now_date'] = $now_date;

        $kaisai_master = $this->KaisaiMaster->getFirstRecordByDateBitween(config('const.JYO_CODE'),$now_date);
        
        $data['kaisai_start_date'] = $kaisai_master->開始日付 ?? 0;
        $data['kaisai_end_date'] = $kaisai_master->終了日付 ?? 0;
        $data['kaisai_title'] = $kaisai_master->開催名称 ?? "";


        if($request->isMethod('post')){
            //POST処理

            $keisai_date = $request->input('keisai');

            //CSV保存処理
            {
                $file_names = [];
                
                //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
                $target_path = public_path(config('const.CSV_PATH.TOKUTEN'));

                $file = $request->file1;
                    
                //保存するファイルに名前をつける    
                $file_names[] = $file->getClientOriginalName();
                $file->move($target_path,$file_names[0]);

                if($request->file2){
                    $file = $request->file2;
                    
                    //保存するファイルに名前をつける    
                    $file_names[] = $file->getClientOriginalName();
                    $file->move($target_path,$file_names[1]);
                }

            }

            // 男女Wの時2ファイル確認する
            //CSVの読み込み数が変わる
            $insert_query = [];

            try {

                foreach($file_names as $key => $file_name){
                //CSVデータを読み込み
                
                    // ファイルの読み込み
                    $file = new \SplFileObject($target_path.$file_name);
                    
                    $file->setFlags(
                        \SplFileObject::READ_CSV |           // CSV 列として行を読み込む
                        \SplFileObject::READ_AHEAD |       // 先読み/巻き戻しで読み出す。
                        \SplFileObject::SKIP_EMPTY |         // 空行は読み飛ばす
                        \SplFileObject::DROP_NEW_LINE    // 行末の改行を読み飛ばす
                    );
            
                    // 読み込んだCSVデータをループ
                    
                    foreach ($file as $line_count =>  $line) {
                        if($line_count >= 11){

                            if(count($line) > 10){  //少なくとも配列10以上ある時データあり 未満の場合エラー

                                // 文字コードを UTF-8 へ変換
                                mb_convert_variables('UTF-8', 'sjis-win', $line);
                                $now_datetime = date("YmdHi");

                                /*
                                    順位 0
                                    登番 1
                                    得点率　4　数字ではない場合"-" // 備考2に賞除他
                                    出走回数 6
                                    得点 7 少数第一位
                                    減点 8 少数第一位
                                    得点合計 9 少数第一位
                                    備考 34
                                */
                                $row = [
                                    "TARGET_DATE" => $request->input('keisai'),
                                    "TOUBAN" => $line[1],
                                    "DISP_NO" => $line_count + 1,
                                    "RANK" => $line[0],
                                    "SYUSSOU_COUNT" => $line[6],
                                    "TOKUTEN" => (int)$line[7],
                                    "GENTEN" => (int)$line[8],
                                    "TOKUTEN_TOTAL" => (int)$line[9],
                                    "BIKOU" => $line[34],
                                    "UP_FILENAME" => $file_name,
                                    "APPEAR_FLG" => 0,
                                    "RESIST_TIME" => $now_datetime,
                                    "UPDATE_TIME" => $now_datetime,
                                ];

                                // 得点率の処理
                                if(is_numeric($line[4])){
                                    $row['TOKUTENRITU'] = $line[4];
                                    $row['BIKOU2'] = "";
                                }else{
                                    $row['TOKUTENRITU'] = "-";
                                    $row['BIKOU2'] = $line[4];
                                }

                                if(count($file_names) == 2){
                                    //男女W
                                    $row['TYPE'] = $key + 1;
                                }else{
                                    $row['TYPE'] = 0;
                                }

                                $insert_query[] = $row;
                            }else{
                                throw new \Exception('データの形式が正しくありません');
                            }
                        }
                        
                    }
                }

                //同日日付データを削除
                $this->TbTsuTokutenritu->deleteRecordByDate($keisai_date);
                
                //複数行DB登録
                $post_result = $this->TbTsuTokutenritu->insertRecord($insert_query);
                
                $data['post_result'] = $post_result;
                $data['redirect_url'] = 'admin_sekosya/tokuten/';
                if($post_result){
                    $data['redirect_message'] = '同日データを消去し、CSVデータをインポートしました。';
                }else{
                    $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
                }

            }catch (\Exception  $e) {
                //DB::rollback();
                //unlink($this->csvFilePath);
                throw $e;
            }

        }

        return $data;
    }

    public function change_appear_flg($appear_flg ,$request){

        $data['redirect_url'] = 'admin_sekosya/tokuten/';

        if($request->isMethod('post')){
            //POST処理
            $keisai_date = $request->input('keisai');

            $post_result = $this->TbTsuTokutenritu->changeAppearFlg($keisai_date,$appear_flg);

            $data['post_result'] = $post_result;
            if($post_result){
                $data['redirect_message'] = '指定の日付データの掲載フラグを変更しました';
            }else{
                $data['redirect_message'] = '掲載フラグの変更に失敗しました';
            }
        }
        
        return $data;
    }



}