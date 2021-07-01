

//**************************************************************
// * 津スマホ競技情報下部メニュー用のjavascript
// * data_navi.js
//**************************************************************
// * 使用方法 
//**************************************************************
//◆用意
//<head></head>内に下記を指定する
//<script type="text/javascript" src="/sp/js/data_navi.js"></script>
//◆表示
//表示したい箇所に下記を指定する
//<script type="text/javascript">
//funcTsuDataMenu();
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
// * 20151126 hosokawa 新規作成
// **************************************************************



function funcTsuDataMenu()
{

	var strMenuHTML = '';

	strMenuHTML = strMenuHTML + "<div id='link'>";
	strMenuHTML = strMenuHTML + "";
	strMenuHTML = strMenuHTML + "<dl class='accordion_box'>";
	strMenuHTML = strMenuHTML + "";
	strMenuHTML = strMenuHTML + "<dt class='plus'>データ</dt>";
	strMenuHTML = strMenuHTML + "<dd>";
	strMenuHTML = strMenuHTML + "<ul>";
	strMenuHTML = strMenuHTML + "<li><a href='/asp/htmlmade/Race/Tenbo/09/SP/jumper.htm' target='_tsuspkyogi'>展望・出場予定選手</a></li>";
	strMenuHTML = strMenuHTML + "<li><a href='/asp/kyogi/09/sp/motor/motor.htm' target='_tsuspkyogi'>モーター抽選結果・前検タイム</a></li>";
	strMenuHTML = strMenuHTML + "<li><a href='/asp/kyogi/09/sp/02motor/02motor.htm' target='_tsuspkyogi'>モーター&amp;ボートデータ</a></li>";
	strMenuHTML = strMenuHTML + "<li><a href='/sp/02suimen/02suimen.htm' target='_tsuspkyogi'>水面&amp;コース別データ</a></li>";
	strMenuHTML = strMenuHTML + "</ul>";
	strMenuHTML = strMenuHTML + "</dd>";
	strMenuHTML = strMenuHTML + "";

	//strMenuHTML = strMenuHTML + "<div class='normal_link'>優勝戦プレイバック</div>";
	strMenuHTML = strMenuHTML + "<div class='normal_link'><a href='/asp/tsu/sp/03play_b/03play_b.asp' target='_tsuspkyogi'>優勝戦プレイバック</a></div>";
	strMenuHTML = strMenuHTML + "<div class='normal_link'><a href='/asp/tsu/sp/03result_tsu/03result_tsu.asp' target='_tsuspkyogi'>レース結果検索</a></div>";
	strMenuHTML = strMenuHTML + "<div class='normal_link'><a href='/sp/help/help.htm' target='_tsuspkyogi'>ヘルプ</a></div>";
	strMenuHTML = strMenuHTML + "<div class='normal_link'><a href='https://secure.webkyotei.jp/asp/mform/09/inquiry/form.asp' target='_tsuspkyogi'>お問い合わせ</a></div>";
	strMenuHTML = strMenuHTML + "";
	strMenuHTML = strMenuHTML + "</dl>";
	strMenuHTML = strMenuHTML + "";
	strMenuHTML = strMenuHTML + "";
	strMenuHTML = strMenuHTML + "</div>";





	//書き出し
	document.write(strMenuHTML);

}