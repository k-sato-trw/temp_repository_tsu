<?php

namespace App\Services\Admin;

use App\Repositories\BannerManagement\BannerManagementRepositoryInterface;

class BannerService
{
    public $BannerManagement;

    public function __construct(
        BannerManagementRepositoryInterface $BannerManagement
    ){
        $this->BannerManagement = $BannerManagement;
    }


    public function index($request){

        $status = $request->input('status',1);
        
        $banner = $this->BannerManagement->getAllRecord($status,10);

        $data['banner'] = $banner;
        $data['status'] = $status;

        return $data;
    }

    
    public function view($id){
        $banner = $this->BannerManagement->getFirstRecordByPK($id);

        $data['banner'] = $banner;

        return $data;
    }

    public function create($request){

        $data = [];

        if($request->isMethod('post')){
            //POST処理
            
            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config("create");
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //既存データ確認
            {
                $last_ID = $this->BannerManagement->getLastRecord();
                $next_ID = $last_ID->バナーID  + 1;
            }

            //画像登録があった場合
            {
                $file = $request->イメージURL;
                    
                //保存するファイルに名前をつける    
                $file_name = $next_ID.'.'.$file->getClientOriginalExtension();

                //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
                $target_path = public_path(config('const.IMAGE_PATH.BANNER'));
                $file->move($target_path,$file_name);
            }

            //保存処理
            $post_result = $this->BannerManagement->insertRecord($request,$file_name);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = "admin/banner";
            if($post_result){
                $data['redirect_message'] = "データを更新しました";
            }else{
                $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
            }

        }

        return $data;
    }

    public function edit($id ,$request){
        $banner = $this->BannerManagement->getFirstRecordByPK($id);

        $data['banner'] = $banner;

        if($request->isMethod('post')){

           //バリデーション処理。失敗した場合は自動リダイレクト
           $validate_config = $this->create_validate_config("edit");
           $request->validate(
               $validate_config['config'],
               $validate_config['message']
           );

           //画像登録があった場合
           {
                if($file = $request->イメージURL){
                    $file = $request->イメージURL;
                        
                    //保存するファイルに名前をつける    
                    $file_name = $id.'.'.$file->getClientOriginalExtension();

                    //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
                    $target_path = public_path(config('const.IMAGE_PATH.BANNER'));
                    $file->move($target_path,$file_name);

                }else{

                    $file_name = $banner->イメージURL;

                }
           }

           //保存処理
           $post_result = $this->BannerManagement->updateRecord($request,$id,$file_name);

           $data['post_result'] = $post_result;
           $data['redirect_url'] = "admin/banner";
           if($post_result){
               $data['redirect_message'] = "データを更新しました";
           }else{
               $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
           }

        }

        return $data;
    }

    public function delete($id){
        $banner = $this->BannerManagement->getFirstRecordByPK($id);
        
        //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
        $target_path = public_path(config('const.IMAGE_PATH.BANNER'));

        //旧画像削除
        $delete_target = $banner->イメージURL;
        if($delete_target){
            if (file_exists($target_path.$delete_target)) {
                unlink($target_path.$delete_target);
            }
        }

        $post_result = $this->BannerManagement->deleteFirstRecordByPK($id);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = "admin/banner";
        if($post_result){
            $data['redirect_message'] = "データを削除しました";
        }else{
            $data['redirect_message'] = "データの削除に失敗しました";
        }
        
        return $data;
    }

    
    public function create_validate_config($type)
    {
        $config["create"] = [
            "config" => [
                '掲載開始日時' => ['required','max:12','min:12'],
                '掲載終了日時' => ['required','max:12','min:12'],
                '縦軸' => ['required'],
                '横軸' => ['required'],
                'イメージURL' => ['required','file','image','max:2048'],
                'イメージの高さ' => ['required'],
                'イメージの幅' => ['required'],
                'リンク先URL' => ['nullable','max:128'],
                '別画面' => [],
                'ALT' => ['nullable','max:128'],
                '担当者' => ['required','max:16'],
            ],
            "message" => [
            ],
        ];

        $config["edit"] = [
            "config" => [
                '掲載開始日時' => ['required','max:12','min:12'],
                '掲載終了日時' => ['required','max:12','min:12'],
                '縦軸' => ['required'],
                '横軸' => ['required'],
                'イメージURL' => ['file','image','max:2048',],
                'イメージの高さ' => ['required'],
                'イメージの幅' => ['required'],
                'リンク先URL' => ['nullable','max:128'],
                '別画面' => [],
                'ALT' => ['nullable','max:128'],
                '担当者' => ['required','max:16'],
            ],
            "message" => [
            ],
        ];

        return $config[$type];
    }

}