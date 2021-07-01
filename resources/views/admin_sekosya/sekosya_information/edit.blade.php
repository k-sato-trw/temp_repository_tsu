@extends('layouts.admin_sekosya_layout')

@section('title', 'インフォメーション　編集')

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
@endsection

@section('content')
<form action="" name="InputForm" method="post" enctype="MultiPart/Form-Data">
	<div id="warapper" style="width: 980px; margin:0 auto;">
		@if($information->APPEAR_FLG)
			@if($information->END_DATE && $information->END_DATE < date("YmdHi"))
				<span id="id_AppearView"><div class="end_tit">公開終了</div></span>
			@else
				@if($information->START_DATE > date("YmdHi"))
					<span id="id_AppearView"><div class="save_tit">公開前</div></span>
				@else
					<span id="id_AppearView"><div class="open_tit">公開中</div></span>
				@endif
			@endif
		@else
			<span id="id_AppearView"><div class="end_tit">非掲載</div></span>
		@endif
	<!--a href="" class="info_clear">ALLクリア</a-->
	<div class="clear"></div>
	<!--▼▼▼本文▼▼▼-->
	<div id="information">



		<div id="msg">
			<div id="msg_l"><h2>【記事カテゴリ】</h2></div><!--/#msg_l-->
		
			<div id="msg_r" class="radio">
				<label>
					<input type="radio" name="kubun" value="1" @if(old('kubun', $information->TYPE) == "1") checked @endif>
					<span>更新</span>
				</label>
				<label>
					<input type="radio" name="kubun" value="2" @if(old('kubun', $information->TYPE) == "2") checked @endif>
					<span>お知らせ</span>
				</label>
				<label>
					<input type="radio" name="kubun" value="3" @if(old('kubun', $information->TYPE) == "3") checked @endif>
					<span>重要</span>
				</label>
			</div><!--/#msg_r-->
			
			<div class="clear"></div>
		</div><!--/#msg-->
		
		
		
		<div id="msg">
			<div id="msg_l"><h2>【表示デバイス】</h2></div><!--/#msg_l-->
			
			<div id="msg_r" class="checkbox">
				<label id="devic01_check" class="c_on"><input type="checkbox" name="devic01" value="1" @if(old('devic01', $information->PC_APPEAR_FLG)) checked @endif><span class="pc">PC</span></label>
				<label id="devic02_check" class="c_on"><input type="checkbox" name="devic02" value="1" @if(old('devic02', $information->SP_APPEAR_FLG)) checked @endif><span>スマホ</span></label>
				<label id="devic03_check" class="c_on"><input type="checkbox" name="devic03" value="1" @if(old('devic03', $information->MB_APPEAR_FLG)) checked @endif><span>ケータイ</span></label>
			</div><!--/#msg_r-->
			<div class="clear"></div>
		</div><!--/#msg-->
		
		
		
		<div id="msg">
		<div id="msg_l">
			<h2>【掲載<span class="msg_time">開始</span>日】</h2>
		</div><!--/#msg_l-->
		
		<div id="msg_r">
		<input name="date1" type="text" value="{{ old('date1', $information->START_DATE) }}" size="14" maxlength="12" onblur="javascript:MojiCheck();funcDispDate1(document.InputForm.date1.value,'changedate1',12);" class="fm_date">
		<span class="date01" id="changedate1">2021年5月12日(水) 00:00</span>
		</div><!--/#msg_r-->
		<div class="clear"></div>
		</div><!--/#msg-->
		
		
		
		<div id="msg">
		<div id="msg_l">
		<h2>【掲載<span class="msg_time">終了</span>日】</h2>
		</div><!--/#msg_l-->
		
		<div id="msg_r">
		<input name="date2" type="text" value="{{ old('date2', $information->END_DATE) }}" size="14" maxlength="12" onblur="javascript:MojiCheck();funcDispDate1(document.InputForm.date2.value,'changedate2',12);" class="fm_date">
		
		<span class="date01" id="changedate2">2021年5月27日(木) 23:59</span>
		</div><!--/#msg_r-->
		<div class="clear"></div>
		</div><!--/#msg-->
		
		
		
		
		<div id="msg">
		<div id="msg_l">
		<h2>【表示日付】</h2>
		</div><!--/#msg_l-->
		
		<div id="msg_r">
		<input name="date3" type="text" value="{{ old('date3', $information->VIEW_DATE) }}" size="14" maxlength="8" onblur="MojiCheck();javascript:funcDispDate1(document.InputForm.date3.value,'changedate3',8);" class="fm_date">
		
		<span class="date01" id="changedate3">5月12日(水)</span>
		</div><!--/#msg_r-->
		<div class="clear"></div>
		</div><!--/#msg-->
		
		
		
		<div id="msg">
		<div id="msg_l"><h2>【「NEW」アイコン】</h2></div><!--/#msg_l-->
		
		<div id="msg_r" class="checkbox_new">
		<label id="New_flg_check" class=""><input type="checkbox" name="New_flg" value="1" @if(old('New_flg', $information->NEW_FLG)) checked @endif><span>表示<span>※デフォルト3日間。</span></span></label>
		</div><!--/#msg_r-->
		
		
		<div class="clear"></div>
		</div><!--/#msg-->
		
		
		
		<div id="msg">
		<div id="msg_l">
		<h2>【記事タイトル】</h2>
		</div><!--/#msg_l-->
		
		<div id="msg_r">
		
		  <input type="text" name="title" maxlength="54" onkeyup="ShowLength(1);" onblur="javascript:funcLinkCheck();" class="title"  value="{{ old('title', $information->TITLE) }}">
		
		<span class="letters" id="input_title_length"><span>19</span>字</span>
		
		</div><!--/#msg_r-->
		<div class="clear"></div>
		</div><!--/#msg-->
		
		
		
		<div id="msg">
		<div id="msg_l">
		<h2>【HOT NEWS】</h2>
		</div><!--/#msg_l-->
		
		<div id="msg_r" class="hotnews">
			
		
		<label id="head_ttl_check" class=""><input type="checkbox" name="head_ttl" value="1" onclick="setHeadLine(1);"><span>記事タイトルコピー</span></label>
		<label id="head_check_check" class=""><input name="head_check" type="checkbox" value="1" @if(old('head_check', $information->HEADLINE_FLG)) checked @endif><span>HOT NEWSのみに表示</span></label>
		<input type="text" name="head_ttl_txt" maxlength="54" onkeyup="ShowLength(2);" onblur="javascript:funcLinkCheck();" class="title" value="{{old('head_ttl_txt', $information->HEADLINE_TITLE)}}">
		 <span class="letters" id="input_head_length"><span>0</span>字</span>
		
		</div><!--/#msg_r-->
		<div class="clear"></div>
		</div><!--/#msg-->
		
		
		
		
		<div id="msg">
		<div id="msg_l">
		<h2>【リンク指定】</h2>
		　→タイトル、<br>
		　　HOT NEWS用
		</div><!--/#msg_l-->
		
		<div id="msg_r" class="link">
		<span class="midashi pc">PC</span><input name="link_pc" type="text" value="{{ old('link_pc', $information->PC_LINK) }}" size="14" maxlength="128" onblur="javascript:funcLinkCheck();" class="title">  <label id="link_pc_check_check" class=""><input name="link_pc_check" type="checkbox" value="1" @if(old('link_pc_check', $information->PC_LINK_WINDOW_FLG)) checked @endif ><span>別画面フラグ</span></label>
		<span class="midashi">スマホ</span><input name="link_sp" type="text" value="{{ old('link_sp', $information->SP_LINK) }}" size="14" maxlength="128" onblur="javascript:funcLinkCheck();" class="title"><label id="link_sp_check_check" class=""><input name="link_sp_check" type="checkbox" value="1" @if(old('link_sp_check', $information->SP_LINK_WINDOW_FLG)) checked @endif ><span>別画面フラグ</span></label>
		<span class="midashi">ケータイ</span><input name="link_mb" type="text" value="{{ old('link_mb', $information->MB_LINK) }}" size="14" maxlength="128" onblur="javascript:funcLinkCheck();" class="title"> <label id="link_mb_check_check" class=""><input name="link_mb_check" type="checkbox" value="1" @if(old('link_mb_check', $information->MB_LINK_WINDOW_FLG)) checked @endif ><span>別画面フラグ</span></label>
		</div><!--/#msg_r-->
		<div class="clear"></div>
		</div><!--/#msg-->
		
		
		
		
		<div id="msg">
		<div id="msg_l">
		<h2>【本文】</h2>
		　<a href="/asp/tsu/admin/nba_hint.asp" target="_blank">→文字装飾</a>
		</div><!--/#msg_l-->
		
		<div id="msg_r">
		<textarea rows="18" class="fm_msg" type="text" name="main_txt" maxlength="2000">{!! old('main_txt', $information->TEXT) !!}</textarea>
		</div><!--/#msg_r-->
		<div class="clear"></div>
		</div><!--/#msg-->
		
		
		
		
		
		<div id="msg">
		<div id="msg_l">
		<h2>【画像】</h2>
		　→1枚に付き2M以内
		</div><!--/#msg_l-->
		
		<div id="msg_r" class="upload">
		
		
		<ul id="file_set">
		
		<li>
			@if($information->IMAGE_1)
				<div class="img_sam"><div id="dispimage1"><img src="{{ config('const.IMAGE_PATH.INFORMATION').$information->IMAGE_1 }}" style="max-width: 200px;max-height:120px;"></div></div>
			@else
				<div class="img_sam"><div id="dispimage1"><span>[画像1]<br>登録なし</span></div></div>
			@endif
				<div class="file_area" id="id_file_area1">
					<input type="file" id="image1" name="image1" value="" onchange="funcImage(1);">
				</div>
			@if($information->IMAGE_1)
				<label><span>削除</span><input name="DeleteImage1" type="checkbox" value="1"></label>
			@endif
		</li>
		
		<li>
			@if($information->IMAGE_2)
				<div class="img_sam"><div id="dispimage2"><img src="{{ config('const.IMAGE_PATH.INFORMATION').$information->IMAGE_2 }}" style="max-width: 200px;max-height:120px;"></div></div>
			@else
				<div class="img_sam"><div id="dispimage2"><span>[画像2]<br>登録なし</span></div></div>
			@endif
				<div class="file_area" id="id_file_area2">
					<input type="file" id="image2" name="image2" value="" onchange="funcImage(2);">
				</div>
			@if($information->IMAGE_2)
				<label><span>削除</span><input name="DeleteImage2" type="checkbox" value="1"></label>
			@endif
		</li>
		
		<li>
			@if($information->IMAGE_3)
				<div class="img_sam"><div id="dispimage3"><img src="{{ config('const.IMAGE_PATH.INFORMATION').$information->IMAGE_3 }}" style="max-width: 200px;max-height:120px;"></div></div>
			@else
				<div class="img_sam"><div id="dispimage3"><span>[画像3]<br>登録なし</span></div></div>
			@endif
				<div class="file_area" id="id_file_area3">
					<input type="file" id="image3" name="image3" value="" onchange="funcImage(3);">
				</div>
			@if($information->IMAGE_3)
				<label><span>削除</span><input name="DeleteImage3" type="checkbox" value="1"></label>
			@endif
		</li>
		
		<div class="clear"></div>
		</ul>
		
		
		</div><!--/#msg_r-->
		<div class="clear"></div>
		</div><!--/#msg-->
		
		
		<div id="msg">
		<div id="msg_l">
		<h2>【登録者】</h2>
		</div><!--/#msg_l-->
		
		<div id="msg_r">
		
		<input name="date4" type="text" value="{{ old('date4', $information->EDITOR_NAME) }}" size="14" maxlength="16">
		
		</div><!--/#msg_r-->
		<div class="clear"></div>
		</div><!--/#msg-->
		
		
		</div>
		<!--/#tokuten-->

	</div>

		<div id="footer">

			<div id="footer_in">
			<div id="footer_in_l">
			<ul>
			<li class="save"><input type="button" onclick="javascript:Check('1');" value="保存"></li>
			<li class="preview">プレビュー</li>
			<li class="pv_b"><a href="/asp/tsu/info/info.asp?check=1&amp;year=2021" target="_blank">PC</a></li>
			<li class="pv_b"><a href="/asp/tsu/sp/info/info_SP.asp?check=1&amp;year=2021" target="_blank">スマホ</a></li>
			<li class="pv_b"><a href="/k/k_guide/whatsnew.asp?no=09&amp;jyo=09&amp;check=1" target="_blank">携帯</a></li>
			<div class="clear"></div>
			</ul>
			</div><!--/#fotter_in_l-->
			
			<div id="footer_in_r">
			
			<div id="action_c">
			<span class="open_b"><input type="button" onclick="location.href='/admin_sekosya/information/change_appear_flg/{{$information->ID}}/1'" value="公開"></span>
			<span class="close_b"><input type="button" onclick="location.href='/admin_sekosya/information/change_appear_flg/{{$information->ID}}/0'" value="非公開"></span>
			<div class="clear"></div>
			</div><!--/#action_c-->
			
			<input type="hidden" name="ID" value="656">
			<input type="hidden" name="copy_ID" value="">
			
			<input type="hidden" name="appear_flg" value="1">
			
			<input type="hidden" name="appear_exe_flg" value="">
			
			
			<input type="hidden" name="Delete" value="">
			<input type="hidden" name="Auto_ID" value="ev5444">
			
			<input type="hidden" name="IMAGE1" value="">
			<input type="hidden" name="IMAGE2" value="">
			<input type="hidden" name="IMAGE3" value="">
			
			
			
			<div class="clear"></div>
			</div><!--/#fotter_in_r-->
			
			<div class="clear"></div>
			</div><!--/#fotter_in-->
			
		</div>
	@csrf
