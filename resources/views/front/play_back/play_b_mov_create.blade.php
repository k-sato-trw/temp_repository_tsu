@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ボートレース津｜優勝戦プレイバック</title>
<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/03play_b.css" rel="stylesheet" type="text/css">


<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/js/common.js"></script>

<!--iframe-auto-height-->
<script type="text/javascript" src="/kaisai/js/jquery.iframe-auto-height.js"></script>
<!--リプレイメニュー用-->
<script type="text/javascript" src="/kaisai/js/jquery.replay.js"></script>
<!---タブ--->
<script type="text/javascript" src="/js/tabs.js"></script>
<style type="text/css">
.myplayer {
}
.myplayer iframe {
}
</style>
</head>

<body>
<div id="pb_mov_main">

<div id="pb_mov_header">

 <div id="race_data_wrap">
                <div class="date">
                <span class="d2"><img src="/03play_b/images/y_2021.png" width="48" height="16" alt=""/></span>
                
                	<span class="d1">
                        <?php
                            $month = date('n',strtotime($data_syssou['target_date']));
                            $day = date('j',strtotime($data_syssou['target_date']));
                            $month_array = [];
                            $day_array = [];

                            if($month >= 10){
                                $month_array[] = substr($month,0,1);
                                $month_array[] = substr($month,1,1);
                            }else{
                                $month_array[] = $month;
                            }
                            if($day >= 10){
                                $day_array[] = substr($day,0,1);
                                $day_array[] = substr($day,1,1);
                            }else{
                                $day_array[] = $day;
                            }
                        ?>
@foreach($month_array as $item)<img src="/03play_b/images/d1_{{$item}}.png">@endforeach<img src="/03play_b/images/d1_sla.png">@foreach($day_array as $item)<img src="/03play_b/images/d1_{{$item}}.png">@endforeach<span><img src="/03play_b/images/d1_{{ $general->weeknumber_to_weekalphabet(date('w',strtotime($data_syssou['target_date']))) }}.png"></span></span>

                @if(strpos($data_syssou['kaisai_master']->開催名称,"SG") !== false)
                    <span class="d3 GS">GS</span>
                @elseif(strpos($data_syssou['kaisai_master']->開催名称,"G1") !== false)
                    <span class="d3 G1">G1</span>
                @elseif(strpos($data_syssou['kaisai_master']->開催名称,"G2") !== false)
                    <span class="d3 G2">G2</span>
                @elseif(strpos($data_syssou['kaisai_master']->開催名称,"G3") !== false)
                    <span class="d3 G3">G3</span>
                @else
                    <span class="d3 G0">一般</span>
                @endif
                    
                </div><!--/date-->
                <div class="name">
            <span>{{ $data_syssou['kaisai_master']->開催名称 }}</span><!-- class="small" でサイズ小 -->
                </div><!--/name-->
                <div class="clear"></div>
            </div><!--/#race_data_wrap-->


</div>


<!--///リプレイ画像///--> 
<div id="contents_left">
<div id="race_movie_wrap">

<div class="myplayer">
<iframe src="https://jlcapi.jlc.ne.jp/new_bb/Streamer/GetBoatraceReplay.php?VODType=2&HoldingDay={{$data_syssou['target_date']}}&StudiumNo=09&RaceNo={{$data_syssou['race_num']}}" frameborder="0" scrolling="no" allowfullscreen="true" style="margin:0;padding:0;width:720px;height:405px;"></iframe>
</div>

 <!--ムービー下に表示-->
        <div id="replay_mark">Replay</div>
	<!--
    	[天気class一覧]
        晴.hare / 曇.kumori / 雨.ame / 雪.yuki / 霧.kiri / 台風.taihu
    -->

<ul id="weather">
	
        	<li id="w2"><span class="hare">[天候]</span>{{$data_sub['kekka_info']->KION}}℃
</li>
            <li id="w3"><span>[波高]</span>{{$data_sub['kekka_info']->KION}}cm</li>
            <li id="w4"><span>風</span>{{$data_sub['kekka_info']->KAZAMUKI2}} {{$data_sub['kekka_info']->FUSOKU}}m</li>
    
    <li id="w1"></li>
    <div class="clear"></div>
</ul><!--/#waether-->



</div><!--/#race_movie_wrap-->


<div class="clear"></div>
</div><!--/#contents_left-->
        


<!--///リプレイデータ///-->        
<div id="contents_right">

<div id="replay_header">
<ul id="btn" class="tabs">
<li class="b1 active"><a href="#tab1" data-tor-smoothscroll="noSmooth">出走表</a></li>
<li class="b2"><a href="#tab2" data-tor-smoothscroll="noSmooth">払い戻し</a></li>
<li class="b3"><a href="#tab3" data-tor-smoothscroll="noSmooth">結果詳細</a></li>
<div class="clear"></div>
</ul>
</div>

