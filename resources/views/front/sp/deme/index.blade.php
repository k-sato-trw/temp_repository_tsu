
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

<title>ボートレース津｜出目・高配当ランキング</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,出目,高配当,払い戻し">
<meta name="Description" content="BOAT RACE津の出目（3連単、2連単）、3連単高配当金額をランキング形式で掲載しています。">

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<link href="/sp/css/reset.css" rel="stylesheet" type="text/css">
<link href="/sp/css/common.css" rel="stylesheet" type="text/css">
<link href="/sp/css/02deme.css" rel="stylesheet" type="text/css">


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

<!-- タブ -->
<script type="text/javascript" src="/sp/js/tabs.js"></script>


<!--tdカラー用-->
<script type="text/javascript">
$(document).ready(function(){
  // 偶数行にのみクラスを指定
  $("#main table").find("tr:even").addClass("even");
});
</script>


</head>



<body>


<div id="wrapper">

<!--◆◆◆header◆◆◆-->

<div id="header_wrap">
<div id="header">
<h1><a href="/sp/">BOATRACE 津 #09</a></h1>
</div><!--/#header-->
<h2>出目・高配当ランキング</h2>

<div id="nav">
	<script type="text/javascript">
                funcTsuMenu();
    </script>
</div><!--/#nav-->

</div><!--/#header_wrap-->


<!--◆◆◆コンテンツ◆◆◆-->	
<div id="main">
<!-- ▼▼▼本文開始▼▼▼ -->




