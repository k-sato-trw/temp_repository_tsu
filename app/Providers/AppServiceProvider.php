<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        //
        $this->app->bind(
            \App\Repositories\TbBoatsJyocourse\TbBoatsJyocourseRepositoryInterface::class,
            \App\Repositories\TbBoatsJyocourse\TbBoatsJyocourseRepository::class
        ); 
        
        $this->app->bind(
            \App\Repositories\TbTsuYosoAshi\TbTsuYosoAshiRepositoryInterface::class,
            \App\Repositories\TbTsuYosoAshi\TbTsuYosoAshiRepository::class
        );

        $this->app->bind(
            \App\Repositories\TbTsuYoso\TbTsuYosoRepositoryInterface::class,
            \App\Repositories\TbTsuYoso\TbTsuYosoRepository::class
        );

        $this->app->bind(
            \App\Repositories\TbTsuYosoTenji\TbTsuYosoTenjiRepositoryInterface::class,
            \App\Repositories\TbTsuYosoTenji\TbTsuYosoTenjiRepository::class
        );

        $this->app->bind(
            \App\Repositories\TbTsuYosoMessage\TbTsuYosoMessageRepositoryInterface::class,
            \App\Repositories\TbTsuYosoMessage\TbTsuYosoMessageRepository::class
        );

        $this->app->bind(
            \App\Repositories\TbTsuYosoHighlight\TbTsuYosoHighlightRepositoryInterface::class,
            \App\Repositories\TbTsuYosoHighlight\TbTsuYosoHighlightRepository::class
        );

        $this->app->bind(
            \App\Repositories\TbVodManagement\TbVodManagementRepositoryInterface::class,
            \App\Repositories\TbVodManagement\TbVodManagementRepository::class
        );

        $this->app->bind(
            \App\Repositories\TbMotorList\TbMotorListRepositoryInterface::class,
            \App\Repositories\TbMotorList\TbMotorListRepository::class
        );

        $this->app->bind(
            \App\Repositories\TbTsuTokutenritu\TbTsuTokutenrituRepositoryInterface::class,
            \App\Repositories\TbTsuTokutenritu\TbTsuTokutenrituRepository::class
        );

        $this->app->bind(
            \App\Repositories\TbTsuKaimon\TbTsuKaimonRepositoryInterface::class,
            \App\Repositories\TbTsuKaimon\TbTsuKaimonRepository::class
        );

        $this->app->bind(
            \App\Repositories\TbTsuMailmagazine\TbTsuMailmagazineRepositoryInterface::class,
            \App\Repositories\TbTsuMailmagazine\TbTsuMailmagazineRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbTsuEventfan\TbTsuEventfanRepositoryInterface::class,
            \App\Repositories\TbTsuEventfan\TbTsuEventfanRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbTsuEventfanmaster\TbTsuEventfanmasterRepositoryInterface::class,
            \App\Repositories\TbTsuEventfanmaster\TbTsuEventfanmasterRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbTsuCalendar\TbTsuCalendarRepositoryInterface::class,
            \App\Repositories\TbTsuCalendar\TbTsuCalendarRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbTsuMonthInfo\TbTsuMonthInfoRepositoryInterface::class,
            \App\Repositories\TbTsuMonthInfo\TbTsuMonthInfoRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbTsuTopic\TbTsuTopicRepositoryInterface::class,
            \App\Repositories\TbTsuTopic\TbTsuTopicRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\BannerManagement\BannerManagementRepositoryInterface::class,
            \App\Repositories\BannerManagement\BannerManagementRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\RaceTenboSensyuImage\RaceTenboSensyuImageRepositoryInterface::class,
            \App\Repositories\RaceTenboSensyuImage\RaceTenboSensyuImageRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbRaceTenboExtra\TbRaceTenboExtraRepositoryInterface::class,
            \App\Repositories\TbRaceTenboExtra\TbRaceTenboExtraRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbRaceTenbo\TbRaceTenboRepositoryInterface::class,
            \App\Repositories\TbRaceTenbo\TbRaceTenboRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbRaceSyutujoWriteLog\TbRaceSyutujoWriteLogRepositoryInterface::class,
            \App\Repositories\TbRaceSyutujoWriteLog\TbRaceSyutujoWriteLogRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbRaceSyutujoRacer\TbRaceSyutujoRacerRepositoryInterface::class,
            \App\Repositories\TbRaceSyutujoRacer\TbRaceSyutujoRacerRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbRaceSyutujo\TbRaceSyutujoRepositoryInterface::class,
            \App\Repositories\TbRaceSyutujo\TbRaceSyutujoRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbRaceIndex\TbRaceIndexRepositoryInterface::class,
            \App\Repositories\TbRaceIndex\TbRaceIndexRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbMikuniAssen\TbMikuniAssenRepositoryInterface::class,
            \App\Repositories\TbMikuniAssen\TbMikuniAssenRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\AssenSchedule\AssenScheduleRepositoryInterface::class,
            \App\Repositories\AssenSchedule\AssenScheduleRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbTsuKinkyuKokuti\TbTsuKinkyuKokutiRepositoryInterface::class,
            \App\Repositories\TbTsuKinkyuKokuti\TbTsuKinkyuKokutiRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbTsuInformation\TbTsuInformationRepositoryInterface::class,
            \App\Repositories\TbTsuInformation\TbTsuInformationRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\FandataManual\FandataManualRepositoryInterface::class,
            \App\Repositories\FandataManual\FandataManualRepository::class
        ); 
        
        $this->app->bind(
            \App\Repositories\TbGambooYosoSensyu\TbGambooYosoSensyuRepositoryInterface::class,
            \App\Repositories\TbGambooYosoSensyu\TbGambooYosoSensyuRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbGambooYosoRace\TbGambooYosoRaceRepositoryInterface::class,
            \App\Repositories\TbGambooYosoRace\TbGambooYosoRaceRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbBoatPera\TbBoatPeraRepositoryInterface::class,
            \App\Repositories\TbBoatPera\TbBoatPeraRepository::class
        ); 


        $this->app->bind(
            \App\Repositories\TbBoatOzzinfo\TbBoatOzzinfoRepositoryInterface::class,
            \App\Repositories\TbBoatOzzinfo\TbBoatOzzinfoRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbBoatOzz\TbBoatOzzRepositoryInterface::class,
            \App\Repositories\TbBoatOzz\TbBoatOzzRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\RensyoKekka\RensyoKekkaRepositoryInterface::class,
            \App\Repositories\RensyoKekka\RensyoKekkaRepository::class
        ); 
        
        $this->app->bind(
            \App\Repositories\Holding\HoldingRepositoryInterface::class,
            \App\Repositories\Holding\HoldingRepository::class
        ); 
        
        $this->app->bind(
            \App\Repositories\Holiday\HolidayRepositoryInterface::class,
            \App\Repositories\Holiday\HolidayRepository::class
        ); 
        
        $this->app->bind(
            \App\Repositories\TbBoatKekkainfo\TbBoatKekkainfoRepositoryInterface::class,
            \App\Repositories\TbBoatKekkainfo\TbBoatKekkainfoRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepositoryInterface::class,
            \App\Repositories\TbBoatRaceheader\TbBoatRaceheaderRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbBoatsJyokisetubetu\TbBoatsJyokisetubetuRepositoryInterface::class,
            \App\Repositories\TbBoatsJyokisetubetu\TbBoatsJyokisetubetuRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbBoatsYusyoracer\TbBoatsYusyoracerRepositoryInterface::class,
            \App\Repositories\TbBoatsYusyoracer\TbBoatsYusyoracerRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbBoatKekka\TbBoatKekkaRepositoryInterface::class,
            \App\Repositories\TbBoatKekka\TbBoatKekkaRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbBoatsSensyupast3\TbBoatsSensyupast3RepositoryInterface::class,
            \App\Repositories\TbBoatsSensyupast3\TbBoatsSensyupast3Repository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbBoatKibetu\TbBoatKibetuRepositoryInterface::class,
            \App\Repositories\TbBoatKibetu\TbBoatKibetuRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\ChushiJunen\ChushiJunenRepositoryInterface::class,
            \App\Repositories\ChushiJunen\ChushiJunenRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbBoatsMotorzenken\TbBoatsMotorzenkenRepositoryInterface::class,
            \App\Repositories\TbBoatsMotorzenken\TbBoatsMotorzenkenRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbRaceSyutujo\TbRaceSyutujoRepositoryInterface::class,
            \App\Repositories\TbRaceSyutujo\TbRaceSyutujoRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbRaceSyutujoRacer\TbRaceSyutujoRacerRepositoryInterface::class,
            \App\Repositories\TbRaceSyutujoRacer\TbRaceSyutujoRacerRepository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbBoatsSensyusyussou2\TbBoatsSensyusyussou2RepositoryInterface::class,
            \App\Repositories\TbBoatsSensyusyussou2\TbBoatsSensyusyussou2Repository::class
        ); 

        $this->app->bind(
            \App\Repositories\TbBoatTyokuzen\TbBoatTyokuzenRepositoryInterface::class,
            \App\Repositories\TbBoatTyokuzen\TbBoatTyokuzenRepository::class
        );
        
        $this->app->bind(
            \App\Repositories\TbBoatSyussou\TbBoatSyussouRepositoryInterface::class,
            \App\Repositories\TbBoatSyussou\TbBoatSyussouRepository::class
        );

        $this->app->bind(
            \App\Repositories\KaisaiMaster\KaisaiMasterRepositoryInterface::class,
            \App\Repositories\KaisaiMaster\KaisaiMasterRepository::class
        );

        $this->app->bind(
            \App\Repositories\FanData\FanDataRepositoryInterface::class,
            \App\Repositories\FanData\FanDataRepository::class
        );

        $this->app->bind(
            \App\Repositories\BangumiData\BangumiDataRepositoryInterface::class,
            \App\Repositories\BangumiData\BangumiDataRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
    }
}