<!--///tab1 出走表///-->
<div id="tab1" class="tab_content">
 <div id="replay_syusso">
  <table id="ta_tenji">
  <tbody>
    <tr>
      <th scope="col" class="waku">枠</th>
      <th scope="col" class="name">選手名</th>
      <th scope="col" class="sin">進入</th>
      <th scope="col" class="st">ST</th>
      <th scope="col" class="time">タイム</th>
      <th scope="col" class="tilt">チルト</th>
    </tr>
    @foreach ($data_syssou['syussou'] as $teiban => $item)
        @if($data_syssou['ozz_info_array'][$teiban] != 2)
            <tr>
                <td class="waku w{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
                <td class="name w{{$item->TEIBAN}}">
                    <div class="name">{{$item->SENSYU_NAME}}@if($item->SEX == 2)<img src="/kaisai/images/ico_lady.png" width="14">@endif</div>
                    <div class="number">{{$item->TOUBAN}}／{{$item->KYU_BETU}}</div>
                </td>

                @if($item->ST_COURSE == 'X' || $item->ST_COURSE == 'N')
                    @if($item->TENJI_TIME && $item->TENJI_TIME == '-' && $item->TILT_KAKUDO && $item->TILT_KAKUDO == '-' )
                        {{--前半データ無し、後半データ有り--}}
                        <td colspan="2">不参加</td>
                        <td>{{$item->TENJI_TIME}}</td>
                        <td>{{$item->TILT_KAKUDO}}</td>
                    @else
                        {{--前半データ無し、後半データ無し--}}
                        <td colspan="4">不参加</td>
                    @endif
                    
                @else
                    {{--前半データ有り、後半データ有り--}}
                    <td>{{$item->ST_COURSE}}</td>
                    @if($item->ST_TIMING == 'F')
                        <td><span class="st_f">F{{substr($item->ST_TIMING,1)}}</span></td>
                    @elseif($item->ST_TIMING == 'L')
                        <td><span class="st_f">L.--</span></td>
                    @else
                        <td>{{substr($item->ST_TIMING,1)}}</td>
                    @endif
                    <td>{{$item->TENJI_TIME}}</td>
                    <td>{{$item->TILT_KAKUDO}}</td>    
                @endif                
            </tr>
        @else {{--欠場--}}
            <tr>
                <td class="waku w{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
                <td class="name w{{$item->TEIBAN}}">
                欠場
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>              
            </tr>
        @endif
    @endforeach
    
  </tbody>
</table>

</div><!--/#replay_syusso-->       
</div> <!--/tab1-->           


<!--///tab2 払い戻し///-->
<div id="tab2" class="tab_content">
<div id="replay_harai">
  
