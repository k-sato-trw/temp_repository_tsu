<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\KinkyuKokutiController;
use App\Http\Controllers\Admin\AssenController;
use App\Http\Controllers\Admin\RaceIndexController;
use App\Http\Controllers\Admin\RaceTenboController;
use App\Http\Controllers\Admin\SyutujoRacerController;
use App\Http\Controllers\Admin\RacerImageController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\EventFanMasterController;
use App\Http\Controllers\Admin\MailMagazineController;


use App\Http\Controllers\AdminSekosyaController;
use App\Http\Controllers\AdminSekosya\TokutenController;
use App\Http\Controllers\AdminSekosya\SekosyaInformationController;
use App\Http\Controllers\AdminSekosya\SekosyaKinkyuKokutiController;
use App\Http\Controllers\AdminSekosya\KaimonController;

//use App\Http\Controllers\Api\GetDateTextController;
use App\Http\Controllers\Api\GetKinkyoController;

//フロント
use App\Http\Controllers\Front\FrontJsController;
use App\Http\Controllers\Front\FrontInfoController;

//フロントSP
use App\Http\Controllers\Front\Sp\SpKyogiController;
use App\Http\Controllers\Front\Sp\SpEventController;
use App\Http\Controllers\Front\Sp\SpInfoController;
use App\Http\Controllers\Front\Sp\SpCalController;


//書き出しPC
use App\Http\Controllers\ExportHtml\ExportTopDisplayController;
use App\Http\Controllers\ExportHtml\ExportKaisaiController;
use App\Http\Controllers\ExportHtml\ExportSuimenController;
use App\Http\Controllers\ExportHtml\ExportEventController;
use App\Http\Controllers\ExportHtml\ExportMeikanController;
use App\Http\Controllers\ExportHtml\ExportInfoController;
use App\Http\Controllers\ExportHtml\ExportMotorController;
use App\Http\Controllers\ExportHtml\ExportCalController;

use App\Http\Controllers\ExportHtml\ExportTenboController;
use App\Http\Controllers\ExportHtml\ExportSyutujoController;



//書き出しSP
use App\Http\Controllers\ExportHtml\Sp\ExportSpKaisaiController;
use App\Http\Controllers\ExportHtml\Sp\ExportSpSuimenController;
use App\Http\Controllers\ExportHtml\Sp\ExportSpMeikanController;
use App\Http\Controllers\ExportHtml\Sp\ExportSpMotorController;

use App\Http\Controllers\ExportHtml\Sp\ExportSpTenboController;
use App\Http\Controllers\ExportHtml\Sp\ExportSpSyutujoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/api/get_date_text/datetime', [GetDateTextController::class, 'datetime']);
//Route::get('/api/get_date_text/date', [GetDateTextController::class, 'date']);
Route::get('/api/get_kinkyo/json', [GetKinkyoController::class, 'json']);

//admin系
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/index', [AdminController::class, 'index']);
Route::get('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/logout', [AdminController::class, 'logout']);


//admin ニュース管理ページ
Route::get('/admin/information', [InformationController::class, 'index']);
Route::get('/admin/information/view/{id}', [InformationController::class, 'view']);
Route::get('/admin/information/edit/{id}', [InformationController::class, 'edit']);
Route::post('/admin/information/edit/{id}', [InformationController::class, 'edit']);
Route::get('/admin/information/create', [InformationController::class, 'create']);
Route::post('/admin/information/create', [InformationController::class, 'create']);
Route::get('/admin/information/delete/{id}', [InformationController::class, 'delete']);


//admin 緊急告知管理ページ
Route::get('/admin/kinkyu_kokuti', [KinkyuKokutiController::class, 'index']);
Route::get('/admin/kinkyu_kokuti/view/{id}', [KinkyuKokutiController::class, 'view']);
Route::get('/admin/kinkyu_kokuti/edit/{id}', [KinkyuKokutiController::class, 'edit']);
Route::post('/admin/kinkyu_kokuti/edit/{id}', [KinkyuKokutiController::class, 'edit']);
Route::get('/admin/kinkyu_kokuti/create', [KinkyuKokutiController::class, 'create']);
Route::post('/admin/kinkyu_kokuti/create', [KinkyuKokutiController::class, 'create']);
Route::get('/admin/kinkyu_kokuti/delete/{id}', [KinkyuKokutiController::class, 'delete']);


