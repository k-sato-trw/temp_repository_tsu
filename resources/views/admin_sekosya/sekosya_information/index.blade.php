@extends('layouts.admin_sekosya_layout')

@section('title', '登録内容一覧')

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
<div class="info">
	<div id="ichiran">
	<h3>登録内容一覧</h3>
	<div style="text-align: center">
		<button type="button" class="btn btn-primary" onclick="location.href='/admin_sekosya/information/create'">新規作成</button>
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
	<col class="col6" />
	<col class="col7" />
	<col class="col8" />
	<col class="col9" />
	<col class="col10" />
	<col class="col11" />
	  <tr>
		<th rowspan="2" scope="col">ID</th>
		<th scope="col">掲載開始</th>
		<th rowspan="2" scope="col">表示<br>
		  日付</th>
		<th rowspan="2" scope="col">カテ<br>
		  ゴリ</th>
		<th rowspan="2" scope="col">表示<br>
		  デバイス</th>
		<th scope="col">記事タイトル</th>
		<th rowspan="2" scope="col">HOT NEWS</th>
		<th rowspan="2" scope="col">タイトル<br>
		  リンク</th>
		<th rowspan="2" scope="col">画像<span class="s_img">※PC、スマホのみ</span></th>
		<th rowspan="2" scope="col">状態</th>
		<th rowspan="2" scope="col">編集</th>
	  </tr>
	  <tr>
		<th scope="col">掲載終了</th>
		<th scope="col">本文</th>
	  </tr>

	@foreach($information as $item)
		<tr>
			<td colspan="11" align="center" class="line">&nbsp;</td>
		</tr>
		<tr>
			<td rowspan="3" align="center">{{$item->ID}}</td>
			<td rowspan="3" align="center">
				{{ date("Y/n/j",strtotime($item->START_DATE)) }}({{ $week_label[date("w",strtotime($item->START_DATE))] }})<br>{{ date("H:i",strtotime($item->START_DATE)) }}    <span class="kikan"></span>
				{{ date("Y/n/j",strtotime($item->END_DATE)) }}({{ $week_label[date("w",strtotime($item->END_DATE))] }})<br>{{ date("H:i",strtotime($item->END_DATE)) }}
			</td>
			<td rowspan="3" align="center">{{ date("n/j",strtotime($item->VIEW_DATE)) }}({{ $week_label[date("w",strtotime($item->VIEW_DATE))] }})</td>
			<td rowspan="3" align="center" class="k_0{{$item->TYPE}}">{{ $general->information_type_label($item->TYPE) }}</td>
			@if($item->PC_APPEAR_FLG)
				<td height="25%" align="center" class="on">PC<br>      掲載</td>
			@else
				<td height="25%" align="center" class="off">PC<br>      非掲載</td>
			@endif
			<td rowspan="3">
				<span class="main_taxt_ttl">{{$item->TITLE ?? "---"}}</span>
				@if($item->TEXT)
				{!! nl2br($item->TEXT) !!}					
				@else
					----
				@endif
			</td>
			<td rowspan="3" align="center">
				@if($item->HEADLINE_FLG)
					{{$item->HEADLINE_TITLE}}
				@else
					非掲載
				@endif
			</td>
			<td align="center">
				@if($item->PC_LINK)
					<span class="ttl_link">
						@if($item->PC_LINK_WINDOW_FLG)
							[PC/別画面]
						@else
							[PC/同画面]
						@endif
					</span>
					<br>
					<a href="{{$item->PC_LINK}}" target="_blank">{{$item->PC_LINK}}</a>			
				@else
					---
				@endif
			</td>
			<td rowspan="3" align="center">
				@if($item->IMAGE_1)
					<img src="{{ config('const.IMAGE_PATH.INFORMATION'). $item->IMAGE_1 }}" width="82" height="58">
				@endif
				@if($item->IMAGE_2)
					<img src="{{ config('const.IMAGE_PATH.INFORMATION'). $item->IMAGE_2 }}" width="82" height="58">
				@endif
				@if($item->IMAGE_3)
					<img src="{{ config('const.IMAGE_PATH.INFORMATION'). $item->IMAGE_3 }}" width="82" height="58">
				@endif
				@if(!$item->IMAGE_1 && $item->IMAGE_2 && $item->IMAGE_3)
					登録なし
				@endif
			</td>
			@if($item->APPEAR_FLG)
				@if($item->END_DATE && $item->END_DATE < date("YmdHi"))
					<td rowspan="3" align="center" >
						公開<br>終了
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
					<a href="/admin_sekosya/information/edit/{{ $item->ID }}">編集</a>
				</div>
				<div class="s_btn">
					<a href="javascript:void(0);" onClick="if(confirm('選択したレコードを削除します。よろしいですか?')){location.href='/admin_sekosya/information/delete/{{$item->ID}}'}">削除</a>
				</div>
			</td>
		</tr>
		<tr>
			@if($item->SP_APPEAR_FLG)
				<td height="25%" align="center" class="on">スマホ<br>
				掲載</td>
			@else
				<td height="25%" align="center" class="off">スマホ<br>
				非掲載</td>
			@endif
			<td align="center">
				@if($item->SP_LINK)
					<span class="ttl_link">
						@if($item->SP_LINK_WINDOW_FLG)
							[スマホ/別画面]
						@else
							[スマホ/同画面]
						@endif
					</span>
					<br>
					<a href="{{$item->SP_LINK}}" target="_blank">{{$item->SP_LINK}}</a>					
				@else
					---
				@endif
			</td>
		</tr>
		<tr>
			@if($item->MB_APPEAR_FLG)
				<td height="50%" align="center" class="on">ケータイ<br>
				掲載</td>
			@else
				<td height="50%" align="center" class="off">ケータイ<br>
				非掲載</td>
			@endif
			<td align="center">
				@if($item->MB_LINK)
					<span class="ttl_link">
						@if($item->MB_LINK_WINDOW_FLG)
							[ケータイ/別画面]
						@else
							[ケータイ/同画面]
						@endif
					</span>
					<br>
					<a href="{{$item->MB_LINK}}" target="_blank">{{$item->MB_LINK}}</a>					
				@else
					---
				@endif
			</td>
		</tr>
		<tr>
			<td colspan="11" align="center" class="line">&nbsp;</td>
		</tr>
	@endforeach

	</table>
	
	  </table>
	</div>
	</div>
	
	
	<!--------------------------------------------
	▲登録一覧 -->
    

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