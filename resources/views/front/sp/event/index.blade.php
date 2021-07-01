@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_sp.js"></script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="user-scalable=no">

<title>ボートレース津｜イベント＆ファンサービス</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,三重,イベント,プレゼント">
<meta name="Description" content="BOAT RACE津で実施するイベントやファンサービス情報を掲載しています。">

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<link href="/sp/css/reset.css" rel="stylesheet" type="text/css">
<link href="/sp/css/common.css" rel="stylesheet" type="text/css">
<link href="/sp/css/04event.css" rel="stylesheet" type="text/css">


<script type="text/javascript" src="/sp/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/sp/js/common.js"></script>

<!-- ビューポート設定 -->
<script type="text/javascript" src="/sp/js/monaca.viewport.js"></script>
<script>
monaca.viewport({
    width : 720
});
</script>

<!--ヘッダーメニューjs-->
<script type="text/javascript" src="/sp/js/header_navi.js"></script>

<!-- アコーディオン -->
<script type="text/javascript" src="/sp/js/jquery.accordion.js"></script>


<script>
function DataReceive(){
	var strhash
	//アラートで?以降の文字を表示する
}
</script>

</head>



<body onload="DataReceive();">


<div id="wrapper">

<!--◆◆◆header◆◆◆-->

<div id="header_wrap">
<div id="header">
<h1><a href="/sp/">BOATRACE 津 #09</a></h1>
</div><!--/#header-->
<h2>イベント＆ファンサービス</h2>

<div id="nav">
	<script type="text/javascript">
                funcTsuMenu();
    </script>
</div><!--/#nav-->

</div><!--/#header_wrap-->


<!--◆◆◆コンテンツ◆◆◆-->	
<div id="main">
<!-- ▼▼▼本文開始▼▼▼ -->






        <div id="event_wrap">
        
        
        
        @if(!count($event_array))
            {{--データなし--}}
            <p id="nodata">ただいまデータはございません</p>
        @else

            @foreach ($calendar_array ?? [] as $calendar)
                <div id="event_main">
                
                <a id="id{{$calendar->ID}}" name="id{{$calendar->ID}}"></a>
                
                    @if($calendar->TYPE == 5)
                        <div class="box other">
                            <div class="race_name @if($select_id == $calendar->ID) open @endif ">
                                <div class="grade">other</div>
                    @else
                        @if($calendar->GRADE == 0)
                            <div class="box SG">
                                <div class="race_name @if($select_id == $calendar->ID) open @endif ">
                                    <div class="grade">SG</div>

                        @elseif($calendar->GRADE == 1)
                            <div class="box G1">
                                <div class="race_name @if($select_id == $calendar->ID) open @endif ">
                                    <div class="grade">G1</div>

                        @elseif($calendar->GRADE == 2)
                            <div class="box G2">
                                <div class="race_name @if($select_id == $calendar->ID) open @endif ">
                                    <div class="grade">G2</div>
                        
                        @elseif($calendar->GRADE == 3)
                            <div class="box G3">
                                <div class="race_name @if($select_id == $calendar->ID) open @endif ">
                                    <div class="grade">G3</div>
                                
                        @else
                            <div class="box G0">
                                <div class="race_name @if($select_id == $calendar->ID) open @endif ">
                                    <div class="grade">一般</div>
                            
                        @endif

                    @endif

                            <div class="race">{{$calendar->RACE_TITLE}}</div>
                            <div class="kikan"><p>{!! $general->create_display_date_for_pc_event($calendar->START_DATE , $calendar->END_DATE,false) !!}</p></div>
                        </div><!--/race_name-->
                    
                    <div class="set" id= "SET{{$calendar->ID}}" @if($select_id == $calendar->ID) style="display:block;" @endif >

                        @foreach ($event_master_array[$calendar->ID] ?? [] as $sub_id => $event_master)

                            <div class="day_wrap"><div class="day"><p>{!! $general->create_display_date_for_pc_event($event_master->START_DATE , $event_master->END_DATE,true) !!}</p></div></div>
                                @foreach ($event_array[$calendar->ID][$sub_id] ?? [] as $event)
                                    @if($event->TYPE == 1)
                                        <dl class="eve_box">
                                    @elseif($event->TYPE == 0)
                                        <dl class="service_box">
                                    @endif

                                        <dt>{{ $event->TITLE }}</dt>
                                        <dd>
                                            {{ $event->TEXT }}
                                            @if(!$event->IMAGE1 && !$event->IMAGE2 && !$event->IMAGE3)
                                                @if($event->NOIMAGE == 1)
                                                    <p class="photo"><img src="/04event/images/img_card.png" width="300"></p>
                                                @elseif($event->NOIMAGE == 2)
                                                    <p class="photo"><img src="/04event/images/img_present.png" width="300"></p>
                                                @elseif($event->NOIMAGE == 3)
                                                    <p class="photo"><img src="/04event/images/img_cup.png" width="300"></p>
                                                @elseif($event->NOIMAGE == 4)
                                                    <p class="photo"><img src="/04event/images/img_tukky.png" width="300"></p>
                                                @else
                                                    
                                                @endif

                                            @else
                                                <p class="photo">
                                                    @if($event->IMAGE1)
                                                        <img src="{{ config('const.IMAGE_PATH.EVENT_FAN').$event->IMAGE1}}" width="300">
                                                    @endif
                                                    
                                                    @if($event->IMAGE2)
                                                        <img src="{{ config('const.IMAGE_PATH.EVENT_FAN').$event->IMAGE2}}" width="300">
                                                    @endif
                                                    
                                                    @if($event->IMAGE3)
                                                        <img src="{{ config('const.IMAGE_PATH.EVENT_FAN').$event->IMAGE3}}" width="300">
                                                    @endif
                                                </p>
                                            @endif
                                            <div class="clear"></div>
                                        </dd>
                                    </dl>
                                @endforeach

                            </div><!--/set-->
                            
                        @endforeach
                        
                    </div><!--/box-->
                
                </div><!--/#event_main-->
            
            @endforeach

        @endif     
        </div><!--/#event_wrap-->









</div><!--/#main-->



<!--◆◆◆ページアップ◆◆◆-->
<div id="page_up"><a href="#wrapper">UP</a></div>
<div class="clear"></div>



<!--◆◆◆フッター◆◆◆-->
<div id="footer_wrap">
<div id="ft_logo">
<img src="/sp/images/sp_ft_logo.png" width="342" height="50" alt=""/></div>
<div id="ft_credit">&copy;BOAT RACE TSU All rights reserved.</div></div>


</div><!--/#wrapper-->

</body>
</html>
