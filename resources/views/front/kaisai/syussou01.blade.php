
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Refresh" CONTENT="180; URL=/asp/kyogi/09/pc/syusso01/syusso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">
<title>出走表・節間成績</title>

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
<div id="date_l">
    <script type="text/javascript">
	    func_Backbtn('{{$target_date}}' , 'syusso01' );
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
<div id="date_r">
    <script type="text/javascript">
        func_Nextbtn('{{$target_date}}' , 'syusso01' );
    </script>
</div><!--/#date_r-->
<div class="clear"></div>
</div><!--/#date-->

</div><!--/#date_btn-->

<div id="race_btn">
<ul>
    <script type="text/javascript">
    func_RaceNumList('{{$target_date}}' , {{$race_num}}, 'syusso01' );
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
<div id="main_race_l"><a href="/asp/kyogi/09/pc/kekka01/kekka01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">前へ</a></div><!--/#main_race_l-->

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
<li class="select">節間成績</li>
<li><a href="/asp/kyogi/09/pc/syusso02/syusso02{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">全国過去3節</a></li>
<li><a href="/asp/kyogi/09/pc/syusso03/syusso03{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">当地過去3節</a></li>
<li><a href="/asp/kyogi/09/pc/syusso04/syusso04{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">モーター直近成績</a></li>
<div class="clear"></div>
</ul>
</div><!--/#tab-->


