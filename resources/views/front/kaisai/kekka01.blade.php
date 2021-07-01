

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Refresh" CONTENT="90; URL=/asp/kyogi/09/pc/kekka01/kekka01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">
<title>レース結果</title>

<link href="/kaisai/css/reset.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/common.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/syusso.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/kekka.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="/kaisai/js/jquery-1.8.2.min.js"></script>


<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="/asp/kyogi/09/pc/Jsinfo.js"></script>
</head>

<body>


<div id="main_menu">
<div id="date_btn">

<div id="date">
<div id="date_l"><script type="text/javascript">
	func_Backbtn('{{$target_date}}' , 'kekka01' );
</script>
</div><!--/#date_l-->
<div id="date_c">
    @if($kaisai_master)
        @if(($chushi_junen->中止開始レース番号 ?? 99) <= $race_num)
            中止
        @else
            @if($kaisai_master->開始日付 == $target_date)
                初日
            @elseif($kaisai_master->終了日付 == $target_date)
                最終日                
            @else
                {{$race_header->KAISAI_DAYS}}日目
            @endif
        @endif
    @endif
<span class="date">{{ date('n/j',strtotime($target_date)) }}</span></div><!--/#date_c-->
<div id="date_r"><script type="text/javascript">
	func_Nextbtn('{{$target_date}}' , 'kekka01' );
</script>
</div><!--/#date_r-->
<div class="clear"></div>
</div><!--/#date-->

</div><!--/#date_btn-->

<div id="race_btn">
<ul>
<script type="text/javascript">
func_RaceNumList('{{$target_date}}' , {{$race_num}}, 'kekka01' );
</script>
<div class="clear"></div>
</ul>
</div><!--/#race_btn-->
<div class="clear"></div>
</div><!--/#main_menu-->

<div id="race_info">
<div id="name">{{ $syussou[1]->RACE_NAME ?? "" }}</div>
<div id="time">発売締切<span>{{substr($shimekiri_jikoku,0,2)}}:{{substr($shimekiri_jikoku,2,2)}}</span></div>
<div class="clear"></div>
</div><!--/#race_info-->


<div id="main_race">
<div id="main_race_l"><a href="/asp/kyogi/09/pc/st01/st01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">前へ</a></div><!--/#main_race_l-->

<!-----------------------------------
▼レース結果 -->
<div id="kekka">
<!-----------------------------------
▼メインメニュー -->
<ul id="race_btn_main">
<li id="btn01"><a href="/asp/kyogi/09/pc/syusso01/syusso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">出走表</a></li>
<li id="btn02"><a href="/asp/kyogi/09/pc/odds01/odds01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">オッズ</a></li>
<li id="btn03"><a href="/asp/kyogi/09/pc/yoso01/yoso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">レース予想</a></li>
<li id="btn04"><a href="/asp/kyogi/09/pc/st01/st01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">スタ展・直前情報</a></li>
<li id="btn05" class="select">レース結果</li>
<div class="clear"></div>
</ul>

<!-----------------------------------
▼タブ -->
<div id="tab">
</div><!--/#tab-->


<!-----------------------------------
▼レース結果内容 -->
<div class="cont_kekka">
<div id="kekka01">

<table class="ta_kekka">
    <tr>
        <th class="chaku" scope="col">着</th>
        <th class="race" scope="col">枠</th>
        <th class="large" scope="col">選手名</th>
        <th class="large" scope="col">進<br />入</th>
        <th class="large" scope="col">ST</th>
        <th class="large" scope="col">レース<br>タイム</th>
    </tr>
    @foreach($kekka as $item)
        <tr>
            <td class="chaku">{{$item->TYAKUJUN}}</td>
            <td class="waku w{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
            <td class="name w{{$item->TEIBAN}}">{{$item->SENSYU_NAME}}</td>
            <td class="sin">{{$item->SHINNYU_COURSE}}</td>
            <td class="ST1">{{mb_substr($item->START_TIMING,1)}}</td>
            <td class="time">{{ ($item->RACE_TIME)?str_replace("’",".",($item->RACE_TIME)):"─" }}</td>
        </tr>
    @endforeach
</table>

