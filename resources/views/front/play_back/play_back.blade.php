
<!doctype html>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_pc.js"></script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">

<title>ボートレース津｜優勝戦プレイバック</title>

<meta name="Keywords" content="BOAT RACE津,津,優勝,優勝戦,結果,プレイバック">
<meta name="Description" content="BOAT RACE津の優勝戦結果を掲載しています。">
<meta name="viewport" content="width=1280px">

<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/03play_b.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/css/pagination.css" />

<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/js/common.js"></script>

<!--コンテンツメニューjs-->
<script type="text/javascript" src="/js/contents_navi_slide.js"></script>
<script type="text/javascript" src="/js/contents_navi_main.js"></script>

<!--ヘッダーメニューjs-->
<script type="text/javascript" src="/js/header_navi.js"></script>

<!--stickybtn-->
<script type="text/javascript" src="/js/jquery.sticky-kit.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  return $("#event_nav, #main").stick_in_parent({
    offset_top: 10
  });
});
</script>

<!--jQuery Pagination-->
<script type="text/javascript" src="/js/jquery.pagination.js"></script>
<script type="text/javascript">
	$(function() {
		//実際に動作するコールバック関数です。
		function pageselectCallback(page_index, jq){
			var new_content = $('#hiddenresult div.result:eq('+page_index+')').clone();
              
			//テキストを表示します。
			$('#Searchresult').empty().append(new_content);
	 		return false;
		}
		function initPagination() {
			var num_entries = $('#hiddenresult div.result').length;
			//ここで動作の設定をします。
			$("#Pagination").pagination(num_entries, {
			callback: pageselectCallback,
			items_per_page:1,
			load_first_page:true
			});
		}
		$(function(){
		//初期化関数を起動します。
			initPagination();
		});
	});
	function funcLink( argMovieId ){
		if( document.getElementById('pb_mov') ){
			document.getElementById('pb_mov').src=argMovieId ;
		}
	}






</script>

<!--iframe-auto-height-->
<script type="text/javascript" src="/js/jquery.iframe-auto-height.js"></script>
</head>



<body>


<div id="wrapper">

<div id="header_wrap">
    <div id="header">
    <div id="header_img">
    	
        <h1><a href="/">BOATRACE 津 #09</a></h1>
        <h2>優勝戦プレイバック</h2>
        
        <div id="nav">
			<script type="text/javascript">
            funcTsuMenu();
            </script>
        </div><!--/#nav-->
        
        <ul id="header_nav">
            <script type="text/javascript">
            funcTsuHeaderMenu();
            </script>
        </ul><!--/#header_nav-->
    
    </div><!--/#header_img-->
    </div><!--/#header-->
</div><!--/#header_wrap-->




<!--◆◆◆コンテンツ◆◆◆-->

<div id="contents_wrap">
<div id="contents">
	
<div id="main">
    
<div id="play_b_wrap">
<div id="pb_list">
 
<div id="Searchresult"><!-- コンテンツ表示領域 --></div>
<div id="Pagination" class="pagination"><!-- ページネーション表示 --></div>
</div>  <!-- /#pb_list -->

<div id="hiddenresult" style="display:none;">

<!-- コンテンツ枠 -->
<div class="result">
    <ul>
<?php $loop_count = 0; ?>
@foreach ($vod_yusho_record as $year => $year_race_list)
    @foreach ($year_race_list as $target_date => $today_race)
        @foreach ($today_race as $race_num => $item)
            @isset($syussou_array[$target_date][$race_num])
                {{--0ではなく、5の倍数のスライドの仕切りを挿入--}}
                @if($loop_count != 0 && $loop_count % 5 == 0)
                            <div class="clear"></div>
                        </ul>
                    </div>
                    <!-- コンテンツ枠 -->
                    <div class="result">
                        <ul>
                @endif

                <li class="race">
                    <a href="javascript:funcLink('/asp/kyogi/09/pc/play_b_mov/play_b_mov_{{ $target_date.$jyo.str_pad($race_num, 2, '0', STR_PAD_LEFT) }}.htm')">
                        <span class="day">{{date('Y/n/j',strtotime($target_date))}}
                            @if(mb_strpos($kaisai_name_list[$target_date],"SG") !== false )
                                <span class="gr_sg">SG</span></span>
                            @elseif(mb_strpos($kaisai_name_list[$target_date],"G1") !== false)
                                <span class="gr_g1">G1</span></span>
                            @elseif(mb_strpos($kaisai_name_list[$target_date],"G2") !== false)
                                <span class="gr_g2">G2</span></span>
                            @elseif(mb_strpos($kaisai_name_list[$target_date],"G3") !== false)
                                <span class="gr_g3">G3</span></span>
                            @else
                                <span class="gr_g0">一般</span></span>
                            @endif
                            
                            <p>
                                {{ $kaisai_name_list[$target_date] }}
                            </p>
                            
                            @if(mb_strpos($kaisai_name_list[$target_date],"SG") !== false )
                                <span class="gr_sg"></span></span>
                            @elseif(mb_strpos($kaisai_name_list[$target_date],"G1") !== false)
                                <span class="gr_g1"></span></span>
                            @elseif(mb_strpos($kaisai_name_list[$target_date],"G2") !== false)
                                <span class="gr_g2"></span></span>
                            @elseif(mb_strpos($kaisai_name_list[$target_date],"G3") !== false)
                                <span class="gr_g3"></span></span>
                            @else
                                <span class="gr_g0"></span></span>
                            @endif
                    </a>
                </li>
    
                <?php $loop_count++; ?>
            @endisset
        @endforeach
    @endforeach
@endforeach
        <div class="clear"></div>
    </ul>
</div>


</div><!--/#hiddenresult-->


<iframe src="/03play_b/play_b_mov_default.htm" frameborder="0" allowtransparency="true" scrolling="no" name="pb_mov" id="pb_mov" class="auto-height" allowfullscreen></iframe>  
            
</div><!--/#play_b_wrap-->
        
        
    

</div><!--/#main-->
    
</div><!--/#contents-->
</div><!--/#contents_wrap-->




<!--◆◆◆フッター◆◆◆-->
<div id="footer_wrap">
    <div id="footer">
    	<iframe src="/footer.htm" frameborder="0" allowtransparency="true" scrolling="no" name="footer"></iframe>
    </div><!--/#footer-->
</div><!--/#footer_wrap-->



</div><!--/#wrapper-->




</body>
</html>
