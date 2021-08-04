@inject('general', 'App\Services\GeneralService')
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta name="format-detection" content="telephone=no"/>
<meta name="viewport" content="width=720px" />

<title>レースリプレイ｜ボートレース津</title>

<meta name="Keywords" content="ボートレース津,ボートレース,津,動画,リプレイ,結果" />
<meta name="Description" content="ボートレース津が開催したレースのリプレイ動画、レース結果がご覧いただけます。" />


<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/sp/kyogi/css/reset.css" />
<link rel="stylesheet" href="/sp/kyogi/css/kyogi.css" />
<link rel="stylesheet" href="/sp/kyogi/css/style.css" />
<link rel="stylesheet" href="/sp/kyogi/css/custom.css" />

<script type="text/javascript" src="/sp/js/jquery-1.8.3.min.js"></script>

<script type="text/javascript">
function play( argNum ){
	if( argNum == 1 ){
		document.movie.play();
	}else{
		document.movie2.play();
	}
}
</script>

<!-- 共通 -->
<script type="text/javascript" src="/sp/kyogi/js/common.js"></script>

<!-- アコーディオン -->
<script type="text/javascript" src="/sp/kyogi/js/jquery.accordion.js"></script>

<!-- フォーム -->
<script type="text/javascript" src="/sp/kyogi/js/custom-form-elements.js"></script>


<script type="text/javascript" src="/asp/FlashPlayerCheck.js"></script>
<script type="text/javascript" src="/asp/SmartAgentGetter.js"></script>
<script type="text/javascript" src="/sp/kyogi/js/jquery.new_tabs_movie.js"></script>

<!-- リプレイ結果タブ -->
<script type="text/javascript" src="/sp/kyogi/js/jquery.tabs_kekka.js"></script>

<script type="text/javascript">
function funcFlag(){

	var Flag;
	Flag = 1;
	return Flag;

}
</script>
<script type="text/javascript" src="/sp/kyogi/js/link.js"></script>
<script type="text/javascript">
function funcDefaultSeledted(){

	for( var intLoopCount = 0 ; intLoopCount < document.racenum.select.options.length ; intLoopCount++ ){
		if( document.racenum.select.options[ intLoopCount ].value == '1'){
			document.racenum.select.options[ intLoopCount ].selected = true;
			alert( document.racenum.select.options[ intLoopCount ].value )
		}
	}
}
</script>
<script type="text/javascript" src="/sp/js/data_navi.js"></script>
</head>


<body>

<div id="wrapper"><!-- wrapper start -->


<div id="header"><!-- header start -->

<h1><a href="/sp/"><div>BOAT RACE 津 09#</div></a></h1>

<a href="javascript:history.back();" id="replay_back"><div>戻る</div></a>

</div><!-- header end -->


<div id="main"><!-- main start -->


<div id="race">

<table>
<tr>
<td class="date">{{ date('n/j',strtotime($target_date)) }}</td>
<td class="name">{{$kaisai_master->開催名称}}</td>
<td class="day">{{$kaisai_date_list_label[$target_date]}}</td>
</tr>
</table>

</div>

<!--動画エリア-->
<div id="movie_player">
<div id="player"></div>
<div id="edit"></div>
</div>


<div id="race_select" class="cf">

<div id="num_select" class="old">
<form name="racenum">
<select id="select" name="select" class="styled" >
<option value="1R" @if($race_num==1)selected @endif>1R</option>
<option value="2R" @if($race_num==2)selected @endif>2R</option>
<option value="3R" @if($race_num==3)selected @endif>3R</option>
<option value="4R" @if($race_num==4)selected @endif>4R</option>
<option value="5R" @if($race_num==5)selected @endif>5R</option>
<option value="6R" @if($race_num==6)selected @endif>6R</option>
<option value="7R" @if($race_num==7)selected @endif>7R</option>
<option value="8R" @if($race_num==8)selected @endif>8R</option>
<option value="9R" @if($race_num==9)selected @endif>9R</option>
<option value="10R" @if($race_num==10)selected @endif>10R</option>
<option value="11R" @if($race_num==11)selected @endif>11R</option>
<option value="12R" @if($race_num==12)selected @endif>12R</option>
</select>
</form>
</div>

<table id="class">
<tr>
<td>{{$syussou[1]->RACE_NAME}}</td>
</tr>
</table>


<div id="dento"></div>

</div>


<div id="replay_movie">

