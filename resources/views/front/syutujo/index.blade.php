@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">

<title>ボートレース津｜出場予定選手</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,レース展望,ピックアップレーサー,出場予定選手">
<meta name="Description" content="BOAT RACE津が開催するレースごとの展望や出場予定選手を掲載しています。">
<meta name="viewport" content="width=1280px">

<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/01tenbo.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/js/common.js"></script>

<!--コンテンツメニューjs-->
<script type="text/javascript" src="/js/contents_navi_slide.js"></script>
<script type="text/javascript" src="/js/contents_navi_main.js"></script>

<!--ヘッダーメニューjs-->
<script type="text/javascript" src="/js/header_navi.js"></script>

<!--stickybtn-->
<script type="text/javascript" src="/js/jquery.sticky-kit.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  return $("#tenbo_nav, #main").stick_in_parent({
    offset_top: 10
  });
});
</script>


<!--テーブル列クラス付与-->
<script type="text/javascript" src="/js/jquery.tableCols.js"></script>


<!--テーブルロールオーバー-->
<script type="text/javascript" src="/js/jquery.tablehover.js"></script>
<script type="text/javascript">
$(function() {
	$('#ta_sensyu').tableHover ({colClass: 'hover', rowClass: 'hoverrow', cellClass: 'hovercell'});
});
</script>


<script type="text/javascript" src="/asp/htmlmade/Race/Tenbo/09/PC/09select.js"></script>
<script type="text/javascript">
function SortLink(argdata)
{

	if( argdata == '1' ){
		if( data == 'toku' ){
			location.href = "/asp/htmlmade/Race/Syutujo/09/PC/s{{$id}}.htm?toku";
		}else{
			location.href = "/asp/htmlmade/Race/Syutujo/09/PC/s{{$id}}.htm#race_header";
		}
	}else if( argdata == '2' ){
		if( data == 'toku' ){
			location.href = "/asp/htmlmade/Race/Syutujo/09/PC/s{{$id}}_Win.htm?toku";
		}else{
			location.href = "/asp/htmlmade/Race/Syutujo/09/PC/s{{$id}}_Win.htm#race_header";
		}
	}else if( argdata == '3' ){
		if( data == 'toku' ){
			location.href = "/asp/htmlmade/Race/Syutujo/09/PC/s{{$id}}_2Win.htm?toku";
		}else{
			location.href = "/asp/htmlmade/Race/Syutujo/09/PC/s{{$id}}_2Win.htm#race_header";
		}
	}else if( argdata == '4' ){
		if( data == 'toku' ){
			location.href = "/asp/htmlmade/Race/Syutujo/09/PC/s{{$id}}_ST.htm?toku";
		}else{
			location.href = "/asp/htmlmade/Race/Syutujo/09/PC/s{{$id}}_ST.htm#race_header";
		}
	}

}
function DataReceive(){
	if( data == 'toku' ){
		document.location.hash='title';
	}else{
	}
	//アラートで?以降の文字を表示する
}
</script>
<script type="text/javascript">
		//?以降の文字を取得する
	data = location.search.substring(1, location.search.length);
		//エスケープされた文字をアンエスケープする
	data = unescape(data);
	if( data == 'toku' ){
		document.write("<link href=\"/css/01syutujo_toku.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />");
	}else{
		document.write("<link href=\"/css/01syutujo.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />");
	}
</script>
</head>


<body onload="DataReceive();">
<div id="wrapper">

<div id="header_wrap">
    <div id="header">
    <div id="header_img">
    	
        <h1><a href="/">BOATRACE 津 #09</a></h1>
        <h2>展望・出場予定選手</h2>
        
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
    

<div id="tenbo_wrap">


<div id="tenbo_main">


<div id="rt_header">
<div id="rt_header_l">
<span class="grade_{{$grade_class[$race_index->GRADE]}}">{{ $general->create_grade_options_in_raceindex()[$race_index->GRADE] }}</span>
</div><!--/#rt_header_l-->

<div id="rt_header_c">
<div id="race_n">
    {{$race_index->RACE_TITLE}}
