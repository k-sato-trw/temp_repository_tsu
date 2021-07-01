
//**************************************************************
// * 津サイドメニュー用のjavascript
// * header_navi_hikaisai.js
//**************************************************************
// * 使用方法 
//**************************************************************
//◆用意
//<head></head>内に下記を指定する
//<script type="text/javascript" src="/jsheader_navi.js"></script>
//◆表示
//表示したい箇所に下記を指定する
//<script type="text/javascript">
//funcTsuHeaderMenu();
//</script>
//**************************************************************
// * 編集方法 ＜＜必ずテストサイトで問題ないか確認してください＞＞
//**************************************************************
//	strMenuHTML = strMenuHTML + "[この間にHTML文挿入する]";
//	＜注意！＞
//	「"」(ダブルクォーテーション)を使用せず、
//	「'」(シングルクォーテーション)を使用してください。
//	また、jsの規則外のことをすると、全て表示されなくなります。
//	＜備考＞
//	編集に自信がない場合はシステムまで変更してほしい箇所を連絡してください。
// **************************************************************
// * 更新履歴
// **************************************************************
// * 
// **************************************************************

	
	function funcTsuHeaderMenu()
	{

		var strMenuHTML = '';
		strMenuHTML = strMenuHTML + "<li class='b0'><a href='/asp/tsu/kaisai/kaisaiindex.htm'>リプレイ</a></li>";
		strMenuHTML = strMenuHTML + "<li class='b2'>レース予想</li>";
		strMenuHTML = strMenuHTML + "<li class='b3'><a href='/asp/log/tsu_top.asp' target='_blank'>舟券投票</a></li>";
		strMenuHTML = strMenuHTML + "<div class='clear'></div>";

		//書き出し
		document.write(strMenuHTML);

	}