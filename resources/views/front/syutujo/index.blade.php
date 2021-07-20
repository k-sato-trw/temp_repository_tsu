@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">

<title>ボートレース津｜出場予定選手</title>

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


<!--テーブル列クラス付与-->
<script type="text/javascript" src="/js/jquery.tableCols.js"></script>


<!--テーブルロールオーバー-->
<script type="text/javascript" src="/js/jquery.tablehover.js"></script>
<script type="text/javascript">
$(function() {
	$('#ta_sensyu').tableHover ({colClass: 'hover', rowClass: 'hoverrow', cellClass: 'hovercell'});
});
</script>


<script type="text/javascript" src="/asp/htmlmade/Race/Tenbo/09/PC/09select.js"></script>
<script type="text/javascript">
function SortLink(argdata)
{

	if( argdata == '1' ){
		if( data == 'toku' ){
			location.href = "/asp/htmlmade/Race/Syutujo/09/PC/s{{$id}}.htm?toku";
		}else{
			location.href = "/asp/htmlmade/Race/Syutujo/09/PC/s{{$id}}.htm#race_header";
		}
	}else if( argdata == '2' ){
		if( data == 'toku' ){
			location.href = "/asp/htmlmade/Race/Syutujo/09/PC/s{{$id}}_Win.htm?toku";
		}else{
			location.href = "/asp/htmlmade/Race/Syutujo/09/PC/s{{$id}}_Win.htm#race_header";
		}
	}else if( argdata == '3' ){
		if( data == 'toku' ){
			location.href = "/asp/htmlmade/Race/Syutujo/09/PC/s{{$id}}_2Win.htm?toku";
		}else{
			location.href = "/asp/htmlmade/Race/Syutujo/09/PC/s{{$id}}_2Win.htm#race_header";
		}
	}else if( argdata == '4' ){
		if( data == 'toku' ){
			location.href = "/asp/htmlmade/Race/Syutujo/09/PC/s{{$id}}_ST.htm?toku";
		}else{
			location.href = "/asp/htmlmade/Race/Syutujo/09/PC/s{{$id}}_ST.htm#race_header";
		}
	}

}
function DataReceive(){
	if( data == 'toku' ){
		document.location.hash='title';
	}else{
	}
	//アラートで?以降の文字を表示する
}
</script>
<script type="text/javascript">
		//?以降の文字を取得する
	data = location.search.substring(1, location.search.length);
		//エスケープされた文字をアンエスケープする
	data = unescape(data);
	if( data == 'toku' ){
		document.write("<link href=\"/css/01syutujo_toku.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />");
	}else{
		document.write("<link href=\"/css/01syutujo.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />");
	}
</script>
</head>


<body onload="DataReceive();">
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
</div><!--/#rt_header_c--> 

<div id="rt_header_r">
<a href="/asp/htmlmade/Race/Tenbo/09/PC/t200.htm"><span class="sensyu_b2">レース展望</span></a>

</div><!--/#rt_header_r-->

<div class="clear"></div>
</div><!--/#rt_header-->     
        
        


<!--注釈-->
<span class="note">
<img src="/01tenbo/images/btn_sort.gif" width="18" height="18" alt=""/>をクリックすると、各データを降順に並び替えできます。<br>
［全国成績：{{date('Y/n/j',strtotime($zenkoku_start))}}～{{date('Y/n/j',strtotime($zenkoku_end))}}］［津成績：{{date('Y/n/j',strtotime($tsu_start))}}～{{date('Y/n/j',strtotime($tsu_end))}}　<span class="jun">○</span>：準優出、<span class="yu">●</span>：優出］
</span>



<!--▼▼▼選手リスト▼▼▼-->

<table id="ta_sensyu">

<thead>
<tr class="top"> 
<th colspan="5">&ensp;</th>
<th colspan="4" class="Z">全国成績</th>
<th colspan="5" class="H">津成績</th>
</tr>
<tr class="bottom">
<th class="select"><a href="javascript:void(0);" onclick="SortLink(1);">登番</a></th>
<th>選手名</th>
<th>年齢</th>
<th>支部</th>
<th>級別</th>
<th class="Z"><a href="javascript:void(0);" onclick="SortLink(2);">勝率</a></th>
<th class="Z"><a href="javascript:void(0);" onclick="SortLink(3);">2連率</a></th>
<th class="Z"><a href="javascript:void(0);" onclick="SortLink(4);">平均ST</a></th>
<th class="Z">出走</th>
<th colspan="3" class="H">前回出走（年月）/ グレード / 着順</th>
<th class="H">優出</th>
<th class="H">優勝</th>
</tr>
</thead>
<tbody>
    @foreach ($result_table as $touban=>$item)
        <tr>
            <td>@isset($race_syutujo_racer_add_list[$touban]){{$race_syutujo_racer_add_list[$touban]->YOSO}}@endisset{{$touban}}</td>
            <td @if ($item->Sei == 2) class="L" @endif>{{str_replace('　','',str_replace('　　',' ',$item->NameK ?? ''))}}</td>
            <td>{{$item->Nenrei}}</td>
            <td>{{$item->KenID}}</td>
            <td>{{$item->Kyu}}</td>
            <td>{{$item->Fukusyo1 == 0 ? '…' : number_format($item->Syoritu1,2)}}</td>
            <td>{{$item->Fukusyo1 == 0 ? '…' : floor($item->Fukusyo1).'%'}}</td>
            <td>{{$item->Sttiming == 999 ? '…' : number_format($item->Sttiming,2)}}</td>
            <td>{{$item->Syukai1 == 0 ? '…' : $item->Syukai1}}</td>
            @isset($item->touchi_rireki['touchi_target_date'])
                <td>{{date('y.n',strtotime($item->touchi_rireki['touchi_target_date']))}}</td>                
            @else
                <td>…</td>    
            @endisset
            @isset($item->touchi_rireki['touchi_grade'])
                <td class="{{$general->gradenumber_to_gradename_for_tokyo_next_image($item->touchi_rireki['touchi_grade'])}}">{{$general->gradenumber_to_gradename_for_syutujo($item->touchi_rireki['touchi_grade'])}}</td>             
            @else
                <td class="g0">…</td>    
            @endisset
            <td>{!!$item->touchi_rireki['touchi_tyakujun'] ?? "…"!!}</td>
            @isset($item->touchi_rireki['touchi_grade'])
                <td>{{$item->yusyutu_count ?? "…"}}</td>
            @else
                <td>…</td>    
            @endisset
            @isset($item->touchi_rireki['touchi_grade'])
                <td>{{$item->yusyo_count ?? "…"}}</td>
            @else
                <td>…</td>    
            @endisset
            
        </tr>
    @endforeach

</tbody>


</table><!--ta_sensyu end-->



<!--コメント-->
<p id="comment">※選手の年齢は{{date('n/j',strtotime($today_date))}}のものです。また、開催中の帰郷、追配は反映されませんのでご了承ください。<br></p>
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
