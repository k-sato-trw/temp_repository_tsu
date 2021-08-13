<!doctype html>
<html>
<head>
<script type="text/javascript" src="/asp/ga_tag/ga_tag_09_pc.js"></script>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">

<title>ボートレース津｜出目・高配当ランキング</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,出目,高配当,払い戻し">
<meta name="Description" content="BOAT RACE津の出目（3連単、2連単）、3連単高配当金額をランキング形式で掲載しています。">
<meta name="viewport" content="width=1280px">

<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/02deme.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/js/common.js"></script>

<!--コンテンツメニューjs-->
<script type="text/javascript" src="/js/contents_navi_slide.js"></script>
<script type="text/javascript" src="/js/contents_navi_main.js"></script>

<!--ヘッダーメニューjs-->
<script type="text/javascript" src="/js/header_navi.js"></script>

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




<div id="header_wrap">
    <div id="header">
    <div id="header_img">
    	
        <h1><a href="/">BOATRACE 津 #09</a></h1>
        <h2>出目・高配当ランキング</h2>
        
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
	
    
    <!--■3連単ランキング■-->
    <div id="rank_3ren">
		<dl class="ttl">
            <dt><span>3連単出目</span>ランキング</dt>
            <dd>[集計期間］{{date('Y/n/j',strtotime($before_date))}}～{{date('Y/n/j',strtotime($after_date))}}</dd>
        </dl>
        
        <table class="d1">
          <tbody>
            <tr>
              <th scope="col" class="th2">順位</th>
              <th scope="col" class="kumi">組番</th>
              <th scope="col" class="sen">占有率</th>
              <th scope="col" class="haito">平均配当額</th>
            </tr>
            @foreach ($result_sanrentan_rank as $key => $item)
                @if($key < 10)
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
        
        <table class="d2">
          <tbody>
            <tr>
              <th scope="col" class="th2">順位</th>
              <th scope="col" class="kumi">組番</th>
              <th scope="col" class="sen">占有率</th>
              <th scope="col" class="haito">平均配当額</th>
            </tr>
            @foreach ($result_sanrentan_rank as $key => $item)
                @if($key >= 10 && $key < 20)
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
        
        <table class="d3">
          <tbody>
            <tr>
              <th scope="col" class="th2">順位</th>
              <th scope="col" class="kumi">組番</th>
              <th scope="col" class="sen">占有率</th>
              <th scope="col" class="haito">平均配当額</th>
            </tr>
            @foreach ($result_sanrentan_rank as $key => $item)
                @if($key >= 20 && $key < 30)
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
    <div id="rank_2ren">
		<dl class="ttl">
            <dt><span>2連単出目</span>ランキング</dt>
            <dd>[集計期間］{{date('Y/n/j',strtotime($before_date))}}～{{date('Y/n/j',strtotime($after_date))}}</dd>
        </dl>
        
        <table class="d1">
          <tbody>
            <tr>
              <th scope="col" class="th2">順位</th>
              <th scope="col" class="kumi">組番</th>
              <th scope="col" class="sen">占有率</th>
              <th scope="col" class="haito">平均配当額</th>
            </tr>
            @foreach ($result_nirentan_rank as $key => $item)
                @if($key >= 0 && $key < 10)
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
        
        <table class="d2">
          <tbody>
            <tr>
              <th scope="col" class="th2">順位</th>
              <th scope="col" class="kumi">組番</th>
              <th scope="col" class="sen">占有率</th>
              <th scope="col" class="haito">平均配当額</th>
            </tr>
            @foreach ($result_nirentan_rank as $key => $item)
                @if($key >= 10 && $key < 20)
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
        
        <table class="d3">
          <tbody>
            <tr>
              <th scope="col" class="th2">順位</th>
              <th scope="col" class="kumi">組番</th>
              <th scope="col" class="sen">占有率</th>
              <th scope="col" class="haito">平均配当額</th>
            </tr>
            @foreach ($result_nirentan_rank as $key => $item)
                @if($key >= 20 && $key < 30)
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
    <div id="rank_kohai">
		<dl class="ttl">
        	<dt><span>高配当</span>ランキング</dt>
            <dd>[集計期間］{{date('Y/n/j',strtotime($haito_before_date))}}～{{date('Y/n/j',strtotime($after_date))}}</dd>
        </dl>
        
        <table class="d1">
          <tbody>
            <tr>
              <th scope="col" class="th2">順位</th>
              <th scope="col" class="haito">配当金</th>
              <th scope="col" class="date">開催日</th>
              <th scope="col" class="race">レース</th>
              <th scope="col" class="kumi">勝舟</th>
              <th colspan="3" class="chaku" scope="col">1着</th>
              <th colspan="3" class="chaku" scope="col">2着</th>
              <th colspan="3" class="chaku right" scope="col">3着</th>
              </tr>

            @foreach ($result_haito as $key => $item)
                <tr>
                    <th scope="row" class="th2">{{ $item['rank'] }}</th>
                    <td class="haito">{{ number_format($item['record']->SANRENTAN_MONEY1) }}<span>円</span></td>
                    <td class="date">{{ date('Y/n/j',strtotime($item['record']->TARGET_DATE)) }}</td>
                    <td class="race">{{ $item['record']->RACE_NUMBER }}R</td>
                    <td class="kumi"><span class="w{{ substr($item['record']->SANRENTAN1,0,1) }}">{{ substr($item['record']->SANRENTAN1,0,1) }}</span>-<span class="w{{ substr($item['record']->SANRENTAN1,1,1) }}">{{ substr($item['record']->SANRENTAN1,1,1) }}</span>-<span class="w{{ substr($item['record']->SANRENTAN1,2,1) }}">{{ substr($item['record']->SANRENTAN1,2,1) }}</span></td>
                    <td class="waku"><span class="w{{ substr($item['record']->SANRENTAN1,0,1) }}">{{ substr($item['record']->SANRENTAN1,0,1) }}</span></td>
                    <td class="name">
                        @isset($item['kekka'][substr($item['record']->SANRENTAN1,0,1)])
                            <?php $touban1 = $item['kekka'][substr($item['record']->SANRENTAN1,0,1)]; ?>
                            @isset($fan_data_array[$touban1])
                                {{ $fan_data_array[$touban1] }}
                            @endisset
                        @endisset
                    </td>
                    <td class="number">({{ $touban1 ?? "" }})</td>
                    <td class="waku"><span class="w{{ substr($item['record']->SANRENTAN1,1,1) }}">{{ substr($item['record']->SANRENTAN1,1,1) }}</span></td>
                    <td class="name">
                        @isset($item['kekka'][substr($item['record']->SANRENTAN1,1,1)])
                            <?php $touban2 = $item['kekka'][substr($item['record']->SANRENTAN1,1,1)]; ?>
                            @isset($fan_data_array[$touban2])
                                {{ $fan_data_array[$touban2] }}
                            @endisset
                        @endisset
                    </td>
                    <td class="number">({{ $touban2 ?? "" }})</td>
                    <td class="waku"><span class="w{{ substr($item['record']->SANRENTAN1,2,1) }}">{{ substr($item['record']->SANRENTAN1,2,1) }}</span></td>
                    <td class="name">
                        @isset($item['kekka'][substr($item['record']->SANRENTAN1,2,1)])
                            <?php $touban3 = $item['kekka'][substr($item['record']->SANRENTAN1,2,1)]; ?>
                            @isset($fan_data_array[$touban3])
                                {{ $fan_data_array[$touban3] }}
                            @endisset
                        @endisset
                    </td>
                    <td class="number">({{ $touban3 ?? "" }})</td>
                </tr>
            @endforeach
            
          </tbody>
        </table>
        <div class="clear"></div>
    </div><!--/rank_kohai-->


    
    <div id="page_top"><a href="#wrapper">UP</a></div>
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
