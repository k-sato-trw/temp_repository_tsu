@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_pc.js"></script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">

<title>ボートレース津｜レースライブ&amp;リプレイ</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,ライブ,リプレイ,予想,動画">
<meta name="Description" content="BOAT RACE津が開催するレースの動画（ライブおよびリプレイ）をはじめ出走表など各種情報、予想に役立つデータを掲載しています。">
<meta name="viewport" content="width=1280px">

<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/kaisai.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>


<script type="text/javascript" src="/kaisai/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/js/common.js"></script>

<!--iframe-auto-height-->
<script type="text/javascript" src="/kaisai/js/jquery.iframe-auto-height.js"></script>

<!--コンテンツメニューjs-->
<script type="text/javascript" src="/js/contents_navi_slide.js"></script>
<script type="text/javascript" src="/js/contents_navi_main.js"></script>

<!--ヘッダーメニューjs-->
<script type="text/javascript" src="/js/header_navi.js"></script>

<!--リプレイメニュー用-->
<script type="text/javascript" src="/kaisai/js/jquery.replay.js"></script>

<script type="text/javascript">
	var intautoheight = 0;
	function func_autoheight(){
		if( intautoheight == 0 ){
			jQuery('iframe.auto-height').iframeAutoHeight({debug: true});
			intautoheight = 1;
		}
	}
</script>
<!--fancybox-->
<script type="text/javascript" src="/kaisai/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="/kaisai/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="/kaisai/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript">
function funcExec(){
	$(document).ready(function() {
		$("a.TenjiMovie").fancybox({
			'width' : 735,
			'height' : 420,
			'overlayShow'	: true,
			'centerOnScroll':	true,
			'transitionIn'	: 'elastic',
			'transitionOut'	: 'elastic',
			'type'			: 'iframe',
			'speedIn'       : 100,
			'speedOut'       : 100
		});
	});
}
function funcFancyClick(argIDData )
{// fancybox実行関数
	if( argIDData != '' )
	{
		$(argIDData).click();
	}
}
function funcTenjiMovie( argIDData , argMovieid )
{// fancybox実行関数
	document.getElementById("TenjiMovie").href = 'tenji_movie.htm?movieid=' + argMovieid;
		if( window.parent.race_movie.location.href.indexOf('?') >= 0 ){
			document.getElementById("race_movie").src = window.parent.race_movie.location.href + "&stop";
		}else{
			document.getElementById("race_movie").src = window.parent.race_movie.location.href + "?stop";
		}
	if( argIDData != '' )
	{
		funcFancyClick(argIDData);
	}
}
function func_onload(){
	funcExec();

@if($kaisai_flg || $zenken_flg)

	if( intPage == 1 ){

        @if($highlight_date)
		    document.getElementById("id_kyogi_data").src = "/asp/kyogi/09/pc/highlight/highlight_{{$highlight_date}}.htm";
		@endif
        
        func_syussobtn( 1 );
		location.hash ='';
		location.hash ='kyogi';
	}
	else if( intPage == 2 ){
		document.getElementById("id_kyogi_data").src = "/kaisai/s_pdf.htm";
		func_syussobtn( 1 );
		location.hash ='';
		location.hash ='kyogi';
	}
	else if( intPage == 3 ){
		document.getElementById("id_kyogi_data").src = "/asp/kyogi/09/pc/motor/motor04.htm";
		func_syussobtn( 1 );
		location.hash ='';
		location.hash ='kyogi';
	}
	else if( intPage == 4 ){
		document.getElementById("id_kyogi_data").src = "/asp/kyogi/09/pc/yosen.htm";
		func_syussobtn( 1 );
		location.hash ='';
		location.hash ='kyogi';
	}
	else if( intPage == 5 ){
		document.getElementById("id_kyogi_data").src = "/asp/kyogi/09/pc/setu_kekka/setu_kekka01.htm";
		func_syussobtn( 1 );
		location.hash ='';
		location.hash ='kyogi';
	}
	else if( intPage == 6 ){
		document.getElementById("id_kyogi_data").src = "{{$yoso_jumper_html}}";
		location.hash ='';
		location.hash ='kyogi';
	}
@else
    @if(file_exists("/pdf/tsu/bangumihyo/".$tomorrow_date."0101.pdf") && file_exists("/pdf/tsu/bangumihyo/".$tomorrow_date."0102.pdf"))
        if( intPage == 2 ){
            document.getElementById("id_kyogi_data").src = "/kaisai/s_pdf.htm";
            func_syussobtn( 1 );
            location.hash ='';
            location.hash ='kyogi';
        }
    @endif
@endif

}
	function func_replaylink(argurl,argurl2,argurl3,argtype){
		document.getElementById("race_movie").src = argurl;
		document.getElementById("race_sub").src = argurl2;
		document.getElementById("race_data").src = argurl3;
		if( argtype == 1 ){
			$("#id_close").click();
			document.getElementById('id_close').style.display = '';
			document.getElementById('wrapper').className = 'replay';
			document.getElementById('replay_mark').style.display = '';
			location.hash ='';
			location.hash ='wrapper';
		}
	}
