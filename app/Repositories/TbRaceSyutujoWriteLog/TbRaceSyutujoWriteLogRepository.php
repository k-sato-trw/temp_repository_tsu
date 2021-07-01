<?php

namespace App\Repositories\TbRaceSyutujoWriteLog;

use App\Models\TbRaceSyutujoWriteLog;

class TbRaceSyutujoWriteLogRepository implements TbRaceSyutujoWriteLogRepositoryInterface
{
    protected $TbRaceSyutujoWriteLog;

    /**
    * @param object $TbRaceSyutujoWriteLog
    */
    public function __construct(TbRaceSyutujoWriteLog $TbRaceSyutujoWriteLog)
    {
        $this->TbRaceSyutujoWriteLog = $TbRaceSyutujoWriteLog;
    }

    /**
     * IDレストをもとにをレコード取得
     *
     * @var array $id_list
     * @return object
     */
    public function getRecordByIdlist($id_list)
    {
        return $this->TbRaceSyutujoWriteLog
                    ->where('JYO',config('const.JYO_CODE'))
                    ->whereIn('ID',$id_list)
                    ->orderBy('ID', 'asc')->get();
    }

    /**
     * IDで1レコードを削除
     *
     * @var string $id
     * @return object
     */
    public function deleteFirstRecordByPK($id)
    {
        return $this->TbRaceSyutujoWriteLog
                    ->where('ID', $id)
                    ->where('JYO',config("const.JYO_CODE"))
                    ->delete();
    }

    /**
     * IDで1レコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordByPK($id)
    {
        return $this->TbRaceSyutujoWriteLog
                    ->where('ID', $id)
                    ->where('JYO',config("const.JYO_CODE"))
                    ->where('SUCCESS_FLG','!=','0')
                    ->first();
    }


    /**
     * フロント表示用にIDレストをもとにをレコード取得 
     *
     * @var array $id_list
     * @return object
     */
    public function getRecordByIdlistForFront($id_list)
    {
        return $this->TbRaceSyutujoWriteLog
                    ->where('JYO',config('const.JYO_CODE'))
                    ->whereIn('ID',$id_list)
                    ->where('SUCCESS_FLG','!=','0')
                    ->orderBy('ID', 'asc')
                    ->get();
    }

    /**
     * 出場表出力の記録処理
     *
     * @var string $id
     * @var string $jyo
     * @var array $log_data
     * @var string $device
     * @var string $is_success
     * @return object
     */
    public function upsertLog($id,$jyo,$log_data,$device,$is_success){
        $now_date = date('YmdHi');

        //該当ログの存在確認
        $exist = $this->TbRaceSyutujoWriteLog
                        ->where('JYO',$jyo)
                        ->where('ID',$id)
                        ->first();

        if($exist){
            
            //更新
            $update_array = [
                'TARGET_DATE' => $log_data['sensyu_syussou2_update_time'],
                'NEN_KI' => $log_data['nen'].$log_data['ki'],
                'UPDATE_TIME' => $now_date,
            ];

            if($is_success){
                if($device == "sp"){
                    $update_array['SUCCESS_FLG_SP'] = $exist['SUCCESS_FLG_SP'] + 1;
                    $update_array['FAILURE_TOUBAN'] = '';
                }else{
                    $update_array['SUCCESS_FLG'] = $exist['SUCCESS_FLG'] + 1;
                    $update_array['FAILURE_TOUBAN'] = '';
                }
            }else{
                if($device == "sp"){
                    $update_array['SUCCESS_FLG_SP'] = '0';
                    $update_array['FAILURE_TOUBAN'] = $log_data['failure_touban'];
                }else{
                    $update_array['SUCCESS_FLG'] = '0';
                    $update_array['FAILURE_TOUBAN'] = $log_data['failure_touban'];
                }
            }

            $result = $this->TbRaceSyutujoWriteLog
                            ->where('ID', $id)
                            ->where('JYO',$jyo)
                            ->update($update_array);
        }else{
            //新規
            $insert_array = [
                'ID' => $id,
                'JYO' => $jyo,
                'TARGET_DATE' => $log_data['sensyu_syussou2_update_time'],
                'NEN_KI' => $log_data['nen'].$log_data['ki'],
                'RESIST_TIME' => $now_date,
                'UPDATE_TIME' => $now_date,
            ];

            if($is_success){
                if($device == "sp"){
                    $insert_array['SUCCESS_FLG'] = '0';
                    $insert_array['SUCCESS_FLG_SP'] = '1';
                    $insert_array['SUCCESS_FLG_MB'] = '0';
                    $update_array['FAILURE_TOUBAN'] = '';
                }else{
                    $insert_array['SUCCESS_FLG'] = '1';
                    $insert_array['SUCCESS_FLG_SP'] = '0';
                    $insert_array['SUCCESS_FLG_MB'] = '0';
                    $update_array['FAILURE_TOUBAN'] = '';
                }
            }else{
                $insert_array['SUCCESS_FLG'] = '0';
                $insert_array['SUCCESS_FLG_SP'] = '0';
                $insert_array['SUCCESS_FLG_MB'] = '0';
                $update_array['FAILURE_TOUBAN'] = $log_data['failure_touban'];
            }

            $result = $this->TbRaceSyutujoWriteLog
                            ->insert($insert_array);
        }

        return $result;

    }
    

}