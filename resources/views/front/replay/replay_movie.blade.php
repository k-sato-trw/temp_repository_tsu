
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
<link rel="stylesheet" href="/asp/videoplayer/css/reset.css"/>
<style type="text/css">
.myplayer {
}
.myplayer iframe {
}
</style>
</head>

<body>
<div class="myplayer">
<iframe src="https://jlcapi.jlc.ne.jp/new_bb/Streamer/GetBoatraceReplay.php?VODType={{$type}}&HoldingDay={{ substr($movie_id ,0,8) }}&StudiumNo=09&RaceNo={{ substr($movie_id ,-2) }}" frameborder="0" scrolling="no" allowfullscreen="true" style="margin:0;padding:0;width:720px;height:405px;"></iframe>
</div>
</body>
</html>