</div>
<div id="day"><!--
    @foreach($race_index_date_list as $key => $item)
        @if($key == 0)
            -->{{date('n',strtotime($item))}}/<!--
        @endif
            -->{{date('j',strtotime($item))}}<!--
        @if(date('w',strtotime($item)) == 0)
            --><span class="sun">(日)</span> <!--
        @elseif(date('w',strtotime($item)) == 6)
            --><span class="sat">(土)</span> <!--
        @else
            -->({{ $weeks[date('w',strtotime($item))]; }}) <!--
        @endif
    @endforeach
  --></div>
</div><!--/#rt_header_c--> 

<div id="rt_header_r">
<a href="/asp/htmlmade/Race/Tenbo/09/PC/t200.htm"><span class="sensyu_b2">レース展望</span></a>

</div><!--/#rt_header_r-->

<div class="clear"></div>
</div><!--/#rt_header-->     
        
        


<!--注釈-->
<span class="note">
<img src="/01tenbo/images/btn_sort.gif" width="18" height="18" alt=""/>をクリックすると、各データを降順に並び替えできます。<br>
［全国成績：{{date('Y/n/j',strtotime($zenkoku_start))}}～{{date('Y/n/j',strtotime($zenkoku_end))}}］［津成績：{{date('Y/n/j',strtotime($tsu_start))}}～{{date('Y/n/j',strtotime($tsu_end))}}　<span class="jun">○</span>：準優出、<span class="yu">●</span>：優出］
</span>



<!--▼▼▼選手リスト▼▼▼-->

<table id="ta_sensyu">

<thead>
<tr class="top"> 
<th colspan="5">&ensp;</th>
<th colspan="4" class="Z">全国成績</th>
<th colspan="5" class="H">津成績</th>
</tr>
<tr class="bottom">
<th class="select"><a href="javascript:void(0);" onclick="SortLink(1);">登番</a></th>
<th>選手名</th>
<th>年齢</th>
<th>支部</th>
<th>級別</th>
<th class="Z"><a href="javascript:void(0);" onclick="SortLink(2);">勝率</a></th>
<th class="Z"><a href="javascript:void(0);" onclick="SortLink(3);">2連率</a></th>
<th class="Z"><a href="javascript:void(0);" onclick="SortLink(4);">平均ST</a></th>
<th class="Z">出走</th>
<th colspan="3" class="H">前回出走（年月）/ グレード / 着順</th>
<th class="H">優出</th>
<th class="H">優勝</th>
</tr>
</thead>
<tbody>
    @foreach ($result_table as $touban=>$item)
        <tr>
            <td>@isset($race_syutujo_racer_add_list[$touban]){{$race_syutujo_racer_add_list[$touban]->YOSO}}@endisset{{$touban}}</td>
            <td @if ($item->Sei == 2) class="L" @endif>{{str_replace('　','',str_replace('　　',' ',$item->NameK ?? ''))}}</td>
            <td>{{$item->Nenrei}}</td>
            <td>{{$item->KenID}}</td>
            <td>{{$item->Kyu}}</td>
            <td>{{$item->Fukusyo1 == 0 ? '…' : number_format($item->Syoritu1,2)}}</td>
            <td>{{$item->Fukusyo1 == 0 ? '…' : floor($item->Fukusyo1).'%'}}</td>
            <td>{{$item->Sttiming == 999 ? '…' : number_format($item->Sttiming,2)}}</td>
            <td>{{$item->Syukai1 == 0 ? '…' : $item->Syukai1}}</td>
            @isset($item->touchi_rireki['touchi_target_date'])
                <td>{{date('y.n',strtotime($item->touchi_rireki['touchi_target_date']))}}</td>                
            @else
                <td>…</td>    
            @endisset
            @isset($item->touchi_rireki['touchi_grade'])
                <td class="{{$general->gradenumber_to_gradename_for_tokyo_next_image($item->touchi_rireki['touchi_grade'])}}">{{$general->gradenumber_to_gradename_for_syutujo($item->touchi_rireki['touchi_grade'])}}</td>             
            @else
                <td class="ip">…</td>    
            @endisset
            <td>{!!$item->touchi_rireki['touchi_tyakujun'] ?? "…"!!}</td>
            @isset($item->touchi_rireki['touchi_grade'])
                <td>{{$item->yusyutu_count ?? "…"}}</td>
            @else
                <td>…</td>    
            @endisset
            @isset($item->touchi_rireki['touchi_grade'])
                <td>{{$item->yusyo_count ?? "…"}}</td>
            @else
                <td>…</td>    
            @endisset
            
        </tr>
    @endforeach
