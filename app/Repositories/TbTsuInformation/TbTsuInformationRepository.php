<?php

namespace App\Repositories\TbTsuInformation;

use App\Models\TbTsuInformation;

class TbTsuInformationRepository implements TbTsuInformationRepositoryInterface
{
    protected $TbTsuInformation;

    /**
    * @param object $TbTsuInformation
    */
    public function __construct(TbTsuInformation $TbTsuInformation)
    {
        $this->TbTsuInformation = $TbTsuInformation;
    }

    /**
     * 全レコードをページネイトで取得
     *
     * @var string $pre_page
     * @return object
     */
    public function getAllRecord($pre_page)
    {
        return $this->TbTsuInformation
                    ->orderBy('ID', 'desc')
                    ->paginate($pre_page);
    }

    /**
     * レコードを年単位で取得
     *
     * @var string $year
     * @return object
     */
    public function getRecordByYear($year)
    {
        return $this->TbTsuInformation
                    ->where('VIEW_DATE','>=',$year.'0101')
                    ->where('VIEW_DATE','<=',$year.'1231')
                    ->orderBy('VIEW_DATE', 'desc')
                    ->orderBy('ID', 'desc')
                    ->get();
    }

    /**
     * 存在する年リストを取得
     *
     * @return object
     */
    public function getYearList()
    {
        return $this->TbTsuInformation
                    ->selectRaw('LEFT( VIEW_DATE ,4) as VIEW_YEAR')
                    ->orderBy('VIEW_YEAR', 'desc')
                    ->groupBy('VIEW_YEAR')
                    ->get();
    }


    /**
     * IDで1レコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordByPK($id)
    {
        return $this->TbTsuInformation
                    ->where('ID','=',$id)
                    ->first();
    }

    /**
     * 最大IDのレコードを取得
     *
     * @return object
     */
    public function getLastRecord()
    {
        return $this->TbTsuInformation
                    ->orderBy('ID', 'desc')
                    ->first();
    }

    /**
     * インサート処理
     *
     * @var object  $request
     * @var array $file_name
     * @return object
     */
    public function insertRecord($request,$file_name)
    {
        //既存データ確認
        {
            $last_ID = $this->getLastRecord();
            $next_ID = $last_ID->ID + 1;
        }

        $new_datetime = date('YmdHi');

        //新規作成
        $affected = $this->TbTsuInformation
                        ->insert([
                            'ID' => $next_ID,
                            'TYPE' => $request->input('TYPE'),
                            'PC_APPEAR_FLG' => $request->input('PC_APPEAR_FLG'),
                            'SP_APPEAR_FLG' => $request->input('SP_APPEAR_FLG'),
                            'MB_APPEAR_FLG' => $request->input('MB_APPEAR_FLG'),
                            'START_DATE' => $request->input('START_DATE'),
                            'END_DATE' => $request->input('END_DATE'),
                            'VIEW_DATE' => $request->input('VIEW_DATE'),
                            'NEW_FLG' => $request->input('NEW_FLG'),
                            'TITLE' => $request->input('TITLE'),
                            'HEADLINE_TITLE' => $request->input('HEADLINE_TITLE'),
                            'HEADLINE_FLG' => $request->input('HEADLINE_FLG'),
                            'TEXT' => $request->input('TEXT'),
                            'PC_LINK' => $request->input('PC_LINK'),
                            'PC_LINK_WINDOW_FLG' => $request->input('PC_LINK_WINDOW_FLG'),
                            'SP_LINK' => $request->input('SP_LINK'),
                            'SP_LINK_WINDOW_FLG' => $request->input('SP_LINK_WINDOW_FLG'),
                            'MB_LINK' => $request->input('MB_LINK'),
                            'MB_LINK_WINDOW_FLG' => $request->input('MB_LINK_WINDOW_FLG'),
                            'IMAGE_1' => $file_name[1],
                            'IMAGE_2' => $file_name[2],
                            'IMAGE_3' => $file_name[3],
                            'APPEAR_FLG' => $request->input('APPEAR_FLG'),
                            'RESIST_TIME' => $new_datetime,
                            'UPDATE_TIME' => $new_datetime,
                            'EDITOR_NAME' => $request->input('EDITOR_NAME'),
                        ]);

        return $affected;
    }