<div id="kekka_sub">
<div id="kimari">決まり手：<span>{{str_replace("　","",($kekka[0]->KIMARITE??""))}}</span></div>
<div class="clear"></div>
</div>
@if($kekka_info)
    <div id="weather"><span>天候：</span>{{$kekka_info->TENKOU.$kekka_info->KION}}℃　<span>波高：</span>{{$kekka_info->HAKO}}cm　<span>風：</span>{{$kekka_info->KAZAMUKI2 . $kekka_info->FUSOKU}}m</div>    
@else
    <div id="weather"><span>天候：</span>―　<span>波高：</span>―　<span>風：</span>―　</div>
@endif

<!--▼スリット -->
<div>
<table id="ta_st">

    @foreach($kekka_array as $teiban=>$item)
        <tr>
            @if($teiban == 1)
                <td class="inout"><img src="/kaisai/images/st_in.png" width="30" height="20" alt=""/></td>
            @elseif($teiban == 6)
                <td class="inout"><img src="/kaisai/images/st_out.png" width="30" height="20" alt=""/></td>
            @else
                <td></td>
            @endif
            
            <td class="slit"><img src="/kaisai/images/st0{{$teiban}}_s.png" width="34" height="28" alt="{{$teiban}}" style="margin-right:{{ $item['right_margin'] }}px;"/></td>
            <td class="slit_st">
                @if($item['record']->TYAKUJUN == 'L')
                    <span>L.--</span>
                @elseif($item['record']->TYAKUJUN == 'F')
                    <span>F{{ mb_substr($item['record']->START_TIMING,1) }}</span>                        
                @else
                    {{mb_substr($item['record']->START_TIMING,1)}}
                @endif
            </td>
        </tr>
    @endforeach
  
</table>
</div>


</div><!--/kekka01-->


<!--▼払い戻し -->

