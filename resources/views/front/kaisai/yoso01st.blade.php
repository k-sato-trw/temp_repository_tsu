
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Refresh" CONTENT="60; URL=/asp/kyogi/09/pc/yoso01st/yoso01st{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">
<title>レース予想・ツッキーナビ／ST展示</title>

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
	func_Backbtn('{{$target_date}}' , 'yoso01' );
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
	func_Nextbtn('{{$target_date}}' , 'yoso01' );
</script>
</div><!--/#date_r-->
<div class="clear"></div>
</div><!--/#date-->

</div><!--/#date_btn-->

<div id="race_btn">
<ul>
<script type="text/javascript">
func_RaceNumList('{{$target_date}}' , {{$race_num}}, 'yoso01' );
</script>
<div class="clear"></div>
</ul>
</div><!--/#race_btn-->
<div class="clear"></div>
</div><!--/#main_menu-->

<div id="race_info">
<div id="name">{{ $syussou[1]->RACE_NAME ?? "" }}</div>
<div id="time">発売締切<span>{{substr($shimekiri_jikoku,0,2)}}:{{substr($shimekiri_jikoku,2,2)}}</span></div>
@if($yoso->PUSHING_FLG ?? false)
    <!--▼▼推しレース▼▼ -->
    <div id="oshi"><img src="/kaisai/images/ic_oshi01.png" width="168" height="49" alt=""/></div>
    <!--▲▲推しレース▲▲ -->
@endif
<div class="clear"></div>
</div><!--/#race_info-->


<div id="main_race_tn">
<div id="main_race_l"><a href="/asp/kyogi/09/pc/odds04/odds04{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">前へ</a></div><!--/#main_race_l-->

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
<li class="select">ツッキーナビ</li>
<li><a href="/asp/kyogi/09/pc/yoso02/yoso02{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">V-POWER予想</a></li>
<div class="clear"></div>
</ul>
</div><!--/#tab-->


<!--▼ツッキーナビ -->
<div id="tsukky">
<table class="ta_kyogi">
<tr>
<th rowspan="3" scope="col" class="hyoka">評価</th>
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
<th colspan="3" scope="col">モーター</th>
<th rowspan="3" class="hyoka2" scope="col">展示<br>評価</th>
<th rowspan="3" class="st01"scope="col">今節<br>平均<br>ST</th>
<th colspan="2" scope="col">直前情報</th>
<th colspan="2" scope="col">スタート展示</th>
<th rowspan="3" scope="col">早<br>見</th>
</tr>
<tr>
<th class="th_syoritu" scope="col">No.</th>
<th rowspan="2" class="hyoka" scope="col">出<br>足</th>
<th rowspan="2" class="hyoka" scope="col">伸<br>足</th>
<th class="time">展示<br>タイム</th>
<th class="weight">体重</th>
<th colspan="2" rowspan="2">CGスリット</th>
</tr>
<tr>
<th scope="col" class="th_syoritu_no">２連率</th>
<th>チルト</th>
<th>調整</th>
</tr>


@foreach($syussou as $teiban => $item)
    @if($ozz_info_array[$teiban] != 2)
        <!-- ▼枠▼ -->
        <tr>
            <td rowspan="2" class="hyoka1">
                <?php $prop_name = "EVALUATION".$teiban; ?>
                @if($yoso->$prop_name)
                    <img src="/kaisai/images/ic_hyoka0{{ $yoso->$prop_name }}.png" width="30" height="30" alt=""/>
                @endif
            </td>
            <td rowspan="2" class="waku w{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
            <td rowspan="2" class="w{{$item->TEIBAN}}"><div class="name">{{$item->SENSYU_NAME}}</div><div class="number">{{$item->TOUBAN}} / {{ $item->HOME_TOWN}} / {{ $item->AGE}}</div></td>
            <td rowspan="2" class="class">{{$item->KYU_BETU}}</td>
            <td class="F">{{$item->F_COUNT?"F".$item->F_COUNT:""}}</td>
            <td class="L">{{$item->L_COUNT?"L".$item->L_COUNT:""}}</td>
            <td class="rate01"><script type="text/javascript">
                func_MotorRank('{{$target_date}}' , '{{(int)$item->MOTOR_NO}}' );
            </script>
            </td>
            <td rowspan="2" class="hyoka1">
                @isset($yoso_ashi_array[$teiban])
                    @if($yoso_ashi_array[$teiban]->DEASHI)
                        <img src="/kaisai/images/ic_yoso0{{ $yoso_ashi_array[$teiban]->DEASHI }}_w.png" width="29" height="29" alt=""/>
                    @endif
                @endisset
            </td>
            <td rowspan="2" class="hyoka1">
                @isset($yoso_ashi_array[$teiban])
                    @if($yoso_ashi_array[$teiban]->NOBIASHI)
                        <img src="/kaisai/images/ic_yoso0{{ $yoso_ashi_array[$teiban]->NOBIASHI }}_w.png" width="29" height="29" alt=""/>
                    @endif
                @endisset
            </td>
            <td rowspan="2" class="hyoka2">
                <?php $prop_name = "EVALUATION".$teiban; ?>
                {{ $yoso_tenji->$prop_name }}
            </td>

            <td rowspan="2" class="tj_class">{{ $tyokuzen_array[$item->TEIBAN]['st_avg']? mb_substr(sprintf('%.2f',$tyokuzen_array[$item->TEIBAN]['st_avg']) ,1,3) :".--" }}</td>
            <td class="choku_top">{{ $tyokuzen_array[$item->TEIBAN]['record']->TENJI_TIME }}</td>
            <td class="choku_top">{{ $tyokuzen_array[$item->TEIBAN]['record']->TAIJYU }}</td>
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
            @if($item->HAYAMI)
                <td rowspan="2" class="hayami"><a href="/asp/kyogi/09/pc/syusso01/syusso01{{str_pad($item->HAYAMI, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">{{$item->HAYAMI}}<br>R</a></td>
            @else
                <td rowspan="2" class="hayami">　</td>
            @endif

        </tr>
        <tr>
            <td colspan="2" class="ST">{{$item->ST_AVERAGE?mb_substr($item->ST_AVERAGE,1):"―"}}</td>
            <td class="rate02">{{$item->MOTOR2RENTAIRITU}}<br></td>
            <td class="tj_class">{{ $tyokuzen_array[$item->TEIBAN]['record']->TILT_KAKUDO }}</td>
            <td class="tj_class">{{ $tyokuzen_array[$item->TEIBAN]['record']->TYOSEI_JYURYO }}</td>
        </tr>
        
    @else  {{--欠場--}}
        <!-- ▼枠▼ -->
        <tr>
            <td rowspan="2" class="hyoka1"></td>
            <td rowspan="2" class="waku w{{$item->TEIBAN}}">{{$item->TEIBAN}}</td>
            <td rowspan="2" class="w{{$item->TEIBAN}}"><div class="name">欠場</div></td>
            <td rowspan="2" class="class"></td>
            <td class="F">　</td>
            <td class="L"></td>
            <td class="rate01"></td>
            <td rowspan="2" class="hyoka1"></td>
            <td rowspan="2" class="hyoka1"></td>
            <td rowspan="2" class="hyoka2"></td>
            <td rowspan="2" class="tj_class"></td>
            <td class="choku_top"></td>
            <td class="choku_top"></td>

            <td rowspan="2" class="slit"><img src="/kaisai/images/st0{{$teiban}}.png" width="40" height="33" alt="{{$teiban}}" id="st0{{$teiban}}" style="margin-right:130px;"></td>
            <td rowspan="2" class="slit_st">
                <span class="nodata2">不参加</span>
            </td>

            <td rowspan="2" class="hayami"></td>
        </tr>
        <tr>
            <td colspan="2" class="ST">　</td>
            <td class="rate02"></td>
            <td class="tj_class"></td>
            <td class="tj_class"></td>
        </tr>
    @endif
@endforeach

</table>
</div>
<!--▲ツッキーナビ-->


</div><!--/#yoso-->

<div id="main_race_r"><a href="/asp/kyogi/09/pc/yoso02/yoso02{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">次へ</a></div><!--/#main_race_r-->
<div class="clear"></div>
</div><!--/#main_race_tn-->

<div id="tsukky_btn">
<ul>
<li class="tsukky_btn_01on"><a href="/asp/kyogi/09/pc/yoso01/yoso01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">節間成績</a></li>
<li class="tsukky_btn_02">スタート展示</li>
<div class="clear"></div>
</ul>
</div><!--/#tsukky_btn-->


<!--▼記者予想 -->

<div id="t_navi_title"><img src="/kaisai/images/t_navi_titl2.jpg" width="962" height="72" alt="前日・展示後タイトル"/></div><!--/#t_navi_title-->


<div id="t_navi_main">

<!-- ▼前日▼ -->
<div id="t_navi_main_l">

<div id="zenjitsu">

@if($yoso->ENTRY)
    <div id="zenjitsu_l">
        <h4>進入予想</h4>
        <table class="ta_sinnyu">
        <tr>
        <td class="slit_st slit_cm"><img src="/kaisai/images/zenjitsu_in.png" width="34" height="16" alt="in"/></td><td>&ensp;</td></tr>
        @for($i=0;$i<=6;$i++)
            
            @if($i != 3)

                @if($i < 3)
                    <tr>
                        <td><img src="/kaisai/images/zenjitsu_s.png" width="34" height="16" alt="S"/></td>
                        <td class="slit"><img src="/kaisai/images/st0{{substr($yoso->ENTRY,$i,1)}}_s.png" width="34" height="28" alt="{{substr($yoso->ENTRY,$i,1)}}号艇" style="margin-left:80px;"/></td>
                    </tr>
                @elseif($i > 3)
                    <tr>
                        <td><img src="/kaisai/images/zenjitsu_d.png" width="34" height="16" alt="D"/></td>
                        <td class="slit"><img src="/kaisai/images/st0{{substr($yoso->ENTRY,$i,1)}}_s.png" width="34" height="28" alt="{{substr($yoso->ENTRY,$i,1)}}号艇" style="margin-left:30px;"/></td>
                    </tr>
                @endif

            @endif
            
        @endfor
        </table>

    </div><!--/#zenjitsu_l-->
@endif


@if($yoso->MEMO)
    <div id="zenjitsu_r">
    <h4>記者'sメモ</h4>
    <p class="text">
    {{$yoso->MEMO}}</p>
    </div><!--/#zenjitsu_r-->
@endif

<div class="clear"></div>
@if($yoso->CONFIDENCE)
    <div id="confidence">自信度<br><span class="percent">{{$yoso->CONFIDENCE}}%</span></div>
@endif




</div><!--/#zenjitsu-->
<div class="clear"></div>
</div><!--/#t_navi_main_l-->

<!-- ▼展示後▼ -->
<div id="t_navi_main_r">

@if($yoso_tenji)
    <div id="focus">
        <!-- ▼フォーカス本命▼ -->

        @if($favolite_flg)
            <div id="focus_l">
                <div class="hon">本命</div>

                <div id="focus_waku">
                    @for($loop_count1=1;$loop_count1<=2;$loop_count1++)

                        <?php 
                            $prop_name_favolite = "FAVOLITE".$loop_count1."11";
                        ?>
                        @if($yoso_tenji->$prop_name_favolite)

                            <?php
                                $favolite_box_nagashi_flg = 0;
                                $loop_count3 = 1;
                            ?>
                            <!-- ▼フォーカス１段▼ -->
                            <table class="ta_kumi">
                                <tr>
                                    <td class="kumi"><img src="/kaisai/images/focus1.png" width="20" height="20" alt=""/></td>
                                    <td class="ta_kumi2">
                                        <?php $prop_name_favolite_mark = "FAVOLITE_MARK".$loop_count1.$loop_count3; ?>
                                        @if($yoso_tenji->$prop_name_favolite_mark == 1)
                                            <img src="/kaisai/images/f_code01.gif" width="10" height="46" alt=""/>
                                        @elseif($yoso_tenji->$prop_name_favolite_mark == 2)
                                            <img src="/kaisai/images/f_code02.gif" width="10" height="46" alt=""/>
                                        @elseif($yoso_tenji->$prop_name_favolite_mark == 3)
                                            <img src="/kaisai/images/f_code03.gif" width="10" height="46" alt=""/>
                                        @elseif($yoso_tenji->$prop_name_favolite_mark == 4)
                                            <img src="/kaisai/images/f_code04.gif" width="10" height="46" alt=""/>
                                        @elseif($yoso_tenji->$prop_name_favolite_mark == 5)
                                            <img src="/kaisai/images/f_code05.gif" width="10" height="46" alt=""/>
                                        @elseif($yoso_tenji->$prop_name_favolite_mark == 8)
                                            <?php $favolite_box_nagashi_flg = 1; ?>
                                        @elseif($yoso_tenji->$prop_name_favolite_mark == 9)
                                            <?php $favolite_box_nagashi_flg = 2; ?>
                                        @endif
                                    </td>

                                    @if($favolite_box_nagashi_flg == 0)
                                        {{--通常時--}}
                                        <td class="kumi">
                                            @for($loop_count4=1;$loop_count4<=3;$loop_count4++)
                                                <?php 
                                                    $loop_count5 = 2;
                                                    $prop_name_favolite = "FAVOLITE".$loop_count1.$loop_count4.$loop_count5;
                                                ?>
                                                @if($yoso_tenji->$prop_name_favolite)
                                                    <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                                @endif
                                            @endfor
                                        </td>
                                        <td class="ta_kumi2">
                                            <?php 
                                                $loop_count3 = 2;
                                                $prop_name_favolite_mark = "FAVOLITE_MARK".$loop_count1.$loop_count3;
                                            ?>
                                            @if($yoso_tenji->$prop_name_favolite_mark == 1)
                                                <img src="/kaisai/images/f_code01.gif" width="10" height="46" alt=""/>
                                            @elseif($yoso_tenji->$prop_name_favolite_mark == 2)
                                                <img src="/kaisai/images/f_code02.gif" width="10" height="46" alt=""/>
                                            @elseif($yoso_tenji->$prop_name_favolite_mark == 3)
                                                <img src="/kaisai/images/f_code03.gif" width="10" height="46" alt=""/>
                                            @elseif($yoso_tenji->$prop_name_favolite_mark == 4)
                                                <img src="/kaisai/images/f_code04.gif" width="10" height="46" alt=""/>
                                            @elseif($yoso_tenji->$prop_name_favolite_mark == 5)
                                                <img src="/kaisai/images/f_code05.gif" width="10" height="46" alt=""/>
                                            @elseif($yoso_tenji->$prop_name_favolite_mark == 8)
                                                {{--ここボックスはおかしい--}}
                                            @elseif($yoso_tenji->$prop_name_favolite_mark == 9)
                                                <?php $favolite_box_nagashi_flg = 2; ?>
                                            @endif
                                        </td>

                                        @if($favolite_box_nagashi_flg == 0)
                                            {{--通常--}}
                                            <td class="kumi">
                                                @for($loop_count4=1;$loop_count4<=3;$loop_count4++)
                                                    <?php 
                                                        $loop_count5 = 3;
                                                        $prop_name_favolite = "FAVOLITE".$loop_count1.$loop_count4.$loop_count5;
                                                    ?>
                                                    @if($yoso_tenji->$prop_name_favolite)
                                                        <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                                    @endif
                                                @endfor
                                            </td>
                                        @elseif($favolite_box_nagashi_flg == 2)
                                            {{--ハイフン表示--}}
                                            <td class="ta_kumi2">
                                                <img src="/kaisai/images/f_code01.gif" width="10" height="46" alt=""/>
                                            </td>
                                            <td class="kumi">
                                                <img src="/kaisai/images/focus0.png" width="20" height="20" alt=""/>
                                            </td>
                                        @endif
                                    @elseif($favolite_box_nagashi_flg == 1)
                                        {{--ボックス検索--}}
                                            {{--ボックス検索はこちらでは表示しない--}}
                                    @elseif($favolite_box_nagashi_flg == 2)
                                        {{--流し--}}

                                        {{--初期化--}}
                                        <?php $favolite_box_nagashi_flg = 0; ?>

                                        {{--ハイフン表示--}}
                                        <td class="ta_kumi2">
                                            <img src="/kaisai/images/f_code01.gif" width="10" height="46" alt=""/>
                                        </td>
                                        <td class="kumi">
                                            <img src="/kaisai/images/focus0.png" width="20" height="20" alt=""/>
                                        </td>

                                        <td class="ta_kumi2">
                                            <?php 
                                                $loop_count3 = 2;
                                                $prop_name_favolite_mark = "FAVOLITE_MARK".$loop_count1.$loop_count3;
                                            ?>
                                            @if($yoso_tenji->$prop_name_favolite_mark == 1)
                                                <img src="/kaisai/images/f_code01.gif" width="10" height="46" alt=""/>
                                            @elseif($yoso_tenji->$prop_name_favolite_mark == 2)
                                                <img src="/kaisai/images/f_code02.gif" width="10" height="46" alt=""/>
                                            @elseif($yoso_tenji->$prop_name_favolite_mark == 3)
                                                <img src="/kaisai/images/f_code03.gif" width="10" height="46" alt=""/>
                                            @elseif($yoso_tenji->$prop_name_favolite_mark == 4)
                                                <img src="/kaisai/images/f_code04.gif" width="10" height="46" alt=""/>
                                            @elseif($yoso_tenji->$prop_name_favolite_mark == 5)
                                                <img src="/kaisai/images/f_code05.gif" width="10" height="46" alt=""/>
                                            @elseif($yoso_tenji->$prop_name_favolite_mark == 8)
                                                {{--ここボックスはおかしい--}}
                                            @elseif($yoso_tenji->$prop_name_favolite_mark == 9)
                                                <?php $favolite_box_nagashi_flg = 2; ?>
                                            @endif
                                        </td>

                                        @if($favolite_box_nagashi_flg == 0)
                                            {{--通常--}}
                                            <td class="kumi">
                                                @for($loop_count4=1;$loop_count4<=3;$loop_count4++)
                                                    <?php 
                                                        $loop_count5 = 3;
                                                        $prop_name_favolite = "FAVOLITE".$loop_count1.$loop_count4.$loop_count5;
                                                    ?>
                                                    @if($yoso_tenji->$prop_name_favolite)
                                                        <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                                    @endif
                                                @endfor
                                            </td>
                                        @elseif($favolite_box_nagashi_flg == 2)
                                            {{--ハイフン表示--}}
                                            <td class="ta_kumi2">
                                                <img src="/kaisai/images/f_code01.gif" width="10" height="46" alt=""/>
                                            </td>
                                            <td class="kumi">
                                                <img src="/kaisai/images/focus0.png" width="20" height="20" alt=""/>
                                            </td>
                                        @endif
                                    @endif
                                </tr>
                            </table>                            
                        @else
                            {{--頭が入力されていないときボックスの可能性アリ--}}
                            <?php
                                $prop_name_favolite_mark = "FAVOLITE_MARK".$loop_count1."1";
                            ?>
                            @if($yoso_tenji->$prop_name_favolite_mark == 8)
                                {{--ボックスのとき--}}
                                <!-- ▼フォーカス１段▼ -->
                                <table class="ta_kumi">
                                    <tr>
                                        <td class="kumi">
                                            <?php $prop_name_favolite = "FAVOLITE".$loop_count1."12"; ?>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                            <?php $prop_name_favolite = "FAVOLITE".$loop_count1."22"; ?>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                            <?php $prop_name_favolite = "FAVOLITE".$loop_count1."32"; ?>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                        </td>
                                        <td class="ta_kumi2"><img src="/kaisai/images/f_code01.gif" width="10" height="46" alt="""/></td>
                                        <td class="kumi">
                                            <?php $prop_name_favolite = "FAVOLITE".$loop_count1."22"; ?>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                            <?php $prop_name_favolite = "FAVOLITE".$loop_count1."32"; ?>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                            <?php $prop_name_favolite = "FAVOLITE".$loop_count1."12"; ?>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                            <?php $prop_name_favolite = "FAVOLITE".$loop_count1."32"; ?>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                            <?php $prop_name_favolite = "FAVOLITE".$loop_count1."12"; ?>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                            <?php $prop_name_favolite = "FAVOLITE".$loop_count1."22"; ?>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                        </td>"                                                         
                                        <td class="ta_kumi2"><img src="/kaisai/images/f_code01.gif" width="10" height="46" alt="""/></td>
                                        <td class="kumi">
                                            <?php $prop_name_favolite = "FAVOLITE".$loop_count1."32"; ?>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                            <?php $prop_name_favolite = "FAVOLITE".$loop_count1."22"; ?>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                            <?php $prop_name_favolite = "FAVOLITE".$loop_count1."32"; ?>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                            <?php $prop_name_favolite = "FAVOLITE".$loop_count1."12"; ?>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                            <?php $prop_name_favolite = "FAVOLITE".$loop_count1."22"; ?>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                            <?php $prop_name_favolite = "FAVOLITE".$loop_count1."12"; ?>
                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_favolite}}.png" width="20" height="20" alt=""/>
                                        </td>
                                    </tr>
                                </table>
                                
                            @endif
                        @endif
                    @endfor

                </div><!--/#focus_waku-->
            </div><!--/#focus_l-->

            {{--■■フォーカス穴　2516行--}}
            @if($rich_flg)
                <!-- ▼フォーカス穴▼ -->
                <div id="focus_r">
                    <div class="ana">穴</div>
                    <div id="focus_waku">
                        @for($loop_count1=1;$loop_count1<=2;$loop_count1++)

                            <?php 
                                $prop_name_rich = "RICH".$loop_count1."11";
                            ?>
                            @if($yoso_tenji->$prop_name_favolite)

                                <?php
                                    $rich_box_nagashi_flg = 0;
                                    $loop_count3 = 1;
                                ?>
                                <!-- ▼フォーカス１段▼ -->
                                <table class="ta_kumi">
                                    <tr>
                                        <?php $prop_name_rich = "RICH".$loop_count1."11"; ?>
                                        <td class="kumi"><img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/></td>
                                        <td class="ta_kumi2">

                                            <?php $prop_name_rich_mark = "RICH_MARK".$loop_count1.$loop_count3; ?>
                                            @if($yoso_tenji->$prop_name_rich_mark == 1)
                                                <img src="/kaisai/images/f_code01.gif" width="10" height="46" alt=""/>
                                            @elseif($yoso_tenji->$prop_name_rich_mark == 2)
                                                <img src="/kaisai/images/f_code02.gif" width="10" height="46" alt=""/>
                                            @elseif($yoso_tenji->$prop_name_rich_mark == 3)
                                                <img src="/kaisai/images/f_code03.gif" width="10" height="46" alt=""/>
                                            @elseif($yoso_tenji->$prop_name_rich_mark == 4)
                                                <img src="/kaisai/images/f_code04.gif" width="10" height="46" alt=""/>
                                            @elseif($yoso_tenji->$prop_name_rich_mark == 5)
                                                <img src="/kaisai/images/f_code05.gif" width="10" height="46" alt=""/>
                                            @elseif($yoso_tenji->$prop_name_rich_mark == 8)
                                                {{--ボックスフラグ--}}
                                                <?php $rich_box_nagashi_flg = 1; ?>
                                            @elseif($yoso_tenji->$prop_name_rich_mark == 9)
                                                {{--流しフラグ--}}
                                                <?php $rich_box_nagashi_flg = 2; ?>
                                            @endif
                                        </td>
                                        
                                        @if($rich_box_nagashi_flg == 0)
                                            {{--通常時--}}
                                            <td class="kumi">
                                                @for($loop_count4=1;$loop_count4<=3;$loop_count4++)
                                                    <?php 
                                                        $loop_count5 = 2;
                                                        $prop_name_rich = "RICH".$loop_count1.$loop_count4.$loop_count5;
                                                    ?>
                                                    @if($yoso_tenji->$prop_name_rich)
                                                        <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                    @endif
                                                @endfor
                                            </td>
                                            <td class="ta_kumi2">
                                                <?php 
                                                    $loop_count3 = 2;
                                                    $prop_name_rich_mark = "RICH_MARK".$loop_count1.$loop_count3;
                                                ?>
                                                @if($yoso_tenji->$prop_name_rich_mark == 1)
                                                    <img src="/kaisai/images/f_code01.gif" width="10" height="46" alt=""/>
                                                @elseif($yoso_tenji->$prop_name_rich_mark == 2)
                                                    <img src="/kaisai/images/f_code02.gif" width="10" height="46" alt=""/>
                                                @elseif($yoso_tenji->$prop_name_rich_mark == 3)
                                                    <img src="/kaisai/images/f_code03.gif" width="10" height="46" alt=""/>
                                                @elseif($yoso_tenji->$prop_name_rich_mark == 4)
                                                    <img src="/kaisai/images/f_code04.gif" width="10" height="46" alt=""/>
                                                @elseif($yoso_tenji->$prop_name_rich_mark == 5)
                                                    <img src="/kaisai/images/f_code05.gif" width="10" height="46" alt=""/>
                                                @elseif($yoso_tenji->$prop_name_rich_mark == 8)
                                                    {{--ここボックスはおかしい--}}
                                                @elseif($yoso_tenji->$prop_name_rich_mark == 9)
                                                    <?php $rich_box_nagashi_flg = 2; ?>
                                                @endif
                                            </td>
    
                                            @if($rich_box_nagashi_flg == 0)
                                                {{--通常--}}
                                                <td class="kumi">
                                                    @for($loop_count4=1;$loop_count4<=3;$loop_count4++)
                                                        <?php 
                                                            $loop_count5 = 2;
                                                            $prop_name_rich = "RICH".$loop_count1.$loop_count4.$loop_count5;
                                                        ?>
                                                        @if($yoso_tenji->$prop_name_rich)
                                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                        @endif
                                                    @endfor
                                                </td>
                                            @elseif($rich_box_nagashi_flg == 2)
                                                {{--ハイフン表示--}}
                                                <td class="ta_kumi2">
                                                    <img src="/kaisai/images/f_code01.gif" width="10" height="46" alt=""/>
                                                </td>
                                                <td class="kumi">
                                                    <img src="/kaisai/images/focus0.png" width="20" height="20" alt=""/>
                                                </td>
                                            @endif

                                        @elseif($rich_box_nagashi_flg == 1)
                                            {{--ボックス--}}

                                            {{--ハイフン表示--}}
                                            <td class="ta_kumi2">
											    <img src="/kaisai/images/f_code01.gif" width="10" height="46" alt=""/>
											</td>

											<td class="kumi" rowspan="3">
                                                @for($loop_count3=1;$loop_count3<=6;$loop_count3++)
                                                    <?php $prop_name_rich = "RICH".$loop_count1."11"; ?>
                                                    @if($yoso_tenji->$prop_name_rich != $loop_count3)
                                                        <img src="/kaisai/images/focus{{$loop_count3}}.png" width="20" height="20" alt=""/>
                                                    @endif
                                                @endfor
                                            </td>

                                        @elseif($rich_box_nagashi_flg == 2)
                                            {{--流し--}}

                                            {{--初期化--}}
                                            <?php $rich_box_nagashi_flg = 0; ?>

                                            {{--ハイフン表示--}}
                                            <td class="ta_kumi2">
                                                <img src="/kaisai/images/f_code01.gif" width="10" height="46" alt=""/>
                                            </td>
                                            <td class="kumi">
                                                <img src="/kaisai/images/focus0.png" width="20" height="20" alt=""/>
                                            </td>

                                            <td class="ta_kumi2">
                                                <?php 
                                                    $loop_count3 = 2;
                                                    $prop_name_rich_mark = "RICH_MARK".$loop_count1.$loop_count3;
                                                ?>
                                                @if($yoso_tenji->$prop_name_rich_mark == 1)
                                                    <img src="/kaisai/images/f_code01.gif" width="10" height="46" alt=""/>
                                                @elseif($yoso_tenji->$prop_name_rich_mark == 2)
                                                    <img src="/kaisai/images/f_code02.gif" width="10" height="46" alt=""/>
                                                @elseif($yoso_tenji->$prop_name_rich_mark == 3)
                                                    <img src="/kaisai/images/f_code03.gif" width="10" height="46" alt=""/>
                                                @elseif($yoso_tenji->$prop_name_rich_mark == 4)
                                                    <img src="/kaisai/images/f_code04.gif" width="10" height="46" alt=""/>
                                                @elseif($yoso_tenji->$prop_name_rich_mark == 5)
                                                    <img src="/kaisai/images/f_code05.gif" width="10" height="46" alt=""/>
                                                @elseif($yoso_tenji->$prop_name_rich_mark == 8)
                                                    {{--ここボックスはおかしい--}}
                                                @elseif($yoso_tenji->$prop_name_rich_mark == 9)
                                                    <?php $rich_box_nagashi_flg = 2; ?>
                                                @endif
                                            </td>

                                            @if($rich_box_nagashi_flg == 0)
                                                {{--通常--}}
                                                <td class="kumi">
                                                    @for($loop_count4=1;$loop_count4<=3;$loop_count4++)
                                                        <?php 
                                                            $loop_count5 = 3;
                                                            $prop_name_rich = "RICH".$loop_count1.$loop_count4.$loop_count5;
                                                        ?>
                                                        @if($yoso_tenji->$prop_name_rich)
                                                            <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                        @endif
                                                    @endfor
                                                </td>
                                            @elseif($rich_box_nagashi_flg == 2)
                                                {{--ハイフン表示--}}
                                                <td class="ta_kumi2">
                                                    <img src="/kaisai/images/f_code01.gif" width="10" height="46" alt=""/>
                                                </td>
                                                <td class="kumi">
                                                    <img src="/kaisai/images/focus0.png" width="20" height="20" alt=""/>
                                                </td>
                                            @endif
                                        @endif
                                    </td>
                                </table>
                                
                            @else
                                {{--頭が入力されていないときボックスの可能性アリ--}}
                                <?php
                                    $prop_name_rich_mark = "RICH_MARK".$loop_count1."1";
                                ?>
                                @if($yoso_tenji->$prop_name_rich_mark == 8)
                                    {{--ボックスのとき--}}
                                    <!-- ▼フォーカス１段▼ -->
                                    <table class="ta_kumi">
                                        <tr>
                                            <td class="kumi">
                                                <?php $prop_name_rich = "RICH".$loop_count1."12"; ?>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                <?php $prop_name_rich = "RICH".$loop_count1."22"; ?>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                <?php $prop_name_rich = "RICH".$loop_count1."32"; ?>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                            </td>
                                            <td class="ta_kumi2"><img src="/kaisai/images/f_code01.gif" width="10" height="46" alt="""/></td>
                                            <td class="kumi">
                                                <?php $prop_name_rich = "RICH".$loop_count1."22"; ?>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                <?php $prop_name_rich = "RICH".$loop_count1."32"; ?>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                <?php $prop_name_rich = "RICH".$loop_count1."12"; ?>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                <?php $prop_name_rich = "RICH".$loop_count1."32"; ?>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                <?php $prop_name_rich = "RICH".$loop_count1."12"; ?>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                <?php $prop_name_rich = "RICH".$loop_count1."22"; ?>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                            </td>                                                      
                                            <td class="ta_kumi2"><img src="/kaisai/images/f_code01.gif" width="10" height="46" alt="""/></td>
                                            <td class="kumi">
                                                <?php $prop_name_rich = "RICH".$loop_count1."32"; ?>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                <?php $prop_name_rich = "RICH".$loop_count1."22"; ?>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                <?php $prop_name_rich = "RICH".$loop_count1."32"; ?>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                <?php $prop_name_rich = "RICH".$loop_count1."12"; ?>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                <?php $prop_name_rich = "RICH".$loop_count1."22"; ?>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                                <?php $prop_name_rich = "RICH".$loop_count1."12"; ?>
                                                <img src="/kaisai/images/focus{{$yoso_tenji->$prop_name_rich}}.png" width="20" height="20" alt=""/>
                                            </td>
                                        </tr>
                                    </table>
                                @endif

                            @endif
                        @endfor
                    </div><!--/#focus_waku-->
                </div><!--/#focus_r-->
            @endif

        @endif

        <div class="clear"></div>

    </div><!--/#focus-->

    @if($yoso_tenji->COMMENT)
        <span class="text">
            {!! nl2br($yoso_tenji->COMMENT); !!}
        </span>
    @endif
