<?php

namespace App\Services\Admin;

use App\Repositories\RaceTenboSensyuImage\RaceTenboSensyuImageRepositoryInterface;
use Illuminate\Validation\Rule;

class RacerImageService
{
    public $RaceTenboSensyuImage;

    public function __construct(
        RaceTenboSensyuImageRepositoryInterface $RaceTenboSensyuImage
    ){
        $this->RaceTenboSensyuImage = $RaceTenboSensyuImage;
    }

    public function index($request){

        $touban = "";
        if($request->input("登番")){
            $touban = $request->input("登番");
        }

        $data['touban'] = $touban;

        $racer_image = $this->RaceTenboSensyuImage->getRecordByTouban(10,$touban);

        $data['racer_image'] = $racer_image;

        return $data;
    }

    
    public function view($id){
        $racer_image = $this->RaceTenboSensyuImage->getFirstRecordByTouban($id);

        $data['racer_image'] = $racer_image;

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

            //画像登録があった場合
            {
                $file = $request->画像名;
                    
                //保存するファイルに名前をつける    
                $file_name = $request->登番.'.'.$file->getClientOriginalExtension();

                //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
                $target_path = public_path(config('const.IMAGE_PATH.RACER_IMAGE'));
                $file->move($target_path,$file_name);
                    
            }

            //保存処理
            $post_result = $this->RaceTenboSensyuImage->insertRecord($request,$file_name);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = "admin/racer_image/";
            if($post_result){
                $data['redirect_message'] = "データを更新しました";
            }else{
                $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
            }

        }

        return $data;
    }

    public function edit($id ,$request){
        $racer_image = $this->RaceTenboSensyuImage->getFirstRecordByTouban($id);

        $data['racer_image'] = $racer_image;

        if($request->isMethod('post')){

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config("edit");
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //画像登録があった場合
            {
                if($file = $request->画像名){
                    
                    //保存するファイルに名前をつける    
                    $file_name = $id.'.'.$file->getClientOriginalExtension();

                    //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
                    $target_path = public_path(config('const.IMAGE_PATH.RACER_IMAGE'));
                    $file->move($target_path,$file_name);
                }else{
                    $file_name = $racer_image->画像名;
                }
            }

            //保存処理
            $post_result = $this->RaceTenboSensyuImage->UpdateRecordByTouban($request,$id,$file_name);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = "admin/racer_image/";
            if($post_result){
                $data['redirect_message'] = "データを更新しました";
            }else{
                $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
            }
        }
        return $data;
    }

    public function delete($id){
        $racer_image = $this->RaceTenboSensyuImage->getFirstRecordByTouban($id);
        
        //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
        $target_path = public_path(config('const.IMAGE_PATH.RACER_IMAGE'));

        //旧画像削除
        $delete_target = $racer_image->画像名;
        if($delete_target){
            if (file_exists($target_path.$delete_target)) {
                unlink($target_path.$delete_target);
            }
        }

        $post_result = $this->RaceTenboSensyuImage->deleteFirstRecordByTouban($id);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = "admin/racer_image/";
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
                '登番' => ['required','digits:4',Rule::unique('レース展望選手画像')],
                '名前' => ['max:32'],
                '出身' => ['max:8'],
                '性別' => [],
                '画像名' => ['required','file','image','max:2048',],
            ],
            "message" => [
            ],
        ];

        $config["edit"] = [
            "config" => [
                '名前' => ['max:32'],
                '出身' => ['max:8'],
                '性別' => [],
                '画像名' => ['file','image','max:2048',],
            ],
            "message" => [
            ],
        ];

        return $config[$type];
    }
}