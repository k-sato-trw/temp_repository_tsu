<?php

namespace App\Repositories\TbTsuYosoHighlight;

use App\Models\TbTsuYosoHighlight;

class TbTsuYosoHighlightRepository implements TbTsuYosoHighlightRepositoryInterface
{
    protected $TbTsuYosoHighlight;

    /**
    * @param object $TbTsuYosoHighlight
    */
    public function __construct(TbTsuYosoHighlight $TbTsuYosoHighlight)
    {
        $this->TbTsuYosoHighlight = $TbTsuYosoHighlight;
    }

    /**
     * 管理サイト表示用　指定日付のデータを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getFirstRecordByDate($target_date)
    {
        return $this->TbTsuYosoHighlight
                    ->where('TARGET_DATE','=',$target_date)
                    ->first();
    }


    /**
     * アップサート処理
     *
     * @var object  $request
     * @return object
     */
    public function upsertRecord($request)
    {
        //既存データ確認
        {
            $exist = $this->TbTsuYosoHighlight
                    ->where('TARGET_DATE','=',$request->input('TARGET_DATE'))
                    ->first();
        }

        $new_datetime = date('YmdHis');

        if($exist){

            //編集
            $affected = $this->TbTsuYosoHighlight
                        ->where([
                            'JYO' => config('const.JYO_CODE'),
                            'TARGET_DATE' => $request->input('TARGET_DATE'),
                        ])
                        ->update([
                            'HEAD' => $request->input('HEAD'),
                            'TEXT' => $request->input('TEXT'),
                            'TOUBAN1' => $request->input('TOUBAN1'),
                            'TOUBAN2' => $request->input('TOUBAN2'),
                            'TOUBAN3' => $request->input('TOUBAN3'),
                            'TOUBAN4' => $request->input('TOUBAN4'),
                            'UPDATE_TIME' => $new_datetime,
                        ]);
        }else{

            //新規作成
            $affected = $this->TbTsuYosoHighlight
                        ->insert([
                            'JYO' => config('const.JYO_CODE'),
                            'TARGET_DATE' => $request->input('TARGET_DATE'),
                            'HEAD' => $request->input('HEAD'),
                            'TEXT' => $request->input('TEXT'),
                            'TOUBAN1' => $request->input('TOUBAN1'),
                            'TOUBAN2' => $request->input('TOUBAN2'),
                            'TOUBAN3' => $request->input('TOUBAN3'),
                            'TOUBAN4' => $request->input('TOUBAN4'),
                            'APPEAR_FLG' => 0,
                            'RESIST_TIME' => $new_datetime,
                            'UPDATE_TIME' => $new_datetime,
                        ]);
        }

        return $affected;
    }


    /**
     * 一定範囲の日付のデータを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getRecordBitweenDate($jyo,$start_date,$end_date)
    {
        return $this->TbTsuYosoHighlight
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','>=',$start_date)
                    ->where('TARGET_DATE','<=',$end_date)
                    ->where('APPEAR_FLG','1')
                    ->orderBy('TARGET_DATE','DESC')
                    ->get();
    }

    /**
     * フロント表示用　指定日付のデータを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $is_preview
     * @return object
     */
    public function getFirstRecordForFront($jyo,$target_date,$is_preview = false)
    {
        $query = $this->TbTsuYosoHighlight
                    ->where('JYO','=',$jyo)
                    ->where('TARGET_DATE','=',$target_date);

        if(!$is_preview){
            $query->where('APPEAR_FLG','1');
        }
                    
        return $query->orderBy('TARGET_DATE','DESC')
                    ->first();
    }

    
    /**
     * SPフロント表示用　節間日付のデータを全て取得
     *
     * @var string $jyo
     * @var array $target_date_list
     * @var string $is_preview
     * @return object
     */
    public function getRecordForFront($jyo,$target_date_list,$is_preview = false)
    {
        $query = $this->TbTsuYosoHighlight
                    ->where('JYO','=',$jyo)
                    ->whereIn('TARGET_DATE',$target_date_list);

        if(!$is_preview){
            $query->where('APPEAR_FLG','1');
        }
                    
        return $query->orderBy('TARGET_DATE','DESC')
                    ->get();
    }


    /**
     * 公開フラグ変更
     *
     * @var object $request
     * @return object
     */
    public function changeAppearFlg($request)
    {
        $new_datetime = date('YmdHis');

        return $this->TbTsuYosoHighlight
                    ->where('TARGET_DATE', $request->input('TARGET_DATE'))
                    ->update([
                        'APPEAR_FLG' => $request->input('APPEAR_FLG'),
                        'UPDATE_TIME' => $new_datetime,
                    ]);
    }


    /**
     * コピー自動処理用呼び出し　翌日データが無い場合、今日用のデータを明日にコピーする
     *
     * @var string $target_date
     * @var string $tomorrow_date
     * @return object
     */
    public function copyTomorrow($target_date,$tomorrow_date)
    {
        $result = false;
        $new_datetime = date('YmdHis');
        $yoso_highlight = $this->TbTsuYosoHighlight
                    ->where('TARGET_DATE','=',$target_date)
                    ->get();
        
        foreach($yoso_highlight as $item){
        
            $exist = $this->TbTsuYosoHighlight
                        ->where('TARGET_DATE', $tomorrow_date)
                        ->first();
            
            //明日無い場合コピー
            if(!$exist){
                $result = $this->TbTsuYosoHighlight->insert([
                    'JYO' => config('const.JYO_CODE'),
                    'TARGET_DATE' => $tomorrow_date,
                    'HEAD' => $item->HEAD,
                    'TEXT' => $item->TEXT,
                    'TOUBAN1' => $item->TOUBAN1,
                    'TOUBAN2' => $item->TOUBAN2,
                    'TOUBAN3' => $item->TOUBAN3,
                    'TOUBAN4' => $item->TOUBAN4,
                    'APPEAR_FLG' => 0,
                    'RESIST_TIME' => $new_datetime,
                    'UPDATE_TIME' => $new_datetime,
                ]);
            }
        }

        return $result;
    }    

}