<script type="text/javascript">
	strSmartAgent = funcJsSmartAgentGetter();
	var flag  = { os : false, player: false }; 
	var userAgent = navigator.userAgent.match(/android (\d+\.\d+)/i); 
	if(strSmartAgent == "PC"){
		document.write('<ul id="tab_movie" class="cf">');
		document.write('<li id="race">リプレイ</li>');
		document.write('<li id="interview"  >展示リプレイ</li>');
		document.write('</ul>');
		document.write('<div class="cont_movie">');
		document.write('<iframe src="/asp/tsu/sp/kyogi/Movie.asp?MovieID={{ $target_date }}09{{ str_pad($race_num, 2, '0', STR_PAD_LEFT) }}" frameborder="0" allowtransparency="true" scrolling="no" name="movie" id="movie" allowfullscreen></iframe>');
		document.write('</div>');
		document.write('<div class="cont_movie">');
		document.write('<iframe src="/asp/tsu/sp/kyogi/Movie.asp?MovieID={{ $target_date }}9909{{ str_pad($race_num, 2, '0', STR_PAD_LEFT) }}" frameborder="0" allowtransparency="true" scrolling="no" name="movie2" id="movie2" allowfullscreen></iframe>');
		document.write('</div>');
	}else if(strSmartAgent == "Android"){
		if( funcJsFlashPlayerCheck().player && ( !!userAgent && (userAgent[1] < 4.0 ) ) ) 
		{// FlashPlayerがあり4.0未満の端末のとき
			document.write('<ul id="tab_movie" class="cf">');
			document.write('<a href="/asp/tsu/sp/kyogi/Movie.asp?MovieID={{ $target_date }}09{{ str_pad($race_num, 2, '0', STR_PAD_LEFT) }}" target="_blank">');
			document.write('<li id="race">');
			document.write('リプレイ');
			document.write('</li>');
			document.write('</a>');
			document.write('<a href="/asp/tsu/sp/kyogi/Movie.asp?MovieID={{ $target_date }}9909{{ str_pad($race_num, 2, '0', STR_PAD_LEFT) }}" target="_blank">');
			document.write('<li id="interview"  >');
			document.write('展示リプレイ');
			document.write('</li>');
			document.write('</a>');
			document.write('</ul>');
		}
		else
		{
			//FlashPlayerがインストールされていない場合
			document.write('<ul id="tab_movie" class="cf">');
			document.write('<li id="race">リプレイ</li>');
			document.write('<li id="interview"  >展示リプレイ</li>');
			document.write('</ul>');
			document.write('<div class="cont_movie">');
			document.write('<iframe src="/asp/tsu/sp/kyogi/Movie.asp?MovieID={{ $target_date }}09{{ str_pad($race_num, 2, '0', STR_PAD_LEFT) }}" frameborder="0" allowtransparency="true" scrolling="no" name="movie" id="movie" allowfullscreen></iframe>');
			document.write('</div>');
			document.write('<div class="cont_movie">');
			document.write('<iframe src="/asp/tsu/sp/kyogi/Movie.asp?MovieID={{ $target_date }}9909{{ str_pad($race_num, 2, '0', STR_PAD_LEFT) }}" frameborder="0" allowtransparency="true" scrolling="no" name="movie2" id="movie2" allowfullscreen></iframe>');
			document.write('</div>');
		}
	}else if( strSmartAgent == "iPhone" || strSmartAgent == "iPad" || strSmartAgent == "iPod"){
			document.write('<ul id="tab_movie" class="cf">');
			document.write('<a href="/asp/tsu/sp/kyogi/Movie.asp?MovieID={{ $target_date }}09{{ str_pad($race_num, 2, '0', STR_PAD_LEFT) }}" target="_blank">');
			document.write('<li id="race">');
			document.write('リプレイ');
			document.write('</li>');
			document.write('</a>');
			document.write('<a href="/asp/tsu/sp/kyogi/Movie.asp?MovieID={{ $target_date }}9909{{ str_pad($race_num, 2, '0', STR_PAD_LEFT) }}" target="_blank">');
			document.write('<li id="interview"  >');
			document.write('展示リプレイ');
			document.write('</li>');
			document.write('</a>');
			document.write('</ul>');
	}






</script>

</div>




<div class="data cf"><!-- data start -->


<div id="replay_kekka">


<ul id="tab_kekka" class="cf">
<li id="shusso" >出走表</li>
<li id="selected" >レース結果</li>
</ul>


<div class="cont_kekka">

<!--出走表-->
<table id="ta_result" class="replay">
<tr>
    <th class="header1">枠番</th>
    <th class="header1">選手名</th>
    <th class="header1">級別</th>
    <th class="header1">年齢</th>
    <th class="header1">支部</th>
