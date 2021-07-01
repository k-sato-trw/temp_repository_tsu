@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_pc.js"></script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">

<title>ボートレース津｜イベント＆ファンサービス</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,三重,イベント,プレゼント">
<meta name="Description" content="BOAT RACE津で実施するイベントやファンサービス情報を掲載しています。">
<meta name="viewport" content="width=1280px">

<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/04event.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/js/common.js"></script>

<!--コンテンツメニューjs-->
<script type="text/javascript" src="/js/contents_navi_slide.js"></script>
<script type="text/javascript" src="/js/contents_navi_main.js"></script>

<!--ヘッダーメニューjs-->
<script type="text/javascript" src="/js/header_navi.js"></script>

<!--stickybtn-->
<script type="text/javascript" src="/js/jquery.sticky-kit.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  return $("#event_nav, #main").stick_in_parent({
    offset_top: 10
  });
});
</script>




</head>





<body>


<div id="wrapper">




<div id="header_wrap">
    <div id="header">
    <div id="header_img">
    	
        <h1><a href="/">BOATRACE 津 #09</a></h1>
        <h2>イベント＆ファンサービス</h2>
        
        <div id="nav">
			<script type="text/javascript">
            funcTsuMenu();
            </script>
        </div><!--/#nav-->
        
        <ul id="header_nav">
            <script type="text/javascript">
            funcTsuHeaderMenu();
            </script>
        </ul><!--/#header_nav-->
    
    </div><!--/#header_img-->
    </div><!--/#header-->
</div><!--/#header_wrap-->




<!--◆◆◆コンテンツ◆◆◆-->

<div id="contents_wrap">
<div id="contents">
	
    <div id="main">
    
		
        <div id="event_wrap">
        
        
        @if(!count($event_array))
            {{--データなし--}}
            <p id="nodata">ただいまデータはございません</p>
        @else
        
        	<div id="event_main">

                @foreach ($calendar_array ?? [] as $calendar)
                    
                    <a id="id{{$calendar->ID}}" name="id{{$calendar->ID}}"></a>
                
                    @if($calendar->TYPE == 5)
                        <div class="box other">
                            <div class="race_name">
                                <div class="grade">other</div>
                    @else
                        @if($calendar->GRADE == 0)
                            <div class="box SG">
                                <div class="race_name">
                                    <div class="grade">SG</div>

                        @elseif($calendar->GRADE == 1)
                            <div class="box G1">
                                <div class="race_name">
                                    <div class="grade">G1</div>

                        @elseif($calendar->GRADE == 2)
                            <div class="box G2">
                                <div class="race_name">
                                    <div class="grade">G2</div>
                        
                        @elseif($calendar->GRADE == 3)
                            <div class="box G3">
                                <div class="race_name">
                                    <div class="grade">G3</div>
                                
                        @else
                            <div class="box G0">
                                <div class="race_name">
                                    <div class="grade">一般</div>
                            
                        @endif

                    @endif
                            <div class="race">{{$calendar->RACE_TITLE}}</div>
                            <div class="kikan"><p>{!! $general->create_display_date_for_pc_event($calendar->START_DATE , $calendar->END_DATE,false) !!}</p></div>
                        </div><!--/race_name-->
                    
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
                                        @if(!$event->IMAGE1 && !$event->IMAGE2 && !$event->IMAGE3)
                                            @if($event->NOIMAGE == 1)
                                                <p class="photo"><img src="/04event/images/img_card.png" width="250"></p>
                                            @elseif($event->NOIMAGE == 2)
                                                <p class="photo"><img src="/04event/images/img_present.png" width="250"></p>
                                            @elseif($event->NOIMAGE == 3)
                                                <p class="photo"><img src="/04event/images/img_cup.png" width="250"></p>
                                            @elseif($event->NOIMAGE == 4)
                                                <p class="photo"><img src="/04event/images/img_tukky.png" width="250"></p>
                                            @else
                                                
                                            @endif

                                        @else
                                            <p class="photo">
                                                @if($event->IMAGE1)
                                                    <img src="{{ config('const.IMAGE_PATH.EVENT_FAN').$event->IMAGE1}}" width="250">
                                                @endif
                                                
                                                @if($event->IMAGE2)
                                                    <img src="{{ config('const.IMAGE_PATH.EVENT_FAN').$event->IMAGE2}}" width="250">
                                                @endif
                                                
                                                @if($event->IMAGE3)
                                                    <img src="{{ config('const.IMAGE_PATH.EVENT_FAN').$event->IMAGE3}}" width="250">
                                                @endif
                                            </p>
                                        @endif
                                        {{ $event->TEXT }}
                                        <div class="clear"></div>
                                    </dd>
                                </dl>
                                
                            @endforeach
                        @endforeach
                        
                    </div><!--/box-->
                
                @endforeach
            
            </div><!--/#event_main-->

            <ul id="event_nav">
                @foreach ($calendar_array ?? [] as $calendar)
                    @if($calendar->TYPE == 5)
                        <li class="b_other">
                    @else
                        @if($calendar->GRADE == 0)
                            <li class="b_sg">
                        @elseif($calendar->GRADE == 1)
                            <li class="b_g1">
                        @elseif($calendar->GRADE == 2)
                            <li class="b_g2">
                        @elseif($calendar->GRADE == 3)
                            <li class="b_g3">
                        @else
                            <li class="b_g0">
                        @endif
                    @endif
                    
                        <a href="#id{{$calendar->ID}}">
                            <dl>
                                <dt>{!! $general->create_display_date_for_pc_event($calendar->START_DATE , $calendar->END_DATE,true) !!}</dt>
                                <dd>{{$calendar->RACE_TITLE}}</dd>
                            </dl>
                        </a>
                    </li>
                @endforeach
            </ul><!--/#event_nav-->
            
            
            
            
        
        	<div class="clear"></div>
        
        @endif    
            
        </div><!--/#event_wrap-->
        
        
    
    <div id="page_top"><a href="#wrapper">UP</a></div>
    </div><!--/#main-->
    
</div><!--/#contents-->
</div><!--/#contents_wrap-->




<!--◆◆◆フッター◆◆◆-->
<div id="footer_wrap">
    <div id="footer">
    	<iframe src="/footer.htm" frameborder="0" allowtransparency="true" scrolling="no" name="footer"></iframe>
    </div><!--/#footer-->
</div><!--/#footer_wrap-->



</div><!--/#wrapper-->




</body>
</html>