    /**
     * IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @var array $file_name
     * @return object
     */
    public function UpdateRecordByPK($request,$id,$file_name)
    {

        $new_datetime = date('YmdHi');

        $affected = $this->TbTsuInformation
                            ->where('ID', $id)
                            ->update([
                                'TYPE' => $request->input('TYPE'),
                                'PC_APPEAR_FLG' => $request->input('PC_APPEAR_FLG'),
                                'SP_APPEAR_FLG' => $request->input('SP_APPEAR_FLG'),
                                'MB_APPEAR_FLG' => $request->input('MB_APPEAR_FLG'),
                                'START_DATE' => $request->input('START_DATE'),
                                'END_DATE' => $request->input('END_DATE'),
                                'VIEW_DATE' => $request->input('VIEW_DATE'),
                                'NEW_FLG' => $request->input('NEW_FLG'),
                                'TITLE' => $request->input('TITLE'),
                                'HEADLINE_TITLE' => $request->input('HEADLINE_TITLE'),
                                'HEADLINE_FLG' => $request->input('HEADLINE_FLG'),
                                'TEXT' => $request->input('TEXT'),
                                'PC_LINK' => $request->input('PC_LINK'),
                                'PC_LINK_WINDOW_FLG' => $request->input('PC_LINK_WINDOW_FLG'),
                                'SP_LINK' => $request->input('SP_LINK'),
                                'SP_LINK_WINDOW_FLG' => $request->input('SP_LINK_WINDOW_FLG'),
                                'MB_LINK' => $request->input('MB_LINK'),
                                'MB_LINK_WINDOW_FLG' => $request->input('MB_LINK_WINDOW_FLG'),
                                'IMAGE_1' => $file_name[1],
                                'IMAGE_2' => $file_name[2],
                                'IMAGE_3' => $file_name[3],
                                'APPEAR_FLG' => $request->input('APPEAR_FLG'),
                                'UPDATE_TIME' => $new_datetime,
                                'EDITOR_NAME' => $request->input('EDITOR_NAME'),
                            ]);
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
        return $this->TbTsuInformation
                    ->where('ID', $id)
                    ->delete();
    }



    /**
     * 施工者CMS IDをキーにしてアップデート
     *
     * @var object  $request
     * @var string $id
     * @var array $file_name
     * @return object
     */
    public function UpdateRecordForAdminSekosya($request,$id,$file_name)
    {

        $new_datetime = date('YmdHi');

        $affected = $this->TbTsuInformation
                            ->where('ID', $id)
                            ->update([
                                'TYPE' => $request->input('kubun'),
                                'PC_APPEAR_FLG' => $request->input('devic01'),
                                'SP_APPEAR_FLG' => $request->input('devic02'),
                                'MB_APPEAR_FLG' => $request->input('devic03'),
                                'START_DATE' => $request->input('date1'),
                                'END_DATE' => $request->input('date2'),
                                'VIEW_DATE' => $request->input('date3'),
                                'NEW_FLG' => $request->input('New_flg'),
                                'TITLE' => $request->input('title'),
                                'HEADLINE_TITLE' => $request->input('head_ttl_txt'),
                                'HEADLINE_FLG' => $request->input('head_check'),
                                'TEXT' => $request->input('main_txt'),
                                'PC_LINK' => $request->input('link_pc'),
                                'PC_LINK_WINDOW_FLG' => $request->input('link_pc_check'),
                                'SP_LINK' => $request->input('link_sp'),
                                'SP_LINK_WINDOW_FLG' => $request->input('link_sp_check'),
                                'MB_LINK' => $request->input('link_mb'),
                                'MB_LINK_WINDOW_FLG' => $request->input('link_mb_check'),
                                'IMAGE_1' => $file_name[1],
                                'IMAGE_2' => $file_name[2],
                                'IMAGE_3' => $file_name[3],
                                'UPDATE_TIME' => $new_datetime,
                                'EDITOR_NAME' => $request->input('date4'),
                            ]);
        return $affected;
    }