//admin 選手管理ページ
Route::get('/admin/assen', [AssenController::class, 'index']);
Route::get('/admin/assen/view/{touban}', [AssenController::class, 'view']);
Route::get('/admin/assen/edit/{id}', [AssenController::class, 'edit']);
Route::post('/admin/assen/edit/{id}', [AssenController::class, 'edit']);
Route::get('/admin/assen/create', [AssenController::class, 'create']);
Route::post('/admin/assen/create', [AssenController::class, 'create']);
Route::get('/admin/assen/create_assen/{touban}', [AssenController::class, 'create_assen']);
Route::post('/admin/assen/create_assen/{touban}', [AssenController::class, 'create_assen']);
Route::get('/admin/assen/delete/{touban}', [AssenController::class, 'delete']);
Route::get('/admin/assen/delete_assen/{id}', [AssenController::class, 'delete_assen']);

//admin レースインデックス
Route::get('/admin/race_index', [RaceIndexController::class, 'index']);
Route::get('/admin/race_index/edit/{id}', [RaceIndexController::class, 'edit']);
Route::post('/admin/race_index/edit/{id}', [RaceIndexController::class, 'edit']);
Route::get('/admin/race_index/create', [RaceIndexController::class, 'create']);
Route::post('/admin/race_index/create', [RaceIndexController::class, 'create']);
Route::get('/admin/race_index/delete/{id}', [RaceIndexController::class, 'delete']);
/*
Route::get('/admin/race_index/preview/tenbo/pc/{id}', [RaceIndexController::class, 'preview_tenbo_pc']);
Route::get('/admin/race_index/preview/tenbo/sp/{id}', [RaceIndexController::class, 'preview_tenbo_sp']);
Route::get('/admin/race_index/preview/syutujo/pc/{id}', [RaceIndexController::class, 'preview_syutujo_pc']);
Route::get('/admin/race_index/preview/syutujo/sp/{id}', [RaceIndexController::class, 'preview_syutujo_sp']);
*/

//admin レース展望
Route::get('/admin/race_tenbo/edit/{id}', [RaceTenboController::class, 'edit']);
Route::post('/admin/race_tenbo/edit/{id}', [RaceTenboController::class, 'edit']);
Route::get('/admin/race_tenbo/create/{id}', [RaceTenboController::class, 'create']);
Route::post('/admin/race_tenbo/create/{id}', [RaceTenboController::class, 'create']);
Route::get('/admin/race_tenbo/delete/{id}', [RaceTenboController::class, 'delete']);

//admin 出場予定選手
Route::get('/admin/syutujo_racer', [SyutujoRacerController::class, 'index']);
Route::get('/admin/syutujo_racer/view/{id}', [SyutujoRacerController::class, 'view']);
Route::get('/admin/syutujo_racer/edit/{id}/{touban}', [SyutujoRacerController::class, 'edit']);
Route::post('/admin/syutujo_racer/edit/{id}/{touban}', [SyutujoRacerController::class, 'edit']);
Route::get('/admin/syutujo_racer/create/{id}', [SyutujoRacerController::class, 'create']);
Route::post('/admin/syutujo_racer/create/{id}', [SyutujoRacerController::class, 'create']);
Route::get('/admin/syutujo_racer/delete/{id}/{touban}', [SyutujoRacerController::class, 'delete']);
Route::get('/admin/syutujo_racer/delete_yoso/{id}/{touban}', [SyutujoRacerController::class, 'delete_yoso']);
Route::post('/admin/syutujo_racer/update_yoso/{id}', [SyutujoRacerController::class, 'update_yoso']);
Route::post('/admin/syutujo_racer/upsert_syutujo/{id}', [SyutujoRacerController::class, 'upsert_syutujo']);


//admin レーサー画像ページ
Route::get('/admin/racer_image', [RacerImageController::class, 'index']);
Route::get('/admin/racer_image/view/{id}', [RacerImageController::class, 'view']);
Route::get('/admin/racer_image/edit/{id}', [RacerImageController::class, 'edit']);
Route::post('/admin/racer_image/edit/{id}', [RacerImageController::class, 'edit']);
Route::get('/admin/racer_image/create', [RacerImageController::class, 'create']);
Route::post('/admin/racer_image/create', [RacerImageController::class, 'create']);
Route::get('/admin/racer_image/delete/{id}', [RacerImageController::class, 'delete']);


