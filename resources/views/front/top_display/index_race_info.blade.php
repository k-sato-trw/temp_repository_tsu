@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-161205184-3"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-161205184-3');
</script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">

<title>ボートレース津</title>

<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/index.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>


<script type="text/javascript" src="/asp/SmartAgentGetter.js"></script>
</head>





<body>

@if($kaisai_flg)
    {{--開催--}}

    <div id="race_info_kaisai">
        <div id="r_main">

            <div id="r_info">
                @if($calendar->GRADE == 4)
                    <div id="left" class="g0">一般</div>
                @elseif($calendar->GRADE == 3)
                    <div id="left" class="g3">G3</div>
                @elseif($calendar->GRADE == 2)
                    <div id="left" class="g2">G2</div>
                @elseif($calendar->GRADE == 1)
                    <div id="left" class="g1">G1</div>
                @elseif($calendar->GRADE == 0)
                    <div id="left" class="sg">SG</div>
                @else
                    <div id="left" class="g0">一般</div>
                @endif
                
                <div id="right">
                    <p class="name">{{$kaisai_master->開催名称}}</p>
                    <p class="date">
                        @foreach($kaisai_day_list as $key=>$item)
                            <?php $tmp = "" ?>
                            @if($key == 0 || $tmp_month != date('n',strtotime($item)))
                                <?php $tmp_month = date('n',strtotime($item)); ?>
                                <span class="month">{{ date('n',strtotime($item)) }}/</span><!--
                            @endif

                            @if(isset($chushi_junen_array[$item]))
                                --><span class="chushi"><!--
                            @elseif($today_date == $item)
                                --><span class="today"><!--
                            @endif
                            -->{{ date('j',strtotime($item)) }}<!--
                            @isset($holiday_array[$item])
                                {{--祝日--}}
                                --><img src="/images/date_{{$general->weeknumber_to_weekalphabet( date('w',strtotime($item)))}}_h.png"><!--
                            @else
                                {{--平日--}}
                                --><img src="/images/date_{{$general->weeknumber_to_weekalphabet( date('w',strtotime($item)))}}.png"><!--
                            @endisset
                            @if($today_date == $item || isset($chushi_junen_array[$item]))
                                --></span><!--
                            @endif
                        @endforeach
                    --></p>
                </div><!--/#right-->
                <div class="clear"></div>
            </div><!--/#r_info-->

        </div><!--/#r_main-->

        <ul id="r_subnav">
            <!--初日[day1]、2日目[day2]、3日目[day3]、4日目[day4]、5日目[day5]、6日目[day6]、7日目[day7]、最終日[day0]-->
            <li class="b1 day{{$highlight_day}}"><a href="/asp/tsu/kaisai/kaisaiindex.htm?page=1" target="_parent">{{$highlight_label}}の見どころ</a></li>
            <li class="b2"><a href="/asp/tsu/kaisai/kaisaiindex.htm?page=3" target="_parent">モーター抽選結果&amp;前検タイム</a></li>
            @if($tokutenritu)
                <li class="b3"><a href="/asp/tsu/kaisai/kaisaiindex.htm?page=4" target="_parent">得点率情報</a></li>                
            @else
                <li class="b3">得点率情報</li>
            @endif
            <li class="b4"><a href="/asp/tsu/kaisai/kaisaiindex.htm?page=2" target="_parent"><span>出走表</span></a></li>
        </ul><!--/#r_subnav-->

        <div class="clear"></div>
    </div><!--/#race_info_kaisai-->
    
