@extends('layouts.admin_sekosya_layout')

@section('title', '津 開門 & 第1Rスタート展示時刻')

@inject('general', 'App\Services\GeneralService')

@section('css')

    <style>
        *, ::after, ::before {
            box-sizing:content-box;
        }
    </style>
    <link href="/cms/css/reset.css" rel="stylesheet" type="text/css">
    <link href="/cms/css/cms.css" rel="stylesheet" type="text/css">
    <link href="/cms/css/custom_sekou.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>	
    <style>
        
        .tv_block{
            background-color:#aaa;
        }
        
        .close_block{
            background-color:#888;
        }
        
        .appear_true{
            color: #fff;
        }
/*
        td.close_block:hover,
        td.day_block:hover{
            background-color:#ccc;
            cursor: pointer;
        }
*/
        td.kaimon_block{
            font-weight: bold;
            background-color:#FF5A78;
            cursor: pointer;
        }
        td.kaimon_block:hover{
            background-color:#ccc;
        }

        .grade_0{ /*SG*/
            font-weight: bold;
            background-color:#DC1414;
        }
        .grade_1{ /*G1*/
            font-weight: bold;
            background-color:#FF9600;
        }
        .grade_2{ /*G2*/
            font-weight: bold;
            background-color:#9966CC;
        }
        .grade_3{ /*G3*/
            font-weight: bold;
            background-color:#00C694;
        }
        .grade_4{ /*一般*/
            font-weight: bold;
            background-color:#5096F0;
        }
        
        .grade_4.night{ /*一般 夜*/
            font-weight: bold;
            background-color:#6478DC;
        }
    </style>
@endsection

