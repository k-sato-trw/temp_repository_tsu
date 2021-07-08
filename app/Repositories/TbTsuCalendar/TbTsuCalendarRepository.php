<?php

namespace App\Repositories\TbTsuCalendar;

use App\Models\TbTsuCalendar;

class TbTsuCalendarRepository implements TbTsuCalendarRepositoryInterface
{
    protected $TbTsuCalendar;

    /**
    * @param object $TbTsuCalendar
    */
    public function __construct(TbTsuCalendar $TbTsuCalendar)
    {
        $this->TbTsuCalendar = $TbTsuCalendar;
    }

    
    /**
     * 日付文字列とモード判定で重複データチェック
     *
     * @var string $target_date
     * @var string $mode
     * @var int $line
     * @var int $id
     * @return int
     */
    public function checkDuplicate($target_date,$mode,$line,$id)
    {
        $check = $this->TbTsuCalendar
            ->where('START_DATE' , '<=' ,$target_date)
            ->where('END_DATE' , '>=' ,$target_date);
        
        if($id){ //IDが存在する場合EDITなので、同一IDは除外
            $check->where('ID' , '!=' ,$id);
        }
        
        if($mode == "honjyo"){
            $check->where('TYPE','=',1);
            $check->where('JYO','=','09');
        }elseif($mode == "honjyonai"){
            $check->where('TYPE','=',3);
            $check->where('VIEW_LINE','=',$line);
            $check->whereIn('JYO',["01","02","03","04","05","06","07","08","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24",]);
        }elseif($mode == "tv"){
            $check->where('TYPE','=',2);
            $check->whereIn('JYO',["31","32","33","34","35","36","37","38"]);
        }elseif($mode == "sotomuke"){
            $check->where('TYPE','=',4);
            $check->where('VIEW_LINE','=',$line);
            $check->whereIn('JYO',["01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24",]);
        }elseif($mode == "event_fan"){
            $check->where('TYPE','=',5);
        }elseif($mode == "close"){
            $check->where('JYO','=','99');
        }

        return $check->count();
    }

    /**
     * 最大IDのレコードを取得
     *
     * @return object
     */
    public function getLastRecord()
    {
        return $this->TbTsuCalendar
                    ->orderBy('ID', 'desc')
                    ->first();
    }
    

    

    /**
     * 全レコードをページネイトで取得
     *
     * @var string $pre_page
     * @return object
     */
    public function getAllRecord($pre_page)
    {
        return $this->TbTsuCalendar
                    ->orderBy('ID', 'desc')
                    ->paginate($pre_page);
    }

    /**
     * IDで1レコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordByPK($id)
    {
        return $this->TbTsuCalendar
                    ->where('ID','=',$id)
                    ->first();
    }

    /**
     * カレンダーの1ライン分を取得
     *
     * @var int $type
     * @var int $line_count
     * @var array $jyo_array
     * @var array $race_type_array
     * @var string $now_year
     * @var string $now_month
     * @return object
     */
    public function getLine(
        $type,
        $line_count,
        $jyo_array,
        $race_type_array,
        $now_year,
        $now_month
    )
    {

        $holdentry = $this->TbTsuCalendar
            ->where('TYPE','=',$type)
            ->where('VIEW_LINE','=',$line_count);

        if($jyo_array){
            $holdentry->whereIn('JYO',$jyo_array);
        }
        if($race_type_array){
            $holdentry->whereIn('RACE_TYPE',$race_type_array);
        }

        $holdentry = $holdentry->where(function($query) use($now_year,$now_month) {
            $query->where('START_DATE','like',$now_year.$now_month.'%')
                ->orWhere('END_DATE','like',$now_year.$now_month.'%');
        })->orderBy('START_DATE', 'asc')->get();

        return $holdentry;
    }

    /**
     * 休館日を取得
     *
     * @var int $type
     * @var string $now_year
     * @var string $now_month
     * @return object
     */
    public function getCloseDay($type,$now_year,$now_month)
    {
        $holdentry = $this->TbTsuCalendar
        ->where('TYPE','=',$type)
        ->where('JYO','=','99');

        $result = $holdentry->where(function($query) use($now_year,$now_month) {
            $query->where('START_DATE','like',$now_year.$now_month.'%')
                ->orWhere('END_DATE','like',$now_year.$now_month.'%');
        })
        ->orderBy('START_DATE', 'asc')->get();

        return $result;
    }


    

