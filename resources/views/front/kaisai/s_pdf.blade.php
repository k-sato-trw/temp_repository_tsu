<!doctype html>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_pc.js"></script>
<meta charset="UTF-8">
<title>出走表&amp;前日記者予想PDF</title>

<link href="/kaisai/css/reset.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/common.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/s_pdf.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

</head>

<body>

<!--▼▼▼s_pdf main-->
<div id="s_pdf_main">

<h2>出走表PDF</h2>

@if(!$file_name_list && !$yoso_file_name)
    {{--データなしの場合--}}
    <table class="ta_kyogi">
        <tr>
        <td class="nodata">ただいまデータはございません</td>
        </tr>
    </table>
@elseif($chushi_junen)
    <table class="ta_kyogi">
        <tr>
        @if($chushi_junen->中止開始レース番号 == 0)
            <td class="nodata">{{date('n/j',strtotime($target_date))}}の開催は中止となりました</td>
        @else
            <td class="nodata">第{{$chushi_junen->中止開始レース番号}}レース以降は中止となりました</td>
        @endif
        </tr>
    </table>
@else

    <div id="s_pdf">
        <div id="s_pdf_l">
        
        <div id="header">出走表は前日午後７時頃、前日記者予想はサイトに予想が公開され次第更新されます。</div><!-- / header -->
        <div id="date">{{$display_date}} {{date('n/j',strtotime($target_date))}}</div><!-- / date -->
        <div id="title">{{$kaisai_master->開催名称}}
        </div><!-- / title -->
        
        </div><!-- / s_pdf_l -->
        
        <div id="come">
        <div id="come_l">
        <h3>出走表＆前日記者予想PDFについて</h3>
        </div><!-- / come_l -->
        
        <div id="come_r">
        <ul>
        <li>・出走表PDFは、レース開催日前日の午後7時頃から当日の午後7時頃までご覧いただけます</li>
        <li>・前日記者予想PDFは、レース開催日前日の予想公開後から翌日の予想公開前までご覧いただけます</li>
        <li>・最新データの更新が諸事情により遅れる場合があります。あらかじめご了承ください</li>
        <li>・記載している情報（発売締切予定時刻、周回数、モーター、ボート、出走）は予告なしに変更する場合があります<br>
        あらかじめご了承ください</li>
        <li>・インターネット接続環境等により、PDFファイルが開くまで多少時間がかかる場合があります</li>
        </ul>
        </div><!-- / come_r -->
        <div class="clear"></div>
        </div><!-- / come -->
        
        <div id="s_pdf_r">
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

            </ul><!-- download end -->
        </div><!-- / s_pdf_r -->
            
        <div id="y_pdf">
            <ul class="download">
                @isset($yoso_file_name)
                    <li class="p3"><a href="{{ config('const.PDF_PATH.YOSO_PDF').$yoso_file_name }}" target="_blank">前日記者予想</a></li>
                @else
                    <li class="p3">前日記者予想</li>
                @endisset
            </ul>
        </div><!-- / y_pdf -->
                
    </div><!-- / s_pdf -->
            
    <div id="adobe_reader">
    <a href="http://get.adobe.com/jp/reader/" target="_blank"><img src="/kaisai/images/get_adobe_reader.png" width="158" height="39"></a>
    <p>閲覧にはAdobe Readerが必要です。</p>
    </div><!-- / adobe_reader -->
    
    <div class="clear"></div>
@endif

</div><!--main end-->

</body>
</html>