</tr>
    @foreach ($syussou as $teiban => $item)
        @if($ozz_info_array[$teiban] != 2)
            
            <tr>
                <td class="r{{$teiban}}">{{$teiban}}</td>
                <td class="name n{{$teiban}}">{{ str_replace(" ","",$item->SENSYU_NAME) }}</td>
                <td>{{$item->KYU_BETU}}</td>
                <td>{{$item->AGE}}</td>
                <td class="address">{{ str_replace('　','',$item->HOME_TOWN) }}</td>
            </tr>
        @else {{--欠場--}}
            <tr>
                <td class="r{{$teiban}}">{{$teiban}}</td>
                <td class="name n{{$teiban}}">欠場</td>
                <td>-</td>
                <td>-</td>
                <td class="address">-</td>
            </tr>
        @endif
    @endforeach
</table>

</div>



<div class="cont_kekka">

<!---結果--->
<table id="ta_result" class="replay">
<tr>
<th class="header1">着</th>
<th class="header1">枠番</th>
<th class="header1">選手名</th>
<th class="header1">進入</th>
<th class="header1">ST</th>
<th class="header1">レースタイム</th>
</tr>
@foreach ($kekka as $key=>$kekka_row)
    <tr>
        <td class="chaku">{{ $kekka_row->TYAKUJUN }}</td>
        <td class="r{{ $kekka_row->TEIBAN }}">{{ $kekka_row->TEIBAN }}</td>
        <td class="name n{{ $kekka_row->TEIBAN }}">{{ str_replace(" ","",$kekka_row->SENSYU_NAME) }}@if($kekka_row->SEX == 2)<img src="/kaisai/images/ico_lady.png" width="14">@endif</td>
        <td>{{ $kekka_row->SHINNYU_COURSE }}</td>
        @if($kekka_row->TYAKUJUN == 'F')
            <td class="FL">F{{substr($kekka_row->START_TIMING,1)}}</td>
        @elseif($kekka_row->TYAKUJUN == 'L')
            <td class="FL">L.--</td>
        @else
            <td>{{ substr($kekka_row->START_TIMING,1) }}</td>
        @endif
        <td>{{ ($kekka_row->RACE_TIME)?str_replace("’",".",($kekka_row->RACE_TIME)):"-" }}</td>
    </tr>
@endforeach
</table>

<div id="re_bottom" class="cf">
<div id="re_kimari">決まり手：{{ str_replace("　","",$kekka[0]->KIMARITE) }}</div>
<div id="re_henkan"></div>
</div>

<!---払い戻し--->
<table id="ta_result2">
<tr>
<th colspan="3" class="header1">払い戻し</th>
<th class="header1">人気</th>
</tr>
@foreach($sanrentan_array as $key=>$item)
    <tr>
        @if($key == 1)
            <th class="shurui" rowspan="{{count($sanrentan_array)}}">3連単</th>
        @endif

        @if(!$item['SANRENTAN_MONEY'] )
            {{--金額無し--}}
            <td class="kumi_tan">---</td>
            <td class="harai">---円</td>
            <td class="ninki">---</td>
        @else
            {{--通常--}}
            <td class="kumi_tan"><img src="/sp/kyogi/images/num{{(int) substr($item['SANRENTAN'],0,1)}}.png" alt="{{(int) substr($item['SANRENTAN'],0,1)}}" ><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num{{(int) substr($item['SANRENTAN'],1,1)}}.png" alt="{{(int) substr($item['SANRENTAN'],1,1)}}" ><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num{{(int) substr($item['SANRENTAN'],2,1)}}.png" alt="{{(int) substr($item['SANRENTAN'],2,1)}}" ></td>
            <td class="harai">{{ number_format($item['SANRENTAN_MONEY']) }}円</td>
            <td class="ninki">{{$item['SANRENTAN_NINKI']}}</td>
        @endif
    </tr>
@endforeach

@foreach($sanrenfuku_array as $key=>$item)
    <tr>
        @if($key == 1)
            <th class="shurui" rowspan="{{count($sanrenfuku_array)}}">3連複</th>
        @endif

        @if(!$item['SANRENFUKU_MONEY'] )
            {{--金額無し--}}
            <td class="kumi_fuku">---</td>
            <td class="harai">---円</td>
            <td class="ninki">---</td>
        @else
            {{--通常--}}
            <td class="kumi_fuku"><img src="/sp/kyogi/images/num{{(int) substr($item['SANRENFUKU'],0,1)}}.png" alt="{{(int) substr($item['SANRENFUKU'],0,1)}}" ><img src="/sp/kyogi/images/equal.png" alt="="><img src="/sp/kyogi/images/num{{(int) substr($item['SANRENFUKU'],1,1)}}.png" alt="{{(int) substr($item['SANRENFUKU'],1,1)}}" ><img src="/sp/kyogi/images/equal.png" alt="="><img src="/sp/kyogi/images/num{{(int) substr($item['SANRENFUKU'],2,1)}}.png" alt="{{(int) substr($item['SANRENFUKU'],2,1)}}" ></td>
            <td class="harai">{{ number_format($item['SANRENFUKU_MONEY']) }}円</td>
            <td class="ninki">{{$item['SANRENFUKU_NINKI']}}</td>
        @endif
    </tr>