    /**
     * インサート処理
     *
     * @var array $insert_array
     * @var string $mode
     * @return object
     */
    public function insertRecord($insert_array,$mode)
    {
        //既存データ確認
        {
            $last_ID = $this->getLastRecord();
            $next_ID = $last_ID->ID + 1;
        }

        $new_datetime = date('YmdHis');

        //未入力のnullを初期値変換
        {
            //すべての値の初期値を作成
            $insert_array['ID'] =  $next_ID;
            $insert_array['RESIST_TIME'] =  $new_datetime;
            $insert_array['UPDATE_TIME'] =  $new_datetime;
            unset($insert_array['_token']);
            
            //modeごとの固定値設定
            if($mode == "honjyo"){
                $insert_array['TYPE'] =  1;
                $insert_array['JYO'] =  '09';
                $insert_array['VIEW_LINE'] =  1;
            }elseif($mode == "honjyonai"){
                $insert_array['TYPE'] =  3;
            }elseif($mode == "tv"){
                $insert_array['TYPE'] =  2;
                $insert_array['VIEW_LINE'] =  1;
                
            }elseif($mode == "sotomuke"){
                $insert_array['TYPE'] =  4;
                
            }elseif($mode == "event_fan"){
                $insert_array['TYPE'] =  5;
                $insert_array['VIEW_LINE'] =  1;
                
            }elseif($mode == "close"){
                $insert_array['JYO'] =  '99';
                $insert_array['VIEW_LINE'] =  1;
            }
        }

        //登録処理
        $affected = $this->TbTsuCalendar
                    ->insert($insert_array);

        return $affected;
    }

    /**
     * IDをキーにしてアップデート
     *
     * @var array $insert_array
     * @var string $id
     * @var string $mode
     * @return object
     */
    public function UpdateRecordByPK($insert_array,$id,$mode)
    {

        //未入力のnullを初期値変換
        {
            $insert_array['UPDATE_TIME'] =  date('YmdHis');
            unset($insert_array['_token']);

            //modeごとの固定値設定
            if($mode == "honjyo"){
                $insert_array['TYPE'] =  1;
                $insert_array['JYO'] =  '09';
                $insert_array['VIEW_LINE'] =  1;
            }elseif($mode == "honjyonai"){
                $insert_array['TYPE'] =  3;
            }elseif($mode == "tv"){
                $insert_array['TYPE'] =  2;
                $insert_array['VIEW_LINE'] =  1;
                
            }elseif($mode == "sotomuke"){
                $insert_array['TYPE'] =  4;
                
            }elseif($mode == "event_fan"){
                $insert_array['TYPE'] =  5;
                $insert_array['VIEW_LINE'] =  1;
                
            }elseif($mode == "close"){
                $insert_array['JYO'] =  '99';
                $insert_array['VIEW_LINE'] =  1;
            }
        }

        //登録処理
        $affected = $this->TbTsuCalendar
                        ->where('ID', $id)
                        ->update($insert_array);

        return $affected;
        
    }

    /**
     * IDで1レコードを削除
     *
     * @var string $id
     * @return object
     */
    public function deleteFirstRecordByPK($id)
    {
        return $this->TbTsuCalendar
                    ->where('ID', $id)
                    ->delete();
    }

    /**
     * 掲載フラグを一斉更新
     *
     * @var object $request
     * @return object
     */
    public function ChangeAppearFlg($request)
    {
        $holdentry = $this->TbTsuCalendar
        ->where(function($query) use($request) {
            $query->where('START_DATE','like',$request->input('target_year_month').'%')
                ->orWhere('END_DATE','like',$request->input('target_year_month').'%');
        });

        $holdentry->where('JYO','!=','99');
        if($request->input('type')){
            $holdentry->where('TYPE',$request->input('type'));
        }
        
        return $holdentry->update([
            'APPEAR_FLG' => $request->input('APPEAR_FLG')
        ]);
    }


    /**
     * 直近の日付のデータを取得
     *
     * @var string $target_date
     * @return object
     */
    public function getRecentRecordByDate($target_date)
    {
        return $this->TbTsuCalendar
                    ->where('TYPE',1)
                    ->where('END_DATE','>=',$target_date)
                    ->where('JYO','=',config('const.JYO_CODE'))
                    ->orderBy('START_DATE','ASC')
                    ->orderBy('END_DATE','ASC')
                    ->first();
    }

    /**
     * イベントページのフロント表示用データを取得
     *
     * @var string $target_date
     * @var int $is_preview
     * @return object
     */
    public function getRecordForEvent($target_date,$is_preview)
    {
        return $this->TbTsuCalendar
                    ->where(function($query){
                        $query->where('TYPE','=','5')
                            ->orWhere(function($query2){
                                $query2->where('TYPE','=','1')
                                ->where('JYO','=',config('const.JYO_CODE'));
                            });
                    })
                    ->where('APPEAR_FLG',1)
                    ->where('END_DATE','>=',$target_date)
                    ->orderBy('START_DATE','DESC')
                    ->orderBy('END_DATE','DESC')
                    ->limit(15)
                    ->get();
    }