//admin バナー登録ページ
Route::get('/admin/banner', [BannerController::class, 'index']);
Route::get('/admin/banner/view/{id}', [BannerController::class, 'view']);
Route::get('/admin/banner/edit/{id}', [BannerController::class, 'edit']);
Route::post('/admin/banner/edit/{id}', [BannerController::class, 'edit']);
Route::get('/admin/banner/create', [BannerController::class, 'create']);
Route::post('/admin/banner/create', [BannerController::class, 'create']);
Route::get('/admin/banner/delete/{id}', [BannerController::class, 'delete']);

//Route::get('/admin/banner/preview', [BannerController::class, 'preview']);


//admin バナー登録ページ
Route::get('/admin/topic', [TopicController::class, 'index']);
Route::get('/admin/topic/view/{id}', [TopicController::class, 'view']);
Route::get('/admin/topic/edit/{id}', [TopicController::class, 'edit']);
Route::post('/admin/topic/edit/{id}', [TopicController::class, 'edit']);
Route::get('/admin/topic/create', [TopicController::class, 'create']);
Route::post('/admin/topic/create', [TopicController::class, 'create']);
Route::get('/admin/topic/delete/{id}', [TopicController::class, 'delete']);



//admin カレンダーページ
Route::get('/admin/calendar', [CalendarController::class, 'index']);
Route::get('/admin/calendar/create/{mode}/{target_date}/{target_line}', [CalendarController::class, 'create']);
Route::post('/admin/calendar/create/{mode}/{target_date}/{target_line}', [CalendarController::class, 'create']);
Route::get('/admin/calendar/edit/{mode}/{id}', [CalendarController::class, 'edit']);
Route::post('/admin/calendar/edit/{mode}/{id}', [CalendarController::class, 'edit']);
Route::get('/admin/calendar/delete/{id}', [CalendarController::class, 'delete']);
Route::post('/admin/calendar/change_appear_flg', [CalendarController::class, 'change_appear_flg']);
Route::post('/admin/calendar/upsert_month_info', [CalendarController::class, 'upsert_month_info']);
/*
Route::get('/admin/calendar/preview', [CalendarController::class, 'preview']);
Route::get('/admin/calendar/preview_middle', [CalendarController::class, 'preview_middle']);
Route::get('/admin/calendar/preview_sp', [CalendarController::class, 'preview_sp']);
*/

//admin イベントファンマスター
Route::get('/admin/event_fan_master/{id}', [EventFanMasterController::class, 'index_view']);
Route::get('/admin/event_fan_master/edit/{id}/{sub_id}', [EventFanMasterController::class, 'edit']);
Route::post('/admin/event_fan_master/edit/{id}/{sub_id}', [EventFanMasterController::class, 'edit']);
Route::get('/admin/event_fan_master/create/{id}', [EventFanMasterController::class, 'create']);
Route::post('/admin/event_fan_master/create/{id}', [EventFanMasterController::class, 'create']);
Route::get('/admin/event_fan_master/delete/{id}/{sub_id}', [EventFanMasterController::class, 'delete']);

Route::get('/admin/event_fan_master/edit_event_fan/{id}/{sub_id}/{third_id}', [EventFanMasterController::class, 'edit_event_fan']);
Route::post('/admin/event_fan_master/edit_event_fan/{id}/{sub_id}/{third_id}', [EventFanMasterController::class, 'edit_event_fan']);
Route::get('/admin/event_fan_master/create_event_fan/{id}/{sub_id}', [EventFanMasterController::class, 'create_event_fan']);
Route::post('/admin/event_fan_master/create_event_fan/{id}/{sub_id}', [EventFanMasterController::class, 'create_event_fan']);
Route::get('/admin/event_fan_master/delete_event_fan/{id}/{sub_id}/{third_id}', [EventFanMasterController::class, 'delete_event_fan']);


//admin メールマガジン
Route::get('/admin/mail_magazine', [MailMagazineController::class, 'index']);
Route::get('/admin/mail_magazine/edit/{target_date}/{id}', [MailMagazineController::class, 'edit']);
Route::post('/admin/mail_magazine/edit/{target_date}/{id}', [MailMagazineController::class, 'edit']);
Route::get('/admin/mail_magazine/create/{target_date}', [MailMagazineController::class, 'create']);
Route::post('/admin/mail_magazine/create/{target_date}', [MailMagazineController::class, 'create']);