<tr>
<td>3020</td>
<td>若女井  正</td>
<td>61</td>
<td>東京</td>
<td>B1</td>
<td>4.11</td>
<td>19%</td>
<td>0.22</td>
<td>61</td>
<td>20.12</td>
<td class="g0">一般</td>
<td>366451256</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>3159</td>
<td>江口 晃生</td>
<td>56</td>
<td>群馬</td>
<td>A1</td>
<td>7.26</td>
<td>57%</td>
<td>0.14</td>
<td>121</td>
<td>20.7</td>
<td class="g0">一般</td>
<td>241232<img src="/01tenbo/images/kako2_y.png" alt="2" width="14" height="14"></td>
<td>1</td>
<td>0</td>
</tr>
<tr>
<td>3327</td>
<td>野長瀬 正孝</td>
<td>53</td>
<td>静岡</td>
<td>A2</td>
<td>5.37</td>
<td>37%</td>
<td>0.19</td>
<td>70</td>
<td>20.12</td>
<td class="g0">一般</td>
<td>35351132<img src="/01tenbo/images/kako5_j.png" alt="5" width="14" height="14">14</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>3445</td>
<td>加藤 高史</td>
<td>51</td>
<td>埼玉</td>
<td>A2</td>
<td>6.02</td>
<td>40%</td>
<td>0.17</td>
<td>120</td>
<td>20.11</td>
<td class="g0">一般</td>
<td>21322<img src="/01tenbo/images/kako3_y.png" alt="3" width="14" height="14"></td>
<td>1</td>
<td>0</td>
</tr>
<tr>
<td>3467</td>
<td>森  弘行</td>
<td>52</td>
<td>東京</td>
<td>B1</td>
<td>4.06</td>
<td>19%</td>
<td>0.21</td>
<td>94</td>
<td>20.12</td>
<td class="g0">一般</td>
<td>645315645</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>3505</td>
<td>山田 竜一</td>
<td>50</td>
<td>東京</td>
<td>A2</td>
<td>5.98</td>
<td>39%</td>
<td>0.14</td>
<td>127</td>
<td>20.5</td>
<td class="g3">G3</td>
<td>1634426221</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>3519</td>
<td>冨田 秀幸</td>
<td>53</td>
<td>愛知</td>
<td>B1</td>
<td>5.31</td>
<td>32%</td>
<td>0.18</td>
<td>127</td>
<td>21.3</td>
<td class="g0">一般</td>
<td>445524253</td>
<td>1</td>
<td>0</td>
</tr>
<tr>
<td>3583</td>
<td>齋藤 智裕</td>
<td>48</td>
<td>埼玉</td>
<td>B1</td>
<td>4.04</td>
<td>19%</td>
<td>0.17</td>
<td>98</td>
<td>20.6</td>
<td class="g0">一般</td>
<td>555455566</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>3590</td>
<td>濱野谷 憲吾</td>
<td>47</td>
<td>東京</td>
<td>A1</td>
<td>7.36</td>
<td>54%</td>
<td>0.15</td>
<td>100</td>
<td>20.4</td>
<td class="g1">G1</td>
<td>431221<img src="/01tenbo/images/kako3_j.png" alt="3" width="14" height="14">21</td>
<td>1</td>
<td>1</td>
</tr>
<tr>
<td>3592</td>
<td>橋本 健造</td>
<td>52</td>
<td>大阪</td>
<td>B2</td>
<td>3.58</td>
<td>20%</td>
<td>0.18</td>
<td>43</td>
<td>&ensp;</td>
<td class="s0">&ensp;</td>
<td>--</td>
<td>&ensp;</td>
<td>&ensp;</td>
</tr>
<tr>
<td>3647</td>
<td>伊藤 雄二</td>
<td>48</td>
<td>埼玉</td>
<td>B1</td>
<td>4.61</td>
<td>20%</td>
<td>0.19</td>
<td>83</td>
<td>21.3</td>
<td class="g0">一般</td>
<td>643143464</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>3655</td>
<td>本橋 克洋</td>
<td>47</td>
<td>群馬</td>
<td>A2</td>
<td>5.64</td>
<td>36%</td>
<td>0.19</td>
<td>118</td>
<td>20.11</td>
<td class="g0">一般</td>
<td>2421233</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>3698</td>
<td>小巻 良至</td>
<td>48</td>
<td>埼玉</td>
<td>B1</td>
<td>4.02</td>
<td>19%</td>
<td>0.18</td>
<td>89</td>
<td>20.8</td>
<td class="g0">一般</td>
<td>525436262</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>3807</td>
<td>岡部  哲</td>
<td>46</td>
<td>埼玉</td>
<td>B1</td>
<td>5.17</td>
<td>30%</td>
<td>0.17</td>
<td>109</td>
<td>21.3</td>
<td class="g0">一般</td>
<td>3553115<img src="/01tenbo/images/kako4_j.png" alt="4" width="14" height="14">26</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>3885</td>
<td>久田  武</td>
<td>47</td>
<td>愛知</td>
<td>A2</td>
<td>5.47</td>
<td>34%</td>
<td>0.15</td>
<td>112</td>
<td>20.12</td>
<td class="g0">一般</td>
<td>553455552</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>3945</td>
<td>橋口 真樹</td>
<td>45</td>
<td>愛知</td>
<td>B1</td>
<td>4.54</td>
<td>24%</td>
<td>0.20</td>
<td>79</td>
<td>21.3</td>
<td class="g0">一般</td>
<td>4362354546</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>3950</td>
<td>石川 哲秀</td>
<td>45</td>
<td>大阪</td>
<td>B1</td>
<td>4.26</td>
<td>19%</td>
<td>0.17</td>
<td>114</td>
<td>20.12</td>
<td class="g0">一般</td>
<td>243463466</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>3965</td>
<td>北中 元樹</td>
<td>42</td>
<td>滋賀</td>
<td>A2</td>
<td>5.62</td>
<td>38%</td>
<td>0.17</td>
<td>121</td>
<td>21.5</td>
<td class="g0">一般</td>
<td>335334251251</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>3992</td>
<td>関口 智久</td>
<td>42</td>
<td>埼玉</td>
<td>B1</td>
<td>4.95</td>
<td>29%</td>
<td>0.15</td>
<td>85</td>
<td>20.9</td>
<td class="g0">一般</td>
<td>215526452</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>4002</td>
<td>古結  宏</td>
<td>43</td>
<td>兵庫</td>
<td>A1</td>
<td>6.96</td>
<td>55%</td>
<td>0.16</td>
<td>137</td>
<td>19.9</td>
<td class="g0">一般</td>
<td>43461転</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>4012</td>
<td>中村 有裕</td>
<td>41</td>
<td>滋賀</td>
<td>A2</td>
<td>5.60</td>
<td>38%</td>
<td>0.15</td>
<td>95</td>
<td>21.3</td>
<td class="g0">一般</td>
<td>沈欠</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>4049</td>
<td>荒川 健太</td>
<td>40</td>
<td>三重</td>
<td>A1</td>
<td>6.30</td>
<td>47%</td>
<td>0.17</td>
<td>122</td>
<td>21.5</td>
<td class="g0">一般</td>
<td>1452F233</td>
<td>3</td>
<td>0</td>
</tr>
<tr>
<td>4056</td>
<td>小西 英輝</td>
<td>42</td>
<td>福井</td>
<td>B1</td>
<td>4.24</td>
<td>19%</td>
<td>0.16</td>
<td>102</td>
<td>21.4</td>
<td class="g0">一般</td>
<td>1522642<img src="/01tenbo/images/kako6_j.png" alt="6" width="14" height="14">13</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>4059</td>
<td>入澤 友治</td>
<td>42</td>
<td>東京</td>
<td>B1</td>
<td>4.82</td>
<td>30%</td>
<td>0.18</td>
<td>68</td>
<td>20.10</td>
<td class="g0">一般</td>
<td>616515456</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>4067</td>
<td>永井  源</td>
<td>41</td>
<td>愛知</td>
<td>A1</td>
<td>6.69</td>
<td>49%</td>
<td>0.17</td>
<td>145</td>
<td>21.2</td>
<td class="g1">G1</td>
<td>324424<img src="/01tenbo/images/kako4_j.png" alt="4" width="14" height="14">14</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>4078</td>
<td>渡辺 史之</td>
<td>42</td>
<td>群馬</td>
<td>B1</td>
<td>3.81</td>
<td>20%</td>
<td>0.19</td>
<td>108</td>
<td>21.3</td>
<td class="g0">一般</td>
<td>235256246</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>4081</td>
<td>樋口 範政</td>
<td>42</td>
<td>愛知</td>
<td>B1</td>
<td>4.22</td>
<td>22%</td>
<td>0.20</td>
<td>98</td>
<td>&ensp;</td>
<td class="s0">&ensp;</td>
<td>--</td>
<td>&ensp;</td>
<td>&ensp;</td>
</tr>
<tr>
<td>4129</td>
<td>宇野 博之</td>
<td>41</td>
<td>愛知</td>
<td>B1</td>
<td>4.00</td>
<td>22%</td>
<td>0.17</td>
<td>87</td>
<td>20.12</td>
<td class="g0">一般</td>
<td>564255363</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>4139</td>
<td>丹下  健</td>
<td>40</td>
<td>愛知</td>
<td>B1</td>
<td>4.97</td>
<td>30%</td>
<td>0.16</td>
<td>101</td>
<td>21.1</td>
<td class="g0">一般</td>
<td>53412622231</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>4156</td>
<td>浜野 孝志</td>
<td>40</td>
<td>三重</td>
<td>A2</td>
<td>5.71</td>
<td>38%</td>
<td>0.15</td>
<td>146</td>
<td>21.4</td>
<td class="g0">一般</td>
<td>23343122<img src="/01tenbo/images/kako3_j.png" alt="3" width="14" height="14">12</td>
<td>2</td>
<td>0</td>
</tr>
<tr>
<td>4186</td>
<td>小川 時光</td>
<td>40</td>
<td>埼玉</td>
<td>B1</td>
<td>3.86</td>
<td>18%</td>
<td>0.17</td>
<td>92</td>
<td>20.12</td>
<td class="g0">一般</td>
<td>523443643</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>4197</td>
<td>渥美 卓郎</td>
<td>39</td>
<td>静岡</td>
<td>B1</td>
<td>4.36</td>
<td>21%</td>
<td>0.19</td>
<td>110</td>
<td>19.8</td>
<td class="g0">一般</td>
<td>45555535</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>4261</td>
<td>岡  祐臣</td>
<td>37</td>
<td>三重</td>
<td>A1</td>
<td>6.58</td>
<td>46%</td>
<td>0.14</td>
<td>138</td>
<td>21.5</td>
<td class="g0">一般</td>
<td>1331115231<img src="/01tenbo/images/kako1_j.png" alt="1" width="14" height="14"><img src="/01tenbo/images/kako5_y.png" alt="5" width="14" height="14"></td>
<td>3</td>
<td>0</td>
</tr>
<tr>
<td>4273</td>
<td>佐藤  旭</td>
<td>38</td>
<td>静岡</td>
<td>B1</td>
<td>5.20</td>
<td>29%</td>
<td>0.16</td>
<td>107</td>
<td>20.12</td>
<td class="g0">一般</td>
<td>246462</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>4340</td>
<td>土性 雅也</td>
<td>36</td>
<td>三重</td>
<td>A2</td>
<td>5.38</td>
<td>36%</td>
<td>0.17</td>
<td>133</td>
<td>21.4</td>
<td class="g0">一般</td>
<td>33134621<img src="/01tenbo/images/kako4_j.png" alt="4" width="14" height="14">16</td>
<td>3</td>
<td>0</td>
</tr>
<tr>
<td>4470</td>
<td>平田 健之佑</td>
<td>34</td>
<td>三重</td>
<td>A2</td>
<td>6.06</td>
<td>44%</td>
<td>0.14</td>
<td>109</td>
<td>21.5</td>
<td class="g0">一般</td>
<td>14363312</td>
<td>1</td>
<td>1</td>
</tr>
<tr>
<td>4532</td>
<td>秋元  哲</td>
<td>32</td>
<td>埼玉</td>
<td>A1</td>
<td>6.44</td>
<td>51%</td>
<td>0.16</td>
<td>96</td>
<td>19.12</td>
<td class="g0">一般</td>
<td>441224123<img src="/01tenbo/images/kako1_j.png" alt="1" width="14" height="14"><img src="/01tenbo/images/kako3_y.png" alt="3" width="14" height="14"></td>
<td>1</td>
<td>0</td>
</tr>
<tr>
<td>4748</td>
<td>渡邉 雄朗</td>
<td>35</td>
<td>東京</td>
<td>A2</td>
<td>5.95</td>
<td>45%</td>
<td>0.14</td>
<td>133</td>
<td>20.12</td>
<td class="g0">一般</td>
<td>4511631<img src="/01tenbo/images/kako4_j.png" alt="4" width="14" height="14">13</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>4750</td>
<td>井上 尚悟</td>
<td>33</td>
<td>大阪</td>
<td>B1</td>
<td>3.57</td>
<td>21%</td>
<td>0.19</td>
<td>61</td>
<td>20.11</td>
<td class="g0">一般</td>
<td>255551</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>4754</td>
<td>松尾  充</td>
<td>32</td>
<td>三重</td>
<td>A1</td>
<td>6.55</td>
<td>50%</td>
<td>0.15</td>
<td>153</td>
<td>21.4</td>
<td class="g0">一般</td>
<td>11152落41<img src="/01tenbo/images/kako6_j.png" alt="6" width="14" height="14">13</td>
<td>6</td>
<td>0</td>
</tr>
<tr>
<td>4759</td>
<td>今泉 友吾</td>
<td>31</td>
<td>東京</td>
<td>A1</td>
<td>6.30</td>
<td>40%</td>
<td>0.20</td>
<td>145</td>
<td>21.5</td>
<td class="g0">一般</td>
<td>41441512</td>
<td>1</td>
<td>0</td>
</tr>
<tr>
<td>4787</td>
<td>椎名  豊</td>
<td>32</td>
<td>群馬</td>
<td>A1</td>
<td>6.49</td>
<td>53%</td>
<td>0.14</td>
<td>136</td>
<td>20.9</td>
<td class="g0">一般</td>
<td>255215F3</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>4794</td>
<td>和田 拓也</td>
<td>30</td>
<td>兵庫</td>
<td>B1</td>
<td>4.78</td>
<td>29%</td>
<td>0.15</td>
<td>107</td>
<td>20.6</td>
<td class="g0">一般</td>
<td>626136634</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>4917</td>
<td>岩橋 裕馬</td>
<td>32</td>
<td>兵庫</td>
<td>B1</td>
<td>4.36</td>
<td>21%</td>
<td>0.16</td>
<td>106</td>
<td>21.1</td>
<td class="g0">一般</td>
<td>641426364</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>4943</td>
<td>八木 治樹</td>
<td>30</td>
<td>愛知</td>
<td>B1</td>
<td>4.22</td>
<td>23%</td>
<td>0.15</td>
<td>78</td>
<td>21.4</td>
<td class="g0">一般</td>
<td>522545514</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>5024</td>
<td>古場 健也</td>
<td>26</td>
<td>福井</td>
<td>B2</td>
<td>1.93</td>
<td>4%</td>
<td>0.19</td>
<td>75</td>
<td>19.9</td>
<td class="g0">一般</td>
<td>566656</td>
<td>0</td>
<td>0</td>
</tr>
</tbody>


</table><!--ta_sensyu end-->



<!--コメント-->
<p id="comment">※選手の年齢は6/13のものです。また、開催中の帰郷、追配は反映されませんのでご了承ください。<br></p>
</div><!--/#tenbo_main-->
            



<ul id="tenbo_nav">
<span class="select">SELECT</span>

<span id="select_index"></span>
<script type="text/javascript">
	document.getElementById('select_index').innerHTML = FuncSelect();
</script>
</ul><!--/#tenbot_nav-->
            
<div class="clear"></div>
            
</div><!--/#tenbo_wrap-->
        
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
