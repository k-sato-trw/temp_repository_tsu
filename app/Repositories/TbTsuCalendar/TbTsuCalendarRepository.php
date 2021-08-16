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
     * メールマガジンCMS表示用　月の開催レースを取得
     *
     * @var string $jyo
     * @var string $start_date
     * @var string $end_date
     * @return object
     */
    public function getOneMonthRecord($jyo,$start_date,$end_date)
    {        
        return $this->TbTsuCalendar
                    ->where("JYO","=",$jyo)
                    ->where("START_DATE",">=",$start_date)
                    ->where("START_DATE","<=",$end_date)
                    ->orderBy("START_DATE","ASC")
                    ->get();
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
     * TOP表示用にモーターチェック日付を取得
     *
     * @var string $target_date
     * @return object
     */
    public function getMotorCheckDate($target_date,$is_kaisai = 1)
    {

        $query = $this->TbTsuCalendar
                    ->where('TYPE','=',1)
                    ->where('APPEAR_FLG','=',1);

                if($is_kaisai){
                    $query->where('START_DATE','<=',$target_date)
                    ->where('END_DATE','>=',$target_date);
                }else{
                    $query->where('START_DATE','>',$target_date)
                    ->orderBy('START_DATE');
                }

        
        return $query->first();
    }


    /**
     * TOP表示用に本場場外を取得
     *
     * @var string $target_date
     * @return object
     */
    public function getHonjyoJyogai($target_date)
    {
        return $this->TbTsuCalendar
                    ->where('TYPE',3)
                    ->where('JYO','!=','99')
                    ->where('APPEAR_FLG',1)
                    ->where('START_DATE','<=',$target_date)
                    ->where('END_DATE','>=',$target_date)
                    ->whereIn('VIEW_LINE',['1','2','3','4'])
                    ->orderBy('GRADE', 'asc')
                    ->orderBy('JYO', 'asc')
                    ->get();
    }

    /**
     * TOP表示用に外向け場外を取得
     *
     * @var string $target_date
     * @return object
     */
    public function getSotomukeJyogai($target_date)
    {
        return $this->TbTsuCalendar
                    ->where('TYPE',4)
                    ->where('APPEAR_FLG',1)
                    ->where('START_DATE','<=',$target_date)
                    ->where('END_DATE','>=',$target_date)
                    ->whereIn('VIEW_LINE',['1','2','3','4','5','6','7','8','9','10',])
                    ->orderBy('GRADE', 'asc')
                    ->orderBy('JYO', 'asc')
                    ->get();
    }


    /**
     * TOPインデックス用開催情報呼び出し
     *
     * @var string $target_date
     * @return object
     */
    public function getKaisai($target_date)
    {
        return $this->TbTsuCalendar
                    ->where('JYO',config('const.JYO_CODE'))
                    ->where('TYPE',1)
                    ->where('APPEAR_FLG',1)
                    ->where('START_DATE','<=',$target_date)
                    ->where('END_DATE','>=',$target_date)
                    ->first();
    }

    /**
     * TOPインデックス用時節開催情報呼び出し
     *
     * @var string $target_date
     * @return object
     */
    public function getJisetsuKaisai($target_date)
    {
        return $this->TbTsuCalendar
                    ->where('JYO',config('const.JYO_CODE'))
                    ->where('TYPE',1)
                    ->where('APPEAR_FLG',1)
                    ->where('START_DATE','>',$target_date)
                    ->orderBy('START_DATE')
                    ->first();
    }


}