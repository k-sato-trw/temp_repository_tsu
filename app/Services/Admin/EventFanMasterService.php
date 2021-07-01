<?php

namespace App\Services\Admin;

use App\Repositories\TbTsuEventfanmaster\TbTsuEventfanmasterRepositoryInterface;
use App\Repositories\TbTsuEventfan\TbTsuEventfanRepositoryInterface;

class EventFanMasterService
{
    public $TbTsuEventfanmaster;
    public $TbTsuEventfan;

    public function __construct(
        TbTsuEventfanmasterRepositoryInterface $TbTsuEventfanmaster,
        TbTsuEventfanRepositoryInterface $TbTsuEventfan
    ){
        $this->TbTsuEventfanmaster = $TbTsuEventfanmaster;
        $this->TbTsuEventfan = $TbTsuEventfan;
    }


    public function index($id,$request){
        $data['id'] = $id;
        $event_fan_master = $this->TbTsuEventfanmaster->getRecord($id);

        $data['event_fan_master'] = $event_fan_master;

        $event_fan = $this->TbTsuEventfan->getRecord($id);
        $event_fan_array =[];
        foreach($event_fan as $item){
            $event_fan_array[$item->SUB_ID][] = $item;
        }
        $data['event_fan_array'] = $event_fan_array;

        return $data;
    }

    public function create($id,$request){

        $data = [];
        $data['id'] = $id;

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config('event_fan_master');
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //保存処理
            $post_result = $this->TbTsuEventfanmaster->insertRecord($request,$id);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin/event_fan_master/'.$id;
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    public function edit($id,$sub_id,$request){

        $event_fan_master = $this->TbTsuEventfanmaster->getFirstRecordByPK($id,$sub_id);

        $data['event_fan_master'] = $event_fan_master;

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config('event_fan_master');
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //保存処理
            $post_result = $this->TbTsuEventfanmaster->UpdateRecordByPK($request,$id,$sub_id);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin/event_fan_master/'.$id;
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    public function delete($id,$sub_id){
        $post_result = $this->TbTsuEventfanmaster->deleteFirstRecordByPK($id,$sub_id);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin/event_fan_master/'.$id;
        if($post_result){
            $data['redirect_message'] = 'データを削除しました';
        }else{
            $data['redirect_message'] = 'データの削除に失敗しました';
        }

        return $data;
    }

    

    public function create_event_fan($id,$sub_id,$request){

        $data = [];
        $data['id'] = $id;
        $data['sub_id'] = $sub_id;

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config('event_fan');
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //既存データ確認
            {
                $last_ID = $this->TbTsuEventfan->getLastRecord($id,$sub_id);
                $next_third_id = $last_ID->THIRD_ID  + 1;
            }

            //画像登録があった場合の一連処理
            {

                $file_name = [];

                for($i = 1; $i <= 3;$i++){
                    //プロパティ名作成
                    $image_pname = "IMAGE".$i;

                    if($file = $request->$image_pname){
                        
                        //保存するファイルに名前をつける    
                        $file_name[$i] = 'IMAGE'.$i.'_'.$id.'_'.$sub_id.'_'.$next_third_id.'.'.$file->getClientOriginalExtension();

                        //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
                        $target_path = public_path(config('const.IMAGE_PATH.EVENT_FAN'));
                        $file->move($target_path,$file_name[$i]);
                        
                    }else{
                        //画像が登録されなかった時はから文字
                        $file_name[$i] = "";
                    }

                }
            }

            //保存処理
            $post_result = $this->TbTsuEventfan->insertRecord($request,$id,$sub_id,$file_name);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin/event_fan_master/'.$id;
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }


    public function edit_event_fan($id,$sub_id,$third_id,$request){

        $event_fan = $this->TbTsuEventfan->getFirstRecordByPK($id,$sub_id,$third_id);

        $data['event_fan'] = $event_fan;

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config('event_fan');
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            
            //画像登録があった場合の一連処理
            {

                $file_name = [];

                for($i = 1; $i <= 3;$i++){
                    //プロパティ名作成
                    $image_pname = "IMAGE".$i;
                    $delete_image_pname = "delete_IMAGE".$i;

                    if($request->$delete_image_pname){
                        
                        //画像削除の場合  
                        $delete_target = $event_fan->$image_pname;

                        //対象ファイルを削除
                        $target_path = public_path(config('const.IMAGE_PATH.EVENT_FAN'));
                        if (file_exists($target_path.$delete_target)) {
                            unlink($target_path.$delete_target);
                        }

                        $file_name[$i] = "";
                            
                    }elseif($file = $request->$image_pname){
                        
                        //保存するファイルに名前をつける    
                        $file_name[$i] = 'IMAGE'.$i.'_'.$id.'_'.$sub_id.'_'.$third_id.'.'.$file->getClientOriginalExtension();

                        //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
                        $target_path = public_path(config('const.IMAGE_PATH.EVENT_FAN'));
                        $file->move($target_path,$file_name[$i]);
                        
                    }else{
                        //画像が登録されなかった時は既存データをいれる
                        $file_name[$i] = $event_fan->$image_pname;
                    }

                }
            }

            //保存処理
            $post_result = $this->TbTsuEventfan->UpdateRecordByPK($request,$id,$sub_id,$third_id,$file_name);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin/event_fan_master/'.$id;
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    public function delete_event_fan($id,$sub_id,$third_id){
        $event_fan = $this->TbTsuEventfan->getFirstRecordByPK($id,$sub_id,$third_id);
        
        //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
        $target_path = public_path(config('const.IMAGE_PATH.EVENT_FAN'));

        //旧画像削除
        $delete_target = $event_fan->IMAGE1;
        if($delete_target){
            if (file_exists($target_path.$delete_target)) {
                unlink($target_path.$delete_target);
            }
        }
        
        $delete_target = $event_fan->IMAGE2;
        if($delete_target){
            if (file_exists($target_path.$delete_target)) {
                unlink($target_path.$delete_target);
            }
        }
        
        $delete_target = $event_fan->IMAGE3;
        if($delete_target){
            if (file_exists($target_path.$delete_target)) {
                unlink($target_path.$delete_target);
            }
        }

        $post_result = $this->TbTsuEventfan->deleteFirstRecordByPK($id,$sub_id,$third_id);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin/event_fan_master/'.$id;
        if($post_result){
            $data['redirect_message'] = 'データを削除しました';
        }else{
            $data['redirect_message'] = 'データの削除に失敗しました';
        }

        return $data;
    }



    public function create_validate_config($type)
    {
        $array['event_fan_master'] = [
            'config' => [
                'START_DATE' => ['required','max:8','min:8'],
                'END_DATE' => ['required','max:8','min:8'],
                'APPEAR_FLG' => [],
                'EDITOR_NAME' => ['required','max:32'],
            ],
            'message' => [
            ],
        ];

        $array['event_fan'] = [
            'config' => [
                'TYPE' => ['required'],
                'TITLE' => ['required','max:500'],
                'TEXT' => ['required','max:5000'],
                'IMAGE1' => ['file','image'],
                'IMAGE2' => ['file','image'],
                'IMAGE3' => ['file','image'],
                'NOIMAGE' => [],
                'APPEAR_FLG' => [],
                'TURN' => [],
                'EDITOR_NAME' => ['required','max:32',],
            ],
            'message' => [
            ],
        ];

        return $array[$type];
    }

}