Route::get('/asp/tbk/racersearch/js/makePlayerJS.js', [FrontJsController::class, 'make_player']);



//admin_sekosya系
Route::get('/admin_sekosya', [AdminSekosyaController::class, 'index']);
Route::get('/admin_sekosya/index', [AdminSekosyaController::class, 'index']);
Route::get('/admin_sekosya/login', [AdminSekosyaController::class, 'login']);
Route::post('/admin_sekosya/login', [AdminSekosyaController::class, 'login']);
Route::get('/admin_sekosya/logout', [AdminSekosyaController::class, 'logout']);

//admin_sekosya系 得点率アップロードページ
Route::get('/admin_sekosya/tokuten', [TokutenController::class, 'index']);
Route::post('/admin_sekosya/tokuten', [TokutenController::class, 'index']);
Route::post('/admin_sekosya/tokuten/change_appear_flg/{appear_flg}', [TokutenController::class, 'change_appear_flg']);


//admin_sekosya系 インフォメーションページ
Route::get('/admin_sekosya/information', [SekosyaInformationController::class, 'index']);
Route::get('/admin_sekosya/information/edit/{id}', [SekosyaInformationController::class, 'edit']);
Route::post('/admin_sekosya/information/edit/{id}', [SekosyaInformationController::class, 'edit']);
Route::get('/admin_sekosya/information/create', [SekosyaInformationController::class, 'create']);
Route::post('/admin_sekosya/information/create', [SekosyaInformationController::class, 'create']);
Route::get('/admin_sekosya/information/delete/{id}', [SekosyaInformationController::class, 'delete']);
Route::get('/admin_sekosya/information/change_appear_flg/{id}/{appear_flg}', [SekosyaInformationController::class, 'change_appear_flg']);


//admin_sekosya系 緊急告知管理ページ
Route::get('/admin_sekosya/kinkyu_kokuti', [SekosyaKinkyuKokutiController::class, 'index']);
Route::get('/admin_sekosya/kinkyu_kokuti/edit/{id}', [SekosyaKinkyuKokutiController::class, 'edit']);
Route::post('/admin_sekosya/kinkyu_kokuti/edit/{id}', [SekosyaKinkyuKokutiController::class, 'edit']);
Route::get('/admin_sekosya/kinkyu_kokuti/create', [SekosyaKinkyuKokutiController::class, 'create']);
Route::post('/admin_sekosya/kinkyu_kokuti/create', [SekosyaKinkyuKokutiController::class, 'create']);
Route::get('/admin_sekosya/kinkyu_kokuti/delete/{id}', [SekosyaKinkyuKokutiController::class, 'delete']);
Route::get('/admin_sekosya/kinkyu_kokuti/change_appear_flg/{id}/{appear_flg}', [SekosyaKinkyuKokutiController::class, 'change_appear_flg']);


//admin_sekosya系 開門時間
Route::get('/admin_sekosya/kaimon', [KaimonController::class, 'index']);
Route::get('/admin_sekosya/kaimon/edit/{target_date}', [KaimonController::class, 'edit']);
Route::post('/admin_sekosya/kaimon/edit/{target_date}', [KaimonController::class, 'edit']);
Route::get('/admin_sekosya/kaimon/create/{target_date}', [KaimonController::class, 'create']);
Route::post('/admin_sekosya/kaimon/create/{target_date}', [KaimonController::class, 'create']);
Route::post('/admin_sekosya/kaimon/delete', [KaimonController::class, 'delete']);
Route::get('/admin_sekosya/kaimon/change_appear_flg/{target_year_month}/{appear_flg}', [KaimonController::class, 'change_appear_flg']);


//フロントPC
Route::get('/asp/tsu/info/info.asp',        [FrontInfoController::class, 'index']);


//フロントSP
Route::get('/asp/tsu/sp/kyogi/Odds_Calc.asp',        [SpKyogiController::class, 'odds_calc']);
Route::post('/asp/tsu/sp/kyogi/Odds_Calc.asp',        [SpKyogiController::class, 'odds_calc']);

Route::get('/asp/tsu/sp/kyogi/index.asp',        [SpKyogiController::class, 'index']);
Route::post('/asp/tsu/sp/kyogi/index.asp',        [SpKyogiController::class, 'index']);

