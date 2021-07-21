<!doctype html>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_sp.js"></script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="user-scalable=no">

<title>ボートレース津｜出走表&amp;前日記者予想PDF</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,出走表PDF,出走表,前日記者予想PDF,前日予想,出場メンバー">
<meta name="Description" content="BOAT RACE津が開催するレースの出走表と前日記者予想をPDF版で掲載しています。">

<link href="/sp/css/reset.css" rel="stylesheet" type="text/css">
<link href="/sp/css/common.css" rel="stylesheet" type="text/css">
<link href="/sp/css/pdf.css" rel="stylesheet" type="text/css">
<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/sp/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/sp/js/common.js"></script>

<!-- ビューポート設定 -->
<script type="text/javascript" src="/sp/js/monaca.viewport.js"></script>
<script>
monaca.viewport({
    width : 720
});
</script>


<!--ヘッダーメニューjs-->
<script type="text/javascript" src="/sp/js/header_navi.js"></script>

</head>

<body>
<div id="wrapper">

<!--◆◆◆header◆◆◆-->

<div id="header_wrap">
<div id="header">
<h1><a href="/sp/">BOATRACE 津 #09</a></h1>
</div><!--/#header-->
<h2>出走表&amp;前日記者予想PDF</h2>

<div id="nav">
<script type="text/javascript">
            funcTsuMenu();
            </script>
</div><!--/#nav-->
</div><!--/#header_wrap-->

<!--◆◆◆コンテンツ◆◆◆-->	
@if(!$file_name_list && !$yoso_file_name)
    {{--データなしの場合--}}
    <div id="nodata">ただいまデータはございません</div>
@elseif($chushi_junen)

    @if($chushi_junen->中止開始レース番号 == 0)
        <div id="nodata">{{date('n/j',strtotime($target_date))}}の開催は中止となりました</div>
    @else
        <div id="nodata">第{{$chushi_junen->中止開始レース番号}}レース以降は中止となりました</div>
    @endif
@else

    <div id="main">
        <!-- ▼▼▼本文開始▼▼▼ -->
        
        <div id="lead">
            ボートレース津が開催するレースの出走表と前日記者予想を、PDFファイルのデータでご覧いただけます。<br>
        <span class="red">※最新データは、開催日の前夜（出走表→午後7時頃、前日記者予想→サイトに予想が公開され次第）に更新予定です。</span>
        </div><!-- /#lead -->
        
        <!-- ▼▼▼PDF▼▼▼ -->
        
        <div id="s_pdf">
        <div id="date">{{$display_date}} {{date('n/j',strtotime($target_date))}}</div><!-- / date -->
        
        <div id="title">{{$kaisai_master->開催名称}}
        </div><!-- / title -->
        
        <div class="green"></div>
        
        <div id="dl">
            <ul class="download">
                @isset($file_name_list[0])
                    <li class="p1"><a href="{{ config('const.PDF_PATH.BANGUMIHYO').$file_name_list[0] }}" target="_blank">表紙+裏面</a></li>
                @else
                    <li class="p1">表紙+裏面</li>
                @endisset
                @isset($file_name_list[1])
                    <li class="p2"><a href="{{ config('const.PDF_PATH.BANGUMIHYO').$file_name_list[1] }}" target="_blank">中面（1R～12R）</a></li>
                @else
                    <li class="p2">中面（1R～12R）</li>
                @endisset
            </ul>
        </div> <!-- / dl -->
            
        <div class="green"></div>
            
        <div id="y_pdf">
            <ul class="download yoso">
                @isset($yoso_file_name)
                    <li class="p3"><a href="{{ config('const.PDF_PATH.YOSO_PDF').$yoso_file_name }}" target="_blank">前日記者予想</a></li>
                @else
                    <li class="p3">前日記者予想</li>
                @endisset
            </ul>
        </div><!-- / y_pdf -->

        <div class="clear"></div>
		
		<div id="pds_sv">【出走表&amp;前日記者予想PDFについて】</div>
		<div id="notice">
            <ul>
                <li>出走表PDFは、レース開催日前日の午後7時頃から当日の午後7時頃までご覧いただけます</li>
                <li>前日記者予想PDFは、レース開催日前日の予想公開後から翌日の予想公開前までご覧いただけます</li>
                <li>最新データの更新が諸事情により遅れる場合があります。あらかじめご了承ください</li>
                <li>記載している情報（発売締切予定時刻、周回数、モーター、ボート、出走）は予告なしに変更する場合があります。あらかじめご了承ください</li>
                <li>インターネット接続環境等により、PDFファイルが開くまで多少時間がかかる場合があります</li>
            </ul>
		
		</div><!-- /#notice -->
		
		
		<div id="ai_btn">
		
		    <ul>
		    <li><a href="http://www.adobe.com/jp/products/acrobat/readstep2.html" target="_blank">Adobe Acrobat Reader</a></li>
		    </ul>
		</div><!-- /#ai_btn -->
		
		
		</div><!--/#s_pdf-->
		
		</div><!--/#main-->
@endif


<!--◆◆◆フッター◆◆◆-->
<div id="footer_wrap">
<div id="ft_logo">BOAT RACE TSU</div>
<div id="ft_credit">&copy;BOAT RACE TSU All rights reserved.</div></div>


</div><!--/#wrapper-->

</body>
</html>