function func_syussobtn( argdata ){
	if( document.getElementById("span_syussobtn") ){
		if( argdata == 1 ){
			document.getElementById("span_syussobtn").innerHTML = '<a href="/asp/kyogi/09/pc/syusso_jumper.htm" target="kyogi_data" onclick="func_syussobtn( 0 );">出走表を表示</a>';
		}else{
			document.getElementById("span_syussobtn").innerHTML = '出走表を表示';
		}
	}
}
	var intPage;
	//html版 引数取得javascript
	var intData = "";
	var arg = location.search; //引数を取得

	//URL を ? で分割
	var aSplit1 = arg.split("?");
	if( aSplit1.length > 1 ){
		//URL を &で分割
		var aSplit2 = aSplit1[1].split("&");
		var i;
		var iMax = aSplit2.length;

		// &で分割した物を = で分割
		for( i = 0; i< iMax; i++ ){
			if( i < 1 ){
				aSplit3 = aSplit2[i].split("=");
				intData += aSplit3[1];
			}
		}
	}
	if( intData !== "" ){
		if( intData === "1" ){
			intPage=1;
		}else if( intData === "2" ){
			intPage=2;
		}else if( intData === "3" ){
			intPage=3;
		}else if( intData === "4" ){
			intPage=4;
		}else if( intData === "5" ){
			intPage=5;
		}else if( intData === "6" ){
			intPage=6;
		}else{
			intPage=0;
		}
	}else{
		intPage=0;
	}

</script>
</head>





<body onload="func_onload();">


<div id="insertTenjiMovie"><a class="TenjiMovie" id="TenjiMovie" href="#"></a></div>

@if($kaisai_flg)
    @if($chushi_flg)
        <div id="wrapper" class="replay">
    @else
        @if($neer_kekka_race_number == 12)
            <div id="wrapper" class="replay">
        @else
            <div id="wrapper">
        @endif
    @endif    
@else
    <div id="wrapper" class="replay">
@endif

<div id="header_wrap">
    <div id="header">
    <div id="header_img">
    	
        <h1><a href="/">BOATRACE 津 #09</a></h1>
        <h2>レースライブ&amp;リプレイ</h2>
        
        <div id="nav">
			<script type="text/javascript">
            funcTsuMenu();
            </script>
        </div><!--/#nav-->
        
        <ul id="header_nav">
            <script type="text/javascript">
            funcTsuHeaderMenu();
	function funcAnc(  ){
		location.hash ='';
		location.hash ='kyogi';
	}
            </script>
        </ul><!--/#header_nav-->
    
    </div><!--/#header_img-->
    </div><!--/#header-->
</div><!--/#header_wrap-->




<!--◆◆◆映像◆◆◆-->