Route::get('/asp/tsu/sp/kyogi/Movie.asp',        [SpKyogiController::class, 'movie']);
Route::get('/asp/tsu/sp/kyogi/Movie_Tenji.asp',        [SpKyogiController::class, 'movie_tenji']);
Route::get('/asp/tsu/sp/kyogi/Movie_Live.asp',        [SpKyogiController::class, 'movie_live']);


Route::get('/asp/tsu/sp/04event/04event_SP.asp',        [SpEventController::class, 'index']);
Route::get('/asp/tsu/sp/info/info_SP.asp',        [SpInfoController::class, 'index']);
Route::get('/asp/tsu/sp/01cal/01cal.asp',        [SpCalController::class, 'index']);

    


//書き出しPC

    //topページ系
Route::get('/asp/tsu/topdisplay/indexRaceInfo.asp',        [ExportTopDisplayController::class, 'index_race_info']);
Route::get('/asp/tsu/topdisplay/indexKaisaiJokyo.asp',        [ExportTopDisplayController::class, 'index_kaisai_jokyo']);
Route::get('/asp/tsu/topdisplay/top_race_movie.asp',        [ExportTopDisplayController::class, 'top_race_movie']);


    //開催系
Route::get('/asp/tsu/kaisai/kaisaiindex.asp',        [ExportKaisaiController::class, 'kaisai_index']);


Route::get('/asp/tsu/kaisai/syusso01.asp',        [ExportKaisaiController::class, 'syussou01']);
Route::get('/asp/tsu/kaisai/syusso02.asp',        [ExportKaisaiController::class, 'syussou02']);
Route::get('/asp/tsu/kaisai/syusso03.asp',        [ExportKaisaiController::class, 'syussou03']);
Route::get('/asp/tsu/kaisai/syusso04.asp',        [ExportKaisaiController::class, 'syussou04']);
Route::get('/asp/tsu/kaisai/syusso04.asp',        [ExportKaisaiController::class, 'syussou04']);
Route::get('/asp/tsu/kaisai/odds01.asp',          [ExportKaisaiController::class, 'odds01']);
Route::get('/asp/tsu/kaisai/odds02.asp',          [ExportKaisaiController::class, 'odds02']);
Route::get('/asp/tsu/kaisai/odds03.asp',          [ExportKaisaiController::class, 'odds03']);
Route::get('/asp/tsu/kaisai/odds04.asp',          [ExportKaisaiController::class, 'odds04']);
Route::get('/asp/tsu/kaisai/yoso01.asp',          [ExportKaisaiController::class, 'yoso01']);
Route::get('/asp/tsu/kaisai/yoso01st.asp',        [ExportKaisaiController::class, 'yoso01st']);
Route::get('/asp/tsu/kaisai/yoso02.asp',          [ExportKaisaiController::class, 'yoso02']);
Route::get('/asp/tsu/kaisai/st01.asp',            [ExportKaisaiController::class, 'st01']);
Route::get('/asp/tsu/kaisai/kekka01.asp',            [ExportKaisaiController::class, 'kekka01']);


Route::get('/asp/tsu/kaisai/replay_list.asp',        [ExportKaisaiController::class, 'replay_list']);
Route::get('/asp/tsu/kaisai/race_telop.asp',        [ExportKaisaiController::class, 'race_telop']);
Route::get('/asp/tsu/kaisai/race_sub.asp',        [ExportKaisaiController::class, 'race_sub']);
Route::get('/asp/tsu/kaisai/race_data.asp',        [ExportKaisaiController::class, 'race_data']);
Route::get('/asp/tsu/kaisai/race_movie.asp',        [ExportKaisaiController::class, 'race_movie']);
Route::get('/asp/tsu/kaisai/race_movie_reload.asp',        [ExportKaisaiController::class, 'race_movie_reload']);


Route::get('/asp/tsu/kaisai/setu_kekka.asp',        [ExportKaisaiController::class, 'setu_kekka']);

Route::get('/asp/tsu/kaisai/motor.asp',        [ExportKaisaiController::class, 'motor']);


Route::get('/asp/tsu/kaisai/CreatePCtokuten.asp',        [ExportKaisaiController::class, 'create_pc_tokuten']);

    //レースインデックス系