    /**
     * フロント用カレンダーの1ライン分を取得
     *
     * @var string $type
     * @var int $line_count
     * @var array $jyo_array
     * @var array $race_type_array
     * @var string $now_year
     * @var string $now_month
     * @var string $is_preview
     * @return object
     */
    public function getLineForFront(
        $type,
        $line_count,
        $jyo_array,
        $race_type_array,
        $now_year,
        $now_month,
        $is_preview = false
    )
    {

        $holdentry = $this->TbTsuCalendar
                        ->where('TYPE','=',$type)
                        ->where('VIEW_LINE','=',$line_count);

        if(!$is_preview){
            $holdentry->where('APPEAR_FLG','1');
        }

        if($jyo_array){
            $holdentry->whereIn('JYO',$jyo_array);
        }
        if($race_type_array){
            $holdentry->whereIn('RACE_TYPE',$race_type_array);
        }

        $holdentry = $holdentry->where(function($query) use($now_year,$now_month) {
            $query->where('START_DATE','like',$now_year.$now_month.'%')
                ->orWhere('END_DATE','like',$now_year.$now_month.'%');
        })->orderBy('START_DATE', 'asc')->get();

        return $holdentry;
    }

    
    /**
     * カレンダー用に表示判定になっているものでもっとも未来の1レコードを取得
     *
     * @return object
     */
    public function getLastRecordForCalendar()
    {
        return $this->TbTsuCalendar
                    ->where('APPEAR_FLG',1)
                    ->orderBy('END_DATE', 'desc')
                    ->first();
    }


    /**
     * フロント表示用に指定の開始日の1レコードを取得
     *
     * @var string $jyo
     * @var string $target_date
     * @var string $is_preview
     * @return object
     */
    public function getFirstRecordForFront($jyo,$target_date,$is_preview = false)
    {
        $query = $this->TbTsuCalendar
                    ->where('JYO',$jyo)
                    ->where('START_DATE','>=',$target_date);

                    if(!$is_preview){
                        $query->where('APPEAR_FLG','1');
                    }
        return $query->orderBy('START_DATE', 'asc')
                     ->first();
    }

    /**
     * フロントTOP表示用に場外発売レコードを取得
     *
     * @var string $target_date
     * @var string $is_preview
     * @return object
     */
    public function getJyogaiRecordForTop($target_date,$is_preview = false)
    {
        $query = $this->TbTsuCalendar
                    ->where('JYO',"!=","04")
                    ->where('JYO',">=","01")
                    ->where('JYO',"<=","24")
                    ->where('START_DATE','<=',$target_date)
                    ->where('END_DATE','>=',$target_date);

                    if(!$is_preview){
                        $query->where('APPEAR_FLG','1');
                    }
        return $query->orderBy('GEKI_GRADE', 'asc')
                    ->orderBy('JYO', 'asc')
                    ->get();
    }

    /**
     * フロントTOP表示用に劇場発売レコードを取得
     *
     * @var string $target_date
     * @var string $geki_racetype
     * @var string $is_preview
     * @return object
     */
    public function getgekiJyoRecordForTop($target_date,$geki_racetype,$is_preview = false)
    {

        if($geki_racetype == 3){ 
            $max_line = 8;
        }else{
            $max_line = 18;
        }
        $query = $this->TbTsuCalendar
                    ->where('JYO',"=","99")
                    ->where('GEKI_JYO',">=","01")
                    ->where('GEKI_JYO',"<=","24")
                    ->where('GEKI_RACETYPE',"=",$geki_racetype)
                    ->where('START_DATE','<=',$target_date)
                    ->where('END_DATE','>=',$target_date);
                    
                    if(!$is_preview){
                        $query->where('APPEAR_FLG','1');
                    }
        return $query->whereRaw('CAST(LINE as SIGNED) <= '.$max_line )
                    ->orderBy('GEKI_GRADE', 'asc')
                    ->orderBy('GEKI_JYO', 'asc')
                    ->get();
    }


    /**
     * フロントTOP表示用に指定日の休館レコードを取得
     *
     * @var string $target_date
     * @var string $is_preview
     * @return object
     */
    public function getKyukanRecordForTop($target_date,$is_preview = false)
    {

        $query = $this->TbTsuCalendar
                    ->where('JYO',"=","99")
                    ->where('GEKI_JYO',"=","99")
                    ->where('START_DATE','<=',$target_date)
                    ->where('END_DATE','>=',$target_date);
                    
                    if(!$is_preview){
                        $query->where('APPEAR_FLG','1');
                    }
        return $query->orderBy('GEKI_GRADE', 'asc')
                    ->orderBy('GEKI_JYO', 'asc')
                    ->first();
    }


    /**
     * TOPニュース表示用にレコードを取得
     *
     * @var string $target_date
     * @var string $is_preview
     * @return object
     */
    public function getRecordForNews($target_date,$is_preview = false)
    {
        $query = $this->TbTsuCalendar
                    ->where('END_DATE','>=',$target_date)
                    ->where(function($query){
                        $query->whereRaw("(JYO <= '24' AND JYO >= '01')")
                        ->orWhere('JYO','77');
                    });
                    
                    if(!$is_preview){
                        $query->where('APPEAR_FLG','1');
                    }
        return $query->orderBy('UPDATE_TIME', 'asc')
                    ->get();
    }

}