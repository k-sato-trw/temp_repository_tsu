<!doctype html>
<html>
<head>
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<script type="text/javascript">
	function reloadTop(){
		parent.document.location.href='/asp/kyogi/09/pc/race_movie.htm';
	}
	function reloadSelf(){
		document.location.href='/asp/kyogi/09/pc/race_movie_reload.htm';
	}
</script>


</head>

<body>
    @if($live_flg == 1)
        {{--ライブ放送--}}
        <script type="text/javascript">
            setTimeout('reloadSelf()',60000);
        </script>
    @elseif($live_flg == 2)
        {{--ライブ実況前--}}
        <script type="text/javascript">
            setTimeout('reloadSelf()',60000);
        </script>
    @elseif($live_flg == 3)
        {{--ライブ終了--}}
        <script type="text/javascript">
            setTimeout('reloadTop()',60000);
        </script>
    @elseif($live_flg == 4)
        {{--中止--}}
        <script type="text/javascript">
            setTimeout('reloadTop()',60000);
        </script>
    @else
        {{--非開催--}}
        
    @endif


</body>

</html>