</form>
@endsection

@section('script')
<script type="text/javascript" src="/cms/js/jquery-1.8.2.min.js"></script>

<script type="text/javascript" src="/cms/js/jquery.checkbox.js"></script>

<!--SetColor文字除去JS-->
<script type="text/javascript" src="/cms/js/SetColorReplace.js"></script>

<script type="text/javascript">

	function ShowLength( argData )
	{//文字長さ表示
		if( argData == 1 )
		{
			if( document.InputForm.title.value.length > 40 )
			{
				document.getElementById("input_title_length").innerHTML = "<font color='#FF0000'><span>" + document.InputForm.title.value.length + "</span>字</font>";
			}
			else
			{
				document.getElementById("input_title_length").innerHTML = "<span>" + document.InputForm.title.value.length + "</span>字";
			}
		}
		else
		{
			if( funcSetColorReplace( document.InputForm.head_ttl_txt.value ).length > 40 )
			{
				document.getElementById("input_head_length").innerHTML = "<font color='#FF0000'><span>" + funcSetColorReplace( document.InputForm.head_ttl_txt.value ).length + "</span>字</font>";
			}
			else
			{
				document.getElementById("input_head_length").innerHTML = "<span>" + funcSetColorReplace( document.InputForm.head_ttl_txt.value ).length + "</span>字";
			}
		}
	}

	function setHeadLine( argData )
	{
		if( document.InputForm.head_ttl.checked )
		{
			document.InputForm.head_ttl_txt.value = document.InputForm.title.value;

			ShowLength(2);

		}
		else
		{
			//document.InputForm.head_ttl_txt.value = '';
		}
	}


	function funcDispDate1( argData , argChange , argLen )
	{// argLenケタの数値を日付表示に

		var strData = argData;
		var strReturn;

		if( isNaN( strData ) == true )
		{

			if( argLen == 12 ){

				document.getElementById(argChange).innerHTML = '&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;';

			}else if( argLen == 8 ){

				document.getElementById(argChange).innerHTML = '&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;';

			}
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

				if( argLen == 12 ){

					document.getElementById(argChange).innerHTML = '&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;';

				}else if( argLen == 8 ){

					document.getElementById(argChange).innerHTML = '&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;';

				}
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

				if( argLen == 12 ){

					document.getElementById(argChange).innerHTML = '&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;';

				}else if( argLen == 8 ){

					document.getElementById(argChange).innerHTML = '&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;';

				}

				return;
			}

			// ********** 日付チェック ********** //

			// ********** フォーマット文字列返還 ********** //

			if( argLen == 12 )
			{
				strReturn = strYear + "年" + Number( strMonth ) + "月" + Number( strDay ) + "日";

				myDay = new Array( "(日)","(月)","(火)","(水)","(木)","(金)","(土)" ); //配列オブジェクトを生成
				myDate = new Date( strYear,strMonth-1,strDay); //指定した時刻を表す日付オブジェクトを作成
				myWeek = myDate.getDay(); //曜日の番号取得


				strReturn = strReturn + myDay[myWeek] + ' ' + strHour + ':' + strMinute;
			}
			else
			{

				strReturn = Number( strMonth ) + "月" + Number( strDay ) + "日";

				myDay = new Array( "(日)","(月)","(火)","(水)","(木)","(金)","(土)" ); //配列オブジェクトを生成
				myDate = new Date( strYear,strMonth-1,strDay); //指定した時刻を表す日付オブジェクトを作成
				myWeek = myDate.getDay(); //曜日の番号取得


				strReturn = strReturn + myDay[myWeek];

			}
			document.getElementById(argChange).innerHTML = strReturn;
		}
		else
		{

			// s-yoshikawa 20151113 空文字のとき&ensp;で幅調整追加
			if( argLen == 12 ){

				document.getElementById(argChange).innerHTML = '&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;';

			}else if( argLen == 8 ){

				document.getElementById(argChange).innerHTML = '&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;';

			}


		}
	}


