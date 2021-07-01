<?php

namespace App\Repositories\BannerManagement;

use App\Models\BannerManagement;

class BannerManagementRepository implements BannerManagementRepositoryInterface
{
    protected $BannerManagement;

    /**
    * @param object $BannerManagement
    */
    public function __construct(BannerManagement $BannerManagement)
    {
        $this->BannerManagement = $BannerManagement;
    }


    /**
     * 全レコードをページネート取得
     *
     * @var int $page_pre
     * @return object
     */
    public function getAllRecord($status,$page_pre)
    {
        if($status){

            $now_datetime = date("YmdHi");

            $banner = $this->BannerManagement
            ->where('場コード', (int)config('const.JYO_CODE'))
            ->where(function ($query)use($now_datetime) {

                $query->where('掲載開始日時', '<=',$now_datetime )
                      ->orWhere('掲載開始日時', '=', '')
                      ->orWhere('掲載開始日時', '=', null);
            })
            ->where(function ($query)use($now_datetime) {
                $query->where('掲載終了日時', '>=',$now_datetime )
                      ->orWhere('掲載終了日時', '=', '')
                      ->orWhere('掲載終了日時', '=', null);
            })
            //->where("APPEAR_FLG" , 1)
            //->where("SORT" ,">=", 1)
            ->orderBy('SORT', 'asc')
            ->paginate($page_pre);
        }else{
            $banner = $this->BannerManagement
            ->where('場コード', (int)config('const.JYO_CODE'))
            ->orderBy('SORT', 'asc')->paginate($page_pre);
        }

        return $banner;
    }


    /**
     * IDで1レコードを取得
     *
     * @var string $id
     * @return object
     */
    public function getFirstRecordByPK($id)
    {
        return $this->BannerManagement
                    ->where('バナーID',$id)
                    ->first();
    }

    
    /**
     * 最大IDのレコードを取得
     *
     * @return object
     */
    public function getLastRecord()
    {
        return $this->BannerManagement
                    ->orderBy('バナーID', 'desc')
                    ->first();
    }


    

    /**
     * インサート処理
     *
     * @var object  $request
     * @var string  $file_name
     * @return object
     */
    public function insertRecord($request,$file_name)
    {
        //既存データ確認
        {
            $last_ID = $this->getLastRecord();
            $next_ID = $last_ID->バナーID  + 1;
        }

        $new_datetime = date('YmdHi');

        //新規作成
        $affected = $this->BannerManagement
                        ->insert([
                            '場コード' => (int)config('const.JYO_CODE'),
                            'バナーID' => $next_ID,
                            '掲載開始日時' => $request->input('掲載開始日時'),
                            '掲載終了日時' => $request->input('掲載終了日時'),
                            '縦軸' => $request->input('縦軸'),
                            '横軸' => $request->input('横軸'),
                            'イメージURL' => $file_name,
                            'イメージの高さ' => $request->input('イメージの高さ'),
                            'イメージの幅' => $request->input('イメージの幅'),
                            'リンク先URL' => $request->input('リンク先URL'),
                            '別画面' => $request->input('別画面'),
                            'ALT' => $request->input('ALT'),
                            '担当者' => $request->input('担当者'),
                        ]);

        return $affected;
    }


    /**
     * IDで検索してupdate
     *
     * @var object $request
     * @var string $id
     * @var string $file_name
     * @return object
     */
    public function updateRecord($request,$id,$file_name)
    {

        //更新
        $affected = $this->BannerManagement
                        ->where('バナーID', $id)
                        ->update([
                            '掲載開始日時' => $request->input('掲載開始日時'),
                            '掲載終了日時' => $request->input('掲載終了日時'),
                            '縦軸' => $request->input('縦軸'),
                            '横軸' => $request->input('横軸'),
                            'イメージURL' => $file_name,
                            'イメージの高さ' => $request->input('イメージの高さ'),
                            'イメージの幅' => $request->input('イメージの幅'),
                            'リンク先URL' => $request->input('リンク先URL'),
                            '別画面' => $request->input('別画面'),
                            'ALT' => $request->input('ALT'),
                            '担当者' => $request->input('担当者'),
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
        return $this->BannerManagement
                    ->where('バナーID', $id)
                    ->delete();
    }


    /**
     * インデックス表示用のレコード取得
     *
     * @var string $target_date
     * @var string $is_preview
     * @return object
     */
    public function getRecordForFront($target_date,$is_preview = false)
    {

        $banner = $this->BannerManagement
        ->where('場コード', (int)config('const.JYO_CODE'))
        ->where(function ($query)use($target_date) {

            $query->where('掲載開始日時', '<=',$target_date )
                    ->orWhere('掲載開始日時', '=', '')
                    ->orWhere('掲載開始日時', '=', null);
        })
        ->where(function ($query)use($target_date) {
            $query->where('掲載終了日時', '>=',$target_date )
                    ->orWhere('掲載終了日時', '=', '')
                    ->orWhere('掲載終了日時', '=', null);
        });
        //->where("SORT" ,">=", 1);
        /*
        if(!$is_preview){
            $banner->where('APPEAR_FLG','1');
        }*/
        
        return $banner->orderBy('SORT', 'asc')
                                        ->get();
        

    }

}