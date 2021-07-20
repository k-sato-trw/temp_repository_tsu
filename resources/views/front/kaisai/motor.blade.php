
<!doctype html>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_pc.js"></script>
<meta charset="UTF-8">
<title>モーター抽選結果＆前検タイム</title>

<link href="/kaisai/css/reset.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/common.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/motor.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/kaisai/js/jquery-1.8.2.min.js"></script>

<script type="text/javascript" src="/asp/kyogi/09/pc/Jsinfo.js"></script>

<!--テーブル-->
<script type="text/javascript" src="/kaisai/js/jquery.table_color.js"></script>
<script type="text/javascript" src="/kaisai/js/jquery.tablehover.js"></script>
<script type="text/javascript">
<!--
$(function() {
	$('table').tableHover ({colClass: 'hover', ignoreCols: [1], rowClass: 'hoverrow', cellClass: 'hovercell'});
});
//-->
</script>

</head>

<body>

<!--▼▼▼motor_main-->
<div id="motor_main"> 
 
<h2>モーター抽選結果＆前検タイム</h2>

<?php $str_array = ['','モーターのNo','使用者の登番','前検タイム','モーターの2連率','モーターの優出回数','モーターの優勝回数',]; ?>
<div id="lead">
{{ $str_array[$sort] }}順に掲載　｜　2連率(選手責任外含まない)、優出、優勝集計 ＞＞ {{ date('Y/n/j',strtotime($motor_change_race->開始日付)) }}～{{ date('Y/n/j',strtotime($before_race->終了日付)) }}
　｜　着順成績 ＞＞ <span class="jun">○</span>：準優出、<span class="yu">●</span>：優出
</div>



<div id="table_wrapper">


<div id="headerFixedBox">
<table id="motor_head">
<colgroup span="1" width="25"></colgroup>
<colgroup span="1" width="25"></colgroup>
<colgroup span="1" width="90"></colgroup>
<colgroup span="1" width="55"></colgroup>
<colgroup span="1" width="55"></colgroup>
<colgroup span="2" width="25"></colgroup>
<colgroup span="3" width="130"></colgroup>
<tr>
  <th>順<br>位</th>
    @if($sort == 1)
        <th class="select">No.<span class="sort"></span></th>
    @else
        <th><a href="/asp/kyogi/09/pc/motor/motor01.htm">No.<span class="sort"></span></a></th>
    @endif
    @if($sort == 2)
        <th class="select">使用者<span class="sort"></span></th>
    @else
        <th><a href="/asp/kyogi/09/pc/motor/motor02.htm">使用者<span class="sort"></span></a></th>
    @endif
    @if($sort == 3)
        <th class="select">前検タイム<span class="sort"></span></th>
    @else
        <th><a href="/asp/kyogi/09/pc/motor/motor03.htm">前検タイム<span class="sort"></span></a></th>
    @endif
    @if($sort == 4)
        <th class="select">2連率<span class="sort"></span></th>
    @else
        <th><a href="/asp/kyogi/09/pc/motor/motor04.htm">2連率<span class="sort"></span></a></th>
    @endif
    @if($sort == 5)
        <th class="select">優出<span class="sort"></span></th>
    @else
        <th><a href="/asp/kyogi/09/pc/motor/motor05.htm">優出<span class="sort"></span></a></th>
    @endif
    @if($sort == 6)
        <th class="select">優勝<span class="sort"></span></th>
    @else
        <th><a href="/asp/kyogi/09/pc/motor/motor06.htm">優勝<span class="sort"></span></a></th>
    @endif
  <th id="mae01"><span class="name"><span class="st">
１節前</span>使用者</span><span class="data_th">着順成績</span></th>
  <th id="mae02"><span class="name"><span class="st">２節前</span>使用者</span><span class="data_th">着順成績</span></th>
  <th id="mae03"><span class="name"><span class="st">３節前</span>使用者</span><span class="data_th">着順成績</span></th>
</tr>
</table>
</div>

<table id="motor">
<colgroup span="1" width="24"></colgroup>
<colgroup span="1" width="25"></colgroup>
<colgroup span="1" width="90"></colgroup>
<colgroup span="1" width="55"></colgroup>
<colgroup span="1" width="55"></colgroup>
<colgroup span="2" width="25"></colgroup>
<colgroup span="3" width="130"></colgroup>
    @foreach($motor_list_array as $item)
        <tr>
            <td class="rank">@if(in_array($sort,[3,4,5,6])){{$item['rank']}}@else{{'-'}}@endif</td>
            <td class="m_no">
                <script type="text/javascript">
                    func_MotorRank('{{$kaisai_master->開始日付}}' , '{{ (int)$item['record']->MOTOR_NO }}' );
                </script>
            </td>
            <td>{{$item['record']->SENSYU_NAME}}<span class="no">{{$item['record']->TOUBAN}}({{$item['record']->KYU_BETU}})</span></td>
            <td>{{$item['record']->ZENKEN_TIME}}</td>
            <td>
                @if($motor_change_race->開始日付 == $kaisai_master->開始日付)
                    -
                @elseif(!isset($item['motor_rireki_3'][1]))
                    -
                @else
                    {{$item['record']->MOTOR_NIRENRITU}}%
                @endif
            </td>
            <td>{{$item['record']->YUSHUTU_CNT}}</td>
            <td>{{$item['record']->YUSHO_CNT}}</td>
            <td><span class="name">{{$item['motor_rireki_3'][1]['sensyu_name'] ?? "-"}}({{$item['motor_rireki_3'][1]['kyu_betu'] ?? "-"}})</span><span class="data">{!!$item['motor_rireki_3'][1]['tyakujun'] ?? "---"!!}</span></td>
            <td><span class="name">{{$item['motor_rireki_3'][2]['sensyu_name'] ?? "-"}}({{$item['motor_rireki_3'][2]['kyu_betu'] ?? "-"}})</span><span class="data">{!!$item['motor_rireki_3'][2]['tyakujun'] ?? "---"!!}</span></td>
            <td><span class="name">{{$item['motor_rireki_3'][3]['sensyu_name'] ?? "-"}}({{$item['motor_rireki_3'][3]['kyu_betu'] ?? "-"}})</span><span class="data">{!!$item['motor_rireki_3'][3]['tyakujun'] ?? "---"!!}</span></td>
        </tr>
    @endforeach

</table>


</div>

</div><!--/motor_main-->


</body>
</html>
