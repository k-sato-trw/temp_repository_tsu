@extends('layouts.admin_sekosya_layout')

@section('title', '緊急告知　登録内容一覧')

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
<!--------------------------------------------
▼登録一覧 -->
<div class="kinkyu">
	<div id="ichiran">
	<h3>登録内容一覧</h3>
	
	<div style="text-align: center">
		<button type="button" class="btn btn-primary" onclick="location.href='/admin_sekosya/kinkyu_kokuti/create'">新規作成</button>
	</div>
	<ul id="bn">
		@foreach($year_list as $item)
			@if($item == $target_year)
				<li class="on">{{$item}}</li>
			@else
				<li><a href="?year={{$item}}">{{$item}}</a></li>
			@endif
		@endforeach
	</ul>
	<table>
	<col class="col1" />
	<col class="col2" />
	<col class="col3" />
	<col class="col4" />
	<col class="col5" />
	  <tr>
		<th scope="col">掲載開始</th>
		<th rowspan="2" scope="col">表示<br>
		  デバイス</th>
		<th scope="col">タイトル</th>
		<th rowspan="2" scope="col">状態</th>
		<th rowspan="2" scope="col">編集</th>
	  </tr>
	  <tr>
		<th scope="col">掲載終了</th>
		<th scope="col">本文</th>
	  </tr>



	@foreach($kinkyu_kokuti as $item)
	  <tr>
		<td colspan="5" align="center" class="line">&ensp;</td>
	  </tr>
	  <tr>
		<td rowspan="3" align="center">
			{{ date("Y/n/j",strtotime($item->START_DATE)) }}({{ $week_label[date("w",strtotime($item->START_DATE))] }})<br>{{ date("H:i",strtotime($item->START_DATE)) }}    <span class="kikan"></span>
			{{ date("Y/n/j",strtotime($item->END_DATE)) }}({{ $week_label[date("w",strtotime($item->END_DATE))] }})<br>{{ date("H:i",strtotime($item->END_DATE)) }}
		
		@if($item->PC_FLG)
			<td height="25%" align="center" class="on">PC<br>      掲載</td>
		@else
			<td height="25%" align="center" class="off">PC<br>      非掲載</td>
		@endif
		</td>
		<td rowspan="3"><span class="main_taxt_ttl">{{$item->TITLE ?? "---"}}</span>
		  <p>
				@if($item->HONBUN)
					{!! nl2br($item->HONBUN) !!}					
				@else
					----
				@endif
			</p>
		  </td>
		  	@if($item->APPEAR_FLG)
				@if($item->END_DATE && $item->END_DATE < date("YmdHi"))
					<td rowspan="3" align="center" >
						公開終了
					</td>
				@else
					@if($item->START_DATE > date("YmdHi"))
						<td rowspan="3" align="center" >
							公開前
						</td>
					@else
						<td rowspan="3" align="center" class="s_open">
							公開
						</td>
					@endif
				@endif
			@else
				<td rowspan="3" align="center" >
					非掲載
				</td>
			@endif
		<td rowspan="3" align="center">
			<div class="s_btn">
				<a href="/admin_sekosya/kinkyu_kokuti/edit/{{ $item->ID }}">編集</a>
			</div>
			<div class="s_btn">
				<a href="javascript:void(0);" onClick="if(confirm('選択したレコードを削除します。よろしいですか?')){location.href='/admin_sekosya/kinkyu_kokuti/delete/{{$item->ID}}'}">削除</a>
			</div>	
		</td>
	  </tr>
	  <tr>
		@if($item->SP_FLG)
			<td height="25%" align="center" class="on">スマホ<br>
			掲載</td>
		@else
			<td height="25%" align="center" class="off">スマホ<br>
			非掲載</td>
		@endif
	  </tr>
	  <tr>
		
		@if($item->MB_FLG)
			<td height="25%" align="center" class="on">ケータイ<br>
			掲載</td>
		@else
			<td height="25%" align="center" class="off">ケータイ<br>
			非掲載</td>
		@endif
	  </tr>
	@endforeach
	
		<tr>
			<td colspan="5" align="center" class="line">&ensp;</td>
		</tr>
	</table>
	
	
	</div>
	</div>
	
	
	<!--------------------------------------------
	▲登録一覧 -->
    

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
			document.InputForm.action = "kinkyuExecute.asp";
			document.InputForm.appear_flg.value = "";
			document.InputForm.insert_flg.value = "1";
		}
		else if( argData == "2" )
		{// 公開
			document.InputForm.action = "kinkyuExecute.asp";
			document.InputForm.appear_flg.value = "1";
			document.InputForm.insert_flg.value = "0";
		}
		else if( argData == "3" )
		{// 非公開
			document.InputForm.action = "kinkyuExecute.asp";
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