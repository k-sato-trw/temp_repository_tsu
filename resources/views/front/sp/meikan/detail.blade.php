@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="user-scalable=no">

<title>ボートレース津｜三重支部名鑑</title>

<meta name="Keywords" content="BOAT RACE津,ボートレース,津,三重支部,級別,名鑑">
<meta name="Description" content="三重支部に所属する選手の成績、あっせん情報を掲載しています。">

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<link href="/sp/css/reset.css" rel="stylesheet" type="text/css">
<link href="/sp/css/common.css" rel="stylesheet" type="text/css">
<link href="/sp/css/06meikan.css" rel="stylesheet" type="text/css">
<link href="/sp/css/font.css" rel="stylesheet" type="text/css">


<script type="text/javascript" src="/sp/js/jquery-1.8.3.min.js"></script>

<!-- ビューポート設定 -->
<script type="text/javascript" src="/sp/js/monaca.viewport.js"></script>
<script>
monaca.viewport({
    width : 720
});
	//html版 引数取得javascript
	var intSelect = "";
	var arg = location.search; //引数を取得

	//URL を ? で分割
	var aSplit1 = arg.split("?");
	if( aSplit1.length > 1 ){
		//URL を &で分割
		var aSplit2 = aSplit1[1].split("&");
		var i;
		var iMax = aSplit2.length;

		// &で分割した物を = で分割
		for( i = 0; i< iMax; i++ ){
			if( i < 1 ){
				aSplit3 = aSplit2[i].split("=");
				intSelect += aSplit3[1];
			}
		}
	}
function funcBackLink( )
{
	location.href = "/sp/06meikan/06meikan.htm?view=" + intSelect + "";
}
</script>


</head>



<body>


<a href="javascript:funcBackLink();" class="data_back"><span>BACK</span></a>


<div id="racer_data">




