

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Refresh" CONTENT="30; URL=/asp/kyogi/09/pc/st01/st01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">
<title>ST展示・直前情報</title>

<link href="/kaisai/css/reset.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/common.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/syusso.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/st.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="/kaisai/js/jquery-1.8.2.min.js"></script>


<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="/asp/kyogi/09/pc/Jsinfo.js"></script>
</head>

<body>


<div id="main_menu">
<div id="date_btn">

<div id="date">
<div id="date_l"><script type="text/javascript">
	func_Backbtn('{{$target_date}}' , 'st01' );
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
	func_Nextbtn('{{$target_date}}' , 'st01' );
</script>
</div><!--/#date_r-->
<div class="clear"></div>
</div><!--/#date-->

</div><!--/#date_btn-->

<div id="race_btn">
<ul>
<script type="text/javascript">
func_RaceNumList('{{$target_date}}' , {{$race_num}}, 'st01' );
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
<div id="main_race_l"><a href="/asp/kyogi/09/pc/yoso02/yoso02{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">前へ</a></div><!--/#main_race_l-->

<!-----------------------------------
▼ST展示・直前情報 -->
<div id="st">
<!-----------------------------------
▼メインメニュー -->
<ul id="race_btn_main">
<li id="btn01"><a href="/asp/kyogi/09/pc/syusso01/syusso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">出走表</a></li>
<li id="btn02"><a href="/asp/kyogi/09/pc/odds01/odds01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">オッズ</a></li>
<li id="btn03"><a href="/asp/kyogi/09/pc/yoso01/yoso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">レース予想</a></li>
<li id="btn04" class="select">スタ展・直前情報</li>
<li id="btn05"><a href="/asp/kyogi/09/pc/kekka01/kekka01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">レース結果</a></li>
<div class="clear"></div>
</ul>

<!-----------------------------------
▼タブ -->
<div id="tab">
</div><!--/#tab-->


<!-----------------------------------
▼ST展示・直前情報 -->
<div class="cont_st">
<table class="ta_kyogi">

    @if( ($chushi_junen->中止開始レース番号 ?? 99) <= $race_num )
        <tr>
            @if($chushi_junen->中止開始レース番号 > 0 )
                <td class="cyushi">第{{$chushi_junen->中止開始レース番号}}R以降は中止となりました</td>
            @else
                <td class="cyushi">{{ date('n/j',strtotime($target_date)) }}の開催は中止となりました</td>
            @endif
        </tr>
    @else
        <tr>
            <th rowspan="3" scope="col">枠<br>番</th>
            <th rowspan="3" class="name" scope="col">
            選手名<br><span class="small">登番 / 支部 / 年齢</span></th>
            <th rowspan="3" scope="col" class="st01">今節<br>平均<br>ST</th>
            <th colspan="3" scope="col" class="choku">直前情報</th>
            <th colspan="3" scope="col" class="tenji">スタート展示</th>
            </tr>
            <tr>
            <th scope="col" class="time">展示タイム</th>
            <th scope="col" class="weight">体重</th>
            <th rowspan="2" scope="col">部品交換</th>
            <th colspan="3" rowspan="2" class="slit" scope="col">CGスリット</th>
            </tr>
            <tr>
            <th scope="col">チルト</th>
            <th scope="col">調整</th>
        </tr>

        @foreach($syussou as $teiban => $item)
            @if($ozz_info_array[$teiban] != 2)
                <!-- ▼枠▼ -->
                <tr>
                    <td rowspan="2" class="waku w{{$teiban}}">{{$teiban}}</td>
                    <td rowspan="2" class="w{{$teiban}}">
                    <div class="name">{{$item->SENSYU_NAME}}</div>
                        <div class="number">{{$item->TOUBAN}} / {{ $item->HOME_TOWN}} / {{ $item->AGE}}</div></td>
                    <td rowspan="2" class="class"><span>{{ $tyokuzen_array[$item->TEIBAN]['st_avg']? mb_substr(sprintf('%.2f',$tyokuzen_array[$item->TEIBAN]['st_avg']) ,1,3) :".--" }}</span></td>
                    <td class="choku_top">{{ $tyokuzen_array[$item->TEIBAN]['record']->TENJI_TIME }}</td>
                    <td class="choku_top">{{ $tyokuzen_array[$item->TEIBAN]['record']->TAIJYU }}</td>
                    <td rowspan="2" class="parts">{{ $tyokuzen_array[$item->TEIBAN]['buhin'] }}</td>

                    @if($teiban == 1)
                        <td rowspan="2" class="inout in"><img src="/kaisai/images/st_in.png" width="30" height="20" alt=""/></td> 
                    @elseif($teiban == 6)
                        <td rowspan="2" class="inout out"><img src="/kaisai/images/st_out.png" width="30" height="20" alt=""/></td> 
                    @else
                        <td rowspan="2" class="inout"></td> 
                    @endif
                    
                    <td rowspan="2" class="slit"><img src="/kaisai/images/st0{{$teiban}}.png" width="40" height="33" alt="{{$teiban}}" id="st0{{$teiban}}" style="margin-right:{{ $tyokuzen_array[$item->TEIBAN]['right_margin'] }}px;"></td>
                    <td rowspan="2" class="slit_st">
                        @if($tyokuzen_array[$item->TEIBAN]['record']->ST_JICO_CD)
                            @if($tyokuzen_array[$item->TEIBAN]['record']->ST_JICO_CD == 'L')
                                <span>L.--</span>
                            @else
                                <span>F{{ mb_substr($tyokuzen_array[$item->TEIBAN]['record']->ST_TIMING,1) }}</span>
                            @endif
                        @else
                            {{mb_substr($tyokuzen_array[$item->TEIBAN]['record']->ST_TIMING,1)}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="class">{{ $tyokuzen_array[$item->TEIBAN]['record']->TILT_KAKUDO }}</td>
                    <td class="class">{{ $tyokuzen_array[$item->TEIBAN]['record']->TYOSEI_JYURYO }}</td>
                </tr>
            @else {{--欠場--}}
                <!-- ▼枠▼ -->
                <tr>
                    <td rowspan="2" class="waku w{{$teiban}}">{{$teiban}}</td>
                    <td rowspan="2" class="w{{$teiban}}">
                    <div class="name">欠場</div></td>
                    <td rowspan="2" class="class"></td>
                    <td class="choku_top">&nbsp;</td>
                    <td class="choku_top"></td>
                    <td rowspan="2" class="parts">&nbsp;</td>
                </tr>
            @endif
        @endforeach
        
    @endif

</table>
</div><!--/#cont_st-->



</div><!--/#st-->
<div id="main_race_r"><a href="/asp/kyogi/09/pc/kekka01/kekka01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">次へ</a></div><!--/#main_race_r-->
<div class="clear"></div>
</div><!--/#main_race-->




</body>
</html>