@endforeach

@foreach($nirentan_array as $key=>$item)
    <tr>
        @if($key == 1)
            <th class="shurui" rowspan="{{count($nirentan_array)}}">2連単</th>
        @endif
        @if(!$item['NIRENTAN_MONEY'] )
            {{--金額無し--}}
            <td class="kumi_tan">---</td>
            <td class="harai">---円</td>
            <td class="ninki">---</td>
        @elseif($item['NIRENTAN_MONEY'] == 70)
            <td class="kumi_tan">特払</td>
            <td class="harai">70円</td>
            <td class="ninki">---</td>
        @else
            {{--通常--}}
            <td class="kumi_tan"><img src="/sp/kyogi/images/num{{(int) substr($item['NIRENTAN'],0,1)}}.png" alt="{{(int) substr($item['NIRENTAN'],0,1)}}" ><img src="/sp/kyogi/images/num.png" alt="-"><img src="/sp/kyogi/images/num{{(int) substr($item['NIRENTAN'],1,1)}}.png" alt="{{(int) substr($item['NIRENTAN'],1,1)}}" ></td>
            <td class="harai">{{ number_format($item['NIRENTAN_MONEY']) }}円</td>
            <td class="ninki">{{$item['NIRENTAN_NINKI']}}</td>
        @endif
    </tr>
@endforeach

@foreach($nirenfuku_array as $key=>$item)
    <tr>
        @if($key == 1)
            <th class="shurui" rowspan="{{count($nirenfuku_array)}}">2連複</th>
        @endif
        @if(!$item['NIRENFUKU_MONEY'] )
            {{--金額無し--}}
            <td class="kumi_fuku">---</td>
            <td class="harai">---円</td>
            <td class="ninki">---</td>
        @elseif($item['NIRENFUKU_MONEY'] == 70)
            <td class="kumi_fuku">特払</td>
            <td class="harai">70円</td>
            <td class="ninki">---</td>
        @else
            {{--通常--}}
            <td class="kumi_fuku"><img src="/sp/kyogi/images/num{{(int) substr($item['NIRENFUKU'],0,1)}}.png" alt="{{(int) substr($item['NIRENFUKU'],0,1)}}" ><img src="/sp/kyogi/images/equal.png" alt="="><img src="/sp/kyogi/images/num{{(int) substr($item['NIRENFUKU'],1,1)}}.png" alt="{{(int) substr($item['NIRENFUKU'],1,1)}}" ></td>
            <td class="harai">{{ number_format($item['NIRENFUKU_MONEY']) }}円</td>
            <td class="ninki">{{$item['NIRENFUKU_NINKI']}}</td>
        @endif
    </tr>
@endforeach

@foreach($kakurenfuku_array as $key=>$item)
    <tr>
        @if($key == 1)
            @if(count($kakurenfuku_array) > 3)
                <th class="shurui" rowspan="{{count($kakurenfuku_array)}}">拡連複</th>
            @else
                <th class="shurui" rowspan="3">拡連複</th>
            @endif
        @endif

        @if(!$item['KAKURENFUKU_MONEY'] )
            {{--金額無し--}}
            <td class="kumi_fuku">---</td>
            <td class="harai">---円</td>
            <td class="ninki">---</td>
        @else
            {{--通常--}}            
            <td class="kumi_fuku"><img src="/sp/kyogi/images/num{{(int) substr($item['KAKURENFUKU'],0,1)}}.png" alt="{{(int) substr($item['KAKURENFUKU'],0,1)}}"><img src="/sp/kyogi/images/equal.png" alt="="><img src="/sp/kyogi/images/num{{(int) substr($item['KAKURENFUKU'],1,1)}}.png" alt="{{(int) substr($item['KAKURENFUKU'],1,1)}}"></td>
            <td class="harai">{{ number_format($item['KAKURENFUKU_MONEY']) }}円</td>
            <td class="ninki">{{$item['KAKURENFUKU_NINKI']}}</td>
        @endif
    </tr>
@endforeach

