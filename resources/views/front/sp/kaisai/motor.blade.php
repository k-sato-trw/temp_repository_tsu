
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

<title>ボートレース津｜モーター抽選結果&amp;前検タイム</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,モーター,ボート,使用者,前検タイム">
<meta name="Description" content="BOAT RACE津でのモーター抽選結果を、モーターの2連率順にランキング形式で掲載。さらに、過去の使用者や着順成績もご覧いただけます。">


<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href="/sp/css/reset.css" rel="stylesheet" type="text/css">
<link href="/sp/css/common.css" rel="stylesheet" type="text/css">
<link href="/sp/css/motor.css" rel="stylesheet" type="text/css">
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

<!---タブ--->
<script type="text/javascript" src="/sp/js/tabs.js"></script>
<script type="text/javascript" src="/asp/kyogi/09/pc/Jsinfo.js"></script>

</head>


<body>


<div id="wrapper">



<!--◆◆◆header◆◆◆-->

<div id="header_wrap">
<div id="header">
<h1><a href="/sp/">BOATRACE 津 #09</a></h1>
</div><!--/#header-->
<h2>モーター抽選結果&amp;前検タイム</h2>

<div id="nav">
<script type="text/javascript">
            funcTsuMenu();
            </script>
</div><!--/#nav-->
</div><!--/#header_wrap-->



<!--◆◆◆コンテンツ◆◆◆-->


<div id="notice">データは毎節、前検日の夕方に更新。</div><!-- /#notice -->
<div id="lead">
<span class="cl01">◆</span>2連率(選手責任外含まない)、優出、優勝集計<br>　＞＞2020/9/4～2021/6/12
<br>
<span class="cl01">◆</span>着順成績＞＞<span class="jun">○</span>：準優出、<span class="yu">●</span>：優出

</div><!-- /#lead -->



<!-- ボタン -->
<div id="table_btn">
<ul class="tabs">
<li class="st00"><a href="#tab1" data-tor-smoothscroll="noSmooth">使用者</a></li>
<li class="st01"><a href="#tab2" data-tor-smoothscroll="noSmooth">1節前</a></li>
<li class="st02"><a href="#tab3" data-tor-smoothscroll="noSmooth">2節前</a></li>
<li class="st03"><a href="#tab4" data-tor-smoothscroll="noSmooth">3節前</a></li>
</ul>
<div class="clear"></div>
</div>



<div id="motor">
<div id="motor_l">

<!-- 表組header -->
<table id="motor_head01">
<colgroup span="1" width="50"></colgroup>
<colgroup span="1" width="74"></colgroup>
<colgroup span="1" width="98"></colgroup>
<colgroup span="1" width="74"></colgroup>
<colgroup span="1" width="74"></colgroup>

<tr>
<th>順<br>位</th>
@if($sort == 1)
    <th class="select">No.<br>▼</th>
@else
    <th><a href="/asp/kyogi/09/sp/motor/motor01.htm">No.<br>▼</a></th>
@endif
@if($sort == '0')
    <th class="select">2連率<br>▼</th>
@else
    <th><a href="/asp/kyogi/09/sp/motor/motor.htm">2連率<br>▼</a></th>
@endif
<th>優出</th>
<th>優勝</th>
</tr></table>
  

<!-- 表組 --> 
<table id="motor01">
<colgroup span="1" width="50"></colgroup>
<colgroup span="1" width="74"></colgroup>
<colgroup span="1" width="98"></colgroup>
<colgroup span="1" width="74"></colgroup>
<colgroup span="1" width="74"></colgroup>
    @foreach($motor_list_array as $item)
        <tr>
            <td class="rank">@if(in_array($sort,[0,2])){{$item['rank']}}@else{{'-'}}@endif</td>
            <td class="@if($sort == 1) select2 @endif number">
                <script type="text/javascript">
                    func_MotorRank('{{$kaisai_master->開始日付}}' , '{{ (int)$item['record']->MOTOR_NO }}' );
                </script>
            </td>
            <td class="@if($sort == 0) select2 @endif ">
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
        </tr>
    @endforeach
</table>

</div><!-- /#motor_l -->


<div id="motor_r">

<!-- ▼▼▼使用者▼▼▼ -->

<div id="tab1" class="tab_content">
<!-- 表組header -->
<table id="motor_head02">
<colgroup span="1" width="206"></colgroup>
<colgroup span="1" width="98"></colgroup>

<tr>
<th id="mae04">使用者</th>
@if($sort == 2)
    <th class="select">前検<br>タイム<br>▼</th>
@else
    <th><a href="/asp/kyogi/09/sp/motor/motor02.htm">前検<br>タイム<br>▼</a></th>