Route::get('/export/tenbo/', [ExportTenboController::class, 'index']);
Route::get('/asp/RaceView2/SelectJavascriptCreate.asp', [ExportTenboController::class, 'select_js_create']);
Route::get('/export/syutujo/', [ExportSyutujoController::class, 'index']);
Route::get('/auto_export/syutujo/', [ExportSyutujoController::class, 'auto_export']);


    //その他　
Route::get('/asp/tsu/02suimen/02suimen.asp',        [ExportSuimenController::class, 'index']);
Route::get('/asp/tsu/02motor/02motor.asp',        [ExportMotorController::class, 'motor']);
Route::get('/asp/tsu/04event/04event.asp',        [ExportEventController::class, 'index']);
Route::get('/asp/tsu/06meikan/06meikan.asp',        [ExportMeikanController::class, 'index']);
Route::get('/asp/tsu/06meikan/racer_data_create.asp',        [ExportMeikanController::class, 'racer_data_create']);
Route::get('/asp/tsu/info/ex_info.asp',        [ExportInfoController::class, 'index']);
Route::get('/asp/tsu/01cal/01cal.asp',        [ExportCalController::class, 'index']);


//書き出しSP
Route::get('/asp/tsu/sp/kyogi/Syusso_Hyoka.asp',        [ExportSpKaisaiController::class, 'syusso_hyoka']);
Route::get('/asp/tsu/sp/kyogi/Syusso_Seiseki.asp',        [ExportSpKaisaiController::class, 'syusso_seiseki']);
Route::get('/asp/tsu/sp/kyogi/Syusso_AllPast.asp',        [ExportSpKaisaiController::class, 'syusso_all_past']);
Route::get('/asp/tsu/sp/kyogi/Syusso_HerePast.asp',        [ExportSpKaisaiController::class, 'syusso_here_past']);
Route::get('/asp/tsu/sp/kyogi/Syusso_Motor.asp',        [ExportSpKaisaiController::class, 'syusso_motor']);
Route::get('/asp/tsu/sp/kyogi/Syusso_WakuRitsu.asp',        [ExportSpKaisaiController::class, 'syusso_wakuritsu']);
Route::get('/asp/tsu/sp/kyogi/Yoso_KishaEve.asp',        [ExportSpKaisaiController::class, 'yoso_kisha_eve']);
Route::get('/asp/tsu/sp/kyogi/Yoso_KishaTenji.asp',        [ExportSpKaisaiController::class, 'yoso_kisha_tenji']);
Route::get('/asp/tsu/sp/kyogi/Yoso_Vpower.asp',        [ExportSpKaisaiController::class, 'yoso_vpower']);
Route::get('/asp/tsu/sp/kyogi/Odds_3RentanPuku.asp',        [ExportSpKaisaiController::class, 'odds_3rentanpuku']);
Route::get('/asp/tsu/sp/kyogi/Odds_2RentanPuku.asp',        [ExportSpKaisaiController::class, 'odds_2rentanpuku']);
Route::get('/asp/tsu/sp/kyogi/Kekka_Detail.asp',        [ExportSpKaisaiController::class, 'kekka_detail']);
Route::get('/asp/tsu/sp/kyogi/RacenumButton.asp',        [ExportSpKaisaiController::class, 'race_num_button']);

Route::get('/asp/tsu/sp/kyogi/CreateSPtokuten.asp',        [ExportSpKaisaiController::class, 'create_sp_tokuten']);
Route::get('/asp/tsu/sp/kyogi/Cyoku.asp',        [ExportSpKaisaiController::class, 'cyoku']);
Route::get('/asp/tsu/sp/motor/motor.asp',        [ExportSpKaisaiController::class, 'motor']);


Route::get('/asp/tsu/sp/02suimen/02suimen_SP.asp',        [ExportSpSuimenController::class, 'index']);
Route::get('/asp/tsu/sp/02motor/02motor.asp',        [ExportSpMotorController::class, 'motor']);
Route::get('/asp/tsu/sp/06meikan/06meikan.asp',        [ExportSpMeikanController::class, 'index']);

//レースインデックス系
Route::get('/export/sp/tenbo/', [ExportSpTenboController::class, 'index']);
Route::get('/export/sp/syutujo/', [ExportSpSyutujoController::class, 'index']);



//書き出しJS
Route::get('/asp/tsu/kaisai/Jsinfo.asp',        [ExportKaisaiController::class, 'js_info']);
