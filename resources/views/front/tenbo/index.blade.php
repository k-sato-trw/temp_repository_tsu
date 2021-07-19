@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">

<title>ボートレース津｜展望・出場予定選手</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,レース展望,ピックアップレーサー,出場予定選手">
<meta name="Description" content="BOAT RACE津が開催するレースごとの展望や出場予定選手を掲載しています。">
<meta name="viewport" content="width=1280px">

<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/01tenbo.css" rel="stylesheet" type="text/css">
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
  return $("#tenbo_nav, #main").stick_in_parent({
    offset_top: 10
  });
});
</script>
<script type="text/javascript" src="/asp/htmlmade/Race/Tenbo/09/PC/09select.js"></script>

</head>


<body>
<div id="wrapper">

<div id="header_wrap">
    <div id="header">
    <div id="header_img">
    	
        <h1><a href="/">BOATRACE 津 #09</a></h1>
        <h2>展望・出場予定選手</h2>
        
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
    

<div id="tenbo_wrap">


<div id="tenbo_main">


<div id="rt_header">
<div id="rt_header_l">
<span class="grade_{{$grade_class[$race_index->GRADE]}}">{{ $general->create_grade_options_in_raceindex()[$race_index->GRADE] }}</span>
</div><!--/#rt_header_l-->

<div id="rt_header_c">
<div id="race_n">
  {{$race_index->RACE_TITLE}}
</div>
<div id="day"><!--
    @foreach($race_index_date_list as $key => $item)
        @if($key == 0)
            -->{{date('n',strtotime($item))}}/<!--
        @endif
            -->{{date('j',strtotime($item))}}<!--
        @if(date('w',strtotime($item)) == 0)
            --><span class="sun">(日)</span> <!--
        @elseif(date('w',strtotime($item)) == 6)
            --><span class="sat">(土)</span> <!--
        @else
            -->({{ $weeks[date('w',strtotime($item))]; }}) <!--
        @endif
    @endforeach
  --></div>


<table id="ta_data">
  <tr>
    <td class="op bb">開門時刻</td>
    <td class="time bb" align="center"><span class="tc">{{(int)substr($kaimon->KAIMON_TIME,0,2)}}:{{substr($kaimon->KAIMON_TIME,2,2)}}</span></td></tr>
    <tr><td class="op">第1Rスタート展示</td>
    <td class="time" align="center"><span class="tc">{{(int)substr($kaimon->ST_TIME,0,2)}}:{{substr($kaimon->ST_TIME,2,2)}}</span></td>
  </tr>
</table>

</div><!--/#rt_header_c--> 

<div id="rt_header_r">
@if($syutujo_html_exists)
  <a href="/asp/htmlmade/Race/Syutujo/09/PC/s{{$race_index->ID}}.htm"><span class="sensyu_b2">出場予定選手</span></a>
@elseif($race_index->PC_SYUTUJO_URL)
  @if(strpos($race_index->PC_SYUTUJO_URL,'http://') !== false)
    <a href="{{$race_index->PC_SYUTUJO_URL}}" target='_blank'><span class="sensyu_b2">出場予定選手</span></a>      
  @else
    <a href="/{{$race_index->PC_SYUTUJO_URL}}"><span class="sensyu_b2">出場予定選手</span></a>
  @endif
@else
  <span class="sensyu_b2">出場予定選手</span>
@endif

</div><!--/#rt_header_r-->

<div class="clear"></div>
</div><!--/#rt_header-->     
        
        


<!-- キャッチ-->
<div id="tenbo_title"><span></span>
<h3>{{$race_tenbo->TITLE}}</h3>
</div> <!--/#tenbo_title-->           

<div id="tnb_wrap"> 
<div id="tnb_wrap_l">           
<div id="text">{!! nl2br($race_tenbo->LETTER_BODY) !!}
<!-- サブキャッチ-->
<div class="sub_t">
  {{$race_tenbo->LEADTITLE}}
</div><!--/#sub_t-->{!! nl2br($race_tenbo->LEADLETTER_BODY) !!}
</div><!--/#text-->