<div id="movie_wrap">
    <div id="movie">
 
        @if($yoso_message)
            <!--告知テロップ：無いときは取る-->
            <div id="message">{{$yoso_message->COMMENT}}</div>
        @endif
    
        <div id="contents_left">
            <div id="race_data_wrap">
                <div class="date">
                	<span class="d1">
                        @if(date("n",strtotime($target_date)) >= 10)
                            {{--月が2桁--}}
                            <img src="/kaisai/images/d1_{{substr(date("n",strtotime($target_date)),0,1)}}.png">
                            <img src="/kaisai/images/d1_{{substr(date("n",strtotime($target_date)),1,1)}}.png">
                        @else
                            {{--月が1桁--}}
                            <img src="/kaisai/images/d1_{{ date("n",strtotime($target_date)) }}.png">
                        @endif
                        <img src="/kaisai/images/d1_sla.png">
                        @if(date("j",strtotime($target_date)) >= 10)
                            {{--月が2桁--}}
                            <img src="/kaisai/images/d1_{{substr(date("j",strtotime($target_date)),0,1)}}.png">
                            <img src="/kaisai/images/d1_{{substr(date("j",strtotime($target_date)),1,1)}}.png">
                        @else
                            {{--月が1桁--}}
                            <img src="/kaisai/images/d1_{{ date("j",strtotime($target_date)) }}.png">
                        @endif
                        @if($holiday)
                            {{--祝日--}}
                            <img src="/kaisai/images/d1_{{ $general->weeknumber_to_weekalphabet(date("w",strtotime($target_date))) }}_h.png">
                        @else
                            {{--祝日ではない--}}
                            <img src="/kaisai/images/d1_{{ $general->weeknumber_to_weekalphabet(date("w",strtotime($target_date))) }}.png">
                        @endif

                    </span>

                    @if($kaisai_flg)
                        @if($chushi_flg)
                            <span class="d2"><img src="/kaisai/images/d2_day_chushi.png"></span>
                        @else
                            @if($target_date == $kaisai_master->終了日付)
                                <span class="d2"><img src="/kaisai/images/d2_day0.png"></span>
                            @else
                                <span class="d2"><img src="/kaisai/images/d2_day{{$race_header->KAISAI_DAYS}}.png"></span>
                            @endif
                        @endif

                        {{--グレード--}}
                        @if($race_header->GRADE_CODE == "0")
                            <span class="d3 SG">SG</span>
                        @elseif($race_header->GRADE_CODE == "1")
                            <span class="d3 G1">G1</span>
                        @elseif($race_header->GRADE_CODE == "2")
                            <span class="d3 G2">G2</span>
                        @elseif($race_header->GRADE_CODE == "3")
                            <span class="d3 G3">G3</span>
                        @else
                            <span class="d3 G0">一般</span>
                        @endif
                    @else
                        <span class="d2"><img src="/kaisai/images/d2_day_no.png"></span>
                    @endif
                    
                </div><!--/date-->
                <div class="name">
                
                @if($kaisai_flg)
                    {{--開催時--}}
                    @if(mb_strlen($kaisai_master->開催名称) >= 28)
                        <span class="small">{{$kaisai_master->開催名称}}</span><!-- class="small" でサイズ小 -->
                    @else
                        <span>{{$kaisai_master->開催名称}}</span><!-- class="small" でサイズ小 -->
                    @endif
                @else
                    {{--非開催--}}
                    <span></span><!-- class=""small"" でサイズ小 -->
                @endif

                    <iframe src="/asp/tsu/kaisai/race_telop_read.htm" frameborder="0" allowtransparency="true" scrolling="no" name="race_telop" id="race_telop"></iframe>
                </div><!--/name-->
                <div class="clear"></div>
            </div><!--/#race_data_wrap-->
            
            <div class="redzone">競走場、場外発売場の発売状況は各競走場等のサイトをご確認下さい</div>
            <div id="race_movie_wrap">
                <iframe src="/asp/kyogi/09/pc/race_movie.htm" frameborder="0" allowtransparency="true" scrolling="no" name="race_movie" id="race_movie" allowfullscreen></iframe>
                <iframe src="/asp/tsu/kaisai/race_sub_read.htm" frameborder="0" allowtransparency="true" scrolling="no" name="race_sub" id="race_sub"></iframe>
            </div><!--/#race_movie_wrap-->
            
            <div class="clear"></div>
        </div><!--/#contents_left-->
        
        
    	<div id="contents_right">
            @if($kaisai_flg)
                @if($neer_kekka_race_number == 12 || $chushi_flg)
                    <iframe src="dammy.htm" frameborder="0" allowtransparency="true" scrolling="no" name="race_data" id="race_data" class="auto-height"></iframe>
                @else
                    <iframe src="/asp/tsu/kaisai/race_data_read.htm" frameborder="0" allowtransparency="true" scrolling="no" name="race_data" id="race_data" class="auto-height"></iframe>
                @endif                
            @else
                @if($zenken_flg)
                    <iframe src="/asp/tsu/kaisai/race_data_read.htm" frameborder="0" allowtransparency="true" scrolling="no" name="race_data" id="race_data" class="auto-height"></iframe>
                @else
                    <iframe src="dammy.htm" frameborder="0" allowtransparency="true" scrolling="no" name="race_data" id="race_data" class="auto-height"></iframe>
                @endif
            @endif
        </div><!--/#contents_right-->
        
        
        <!--◆◆◆リプレイ◆◆◆-->
        <div id="replay_wrap">
            @if($kaisai_flg)

                @if($neer_kekka_race_number == 12 || $chushi_flg)
                    <div id="btn_rep" onclick="parent.replay_list.load();" style="display:none;">レースリプレイ</div>
                    
                    <div id="replay_main" style="display:block; left:-399px;">
                    
                        <div class="left">
                            <p class="ttl">レースリプレイ</p>
                            <p class="close" style="display:none;" id="id_close">閉じる</p>
                        </div><!--/left-->
                        
                        <div class="right">
                            <iframe src="/asp/tsu/kaisai/replay_list_read.htm" frameborder="0" allowtransparency="true" scrolling="no" name="replay_list"></iframe>
                        </div><!--/right-->
                        
                        <div class="clear"></div>
                    </div><!--/#replay_main-->
                @else
                    <div id="btn_rep" onclick="parent.replay_list.load();">レースリプレイ</div>
                    
                    <div id="replay_main">
                    
                        <div class="left">
                            <p class="ttl">レースリプレイ</p>
                            <p class="close" id="id_close">閉じる</p>
                        </div><!--/left-->
                        
                        <div class="right">
                            <iframe src="/asp/tsu/kaisai/replay_list_read.htm" frameborder="0" allowtransparency="true" scrolling="no" name="replay_list"></iframe>
                        </div><!--/right-->
                        
                        <div class="clear"></div>
                    </div><!--/#replay_main-->
                @endif                
            @else
                @if($zenken_flg)
                    <div id="btn_rep" onclick="parent.replay_list.load();">レースリプレイ</div>
                    
                    <div id="replay_main">
                    
                        <div class="left">
                            <p class="ttl">レースリプレイ</p>
                            <p class="close" id="id_close">閉じる</p>
                        </div><!--/left-->
                        
                        <div class="right">
                            <iframe src="/asp/tsu/kaisai/replay_list_read.htm" frameborder="0" allowtransparency="true" scrolling="no" name="replay_list"></iframe>
                        </div><!--/right-->
                        
                        <div class="clear"></div>
                    </div><!--/#replay_main-->
                    
                @else
                    <div id="btn_rep" onclick="parent.replay_list.load();" style="display:none;">レースリプレイ</div>
                        
                    <div id="replay_main" style="display:block; left:-399px;">
                    
                        <div class="left">
                            <p class="ttl">レースリプレイ</p>
                            <p class="close" style="display:none;" id="id_close">閉じる</p>
                        </div><!--/left-->
                        
                        <div class="right">
                            <iframe src="/asp/tsu/kaisai/replay_list_read.htm" frameborder="0" allowtransparency="true" scrolling="no" name="replay_list"></iframe>
                        </div><!--/right-->
                        
                        <div class="clear"></div>
                    </div><!--/#replay_main-->
                @endif
            @endif
            
        </div><!--/#replay_wrap-->
        
        
        <div class="clear"></div>
        
        <!--ムービー下に表示-->
        <div id="replay_mark" style="display:none;">Replay</div>
        
    </div><!--/#movie-->
