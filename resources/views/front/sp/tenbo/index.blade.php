@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="user-scalable=no">

<title>ボートレース津｜展望・出場予定選手</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,レース展望,ピックアップレーサー,出場予定選手">
<meta name="Description" content="BOAT RACE津が開催するレースごとの展望や出場予定選手を掲載しています。">


<link href="/sp/css/reset.css" rel="stylesheet" type="text/css">
<link href="/sp/css/common.css" rel="stylesheet" type="text/css">
<link href="/sp/css/01tenbo.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
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

<!---タブ--->
<script type="text/javascript" src="/sp/js/tabs.js"></script>

<script type="text/javascript" src="/asp/htmlmade/Race/Tenbo/09/SP/09select.js"></script>
<script type="text/javascript">
function Pagemove(){
	window.location.hash = "tenbo_wrap";
}
</script>
</head>


<body onload="Pagemove();">


<div id="wrapper">



<!--◆◆◆header◆◆◆-->

<div id="header_wrap">
<div id="header">
<h1><a href="/sp/">BOATRACE 津 #09</a></h1>
</div><!--/#header-->

<div id="nav">
<script type="text/javascript">
            funcTsuMenu();
            </script>
</div><!--/#nav-->



<ul id="tenbo_nav">
<span class="select">SELECT</span>

<script type="text/javascript">
	FuncSelect();
</script>
               
</ul><!--/#tenbot_nav-->

</div><!--/#header_wrap-->


<!--◆◆◆コンテンツ◆◆◆-->
<div id="tenbo_wrap">
<div class="h2_deco">
<img src="/sp/01tenbo/images/h2_ic.png" width="720" height="19" alt=""/>
</div>
<h2>展望・出場予定選手</h2>




<div id="tenbo_main">

<!-- レース情報-->
<div id="rt_header">
<div id="rt_header_l">
<span class="grade_{{$grade_class[$race_index->GRADE]}}">{{ $general->create_grade_options_in_raceindex()[$race_index->GRADE] }}</span>
</div><!--/#rt_header_l-->

<div id="rt_header_c">
<div id="race_n">
<p>{{$race_index->RACE_TITLE}}</p>
</div>
<div class="clear"></div>
</div><!--/#rt_header_c--> 

<div id="rt_header_r">

<div id="day">
<!--
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
    <td class="time bb"><span class="tc">{{(int)substr($kaimon->KAIMON_TIME,0,2)}}:{{substr($kaimon->KAIMON_TIME,2,2)}}</span></td></tr>
    
    <tr><td class="op">第1Rスタート展示</td>
    <td class="time"><span class="tc">{{(int)substr($kaimon->ST_TIME,0,2)}}:{{substr($kaimon->ST_TIME,2,2)}}</span></td>
  </tr>
</table>

 
</div><!--/#rt_header_r-->
</div><!--/#rt_header-->     
        
        


<!-- キャッチ-->
<div id="tenbo_title">
<span></span>
<h3><p>
    {{$race_tenbo->TITLE}}</p>
</h3>
</div> <!--/#tenbo_title-->           

<div id="tnb_wrap"> 
<div id="tnb_wrap_l">
@if($syutujo_html_exists)
  <a href="/asp/htmlmade/Race/Syutujo/09/SP/s{{$race_index->ID}}.htm"><span class="sensyu_b2">出場予定選手</span></a>
@elseif($race_index->PC_SYUTUJO_URL)
  @if(strpos($race_index->PC_SYUTUJO_URL,'http://') !== false)
    <a href="{{$race_index->PC_SYUTUJO_URL}}" target='_blank'><span class="sensyu_b2">出場予定選手</span></a>      
  @else
    <a href="/{{$race_index->PC_SYUTUJO_URL}}"><span class="sensyu_b2">出場予定選手</span></a>
  @endif
@else
  <span class="sensyu_b2">出場予定選手</span>
@endif

<!-- 本分-->         
<div id="text">
    　{!! nl2br($race_tenbo->LETTER_BODY) !!}

<!-- サブキャッチ-->
<div class="sub_t">
    {{$race_tenbo->LEADTITLE}}
</div><!--/#sub_t--> 
　{!! nl2br($race_tenbo->LEADLETTER_BODY) !!}
</div><!--/#text-->



<!-- ◆◆◆ PICK UP RACER DATA ◆◆◆-->
<div id="pur_title_6">PICK UP RACER</div><!--/#pur_title_6 or #pur_title_4-->

<span class="note">
着順成績 ＞＞<span class="jun">○</span>：準優出、<span class="yu">●</span>：優出
</span>


<div id="pur">

    @for($num = 1;$num <= 6;$num++)
        <!-- PICK UP RACER 枠-->
        <div id="pur_waku">

        <div id="pur_head_m">
        <div id="pur_p"><img src="/asp/htmlmade/raceview/{{$pickup_data_array['LEADER'.$num]}}.jpg" width="200" /></div>
        
        <div id="pur_head_r">
        <span class="name">{{ $fan_data_array[$pickup_data_array['LEADER'.$num]]->NameK }}</span>
        <span class="data01">
        <ul><li>{{$pickup_data_array['LEADER'.$num]}}</li><li>{{ $fan_data_array[$pickup_data_array['LEADER'.$num]]->Kyu }}</li><li>{{$fan_data_array[$pickup_data_array['LEADER'.$num]]->KenID}}</li>
        <div class="clear"></div>
        </ul>
        </span>
        
        <div id="catch">
            {{$pickup_data_array['PICKUP_LEAD'.$num]}}
        </div>
        
        </div><!--/#pur_head_r-->
        <div class="clear"></div>
        </div><!--/#pur_head_m-->
        <span class="data02">


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
    @endfor
 
</div><!--/#pur-->

</div><!--/#tnb_wrap_l-->         
</div><!--/#tnb_wrap-->           


</div><!--/#tenbo_main-->
            

            
</div><!--/#tenbo_wrap-->


<!--◆◆◆ページアップ◆◆◆-->

<div id="page_up"><a href="#wrapper">UP</a></div>
<div class="clear"></div>




<!--◆◆◆フッター◆◆◆-->
<div id="footer_wrap">
<div id="ft_logo">BOAT RACE TSU</div>
<div id="ft_credit">&copy;BOAT RACE TSU All rights reserved.</div></div>



</div><!--/#wrapper-->

</body>
</html>
