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

<title>ボートレース津｜出場予定選手</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,レース展望,ピックアップレーサー,出場予定選手">
<meta name="Description" content="BOAT RACE津が開催するレースごとの展望や出場予定選手を掲載しています。">


<link href="/sp/css/reset.css" rel="stylesheet" type="text/css">
<link href="/sp/css/common.css" rel="stylesheet" type="text/css">
<link href="/sp/css/01tenbo.css" rel="stylesheet" type="text/css">
<link href="/sp/css/01syutujo.css" rel="stylesheet" type="text/css">
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

<!-- タブメニュー -->
<script type="text/javascript" src="/sp/js/jquery.tabs_menu.js"></script>

<script type="text/javascript">
function Change(argData){

	if( document.getElementById( "Change" ) ){
		if(argData == "1"){
			document.getElementById( "Change" ).innerHTML = "<a href=\"#tab2\" data-tor-smoothScroll=\"noSmooth\" onclick=\"Change(2);\">全国成績</a>";
		}else{
			document.getElementById( "Change" ).innerHTML = "<a href=\"#tab1\" data-tor-smoothScroll=\"noSmooth\" onclick=\"Change(1);\">津成績</a>";
		}
	}
}
</script>

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
<div id="rt_header_s">
<div id="rt_header_l">
<span class="grade_{{$grade_class[$race_index->GRADE]}}">{{ $general->create_grade_options_in_raceindex()[$race_index->GRADE] }}</span>
</div><!--/#rt_header_l-->

<div id="rt_header_c">
<div id="race_n"><p>
    {{$race_index->RACE_TITLE}}
</p></div>
<div class="clear"></div>
</div><!--/#rt_header_c--> 

<div id="rt_header_r">

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
 
</div><!--/#rt_header_r-->
</div><!--/#rt_header-->         



<div id="syutu_title">
<span></span>
</div><!--/#tenbo_title-->  




<div id="tnb_wrap"> 
<div id="tnb_wrap_l">

<!--注釈-->

<!-- ボタン -->
<div id="hd_r">
<div id="touchi">
<ul class="tabs">
<li class="st00">
<div id ="Change"><a href="#tab2" data-tor-smoothScroll="noSmooth" onclick="Change(1);">津成績</a></div></li></ul>
</div><!-- /#seiseki -->
</div><!-- /#hd_r -->


<div id="mem_term">
［全国成績］{{date('Y/n/j',strtotime($zenkoku_start))}}～{{date('Y/n/j',strtotime($zenkoku_end))}}<br>
［津成績］{{date('Y/n/j',strtotime($tsu_start))}}～{{date('Y/n/j',strtotime($tsu_end))}}<br>
　　　　　<span class="jun">○</span>：準優出、<span class="yu">●</span>：優出</div>

<!-- /#mem_term -->

<div class="clear"></div>


<!--▼▼▼選手リスト▼▼▼-->

<div id="mem">
<div id="mem_l">
<table id="mem_l" class="ta_mem">
<tr><th colspan="2" class="bd_no_r"></th></tr>
<tr><th class="num">登番</th>
<th class="mem bd_no_r">選手名</th></tr>
    @foreach ($result_table as $touban=>$item)
        <tr>
            <td>{{$touban}}</td>
            <td @if ($item->Sei == 2) class="L" @endif>{{str_replace('　','',str_replace('　　',' ',$item->NameK ?? ''))}}</td>
        </tr>
    @endforeach
</table>
</div><!-- /#mem_l -->

<div id="mem_r">

<!-- ▼▼▼全国▼▼▼ -->
<div id="tab1" class="tab_content">
<table id="ta_zen" class="ta_mem">
<tr>
<th colspan="2" class="bd_no_l"></th>
<th colspan="4" class="zen">全国成績</th>
</tr>
<tr>
<th class="age">支部</th>
<th class="kyu">級別</th>
<th class="syoz">勝率</th>
<th class="renz">2連率</th>
<th class="renz"><div class="sml">平均ST</div></th>
<th class="kaiz">出走</th>
</tr>
    @foreach ($result_table as $touban=>$item)
        <tr>
            <td>{{$item->KenID}}</td>
            <td>{{$item->Kyu}}</td>
            <td><span class="ta_zen">{{number_format($item->Syoritu1,2)}}</span></td>
            <td><span class="ta_zen">{{floor($item->Fukusyo1)}}%</span></td>
            <td>{{number_format($item->Sttiming,2)}}</td>
            <td><span class="ta_zen">{{$item->Syukai1}}</span></td>
        </tr>
    @endforeach
</table>
</div><!-- /tab1 -->

<!-- ▼▼▼当地▼▼▼ -->
<div id="tab2" class="tab_content">
<table id="ta_tou" class="ta_mem">
<tr>
<th colspan="5" class="tou">津成績</th>
</tr>
<tr>
<th colspan="3" class="syot">前回出走(年月) / 着順</th>
<th class="syut"><div class="sml">優出</div></th>
<th class="syut"><div class="sml">優勝</div></th>
</tr>
@foreach ($result_table as $touban=>$item)
    <tr>
        @isset($item->touchi_rireki['touchi_target_date'])
            <TD><span class="day">{{date('y.n',strtotime($item->touchi_rireki['touchi_target_date']))}}</span></TD>              
        @else
            <TD><span class="day">&nbsp;</span></TD>
        @endisset
        @isset($item->touchi_rireki['touchi_grade'])
            <?php $class_label=['0'=>'sg','1'=>'g1','2'=>'g2','3'=>'g3','4'=>'g0','5'=>'g3']; ?>
            <TD class="{{$class_label[$item->touchi_rireki['touchi_grade']]}}"><span class="ta_tou">{{$general->gradenumber_to_gradename_for_syutujo($item->touchi_rireki['touchi_grade'])}}</span></TD>            
        @else
            <TD class="s0"><span class="ta_tou">--</span></TD>
        @endisset

        <td><span class="ta_tou">{!!$item->touchi_rireki['touchi_tyakujun'] ?? "--"!!}</span></td>
        
        @isset($item->touchi_rireki['touchi_grade'])
            <td>{{$item->yusyutu_count ?? "&nbsp;"}}</td>
        @else
            <td>&nbsp;</td>    
        @endisset
        @isset($item->touchi_rireki['touchi_grade'])
            <td>{{$item->yusyo_count ?? "&nbsp;"}}</td>
        @else
            <td>&nbsp;</td>    
        @endisset
    </tr>
@endforeach
    
</table>
</div><!-- /tab2 -->
</div><!-- /#mem_r -->


<div class="clear"></div>
</div><!-- /#mem -->



<!---コメント--->
<p id="comment">※開催中の帰郷、追配は反映されませんのでご了承ください。<br></p>



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