</div><!--/#movie_wrap-->








<!--◆◆◆競技情報◆◆◆-->

<div id="kyogi_wrap">
    <div id="kyogi">
        @if($kaisai_flg)
            <div id="kyogi_data">
            
            @if($highlight_date == $target_date)
                {{--当日表示--}}

                @if($chushi_flg)
                    {{--1R表示--}}
                    <iframe src="/asp/kyogi/09/pc/syusso01/syusso0101_{{$target_date}}.htm" frameborder="0" allowtransparency="true" scrolling="no" name="kyogi_data" id="id_kyogi_data" class="auto-height"></iframe>
                
                    <?php
                        $jumper_html = "/asp/kyogi/09/pc/syusso01/syusso0101_".$target_date.".htm";
                        $yoso_jumper_html = "/asp/kyogi/09/pc/yoso01/yoso0101_".$target_date.".htm";
                    ?>
                @elseif($neer_kekka_race_number == 12 || $neer_ozz_race_number == 0)
                    {{--直近レース結果が12レースの時 OR 直近オッズ番号が0の時--}}
                    <iframe src="/asp/kyogi/09/pc/syusso01/syusso0112_{{$target_date}}.htm" frameborder="0" allowtransparency="true" scrolling="no" name="kyogi_data" id="id_kyogi_data" class="auto-height"></iframe>
                
                    <?php
                        $jumper_html = "/asp/kyogi/09/pc/syusso01/syusso0112_".$target_date.".htm";
                        $yoso_jumper_html = "/asp/kyogi/09/pc/yoso01/yoso0112_".$target_date.".htm";
                    ?>
                @else
                    
                    <iframe src="/asp/kyogi/09/pc/syusso01/syusso01{{$neer_ozz_race_number}}_{{$target_date}}.htm" frameborder="0" allowtransparency="true" scrolling="no" name="kyogi_data" id="id_kyogi_data" class="auto-height"></iframe>
                    
                    <?php
                        $jumper_html = "/asp/kyogi/09/pc/syusso01/syusso01".$neer_ozz_race_number."_".$target_date.".htm";
                        $yoso_jumper_html = "/asp/kyogi/09/pc/yoso01/yoso01".$neer_ozz_race_number."_".$target_date.".htm";
                    ?>
                @endif                
            @else
                {{--翌日表示--}}
                <iframe src="/asp/kyogi/09/pc/syusso01/syusso0101_{{$highlight_date}}.htm" frameborder="0" allowtransparency="true" scrolling="no" name="kyogi_data" id="id_kyogi_data" class="auto-height"></iframe>
                
                <?php
                    $jumper_html = "/asp/kyogi/09/pc/syusso01/syusso0101_".$highlight_date.".htm";
                    $yoso_jumper_html = "/asp/kyogi/09/pc/yoso01/yoso0101_".$highlight_date.".htm";
                ?>
            @endif
            </div><!--/#kyogi_data-->
        
            <div id="kyogi_subnav">
            <ul>
        	<!--初日[day1]、2日目[day2]、3日目[day3]、4日目[day4]、5日目[day5]、6日目[day6]、7日目[day7]、最終日[day0]-->
            @if($highlight_date)
                <li class="b1 day{{$highlight_day}}"><a href="/asp/kyogi/09/pc/highlight/highlight_{{$highlight_date}}.htm" target="kyogi_data" onclick="func_syussobtn( 1 );">
                
                @if($highlight_day == 0)
                    最終日
                @elseif($highlight_day == 1)
                    初日
                @else
                    {{$highlight_day}}日目
                @endif
                    の見どころ</a></li>
                
            @else
                <li class="b1 day1">初日の見どころ</li>
            @endif
            
            
            <li class="b2"><a href="/kaisai/s_pdf.htm" target="kyogi_data" onclick="func_syussobtn( 1 );">出走表PDF</a></li>
            <li class="b3"><a href="/asp/kyogi/09/pc/motor/motor04.htm" target="kyogi_data" onclick="func_syussobtn( 1 );">モーター抽選結果&amp;前検タイム</a></li>
            
            @if($tokutenritu)
                <li class="b4"><a href="/asp/kyogi/09/pc/yosen.htm" target="kyogi_data" onclick="func_syussobtn( 1 );">得点率情報</a></li>                
            @else
                <li class="b4">得点率情報</li>
            @endif
            
                <li class="b5"><a href="/asp/kyogi/09/pc/setu_kekka/setu_kekka01.htm" target="kyogi_data" onclick="func_syussobtn( 1 );">節間レース結果</a></li>
            </ul>
        
            <div class="back"><span id="span_syussobtn">出走表を表示</span></div>
            </div><!--/#kyogi_subnav-->
            
            <div class="clear"></div>
        
            <div id="page_top"><a href="#wrapper">UP</a></div>

        @elseif($zenken_flg)

            <div id="kyogi_data">
            
            <iframe src="/asp/kyogi/09/pc/syusso01/syusso0101_{{$tomorrow_date}}.htm" frameborder="0" allowtransparency="true" scrolling="no" name="kyogi_data" id="id_kyogi_data" class="auto-height"></iframe>    
                <?php
                    $jumper_html = "/asp/kyogi/09/pc/syusso01/syusso0101_".$tomorrow_date.".htm";
                    $yoso_jumper_html = "/asp/kyogi/09/pc/yoso01/yoso0101_".$tomorrow_date.".htm";
                ?>
            </div><!--/#kyogi_data-->
        
            <div id="kyogi_subnav">
            <ul>
        	<!--初日[day1]、2日目[day2]、3日目[day3]、4日目[day4]、5日目[day5]、6日目[day6]、7日目[day7]、最終日[day0]-->
            @if($highlight_date)
                <li class="b1 day{{$highlight_day}}"><a href="/asp/kyogi/09/pc/highlight/highlight_{{$highlight_date}}.htm" target="kyogi_data" onclick="func_syussobtn( 1 );">
                
                @if($highlight_day == 0)
                    最終日
                @elseif($highlight_day == 1)
                    初日
                @else
                    {{$highlight_day}}日目
                @endif
                    の見どころ</a></li>
                
            @else
                <li class="b1 day1">初日の見どころ</li>
            @endif
            
            @if( file_exists('/pdf/tsu/bangumihyo/'.$tomorrow_date.'0101.pdf') && file_exists('/pdf/tsu/bangumihyo/'.$tomorrow_date.'0102.pdf'))
                {{--pdf有--}}
                <li class="b2"><a href="/kaisai/s_pdf.htm" target="kyogi_data" onclick="func_syussobtn( 1 );">出走表PDF</a></li>
            @else
                {{--pdf有--}}
                <li class="b2">出走表PDF</li>
            @endif

            @if($motor_list)
                <li class="b3"><a href="/asp/kyogi/09/pc/motor/motor04.htm" target="kyogi_data" onclick="func_syussobtn( 1 );">モーター抽選結果&amp;前検タイム</a></li>
            @else
                <li class="b3">モーター抽選結果&amp;前検タイム</li>
            @endif

                <li class="b4">得点率情報</li>
                <li class="b5">節間レース結果</li>
            </ul>
        
            <div class="back"><span id="span_syussobtn">出走表を表示</span></div>
            </div><!--/#kyogi_subnav-->
            
            <div class="clear"></div>
        
            <div id="page_top"><a href="#wrapper">UP</a></div>
        @else

            @if( file_exists('/pdf/tsu/bangumihyo/'.$tomorrow_date.'0101.pdf') && file_exists('/pdf/tsu/bangumihyo/'.$tomorrow_date.'0102.pdf'))
                {{--//前検日かつ翌日出走表データがまだだが、PDFがある時--}}
                    <div id="kyogi_data">
            
                    <iframe src="/asp/kyogi/09/pc/syusso01/syusso0101_{{$tomorrow_date}}.htm" frameborder="0" allowtransparency="true" scrolling="no" name="kyogi_data" id="id_kyogi_data" class="auto-height"></iframe>    
                        <?php
                            $jumper_html = "/asp/kyogi/09/pc/syusso01/syusso0101_".$tomorrow_date.".htm";
                            $yoso_jumper_html = "/asp/kyogi/09/pc/yoso01/yoso0101_".$tomorrow_date.".htm";
                        ?>
                    </div><!--/#kyogi_data-->
                
                    <div id="kyogi_subnav">
                    <ul>
                        <!--初日[day1]、2日目[day2]、3日目[day3]、4日目[day4]、5日目[day5]、6日目[day6]、7日目[day7]、最終日[day0]-->
                        <li class="b1 day1">初日の見どころ</li>
                        <li class="b2"><a href="/kaisai/s_pdf.htm" target="kyogi_data" onclick="func_syussobtn( 1 );">出走表PDF</a></li>
            
                        <li class="b3">モーター抽選結果&amp;前検タイム</li>
        
                        <li class="b4">得点率情報</li>
                        <li class="b5">節間レース結果</li>
                    </ul>
                
                    <div class="back"><span id="span_syussobtn">出走表を表示</span></div>
                    </div><!--/#kyogi_subnav-->
                    
                    <div class="clear"></div>
                
                    <div id="page_top"><a href="#wrapper">UP</a></div>
            @endif
        
        @endif 
    </div><!--/#kyogi-->
</div><!--/#kyogi_wrap-->




<div id="footer_wrap">
    <div id="footer">
    
    	<iframe src="/footer.htm" frameborder="0" allowtransparency="true" scrolling="no" name="footer"></iframe>
        
    </div><!--/#footer-->
</div><!--/#footer_wrap-->



</div><!--/#wrapper-->



<!--iframe-auto-height-->
<script>
  jQuery('iframe.auto-height').iframeAutoHeight({debug: true});
</script>
<!--iframe-auto-height-->

</body>
</html>
