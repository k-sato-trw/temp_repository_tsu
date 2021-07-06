@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">

<title>ボートレース津</title>

<link href="/css/reset.css" rel="stylesheet" type="text/css">
<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/06meikan.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
<script>
$(window).on('load', function() {
    var url = $(location).attr('href');
    if(url.indexOf("?id=") != -1){
        var id = url.split("?id=");
        var $target = $('#' + id[id.length - 1]);
        if($target.length){
            var pos = $target.offset().top;
            $("html, body").animate({scrollTop:pos}, 0);
        }
    }
});
</script>

</head>





<body>


<div id="racer_data">

@foreach ($touban_array as $touban => $item)
<!---▼▼▼--->
<div id="d3268" class="data_box">

	<div class="personal">
    	<ul class="rank {{$item['fandata']->Kyu}}">

        	<li class="now">{{$item['fandata']->Kyu}}<span>{{$item['fandata']->Nen}}{{ ($item['fandata']->Ki == 1)?"前":"後" }}期</span></li>
            @if($item['fandata']->Ki == 1)
                {{--今が前期なら前年の後期--}}
                <li class="past"><p>{{$item['fandata']->Maeqyu1}}<span>{{$item['fandata']->Nen -1}}<br>後期</span></p></li>                
            @else
                {{--今が後期なら当年の前期--}}
                <li class="past"><p>{{$item['fandata']->Maeqyu1}}<span>{{$item['fandata']->Nen}}<br>前期</span></p></li>
            @endif

    		@if($item['fandata']->Ki == 1)
                {{--今が前期なら前年の前期--}}
                <li class="past"><p>{{$item['fandata']->Maeqyu2}}<span>{{$item['fandata']->Nen -1}}<br>前期</span></p></li>
            @else
                {{--今が後期なら前年の後期--}}
                <li class="past"><p>{{$item['fandata']->Maeqyu2}}<span>{{$item['fandata']->Nen -1}}<br>後期</span></p></li>
            @endif
            
            <div class="clear"></div>
        </ul>
        
        <img src="/06meikan/racer_img/{{$touban}}.jpg" width="200" height="230">
        
        <dl class="name">
        	<dt>{{$touban}}</dt>
            <dd>{{ str_replace("　","",$item['fandata']->NameK) }}<span>{{ mb_convert_kana(str_replace(" ","",$item['fandata']->NameH),'KV') }}</span></dd>
        </dl>
                
        <dl class="profile">
        	<dt>生年月日</dt><dd>{{ $wareki[$item['fandata']->Seinen] + $item['fandata']->Seineny }}/{{$item['fandata']->Seinenm}}/{{$item['fandata']->Seinend}}</dd>
            <dt>身長</dt><dd>{{$item['fandata']->Shincho}}cm</dd>
            <dt>体重</dt><dd>{{$item['fandata']->Taijyu}}kg</dd>
            <dt>血液型</dt><dd>{{$item['fandata']->Ketueki}}型</dd>
            <dt>登録期</dt><dd>{{$item['fandata']->Kibetu}}期</dd>
            <dt>選手歴</dt><dd>{{ (int) $item['debut_date_diff']->format('%Y')}}年{{ (int) $item['debut_date_diff']->format('%M')}}カ月</dd>
            <dt>デビュー</dt><dd>{{ date('Y/n/j',strtotime($item['debut_syussou']->TARGET_DATE)) }}<br>[{{ $general->jyocode_to_jyoname($item['debut_syussou']->JYO) }}]<br>@foreach($item['debut_kekka'] as $debut_kekka_row){{$debut_kekka_row->TYAKUJUN}}@endforeach</dd>
        </dl>
    </div><!--/personal-->
    
    
    <div class="box1">
		<h2>{{$item['fandata']->Nen}}年{{ ($item['fandata']->Ki == 1)?"前":"後" }}期成績</h2>
        <ul class="result">
        	<li><span>勝率</span>{{$item['kibetu']->SYORITU}}</li>
            <li><span>2連率</span>{{$item['kibetu']->RENRITU_2}}</li>
            <li><span class="small">フライング</span>{{ $item['kibetu']->F_COUNT; }}</li>
            <li><span>出走数</span>{{$item['kibetu']->SYUSSOUKAI}}</li>
            <li><span>優出</span>{{$item['kibetu']->YUSYOSYUTU}}</li>
            <li><span>優勝</span>{{$item['kibetu']->YUSYOKAI}}</li>
            <div class="clear"></div>
        </ul>
         
		<h2>通算優勝回数</h2>
        	<p class="att">※グレードは獲得当時のものです。</p>
            <table class="grade_win">
                <tbody>
                <tr>
                <th scope="col" class="SG">SG</th>
                <th scope="col" class="G1">G1</th>
                <th scope="col" class="G2">G2</th>
                <th scope="col" class="G3">G3</th>
                <th scope="col" class="G0">一般</th>
                </tr>
                <tr>
                <td>{{$item['intSg_count']}}</td>
                <td>{{$item['intG1_count']}}</td>
                <td>{{$item['intG2_count']}}</td>
                <td>{{$item['intG3_count']}}</td>
                <td>{{$item['intIp_count']}}</td>
                </tr>
                </tbody>
            </table>
           
            <h3>SG&amp;G1獲得タイトル</h3>
            <div class="grade_title">
                <table>
                    <tbody>
                        @foreach ($item['sg_g1'] as $sg_g1_row)
                        <tr>
                            <td class="date G1">{{date('Y',strtotime($sg_g1_row['TARGET_DATE']))}}</td>
                            <td class="jyo">{{$general->jyocode_to_jyoname($sg_g1_row['JYO'])}}</td>
                            <td class="race">{{$sg_g1_row['RACE_TITLE']}}</td>
                        </tr>     
                        @endforeach
                    
                    </tbody>
                </table>
            </div><!--/grade_title-->
    </div><!--/box1-->


    <div class="box2">
   	  <h2 class="assen_ttl">直近3節成績<span><img src="/06meikan/images/i_j00.gif">：準優出、<img src="/06meikan/images/i_y00.gif">：優出</span></h2>
          <table class="result">
              <tbody>
            @foreach($item['past3'] as $past3_row)
                <tr>
                    <th scope="row">{{$past3_row['display_date']}}</th>
                    <td class="grade">{{ $general->gradenumber_to_gradename_for_plofile($past3_row['GRADE_CODE']) }}</td>
                    <td class="jyo">{{ $general->jyocode_to_jyoname($past3_row['JYO']) }}</td>
                    <td class="data">@foreach($past3_row['seiseki'] as $seiseki){!!$seiseki['TYAKUJUN']!!}@endforeach</td>
                </tr>
            @endforeach
              </tbody>
          </table>
        
   	  <h2>あっせん情報</h2>
      <div class="assen">
          <table>
              <tbody>
            @foreach($item['assen_result'] as $assen_result_row)
                <tr>
                    <th scope="row">{{$assen_result_row['display_date']}}</th>
                    <td class="jyo">{{$general->jyocode_to_jyoname($assen_result_row['JYO'])}}</td>
                    <td class="grade G0">{{ $general->gradenumber_to_gradename_for_plofile($assen_result_row['GRADE_CODE']) }}</td>
                    <td class="race">{{$assen_result_row['RACE_TITLE']}}</td>
                </tr>
            @endforeach
              </tbody>
          </table>
      </div><!--/assen-->
    </div><!--/box2-->

	<div class="clear"></div>
</div>
<!---▲▲▲--->
@endforeach

</div><!--/#racer_data-->


</body>
</html>