@else
    <!-- ▼フォーカスデータ無し▼ -->
	<div class="no_data">ただ今予想中</div>
@endif

</div><!--/#t_navi_main_r-->

@if($yoso && (!$chushi_junen || $race_num < ($chushi_junen->中止開始レース番号 ?? 99)))
    <div class="clear"></div>
    </div>
    <!--▲-->
    </div><!--/#yoso-->

    @if($chushi_junen && $race_num >= ($chushi_junen->中止開始レース番号 ?? 99))
        @if(($chushi_junen->中止開始レース番号 ?? 99) == 0)
            <div id="main_race_r"><a href="/asp/kyogi/09/pc/st01/st01{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">次へ</a></div><!--/#main_race_r-->
        @else
            <div id="main_race_r"><a href="/asp/kyogi/09/pc/yoso02/yoso02{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">次へ</a></div><!--/#main_race_r-->
        @endif
    @else
        {{--開催--}}
        <div id="main_race_r"><a href="/asp/kyogi/09/pc/yoso02/yoso02{{str_pad($race_num, 2, '0', STR_PAD_LEFT)}}_{{$target_date}}.htm">次へ</a></div><!--/#main_race_r-->
    @endif
@endif

<div class="clear"></div>
</div><!--/#t_navi_main-->




</body>
</html>