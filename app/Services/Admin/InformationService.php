<?php

namespace App\Services\Admin;

use App\Repositories\TbTsuInformation\TbTsuInformationRepositoryInterface;

class InformationService
{
    public $TbTsuInformation;

    public function __construct(
        TbTsuInformationRepositoryInterface $TbTsuInformation
    ){
        $this->TbTsuInformation = $TbTsuInformation;
    }


    public function index($request){
        $information = $this->TbTsuInformation->getAllRecord(10);
        $data['information'] = $information;
        return $data;
    }

    public function view($id){
        $information = $this->TbTsuInformation->getFirstRecordByPK($id);
        $data['information'] = $information;
        return $data;
    }

    public function create($request){

        $data = [];

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config();
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //既存データ確認
            {
                $last_ID = $this->TbTsuInformation->getLastRecord();
                $next_ID = $last_ID->ID  + 1;
            }

            //画像登録があった場合の一連処理
            {

                $file_name = [];

                for($i = 1; $i <= 3;$i++){
                    //プロパティ名作成
                    $image_pname = "IMAGE_".$i;

                    if($file = $request->$image_pname){
                        
                        //保存するファイルに名前をつける    
                        $file_name[$i] = $next_ID.'_'.$i.'.'.$file->getClientOriginalExtension();

                        //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
                        $target_path = public_path(config('const.IMAGE_PATH.INFORMATION'));
                        $file->move($target_path,$file_name[$i]);
                        
                    }else{
                        //画像が登録されなかった時はから文字
                        $file_name[$i] = "";
                    }

                }
            }

            //保存処理
            $post_result = $this->TbTsuInformation->insertRecord($request,$file_name);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin/information/';
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    public function edit($id,$request){

        $information = $this->TbTsuInformation->getFirstRecordByPK($id);

        $data['information'] = $information;

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config();
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            
            //画像登録があった場合の一連処理
            {

                $file_name = [];

                for($i = 1; $i <= 3;$i++){
                    //プロパティ名作成
                    $image_pname = "IMAGE_".$i;
                    $delete_image_pname = "delete_IMAGE_".$i;

                    if($request->$delete_image_pname){
                        
                        //画像削除の場合  
                        $delete_target = $information->$image_pname;

                        //対象ファイルを削除
                        $target_path = public_path(config('const.IMAGE_PATH.INFORMATION'));
                        if (file_exists($target_path.$delete_target)) {
                            unlink($target_path.$delete_target);
                        }

                        $file_name[$i] = "";
                            
                    }elseif($file = $request->$image_pname){
                        
                        //保存するファイルに名前をつける    
                        $file_name[$i] = $information->ID.'_'.$i.'.'.$file->getClientOriginalExtension();

                        //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
                        $target_path = public_path(config('const.IMAGE_PATH.INFORMATION'));
                        $file->move($target_path,$file_name[$i]);

                        //旧画像削除 →　画像は同名上書き
                        /*
                        $delete_target = $information->$image_pname;
                        if (file_exists($target_path.$delete_target)) {
                            unlink($target_path.$delete_target);
                        }*/
                        
                    }else{
                        //画像が登録されなかった時は既存データをいれる
                        $file_name[$i] = $information->$image_pname;
                    }

                }
            }

            //保存処理
            $post_result = $this->TbTsuInformation->UpdateRecordByPK($request,$id,$file_name);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin/information/';
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    public function delete($id){
        $information = $this->TbTsuInformation->getFirstRecordByPK($id);
        
        //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
        $target_path = public_path(config('const.IMAGE_PATH.INFORMATION'));

        //旧画像削除
        $delete_target = $information->IMAGE_1;
        if($delete_target){
            if (file_exists($target_path.$delete_target)) {
                unlink($target_path.$delete_target);
            }
        }
        
        $delete_target = $information->IMAGE_2;
        if($delete_target){
            if (file_exists($target_path.$delete_target)) {
                unlink($target_path.$delete_target);
            }
        }
        
        $delete_target = $information->IMAGE_3;
        if($delete_target){
            if (file_exists($target_path.$delete_target)) {
                unlink($target_path.$delete_target);
            }
        }

        $post_result = $this->TbTsuInformation->deleteFirstRecordByPK($id);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin/information/';
        if($post_result){
            $data['redirect_message'] = 'データを削除しました';
        }else{
            $data['redirect_message'] = 'データの削除に失敗しました';
        }

        return $data;
    }

    public function create_validate_config()
    {
        return [
            'config' => [
                'TYPE' => [],
                'PC_APPEAR_FLG' => [],
                'SP_APPEAR_FLG' => [],
                'MB_APPEAR_FLG' => [],
                'START_DATE' => ['nullable','max:12','min:12',],
                'END_DATE' => ['nullable','max:12','min:12',],
                'VIEW_DATE' => ['nullable','max:8','min:8',],
                'NEW_FLG' => ['nullable'],
                'TITLE' => ['required','max:255',],
                'HEADLINE_TITLE' => ['max:255',],
                'HEADLINE_FLG' => [],
                'TEXT' => ['max:500',],
                'PC_LINK' => ['max:128',],
                'PC_LINK_WINDOW_FLG' => [],
                'SP_LINK' => ['max:128',],
                'SP_LINK_WINDOW_FLG' => [],
                'MB_LINK' => ['max:128',],
                'MB_LINK_WINDOW_FLG' => [],
                'IMAGE_1' => ['file','image','max:2048'],
                'IMAGE_2' => ['file','image','max:2048'],
                'IMAGE_3' => ['file','image','max:2048'],
                'APPEAR_FLG' => [],
                'EDITOR_NAME' => ['required','max:64',],
                'AUTO_ID' => [],

            ],
            'message' => [
            ],
        ];
    }

}