<ul class="tabs">
<li class="b1"><a href="#rank_3ren" data-tor-smoothscroll="noSmooth"><span>3連単出目</span>ランキング</a></li>
<li class="b2"><a href="#rank_2ren" data-tor-smoothscroll="noSmooth"><span>2連単出目</span>ランキング</a></li>
<li class="b3"><a href="#rank_kohai" data-tor-smoothscroll="noSmooth"><span>高配当</span>ランキング</a></li>
<div class="clear"></div>
</ul>




    <!--■3連単ランキング■-->
    <div id="rank_3ren" class="tab_content">
        <p class="kikan">[集計期間］{{date('Y/n/j',strtotime($before_date))}}～{{date('Y/n/j',strtotime($after_date))}}</p>
        
        <table class="d1">
          <tbody>
            <tr>
              <th scope="col" class="th2">順<br>位</th>
              <th scope="col" class="kumi">組番</th>
              <th scope="col" class="sen">占有率</th>
              <th scope="col" class="haito">平均配当額</th>
            </tr>
            @foreach ($result_sanrentan_rank as $key => $item)
                @if($key >= 0 && $key < 30)
                    <tr>
                        <th scope="row" class="th2">{{$item['rank']}}</th>
                        <td class="kumi"><span class="w{{$item['deme1']}}">{{$item['deme1']}}</span>-<span class="w{{$item['deme2']}}">{{$item['deme2']}}</span>-<span class="w{{$item['deme3']}}">{{$item['deme3']}}</span></td>
                        <td class="sen">{{sprintf('%.1f',$item['senyu'])}}%</td>
                        <td class="haito">&nbsp;&nbsp;{{number_format($item['haito'])}}<span>円</span></td>
                    </tr>
                @endif
            @endforeach
          </tbody>
        </table>
      <div class="clear"></div>
      
      
    </div><!--/rank_3ren-->




    <!--■2連単出目ランキング■-->
    <div id="rank_2ren" class="tab_content">
    
     <p class="kikan">[集計期間］{{date('Y/n/j',strtotime($before_date))}}～{{date('Y/n/j',strtotime($after_date))}}</p>
        
        <table class="d1">
          <tbody>
            <tr>
              <th scope="col" class="th2">順<br>位</th>
              <th scope="col" class="kumi">組番</th>
              <th scope="col" class="sen">占有率</th>
              <th scope="col" class="haito">平均配当額</th>
            </tr>
            @foreach ($result_nirentan_rank as $key => $item)
                @if($key >= 0 && $key < 30)
                    <tr>
                        <th scope="row" class="th2">{{$item['rank']}}</th>
                        <td class="kumi"><span class="w{{$item['deme1']}}">{{$item['deme1']}}</span>-<span class="w{{$item['deme2']}}">{{$item['deme2']}}</span></td>
                        <td class="sen">{{sprintf('%.1f',$item['senyu'])}}%</td>
                        <td class="haito">&nbsp;&nbsp;{{number_format($item['haito'])}}<span>円</span></td>
                    </tr>
                @endif
            @endforeach
          </tbody>
        </table>
      <div class="clear"></div>
      
     
    </div><!--/rank_2ren-->





    <!--■高配当ランキング TOP10■-->
    <div id="rank_kohai" class="tab_content">
     <p class="kikan">[集計期間］{{date('Y/n/j',strtotime($haito_before_date))}}～{{date('Y/n/j',strtotime($after_date))}}</p>
        
<table class="ta_rank">
<tr>
    @foreach ($result_haito as $key => $item)
        <!-- ▼▼▼ -->
        <tr>
            <th colspan="3" class="rank" scope="col">{{ $item['rank'] }}位</th>
            </tr>
            <tr class="top">
            <td class="value">{{ number_format($item['record']->SANRENTAN_MONEY1) }}<span>円</span></td>
            <td class="date">{{ date('Y/n/j',strtotime($item['record']->TARGET_DATE)) }}［{{ $item['record']->RACE_NUMBER }}R］</td>
            <td class="kumi"><span class="w{{ substr($item['record']->SANRENTAN1,0,1) }}">{{ substr($item['record']->SANRENTAN1,0,1) }}</span>-<span class="w{{ substr($item['record']->SANRENTAN1,1,1) }}">{{ substr($item['record']->SANRENTAN1,1,1) }}</span>-<span class="w{{ substr($item['record']->SANRENTAN1,2,1) }}">{{ substr($item['record']->SANRENTAN1,2,1) }}</span></td>
            </tr>
            <tr>
            <td colspan="4" class="racer">
                <table class="ta_cyaku">
                    <tr>
                        <td rowspan="2" class="cyaku"><div>1着</div></td>
                        <td class="name">
                            @isset($item['kekka'][substr($item['record']->SANRENTAN1,0,1)])
                                <?php $touban1 = $item['kekka'][substr($item['record']->SANRENTAN1,0,1)]; ?>
                                @isset($fan_data_array[$touban1])
                                    {{ $fan_data_array[$touban1] }}
                                @endisset
                            @endisset
                        </td>
                        <td rowspan="2" class="cyaku"><div>2着</div></td>
                        <td class="name">
                            @isset($item['kekka'][substr($item['record']->SANRENTAN1,1,1)])
                                <?php $touban2 = $item['kekka'][substr($item['record']->SANRENTAN1,1,1)]; ?>
                                @isset($fan_data_array[$touban2])
                                    {{ $fan_data_array[$touban2] }}
                                @endisset
                            @endisset
                        </td>
                        <td rowspan="2" class="cyaku"><div>3着</div></td>
                        <td class="name">
                            @isset($item['kekka'][substr($item['record']->SANRENTAN1,2,1)])
                                <?php $touban3 = $item['kekka'][substr($item['record']->SANRENTAN1,2,1)]; ?>
                                @isset($fan_data_array[$touban3])
                                    {{ $fan_data_array[$touban3] }}
                                @endisset
                            @endisset
                        </td>
                    </tr>
                    <tr>
                        <td class="number">({{ $touban1 ?? "" }})</td>
                        <td class="number">({{ $touban2 ?? "" }})</td>
                        <td class="number">({{ $touban3 ?? "" }})</td>
                    </tr>
                </table>
            </td>
        </tr>
    @endforeach
</table>        


        <div class="clear"></div>
        
       
    </div><!--/rank_kohai-->







</div><!--/#main-->



<!--◆◆◆ページアップ◆◆◆-->
<div id="page_up"><a href="#wrapper">UP</a></div>
<div class="clear"></div>



<!--◆◆◆フッター◆◆◆-->
<div id="footer_wrap">
<div id="ft_logo">
<img src="/sp/images/sp_ft_logo.png" width="342" height="50" alt=""/></div>
<div id="ft_credit">&copy;BOAT RACE TSU All rights reserved.</div></div>


</div><!--/#wrapper-->

</body>
</html>
