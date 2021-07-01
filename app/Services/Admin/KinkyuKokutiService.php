<?php

namespace App\Services\Admin;

use App\Repositories\TbTsuKinkyuKokuti\TbTsuKinkyuKokutiRepositoryInterface;

class KinkyuKokutiService
{
    public $TbTsuKinkyuKokuti;

    public function __construct(
        TbTsuKinkyuKokutiRepositoryInterface $TbTsuKinkyuKokuti
    ){
        $this->TbTsuKinkyuKokuti = $TbTsuKinkyuKokuti;
    }


    public function index($request){

        $year = $request->input('year') ?? date("Y");
        $data['year'] = $year;

        $yaer_options = ["" => ""];
        for($i=2015 ; $i <= date('Y') ; $i++){
            $yaer_options[$i] = $i;
        }
        $data['yaer_options'] = $yaer_options;

        $kinkyu_kokuti = $this->TbTsuKinkyuKokuti->getAllRecord($year,10);

        $data['kinkyu_kokuti'] = $kinkyu_kokuti;

        return $data;
    }

    public function view($id){
        $kinkyu_kokuti = $this->TbTsuKinkyuKokuti->getFirstRecordByPK($id);
        $data['kinkyu_kokuti'] = $kinkyu_kokuti;
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

            //保存処理
            $post_result = $this->TbTsuKinkyuKokuti->insertRecord($request);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin/kinkyu_kokuti/';
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    public function edit($id, $request){

        $kinkyu_kokuti = $this->TbTsuKinkyuKokuti->getFirstRecordByPK($id);

        $data['kinkyu_kokuti'] = $kinkyu_kokuti;

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config();
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //保存処理
            $post_result = $this->TbTsuKinkyuKokuti->UpdateRecordByPK($request,$id);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin/kinkyu_kokuti/';
            if($post_result){
                $data['redirect_message'] = 'データを更新しました';
            }else{
                $data['redirect_message'] = 'データに変更が無いか、もしくは処理を実行しませんでした';
            }

        }

        return $data;
    }

    public function delete($id){
        $post_result = $this->TbTsuKinkyuKokuti->deleteFirstRecordByPK($id);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = 'admin/kinkyu_kokuti/';
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
                'START_DATE' => ['required','max:12','min:12',],
                'END_DATE' => ['required','max:12','min:12',],
                'TITLE' => ['required','max:512',],
                'HONBUN' => ['required','max:5000',],
                'PC_FLG' => [],
                'SP_FLG' => [],
                'MB_FLG' => [],
                'EDITOR_NAME' => ['required','max:64',],
                'APPEAR_FLG' => [],
            ],
            'message' => [
            ],
        ];
    }

}