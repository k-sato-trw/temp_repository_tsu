<!doctype html>
<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-161205184-2"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-161205184-2');
</script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="user-scalable=no">
<meta http-equiv="Refresh" CONTENT="15; URL=/asp/tsu/sp/topdisplay/indexRaceInfo.htm">

<title></title>

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href="/sp/css/reset.css" rel="stylesheet" type="text/css">
<link href="/sp/css/common.css" rel="stylesheet" type="text/css">
<link href="/sp/css/index.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/sp/js/jquery-1.8.3.min.js"></script>

<!-- ビューポート設定 -->
<script type="text/javascript" src="/sp/js/monaca.viewport.js"></script>
<script>
monaca.viewport({
    width : 720
});
</script>

</head>




<body>
@if($chushi_flg)
    <div id="race_info_memo">
    
    <div id="race_info_head">
        <div id="now_race"></div>

    @if($stop_race_num == 0)
        {{--全レース中止--}}
        <p>{{ date('n/j',strtotime($target_date)) }}の開催は中止となりました</p>
    @else
        <p>第{{$stop_race_num}}レース以降は中止となりました</p>
    @endif

    </div>
    
    
    
    </div>
@elseif(!$kaisai_flg)
    {{--非開催--}}
    <div id="race_info_memo">
        <div id="race_info_head">
            <div id="now_race"></div>
            <p>本日の開催はございません</p>
        </div>
    </div>    
@else
    <div id="race_info_kaisai">

        @if($target_race_num != "" && $shimekiri != "" )

            @if($target_time < "0830")
                <div id="race_info_head">
				    <div id="now_race"><img src="/sp/images/now_1r_pre.png" alt="{{$target_race_num}}R"></div>
				    <div id="dento_time">【発売締切】{{$shimekiri}}</div>
				</div>
            @else

                @if($neer_ozz_race_number == 0 && ( $neer_kekka_race_number == 11 || $neer_kekka_race_number_tfinfo == 11 ))
                    {{--12レース発売締切 12R表記--}}
                    <div id="race_info_head">
					    <div id="now_race"><img src="/sp/images/now_{{$target_race_num}}r_over.png" alt="{{$target_race_num}}R"></div>
					    <div id="dento_time">【発売締切】{{$shimekiri}}</div>
					</div>
                @else
                    <div id="race_info_head">
					    <div id="now_race"><img src="/sp/images/now_{{$target_race_num}}r.png" alt="{{$target_race_num}}R発売中"></div>
					    <div id="dento_time">【発売締切】{{$shimekiri}}</div>
					</div>
                @endif

            @endif

            <a href="/asp/tsu/sp/kyogi/index.asp?jyo=09&racenum={{$target_race_num}}&page=2" target="_parent">
            <ul id="shusso">

            @for($loop_count = 1; $loop_count <= 6; $loop_count++)

                <li class="r{{$loop_count}}">
                    <dl><dt>{{$loop_count}}号艇</dt>
				    <dd>{!! str_replace(" ","<br>",str_replace("  "," ",$syussou[$loop_count]->SENSYU_NAME)) !!}
                        @if($syussou[$loop_count]->SEX == 2)
                            <img src="/sp/images/jyogai_lady.png" class="lady">
                        @endif
                        <span>{{ $syussou[$loop_count]->TOUBAN }}({{ $syussou[$loop_count]->KYU_BETU }})</span>
                    </dd></dl>
                </li>
            @endfor

                <div class="clear"></div>
            </ul>
            </a>

            </div>

        @else
            {{--レース中以外--}}
            @if($live_flg == 3 || ($neer_ozz_race_number == 0 && ( $neer_kekka_race_number == 12 || $neer_kekka_race_number_tfinfo == 12 )) )
                {{--レース終了--}}
                @if($kaisai_master->終了日付 == $target_date)
                    {{--本日最終日--}}
                    <div id="race_info_memo">
                        
                        <div id="race_info_head">
                            <div id="now_race"></div>
                            <p>本日のレースは終了しました</p>
                        </div>
                    
                    </div>
                    
                @else
                    {{--最終日以外は翌日の12レース出走メンバー表示--}}
                    {{--レース終了後--}}
                    @if($target_time >= '1815' && $tomorrow_kaisai && $tomorrow_race_header)
                        {{--翌日データ開催--}}
                        <div id="race_info_end">
                            <div id="race_info_head">
                                <div id="now_race"></div>
                                <dl id="point_race">
                                	<dt>
                                        @if($tomorrow_kaisai->終了日付 == $tomorrow_date)
                                            <span>最終日
                                        @else
                                            {{ $tomorrow_race_header->KAISAI_DAYS }}<span>日目
                                        @endif
                                            ({{ date('n/j',strtotime($tomorrow_date)) }})</span></dt>
                                    <dd>第12レースメンバー</dd>
						   	    </dl>
						    <div class="clear"></div>
						</div>

                        
						<a href="/asp/tsu/sp/kyogi/index.asp?jyo=09&racenum=12&page=2" target="_parent">
                            <ul id="shusso">
                                @for($loop_count = 1; $loop_count <= 6; $loop_count++)

                                    <li class="r{{$loop_count}}">
                                        <dl><dt>{{$loop_count}}号艇</dt>
                                        <dd>{!! str_replace(" ","<br>",str_replace("  "," ",$syussou[$loop_count]->SENSYU_NAME)) !!}
                                            @if($syussou[$loop_count]->SEX == 2)
                                                <img src="/sp/images/jyogai_lady.png" class="lady">
                                            @endif
                                            <span>{{ $syussou[$loop_count]->TOUBAN }}({{ $syussou[$loop_count]->KYU_BETU }})</span>
                                        </dd></dl>
                                    </li>
                                @endfor
                                <div class="clear"></div>
                            </ul>
                        </a>
                                
                        </div>
                        
                    @else
                        <div id="race_info_memo">
                            <div id="race_info_head">
                                <div id="now_race"></div>
                                <p>本日のレースは終了しました</p>
                            </div>						
						</div>
                    @endif
                    
                @endif
            @else
                {{--その他、異常時は空白に--}}
                <div id="race_info_head">
                    <div id="now_race">　</div>
                    <div id="dento_time">【発売締切】--:--</div>
                </div>

                <a href="javascript:void(0);">
                    <ul id="shusso">
                        <li class="r1"><dl><dt>1号艇</dt><dd>---<span>--- (---)</span></dd></dl></li>
                        <li class="r2"><dl><dt>2号艇</dt><dd>---<span>--- (---)</span></dd></dl></li>
                        <li class="r3"><dl><dt>3号艇</dt><dd>---<span>--- (---)</span></dd></dl></li>
                        <li class="r4"><dl><dt>4号艇</dt><dd>---<span>--- (---)</span></dd></dl></li>
                        <li class="r5"><dl><dt>5号艇</dt><dd>---<span>--- (---)</span></dd></dl></li>
                        <li class="r6"><dl><dt>6号艇</dt><dd>---<span>--- (---)</span></dd></dl></li>
                        <div class="clear"></div>
                    </ul>
                </a>
                
                </div>
            @endif

        @endif
    
@endif

</body>
</html>
