<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<title>見どころ</title>

<link href="/kaisai/css/reset.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/common.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/hl.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="/kaisai/js/jquery-1.8.2.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="/asp/kyogi/09/pc/highlight/highlight.js"></script>
<script type="text/javascript">
function funcChangeDate( ){
	document.form.action = document.form.deashi.value;
	document.form.submit()
}
</script>
</head>

<body>


<div id="hl">
<script type="text/javascript">
	func_BACKNUMBER();
</script>
<div id="hl_head">
<div id="hl_head_l">{{ $kaisai_date_list[$target_date] }}</div><!--/#hl_head_l-->
<div id="hl_head_r">
{{$yoso_highlight->HEAD}}
</div><!--/#hl_head_r-->

<div class="clear"></div>
</div><!--/#hl_head-->



<div id="hl_main">
<!--▼本分 -->
<div id="hl_main_l">
<p>
    {{$yoso_highlight->TEXT}}
</p>


<!--▼推しレース -->
<div id="hl_oshi">

<img src="/kaisai/images/ic_oshi02.png" width="169" height="49" alt="" class="ic"/>
<ul class="oshi_race">
    @foreach ($yoso as $item)
        <li><a href="/asp/kyogi/09/pc/yoso01/yoso01{{ str_pad($item->race_num, 2, 0, STR_PAD_LEFT) }}_{{$target_date}}.htm" onclick="parent.func_syussobtn( 0 );">{{$item->RACE_NUM}}<span class="fs16">R</span></a></li>
    @endforeach
<div class="clear"></div>
</ul>  

</div><!--/#hl_oshi-->

</div><!--/#hl_main_l-->

<!--▼選手写真 -->
<div id="hl_main_r">
<ul id="hl_photo">
    @for($i=1;$i<4;$i++)
        <?php $prop_name = 'TOUBAN'.$i; ?>
        @if($yoso_highlight->$prop_name)
            @isset($fan_data_array[$yoso_highlight->$prop_name])
                <?php $fan_data = $fan_data_array[$yoso_highlight->$prop_name]; ?>
                <li class="racer_m"><img src="/asp/htmlmade/raceview/{{$yoso_highlight->$prop_name}}.jpg" width="180" height="205"/><span class="no">{{$yoso_highlight->$prop_name}}/{{$fan_data->Kyu}}/{{$fan_data->KenID}}</span><span class="name">{{$fan_data->NameK}}</span></li>
            @endisset
        @endif
    @endfor
    <div class="clear"></div>
</ul>

</div><!--/#hl_main_r-->

<div class="clear"></div>
</div><!--/#hl_main-->


</div><!--/#hl-->


</body>
</html>
