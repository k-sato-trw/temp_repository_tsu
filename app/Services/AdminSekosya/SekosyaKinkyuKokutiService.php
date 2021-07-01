<?php

namespace App\Services\AdminSekosya;

use App\Repositories\TbTsuKinkyuKokuti\TbTsuKinkyuKokutiRepositoryInterface;
use App\Services\GeneralService;
use App\Library\ExchangeText;


class SekosyaKinkyuKokutiService
{
    public $TbTsuKinkyuKokuti;
    public $General;
    public $ExchangeText;

    public function __construct(
        TbTsuKinkyuKokutiRepositoryInterface $TbTsuKinkyuKokuti,
        GeneralService $GeneralService,
        ExchangeText $ExchangeText
    ){
        $this->TbTsuKinkyuKokuti = $TbTsuKinkyuKokuti;
        $this->General = $GeneralService;
        $this->ExchangeText = $ExchangeText;
    }


    public function index($request){
        //現存する年リスト
        $result = $this->TbTsuKinkyuKokuti->getYearList();
        $year_list = [];
        foreach($result as $item){
            if($item->VIEW_YEAR >= 2019){
                $year_list[] = $item->VIEW_YEAR;
            }
        }
        if(!$year_list){
            $year_list[] = date('Y');
        }
        $data['year_list'] = $year_list;
        
        $year = $request->input('year') ?? $year_list[0];
        $data['target_year'] = $year;

        $kinkyu_kokuti = $this->TbTsuKinkyuKokuti->getRecordByYear($year);

        $data['kinkyu_kokuti'] = $kinkyu_kokuti;
        $data['week_label'] = $this->General->create_week_label();

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

            //保存処理
            $post_result = $this->TbTsuKinkyuKokuti->insertRecordForAdminSekosya($request);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin_sekosya/kinkyu_kokuti/';
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


            //保存処理
            $post_result = $this->TbTsuKinkyuKokuti->UpdateRecordForAdminSekosya($request,$id);

            $data['post_result'] = $post_result;
            $data['redirect_url'] = 'admin_sekosya/kinkyu_kokuti/';
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
        $data['redirect_url'] = 'admin_sekosya/kinkyu_kokuti/';
        if($post_result){
            $data['redirect_message'] = 'データを削除しました';
        }else{
            $data['redirect_message'] = 'データの削除に失敗しました';
        }

        return $data;
    }

    

    public function change_appear_flg($id,$appear_flg){

        $data['redirect_url'] = 'admin_sekosya/kinkyu_kokuti/edit/'.$id;

        $post_result = $this->TbTsuKinkyuKokuti->changeAppearFlg($id,$appear_flg);

        $data['post_result'] = $post_result;
        if($post_result){
            $data['redirect_message'] = '指定データの掲載フラグを変更しました';
        }else{
            $data['redirect_message'] = '掲載フラグの変更に失敗しました';
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