<!---▼▼▼--->
<div id="{{$touban}}" class="data_box">

	<div class="personal">
    	<ul class="rank {{ $target_touban_array['fandata']->Kyu }}">
            <li class="now">{{ $target_touban_array['fandata']->Kyu }}<span>{{$target_touban_array['fandata']->Nen}}{{ ($target_touban_array['fandata']->Ki == 1)?"前":"後" }}期</span></li>
            @if($target_touban_array['fandata']->Ki == 1)
                {{--今が前期なら前年の後期--}}
                <li class="past"><p>{{$target_touban_array['fandata']->Maeqyu1}}<span>{{$target_touban_array['fandata']->Nen -1}}<br>後期</span></p></li>                
            @else
                {{--今が後期なら当年の前期--}}
                <li class="past"><p>{{$target_touban_array['fandata']->Maeqyu1}}<span>{{$target_touban_array['fandata']->Nen}}<br>前期</span></p></li>
            @endif

    		@if($target_touban_array['fandata']->Ki == 1)
                {{--今が前期なら前年の前期--}}
                <li class="past"><p>{{$target_touban_array['fandata']->Maeqyu2}}<span>{{$target_touban_array['fandata']->Nen -1}}<br>前期</span></p></li>
            @else
                {{--今が後期なら前年の後期--}}
                <li class="past"><p>{{$target_touban_array['fandata']->Maeqyu2}}<span>{{$target_touban_array['fandata']->Nen -1}}<br>後期</span></p></li>
            @endif
            <div class="clear"></div>
        </ul>
        
        <img src="/06meikan/racer_img/{{$touban}}.jpg" width="300" height="344" class="racer_img">
        
        <dl class="name">
        	<dt>{{$touban}}</dt>
            <dd>{{ str_replace("　","",$target_touban_array['fandata']->NameK) }}<span>{{ mb_convert_kana(str_replace(" ","",$target_touban_array['fandata']->NameH),'KV') }}</span></dd>
        </dl>
                
        <dl class="profile">
            <dt>生年月日</dt><dd>{{ $wareki[$target_touban_array['fandata']->Seinen] + $target_touban_array['fandata']->Seineny }}/{{$target_touban_array['fandata']->Seinenm}}/{{$target_touban_array['fandata']->Seinend}}</dd>
            <dt>身長</dt><dd>{{$target_touban_array['fandata']->Shincho}}cm</dd>
            <dt>体重</dt><dd>{{$target_touban_array['fandata']->Taijyu}}kg</dd>
            <dt>血液型</dt><dd>{{$target_touban_array['fandata']->Ketueki}}型</dd>
            <dt>登録期</dt><dd>{{$target_touban_array['fandata']->Kibetu}}期</dd>
            <dt>選手歴</dt><dd>{{ (int) $target_touban_array['debut_date_diff']->format('%Y')}}年{{ (int) $target_touban_array['debut_date_diff']->format('%M')}}カ月</dd>
            <dt>デビュー</dt><dd>{{ date('Y/n/j',strtotime($target_touban_array['debut_syussou']->TARGET_DATE)) }}<br>[{{ $general->jyocode_to_jyoname($target_touban_array['debut_syussou']->JYO) }}]<br>@foreach($target_touban_array['debut_kekka'] as $debut_kekka_row){{$debut_kekka_row->TYAKUJUN}}@endforeach</dd>
        </dl>
        
        <div class="clear"></div>
    </div><!--/personal-->
    
    
    <div class="box1">
		<h2>{{$target_touban_array['fandata']->Nen}}年{{ ($target_touban_array['fandata']->Ki == 1)?"前":"後" }}期成績</h2>
        <ul class="result">
            <li><span>勝率</span>{{$target_touban_array['kibetu']->SYORITU}}</li>
            <li><span>2連率</span>{{$target_touban_array['kibetu']->RENRITU_2}}</li>
            <li><span class="small">フライング</span>{{ $target_touban_array['kibetu']->F_COUNT; }}</li>
            <li><span>出走数</span>{{$target_touban_array['kibetu']->SYUSSOUKAI}}</li>
            <li><span>優出</span>{{$target_touban_array['kibetu']->YUSYOSYUTU}}</li>
            <li><span>優勝</span>{{$target_touban_array['kibetu']->YUSYOKAI}}</li>
            <div class="clear"></div>
        </ul>
    </div><!--/box1-->
    <div class="box2">
   	  <h2 class="assen_ttl">直近3節成績<span><img src="/sp/06meikan/images/i_j00.gif">：準優出、<img src="/sp/06meikan/images/i_y00.gif">：優出</span></h2>
          <table class="result">
              <tbody>
                @foreach($target_touban_array['past3'] as $past3_row)
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
                @foreach($target_touban_array['assen_result'] as $assen_result_row)
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
    <div class="box1">
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
                    <td>{{$target_touban_array['intSg_count']}}</td>
                    <td>{{$target_touban_array['intG1_count']}}</td>
                    <td>{{$target_touban_array['intG2_count']}}</td>
                    <td>{{$target_touban_array['intG3_count']}}</td>
                    <td>{{$target_touban_array['intIp_count']}}</td>
                </tr>
                </tbody>
            </table>
           
            <h3>SG&amp;G1獲得タイトル</h3>
            <div class="grade_title">
                <table>
                    <tbody>
                        @foreach ($target_touban_array['sg_g1'] as $sg_g1_row)
                            <tr>
                                @if($sg_g1_row['GRADE_CODE'] == "0")
                                    <td class="date SG">{{date('Y',strtotime($sg_g1_row['TARGET_DATE']))}}</td>
                                @else
                                    <td class="date G1">{{date('Y',strtotime($sg_g1_row['TARGET_DATE']))}}</td>
                                @endif
                                <td class="jyo">{{$general->jyocode_to_jyoname($sg_g1_row['JYO'])}}</td>
                                <td class="race">{{$sg_g1_row['RACE_TITLE']}}</td>
                            </tr>     
                        @endforeach
                    </tbody>
                </table>
            </div><!--/grade_title-->
    </div><!--/box1-->

    

	<div class="clear"></div>
</div>
<!---▲▲▲--->









</div><!--racer_data-->

</body>
</html>
