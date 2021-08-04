<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        

        <meta name="viewport" content="width=720px" />
    	<meta name="viewport" content="user-scalable=no" />

        <meta name="format-detection" content="telephone=no" />
        
        <title>Movie</title>
        
        <link rel="stylesheet" href="/sp/kyogi/css/reset.css" />
        

        {{--20200310 yoshino VOD改修 START--}}
        <style type="text/css">
        body {
            text-align : center;
            color : #fff;
        } 
        .myplayer {
            width: 720px;
            margin-left: auto;
            margin-right: auto;
        }
        .myplayer iframe {
        }
        </style>
    </head>
    <body bgcolor="#000000">
        <div class="myplayer">
            {{--VODPlayer_API(strVODType, strYD, strJyo, strRaceNum, strMovieWidth, strMovieHeight, "0")--}}
            <iframe src="https://jlcapi.jlc.ne.jp/sp_bb/Streamer/GetBoatraceReplay.php?VODType={{$strVODType}}&HoldingDay={{$target_date}}&StudiumNo={{$jyo}}&RaceNo={{$race_num}}" frameborder="0" scrolling="no" allowfullscreen="true" style="margin:0;padding:0;width:720px;height:480px;"></iframe>
        </div>
    </body>
</html>