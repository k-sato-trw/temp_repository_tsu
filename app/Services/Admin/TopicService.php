<?php

namespace App\Services\Admin;

use App\Repositories\TbTsuTopic\TbTsuTopicRepositoryInterface;

class TopicService
{
    public $TbTsuTopic;

    public function __construct(
        TbTsuTopicRepositoryInterface $TbTsuTopic
    ){
        $this->TbTsuTopic = $TbTsuTopic;
    }


    public function index($request){

        $target_date = date("YmdHi");

        $topic = $this->TbTsuTopic->getAllRecord(10);
        
        //PCで現在表示されるデータ一覧
        $pc_appear_topic = $this->TbTsuTopic->getAppearRecord($target_date,'pc');

        $pc_appear_topic_array = [];
        foreach($pc_appear_topic as $item){
            $pc_appear_topic_array[$item->VIEW_POINT] = $item;
        }
        $data['pc_appear_topic_array'] = $pc_appear_topic_array;


        //SPで現在表示されるデータ一覧
        $sp_appear_topic = $this->TbTsuTopic->getAppearRecord($target_date,'sp');
        
        $sp_appear_topic_array = [];
        foreach($sp_appear_topic as $item){
            $sp_appear_topic_array[$item->VIEW_POINT] = $item;
        }
        $data['sp_appear_topic_array'] = $sp_appear_topic_array;

        //SPで現在表示されるデータ一覧
        $yobi_topic = $this->TbTsuTopic->getYobiRecord($target_date);
        
        $yobi_topic_array = [];
        foreach($yobi_topic as $item){
            $yobi_topic_array[$item->VIEW_POINT] = $item;
        }
        $data['yobi_topic_array'] = $yobi_topic_array;



        $data['topic'] = $topic;

        return $data;
    }


    public function create($request){

        $data = [];

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config('create');
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //基本バリデーション成功後のみのバリデーション処理追加
            {
                $validate_config = $this->create_validate_config_after($request);
                $request->validate(
                    $validate_config['config'],
                    $validate_config['message']
                );
            }

            //既存データ確認
            {
                $last_ID = $this->TbTsuTopic->getLastRecord();
                $next_ID = $last_ID->ID  + 1;
            }

            //画像登録があった場合
            {
                $file = $request->IMAGE;
                    
                //保存するファイルに名前をつける    
                $file_name = $next_ID.'.'.$file->getClientOriginalExtension();

                //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
                $target_path = public_path(config('const.IMAGE_PATH.TOPIC'));
                $file->move($target_path,$file_name);
            }

            //保存処理
            $post_result = $this->TbTsuTopic->insertRecord($request,$file_name);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin/topic/';
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    public function edit($id, $request){

        $topic = $this->TbTsuTopic->getFirstRecordByPK($id);

        $data['topic'] = $topic;

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config('edit');
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //基本バリデーション成功後のみのバリデーション処理追加
            {
                $validate_config = $this->create_validate_config_after($request,$id);
                $request->validate(
                    $validate_config['config'],
                    $validate_config['message']
                );
            }

            //画像登録があった場合
           {
            if($file = $request->IMAGE){
                $file = $request->IMAGE;
                    
                //保存するファイルに名前をつける    
                $file_name = $id.'.'.$file->getClientOriginalExtension();

                //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
                $target_path = public_path(config('const.IMAGE_PATH.TOPIC'));
                $file->move($target_path,$file_name);

            }else{

                $file_name = $topic->IMAGE;

            }
       }

            //保存処理
            $post_result = $this->TbTsuTopic->UpdateRecordByPK($request,$id,$file_name);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin/topic/';
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    public function delete($id){

        $topic = $this->TbTsuTopic->getFirstRecordByPK($id);
        
        //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
        $target_path = public_path(config('const.IMAGE_PATH.TOPIC'));

        //旧画像削除
        $delete_target = $topic->IMAGE;
        if($delete_target){
            if (file_exists($target_path.$delete_target)) {
                unlink($target_path.$delete_target);
            }
        }

        $post_result = $this->TbTsuTopic->deleteFirstRecordByPK($id);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin/topic/';
        if($post_result){
            $data['redirect_message'] = 'データを削除しました';
        }else{
            $data['redirect_message'] = 'データの削除に失敗しました';
        }

        return $data;
    }

    public function create_validate_config($type)
    {
        $config["create"] = [
            "config" => [
                'START_DATE' => ['required','max:12','min:12',],
                'END_DATE' => ['required','max:12','min:12',],
                'IMAGE' => ['required','file','image','max:2048'],
                'PC_URL' => ['max:500',],
                'SP_URL' => ['max:500',],
                'PC_BLANK_FLG' => [],
                'SP_BLANK_FLG' => [],
                'PC_APPEAR_FLG' => [],
                'SP_APPEAR_FLG' => [],
                'VIEW_POINT' => ['required','max:2',],
                'BIG_FLAG' => [],
                'APPEAR_FLG' => [],
            ],
            "message" => [
            ],
        ];

        $config["edit"] = [
            "config" => [
                'START_DATE' => ['required','max:12','min:12',],
                'END_DATE' => ['required','max:12','min:12',],
                'IMAGE' => ['file','image','max:2048'],
                'PC_URL' => ['max:500',],
                'SP_URL' => ['max:500',],
                'PC_BLANK_FLG' => [],
                'SP_BLANK_FLG' => [],
                'PC_APPEAR_FLG' => [],
                'SP_APPEAR_FLG' => [],
                'VIEW_POINT' => ['required','max:2',],
                'BIG_FLAG' => [],
                'APPEAR_FLG' => [],
            ],
            "message" => [
            ],
        ];

        return $config[$type];
    }

    public function create_validate_config_after($request,$id = 0)
    {
        return [
            "config" => [
                'START_DATE' => [function ($attribute, $value, $fail) use($request,$id)  {
                    $start_date = $request->input('START_DATE');
                    $end_date = $request->input('END_DATE');

                    if($start_date > $end_date){
                        return $fail('開始日が終了日の日付より未来になっています');
                    }
                    
                    //日(時分つき)ごとに配列化
                    //初日は、START_DATEの時分
                    //最終日は、END_DATEの時分にする必要がある。
                    $start_ymd = date('Ymd',strtotime($start_date));
                    $start_hi = date('Hi',strtotime($start_date));
                    $end_ymd = date('Ymd',strtotime($end_date));
                    $end_hi = date('Hi',strtotime($end_date));
                    
                    $tmp_ymd = $start_ymd;
                    $date_array = [];
                    while($tmp_ymd <= $end_ymd){
                        if($tmp_ymd == $start_ymd){
                            $date_array[] = $tmp_ymd.$start_hi;
                        }else{
                            $date_array[] = $tmp_ymd.$end_hi;
                        }

                        $tmp_ymd = date('Ymd',strtotime('+1 day',strtotime($tmp_ymd)));
                    }

                    //該当日と重なるデータがあるか
                    foreach($date_array as $item){
                        $check = $this->TbTsuTopic->checkDuplicate($item,$request->input('VIEW_POINT'),$id);
                        
                        if($check){
                            return $fail('同じ表示順で重複する日付が存在します');
                        }
                    }
                }],
            ],
            "message" => [
            ],
        ];
    }

}