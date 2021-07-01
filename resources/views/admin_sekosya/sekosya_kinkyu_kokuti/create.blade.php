@extends('layouts.admin_sekosya_layout')

@section('title', '緊急告知　新規作成')

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
		<span id="id_AppearView"><div class="new_tit">新規作成</div></span>

		<!--input type="button" value="ALLクリア" class="fm_deashi_yoso_pd_bt fm_all_clear" onClick="javascript:funcAllClear();"-->
		
		<div class="clear"></div>
		
		
		
		
		
		
		
		<!--▼▼▼本文▼▼▼-->
		<div id="kinkyu">
		
		
		<div id="msg">
		<div id="msg_l">
		<h2>【掲載<span class="msg_time">開始</span>時間】</h2>
		</div><!--/#msg_l-->
		
		<div id="msg_r">
		<input type="text" name="txtdate1" value="{{ old('txtdate1') }}" class="fm_date" maxlength="12" onBlur="javascript:MojiCheck();funcDispDate1(document.InputForm.txtdate1.value,'date01',12);">
		<span class="date01" id="date01">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</span>
		</div><!--/#msg_r-->
		<div class="clear"></div>
		</div><!--/#msg-->
		
		<div id="msg">
		<div id="msg_l">
		<h2>【掲載<span class="msg_time">終了</span>時間】</h2>
		</div><!--/#msg_l-->
		
		<div id="msg_r">
		<input type="text" name="txtdate2" value="{{ old('txtdate2') }}" class="fm_date" maxlength="12" onBlur="javascript:MojiCheck();funcDispDate1(document.InputForm.txtdate2.value,'date02',12);">
		<span class="date01" id="date02">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</span>
		</div><!--/#msg_l-->
		<div class="clear"></div>
		</div><!--/#msg-->
		
		
		
		
		
		
		<div id="msg">
		<div id="msg_l">
		<h2>【タイトル】</h2>
		</div><!--/#msg_l-->
		
		<div id="msg_r">
		<input type="text" name="title" value="{{ old('title') }}" maxlength="256" class="title">
		</div><!--/#msg_r-->
		<div class="clear"></div>
		</div><!--/#msg-->
		
		
		
		
		
		
		<div id="msg">
		<div id="msg_l">
		<h2>【告知本文】</h2>
		
		
		
		<div id="msg_cb01">
		<p>テキスト<br>サンプルNo.</p>
		<input type="text" name="sample_no" value="" class="fm_txno" maxlength="1" onBlur="javascript:MojiCheck();funcSampleInsert(this.value);">
		
		</div><!--/#msg_cb01-->
		
		</div><!--/#msg_l-->
		
		<div id="msg_r">
		
		<textarea rows="6" name="honbun" class="fm_msg" type="text" maxlength="1000" >{{ old('honbun') }}</textarea>
		<p>
		<span class="sample_tx">【テキストサンプル】</span>
		
		1）台風の影響により、●/●の開催を中止いたします。<br>
		2）台風の影響により、●/●の開催を中止順延いたします。これにより、最終日は●/●となります。<br>
		3）台風の影響により、第●レース以降の開催を中止打ち切りといたします。<br>
		</p>
		</div><!--/#msg_r-->
		<div class="clear"></div>
		</div><!--/#msg-->
		
		<div id="msg">
		<div id="msg_l"><h2>【表示デバイス】</h2></div><!--/#msg_l-->
		
		<div id="msg_r">
		PC<label id="devic01_check" class="c_on"><input type="checkbox" name="pc_check" value="1"  @if(old('pc_check',1)) checked @endif ></label>
		スマホ<label id="devic02_check" class="c_on"><input type="checkbox" name="sp_check" value="1"  @if(old('sp_check',1)) checked @endif></label>
		携帯<label id="devic03_check" class="c_on"><input type="checkbox" name="mb_check" value="1"  @if(old('mb_check',1)) checked @endif></label>
		</div><!--/#msg_r-->
		<div class="clear"></div>
		</div><!--/#msg-->
		
		
		<div id="msg">
		<div id="msg_l">
		<h2>【登録者】</h2>
		</div><!--/#msg_l-->
		
		<div id="msg_r">
		<input type="text" name="editor" value="{{ old('editor') }}" maxlength="32" class="fm_date">
		</div><!--/#msg_r-->
		<div class="clear"></div>
		</div><!--/#msg-->
		
		
		</div><!--/#kinkyu-->
		</div><!--/#wrapper-->
		
		<input type="hidden" name="delete_flg" value="" >
		<input type="hidden" name="appear_flg" value="" >
		<input type="hidden" name="insert_flg" value="" >
		<input type="hidden" name="update_id" value="" >
		
		<!--▼▼▼フッター▼▼▼-->
		<div id="footer">
		
		<div id="footer_in">
		<div id="footer_in_l">
		<ul>
		<li class="save"><input type="button" onClick="javascript:funcSave('1');" value="保存"></li>
		
		</ul>
		</div><!--/#fotter_in_l-->
		
		<div id="footer_in_r">
		
		
		
		
		
		<div class="clear"></div>
		</div><!--/#fotter_in_r-->
		
		<div class="clear"></div>
		</div><!--/#fotter_in-->
		
		</div><!--/#footer-->
		
	@csrf
