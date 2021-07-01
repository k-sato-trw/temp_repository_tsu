@extends('layouts.admin_sekosya_layout')

@section('title', '得点率情報')

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
@endsection

@section('content')

    <form action="" name="InputForm" method="post" EncType="MultiPart/Form-Data">
        <div id="wrapper">
        <div id="header">
        <!-- div id="menu">
        <ul id="menu_tit">
        <li class="select"><a href="/asp/tsu/admin/cms/tokuten/tokuten.asp">得点率情報</a></li>
        <li class="w_long"><a href="/asp/tsu/admin/cms/kaimon/kaimon.asp">開門 &amp; 第1Rスタート展示時刻</a></li>
        <li class="w_long"><a href="/asp/tsu/admin/cms/info/cms_info.asp">インフォメーション</a></li>
        <li><a href="/asp/tsu/admin/cms/kinkyu/kinkyu.asp">緊急告知</a></li>
        <div class="clear"></div>
        </ul>
        </div>
        
        <div id="back_b"><a href="/asp/tsu/admin/cms/index.asp">戻る</a></div>
        <div class="clear"></div-->
        
        </div><!--/#header-->
        
        <div class="new_tit">新規入力</div>
        
        
        
        <!--<input type="button" value="ALLクリア" class="fm_deashi_yoso_pd_bt fm_all_clear">-->
        
        <div class="clear"></div>
        
        
        
        
        
        
        
        <!--▼▼▼本文▼▼▼-->
        <div id="tokuten">
        
        <div id="msg">
        <div id="msg_l">
        <h2>【掲載<span class="msg_time">開始</span>日】</h2>
        </div><!--/#msg_l-->
        
        <div id="msg_r">
        <input type="text" name="keisai" value="" maxlength="8" class="fm_date" onBlur="javascript:MojiCheck();funcDispDate1(document.InputForm.keisai.value,'date01',8);funcDispTargetRace(document.InputForm.keisai.value,'race_name');">
        <span class="date01" id="date01"></span>
        </div><!--/#msg_r-->
        <div class="clear"></div>
        </div><!--/#msg-->
        
        
        
        <div id="msg">
        <div id="msg_l">
        <h2>【ファイル登録】</h2>
        </div><!--/#msg_l-->
        
        <div id="msg_r">
        <div id="race_name"></div>
        <dl id="file_set">
        <dt><img src="/cms/images/i_no1.jpg"><div id="id_file_area1" class="file_area"><input type="file" id="file1" name="file1" value="" onChange="funcImage(1);document.getElementById('dispuploadtext').innerHTML = this.value;" /></div></dt>
        <dd><span><div id="dispuploadtext">---</div></span></dd>
        <dt><img src="/cms/images/i_no2.jpg"><div id="id_file_area2" class="file_area"><input type="file" id="file2" name="file2" value="" onChange="funcImage(2);document.getElementById('dispuploadtext2').innerHTML = this.value;" /></div></dt>
        <dd><span><div id="dispuploadtext2">---</div></span></dd>
        <div class="clear"></div>
        </dl><!--/#file_set-->
        <p class="memo">
        ※男女W戦の場合は<img src="/cms/images/i_no1.jpg" width="15">に男子、<img src="/cms/images/i_no2.jpg" width="15">に女子のデータをアップロードしてください。
        </p>
        </div><!--/#msg_r-->
        <div class="clear"></div>
        </div><!--/#msg-->
        
        
        
        
        <input type="hidden" name="info_flg" value="0">
        
        
        </div><!--/#tokuten-->
        </div><!--/#wrapper-->
        
        
        <!--▼▼▼フッター▼▼▼-->
        <div id="footer">
        
        <div id="footer_in">
        <div id="footer_in_l">
        <ul>
        <li class="save"><input type="button" onClick="javascript:Check('1');" value="保存"></li>
        <li class="preview">プレビュー</li>
        <li class="pv_b"><a href="javascript:funcPreview('pc');">PC</a></li>
        <li class="pv_b"><a href="javascript:funcPreview('sp');">スマホ</a></li>
        <div class="clear"></div>
        </ul>
        </div><!--/#fotter_in_l-->
        
        <div id="footer_in_r">
        
        <div id="action_c">
        <span class="open_b"><input type="button" onClick="javascript:Check('2');" value="公開"></span>
        <span class="close_b"><input type="button" onClick="javascript:Check('3');" value="非公開"></span>
        <div class="clear"></div>
        </div><!--/#action_c-->
        
        
        
        <div class="clear"></div>
        </div><!--/#fotter_in_r-->
        
        <div class="clear"></div>
        </div><!--/#fotter_in-->
        
        </div><!--/#footer-->
        <input type="hidden" name="appear_flg" id="appear_flg" value="">
        <input type="hidden" name="insert_flg" value="">
        <input type="hidden" name="danjo_flg" value="">
        <input type="hidden" name="filename1" value="">
        <input type="hidden" name="filename2" value="">
        @csrf
    </form>