<table>
  <tbody>
    <tr>
      <th class="th2" scope="col">勝式</th>
      <th class="kumi" scope="col">組番</th>
      <th class="harai" scope="col">払戻金</th>
      <th class="ninki" scope="col">人気</th>
    </tr>
    
    @foreach($data_harai['sanrentan_array'] as $key=>$item)
        <tr>
            @if($key == 1)
                <th class="th2" scope="row" rowspan="{{count($data_harai['sanrentan_array'])}}">3連単</th>
            @endif

            @if(!$item['SANRENTAN_MONEY'] )
                {{--金額無し--}}
                <td class="kumi">-</td>
                <td class="harai">-</td>
                <td class="ninki">-</td>
            @else
                {{--通常--}}
                <td class="kumi"><span class="w{{(int) substr($item['SANRENTAN'],0,1)}}">{{(int) substr($item['SANRENTAN'],0,1)}}</span><span class="l1">-</span><span class="w{{(int) substr($item['SANRENTAN'],1,1)}}">{{(int) substr($item['SANRENTAN'],1,1)}}</span><span class="l1">-</span><span class="w{{(int) substr($item['SANRENTAN'],2,1)}}">{{(int) substr($item['SANRENTAN'],2,1)}}</span></td>
                <td class="harai">{{ number_format($item['SANRENTAN_MONEY']) }}<span>円</span></td>
                <td class="ninki">{{$item['SANRENTAN_NINKI']}}</td>
            @endif
        </tr>
    @endforeach

    @foreach($data_harai['sanrenfuku_array'] as $key=>$item)
        <tr>
            @if($key == 1)
                <th class="th2" scope="row" rowspan="{{count($data_harai['sanrenfuku_array'])}}">3連複</th>
            @endif

            @if(!$item['SANRENFUKU_MONEY'] )
                {{--金額無し--}}
                <td class="kumi">-</td>
                <td class="harai">-</td>
                <td class="ninki">-</td>
            @else
                {{--通常--}}                            
                <td class="kumi"><span class="w{{(int) substr($item['SANRENFUKU'],0,1)}}">{{(int) substr($item['SANRENFUKU'],0,1)}}</span><span class="l2">=</span><span class="w{{(int) substr($item['SANRENFUKU'],1,1)}}">{{(int) substr($item['SANRENFUKU'],1,1)}}</span><span class="l2">=</span><span class="w{{(int) substr($item['SANRENFUKU'],2,1)}}">{{(int) substr($item['SANRENFUKU'],2,1)}}</span></td>
                <td class="harai">{{ number_format($item['SANRENFUKU_MONEY']) }}<span>円</span></td>
                <td class="ninki">{{$item['SANRENFUKU_NINKI']}}</td>
            @endif
        </tr>
    @endforeach    

    @foreach($data_harai['nirentan_array'] as $key=>$item)
        <tr>
            @if($key == 1)
                <th class="th2" scope="row" rowspan="{{count($data_harai['nirentan_array'])}}">2連単</th>
            @endif
            @if(!$item['NIRENTAN_MONEY'] )
                {{--金額無し--}}
                <td class="kumi">-</td>
                <td class="harai">-</td>
                <td class="ninki">-</td>
            @elseif($item['NIRENTAN_MONEY'] == 70)
                <td class="kumi">特払</td>
                <td class="harai">70<span>円</span></td>
                <td class="ninki">-</td>
            @else
                {{--通常--}}
                <td class="kumi"><span class="w{{(int) substr($item['NIRENTAN'],0,1)}}">{{(int) substr($item['NIRENTAN'],0,1)}}</span><span class="l1">-</span><span class="w{{(int) substr($item['NIRENTAN'],1,1)}}">{{(int) substr($item['NIRENTAN'],1,1)}}</span></td>
                <td class="harai">{{ number_format($item['NIRENTAN_MONEY']) }}<span>円</span></td>
                <td class="ninki">{{$item['NIRENTAN_NINKI']}}</td>
            @endif
        </tr>
    @endforeach

    @foreach($data_harai['nirenfuku_array'] as $key=>$item)
        <tr>
            @if($key == 1)
                <th class="th2" scope="row" rowspan="{{count($data_harai['nirenfuku_array'])}}">2連複</th>
            @endif
            @if(!$item['NIRENFUKU_MONEY'] )
                {{--金額無し--}}
                <td class="kumi">-</td>
                <td class="harai">-</td>
                <td class="ninki">-</td>
            @elseif($item['NIRENFUKU_MONEY'] == 70)
                <td class="kumi">特払</td>
                <td class="harai">70<span>円</span></td>
                <td class="ninki">-</td>
            @else
                {{--通常--}}
                <td class="kumi"><span class="w{{(int) substr($item['NIRENFUKU'],0,1)}}">{{(int) substr($item['NIRENFUKU'],0,1)}}</span><span class="l2">=</span><span class="w{{(int) substr($item['NIRENFUKU'],1,1)}}">{{(int) substr($item['NIRENFUKU'],1,1)}}</span></td>
                <td class="harai">{{ number_format($item['NIRENFUKU_MONEY']) }}<span>円</span></td>
                <td class="ninki">{{$item['NIRENFUKU_NINKI']}}</td>
            @endif
        </tr>
    @endforeach

    @foreach($data_harai['kakurenfuku_array'] as $key=>$item)
        <tr>
            @if($key == 1)
                @if(count($data_harai['kakurenfuku_array']) > 3)
                    <th class="th2" scope="row" rowspan="{{count($data_harai['kakurenfuku_array'])}}">拡連複</th>
                @else
                    <th class="th2" scope="row" rowspan="3">拡連複</th>
                @endif
            @endif

            @if(!$item['KAKURENFUKU_MONEY'] )
                {{--金額無し--}}
                <td class="kumi">-</td>
                <td class="harai">-</td>
                <td class="ninki">-</td>
            @else
                {{--通常--}}
                <td class="kumi"><span class="w{{(int) substr($item['KAKURENFUKU'],0,1)}}">{{(int) substr($item['KAKURENFUKU'],0,1)}}</span><span class="l2">=</span><span class="w{{(int) substr($item['KAKURENFUKU'],1,1)}}">{{(int) substr($item['KAKURENFUKU'],1,1)}}</span></td>
                <td class="harai">{{ number_format($item['KAKURENFUKU_MONEY']) }}<span>円</span></td>
                <td class="ninki">{{$item['KAKURENFUKU_NINKI']}}</td>
            @endif
        </tr>
    @endforeach

    @foreach($data_harai['tansyo_array'] as $key=>$item)
        <tr>
            @if($key == 1)
                <th rowspan="{{count($data_harai['tansyo_array'])}}">単勝</th>
            @endif
            @if(!$item['TANSYO_MONEY'] )
                {{--金額無し--}}
                <td class="kumi">-</td>
                <td class="harai">-</td>
                <td class="ninki">-</td>
            @elseif($item['TANSYO_MONEY'] == 70)
                <td class="kumi">特払</td>
                <td class="harai">70<span>円</span></td>
                <td class="ninki">-</td>
            @else
                {{--通常--}}
                <td class="kumi"><span class="w{{(int) $item['TANSYO'] }}">{{(int) $item['TANSYO'] }}</span></td>
                <td class="harai">{{ number_format($item['TANSYO_MONEY']) }}<span>円</span></td>
                <td class="ninki">-</td>
            @endif
        </tr>
    @endforeach

    @foreach($data_harai['fukusyo_array'] as $key=>$item)
        <tr>
            @if($key == 1)
                @if(count($data_harai['fukusyo_array']) > 2)
                    <th class="th2" scope="row" rowspan="{{count($data_harai['fukusyo_array'])}}">複勝</th>
                @else
                    <th class="th2" scope="row" rowspan="2">複勝</th>
                @endif
            @endif
            @if(!$item['FUKUSYO_MONEY'] )
                {{--金額無し--}}
                <td class="kumi">-</td>
                <td class="harai">-</td>
                <td class="ninki">-</td>
            @elseif($item['FUKUSYO_MONEY'] == 70)
                <td class="kumi">特払</td>
                <td class="harai">70<span>円</span></td>
                <td class="ninki">-</td>
            @else
                {{--通常--}}
                <td class="kumi"><span class="w{{(int) $item['FUKUSYO']}}">{{(int) $item['FUKUSYO']}}</span></td>
                <td class="harai">{{ number_format($item['FUKUSYO_MONEY']) }}<span>円</span></td>
                <td class="ninki">-</td>
            @endif
        </tr>
    @endforeach
  </tbody>