@foreach($tansyo_array as $key=>$item)
    <tr>
        @if($key == 1)
            <th class="shurui" rowspan="{{count($tansyo_array)}}">単勝</th>
        @endif
        @if(!$item['TANSYO_MONEY'] )
            {{--金額無し--}}
            <td class="kumi_tan">---</td>
            <td class="harai">---円</td>
            <td class="ninki">---</td>
        @elseif($item['TANSYO_MONEY'] == 70)
            <td class="kumi_tan">特払</td>
            <td class="harai">70円</td>
            <td class="ninki">---</td>
        @else
            {{--通常--}} 
            <td class="kumi_tan"><img src="/sp/kyogi/images/num{{(int) $item['TANSYO'] }}.png" alt="{{(int) $item['TANSYO'] }}"></td>
            <td class="harai">{{ number_format($item['TANSYO_MONEY']) }}円</td>
            <td class="ninki">---</td>
        @endif
    </tr>
@endforeach

@foreach($fukusyo_array as $key=>$item)
    <tr>
        @if($key == 1)
            @if(count($fukusyo_array) > 2)
                <th class="shurui" scope="row" rowspan="{{count($fukusyo_array)}}">複勝</th>
            @else
                <th class="shurui" scope="row" rowspan="2">複勝</th>
            @endif
        @endif
        @if(!$item['FUKUSYO_MONEY'] )
            {{--金額無し--}}
            <td class="kumi_tan">---</td>
            <td class="harai">---円</td>
            <td class="ninki">---</td>
        @elseif($item['FUKUSYO_MONEY'] == 70)
            <td class="kumi_tan">特払</td>
            <td class="harai">70円</td>
            <td class="ninki">---</td>
        @else
            {{--通常--}}
            <td class="kumi_tan"><img src="/sp/kyogi/images/num{{(int) $item['FUKUSYO']}}.png" alt="{{(int) $item['FUKUSYO']}}"></td>
            <td class="harai">{{ number_format($item['FUKUSYO_MONEY']) }}円</td>
            <td class="ninki">---</td>
        @endif
    </tr>
@endforeach

</table>

<!--スタート展示-->
<table id="ta_shusso" class="start">
<tr>
    <th class="header1">CGスリット</th>
    <th class="header1">ST</th>
    <th class="header1">決まり手</th>
</tr>
@foreach($kekka_array as $teiban=>$item)
    <tr>
        <td class="slit_img @if($teiban == 1) in @elseif($teiban == 6) out bottom @endif "><img src="/sp/kyogi/images/st0{{$teiban}}.png" width="62" height="52" style="margin-right:{{ $item['right_margin'] }}px;"/></td>
        <td class="ST2 @if($teiban == 6) bottom @endif">
            @if($item['record']->TYAKUJUN == 'L')
                <span class="FL">L.--</span>
            @elseif($item['record']->TYAKUJUN == 'F')
                <span class="FL">F{{ mb_substr($item['record']->START_TIMING,1) }}</span>                        
            @else
                {{mb_substr($item['record']->START_TIMING,1)}}
            @endif
        </td>
        <td class="kimari @if($teiban == 6) bottom @endif">@if($teiban == 1){{str_replace("　","",($kekka[0]->KIMARITE??""))}}@endif</td>
    </tr>
@endforeach
</table>
<div id="syosai_kikou" class="cf">
    @if($kekka_info)
        <div class="kikou_left"><span class="gray">天候:</span>{{ str_replace('　','',$kekka_info->TENKOU) }}　<span class="gray">波高:</span>{{$kekka_info->HAKO}}cm　<span class="gray">風:</span>{{$kekka_info->KAZAMUKI2}}&nbsp;{{$kekka_info->FUSOKU}}m/秒</div>    
    @else
        <div class="kikou_left"><span class="gray">天候:</span>-　<span class="gray">波高:</span>-　<span class="gray">風:</span>-</div>
    @endif
</div><!-- weather end -->
</div>

</div>



</div><!-- data end -->



<!-- データリンク -->
<script type="text/javascript">
	funcTsuDataMenu();
</script>



</div><!-- main end -->


<div id="footer"><!-- footer start -->

<div id="page_top"><a href="#wrapper">▲ページ上部へ</a></div>

<div id="b_top"><a href="/sp/kyogi/replay.htm">レースリプレイTOP</a><a href="/asp/tsu/sp/kyogi/index.asp?jyo=09">データ＆予想</a></div>

<div id="copyright"><a href="/sp/">
<div>&copy;BOAT RACE TSU All rights reserved.</div>
</a></div>

</div><!-- footer end -->


</div><!-- wrapper end -->



</body>

</html>