@endsection

@section('script')
<script type="text/javascript" src="/cms/js/jquery-1.8.2.min.js"></script>

<script type="text/javascript" src="/cms/js/jquery.checkbox.js"></script>

<script type="text/javascript">

	// 日付入力次第、右側に反映
	function funcDispDate1( argData , argChange , argLen )
	{// argLenケタの数値を日付表示に

		var strData = argData;
		var strReturn='';

		if( isNaN( strData ) == true )
		{
			document.getElementById(argChange).innerHTML = '&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;';
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
				document.getElementById(argChange).innerHTML = '&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;';
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
				document.getElementById(argChange).innerHTML = '&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;';
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

				strReturn = strYear + "年" + Number( strMonth ) + "月" + Number( strDay ) + "日";

				myDay = new Array( "(日)","(月)","(火)","(水)","(木)","(金)","(土)" ); //配列オブジェクトを生成
				myDate = new Date( strYear,strMonth-1,strDay); //指定した時刻を表す日付オブジェクトを作成
				myWeek = myDate.getDay(); //曜日の番号取得
				strReturn = strReturn + myDay[myWeek];


			}
			document.getElementById(argChange).innerHTML = strReturn;
		}
		else
		{
			document.getElementById(argChange).innerHTML = '&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;---&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;';
		}
	}



	//日付入力次第、下側にレース期間反映
	function funcDispTargetRace(argData,argChange)
	{
		var strReturn = '';
		var strData = argData;

		if( isNaN( strData ) == true )
		{// 数値チェック
			//document.getElementById(argChange).innerHTML = '対象開催>>---　　　　　　　　　　　　　　　';
			document.getElementById(argChange).innerHTML = '';
			return;
		}

		if( strData.length == 8 )
		{
			if( strData >= '{{ $kaisai_start_date }}' && strData <= '{{ $kaisai_end_date }}' )
			{
				strReturn = '対象開催>><span>{{ $general->create_display_date_with_week($kaisai_start_date ,$kaisai_end_date) }}</span>{{ $kaisai_title }}';
			}
			else
			{
				strReturn = '';
				//strReturn = '対象開催>>---　　　　　　　　　　　　　　　　　　　　　　　　　';
			}
		}
		else
		{
			strReturn = '';
			//strReturn = '対象開催>>---　　　　　　　　　　　　　　　　　　　　　　　　　';
		}


		document.getElementById(argChange).innerHTML = strReturn;

	}



	// 参照ファイル名初期表示
	function funcDispSansho()
	{
		document.getElementById('dispuploadtext').innerHTML = '';

	}



	// ******************************************************************************************************
	function Check( argData )
	{
		// 入力漏れがあればfalseに変化
		Judge = true;
		strResult = "";
		strResult2 = "";
		var intMojiCount;
		var intLoopCount;
		var intDanjoFlg = 0;

		if( document.InputForm.keisai.value == "" )
		{
			Judge = false;
			strResult = strResult + "掲載開始日を入力してください。\n";
		}
		else
		{
			if( isNaN( document.InputForm.keisai.value ) == true )
			{
				Judge = false;
				strResult = strResult + "掲載開始日には数値を入力してください。\n";
			}
			else if( document.InputForm.keisai.value.length < 8 )
			{// 12文字以下の時
				Judge = false;
				strResult = strResult + "掲載開始日には必ず8文字で入力してください。\n";
			}
			else
			{
				if( isValidDate(parseInt(document.InputForm.keisai.value.substr(0, 4),10),parseInt(document.InputForm.keisai.value.substr(4, 2),10),parseInt(document.InputForm.keisai.value.substr(6, 2),10)) )
				{
					if( document.InputForm.keisai.value > "{{ $now_date }}" )
					{
						Judge = false;
						strResult = strResult + "未来の日付は無効です。\n";
					}
				}
				else
				{
					Judge = false;
					strResult = strResult + "掲載開始日には正しい日付で入力してください。\n";
				}
			}
		}
		if( argData == "1" )
		{
			if( document.InputForm.file1.value == "" )
			{
				Judge = false;
				strResult = strResult + "CSVファイルを選択してください。\n";
			}
			else if( document.InputForm.file1.value != "" )
			{
				var strCheck = document.InputForm.file1.value.split(".");
				strCheck[1] = strCheck[1].toLowerCase();

				if (strCheck[1] != "csv")
				{
					Judge = false;
					strResult = strResult + "CSVファイルを選択してください。\n";
				}
			}

			if( document.InputForm.file2.value != "" )
			{
				var strCheck = document.InputForm.file2.value.split(".");
				strCheck[1] = strCheck[1].toLowerCase();

				if (strCheck[1] != "csv")
				{
					Judge = false;
					strResult = strResult + "CSVファイルを選択してください。\n";
				}
				else
				{
					intDanjoFlg = 1;
				}
			}

		}


		if( argData == "1" )
		{

			if( intDanjoFlg == 1 )
			{// 男女Wの時

				if(window.confirm('ファイルが2つ選択されています\n今節は男女W優勝戦でお間違いないですか？'))
				{
					//document.InputForm.action = "tokutenUpload.asp";
					document.InputForm.appear_flg.value = "";
					document.InputForm.insert_flg.value = "1";
				}
				else
				{
					Judge = false;
					strResult = "保存をキャンセルしました\n";
				}
			}
			else
			{
				//document.InputForm.action = "tokutenUpload.asp";
				document.InputForm.appear_flg.value = "";
				document.InputForm.insert_flg.value = "1";
			}
		}
		else if( argData == "2" )
		{
			document.InputForm.action = "/admin_sekosya/tokuten/change_appear_flg/1";
			document.InputForm.appear_flg.value = "1";
			document.InputForm.insert_flg.value = "0";
		}
		else if( argData == "3" )
		{
			document.InputForm.action = "/admin_sekosya/tokuten/change_appear_flg/0";
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

	function isValidDate(y,m,d){

//		alert(y + '-' + m + '-' + d);

		var di = new Date(y,m-1,d);
		if(di.getFullYear() == y && di.getMonth() == m-1 && di.getDate() == d){
			return true;
		}
		return false;
	}




	function bodyonLoad()
	{
		funcDispDate1(document.InputForm.keisai.value,'date01',8);
		funcDispTargetRace(document.InputForm.keisai.value,'race_name');
	}

	// 文字チェックする
	function MojiCheck()
	{
		document.InputForm.keisai.value = funcStr2to1(document.InputForm.keisai.value);
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


	function funcImage(argData)
	{
		document.getElementById("id_file_area" + argData + "").className = "file_area1";
	}


// プレビュー遷移

	function funcPreview(argData)
	{
		var strData = argData;

		if( strData == "pc" )
		{
			window.open("/asp/tsu/kaisai/CreatePCtokuten.asp?jyo=09&yd=&mode=0&preview=1");
		}
		else if( strData == "sp" )
		{
			window.open("/asp/tsu/sp/kyogi/CreateSPtokuten.asp?jyo=09&yd=&mode=0&preview=1");
		}
	}



</script>
@endsection