@else
    {{--非開催--}}
    <div id="race_info_hikaisai">

        <div id="r_main">
        
        
        <div id="r_info">
            @if($calendar->GRADE == 4)
                <div id="left" class="g0"><span>次節告知</span>一般</div>
            @elseif($calendar->GRADE == 3)
                <div id="left" class="g3"><span>次節告知</span>G3</div>
            @elseif($calendar->GRADE == 2)
                <div id="left" class="g2"><span>次節告知</span>G2</div>
            @elseif($calendar->GRADE == 1)
                <div id="left" class="g1"><span>次節告知</span>G1</div>
            @elseif($calendar->GRADE == 0)
                <div id="left" class="sg"><span>次節告知</span>SG</div>
            @else
                <div id="left" class="g0"><span>次節告知</span>一般</div>
            @endif
            <div id="right">
                <p class="name small">{{$next_kaisai->開催名称}}</p>
                <p class="date">
                    @foreach($kaisai_day_list as $key=>$item)
                        <?php $tmp = "" ?>
                        @if($key == 0 || $tmp_month != date('n',strtotime($item)))
                            <?php $tmp_month = date('n',strtotime($item)); ?>
                            <span class="month">{{ date('n',strtotime($item)) }}/</span><!--
                        @endif

                        @if(isset($chushi_junen_array[$item]))
                            --><span class="chushi"><!--
                        @elseif($today_date == $item)
                            --><span class="today"><!--
                        @endif
                        -->{{ date('j',strtotime($item)) }}<!--
                        @isset($holiday_array[$item])
                            {{--祝日--}}
                            --><img src="/images/date_{{$general->weeknumber_to_weekalphabet( date('w',strtotime($item)))}}_h.png"><!--
                        @else
                            {{--平日--}}
                            --><img src="/images/date_{{$general->weeknumber_to_weekalphabet( date('w',strtotime($item)))}}.png"><!--
                        @endisset
                        @if($today_date == $item || isset($chushi_junen_array[$item]))
                            --></span><!--
                        @endif
                    @endforeach
                --></p>
            </div><!--/#right-->
            <div class="clear"></div>
        </div><!--/#r_info-->
        
        
        <div id="r_tenbo">
        
            <div class="left">
                <h3>{{ $race_tenbo->TITLE }}</h3>
                @if(mb_strlen($race_tenbo->LETTER_BODY) >= 90)
                    <p>{{mb_substr($race_tenbo->LETTER_BODY,0,83)."…"}}
                        @if($race_index->PC_TENBO_URL)
                            <a href="{{ $race_index->PC_TENBO_URL }}" @if(strpos($race_index->PC_TENBO_URL,"http") !== false) target="_blank" @else target="_parent" @endif >続きを読む</a>
                        @elseif(file_exists("/asp/htmlmade/Race/Tenbo/09/PC/t{{ $race_index->ID }}.htm"))               
                            <a href="/asp/htmlmade/Race/Tenbo/09/PC/t{{ $race_index->ID }}.htm" target="_parent" >続きを読む</a>                 
                        @endif
                        <div class="clear"></div>
                    </p>                    
                @else
                    <p>{{$race_tenbo->LETTER_BODY}}<div class="clear"></div></p>
                @endif
                <ul class="btn">
                    @if($race_index->PC_SYUTUJO_URL)
                        <li class="b1"><a href="{{ $race_index->PC_SYUTUJO_URL }}" @if(strpos($race_index->PC_SYUTUJO_URL,"http") !== false) target="_blank" @else target="_parent" @endif >出場予定選手</a></li>
                    @elseif(file_exists("/asp/htmlmade/Race/Tenbo/09/PC/s{{ $race_index->ID }}.htm"))               
                        <li class="b1"><a href="/asp/htmlmade/Race/Tenbo/09/PC/s{{ $race_index->ID }}.htm" target="_parent" >出場予定選手</a></li>
                    @else
                        <li class="b1">出場予定選手</li>
                    @endif

                    @if($race_tenbo)
                        @if(file_exists("/asp/kyogi/09/motor_check/{{ $next_kaisai->開始日付 }}.htm"))
                            <li class="b2"><a href="/asp/tsu/kaisai/kaisaiindex.htm?page=3" target="_parent">モーター抽選結果&amp;前検タイム</a></li>
                        @else
                            <li class="b2">モーター抽選結果&amp;前検タイム</li>
                        @endif
                        @if(file_exists("/pdf/tsu/bangumihyo/{{ $tomorrow_date }}0101.pdf"))
                            <li class="b3"><a href="/asp/tsu/kaisai/kaisaiindex.htm?page=2" target="_parent"><span>出走表&amp;<br>前日記者予想PDF</span></a></li>
                        @else
                            <li class="b3"><span>出走表&amp;<br>前日記者予想PDF</span></li>
                        @endif                    
                    @else
                        <li class="b2">モーター抽選結果&amp;前検タイム</li>
                        <li class="b3"><span>出走表&amp;<br>前日記者予想PDF</span></li>
                    @endif

                    @if($event_fan && $event_fan_master)
                        <li class="b4"><a href="/04event/04event.htm#id{{$calendar->ID}}" target="_parent"><span>イベント&amp;<br>ファンサービス</span></a></li>                    
                    @else
                        <li class="b4"><span>イベント&amp;<br>ファンサービス</span></li>
                    @endif
                </ul>
            </div><!--/left-->
                
            @if($race_tenbo)
                <div class="right">
                    <h4>ピックアップレーサー</h4>
                    <ul class="racer">
                        @foreach($leader_array as $key=>$item) 
                            @isset($fandata_manual_array[$item])
                                <?php $fandata = $fandata_manual_array[$item]; ?>
                            @else
                                @isset($fandata_array[$item])
                                    <?php $fandata = $fandata_array[$item];  ?>                                    
                                @endisset
                            @endisset
                            <li @if( ($fandata->Sei ?? 1) == 2 ) class="lady" @endif >
                                @isset($sensyu_image_array[$item])
                                    <img src="/asp/htmlmade/raceview/{{$item}}.jpg" width="75" height="86">
                                @endisset
                                @isset($fandata)
                                    <p>{{$item}} ({{$fandata->Kyu}})<span>{{str_replace("　","",$fandata->NameK)}}</span></p>
                                @endisset
                            </li>
                        @endforeach
                    <div class="clear"></div>
                    </ul>
                </div><!--/right-->
            @endif
            
            <div class="clear"></div>
        
        </div><!--/#r_tenbo-->
        
        </div><!--/#r_main-->
        
        
        <ul id="r_subnav">
            <li class="b1"><a href="/01cal/01cal.htm" target="_parent">開催日程</a></li>
            @if($zenken_flg && $today_time >= 1815)
                <li class="b2_2"><a href="/asp/tsu/kaisai/kaisaiindex.htm" target="_parent">ライブ＆リプレイ</a></li>
                <li class="b3"><a href="/asp/tsu/kaisai/kaisaiindex.htm?page=6" target="_parent">レース予想</a></li>
            @else
                <li class="b2"><a href="/asp/tsu/kaisai/kaisaiindex.htm" target="_parent">リプレイ</a></li>
                <li class="b3">レース予想</li>                
            @endif
            <li class="b4"><a href="/03play_b/03play_b.htm" target="_parent">優勝戦プレイバック</a></li>
            <li class="b5"><a href="/03result_tsu/03result_tsu.htm" target="_parent">レース結果検索</a></li>
        </ul><!--/#r_subnav-->
        
        
        <div class="clear"></div>
        
    </div><!--/#race_info_kaisai-->
    
@endif

</body>
</html>
