<?php

namespace App\Services\AdminKisya;

use App\Repositories\TbTsuYosoMessage\TbTsuYosoMessageRepositoryInterface;

class MessageService
{
    
    public $TbTsuYosoMessage;

    public function __construct(
        TbTsuYosoMessageRepositoryInterface $TbTsuYosoMessage
    ){
        $this->TbTsuYosoMessage = $TbTsuYosoMessage;
    }


    

    public function edit($request){

        $data = [];

        $data['message'] = $this->TbTsuYosoMessage->getFirstRecord();

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config();
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //保存処理
            $post_result = $this->TbTsuYosoMessage->updateRecord($request);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin_kisya/message';
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    

    public function change_appear_flg($request){
        $post_result = $this->TbTsuYosoMessage->changeAppearFlg($request);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin_kisya/message/';
        if($post_result){
            $data['redirect_message'] = 'データを更新しました';
        }else{
            $data['redirect_message'] = 'データの更新に失敗しました';
        }

        return $data;
    }

    public function create_validate_config()
    {
        return [
            'config' => [
                'START_DATE' => ['required','max:12','min:12'],
                'END_DATE' => ['required','max:12','min:12'],
                'SAMPLE1' => [],
                'SAMPLE2' => [],
                'SAMPLE3' => [],
                'COMMENT' => ['required','max:70'],
                'PC_APPEAR_FLG' => [],
                'SP_APPEAR_FLG' => [],
            ],
            'message' => [
            ],
        ];
    }

}