</table>

<dl id="kimari">
    <dt>決まり手</dt>
    <dd>{{str_replace("　","",($data_harai['kekka'][0]->KIMARITE??""))}}    </dd>
    <div class="clear"></div>
</dl>

<div class="clear"></div>

</div><!--/#replay_harai-->
</div><!--/tab2--> 


<!--///tab3 結果詳細///--> 
<div id="tab3" class="tab_content">
<div id="replay_kekka">
  <table id="ta_tenji" class="left">
    <tbody>
      <tr>
        <th scope="col" class="th2">着</th>
        <th scope="col" class="waku">枠</th>
        <th scope="col" class="name">選手名</th>
        <th scope="col" class="time">レース<br>
          タイム</th>
      </tr>
        @foreach ($data_kekka['kekka'] as $key=>$kekka_row)
            <tr>
                <td class="th2">{{ $kekka_row->TYAKUJUN }}</td>
                <td class="waku w{{ $kekka_row->TEIBAN }}">{{ $kekka_row->TEIBAN }}</td>
                <td class="name w{{ $kekka_row->TEIBAN }}"><div class="name">{{ str_replace(" ","",$kekka_row->SENSYU_NAME) }}@if($kekka_row->SEX == 2)<img src="/kaisai/images/ico_lady.png" width="14">@endif</div>
                <div class="number">{{ $data_kekka['syussou'][$kekka_row->TEIBAN]->TOUBAN }}／{{ $data_kekka['syussou'][$kekka_row->TEIBAN]->KYU_BETU }}</div></td>
                <td class="time">{{ ($kekka_row->RACE_TIME)?str_replace("’",".",($kekka_row->RACE_TIME)):"-" }}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
  <table id="ta_tenji" class="right">
    <tbody>
      <tr>
        <th class="sin" scope="col">進入</th>
        <th class="ST" scope="col">ST</th>
        <th class="kimari" scope="col">決まり手</th>
      </tr>
      @foreach ($data_kekka['kekka_shinyujun'] as $kekka_row)
            <tr>
                <td class="sin"><span class="w{{ $kekka_row->TEIBAN }}">{{ $kekka_row->TEIBAN }}</span></td>
                @if($kekka_row->TYAKUJUN == 'F')
                    <td class="ST"><span class="st_f">F{{substr($kekka_row->START_TIMING,1)}}</span></td>
                @elseif($kekka_row->TYAKUJUN == 'L')
                    <td class="ST"><span class="st_f">L.--</span></td>
                @else
                    <td class="ST">{{substr($kekka_row->START_TIMING,1)}}</td>
                @endif
                <td class="kimari">
                    @if($kekka_row->TYAKUJUN == 1)
                        {{ $kekka_row->KIMARITE }}
                    @else
                        &nbsp;
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  
  <div class="clear"></div>
</div><!--/#replay_kekka-->
</div><!--/tab3--> 
            
<div class="clear"></div>
</div><!--/#contents_right-->

</div>

</body>
</html>
