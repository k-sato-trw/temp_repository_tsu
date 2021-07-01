
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Refresh" CONTENT="60; URL=/asp/kyogi/09/pc/yoso02/yoso02{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">
<title>レース予想・V-POWER予想</title>

<link href="/kaisai/css/reset.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/common.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/syusso.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/yoso.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="/kaisai/js/jquery-1.8.2.min.js"></script>


<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="/asp/kyogi/09/pc/Jsinfo.js"></script>
</head>

<body>


<div id="main_menu">
<div id="date_btn">

<div id="date">
<div id="date_l"><script type="text/javascript">
	func_Backbtn('{{$target_date}}' , 'yoso02' );
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
	func_Nextbtn('{{$target_date}}' , 'yoso02' );
</script>
</div><!--/#date_r-->
<div class="clear"></div>
</div><!--/#date-->

</div><!--/#date_btn-->

<div id="race_btn">
<ul>
<script type="text/javascript">
func_RaceNumList('{{$target_date}}' , {{$race_num}}, 'yoso02' );
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
<div id="main_race_l"><a href="/asp/kyogi/09/pc/yoso01/yoso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">前へ</a></div><!--/#main_race_l-->

<!-----------------------------------
▼レース予想 -->
<div id="yoso">
<!-----------------------------------
▼メインメニュー -->
<ul id="race_btn_main">
<li id="btn01"><a href="/asp/kyogi/09/pc/syusso01/syusso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">出走表</a></li>
<li id="btn02"><a href="/asp/kyogi/09/pc/odds01/odds01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">オッズ</a></li>
<li id="btn03" class="select">レース予想</li>
<li id="btn04"><a href="/asp/kyogi/09/pc/st01/st01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">スタ展・直前情報</a></li>
<li id="btn05"><a href="/asp/kyogi/09/pc/kekka01/kekka01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm" target="_self">レース結果</a></li>
<div class="clear"></div>
</ul>

<!-----------------------------------
▼タブ -->
<div id="tab">
<ul id="tab_yoso">
<li><a href="/asp/kyogi/09/pc/yoso01/yoso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">ツッキーナビ</a></li>
<li class="select">V-POWER予想</li>
<div class="clear"></div>
</ul>
</div><!--/#tab-->


<!-----------------------------------
▼予想 -->
<div id="vpower">
<!--▼cont_vpower_l-->
<div class="cont_vpower_l">
<table class="ta_kyogi" id="vp">
    @if( ($chushi_junen->中止開始レース番号 ?? 99) <= $race_num )
        <tr>
            @if($chushi_junen->中止開始レース番号 > 0 )
                <td class="cyushi">第{{$chushi_junen->中止開始レース番号}}R以降は中止となりました</td>
            @else
                <td class="cyushi">{{ date('n/j',strtotime($target_date)) }}の開催は中止となりました</td>
            @endif
        </tr>
    @elseif(!$yoso_syussou_array)
        {{--データなし--}}
        <tr>
            <td class="nodata">ただいまデータはございません</td>
        </tr>
    @else
        <tr>
        <th width="19" rowspan="3" scope="col">枠<br>番</th>
        <th width="121" rowspan="3" class="name" scope="col">選手名<br>
        <span class="small">登番 / 支部 / 年齢</span></th>
        <th width="22" rowspan="3" scope="col">級<br>別</th>
        <th colspan="2" rowspan="3" scope="col">


        <table id="heikin_vp"><tr>
        <th>F</th>
        <th class="br_no">L</th></tr>
        <tr><td colspan="2" rowspan="2">ST</td>
        </tr></table>

        </th>

        <th colspan="2" scope="col" class="th_syoritu">勝率</th>
        <th colspan="2" scope="col" class="th_syoritu">No.</th>
        <th rowspan="3" scope="col" class="yoso_v">予想</th>
        <th rowspan="2" colspan="2" scope="col" class="vpower"><img src="/kaisai/images/vpower_logo.png" alt="V-POWER" width="101" height="25"></th>
        </tr>
        <tr>
        <th colspan="2" scope="col" class="th_syoritu_no">2連率</th>
        <th colspan="2" scope="col" class="th_syoritu_no">2連率<br></th>
        </tr>
        <tr>
        <th scope="col">全国</th>
        <th scope="col">当地</th>
        <th scope="col">ﾓｰﾀｰ</th>
        <th scope="col">ﾎﾞｰﾄ</th>
        <th width="40" class="vpower01" scope="col">順位</th>
        <th width="50" class="vpower02" scope="col">スコア</th>
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
                    <td rowspan="2">
                        @if($yoso_syussou_array[$teiban]->YOSO_MARK)
                            <?php $ex_num = [1=>4,2=>3,3=>2,4=>1,]; ?>
                            <img src="/kaisai/images/mark0{{ $ex_num[$yoso_syussou_array[$teiban]->YOSO_MARK] }}.png" width="27" height="29">
                        @endif
                    </td>

                    @if($lank_array[$teiban] < 4)
                        <td rowspan="2" class="vp"><img src="/kaisai/images/vp_r{{$lank_array[$teiban]}}.png" width="36" height="42"></td>                
                    @else
                        <td rowspan="2" class="vp">{{$lank_array[$teiban]}}</td>
                    @endif
                    <td rowspan="2" class="vp">{{$yoso_syussou_array[$teiban]->PERCENT}}</td>
                </tr>
                <tr>
                    <td colspan="2" class="rate02">{{$item->ST_AVERAGE?mb_substr($item->ST_AVERAGE,1):"―"}}</td>
                    <td class="rate02">{{$item->ALL_NIRENTAIRITU}}</td>
                    <td class="rate02">{{$item->TOUTI_NIRENTAIRITU}}</td>
                    <td class="rate02">{{$item->MOTOR2RENTAIRITU}}<br></td>
                    <td class="rate02">{{$item->BOAT_2RENRITU}}</td>
                </tr>        
            @else
                
            @endif
        @endforeach
    @endif            
</table>

</div>
<!--▲cont_vpower_l-->



<!--▼cont_vpower_r-->
<div class="cont_vpower_r">

<div id="vp_yoso_h">予想フォーカス</div>

<div class="vp_yoso_tit">3連単</div>

<div class="vp_yoso">
<ul>
    @foreach($yoso_race_sanrentan as $item)    
        <li class="ren3">
            <span class="w{{$item[0]}} waku_s2">{{$item[0]}}</span>-<span class="w{{$item[1]}} waku_s2">{{$item[1]}}</span>-<span class="w{{$item[2]}} waku_s2">{{$item[2]}}</span>
            <div class="clear"></div>
        </li>
    @endforeach

<div class="clear"></div>
</ul>
</div>


<div class="vp_yoso_tit">2連単</div>

<div class="vp_yoso">
<ul>
    @foreach($yoso_race_nirentan as $item)
        <li class="ren2"><span class="w{{$item[0]}} waku_s2">{{$item[0]}}</span>-<span class="w{{$item[1]}} waku_s2">{{$item[1]}}</span><div class="clear"></div></li>
    @endforeach
<div class="clear"></div>
</ul>
</div><!--/#vp_yoso-->







</div>
<!--▲cont_vpower_r-->
<div class="clear"></div>

<div id="vp_foot"></div>
</div>
<!--▲vpower-->



</div><!--/#yoso-->
<div id="main_race_r"><a href="/asp/kyogi/09/pc/st01/st01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">次へ</a></div><!--/#main_race_r-->
<div class="clear"></div>
</div><!--/#main_race-->




</body>
</html>
