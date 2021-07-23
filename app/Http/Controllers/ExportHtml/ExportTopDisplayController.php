<?php

namespace App\Http\Controllers\ExportHtml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\ExportHtml\ExportTopDisplayService;

class ExportTopDisplayController extends Controller
{
    public $_service;


    public function __construct(
        ExportTopDisplayService $ExportTopDisplayService
    ){
        $this->_service = $ExportTopDisplayService;
    }

    public function index(Request $request)
    {

        //サービスクラスで処理。
        $data = $this->_service->index($request);

        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/index.htm', view('front.top_display.index',$data));
        return '書き出し完了<br><a href="/index.htm">/index.htm</a>';

    }

    public function index_race_info(Request $request)
    {

        //サービスクラスで処理。
        $data = $this->_service->index_race_info($request);

        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/tsu/topdisplay/indexRaceInfo.htm', view('front.top_display.index_race_info',$data));
        return '書き出し完了<br><a href="/asp/tsu/topdisplay/indexRaceInfo.htm">/asp/tsu/topdisplay/indexRaceInfo.htm</a>';

    }

    public function index_kaisai_jokyo(Request $request)
    {

        //サービスクラスで処理。
        $data = $this->_service->index_kaisai_jokyo($request);

        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/tsu/topdisplay/indexKaisaiJokyo.htm', view('front.top_display.index_kaisai_jokyo',$data));
        return '書き出し完了<br><a href="/asp/tsu/topdisplay/indexKaisaiJokyo.htm">/asp/tsu/topdisplay/indexKaisaiJokyo.htm</a>';

    }

    public function top_race_movie(Request $request)
    {

        //サービスクラスで処理。
        $data = $this->_service->top_race_movie($request);

        $message = "";

        //ソースを受け取り静的に書き出し処理
        File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/top_race_movie.htm', view('front.top_display.top_race_movie',$data));
        $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/top_race_movie.htm">/asp/kyogi/09/pc/top_race_movie.htm</a><br>';

        //同様のデータを使用するので、同時出力
        File::put(config('const.EXPORT_PATH').'/asp/kyogi/09/pc/top_race_movie_reload.htm', view('front.top_display.top_race_movie_reload',$data));
        $message .= '書き出し完了<br><a href="/asp/kyogi/09/pc/top_race_movie_reload.htm">/asp/kyogi/09/pc/top_race_movie_reload.htm</a>';

        return $message;
    }



}