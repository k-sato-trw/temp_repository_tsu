
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=720px" />

<title>ボートレース津｜優勝戦プレイバック</title>

<meta name="Keywords" content="BOAT RACE津,津,優勝,優勝戦,結果,プレイバック">
<meta name="Description" content="BOAT RACE津の優勝戦結果を掲載しています。">

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href="/sp/css/reset.css" rel="stylesheet" type="text/css">
<link href="/sp/css/common.css" rel="stylesheet" type="text/css">
<link href="/sp/css/03play_b.css" rel="stylesheet" type="text/css">

<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="/sp/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/sp/js/common.js"></script>



<!--ヘッダーメニューjs-->
<script type="text/javascript" src="/sp/js/header_navi.js"></script>




<!-- 動画タブ -->
<script type="text/javascript" src="/sp/kyogi/js/jquery.new_tabs_movie.js"></script>

<!-- リプレイ結果タブ -->
<script type="text/javascript" src="/sp/kyogi/js/jquery.tabs_kekka.js"></script>
<script type="text/javascript" src="/asp/FlashPlayerCheck.js"></script>
<script type="text/javascript" src="/asp/SmartAgentGetter.js"></script>

<script type="text/javascript">
function funcFlag(){

	var Flag;
	Flag = '';
	return Flag;

}
</script>

</head>

<body>
<div id="wrapper">

<!--◆◆◆header◆◆◆-->

<div id="header_wrap">
<div id="header">
<h1><a href="/sp/">BOATRACE 津 #09</a></h1>
</div><!--/#header-->
<h2>優勝戦プレイバック</h2>

<div id="nav">
<script type="text/javascript">
            funcTsuMenu();
            </script>
</div><!--/#nav-->
</div><!--/#header_wrap-->



<!--◆◆◆レース名◆◆◆-->
<div id="result_kekka_day">
{{ date('Y/n/j',strtotime($target_date)) }}
<span class="back_b"><a href="javascript:history.back();">戻る</a></span>
<div class="clear"></div>
</div>
<div id="result_rn">
    @if(strpos($kaisai_master->開催名称,"SG") !== false)
        <span class="grade_sg">SG</span>
    @elseif(strpos($kaisai_master->開催名称,"G1") !== false)
        <span class="grade_g1">G1</span>
    @elseif(strpos($kaisai_master->開催名称,"G2") !== false)
        <span class="grade_g2">G2</span>
    @elseif(strpos($kaisai_master->開催名称,"G3") !== false)
        <span class="grade_g3">G3</span>
    @else
        <span class="grade_00">一般</span>
    @endif
<span class="race_name">
<p>
{{$kaisai_master->開催名称}}
</p>
</span>

<div class="clear"></div>
</div><!--/#result_rn--> 

<!--◆◆◆レース番号◆◆◆-->
<div id="result02_ttl">
<h2 class="h_r{{$race_num}}">{{$race_num}}R</h2>
<span class="race_cl">{{$syussou[1]->RACE_NAME}}</span>
<div class="clear"></div>
</div><!--/result02_ttl-->



<!--◆◆◆コンテンツ◆◆◆-->	

<div id="replay_movie">
<script type="text/javascript">
	strSmartAgent = funcJsSmartAgentGetter();
	var flag  = { os : false, player: false }; 
	var userAgent = navigator.userAgent.match(/android (\d+\.\d+)/i); 
	if(strSmartAgent == "PC"){
		document.write('<ul id="tab_movie" class="cf">');
		document.write('<li id="race">リプレイ</li>');
		document.write('</ul>');
		document.write('<div class="cont_movie">');
		document.write('<iframe src="/asp/tsu/sp/kyogi/Movie.asp?MovieID={{$movie_id}}" frameborder="0" allowtransparency="true" scrolling="no" name="movie" id="movie" allowfullscreen></iframe>');
		document.write('</div>');
	}else if(strSmartAgent == "Android"){
		if( funcJsFlashPlayerCheck().player && ( !!userAgent && (userAgent[1] < 4.0 ) ) ) 
		{// FlashPlayerがあり4.0未満の端末のとき
			document.write('<ul id="tab_movie" class="cf">');
			document.write('<a href="/asp/tsu/sp/kyogi/Movie.asp?MovieID={{$movie_id}}" target="_blank">');
			document.write('<li id="race">');
			document.write('リプレイ');
			document.write('</li>');
			document.write('</a>');
			document.write('</ul>');
		}
		else
		{
			//FlashPlayerがインストールされていない場合
			document.write('<ul id="tab_movie" class="cf">');
			document.write('<li id="race">リプレイ</li>');
			document.write('</ul>');
			document.write('<div class="cont_movie">');
			document.write('<iframe src="/asp/tsu/sp/kyogi/Movie.asp?MovieID={{$movie_id}}" frameborder="0" allowtransparency="true" scrolling="no" name="movie" id="movie" allowfullscreen></iframe>');
			document.write('</div>');
		}
	}else if( strSmartAgent == "iPhone" || strSmartAgent == "iPad" || strSmartAgent == "iPod"){
			document.write('<ul id="tab_movie" class="cf">');
			document.write('<a href="/asp/tsu/sp/kyogi/Movie.asp?MovieID={{$movie_id}}" target="_blank">');
			document.write('<li id="race">');
			document.write('リプレイ');
			document.write('</li>');
			document.write('</a>');
			document.write('</ul>');
	}






</script>

</div>



<div class="data cf"><!-- data start -->


<div id="replay_kekka">


<ul id="tab_kekka" class="cf">
<li id="shusso" class="selected">出走表</li>
<li id="kekka">レース結果</li>
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
        <td class="kimari @if($teiban == 6) bottom @endif">@if($item['record']->TYAKUJUN == 1){{str_replace("　","",($kekka[0]->KIMARITE??""))}}@endif</td>
    </tr>
@endforeach
</table>
<div id="weather" class="kekka cf">
@if($kekka_info)
    <div id="info"><span>天候:</span>{{ str_replace('　','',$kekka_info->TENKOU) }}<span>波高:</span>{{$kekka_info->HAKO}}cm<span>風向:</span>{{$kekka_info->KAZAMUKI2}}<span>風速:</span>{{$kekka_info->FUSOKU}}m</div>    
@else
    <div id="info"><span>天候:</span>-<span>波高:</span>-<span>風向:</span>-<span>風速:</span>-</div>
@endif
</div><!-- weather end -->
</div><!-- cont_kekka end -->

</div>



</div><!-- data end -->








<!--◆◆◆フッター◆◆◆-->
<div id="footer_wrap">
<div id="ft_logo">BOAT RACE TSU</div>
<div id="ft_credit">&copy;BOAT RACE TSU All rights reserved.</div></div>


</div><!--/#wrapper-->

</body>
</html>