@endif
</tr></table>
  
 
<!-- 表組 --> 
<table id="motor02">
<colgroup span="1" width="206"></colgroup>
<colgroup span="1" width="98"></colgroup>
@foreach($motor_list_array as $item)
    <tr>        
        <td><span class="name">{{$item['record']->SENSYU_NAME}}</span><span class="data">{{$item['record']->TOUBAN}}({{$item['record']->KYU_BETU}})</span></td>
        <td class="@if($sort == 2) select2 @endif ">{{$item['record']->ZENKEN_TIME}}</td>
    </tr>
@endforeach
</table>
</div><!-- /tab1 -->


<!-- ▼▼▼前節使用者▼▼▼ -->
<div id="tab2" class="tab_content">
<!-- 表組header -->
<table id="motor_head02">
<colgroup span="1" width="305"></colgroup>

<tr>
<th id="mae01"><span class="name">1節前使用者</span><span class="data">着順成績</span></th>
</tr></table>  
  
 
<!-- 表組 --> 
<table id="motor02">
<colgroup span="1" width="305"></colgroup>
@foreach($motor_list_array as $item)
    @isset($item['motor_rireki_3'][1])
        <tr>
            <td><span class="name">{{$item['motor_rireki_3'][1]['sensyu_name'] ?? "-"}}@if($item['motor_rireki_3'][1]['sex'] == 2)<img src="/sp/kyogi/images/ico_lady.png" width="18" class="i_lady">@endif({{$item['motor_rireki_3'][1]['kyu_betu'] ?? "-"}})</span><span class="data">{!!$item['motor_rireki_3'][1]['tyakujun'] ?? "---"!!}</span></td>
        </tr>
    @else
        <tr><td><span class="name">使用なし</span><span class="data">---</span></td></tr>
    @endisset
@endforeach
</table>
</div><!-- /tab2 -->


<!-- ▼▼▼2節前使用者▼▼▼ -->
<div id="tab3" class="tab_content">
<!-- 表組header -->
<table id="motor_head02">
<colgroup span="1" width="305"></colgroup>

<tr>
<th id="mae02"><span class="name">2節前使用者</span><span class="data">着順成績</span></th>
</tr></table>  
  
 
<!-- 表組 --> 
<table id="motor02">
<colgroup span="1" width="305"></colgroup>
@foreach($motor_list_array as $item)
    @isset($item['motor_rireki_3'][2])
        <tr>
            <td><span class="name">{{$item['motor_rireki_3'][2]['sensyu_name'] ?? "-"}}@if($item['motor_rireki_3'][2]['sex'] == 2)<img src="/sp/kyogi/images/ico_lady.png" width="18" class="i_lady">@endif({{$item['motor_rireki_3'][2]['kyu_betu'] ?? "-"}})</span><span class="data">{!!$item['motor_rireki_3'][2]['tyakujun'] ?? "---"!!}</span></td>
        </tr>
    @else
        <tr><td><span class="name">使用なし</span><span class="data">---</span></td></tr>
    @endisset
@endforeach
</table>
</div><!-- /tab3 -->

<!-- ▼▼▼3節前使用者▼▼▼ -->
<div id="tab4" class="tab_content">
<!-- 表組header -->
<table id="motor_head02">
<colgroup span="1" width="305"></colgroup>

<tr>
<th id="mae03"><span class="name">3節前使用者</span><span class="data">着順成績</span></th>
</tr></table>  
  
 
<!-- 表組 --> 
<table id="motor02">
<colgroup span="1" width="305"></colgroup>
@foreach($motor_list_array as $item)
    @isset($item['motor_rireki_3'][3])
        <tr>
            <td><span class="name">{{$item['motor_rireki_3'][3]['sensyu_name'] ?? "-"}}@if($item['motor_rireki_3'][3]['sex'] == 2)<img src="/sp/kyogi/images/ico_lady.png" width="18" class="i_lady">@endif({{$item['motor_rireki_3'][3]['kyu_betu'] ?? "-"}})</span><span class="data">{!!$item['motor_rireki_3'][3]['tyakujun'] ?? "---"!!}</span></td>
        </tr>
    @else
        <tr><td><span class="name">使用なし</span><span class="data">---</span></td></tr>
    @endisset
@endforeach
</table>
</div><!-- /tab4 -->


</div><!-- /#motor_r -->
<div class="clear"></div>
</div>

<!--◆◆◆ページアップ◆◆◆-->
<div id="page_up"><a href="#wrapper">UP</a></div>
<div class="clear"></div>




<!--◆◆◆フッター◆◆◆-->
<div id="footer_wrap">
<div id="ft_logo">BOAT RACE TSU</div>
<div id="ft_credit">&copy;BOAT RACE TSU All rights reserved.</div></div>



</div><!--/#wrapper-->




</body>
</html>
