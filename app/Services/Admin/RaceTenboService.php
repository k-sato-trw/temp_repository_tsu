<?php

namespace App\Services\Admin;

use App\Repositories\TbRaceTenbo\TbRaceTenboRepositoryInterface;
use App\Repositories\TbRaceTenboExtra\TbRaceTenboExtraRepositoryInterface;

class RaceTenboService
{
    public $TbRaceTenbo;

    public function __construct(
        TbRaceTenboRepositoryInterface $TbRaceTenbo,
        TbRaceTenboExtraRepositoryInterface $TbRaceTenboExtra
    ){
        $this->TbRaceTenbo = $TbRaceTenbo;
        $this->TbRaceTenboExtra = $TbRaceTenboExtra;
    }

    
    public function create($id, $request){

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
            $post_result = $this->TbRaceTenbo->insertRecord($request,$id);
            $post_result2 = $this->TbRaceTenboExtra->insertRecord($request,$id);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = "admin/race_index/";
            if($post_result){
                $data['redirect_message'] = "データを更新しました";
            }else{
                $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
            }
            
        }

        return $data;
    }

    public function edit($id ,$request){
        $race_tenbo = $this->TbRaceTenbo->getFirstRecordByPK($id);

        $data['race_tenbo'] = $race_tenbo;

        if($request->isMethod('post')){
            //POST処理

            //バリデーション処理。失敗した場合は自動リダイレクト
            $validate_config = $this->create_validate_config();
            $request->validate(
                $validate_config['config'],
                $validate_config['message']
            );

            //保存処理
            $post_result = $this->TbRaceTenbo->UpdateRecordByPK($request,$id);
            $post_result2 = $this->TbRaceTenboExtra->UpdateRecordByPK($request,$id);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = "admin/race_index/";
            if($post_result){
                $data['redirect_message'] = "データを更新しました";
            }else{
                $data['redirect_message'] = "データに変更が無いか、もしくは処理を実行しませんでした";
            }


        }

        return $data;
    }

    public function delete($id){

        $post_result = $this->TbRaceTenbo->deleteFirstRecordByPK($id);

        $data['post_result'] = $post_result;
        $data['redirect_url'] = "admin/race_index/";
        if($post_result){
            $data['redirect_message'] = "データを削除しました";
        }else{
            $data['redirect_message'] = "データの削除に失敗しました";
        }
        
        return $data;
    }

    
    public function create_validate_config()
    {
        return [
            "config" => [
                'TITLE' => ['max:500',],
                'LETTER_BODY' => ['max:500',],
                'LEADTITLE' => ['max:500',],
                'LEADLETTER_BODY' => ['max:500',],

                'LEADER1' => ['nullable','digits:4'],
                'PICKUP_LEAD1' => ['max:500',],
                'PICKUP_SEISEKI_STANDARD_DATE1' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_DATE1_1' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_GRADE1_1' => ['max:8'],
                'PICKUP_SEISEKI_y_1_1' => ['max:64'],
                'PICKUP_SEISEKI_j_1_1' => ['max:64'],
                'PICKUP_SEISEKI_v_1_1' => ['max:64'],
                'PICKUP_SEISEKI_e_1_1' => ['max:64'],
                'PICKUP_SEISEKI_DATE1_2' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_GRADE1_2' => ['max:8'],
                'PICKUP_SEISEKI_y_1_2' => ['max:64'],
                'PICKUP_SEISEKI_j_1_2' => ['max:64'],
                'PICKUP_SEISEKI_v_1_2' => ['max:64'],
                'PICKUP_SEISEKI_e_1_2' => ['max:64'],
                'PICKUP_SEISEKI_DATE1_3' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_JYO1_3' => ['max:2'],
                'PICKUP_SEISEKI_GRADE1_3' => ['max:8'],
                'PICKUP_SEISEKI_y_1_3' => ['max:64'],
                'PICKUP_SEISEKI_j_1_3' => ['max:64'],
                'PICKUP_SEISEKI_v_1_3' => ['max:64'],
                'PICKUP_SEISEKI_e_1_3' => ['max:64'],
                'PICKUP_SEISEKI_DATE1_4' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_JYO1_4' => ['max:2'],
                'PICKUP_SEISEKI_GRADE1_4' => ['max:8'],
                'PICKUP_SEISEKI_y_1_4' => ['max:64'],
                'PICKUP_SEISEKI_j_1_4' => ['max:64'],
                'PICKUP_SEISEKI_v_1_4' => ['max:64'],
                'PICKUP_SEISEKI_e_1_4' => ['max:64'],

                'LEADER2' => ['nullable','digits:4'],
                'PICKUP_LEAD2' => ['max:500',],
                'PICKUP_SEISEKI_STANDARD_DATE2' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_DATE2_1' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_GRADE2_1' => ['max:8'],
                'PICKUP_SEISEKI_y_2_1' => ['max:64'],
                'PICKUP_SEISEKI_j_2_1' => ['max:64'],
                'PICKUP_SEISEKI_v_2_1' => ['max:64'],
                'PICKUP_SEISEKI_e_2_1' => ['max:64'],
                'PICKUP_SEISEKI_DATE2_2' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_GRADE2_2' => ['max:8'],
                'PICKUP_SEISEKI_y_2_2' => ['max:64'],
                'PICKUP_SEISEKI_j_2_2' => ['max:64'],
                'PICKUP_SEISEKI_v_2_2' => ['max:64'],
                'PICKUP_SEISEKI_e_2_2' => ['max:64'],
                'PICKUP_SEISEKI_DATE2_3' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_JYO2_3' => ['max:2'],
                'PICKUP_SEISEKI_GRADE2_3' => ['max:8'],
                'PICKUP_SEISEKI_y_2_3' => ['max:64'],
                'PICKUP_SEISEKI_j_2_3' => ['max:64'],
                'PICKUP_SEISEKI_v_2_3' => ['max:64'],
                'PICKUP_SEISEKI_e_2_3' => ['max:64'],
                'PICKUP_SEISEKI_DATE2_4' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_JYO2_4' => ['max:2'],
                'PICKUP_SEISEKI_GRADE2_4' => ['max:8'],
                'PICKUP_SEISEKI_y_2_4' => ['max:64'],
                'PICKUP_SEISEKI_j_2_4' => ['max:64'],
                'PICKUP_SEISEKI_v_2_4' => ['max:64'],
                'PICKUP_SEISEKI_e_2_4' => ['max:64'],
                
                'LEADER3' => ['nullable','digits:4'],
                'PICKUP_LEAD3' => ['max:500',],
                'PICKUP_SEISEKI_STANDARD_DATE3' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_DATE3_1' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_GRADE3_1' => ['max:8'],
                'PICKUP_SEISEKI_y_3_1' => ['max:64'],
                'PICKUP_SEISEKI_j_3_1' => ['max:64'],
                'PICKUP_SEISEKI_v_3_1' => ['max:64'],
                'PICKUP_SEISEKI_e_3_1' => ['max:64'],
                'PICKUP_SEISEKI_DATE3_2' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_GRADE3_2' => ['max:8'],
                'PICKUP_SEISEKI_y_3_2' => ['max:64'],
                'PICKUP_SEISEKI_j_3_2' => ['max:64'],
                'PICKUP_SEISEKI_v_3_2' => ['max:64'],
                'PICKUP_SEISEKI_e_3_2' => ['max:64'],
                'PICKUP_SEISEKI_DATE3_3' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_JYO3_3' => ['max:2'],
                'PICKUP_SEISEKI_GRADE3_3' => ['max:8'],
                'PICKUP_SEISEKI_y_3_3' => ['max:64'],
                'PICKUP_SEISEKI_j_3_3' => ['max:64'],
                'PICKUP_SEISEKI_v_3_3' => ['max:64'],
                'PICKUP_SEISEKI_e_3_3' => ['max:64'],
                'PICKUP_SEISEKI_DATE3_4' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_JYO3_4' => ['max:2'],
                'PICKUP_SEISEKI_GRADE3_4' => ['max:8'],
                'PICKUP_SEISEKI_y_3_4' => ['max:64'],
                'PICKUP_SEISEKI_j_3_4' => ['max:64'],
                'PICKUP_SEISEKI_v_3_4' => ['max:64'],
                'PICKUP_SEISEKI_e_3_4' => ['max:64'],
                
                'LEADER4' => ['nullable','digits:4'],
                'PICKUP_LEAD4' => ['max:500',],
                'PICKUP_SEISEKI_STANDARD_DATE4' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_DATE4_1' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_GRADE4_1' => ['max:8'],
                'PICKUP_SEISEKI_y_4_1' => ['max:64'],
                'PICKUP_SEISEKI_j_4_1' => ['max:64'],
                'PICKUP_SEISEKI_v_4_1' => ['max:64'],
                'PICKUP_SEISEKI_e_4_1' => ['max:64'],
                'PICKUP_SEISEKI_DATE4_2' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_GRADE4_2' => ['max:8'],
                'PICKUP_SEISEKI_y_4_2' => ['max:64'],
                'PICKUP_SEISEKI_j_4_2' => ['max:64'],
                'PICKUP_SEISEKI_v_4_2' => ['max:64'],
                'PICKUP_SEISEKI_e_4_2' => ['max:64'],
                'PICKUP_SEISEKI_DATE4_3' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_JYO4_3' => ['max:2'],
                'PICKUP_SEISEKI_GRADE4_3' => ['max:8'],
                'PICKUP_SEISEKI_y_4_3' => ['max:64'],
                'PICKUP_SEISEKI_j_4_3' => ['max:64'],
                'PICKUP_SEISEKI_v_4_3' => ['max:64'],
                'PICKUP_SEISEKI_e_4_3' => ['max:64'],
                'PICKUP_SEISEKI_DATE4_4' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_JYO4_4' => ['max:2'],
                'PICKUP_SEISEKI_GRADE4_4' => ['max:8'],
                'PICKUP_SEISEKI_y_4_4' => ['max:64'],
                'PICKUP_SEISEKI_j_4_4' => ['max:64'],
                'PICKUP_SEISEKI_v_4_4' => ['max:64'],
                'PICKUP_SEISEKI_e_4_4' => ['max:64'],
                
                'LEADER5' => ['nullable','digits:4'],
                'PICKUP_LEAD5' => ['max:500',],
                'PICKUP_SEISEKI_STANDARD_DATE5' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_DATE5_1' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_GRADE5_1' => ['max:8'],
                'PICKUP_SEISEKI_y_5_1' => ['max:64'],
                'PICKUP_SEISEKI_j_5_1' => ['max:64'],
                'PICKUP_SEISEKI_v_5_1' => ['max:64'],
                'PICKUP_SEISEKI_e_5_1' => ['max:64'],
                'PICKUP_SEISEKI_DATE5_2' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_GRADE5_2' => ['max:8'],
                'PICKUP_SEISEKI_y_5_2' => ['max:64'],
                'PICKUP_SEISEKI_j_5_2' => ['max:64'],
                'PICKUP_SEISEKI_v_5_2' => ['max:64'],
                'PICKUP_SEISEKI_e_5_2' => ['max:64'],
                'PICKUP_SEISEKI_DATE5_3' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_JYO5_3' => ['max:2'],
                'PICKUP_SEISEKI_GRADE5_3' => ['max:8'],
                'PICKUP_SEISEKI_y_5_3' => ['max:64'],
                'PICKUP_SEISEKI_j_5_3' => ['max:64'],
                'PICKUP_SEISEKI_v_5_3' => ['max:64'],
                'PICKUP_SEISEKI_e_5_3' => ['max:64'],
                'PICKUP_SEISEKI_DATE5_4' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_JYO5_4' => ['max:2'],
                'PICKUP_SEISEKI_GRADE5_4' => ['max:8'],
                'PICKUP_SEISEKI_y_5_4' => ['max:64'],
                'PICKUP_SEISEKI_j_5_4' => ['max:64'],
                'PICKUP_SEISEKI_v_5_4' => ['max:64'],
                'PICKUP_SEISEKI_e_5_4' => ['max:64'],
                
                'LEADER6' => ['nullable','digits:4'],
                'PICKUP_LEAD6' => ['max:500',],
                'PICKUP_SEISEKI_STANDARD_DATE6' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_DATE6_1' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_GRADE6_1' => ['max:8'],
                'PICKUP_SEISEKI_y_6_1' => ['max:64'],
                'PICKUP_SEISEKI_j_6_1' => ['max:64'],
                'PICKUP_SEISEKI_v_6_1' => ['max:64'],
                'PICKUP_SEISEKI_e_6_1' => ['max:64'],
                'PICKUP_SEISEKI_DATE6_2' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_GRADE6_2' => ['max:8'],
                'PICKUP_SEISEKI_y_6_2' => ['max:64'],
                'PICKUP_SEISEKI_j_6_2' => ['max:64'],
                'PICKUP_SEISEKI_v_6_2' => ['max:64'],
                'PICKUP_SEISEKI_e_6_2' => ['max:64'],
                'PICKUP_SEISEKI_DATE6_3' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_JYO6_3' => ['max:2'],
                'PICKUP_SEISEKI_GRADE6_3' => ['max:8'],
                'PICKUP_SEISEKI_y_6_3' => ['max:64'],
                'PICKUP_SEISEKI_j_6_3' => ['max:64'],
                'PICKUP_SEISEKI_v_6_3' => ['max:64'],
                'PICKUP_SEISEKI_e_6_3' => ['max:64'],
                'PICKUP_SEISEKI_DATE6_4' => ['nullable','digits:8'],
                'PICKUP_SEISEKI_JYO6_4' => ['max:2'],
                'PICKUP_SEISEKI_GRADE6_4' => ['max:8'],
                'PICKUP_SEISEKI_y_6_4' => ['max:64'],
                'PICKUP_SEISEKI_j_6_4' => ['max:64'],
                'PICKUP_SEISEKI_v_6_4' => ['max:64'],
                'PICKUP_SEISEKI_e_6_4' => ['max:64'],

                'EDITOR_NAME' => ['required','max:64'],

            ],
            "message" => [
            ],
        ];
    }


}