</form>
@endsection

@section('script')
<script type="text/javascript" src="/cms/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/cms/js/jquery.checkbox.js"></script>
<script type="text/javascript">

// リターンキーで次に進まなくするフラグ
var clicked=false;

	function subPushButton(argID,argStartDate,argEndDate,argTitle,argHonbun,argPCFlg,argSPFlg,argMBFlg,argEditorName,argAppearFlg)
	{// 編集ボタンを押した時の処理

		// 変数宣言
		var strID = "";
		var strStartDate = "";
		var strEndDate = "";
		var strTitle = "";
		var strHonbun = "";
		var strPCFlg = "";
		var strSPFlg = "";
		var strMBFlg = "";
		var strEditorName = "";
		var strAppearFlg ="";

		var intLoopCount = 0;

		// 引数格納
		strID = argID;
		strStartDate = argStartDate;
		strEndDate = argEndDate;
		strTitle = argTitle;
		strHonbun = argHonbun;
		strHonbun = replaceAll(strHonbun, "<改行>", "\r\n");

		strPCFlg = argPCFlg;
		strSPFlg = argSPFlg;
		strMBFlg = argMBFlg;
		strEditorName = argEditorName;
		strAppearFlg = argAppearFlg;

		// ID
		document.InputForm.update_id.value = strID;

		// 日程
		document.InputForm.txtdate1.value = strStartDate;
		document.InputForm.txtdate2.value = strEndDate;

		// タイトル＋本文
		document.InputForm.title.value = strTitle;
		document.InputForm.honbun.value = strHonbun;

		document.InputForm.editor.value = strEditorName;



		if( strPCFlg != "1" )
		{
			// チェック外す
			document.InputForm.pc_check.checked = false;
			document.getElementById("devic01_check").className = "";

		}
		else
		{
			// チェックつける
			document.InputForm.pc_check.checked = true;
			document.getElementById("devic01_check").className = "c_on";
		}

		if( strSPFlg != "1" )
		{
			// チェック外す
			document.InputForm.sp_check.checked = false;
			document.getElementById("devic02_check").className = "";
		}
		else
		{
			// チェックつける
			document.InputForm.sp_check.checked = true;
			document.getElementById("devic02_check").className = "c_on";
		}

		if( strMBFlg != "1" )
		{
			// チェック外す
			document.InputForm.mb_check.checked = false;
			document.getElementById("devic03_check").className = "";
		}
		else
		{
			// チェックつける
			document.InputForm.mb_check.checked = true;
			document.getElementById("devic03_check").className = "c_on";
		}

		if( strAppearFlg === "1" ){
		//公開中

			if( document.InputForm.txtdate1.value >= 202105211339 ){
				document.getElementById("id_AppearView").innerHTML = "<div class=\"save_tit\">公開前</div>";
			}else if( document.InputForm.txtdate2.value !== "" ){

				if( document.InputForm.txtdate2.value <= 202105211339 ){
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

		funcDispDate1(document.InputForm.txtdate1.value,'date01',12);
		funcDispDate1(document.InputForm.txtdate2.value,'date02',12);

		// ページ先頭に
		scrollTo(0,0);
	}

	function subPushButtonDelete(argID)
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
			document.InputForm.delete_flg.value = "0";
		}
		else
		{
			clicked=true;

			document.InputForm.update_id.value = argID;
			document.InputForm.delete_flg.value = "1";
			document.InputForm.submit();
		}
	}



	function funcSave( argData )
	{
		// 入力漏れがあればfalseに変化
		Judge = true;
		strResult = "";
		strResult2 = "";
		var intMojiCount;
		var intLoopCount;
		var intDanjoFlg = 0;

		if( document.InputForm.txtdate1.value == "" )
		{
			Judge = false;
			strResult = strResult + "掲載開始時間を入力してください。\n";
		}
		else
		{
			if( isNaN( document.InputForm.txtdate1.value ) == true )
			{
				Judge = false;
				strResult = strResult + "掲載開始時間には数値を入力してください。\n";
			}
			else if( document.InputForm.txtdate1.value.length < 12 )
			{// 12文字以下の時
				Judge = false;
				strResult = strResult + "掲載開始時間には必ず12文字で入力してください。\n";
			}
			else
			{
				if( isValidDate(parseInt(document.InputForm.txtdate1.value.substr(0, 4),10),parseInt(document.InputForm.txtdate1.value.substr(4, 2),10),parseInt(document.InputForm.txtdate1.value.substr(6, 2),10)) )
				{

				}
				else
				{
					Judge = false;
					strResult = strResult + "掲載開始時間には正しい日付で入力してください。\n";
				}
			}
		}

		if( document.InputForm.txtdate2.value == "" )
		{
			Judge = false;
			strResult = strResult + "掲載終了時間を入力してください。\n";
		}
		else
		{
			if( isNaN( document.InputForm.txtdate2.value ) == true )
			{
				Judge = false;
				strResult = strResult + "掲載終了時間には数値を入力してください。\n";
			}
			else if( document.InputForm.txtdate2.value.length < 12 )
			{// 12文字以下の時
				Judge = false;
				strResult = strResult + "掲載終了時間には必ず12文字で入力してください。\n";
			}
			else
			{
				if( isValidDate(parseInt(document.InputForm.txtdate2.value.substr(0, 4),10),parseInt(document.InputForm.txtdate2.value.substr(4, 2),10),parseInt(document.InputForm.txtdate2.value.substr(6, 2),10)) )
				{

				}
				else
				{
					Judge = false;
					strResult = strResult + "掲載終了時間には正しい日付で入力してください。\n";
				}
			}
		}


		if( document.InputForm.txtdate1.value != "" && document.InputForm.txtdate2.value != "" )
		{
			if( document.InputForm.txtdate1.value > document.InputForm.txtdate2.value )
			{
				Judge = false;
				strResult = strResult + "掲載終了時間は掲載開始時間より早い時間を入力できません。\n";
			}
		}


		if( document.InputForm.title.value == "" )
		{
			Judge = false;
			strResult = strResult + "タイトルを入力してください。\n";
		}
		else if( document.InputForm.title.value.length > 40 )
		{// 40文字以上の時
			Judge = false;
			strResult = strResult + "タイトルは40文字以内で入力してください。\n";
		}

		if( document.InputForm.honbun.value == "" )
		{
			Judge = false;
			strResult = strResult + "告知本文を入力してください。\n";
		}


		if( document.InputForm.editor.value == "" )
		{
			Judge = false;
			strResult = strResult + "登録者を入力してください。\n";
		}




		if( argData == "1" )
		{// 保存
			//document.InputForm.action = "kinkyuExecute.asp";
			document.InputForm.appear_flg.value = "";
			document.InputForm.insert_flg.value = "1";
		}
		else if( argData == "2" )
		{// 公開
			//document.InputForm.action = "kinkyuExecute.asp";
			document.InputForm.appear_flg.value = "1";
			document.InputForm.insert_flg.value = "0";
		}
		else if( argData == "3" )
		{// 非公開
			//document.InputForm.action = "kinkyuExecute.asp";
			document.InputForm.appear_flg.value = "0";
			document.InputForm.insert_flg.value = "0";
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



	// 日付入力次第、右側に反映
	function funcDispDate1( argData , argChange , argLen )
	{// argLenケタの数値を日付表示に

		var strData = argData;
		var strReturn='';

		if( isNaN( strData ) == true )
		{
			document.getElementById(argChange).innerHTML = '&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;';
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
				document.getElementById(argChange).innerHTML = '&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;';
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
				document.getElementById(argChange).innerHTML = '&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;';
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

				strReturn = strYear + "年" + Number( strMonth ) + "月" + Number( strDay ) + "日";
/*
				myDay = new Array( "(日)","(月)","(火)","(水)","(木)","(金)","(土)" ); //配列オブジェクトを生成
				myDate = new Date( strYear,strMonth-1,strDay); //指定した時刻を表す日付オブジェクトを作成
				myWeek = myDate.getDay(); //曜日の番号取得
				strReturn = strReturn + myDay[myWeek];
*/

			}
			document.getElementById(argChange).innerHTML = strReturn;
		}
		else
		{
			document.getElementById(argChange).innerHTML = '&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;';
		}
	}


	function bodyonLoad()
	{


		funcDispDate1(document.InputForm.txtdate1.value,'date01',12);
		funcDispDate1(document.InputForm.txtdate2.value,'date02',12);
	}
	bodyonLoad();

	function isValidDate(y,m,d){

//		alert(y + '-' + m + '-' + d);

		var di = new Date(y,m-1,d);
		if(di.getFullYear() == y && di.getMonth() == m-1 && di.getDate() == d){
			return true;
		}
		return false;
	}

	// 文字チェックする
	function MojiCheck()
	{
		document.InputForm.txtdate1.value = funcStr2to1(document.InputForm.txtdate1.value);
		document.InputForm.txtdate2.value = funcStr2to1(document.InputForm.txtdate2.value);
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


	function funcSampleInsert(argData)
	{
		if( argData == "1" )
		{
			document.InputForm.honbun.value = "台風の影響により、●/●の開催を中止いたします。";
		}
		else if( argData == "2" )
		{
			document.InputForm.honbun.value = "台風の影響により、●/●の開催を中止順延いたします。これにより、最終日は●/●となります。";
		}
		else if( argData == "3" )
		{
			document.InputForm.honbun.value = "台風の影響により、第●レース以降の開催を中止打ち切りといたします。";
		}
	}


	function funcAllClear()
	{
		document.location.href="/asp/tsu/admin/cms/kinkyu/kinkyu.asp";
	}


	function replaceAll(expression, org, dest)
	{
		return expression.split(org).join(dest);
	}






	function funcPreview( argType )
	{
		// 入力漏れがあればfalseに変化
		Judge = true;
		strResult = "";
		strResult2 = "";
		var intMojiCount;
		var intLoopCount;

		if( document.InputForm.update_id.value == "" )
		{
			Judge = false;
			strResult = strResult + "登録済みデータを選択してください。\n";
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

				w.document.location.href = "/k/index.asp?preview=1&preview_id=" + document.InputForm.update_id.value + "";

			}else if( argType == 2 ){

				w.document.location.href = "/asp/tsu/admin/cms/kinkyu/kinkyu_message_pre.asp?device=1&preview_id=" + document.InputForm.update_id.value + "";

			}else{

				w.document.location.href = "/asp/tsu/admin/cms/kinkyu/kinkyu_message_pre.asp?device=0&preview_id=" + document.InputForm.update_id.value + "";

			}

		}

	}



</script>
@endsection