// リターンキーで次に進まなくするフラグ
var clicked=false;

	function subPushButton(argSelectType,argID,argStartDate,argEndDate,argType,argViewDate,argInfoTitle,argInfoText,argHeadLineFlg,argHeadLineTitle,argPCFlg,argSPFlg,argMBFlg,argImage1,argImage2,argImage3,argPCURL,argSPURL,argMBURL,argPCLinkAnother,argSPLinkAnother,argMBLinkAnother,argAppearFlg,argEditorName,argAutoID,argNewFlg)
	{// 編集ボタンを押した時の処理

		// 変数宣言
		var strID = "";
		var strStartDate = "";
		var strEndDate = "";
		var strType = "";
		var strViewDate = "";
		var strInfoTitle = "";
		var strInfoText = "";
		var strHeadLineFlg = "";
		var strHeadLineTitle = "";
		var strPCFlg = "";
		var strSPFlg = "";
		var strMBFlg = "";
		var strImage1 = "";
		var strImage2 = "";
		var strImage3 = "";
		var strPCLinkURL = "";
		var strSPLinkURL = "";
		var strMBLinkURL = "";
		var strPCLinkAnother = "";
		var strSPLinkAnother = "";
		var strMBLinkAnother = "";
		var strAppearFlg ="";
		var strEditorName = "";
		var strAutoID ="";

		var intLoopCount = 0;

		// 引数格納
		strID = argID;
		strStartDate = argStartDate;
		strEndDate = argEndDate;
		strType = argType;
		strViewDate = argViewDate;
		strInfoTitle = argInfoTitle;
		strInfoText = argInfoText;

		strInfoText = replaceAll(strInfoText, "<改行>", "\r\n");

		strHeadLineFlg = argHeadLineFlg;
		strHeadLineTitle = argHeadLineTitle;
		strPCFlg = argPCFlg;
		strSPFlg = argSPFlg;
		strMBFlg = argMBFlg;
		strImage1 = argImage1;
		strImage2 = argImage2;
		strImage3 = argImage3;
		strPCLinkURL = argPCURL;
		strSPLinkURL = argSPURL;
		strMBLinkURL = argMBURL;
		strPCLinkAnother = argPCLinkAnother;
		strSPLinkAnother = argSPLinkAnother;
		strMBLinkAnother = argMBLinkAnother;
		strAppearFlg = argAppearFlg;
		strEditorName = argEditorName;
		strAutoID = argAutoID;
		strNewFlg = argNewFlg;

		if( argSelectType == 2 )
		{
			// hidden項目
			document.InputForm.ID.value = "";
			document.InputForm.copy_ID.value = strID;
		}
		else
		{
			// hidden項目
			document.InputForm.ID.value = strID;
			document.InputForm.copy_ID.value = "";
		}

		if( argSelectType == 2 )
		{
		}
		else
		{
			// 日程開始日
			document.InputForm.date1.value = strStartDate;
			funcDispDate1(document.InputForm.date1.value,'changedate1',12);

			// 日程終了日
			document.InputForm.date2.value = strEndDate;
			funcDispDate1(document.InputForm.date2.value,'changedate2',12);

			// 表示日付
			document.InputForm.date3.value = strViewDate;
			funcDispDate1(document.InputForm.date3.value,'changedate3',8);
		}

		// インフォタイトル
		document.InputForm.title.value = strInfoTitle;
		ShowLength(1);

		// インフォ本文
		document.InputForm.main_txt.value = strInfoText;

		// ヘッドラインタイトル
		document.InputForm.head_ttl_txt.value = strHeadLineTitle;
		ShowLength(2);

		if( document.InputForm.title.value !== "" && document.InputForm.head_ttl_txt.value !== ""){
		//どちらもデータ有るとき

			if( document.InputForm.title.value === document.InputForm.head_ttl_txt.value ){
			//ヘッドラインと同じだった時

				document.InputForm.head_ttl.checked = true;
				document.getElementById("head_ttl_check").className = "c_on";

			}else{
				document.InputForm.head_ttl.checked = false;
				document.getElementById("head_ttl_check").className = "";
			}

		}else{
			document.InputForm.head_ttl.checked = false;
			document.getElementById("head_ttl_check").className = "";
		}

		// PCurl
		document.InputForm.link_pc.value = strPCLinkURL;

		// スマホurl
		document.InputForm.link_sp.value = strSPLinkURL;

		// ケータイurl
		document.InputForm.link_mb.value = strMBLinkURL;

		// 担当者
		document.InputForm.date4.value = strEditorName;

		if( strPCFlg != "1" )
		{
			// チェック外す
			document.InputForm.devic01.checked = false;
			document.getElementById("devic01_check").className = "";

		}
		else
		{
			// チェックつける
			document.InputForm.devic01.checked = true;
			document.getElementById("devic01_check").className = "c_on";
		}

		if( strSPFlg != "1" )
		{
			// チェック外す
			document.InputForm.devic02.checked = false;
			document.getElementById("devic02_check").className = "";
		}
		else
		{
			// チェックつける
			document.InputForm.devic02.checked = true;
			document.getElementById("devic02_check").className = "c_on";
		}

		if( strMBFlg != "1" )
		{
			// チェック外す
			document.InputForm.devic03.checked = false;
			document.getElementById("devic03_check").className = "";
		}
		else
		{
			// チェックつける
			document.InputForm.devic03.checked = true;
			document.getElementById("devic03_check").className = "c_on";
		}

		if( strHeadLineFlg != "1" )
		{
			// チェック外す
			document.InputForm.head_check.checked = false;
			document.getElementById("head_check_check").className = "";
		}
		else
		{
			// チェックつける
			document.InputForm.head_check.checked = true;
			document.getElementById("head_check_check").className = "c_on";
		}


		if( strPCLinkAnother != "1" )
		{
			// チェック外す
			document.InputForm.link_pc_check.checked = false;
			document.getElementById("link_pc_check_check").className = "";
		}
		else
		{
			// チェックつける
			document.InputForm.link_pc_check.checked = true;
			document.getElementById("link_pc_check_check").className = "c_on";
		}

		if( strSPLinkAnother != "1" )
		{
			// チェック外す
			document.InputForm.link_sp_check.checked = false;
			document.getElementById("link_sp_check_check").className = "";
		}
		else
		{
			// チェックつける
			document.InputForm.link_sp_check.checked = true;
			document.getElementById("link_sp_check_check").className = "c_on";
		}

		if( strMBLinkAnother != "1" )
		{
			// チェック外す
			document.InputForm.link_mb_check.checked = false;
			document.getElementById("link_mb_check_check").className = "";
		}
		else
		{
			// チェックつける
			document.InputForm.link_mb_check.checked = true;
			document.getElementById("link_mb_check_check").className = "c_on";
		}

		for( i=0;i<=2;i++ )
		{

			if( strType == document.InputForm.kubun[i].value )
			{
				document.InputForm.kubun[i].checked = true;
			}
			else
			{
				document.InputForm.kubun[i].checked = false;
			}
		}

		// 一旦初期化
		document.getElementById("dispimage1").innerHTML = "<span>[画像1]<br>登録なし</span>";
		document.getElementById("dispimage2").innerHTML = "<span>[画像2]<br>登録なし</span>";
		document.getElementById("dispimage3").innerHTML = "<span>[画像3]<br>登録なし</span>";

		document.getElementById("id_file_area1").className = "file_area"
		document.getElementById("id_file_area2").className = "file_area"
		document.getElementById("id_file_area3").className = "file_area"

		if( strImage1 != "" )
		{
			document.getElementById("dispimage1").innerHTML = "<img width='180' height='110' src='/asp/htmlmade/tsu/info/uploadimages/" + strImage1 + "' />";
			document.InputForm.IMAGE1.value = strImage1;

		}

		if( strImage2 != "" )
		{
			document.getElementById("dispimage2").innerHTML = "<img width='180' height='110' src='/asp/htmlmade/tsu/info/uploadimages/" + strImage2 + "' />";
			document.InputForm.IMAGE2.value = strImage2;
		}

		if( strImage3 != "" )
		{
			document.getElementById("dispimage3").innerHTML = "<img width='180' height='110' src='/asp/htmlmade/tsu/info/uploadimages/" + strImage3 + "' />";
			document.InputForm.IMAGE3.value = strImage3;

		}


		if( strAppearFlg === "1" ){
		//公開中

			if( document.InputForm.date1.value >= 202105201037 ){
				document.getElementById("id_AppearView").innerHTML = "<div class=\"save_tit\">公開前</div>";
			}else if( document.InputForm.date2.value !== "" ){

				if( document.InputForm.date2.value <= 202105201037 ){
					document.getElementById("id_AppearView").innerHTML = "<div class=\"end_tit\">公開終了</div>";
				}else{
					document.getElementById("id_AppearView").innerHTML = "<div class=\"open_tit\">公開中</div>";
				}

			}else{
				document.getElementById("id_AppearView").innerHTML = "<div class=\"open_tit\">公開中</div>";
			}

		}else if( strAppearFlg === "0" ){
		//非公開
			document.getElementById("id_AppearView").innerHTML = "<div class=\"save_tit\">保存(非公開)</div>";
		}else{
		//なし？
			document.getElementById("id_AppearView").innerHTML = "<div class=\"new_tit\">新規入力</div>";
		}


		document.InputForm.appear_flg.value = strAppearFlg;

		// AutoID
		document.InputForm.Auto_ID.value = argAutoID;


		if( strNewFlg != "1" )
		{
			// チェック外す
			document.InputForm.New_flg.checked = false;
			document.getElementById("New_flg_check").className = "";
		}
		else
		{
			// チェックつける
			document.InputForm.New_flg.checked = true;
			document.getElementById("New_flg_check").className = "c_on";
		}


		// ページ先頭に
		scrollTo(0,110);
	}

	function subPushButtonDelete(argSelectType,argID,argStartDate,argEndDate,argType,argViewDate,argInfoTitle,argInfoText,argHeadLineFlg,argHeadLineTitle,argPCFlg,argSPFlg,argMBFlg,argImage1,argImage2,argImage3,argPCURL,argSPURL,argMBURL,argPCLinkAnother,argSPLinkAnother,argMBLinkAnother,argAppearFlg,argEditorName,argAutoID,argNewFlg)
	{// 編集ボタンを押した時の処理

		// 入力漏れがあればfalseに変化
		Judge = true;
		strResult = "";
		strResult2 = "";
		var intMojiCount;
		var intLoopCount;


		if(window.confirm('削除しますか？'))
		{
			Judge = true;
		}
		else
		{
			Judge = false;
		}

		// 入力漏れがあれば、ミスの画面へ移動
		if(Judge == false)
		{
			clicked=false;
			document.InputForm.Delete.value = "0";
		}
		else
		{
			clicked=true;

			// 変数宣言
			var strID = "";
			var strStartDate = "";
			var strEndDate = "";
			var strType = "";
			var strViewDate = "";
			var strInfoTitle = "";
			var strInfoText = "";
			var strHeadLineFlg = "";
			var strHeadLineTitle = "";
			var strPCFlg = "";
			var strSPFlg = "";
			var strMBFlg = "";
			var strImage1 = "";
			var strImage2 = "";
			var strImage3 = "";
			var strPCLinkURL = "";
			var strSPLinkURL = "";
			var strMBLinkURL = "";
			var strPCLinkAnother = "";
			var strSPLinkAnother = "";
			var strMBLinkAnother = "";
			var strAppearFlg ="";
			var strEditorName = "";
			var strAutoID ="";
			var strNewFlg ="";

			var intLoopCount = 0;

			// 引数格納
			strID = argID;
			strStartDate = argStartDate;
			strEndDate = argEndDate;
			strType = argType;
			strViewDate = argViewDate;
			strInfoTitle = argInfoTitle;
			strInfoText = argInfoText;

			strInfoText = replaceAll(strInfoText, "<改行>", "\r\n");

			strHeadLineFlg = argHeadLineFlg;
			strHeadLineTitle = argHeadLineTitle;
			strPCFlg = argPCFlg;
			strSPFlg = argSPFlg;
			strMBFlg = argMBFlg;
			strImage1 = argImage1;
			strImage2 = argImage2;
			strImage3 = argImage3;
			strPCLinkURL = argPCURL;
			strSPLinkURL = argSPURL;
			strMBLinkURL = argMBURL;
			strPCLinkAnother = argPCLinkAnother;
			strSPLinkAnother = argSPLinkAnother;
			strMBLinkAnother = argMBLinkAnother;
			strAppearFlg = argAppearFlg;
			strEditorName = argEditorName;
			strAutoID = argAutoID;

			strNewFlg = argNewFlg;

			if( argSelectType == 2 )
			{
				// hidden項目
				document.InputForm.ID.value = "";
				document.InputForm.copy_ID.value = strID;
			}
			else
			{
				// hidden項目
				document.InputForm.ID.value = strID;
				document.InputForm.copy_ID.value = "";
			}

			if( argSelectType == 2 )
			{
			}
			else
			{
				// 日程開始日
				document.InputForm.date1.value = strStartDate;
				funcDispDate1(document.InputForm.date1.value,'changedate1',12);

				// 日程終了日
				document.InputForm.date2.value = strEndDate;
				funcDispDate1(document.InputForm.date2.value,'changedate2',12);

				// 表示日付
				document.InputForm.date3.value = strViewDate;
				funcDispDate1(document.InputForm.date3.value,'changedate3',8);
			}

			// インフォタイトル
			document.InputForm.title.value = strInfoTitle;
			ShowLength(1);

			// インフォ本文
			document.InputForm.main_txt.value = strInfoText;

			// ヘッドラインタイトル
			document.InputForm.head_ttl_txt.value = strHeadLineTitle;
			ShowLength(2);

			if( document.InputForm.title.value !== "" && document.InputForm.head_ttl_txt.value !== ""){
			//どちらもデータ有るとき

				if( document.InputForm.title.value === document.InputForm.head_ttl_txt.value ){
				//ヘッドラインと同じだった時

					document.InputForm.head_ttl.checked = true;
					document.getElementById("head_ttl_check").className = "c_on";

				}else{
					document.InputForm.head_ttl.checked = false;
					document.getElementById("head_ttl_check").className = "";
				}

			}else{
				document.InputForm.head_ttl.checked = false;
				document.getElementById("head_ttl_check").className = "";
			}

			// PCurl
			document.InputForm.link_pc.value = strPCLinkURL;

			// スマホurl
			document.InputForm.link_sp.value = strSPLinkURL;

			// ケータイurl
			document.InputForm.link_mb.value = strMBLinkURL;

			// 担当者
			document.InputForm.date4.value = strEditorName;

			if( strPCFlg != "1" )
			{
				// チェック外す
				document.InputForm.devic01.checked = false;
				document.getElementById("devic01_check").className = "";

			}
			else
			{
				// チェックつける
				document.InputForm.devic01.checked = true;
				document.getElementById("devic01_check").className = "c_on";
			}

			if( strSPFlg != "1" )
			{
				// チェック外す
				document.InputForm.devic02.checked = false;
				document.getElementById("devic02_check").className = "";
			}
			else
			{
				// チェックつける
				document.InputForm.devic02.checked = true;
				document.getElementById("devic02_check").className = "c_on";
			}

			if( strMBFlg != "1" )
			{
				// チェック外す
				document.InputForm.devic03.checked = false;
				document.getElementById("devic03_check").className = "";
			}
			else
			{
				// チェックつける
				document.InputForm.devic03.checked = true;
				document.getElementById("devic03_check").className = "c_on";
			}

			if( strHeadLineFlg != "1" )
			{
				// チェック外す
				document.InputForm.head_check.checked = false;
				document.getElementById("head_check_check").className = "";
			}
			else
			{
				// チェックつける
				document.InputForm.head_check.checked = true;
				document.getElementById("head_check_check").className = "c_on";
			}


			if( strPCLinkAnother != "1" )
			{
				// チェック外す
				document.InputForm.link_pc_check.checked = false;
				document.getElementById("link_pc_check_check").className = "";
			}
			else
			{
				// チェックつける
				document.InputForm.link_pc_check.checked = true;
				document.getElementById("link_pc_check_check").className = "c_on";
			}

			if( strSPLinkAnother != "1" )
			{
				// チェック外す
				document.InputForm.link_sp_check.checked = false;
				document.getElementById("link_sp_check_check").className = "";
			}
			else
			{
				// チェックつける
				document.InputForm.link_sp_check.checked = true;
				document.getElementById("link_sp_check_check").className = "c_on";
			}

			if( strMBLinkAnother != "1" )
			{
				// チェック外す
				document.InputForm.link_mb_check.checked = false;
				document.getElementById("link_mb_check_check").className = "";
			}
			else
			{
				// チェックつける
				document.InputForm.link_mb_check.checked = true;
				document.getElementById("link_mb_check_check").className = "c_on";
			}


			for( i=0;i<=2;i++ )
			{

				if( strType == document.InputForm.kubun[i].value )
				{
					document.InputForm.kubun[i].checked = true;
				}
				else
				{
					document.InputForm.kubun[i].checked = false;
				}
			}

			// 一旦初期化
			document.getElementById("dispimage1").innerHTML = "<span>[画像1]<br>登録なし</span>";
			document.getElementById("dispimage2").innerHTML = "<span>[画像2]<br>登録なし</span>";
			document.getElementById("dispimage3").innerHTML = "<span>[画像3]<br>登録なし</span>";

			if( strImage1 != "" )
			{
				document.getElementById("dispimage1").innerHTML = "<img width='180' height='110' src='/asp/htmlmade/tsu/info/uploadimages/" + strImage1 + "' />";
				document.InputForm.IMAGE1.value = strImage1;
			}

			if( strImage2 != "" )
			{
				document.getElementById("dispimage2").innerHTML = "<img width='180' height='110' src='/asp/htmlmade/tsu/info/uploadimages/" + strImage2 + "' />";
				document.InputForm.IMAGE2.value = strImage2;
			}

			if( strImage3 != "" )
			{
				document.getElementById("dispimage3").innerHTML = "<img width='180' height='110' src='/asp/htmlmade/tsu/info/uploadimages/" + strImage3 + "' />";
				document.InputForm.IMAGE3.value = strImage3;
			}

			// PCurl
			document.InputForm.Auto_ID.value = argAutoID;

			if( strNewFlg != "1" )
			{
				// チェック外す
				document.InputForm.New_flg.checked = false;
				document.getElementById("New_flg_check").className = "";
			}
			else
			{
				// チェックつける
				document.InputForm.New_flg.checked = true;
				document.getElementById("New_flg_check").className = "c_on";
			}


			document.InputForm.appear_flg.value = strAppearFlg;

			if( strAppearFlg === "1" ){
			//公開中

				if( document.InputForm.date1.value >= 202105201037 ){
					document.getElementById("id_AppearView").innerHTML = "<div class=\"save_tit\">公開前</div>";
				}else if( document.InputForm.date2.value !== "" ){

					if( document.InputForm.date2.value <= 202105201037 ){
						document.getElementById("id_AppearView").innerHTML = "<div class=\"end_tit\">公開終了</div>";
					}else{
						document.getElementById("id_AppearView").innerHTML = "<div class=\"open_tit\">公開中</div>";
					}

				}else{
					document.getElementById("id_AppearView").innerHTML = "<div class=\"open_tit\">公開中</div>";
				}

			}else if( strAppearFlg === "0" ){
			//非公開
				document.getElementById("id_AppearView").innerHTML = "<div class=\"save_tit\">保存(非公開)</div>";
			}else{
			//なし？
				document.getElementById("id_AppearView").innerHTML = "<div class=\"new_tit\">新規入力</div>";
			}

			document.InputForm.Delete.value = "1";

			document.InputForm.submit();

		}

	}

	function Check( argData )
	{
		// 入力漏れがあればfalseに変化
		Judge = true;
		strResult = "";
		strResult2 = "";
		var intMojiCount;
		var intLoopCount;

		if( document.InputForm.date1.value == "" )
		{
			Judge = false;
			strResult = strResult + "掲載開始日時を入力してください。\n";
		}
		else
		{
			if( isNaN( document.InputForm.date1.value ) == true )
			{
				Judge = false;
				strResult = strResult + "掲載開始日時には数値を入力してください。\n";
			}
			else if( document.InputForm.date1.value.length < 12 )
			{// 12文字以下の時
				Judge = false;
				strResult = strResult + "掲載開始日時には必ず12文字で入力してください。\n";
			}
			else
			{
				if( isValidDate(parseInt(document.InputForm.date1.value.substr(0, 4),10),parseInt(document.InputForm.date1.value.substr(4, 2),10),parseInt(document.InputForm.date1.value.substr(6, 2),10)) )
				{
					if( document.InputForm.date1.value.substr(8, 2) > 23 )
					{
						Judge = false;
						strResult = strResult + "掲載開始日時の時間は00～23を指定してください。\n";
					}
					else if( document.InputForm.date1.value.substr(10, 2) > 59 )
					{
						Judge = false;
						strResult = strResult + "掲載開始日時の分は00～59を指定してください。\n";
					}
				}
				else
				{
					Judge = false;
					strResult = strResult + "掲載開始日時には正しい日付で入力してください。\n";
				}
			}
		}


		if( document.InputForm.date2.value == "" )
		{
			//Judge = false;
			//strResult = strResult + "掲載終了日時を入力してください。\n";
		}
		else
		{
			if( isNaN( document.InputForm.date2.value ) == true )
			{
				Judge = false;
				strResult = strResult + "掲載終了日時には数値を入力してください。\n";
			}
			else if( document.InputForm.date2.value.length < 12 )
			{// 12文字以下の時
				Judge = false;
				strResult = strResult + "掲載終了日時には必ず12文字で入力してください。\n";
			}
			else
			{
				if( isValidDate(parseInt(document.InputForm.date2.value.substr(0, 4),10),parseInt(document.InputForm.date2.value.substr(4, 2),10),parseInt(document.InputForm.date2.value.substr(6, 2),10)) )
				{
					if( document.InputForm.date2.value.substr(8, 2) > 23 )
					{
						Judge = false;
						strResult = strResult + "掲載終了日時の時間は0～23を指定してください。\n";
					}
					else if( document.InputForm.date2.value.substr(10, 2) > 59 )
					{
						Judge = false;
						strResult = strResult + "掲載終了日時の分は0～59を指定してください。\n";
					}
					else if( document.InputForm.date1.value > document.InputForm.date2.value  )
					{
						Judge = false;
						strResult = strResult + "掲載終了日時には掲載開始日時より新しい日付で入力してください。\n";
					}
				}
				else
				{
					Judge = false;
					strResult = strResult + "掲載終了日時には正しい日付で入力してください。\n";
				}
			}
		}



		if( document.InputForm.date3.value == "" )
		{
			Judge = false;
			strResult = strResult + "表示日付を入力してください。\n";
		}
		else
		{
			if( isNaN( document.InputForm.date3.value ) == true )
			{
				Judge = false;
				strResult = strResult + "表示日付には数値を入力してください。\n";
			}
			else if( document.InputForm.date3.value.length < 8 )
			{// 8文字以下の時
				Judge = false;
				strResult = strResult + "表示日付には必ず8文字で入力してください。\n";
			}
			else
			{
				if( isValidDate(parseInt(document.InputForm.date3.value.substr(0, 4),10),parseInt(document.InputForm.date3.value.substr(4, 2),10),parseInt(document.InputForm.date3.value.substr(6, 2),10)) )
				{
				}
				else
				{
					Judge = false;
					strResult = strResult + "表示日付には正しい日付で入力してください。\n";
				}
			}
		}

		if( document.InputForm.title.value == "" )
		{

			if( document.InputForm.head_check.checked == false )
			{//ヘッドラインのみの場合

				Judge = false;
				strResult = strResult + "記事タイトルを入力してください。\n";

			}
		}
		else if( document.InputForm.title.value.length > 54 )
		{// 40文字超える時
			Judge = false;
			strResult = strResult + "記事タイトルは54文字以内で入力してください。\n";
		}


		if( document.InputForm.head_ttl_txt.value != "" )
		{
			if( funcSetColorReplace( document.InputForm.head_ttl_txt.value ).length > 54 )
			{// 40文字超える時
				Judge = false;
				strResult = strResult + "ヘッドラインは54文字以内で入力してください。\n";
			}
		}


		if(document.InputForm.main_txt.value != "")
		{
			if( funcSetColorReplace( document.InputForm.main_txt.value ).length > 2000)
			{
				Judge = false;
				strResult = strResult + "本文は2000文字以内で入力して下さい。\n"
			}
		}

		if( document.InputForm.date4.value == "" )
		{
			Judge = false;
			strResult = strResult + "登録者を入力してください。\n";
		}


		if(document.InputForm.link_pc.value != "")
		{
			if( funcSetColorReplace( document.InputForm.link_pc.value ).length > 128)
			{
				Judge = false;
				strResult = strResult + "PCリンクは128文字以内で入力して下さい。\n"
			}
		}

		if(document.InputForm.link_sp.value != "")
		{
			if( funcSetColorReplace( document.InputForm.link_sp.value ).length > 128)
			{
				Judge = false;
				strResult = strResult + "SPリンクは128文字以内で入力して下さい。\n"
			}
		}


		if(document.InputForm.link_mb.value != "")
		{
			if( funcSetColorReplace( document.InputForm.link_mb.value ).length > 128)
			{
				Judge = false;
				strResult = strResult + "MBリンクは128文字以内で入力して下さい。\n"
			}
		}


		if( argData == "1" )
		{
			//document.InputForm.appear_flg.value = "";
			document.InputForm.appear_exe_flg.value = "3";

		}
		else if( argData == "2" )
		{
			document.InputForm.appear_flg.value = "1";
			document.InputForm.appear_exe_flg.value = "2";

			if( strResult == "" && document.InputForm.ID.value == "" )
			{
				Judge = false;
				strResult = strResult + "記事が保存されていません\n";
			}
		}
		else if( argData == "3" )
		{
			document.InputForm.appear_flg.value = "0";
			document.InputForm.appear_exe_flg.value = "0";

			if( strResult == "" && document.InputForm.ID.value == "" )
			{
				Judge = false;
				strResult = strResult + "記事が保存されていません\n";
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
			clicked=true;

			document.InputForm.submit();
		}
	}

	function funcImage( argData )
	{

		//document.file_area.style.backgroundImage = "/CMS/CMS_contents/images/info_btn_file_select.png";

		document.getElementById("id_file_area" + argData + "").className = "file_area1"

		//document.getElementById("id_file_area" + argData + "").style.backgroundImage = "/CMS/CMS_contents/images/info_btn_file_select.png";

	}

	function isValidDate(y,m,d){

//		alert(y + '-' + m + '-' + d);

		var di = new Date(y,m-1,d);
		if(di.getFullYear() == y && di.getMonth() == m-1 && di.getDate() == d){
			return true;
		}
		return false;
	}

	function replaceAll(expression, org, dest)
	{
		return expression.split(org).join(dest);
	}


	function funcCopyClick( argData )
	{

		clicked=true;
		document.InputForm.copy_ID.value = argData;
		document.InputForm.action = "cms_info.asp";
		document.InputForm.submit();
	}


	function bodyonLoad()
	{
		funcDispDate1(document.InputForm.date1.value,'changedate1',12);

		funcDispDate1(document.InputForm.date2.value,'changedate2',12);

		funcDispDate1(document.InputForm.date3.value,'changedate3',8);

	}
	bodyonLoad();


	function funcLink()
	{
		location.href = "cms_info.asp";
	}

	function funcLinkCheck()
	//PC/SP/MBリンクとか入ったら本文に入れないようにする。
	{

		//if( document.InputForm.link_pc.value !== "" && document.InputForm.link_sp.value !== "" && document.InputForm.link_mb.value !== "" && ( document.InputForm.title.value !== "" || document.InputForm.head_ttl.value !== "" ) ){

		//	document.InputForm.main_txt.disabled=true;
		//	document.InputForm.main_txt.value = ""

		//}else{

		//	document.InputForm.main_txt.disabled=false;

		//}

	}



// 文字チェックする
function MojiCheck()
{
	document.InputForm.date1.value = funcStr2to1(document.InputForm.date1.value);
	document.InputForm.date2.value = funcStr2to1(document.InputForm.date2.value);
	document.InputForm.date3.value = funcStr2to1(document.InputForm.date3.value);
}

//２バイト文字を１バイトに変換
function funcStr2to1(strTarget)
{

	var strResult	= "";
	var strBefore	= "０１２３４５６７８９－()ＡＢＣＤＥＦＧＨＩＪＫＬＮＭＯＰＱＲＳＴＵＶＷＸＹＺａｂｃｄｅｆｇｈｉｊｋｌｎｍｏｐｑｒｓｔｕｖｗｘｙｚ＠．";
	var strAfter	= "0123456789-()ABCDEFGHIJKLNMOPQRSTUVWXYZabcdefghijklnmopqrstuvwxyz@.";
	var ch;
	var pos;

	if(strTarget != null)
	{

		for(i = 0; i < strTarget.length; i++) 
		{
			strResult += (pos = strBefore.indexOf(ch = strTarget.charAt(i))) >= 0 ? strAfter.charAt(pos) : ch;
		}
	}

	return strResult;

}

</script>
@endsection