<!-- ▼節間成績 -->
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
<th colspan="2" scope="col" class="th_syoritu">勝率</th>
<th colspan="2" scope="col" class="th_syoritu">No.</th>
<th rowspan="3" class="seiseki_8" scope="col">　</th>
<th colspan="16" class="setsukan" scope="col">節間成績</th>
<th rowspan="3" scope="col">早<br>見</th>
</tr>
<tr>
<th colspan="2" scope="col" class="th_syoritu_no">２連率</th>
<th colspan="2" scope="col" class="th_syoritu_no">２連率</th>
<th colspan="2" rowspan="2" scope="col">初日
</th>
<th colspan="2" rowspan="2" scope="col">{{ $kaisai_day_list_label[1] ?? "" }}</th>
<th colspan="2" rowspan="2" scope="col">{{ $kaisai_day_list_label[2] ?? "" }}</th>
<th colspan="2" rowspan="2" scope="col">{{ $kaisai_day_list_label[3] ?? "" }}</th>
<th colspan="2" rowspan="2" scope="col">{{ $kaisai_day_list_label[4] ?? "" }}</th>
<th colspan="2" rowspan="2" scope="col">{{ $kaisai_day_list_label[5] ?? "" }}</th>
<th colspan="2" rowspan="2" scope="col">{{ $kaisai_day_list_label[6] ?? "" }}
</th>
<th colspan="2" rowspan="2" scope="col">{{ $kaisai_day_list_label[7] ?? "" }}
</th>
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
            <td rowspan="4" class="waku w{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
            <td rowspan="4" class="w{{$item->TEIBAN}}"><div class="name">{{$item->SENSYU_NAME}}</div><div class="number">{{$item->TOUBAN}} / {{ $item->HOME_TOWN}} / {{ $item->AGE}}</div></td>
            <td rowspan="4" class="class">{{$item->KYU_BETU}}</td>
            <td rowspan="2" class="F">{{$item->F_COUNT?"F".$item->F_COUNT:""}}</td>
            <td rowspan="2" class="L">{{$item->L_COUNT?"L".$item->L_COUNT:""}}</td>

            <td rowspan="2" class="rate01">{{$item->ALL_SHOURITU}}</td>
            <td rowspan="2" class="rate01">{{$item->TOUTI_SHOURITU}}</td>
            <td rowspan="2" class="rate01"><script type="text/javascript">
              func_MotorRank('{{$target_date}}' , '{{(int)$item->MOTOR_NO}}' );
            </script>
            </td>
            <td rowspan="2" class="rate01">{{(int)$item->BOAT_NO}}</td>
              <td class="seiseki">R</td>
            @for($race_day_count=1;$race_day_count<=8;$race_day_count++)
              <?php $prop_name_1 = "KONSETU".$race_day_count."1_RACENUMBER" ?>
              <?php $prop_name_2 = "KONSETU".$race_day_count."2_RACENUMBER" ?>
              <td class="s_race_8 left">{{ $item->$prop_name_1 }}</td>
              <td class="s_race_8 right">{{ $item->$prop_name_2 }}</td>
            @endfor

            @if($item->HAYAMI)
                <td rowspan="4" class="hayami"><a href="/asp/kyogi/09/pc/syusso01/syusso01{{str_pad($item->HAYAMI, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">{{$item->HAYAMI}}<br>R</a></td>
            @else
                <td rowspan="4" class="hayami">　</td>
            @endif
        </tr>
        <tr>
            <td class="seiseki">進</td>
            @for($race_day_count=1;$race_day_count<=8;$race_day_count++)
              <?php $prop_name_w1 = "KONSETU".$race_day_count."1_WAKUBAN" ?>
              <?php $prop_name_w2 = "KONSETU".$race_day_count."2_WAKUBAN" ?>
              <?php $prop_name_s1 = "KONSETU".$race_day_count."1_SHINNYU" ?>
              <?php $prop_name_s2 = "KONSETU".$race_day_count."2_SHINNYU" ?>
              <td class="s_sin left w{{ $item->$prop_name_w1 }}">{{ $item->$prop_name_s1 }}</td>
              <td class="s_sin right w{{ $item->$prop_name_w2 }}">{{ $item->$prop_name_s2 }}</td>
            @endfor

        </tr>
        <tr>
            <td colspan="2" rowspan="2" class="ST">{{$item->ST_AVERAGE?mb_substr($item->ST_AVERAGE,1):"―"}}</td>
            <td rowspan="2" class="rate02">{{$item->ALL_NIRENTAIRITU}}</td>
            <td rowspan="2" class="rate02">{{$item->TOUTI_NIRENTAIRITU}}</td>
            <td rowspan="2" class="rate02">{{$item->MOTOR2RENTAIRITU}}<br></td>
            <td rowspan="2" class="rate02">{{$item->BOAT_2RENRITU}}</td>

            <td class="seiseki">ST</td>
            @for($race_day_count=1;$race_day_count<=8;$race_day_count++)
              <?php $prop_name_dt = "KONSETU".$race_day_count."1_DATE"; ?>
              <?php $prop_name_st = "KONSETU".$race_day_count."1_STTIMING"; ?>
              <?php $prop_name_rn = "KONSETU".$race_day_count."1_RACENUMBER"; ?>

              @if($item->$prop_name_st)
                <td class="s_ST left @if($st_ranking[$item->$prop_name_dt][$item->$prop_name_rn] == $item->$prop_name_st){{'st_top'}}@endif">{{ mb_substr($item->$prop_name_st,1) }}</td>
              @else
                <td class="s_ST left"></td>
              @endif

              <?php $prop_name_dt = "KONSETU".$race_day_count."2_DATE"; ?>
              <?php $prop_name_st = "KONSETU".$race_day_count."2_STTIMING"; ?>
              <?php $prop_name_rn = "KONSETU".$race_day_count."2_RACENUMBER"; ?>

              @if($item->$prop_name_st)
                <td class="s_ST right @if($st_ranking[$item->$prop_name_dt][$item->$prop_name_rn] == $item->$prop_name_st){{'st_top'}}@endif">{{ mb_substr($item->$prop_name_st,1) }}</td>
              @else
                <td class="s_ST right"></td>
              @endif

            @endfor
        </tr>
        <tr>
            <td class="seiseki_bottom">着</td>
            @for($race_day_count=1;$race_day_count<=8;$race_day_count++)
              <?php $prop_name = "KONSETU".$race_day_count."1_TYAKUJUN"; ?>
              @if($item->$prop_name)
                  <td class="s_cyaku left">{{ $item->$prop_name }}</td>                  
              @else
                  <td class="s_cyaku_no left">&ensp;</td>    
              @endif

              <?php $prop_name = "KONSETU".$race_day_count."2_TYAKUJUN"; ?>
              @if($item->$prop_name)
                  <td class="s_cyaku right">{{ $item->$prop_name }}</td>                  
              @else
                  <td class="s_cyaku_no right">&ensp;</td>    
              @endif
            @endfor
        </tr>
    @else {{--欠場--}}
        <!-- ▼枠▼ -->
        <tr>
            <td rowspan="4" class="waku w{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
            <td rowspan="4" class="w{{$item->TEIBAN}}"><div class="name">欠場</div></td>
            <td rowspan="4" class="class"></td>
            <td rowspan="2" class="F"></td>
            <td rowspan="2" class="L"></td>

            <td rowspan="2" class="rate01"></td>
            <td rowspan="2" class="rate01"></td>
            <td rowspan="2" class="rate01">
            </td>
            <td rowspan="2" class="rate01"></td>
              <td class="seiseki">R</td>
            @for($race_day_count=1;$race_day_count<=8;$race_day_count++)
              <td class="s_race_8 left"></td>
              <td class="s_race_8 right"></td>
            @endfor
            <td rowspan="4" class="hayami">　</td>
        </tr>
        <tr>
            <td class="seiseki">進</td>
            @for($race_day_count=1;$race_day_count<=8;$race_day_count++)
              <td class="s_sin left "></td>
              <td class="s_sin right "></td>
            @endfor

        </tr>
        <tr>
            <td colspan="2" rowspan="2" class="ST"></td>
            <td rowspan="2" class="rate02"></td>
            <td rowspan="2" class="rate02"></td>
            <td rowspan="2" class="rate02"><br></td>
            <td rowspan="2" class="rate02"></td>

            <td class="seiseki">ST</td>
            @for($race_day_count=1;$race_day_count<=8;$race_day_count++)
                <td class="s_ST left"></td>
                <td class="s_ST right"></td>
            @endfor
        </tr>
        <tr>
            <td class="seiseki_bottom">着</td>
            @for($race_day_count=1;$race_day_count<=8;$race_day_count++)
                  <td class="s_cyaku_no left">&ensp;</td>    
                  <td class="s_cyaku_no right">&ensp;</td> 
            @endfor
        </tr>
    @endif
@endforeach
</table>
<div id="setsukan">
<div class="note_r">
</div><!--/#note_r-->
<div class="clear"></div>
</div><!--/#setsukan-->


</div><!--/#cont_syusso-->



</div><!--/#syusso-->


<div id="main_race_r"><a href="/asp/kyogi/09/pc/syusso02/syusso02{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">次へ</a></div><!--/#main_race_r-->
<div class="clear"></div>
</div><!--/#main_race-->




</body>
</html>
