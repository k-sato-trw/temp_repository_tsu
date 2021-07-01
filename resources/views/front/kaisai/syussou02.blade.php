@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Refresh" CONTENT="180; URL=/asp/kyogi/09/pc/syusso02/syusso02{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">
<title>出走表・全国過去3節</title>

<link href="/kaisai/css/reset.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/common.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/syusso.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="/kaisai/js/jquery-1.8.2.min.js"></script>


<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="/asp/kyogi/09/pc/Jsinfo.js"></script>
</head>

<body>


<div id="main_menu">
<div id="date_btn">

<div id="date">
<div id="date_l"><script type="text/javascript">
	func_Backbtn('{{$target_date}}' , 'syusso02' );
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
	func_Nextbtn('{{$target_date}}' , 'syusso02' );
</script>
</div><!--/#date_r-->
<div class="clear"></div>
</div><!--/#date-->

</div><!--/#date_btn-->

<div id="race_btn">
<ul>
<script type="text/javascript">
    func_RaceNumList('{{$target_date}}' , {{$race_num}}, 'syusso02' );
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
<div id="main_race_l"><a href="/asp/kyogi/09/pc/syusso01/syusso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">前へ</a></div><!--/#main_race_l-->

<!-- ▼出走表 -->
<div id="syusso">
<!-- ▼メインメニュー -->
<ul id="race_btn_main">
<li id="btn01" class="select">出走表</li>
<li id="btn02"><a href="/asp/kyogi/09/pc/odds01/odds01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">オッズ</a></li>
<li id="btn03"><a href="/asp/kyogi/09/pc/yoso01/yoso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">レース予想</a></li>
<li id="btn04"><a href="/asp/kyogi/09/pc/st01/st01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">スタ展・直前情報</a></li>
<li id="btn05"><a href="/asp/kyogi/09/pc/kekka01/kekka01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">レース結果</a></li>
<div class="clear"></div>
</ul>

<!-- ▼タブ -->
<div id="tab">
<ul id="tab_syusso">
<li><a href="/asp/kyogi/09/pc/syusso01/syusso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">節間成績</a></li>
<li class="select">全国過去3節</li>
<li><a href="/asp/kyogi/09/pc/syusso03/syusso03{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">当地過去3節</a></li>
<li><a href="/asp/kyogi/09/pc/syusso04/syusso04{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">モーター直近成績</a></li>
<div class="clear"></div>
</ul>
</div><!--/#tab-->


<!-- ▼全国過去3節成績 -->
<div class="cont_syusso">
<table class="ta_kyogi">
<tr>
<th rowspan="3" scope="col">枠<br>番</th>
<th rowspan="3" class="name" scope="col">選手名<br>
<span class="small">登番 / 支部 / 年齢</span></th>
<th rowspan="3" scope="col">級<br>別</th>
<th rowspan="3" colspan="2" scope="col">

<table id="heikin"><tr>
<th>F</th>
<th class="br_no">L</th></tr>
<tr><td colspan="2" rowspan="2">平均ST</td>
</tr></table>

</th>
<th colspan="2" class="th_syoritu" scope="col">勝率</th>
<th colspan="2" class="th_syoritu" scope="col">No.</th>
<th colspan="3" class="kinsetsu" scope="col">全国過去3節</th>
</tr>
<tr>
<th colspan="2" class="th_syoritu_no" scope="col">２連率</th>
<th colspan="2" class="th_syoritu_no" scope="col">２連率</th>
<th rowspan="2" scope="col" class="setsu">１前節<br>
<span class="small">ｸﾞﾚｰﾄﾞ／ﾚｰｽ場／期間／成績</span></th>
<th rowspan="2" scope="col" class="setsu">２節前<br>
<span class="small">ｸﾞﾚｰﾄﾞ／ﾚｰｽ場／期間／成績</span></th>
<th rowspan="2" scope="col" class="setsu">３節前<br>
<span class="small">ｸﾞﾚｰﾄﾞ／ﾚｰｽ場／期間／成績</span></th>
</tr>
<tr>
<th scope="col">全国</th>
<th scope="col">当地</th>
<th scope="col">ﾓｰﾀｰ</th>
<th scope="col">ﾎﾞｰﾄ</th>
</tr>

@foreach($syussou as $teiban => $item)
    @if($ozz_info_array[$teiban] != 2)
        <!-- ▼枠▼ -->
        <tr>
            <td rowspan="2" class="waku w{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
            <td rowspan="2" class="w{{$item->TEIBAN}}"><div class="name">{{$item->SENSYU_NAME}}</div><div class="number">{{$item->TOUBAN}} / {{ $item->HOME_TOWN}} / {{ $item->AGE}}</div></td>
            <td rowspan="2" class="class">{{$item->KYU_BETU}}</td>
            <td class="F">{{$item->F_COUNT?"F".$item->F_COUNT:""}}</td>
            <td class="L">{{$item->L_COUNT?"L".$item->L_COUNT:""}}</td>
            <td class="rate01">{{$item->ALL_SHOURITU}}</td>
            <td class="rate01">{{$item->TOUTI_SHOURITU}}</td>
            <td class="rate01"><script type="text/javascript">
                func_MotorRank('{{$target_date}}' , '{{(int)$item->MOTOR_NO}}' );
            </script>
            </td>
            <td class="rate01">{{(int)$item->BOAT_NO}}</td>
            @isset($item['kinkyo_rireki_3'][1])
                <td class="setsu"><div class="{{$general->gradenumber_to_gradename_for_front_syussou($item['kinkyo_rireki_3'][1]['kinkyo_grade'])}}"></div>
                    <div class="jo">{{$general->jyocode_to_jyoname($item['kinkyo_rireki_3'][1]['kinkyo_jyo'])}}</div>
                    <div class="kikan">{{$general->create_display_date($item['kinkyo_rireki_3'][1]['kinkyo_start_date'],$item['kinkyo_rireki_3'][1]['kinkyo_end_date'])}}</div>
                </td>
            @else
                <td class="setsu">-</td>
            @endisset
            
            @isset($item['kinkyo_rireki_3'][2])
                <td class="setsu"><div class="{{$general->gradenumber_to_gradename_for_front_syussou($item['kinkyo_rireki_3'][2]['kinkyo_grade'])}}"></div>
                    <div class="jo">{{$general->jyocode_to_jyoname($item['kinkyo_rireki_3'][2]['kinkyo_jyo'])}}</div>
                    <div class="kikan">{{$general->create_display_date($item['kinkyo_rireki_3'][2]['kinkyo_start_date'],$item['kinkyo_rireki_3'][2]['kinkyo_end_date'])}}</div>
                </td>
            @else
                <td class="setsu">-</td>
            @endisset

            @isset($item['kinkyo_rireki_3'][3])
                <td class="setsu"><div class="{{$general->gradenumber_to_gradename_for_front_syussou($item['kinkyo_rireki_3'][3]['kinkyo_grade'])}}"></div>
                    <div class="jo">{{$general->jyocode_to_jyoname($item['kinkyo_rireki_3'][3]['kinkyo_jyo'])}}</div>
                    <div class="kikan">{{$general->create_display_date($item['kinkyo_rireki_3'][3]['kinkyo_start_date'],$item['kinkyo_rireki_3'][3]['kinkyo_end_date'])}}</div>
                </td>
            @else
                <td class="setsu">-</td>
            @endisset
            
        </tr>
        <tr>
            <td colspan="2" class="ST">{{$item->ST_AVERAGE?mb_substr($item->ST_AVERAGE,1):"―"}}</td>
            <td class="rate02">{{$item->ALL_NIRENTAIRITU}}</td>
            <td class="rate02">{{$item->TOUTI_NIRENTAIRITU}}</td>
            <td class="rate02">{{$item->MOTOR2RENTAIRITU}}<br></td>
            <td class="rate02">{{$item->BOAT_2RENRITU}}</td>

            @isset($item['kinkyo_rireki_3'][1])
                <td class="kekka">{!! $item['kinkyo_rireki_3'][1]['kinkyo_tyakujun'] !!}</td>
            @else
                <td class="kekka"> </td>
            @endisset

            @isset($item['kinkyo_rireki_3'][2])
                <td class="kekka">{!! $item['kinkyo_rireki_3'][2]['kinkyo_tyakujun'] !!}</td>
            @else
                <td class="kekka"> </td>
            @endisset

            @isset($item['kinkyo_rireki_3'][3])
                <td class="kekka">{!! $item['kinkyo_rireki_3'][3]['kinkyo_tyakujun'] !!}</td>
            @else
                <td class="kekka"> </td>
            @endisset

        </tr>
       
    @else {{--欠場--}}

        <!-- ▼枠▼ -->
        <tr>
            <td rowspan="2" class="waku w{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
            <td rowspan="2" class="w{{$item->TEIBAN}}">
                <div class="name">欠場</div>
                <div class="number">―</div>
            </td>
            <td rowspan="2" class="class">―</td>
            <td class="F"></td>
            <td class="L"></td>
            <td class="rate01">―</td>
            <td class="rate01">―</td>
            <td class="rate01">―</td>
            <td class="rate01">―</td>
            <td class="setsu"></td>
            <td class="setsu"></td>
            <td class="setsu"></td>
        </tr>
        <tr>
            <td colspan="2" class="ST"> </td>
            <td class="rate02">―</td>
            <td class="rate02">―</td>
            <td class="rate02">―</td>
            <td class="rate02">―</td>
            <td class="kekka"></td>
            <td class="kekka"></td>
            <td class="kekka"></td>
        </tr>
 
    @endif
@endforeach



</table>
</table>
<div class="clear"></div>


</div><!--/#cont_syusso-->



</div><!--/#syusso-->


<div id="main_race_r"><a href="/asp/kyogi/09/pc/syusso03/syusso03{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">次へ</a></div><!--/#main_race_r-->
<div class="clear"></div>
</div><!--/#main_race-->




</body>
</html>