<!-- ◆◆◆ PICK UP RACER DATA ◆◆◆-->
<div id="pur_title_6">PICK UP RACER</div><!--/#pur_title_6 or #pur_title_4-->
<span class="note">
着順成績 ＞＞<span class="jun">○</span>：準優出、<span class="yu">●</span>：優出
</span>


    @for($num = 1;$num <= 6;$num++)
        @if(in_array($num,[1,3,5]))
          <!-- PICK UP RACER 2名-->
          <div id="pur">
            <div id="pur_l">
        @else
            <div id="pur_r">
        @endif
        <!-- PICK UP RACER 枠-->

            <div id="pur_waku">
            <div id="pur_head_m">
            <span class="name">{{ $fan_data_array[$pickup_data_array['LEADER'.$num]]->NameK }}<span class="place">{{$fan_data_array[$pickup_data_array['LEADER'.$num]]->KenID}}</span></span>
            </div><!--/#pur_head_m or pur_head_w-->

            <div id="pur_head2">
            <span class="data01">
            <span class="no">{{$pickup_data_array['LEADER'.$num]}}</span>{{ $fan_data_array[$pickup_data_array['LEADER'.$num]]->Kyu }}
            </span>
            <span class="catch">
              {{$pickup_data_array['PICKUP_LEAD'.$num]}}
            </span>
            <div class="clear"></div>
            </div><!--/#pur_head2-->

            <span class="pur_tsu">当地過去2節</span>
            <ul>
            <li>{{ date('Y/n/j',strtotime($pickup_data_array['PICKUP_SEISEKI_DATE'.$num.'_1'])); }}～<span class="gr">{{ $pickup_data_array['PICKUP_SEISEKI_GRADE'.$num.'_1'] }}</span>{!! $pickup_data_array['SEISEKI'.$num.'_1'] !!}</li>
            <li>{{ date('Y/n/j',strtotime($pickup_data_array['PICKUP_SEISEKI_DATE'.$num.'_2'])); }}～<span class="gr">{{ $pickup_data_array['PICKUP_SEISEKI_GRADE'.$num.'_2'] }}</span>{!! $pickup_data_array['SEISEKI'.$num.'_2'] !!}</li>
            </ul>
            <span class="pur_all">全国過去2節</span>
            <ul>
            <li>{{ date('Y/n/j',strtotime($pickup_data_array['PICKUP_SEISEKI_DATE'.$num.'_3'])); }}～ {{ $general->jyocode_to_jyoname($pickup_data_array['PICKUP_SEISEKI_JYO'.$num.'_3']) }}<span class="gr">{{ $pickup_data_array['PICKUP_SEISEKI_GRADE'.$num.'_3'] }}</span>{!! $pickup_data_array['SEISEKI'.$num.'_3'] !!}</li>
            <li>{{ date('Y/n/j',strtotime($pickup_data_array['PICKUP_SEISEKI_DATE'.$num.'_4'])); }}～ {{ $general->jyocode_to_jyoname($pickup_data_array['PICKUP_SEISEKI_JYO'.$num.'_4']) }}<span class="gr">{{ $pickup_data_array['PICKUP_SEISEKI_GRADE'.$num.'_4'] }}</span>{!! $pickup_data_array['SEISEKI'.$num.'_4'] !!}</li>
            </ul>
            </div><!--/#pur_waku-->
        </div><!--/#pur_l-->
        @if(in_array($num,[2,4,6]))
            <div class="clear"></div>
          </div><!--/#pur／PICK UP RACER 2名--> 
        @endif
    @endfor




</div><!--/#tnb_wrap_l-->

              
<div id="tnb_wrap_r">
<!-- ◆◆◆ PICK UP RACER PHOTO ◆◆◆--> 
    @for($num = 1;$num <= 6;$num++)
        <!-- RACER -->
        <div id="pur_p_m">
          <span class="photo"><img src="/asp/htmlmade/raceview/{{$pickup_data_array['LEADER'.$num]}}.jpg" width="175" />
          </span>
          <span class="name">{{ $fan_data_array[$pickup_data_array['LEADER'.$num]]->NameK }}</span>
          <span class="data02">{{$pickup_data_array['LEADER'.$num]}} ({{ $fan_data_array[$pickup_data_array['LEADER'.$num]]->Kyu }})<span class="place">{{$fan_data_array[$pickup_data_array['LEADER'.$num]]->KenID}}</span></span>
        </div><!--/#pur_p_m or pur_p_w-->
    @endfor
 
</div><!--/#tnb_wrap_r-->
 <div class="clear"></div>           
</div><!--/#tnb_wrap-->           
</div><!--/#tenbo_main-->
            



<ul id="tenbo_nav">
<span class="select">SELECT</span>
<span id="select_index"></span>
<script type="text/javascript">
	document.getElementById('select_index').innerHTML = FuncSelect();
</script>
</ul><!--/#tenbot_nav-->
            
<div class="clear"></div>
            
</div><!--/#tenbo_wrap-->
        
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