    /**
     * 施工者CMS インサート処理
     *
     * @var object  $request
     * @var array $file_name
     * @return object
     */
    public function insertRecordForAdminSekosya($request,$file_name)
    {
        //既存データ確認
        {
            $last_ID = $this->getLastRecord();
            $next_ID = $last_ID->ID + 1;
        }

        $new_datetime = date('YmdHi');

        //新規作成
        $affected = $this->TbTsuInformation
                        ->insert([
                            'ID' => $next_ID,
                            'TYPE' => $request->input('kubun'),
                            'PC_APPEAR_FLG' => $request->input('devic01'),
                            'SP_APPEAR_FLG' => $request->input('devic02'),
                            'MB_APPEAR_FLG' => $request->input('devic03'),
                            'START_DATE' => $request->input('date1'),
                            'END_DATE' => $request->input('date2'),
                            'VIEW_DATE' => $request->input('date3'),
                            'NEW_FLG' => $request->input('New_flg'),
                            'TITLE' => $request->input('title'),
                            'HEADLINE_TITLE' => $request->input('head_ttl_txt'),
                            'HEADLINE_FLG' => $request->input('head_check'),
                            'TEXT' => $request->input('main_txt'),
                            'PC_LINK' => $request->input('link_pc'),
                            'PC_LINK_WINDOW_FLG' => $request->input('link_pc_check'),
                            'SP_LINK' => $request->input('link_sp'),
                            'SP_LINK_WINDOW_FLG' => $request->input('link_sp_check'),
                            'MB_LINK' => $request->input('link_mb'),
                            'MB_LINK_WINDOW_FLG' => $request->input('link_mb_check'),
                            'IMAGE_1' => $file_name[1],
                            'IMAGE_2' => $file_name[2],
                            'IMAGE_3' => $file_name[3],
                            'APPEAR_FLG' => 0,
                            'RESIST_TIME' => $new_datetime,
                            'UPDATE_TIME' => $new_datetime,
                            'EDITOR_NAME' => $request->input('date4'),
                        ]);

        return $affected;
    }

    /**
     * IDをキーにして掲載フラグをアップデート
     *
     * @var string $id
     * @var int $appear_flg
     * @return object
     */
    public function changeAppearFlg($id,$appear_flg)
    {

        $new_datetime = date('YmdHi');

        $affected = $this->TbTsuInformation
                            ->where('ID', $id)
                            ->update([
                                'APPEAR_FLG' => $appear_flg,
                                'UPDATE_TIME' => $new_datetime,
                            ]);
        return $affected;
    }


    /**
     * フロント表示用レコードを取得
     *
     * @var string $target_datetime
     * @var string $is_preview
     * @return object
     */
    public function getRecordForPcTop($target_datetime,$is_preview = false)
    {

        $query = $this->TbTsuInformation
            ->where('PC_APPEAR_FLG', '1');
        
        if (!$is_preview) {
            $query->where(function ($query) use ($target_datetime) {
                $query->where(function ($query) use ($target_datetime) {
                    $query->where('START_DATE','<=', $target_datetime)
                        ->where('END_DATE', '>=', $target_datetime);
                })
                ->orWhere(function ($query) use ($target_datetime) {
                    $query->where('START_DATE','<=', $target_datetime)
                        ->where('END_DATE', '=', '');
                });
            });
        }else{
            $query->where(function ($query) use ($target_datetime) {
                $query->where('END_DATE','>=', $target_datetime)
                    ->orWhere('END_DATE', '=', '');
            });
        }

        if (!$is_preview) {
            $query->where('APPEAR_FLG', '1');
        }
        return $query->orderBy('VIEW_DATE', 'desc')->get();
    }