<div id="kekka02">
<table class="ta_harai">
  <tr>
    <th colspan="3" scope="col">払い戻し</th>
    <th class="ninki" scope="col">人気</th>
  </tr>

    {{--３連単--}}
    @if($fuseiritu_array[4] == 1) {{--不成立--}}
        <tr>
            <td class="class" rowspan="1">３連単</td>
            <td class="kumi02 bottom">不成立</td>
            <td class="value bottom">―</td>
            <td class="ninki bottom">―</td>
        </tr>
    @elseif(!$sanrentan_array)
        <tr>
            <td class="class" rowspan="1">３連単</td>
            <td class="kumi02 bottom">―</td>
            <td class="value bottom">―</td>
            <td class="ninki bottom">―</td>
        </tr>
    @else
        @foreach ($sanrentan_array as $key => $item)
            <tr>
                @if($key == 1)
                    <td class="class" rowspan="{{count($sanrentan_array)}}">３連単</td>
                @endif

                <td class="kumi02 bottom">
                    <span class="w{{(int) substr($item['SANRENTAN'],0,1)}} waku_s">{{(int) substr($item['SANRENTAN'],0,1)}}</span>-<span class="w{{(int) substr($item['SANRENTAN'],1,1)}} waku_s">{{(int) substr($item['SANRENTAN'],1,1)}}</span>-<span class="w{{(int) substr($item['SANRENTAN'],2,1)}} waku_s">{{(int) substr($item['SANRENTAN'],2,1)}}</span>
                </td>
                <td class="value bottom"><span>{{number_format($item['SANRENTAN_MONEY'])}}</span>円</td>
                <td class="ninki bottom">{{$item['SANRENTAN_NINKI']}}</td>

            </tr>
        @endforeach
    @endif

    {{--３連複--}}
    @if($fuseiritu_array[4] == 1) {{--不成立--}}
        <tr>
            <td class="class" rowspan="1">３連複</td>
            <td class="kumi02 bottom">不成立</td>
            <td class="value bottom">―</td>
            <td class="ninki bottom">―</td>
        </tr>
    @elseif(!$sanrenfuku_array)
        <tr>
            <td class="class" rowspan="1">３連複</td>
            <td class="kumi02 bottom">―</td>
            <td class="value bottom">―</td>
            <td class="ninki bottom">―</td>
        </tr>
    @else
        @foreach ($sanrenfuku_array as $key => $item)
            <tr>
                @if($key == 1)
                    <td class="class" rowspan="{{count($sanrenfuku_array)}}">３連複</td>
                @endif

                <td class="kumi02 bottom ">
                    <span class="w{{(int) substr($item['SANRENFUKU'],0,1)}} waku_s">{{(int) substr($item['SANRENFUKU'],0,1)}}</span>=<span class="w{{(int) substr($item['SANRENFUKU'],1,1)}} waku_s">{{(int) substr($item['SANRENFUKU'],1,1)}}</span>=<span class="w{{(int) substr($item['SANRENFUKU'],2,1)}} waku_s">{{(int) substr($item['SANRENFUKU'],2,1)}}</span>
                </td>
                <td class="value bottom "><span>{{number_format($item['SANRENFUKU_MONEY'])}}</span>円</td>
                <td class="ninki bottom ">{{$item['SANRENFUKU_NINKI']}}</td>

            </tr>
        @endforeach
    @endif

    {{--2連単--}}
    @if($fuseiritu_array[2] == 1) {{--不成立--}}
        <tr>
            <td class="class" rowspan="1">２連単</td>
            <td class="kumi02 bottom">不成立</td>
            <td class="value bottom">―</td>
            <td class="ninki bottom">―</td>
        </tr>
    @elseif(!$nirentan_array)
        <tr>
            <td class="class" rowspan="1">２連単</td>
            <td class="kumi02 bottom">―</td>
            <td class="value bottom">―</td>
            <td class="ninki bottom">―</td>
        </tr>
    @else
        @foreach ($nirentan_array as $key => $item)
            <tr>
                @if($key == 1)
                    <td class="class" rowspan="{{count($nirentan_array)}}">２連単</td>
                @endif

                @if($item['NIRENTAN_MONEY'] == '70')
                    <td class="kumi02 bottom">特払い</td>
                    <td class="value bottom"><span>70</span>円</td>
                    <td class="ninki bottom">―</td>
                @else
                    <td class="kumi02 bottom">
                        <span class="w{{(int) substr($item['NIRENTAN'],0,1)}} waku_s">{{(int) substr($item['NIRENTAN'],0,1)}}</span>-<span class="w{{(int) substr($item['NIRENTAN'],1,1)}} waku_s">{{(int) substr($item['NIRENTAN'],1,1)}}</span>
                    </td>
                    <td class="value bottom"><span>{{number_format($item['NIRENTAN_MONEY'])}}</span>円</td>
                    <td class="ninki bottom">{{$item['NIRENTAN_NINKI']}}</td>
                @endif
            </tr>
        @endforeach
    @endif


    
    {{--２連複--}}
    @if($fuseiritu_array[3] == 1) {{--不成立--}}
        <tr>
            <td class="class" rowspan="1">２連複</td>
            <td class="kumi02 bottom">不成立</td>
            <td class="value bottom">―</td>
            <td class="ninki bottom">―</td>
        </tr>
    @elseif(!$nirenfuku_array)
        <tr>
            <td class="class" rowspan="1">２連複</td>
            <td class="kumi02 bottom">―</td>
            <td class="value bottom">―</td>
            <td class="ninki bottom">―</td>
        </tr>
    @else
        @foreach ($nirenfuku_array as $key => $item)
            <tr>
                @if($key == 1)
                    <td class="class" rowspan="{{count($nirenfuku_array)}}">２連複</td>
                @endif

                @if($item['NIRENFUKU_MONEY'] == '70')
                    <td class="kumi02 bottom">特払い</td>
                    <td class="value bottom"><span>70</span>円</td>
                    <td class="ninki bottom">―</td>
                @else
                    <td class="kumi02 bottom">
                        @if(substr($item['NIRENFUKU'],0,1) < substr($item['NIRENFUKU'],1,1))                            
                            <span class="w{{(int) substr($item['NIRENFUKU'],0,1)}} waku_s">{{(int) substr($item['NIRENFUKU'],0,1)}}</span>=<span class="w{{(int) substr($item['NIRENFUKU'],1,1)}} waku_s">{{(int) substr($item['NIRENFUKU'],1,1)}}</span>
                        @else
                            <span class="w{{(int) substr($item['NIRENFUKU'],1,1)}} waku_s">{{(int) substr($item['NIRENFUKU'],1,1)}}</span>=<span class="w{{(int) substr($item['NIRENFUKU'],0,1)}} waku_s">{{(int) substr($item['NIRENFUKU'],0,1)}}</span>
                        @endif
                    </td>
                    <td class="value bottom"><span>{{number_format($item['NIRENFUKU_MONEY'])}}</span>円</td>
                    <td class="ninki bottom">{{$item['NIRENFUKU_NINKI']}}</td>
                @endif
            </tr>
        @endforeach
    @endif

    {{--拡連複--}}
    @if($fuseiritu_array[6] == 1) {{--不成立--}}
        <tr>
            <td class="class" rowspan="1">拡連複</td>
            <td class="kumi02 bottom">不成立</td>
            <td class="value bottom">―</td>
            <td class="ninki bottom">―</td>
        </tr>
    @elseif(!$kakurenfuku_array)
        <tr>
            <td class="class" rowspan="1">拡連複</td>
            <td class="kumi02 bottom">―</td>
            <td class="value bottom">―</td>
            <td class="ninki bottom">―</td>
        </tr>
    @else
        @foreach ($kakurenfuku_array as $key => $item)
            <tr>
                @if($key == 1)
                    <td class="class" rowspan="{{count($kakurenfuku_array)}}">拡連複</td>
                @endif

                <td class="kumi02 @if(($key + 1) == count($kakurenfuku_array)) bottom @endif">
                    <span class="w{{(int) substr($item['KAKURENFUKU'],0,1)}} waku_s">{{(int) substr($item['KAKURENFUKU'],0,1)}}</span>=<span class="w{{(int) substr($item['KAKURENFUKU'],1,1)}} waku_s">{{(int) substr($item['KAKURENFUKU'],1,1)}}</span>
                </td>
                <td class="value @if(($key + 1) == count($kakurenfuku_array)) bottom @endif"><span>{{number_format($item['KAKURENFUKU_MONEY'])}}</span>円</td>
                <td class="ninki @if(($key + 1) == count($kakurenfuku_array)) bottom @endif">{{$item['KAKURENFUKU_NINKI']}}</td>
                
            </tr>
        @endforeach
    @endif
    
    {{--単勝--}}
    @if($fuseiritu_array[0] == 1) {{--不成立--}}
        <tr>
            <td class="class" rowspan="1">単勝</td>
            <td class="kumi02 bottom">不成立</td>
            <td class="value bottom">―</td>
            <td class="ninki bottom">―</td>
        </tr>
    @elseif(!$tansyo_array)
        <tr>
            <td class="class" rowspan="1">単勝</td>
            <td class="kumi02 bottom">―</td>
            <td class="value bottom">―</td>
            <td class="ninki bottom">―</td>
        </tr>
    @else
        @foreach ($tansyo_array as $key => $item)
            <tr>
                @if($key == 1)
                    <td class="class" rowspan="{{count($tansyo_array)}}">単勝</td>
                @endif
                
                @if($item['TANSYO_MONEY'] == '70')
                    <td class="kumi02 bottom">特払い</td>
                    <td class="value bottom"><span>70</span>円</td>
                    <td class="ninki bottom">―</td>
                @else
                    <td class="kumi02  @if(($key + 1) == count($tansyo_array)) bottom @endif"><span class="w{{(int)$item['TANSYO']}} waku_s">{{(int)$item['TANSYO']}}</span></td>
                    <td class="value  @if(($key + 1) == count($tansyo_array)) bottom @endif"><span>{{number_format($item['TANSYO_MONEY'])}}</span>円</td>
                    <td class="ninki  @if(($key + 1) == count($tansyo_array)) bottom @endif">―</td>
                @endif
            </tr>
        @endforeach
    @endif
  
    {{--複勝--}}
    @if($fuseiritu_array[1] == 1) {{--不成立--}}
        <tr>
            <td class="class" rowspan="1">複勝</td>
            <td class="kumi02 bottom">不成立</td>
            <td class="value bottom">―</td>
            <td class="ninki bottom">―</td>
        </tr>
    @elseif(!$fukusyo_array)
        <tr>
            <td class="class" rowspan="1">複勝</td>
            <td class="kumi02 bottom">―</td>
            <td class="value bottom">―</td>
            <td class="ninki bottom">―</td>
        </tr>
    @else
        @foreach ($fukusyo_array as $key => $item)
            <tr>
                @if($key == 1)
                    <td class="class" rowspan="{{count($fukusyo_array)}}">複勝</td>
                @endif

                @if($item['FUKUSYO_MONEY'] == '70')
                    <td class="kumi02 bottom">特払い</td>
                    <td class="value bottom"><span>70</span>円</td>
                    <td class="ninki bottom">―</td>
                @else
                    <td class="kumi02 @if(($key + 1) == count($tansyo_array)) bottom @endif"><span class="w{{(int)$item['FUKUSYO']}} waku_s">{{(int)$item['FUKUSYO']}}</span></td>
                    <td class="value @if(($key + 1) == count($tansyo_array)) bottom @endif"><span>{{number_format($item['FUKUSYO_MONEY'])}}</span>円</td>
                    <td class="ninki @if(($key + 1) == count($tansyo_array)) bottom @endif">―</td>
                @endif
            </tr>
        @endforeach
    @endif