@section('content')
    <h1>開門 & 第1Rスタート展示時刻</h1>

    <div style="text-align: center;margin:20px auto 0;">
        <div style="display: inline-block;"><a href="?now_year_month={{ $prev_year_month }}">前月</a></div>
        <h2 style="display: inline-block; margin:0 20px;">{{$now_year}}年{{$now_month}}月</h2>
        <div style="display: inline-block;"><a href="?now_year_month={{ $next_year_month }}">次月</a></div>
    </div>
    <div style="margin:40px 0;">
        
        <table class="table" border="2" style="width: 100%;">{{-- カレンダー部分↓ --}}
            <tr>
                <th style="width:6%;"></th>
                @for($day = 1; $day <= $now_month_last_day; $day++)
                    <th style="width:3%; text-align:center;">
                        {{$day}}
                        <br>
                        @if(date('w',strtotime($now_year . $now_month . $day)) == 0)
                            <span style="color: #f33;">
                        @elseif(date('w',strtotime($now_year . $now_month . $day)) == 6)
                            <span style="color: #33f;">
                        @else
                            <span>
                        @endif
                        {{ $week_label[date('w',strtotime($now_year . $now_month . $day))] }}
                        </span>
                    </th>
                @endfor
            </tr>

            
            {{-- 開門時間部分↓ --}}
            <tr>
                <th style="width:6%;">開門<br>時間</th>
                @for($day = 1; $day <= $now_month_last_day; $day++)
                    <?php $tmp_date = $now_year.$now_month.str_pad($day, 2, '0', STR_PAD_LEFT); ?>
                    @isset($kaimon_array[$tmp_date])
                        <td style="width:3%; text-align:center; padding-left:0; padding-right:0; cursor:pointer" class="kaimon_block @if($kaimon_array[$tmp_date]->APPEAR_FLG){{ "appear_true" }}@endif" 
                        onClick="location.href='/admin_sekosya/kaimon/edit/{{ $tmp_date }}'">
                            {{ substr($kaimon_array[$tmp_date]->KAIMON_TIME ,0,2) }}:{{ substr($kaimon_array[$tmp_date]->KAIMON_TIME ,2,2) }}
                        </td>
                    @else
                        <td style="width:3%; text-align:center; padding-left:0; padding-right:0; cursor:pointer"  
                            onClick="location.href='/admin_sekosya/kaimon/create/{{ $tmp_date }}'">
                        </td>
                    @endisset
                @endfor
            </tr>
            {{-- 開門時間部分↑ --}}


            {{-- 本場部分↓ --}}
            <tr>
                <th style="background-color: #ccc;">本場</th>
                @foreach($honjyo_array as $day => $item)
                    @if($item['type'] == "head")
                        <td colspan="{{ $item['colspan'] }}" 
                        class="day_block grade_{{ $item['record']['GRADE'] }} @if($item['record']['APPEAR_FLG']) appear_true @endif" >
                            {{ $general->gradenumber_to_gradename_for_cms_calendar($item['record']['GRADE']) }}
                            @if($item['record']['RACE_TITLE'])
                                {{ $item['record']['RACE_TITLE'] }}
                            @elseif($item['record']['CALENDAR_RACE_TITLE'])
                                {{ $item['record']['CALENDAR_RACE_TITLE'] }}                                           
                            @else
                                {{ $general->jyocode_to_jyoname($item['record']['JYO']) }}
                            @endif
                            
                        </td>
                    @elseif($item['type'] == "blank")
                        <td class="day_block" >
                        </td>
                    
                    @elseif($item['type'] == "close")
                        <td colspan="{{ $item['colspan'] }}" 
                        rowspan="1" 
                        class="close_block @if($item['record']['APPEAR_FLG']) appear_true @endif" >
                            休館日
                        </td>
                    @endif
                @endforeach

            </tr>
            {{-- 本場部分↑ --}}

            {{-- 本場内部分↓ --}}
            @foreach($honjyonai_lines as $line_count => $jyogai_array)
                <tr>
                    @if($line_count == 1)
                        <th style="background-color: #ccc;" rowspan="5">本場内</th>
                    @endif

                    @foreach($jyogai_array as $day => $item)
                        @if($item['type'] == "head")
                            <td colspan="{{ $item['colspan'] }}" 
                            class="day_block grade_{{ $item['record']['GRADE'] }} @if($item['record']['APPEAR_FLG']) appear_true @endif" 
                            {{--onClick="location.href='/admin/calendar/edit/honjyonai/{{ $item['record']['ID'] }}'"--}}>

                                {{ $general->gradenumber_to_gradename_for_cms_calendar($item['record']['GRADE']) }}
                                @if($item['record']['RACE_TITLE'])
                                    {{ $general->jyocode_to_jyoname($item['record']['JYO']) }}{{ $item['record']['RACE_TITLE'] }}
                                @elseif($item['record']['CALENDAR_RACE_TITLE'])
                                    {{ $item['record']['CALENDAR_RACE_TITLE'] }}                                           
                                @else
                                    {{ $general->jyocode_to_jyoname($item['record']['JYO']) }}
                                @endif
                                @if($item['record']['LADY_FLG'])
                                    <img src="/01cal/images/mark_2.png">
                                @endif
                            </td>
                        @elseif($item['type'] == "blank")
                            <td 
                            class="day_block" 
                            {{--onClick="location.href='/admin/calendar/create/honjyonai/{{ $now_year . $now_month . str_pad($day, 2, '0', STR_PAD_LEFT) }}/{{$line_count}}'"--}}>
                            </td>
                        
                        @elseif($item['type'] == "close")
                            <td colspan="{{ $item['colspan'] }}" 
                            rowspan="5" 
                            class="close_block @if($item['record']['APPEAR_FLG']) appear_true @endif" 
                            {{--onClick="location.href='/admin/calendar/edit/close/{{ $item['record']['ID'] }}'"--}}>
                                休館日
                            </td>
                        @endif
                    @endforeach

                </tr>
            @endforeach
            {{-- 本場内部分↑ --}}

           

        </table>{{-- カレンダー部分↑ --}}

    </div>

    <div id="footer">

        <div id="footer_in">
        <div id="footer_in_l_km">
		<form name="preview_form" action="/admin_sekosya/kaimon/preview_pc" target="_blank">
			<ul>
				<li class="preview">プレビュー</li>
				<li class="pv_time"><input name="preDate" type="text" value="{{date('Ymd')}}" size="14" maxlength="8">を指定</li>
				<li class="pv_b"><a href="javascript:document.preview_form.action='/admin_sekosya/kaimon/preview_pc';document.preview_form.submit()">PC</a></li>
				<li class="pv_b"><a href="javascript:document.preview_form.action='/admin_sekosya/kaimon/preview_sp';document.preview_form.submit()">スマホ</a></li>
				{{--<li class="pv_b"><a href="javascript:funcPreview(3);">携帯</a></li>--}}
				<div class="clear"></div>
			</ul>
		</form>
        </div><!--/#fotter_in_l-->
        
        
        <div id="footer_in_r_km">
        
        <div id="action_a">
        <h3>{{ (int) $now_month }}月を一括</h3>
        <span class="open_b"><input type="button" onclick="location.href='/admin_sekosya/kaimon/change_appear_flg/{{$now_year.$now_month}}/1'" value="公開"></span>
        <span class="close_b"><input type="button" onclick="location.href='/admin_sekosya/kaimon/change_appear_flg/{{$now_year.$now_month}}/0'" value="非公開"></span>
        <div class="clear" style="clear: both"></div>
        </div><!--/#action_c-->
        
        
        
        <div class="clear" style="clear: both"></div>
        </div><!--/#fotter_in_r-->
        
        <div class="clear" style="clear: both"></div>
        </div><!--/#fotter_in-->
        
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="/cms/js/jquery-1.8.2.min.js"></script>

    <script type="text/javascript">


    jQuery(document).ready(function($) {
        $(".balloon_main").hide();
        
        $(".day_txt").click(function(event) {
            $(".balloon_main").hide();	
            $("span").removeClass('day_txt_on');
            
            var num = $(".day_txt").index(this);
            var pos = $(this).parent().position();
            $(".balloon_main").eq(num).css("left", pos.left-114);
            $(".balloon_main").eq(num).css("top", pos.top+90);
            $(".balloon_main").eq(num).show()
            $(this).addClass('day_txt_on');
        });
        
        $(".close").click(function () {
            $(".balloon_main").hide();
            $("span").removeClass('day_txt_on');
            });
        
    });

	function funcCheck( argData , argData2 )
	{
		// 入力漏れがあればfalseに変化
		Judge = true;
		Judge2 = true;
		strResult = "";
		strResult2 = "";
		var strTempDate = "";
		var strStart_Date = "";
		var strEnd_Date = "";
		var strTime1 = "";
		var strTime2 = "";
		var strSTTime1 = "";
		var strSTTime2 = "";
		strStart_Date = document.InputForm['date1_' + argData + ''].value;
		strEnd_Date = document.InputForm['date2_' + argData + ''].value;
		strTime1 = document.InputForm['time1_' + argData + ''].value;
		strTime2 = document.InputForm['time2_' + argData + ''].value;
		strSTTime1 = document.InputForm['sttime1_' + argData + ''].value;
		strSTTime2 = document.InputForm['sttime2_' + argData + ''].value;

		if( strStart_Date == "" )
		{
			Judge = false;
			strResult = strResult + "開始日付を入力してください。\n";
		}
		else
		{
			if( isNaN( strStart_Date ) == true )
			{
				Judge = false;
				strResult = strResult + "開始日付には数値を入力してください。\n";
			}
			else if( strStart_Date.length < 8 )
			{// 8文字以下の時
				Judge = false;
				strResult = strResult + "開始日付には必ず8文字で入力してください。\n";
			}
			else
			{
				if( isValidDate(parseInt(strStart_Date.substr(0, 4),10),parseInt(strStart_Date.substr(4, 2),10),parseInt(strStart_Date.substr(6, 2),10)) )
				{
				}
				else
				{
					Judge = false;
					strResult = strResult + "開始日付には正しい日付で入力してください。\n";
				}
			}
		}


		if( strEnd_Date == "" )
		{
			//Judge = false;
			//strResult = strResult + "終了日付を入力してください。\n";
		}
		else
		{
			if( isNaN( strEnd_Date ) == true )
			{
				Judge = false;
				strResult = strResult + "終了日付には数値を入力してください。\n";
			}
			else if( strEnd_Date.length < 8 )
			{// 8文字以下の時
				Judge = false;
				strResult = strResult + "終了日付には必ず8文字で入力してください。\n";
			}
			else
			{
				if( isValidDate(parseInt(strEnd_Date.substr(0, 4),10),parseInt(strEnd_Date.substr(4, 2),10),parseInt(strEnd_Date.substr(6, 2),10)) )
				{
					if( strStart_Date > strEnd_Date  )
					{
						Judge = false;
						strResult = strResult + "終了日付には開始日付より新しい日付で入力してください。\n";
					}
				}
				else
				{
					Judge = false;
					strResult = strResult + "終了日付には正しい日付で入力してください。\n";
				}
			}
		}

		if(Judge == false || strEnd_Date === "")
		{
		}
		else
		{
			strTempDate = "202105" + ("0"+ argData ).slice(-2);
			if( strStart_Date <= strTempDate && strEnd_Date >= strTempDate )
			{
			}else{
				Judge = false;
				strResult = strResult + "表示期間は指定日を含めてください。\n";
			}
		}

		if( strTime1 == "" )
		{
			Judge = false;
			strResult = strResult + "開門時刻(時)を入力してください。\n";
		}
		else
		{
			if( isNaN( strTime1 ) == true )
			{
				Judge = false;
				strResult = strResult + "開門時刻(時)には数値を入力してください。\n";
			}
			else if( strTime1.length > 2 )
			{// 2桁以上の時
				Judge = false;
				strResult = strResult + "開門時刻(時)には必ず2桁以内で入力してください。\n";
			}
			else
			{
				if( Number(strTime1) >= 0 && Number(strTime1) <= 23 )
				{
				}
				else
				{
					Judge = false;
					strResult = strResult + "開門時刻(時)には正しい時間を入力してください。\n";
				}
			}
		}
		if( strTime2 == "" )
		{
			Judge = false;
			strResult = strResult + "開門時刻(分)を入力してください。\n";
		}
		else
		{
			if( isNaN( strTime2 ) == true )
			{
				Judge = false;
				strResult = strResult + "開門時刻(分)には数値を入力してください。\n";
			}
			else if( strTime2.length > 2 )
			{// 2桁以上の時
				Judge = false;
				strResult = strResult + "開門時刻(分)には必ず2桁以内で入力してください。\n";
			}
			else
			{
				if( Number(strTime2) >= 0 && Number(strTime2) <= 59 )
				{
				}
				else
				{
					Judge = false;
					strResult = strResult + "開門時刻(分)には正しい時間を入力してください。\n";
				}
			}
		}

		if( strSTTime1 === "--" )
		{
		}else if( strSTTime1 == "" )
		{
			Judge = false;
			strResult = strResult + "第1Rスタート展示(時)を入力してください。\n";
		}
		else
		{
			if( isNaN( strSTTime1 ) == true )
			{
				Judge = false;
				strResult = strResult + "第1Rスタート展示(時)には数値を入力してください。\n";
			}
			else if( strSTTime1.length > 2 )
			{// 2桁以上の時
				Judge = false;
				strResult = strResult + "第1Rスタート展示(時)には必ず2桁以内で入力してください。\n";
			}
			else
			{
				if( Number(strSTTime1) >= 0 && Number(strSTTime1) <= 23 )
				{
				}
				else
				{
					Judge = false;
					strResult = strResult + "第1Rスタート展示(時)には正しい時間を入力してください。\n";
				}
			}
		}
		if( strSTTime2 === "--" )
		{
		}else if( strSTTime2 == "" )
		{
			Judge = false;
			strResult = strResult + "第1Rスタート展示(分)を入力してください。\n";
		}
		else
		{
			if( isNaN( strSTTime2 ) == true )
			{
				Judge = false;
				strResult = strResult + "第1Rスタート展示(分)には数値を入力してください。\n";
			}
			else if( strSTTime2.length > 2 )
			{// 2桁以上の時
				Judge = false;
				strResult = strResult + "第1Rスタート展示(分)には必ず2桁以内で入力してください。\n";
			}
			else
			{
				if( Number(strSTTime2) >= 0 && Number(strSTTime2) <= 59 )
				{
				}
				else
				{
					Judge = false;
					strResult = strResult + "第1Rスタート展示(分)には正しい時間を入力してください。\n";
				}
			}
		}

		// 入力漏れがあれば、ミスの画面へ移動
		if(Judge == false)
		{
			clicked=false;
			alert(strResult);
		}
		else
		{

			if( argData2 == 1 ){
				if( funcDateCheck( strStart_Date , strEnd_Date ) == 1 ){
					argData2 = 0 ;
				}
			}
			if(argData2 == 0){
				if(window.confirm('指定日は、本場開催および場外発売がありません。\n開門時刻を保存しますか？'))
				{
					Judge2 = true;
				}else{
					Judge2 = false;
				}
			}

			if(Judge2 == false)
			{
			}else{
				document.InputForm.start_date.value = strStart_Date;
				document.InputForm.end_date.value = strEnd_Date;
				if( document.InputForm['i_check_' + argData + ''][0].checked ){
					document.InputForm.appear_flg.value ='1';
				}else{
					document.InputForm.appear_flg.value ='0';
				}
				document.InputForm.kaimon_time.value = ('0'+ strTime1 ).slice(-2) + '' + ('0'+ strTime2 ).slice(-2) ;
				if( strSTTime1 === "--" )
				{
					strSTTime1 = "00";
				}
				if( strSTTime2 === "--" )
				{
					strSTTime2 = "00";
				}
				document.InputForm.st_time.value = ('0'+ strSTTime1 ).slice(-2) + '' + ('0'+ strSTTime2 ).slice(-2) ;
				document.InputForm.resist_flg.value = '1';
				clicked=true;
				document.InputForm.submit();
			}
		}
	}
	function funcDelete( argData )
	{
		var strStart_Date = "";
		var strEnd_Date = "";
		strStart_Date = document.InputForm['date1_' + argData + ''].value;
		strEnd_Date = document.InputForm['date2_' + argData + ''].value;
		if(window.confirm('削除しますか？'))
		{
			document.InputForm.start_date.value = strStart_Date;
			document.InputForm.end_date.value = strEnd_Date;
			document.InputForm.resist_flg.value = '3';
			clicked=true;
			document.InputForm.submit();
		}else{
		}
	}
	function ALL_Check( argData )
	{
		if( argData == 1 ){
			document.InputForm.appear_flg.value ='1';
		}else if( argData == 0 ){
			document.InputForm.appear_flg.value ='0';
		}
		document.InputForm.resist_flg.value = '2';
		clicked=true;
		document.InputForm.submit();
	}
	function isValidDate(y,m,d){

//		alert(y + '-' + m + '-' + d);

		var di = new Date(y,m-1,d);
		if(di.getFullYear() == y && di.getMonth() == m-1 && di.getDate() == d){
			return true;
		}
		return false;
	}
	function funcDispDate1( argData , argChange , argLen , argData2 )
	{// argLenケタの数値を日付表示に

		var strData = argData;
		var strReturn;

		if( isNaN( strData ) == true )
		{
			document.getElementById(argChange).innerHTML = '---';
			return;
		}

		if( strData.length == argLen )
		{
			strYear = strData.substring(0,4);
			strMonth = strData.substring(4,6);
			strDay = strData.substring(6,8);
			strHour = strData.substring(8,10);
			strMinute = strData.substring(10,12);

			monthEndDay = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

			cal = new Date;

			n_day = 0;

			// 月チェック
			if ((strMonth < 1) || (12 < strMonth)) {

				strReturn = "";
				document.getElementById(argChange).innerHTML = '---';
				return;
			}

			// うるう年計算
			cal.setYear( strYear );
			cal.setMonth( strMonth - 1 );
			n_day = monthEndDay[ strMonth - 1 ];

			if ((strMonth == 2)&&(((strYear%4 == 0)&&(strYear%100 != 0))||(strYear%400 == 0)))
			{
				n_day = 29;
			}

			if ((strDay < 0) || (n_day < strDay)) {
				strReturn = "";
				document.getElementById(argChange).innerHTML = '';
				return;
			}

			// ********** 日付チェック ********** //

			// ********** フォーマット文字列返還 ********** //

			if( argLen == 12 )
			{
				strReturn = strYear + "/" + Number( strMonth ) + "/" + Number( strDay );

				myDay = new Array( "(日)","(月)","(火)","(水)","(木)","(金)","(土)" ); //配列オブジェクトを生成
				myDate = new Date( strYear,strMonth-1,strDay); //指定した時刻を表す日付オブジェクトを作成
				myWeek = myDate.getDay(); //曜日の番号取得


				strReturn = strReturn + myDay[myWeek] + ' ' + strHour + ':' + strMinute;
			}
			else
			{

				strReturn = Number( strYear ) + "/" + Number( strMonth ) + "/" + Number( strDay );

				myDay = new Array( "(日)","(月)","(火)","(水)","(木)","(金)","(土)" ); //配列オブジェクトを生成
				myDate = new Date( strYear,strMonth-1,strDay); //指定した時刻を表す日付オブジェクトを作成
				myWeek = myDate.getDay(); //曜日の番号取得



			}
			document.getElementById(argChange).innerHTML = strReturn;
		}
		else
		{

			document.getElementById(argChange).innerHTML = '';

		}



		if( document.InputForm['date2_' + argData2 + ''].value !== "" ){

			funcDispDate2(document.InputForm['date2_' + argData2 + ''].value,'changedate2_' + argData2 + '',8,argData2);

		}
	}

	function funcDispDate2( argData , argChange , argLen , argData2 )
	{// argLenケタの数値を日付表示に期間版

		var strData = argData;
		var strReturn;

		if( isNaN( strData ) == true )
		{
			document.getElementById(argChange).innerHTML = '---';
			return;
		}

		if( strData.length == argLen )
		{

			strYear = strData.substring(0,4);
			strMonth = strData.substring(4,6);
			strDay = strData.substring(6,8);
			strHour = strData.substring(8,10);
			strMinute = strData.substring(10,12);

			monthEndDay = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

			cal = new Date;

			n_day = 0;

			// 月チェック
			if ((strMonth < 1) || (12 < strMonth)) {

				strReturn = "";
				document.getElementById(argChange).innerHTML = '';
				return;
			}

			// うるう年計算
			cal.setYear( strYear );
			cal.setMonth( strMonth - 1 );
			n_day = monthEndDay[ strMonth - 1 ];

			if ((strMonth == 2)&&(((strYear%4 == 0)&&(strYear%100 != 0))||(strYear%400 == 0)))
			{
				n_day = 29;
			}

			if ((strDay < 0) || (n_day < strDay)) {
				strReturn = "";
				document.getElementById(argChange).innerHTML = '';
				return;
			}

			// ********** 日付チェック ********** //

			// ********** フォーマット文字列返還 ********** //

			if( argLen == 12 )
			{
				strReturn = strYear + "/" + Number( strMonth ) + "/" + Number( strDay );

				myDay = new Array( "(日)","(月)","(火)","(水)","(木)","(金)","(土)" ); //配列オブジェクトを生成
				myDate = new Date( strYear,strMonth-1,strDay); //指定した時刻を表す日付オブジェクトを作成
				myWeek = myDate.getDay(); //曜日の番号取得


				strReturn = strReturn + myDay[myWeek] + ' ' + strHour + ':' + strMinute;
			}
			else
			{


				if( document.InputForm['date2_' + argData2 + ''].value !== "" && document.InputForm['date1_' + argData2 + ''].value.length == 8 ){

					if( strData === document.InputForm['date1_' + argData2 + ''].value ){

						strReturn = "";

					}else{

						if( strData !== "" ){

							if( strData - document.InputForm['date1_' + argData2 + ''].value == 1 ){
							//1日差の時
								strReturn = "・"

							}else{
							//月跨ぎ確認

								var strDate1;
								var strDate2;
								var diff;

								//日付型に変換
								strDate1 = new Date( strYear,strMonth-1,strDay);
								strDate2 = new Date( document.InputForm['date1_' + argData2 + ''].value.substring(0,4),document.InputForm['date1_' + argData2 + ''].value.substring(4,6)-1,document.InputForm['date1_' + argData2 + ''].value.substring(6,8));

//console.log(strDate1);
//console.log(strDate2);
								//差分調査
								diff=(strDate1.getTime()-strDate2.getTime())/(1000*60*60*24);

								if( diff == 1 ){
								//差分が1日の時

									strReturn = "・"

								}else{
								//差分が1日ではない時
									strReturn = "～"

								}

							}

						}else{

							strReturn = "～"

						}

						if( strData.substring(0,6) ===  document.InputForm['date1_' + argData2 + ''].value.substring(0,6) ) {

							strReturn = strReturn + Number( strDay );

						}else{
							if( strData.substring(0,4) ===  document.InputForm['date1_' + argData2 + ''].value.substring(0,4) ) {

								strReturn = strReturn + Number( strMonth ) + "/" + Number( strDay );
							}else{
								strReturn = strReturn + Number( strYear ) + "/" + Number( strMonth ) + "/" + Number( strDay );
							}

						}

						myDay = new Array( "(日)","(月)","(火)","(水)","(木)","(金)","(土)" ); //配列オブジェクトを生成
						myDate = new Date( strYear,strMonth-1,strDay); //指定した時刻を表す日付オブジェクトを作成
						myWeek = myDate.getDay(); //曜日の番号取得


					}

				}else{

					strReturn = Number( strMonth ) + "/" + Number( strDay );

					myDay = new Array( "(日)","(月)","(火)","(水)","(木)","(金)","(土)" ); //配列オブジェクトを生成
					myDate = new Date( strYear,strMonth-1,strDay); //指定した時刻を表す日付オブジェクトを作成
					myWeek = myDate.getDay(); //曜日の番号取得



				}



			}


			document.getElementById(argChange).innerHTML = strReturn;
		}
		else
		{
			document.getElementById(argChange).innerHTML = '';
		}
	}
	function funcPreview( argType )
	{
		// 入力漏れがあればfalseに変化
		Judge = true;
		strResult = "";
		strResult2 = "";
		var intMojiCount;
		var intLoopCount;

		if( document.InputForm.preDate.value == "" )
		{
			Judge = false;
			strResult = strResult + "プレビュー日付を入力してください。\n";
		}
		else
		{
			if( isNaN( document.InputForm.preDate.value ) == true )
			{
				Judge = false;
				strResult = strResult + "プレビュー日付には数値を入力してください。\n";
			}
			else if( document.InputForm.preDate.value.length < 8 )
			{// 12文字以下の時
				Judge = false;
				strResult = strResult + "プレビュー日付には必ず8文字で入力してください。\n";
			}
			else
			{
				if( isValidDate(parseInt(document.InputForm.preDate.value.substr(0, 4),10),parseInt(document.InputForm.preDate.value.substr(4, 2),10),parseInt(document.InputForm.preDate.value.substr(6, 2),10)) )
				{

				}
				else
				{
					Judge = false;
					strResult = strResult + "プレビュー日付には正しい日付で入力してください。\n";
				}
			}
		}

		// 入力漏れがあれば、ミスの画面へ移動
		if(Judge == false)
		{
			clicked=false;
			alert(strResult);
		}
		else
		{

			w = window.open("","Preview","menubar=yes,toolbar=yes,location=yes,status=yes,resizable=yes,scrollbars=yes");

			if( argType == 3 ){

				w.document.location.href = "/k/index.asp?preview=1&yd=" + document.InputForm.preDate.value + "";

			}else if( argType == 2 ){

				w.document.location.href = "/asp/tsu/sp/topdisplay/indexspoutput.asp?check=1&yd=" + document.InputForm.preDate.value + "";

			}else{

				w.document.location.href = "/asp/tsu/topdisplay/indexoutput.asp?check=1&yd=" + document.InputForm.preDate.value + "";

			}

		}

	}
</script>
@endsection