    /**
     * SPフロント表示用レコードを取得
     *
     * @var string $target_datetime
     * @var string $is_preview
     * @return object
     */
    public function getRecordForSpTop($target_datetime,$is_preview = false)
    {

        $query = $this->TbTsuInformation
            ->where('SP_APPEAR_FLG', '1');
        
        if (!$is_preview) {
            $query->where(function ($query) use ($target_datetime) {
                $query->where(function ($query) use ($target_datetime) {
                    $query->where('START_DATE','<=', $target_datetime)
                        ->where('END_DATE', '>=', $target_datetime);
                })
                ->orWhere(function ($query) use ($target_datetime) {
                    $query->where('START_DATE','<=', $target_datetime)
                        ->where('END_DATE', '=', '');
                });
            });
        }else{
            $query->where(function ($query) use ($target_datetime) {
                $query->where('END_DATE','>=', $target_datetime)
                    ->orWhere('END_DATE', '=', '');
            });
        }

        if (!$is_preview) {
            $query->where('APPEAR_FLG', '1');
        }
        return $query->orderBy('VIEW_DATE', 'desc')->get();
    }


    /**
     * フロント表示可能な「年」を取得
     *
     * @return object
     */
    public function getDisplayYearList()
    {
        $new_datetime = date('YmdHi');
        $query = $this->TbTsuInformation
            ->where('PC_APPEAR_FLG', '1')
            ->where(function ($query) use ($new_datetime) {
                $query->where('START_DATE', '')
                    ->orWhere('START_DATE', '<=', $new_datetime);
            })
            ->where(function ($query) use ($new_datetime) {
                $query->where('END_DATE', '')
                    ->orWhere('END_DATE', '>=', $new_datetime);
            })
            ->where('START_DATE', '>', '201500000000');

            $query->where('APPEAR_FLG', '1');

        return $query->orderBy('VIEW_DATE', 'desc')->get();
    }

    

    /**
     * SPフロント表示可能な「年」を取得
     *
     * @return object
     */
    public function getDisplayYearListSp()
    {
        $new_datetime = date('YmdHi');
        $query = $this->TbTsuInformation
            ->where('SP_APPEAR_FLG', '1')
            ->where(function ($query) use ($new_datetime) {
                $query->where('START_DATE', '')
                    ->orWhere('START_DATE', '<=', $new_datetime);
            })
            ->where(function ($query) use ($new_datetime) {
                $query->where('END_DATE', '')
                    ->orWhere('END_DATE', '>=', $new_datetime);
            })
            ->where('START_DATE', '>', '201500000000');

            $query->where('APPEAR_FLG', '1');

        return $query->orderBy('VIEW_DATE', 'desc')->get();
    }



    /**
     * ヘッドライン呼び出し
     *
     * @var string $target_date
     * @return object
     */
    public function getFirstHeadlinePc($target_date)
    {
        return $this->TbTsuInformation
                    ->where('PC_APPEAR_FLG','1')
                    ->where('APPEAR_FLG','1')
                    ->where(function ($query) use ($target_date) {
                        $query->where(function ($query) use ($target_date) {
                            $query->where('START_DATE','<=', $target_date)
                                ->where('END_DATE', '>=', $target_date);
                        })
                        ->orWhere(function ($query) use ($target_date) {
                            $query->where('START_DATE','<=', $target_date)
                                ->where('END_DATE', '=', '');
                        });
                    })
                    ->where('HEADLINE_TITLE','!=','')
                    ->orderBy('VIEW_DATE','DESC')
                    ->orderBy('UPDATE_TIME','DESC')
                    ->first();
    }

    /**
     * ヘッドライン呼び出しSP
     *
     * @var string $target_date
     * @return object
     */
    public function getFirstHeadlineSp($target_date)
    {
        return $this->TbTsuInformation
                    ->where('SP_APPEAR_FLG','1')
                    ->where('APPEAR_FLG','1')
                    ->where(function ($query) use ($target_date) {
                        $query->where(function ($query) use ($target_date) {
                            $query->where('START_DATE','<=', $target_date)
                                ->where('END_DATE', '>=', $target_date);
                        })
                        ->orWhere(function ($query) use ($target_date) {
                            $query->where('START_DATE','<=', $target_date)
                                ->where('END_DATE', '=', '');
                        });
                    })
                    ->where('HEADLINE_TITLE','!=','')
                    ->orderBy('VIEW_DATE','DESC')
                    ->orderBy('UPDATE_TIME','DESC')
                    ->first();
    }


}