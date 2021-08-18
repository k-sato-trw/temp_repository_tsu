<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Repositories\ChushiJunen\ChushiJunenRepositoryInterface;
use App\Repositories\TbTsuYosoAshi\TbTsuYosoAshiRepositoryInterface;
use App\Repositories\TbTsuYoso\TbTsuYosoRepositoryInterface;
use App\Repositories\TbTsuYosoHighlight\TbTsuYosoHighlightRepositoryInterface;


class CopyYosoController extends Controller
{
    public $ChushiJunen;
    public $TbTsuYosoAshi;
    public $TbTsuYoso;
    public $TbTsuYosoHighlight;

    public function __construct(
        ChushiJunenRepositoryInterface $ChushiJunen,
        TbTsuYosoAshiRepositoryInterface $TbTsuYosoAshi,
        TbTsuYosoRepositoryInterface $TbTsuYoso,
        TbTsuYosoHighlightRepositoryInterface $TbTsuYosoHighlight
    ){
        $this->ChushiJunen = $ChushiJunen;
        $this->TbTsuYosoAshi = $TbTsuYosoAshi;
        $this->TbTsuYoso = $TbTsuYoso;
        $this->TbTsuYosoHighlight = $TbTsuYosoHighlight;
    }



    public function copy(Request $request)
    {
        $strJyoCode = config('const.JYO_CODE');
        $strNowYD = date('Ymd');
        //$strNowYD = '20210620';
        $strTomorrowYD = date('Ymd' ,strtotime('+1 day',strtotime($strNowYD)));
        $strNowTime = date('Hi');
        $strUpdateTime = date('YmdHi');

        
        if($strNowTime >= '1400'){
            $ChushiJunen = $this->ChushiJunen->getFirstRecordForFront($strJyoCode,$strNowYD);

            if($ChushiJunen){
                $reselt_ashi = $this->TbTsuYosoAshi->copyTomorrow($strNowYD,$strTomorrowYD);
                $reselt_yoso = $this->TbTsuYoso->copyTomorrow($strNowYD,$strTomorrowYD);
                $reselt_highlight = $this->TbTsuYosoHighlight->copyTomorrow($strNowYD,$strTomorrowYD);

                if($reselt_ashi && $reselt_yoso && $reselt_highlight){
                    return 'コピー完了';
                }else{
                    return '一部または全てのコピーが中止されました';
                }
            }else{
                return '中止無のため処理しません';
            }

            
        }else{
            return '処理時間外のため処理しません';
        }

       

    }


}