</table>

</div><!--/kekka02-->
<div id="kekka03">
<table class="ta_kekka_all">
    <tr>
        <th colspan="3" scope="col">本日のレース結果</th>
    </tr>
    @foreach($kekka_info_today_all as $key=>$item) 

        @if($chushi_junen) 
            @if($chushi_junen->中止開始レース == 0 || $chushi_junen->中止開始レース == $item->RACE_NUMBER)
                {{--中止開始レースの時--}}
                <tr>
                    <td class="race">{{$item->RACE_NUMBER}}<span>R</span></td>

                    @if($chushi_junen->中止開始レース == 0)
                        <td colspan="2" rowspan="12" class="cyushi">中止となりました</td>
                    @else
                        <td colspan="2" rowspan="{{ 12 - $item->RACE_NUMBER }}" class="cyushi">{{ $item->RACE_NUMBER }}R以降は中止となりました</td>
                    @endif
                </tr>
            @elseif($chushi_junen->中止開始レース < $item->RACE_NUMBER)
                {{--中止レース(開始レースではない)--}}
                <tr>
                    <td class="race">{{$item->RACE_NUMBER}}<span>R</span></td>
                </tr>
            @endif
        @else
            <tr><td class="race">{{$item->RACE_NUMBER}}<span>R</span></td>
                @if($item->SANRENTAN_MONEY1 && $item->SANRENTAN_MONEY2)
                    {{--同着あり--}}
                    <td colspan="2" class="kumi3">同着あり</td>
                @elseif(substr($item->FUSEIRITU,4,1) == 1)
                    {{--不成立--}}
                    <td colspan="2" class="kumi3">不成立</td>
                @else
                    {{--普通--}}
                    <td class="kumi3"><span class="w{{(int) substr($item->SANRENTAN1,0,1)}} waku_s">{{(int) substr($item->SANRENTAN1,0,1)}}</span>-<span class="w{{(int) substr($item->SANRENTAN1,1,1)}} waku_s">{{(int) substr($item->SANRENTAN1,1,1)}}</span>-<span class="w{{(int) substr($item->SANRENTAN1,2,1)}} waku_s">{{(int) substr($item->SANRENTAN1,2,1)}}</span></td>
                    <td class="harai3"><span>{{number_format($item->SANRENTAN_MONEY1)}}</span>円</td>
                @endif
               
            </tr>
        @endif
    @endforeach
  
</table>

</div><!--/kekka03-->



</div><!--/#cont_kekka-->



</div><!--/#kekka-->
<div id="main_race_r"><a href="/asp/kyogi/09/pc/syusso01/syusso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">次へ</a></div><!--/#main_race_r-->
<div class="clear"></div>
</div><!--/#main_race-->




</body>
</html>
