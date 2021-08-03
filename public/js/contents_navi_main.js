
//**************************************************************
// * 津サイドメニュー用のjavascript
// * contents_navi_main.js
//**************************************************************
// * 使用方法
//**************************************************************
//◆用意
//<head></head>内に下記を指定する
//<script type="text/javascript" src="/js/contents_navi_main.js"></script>
//◆表示
//表示したい箇所に下記を指定する
//<script type="text/javascript">
//funcTsuMenu();
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



function funcTsuMenu()
{

	var strMenuHTML = '';
	strMenuHTML = strMenuHTML + "<div id='nav_btn' class='icon menu1'>";
	strMenuHTML = strMenuHTML + "<span class='border1'></span>";
	strMenuHTML = strMenuHTML + "<span class='border2'></span>";
	strMenuHTML = strMenuHTML + "<span class='border3'></span>";
	strMenuHTML = strMenuHTML + "</div>";
	strMenuHTML = strMenuHTML + "";
	strMenuHTML = strMenuHTML + "<div id='nav_main'>";
	strMenuHTML = strMenuHTML + "<ul id='menu1'>";
	strMenuHTML = strMenuHTML + "";
	strMenuHTML = strMenuHTML + "<li class='b1'>";
	strMenuHTML = strMenuHTML + "<img src='/common_img/menu1_b1.png' class='btn_img'>";
	strMenuHTML = strMenuHTML + "<div class='menu2'>";
	strMenuHTML = strMenuHTML + "<h4>レース情報</h4>";
	strMenuHTML = strMenuHTML + "<ul>";
	strMenuHTML = strMenuHTML + "<li><a href='/asp/tsu/kaisai/kaisaiindex.htm'>レースライブ＆リプレイ</a></li>";
	strMenuHTML = strMenuHTML + "<li><a href='/01cal/01cal.htm'>開催日程</a></li>";
	strMenuHTML = strMenuHTML + "<li><a href='/asp/htmlmade/Race/Tenbo/09/PC/jumper.htm'>展望・出場予定選手</a></li>";
	strMenuHTML = strMenuHTML + "<li><a href='javascript:MultiOpen(\"https://secure.webkyotei.jp/asp/mform/09/mail/form.asp\",\"mail\",\"800\",\"800\");'>メールマガジン</a></li>";
	strMenuHTML = strMenuHTML + "<li><a href='/01mobile/01mobile.htm'>モバイルサービス</a></li>";
	strMenuHTML = strMenuHTML + "</ul>";
	strMenuHTML = strMenuHTML + "</div>";
	strMenuHTML = strMenuHTML + "</li><!--/b1-->";
	strMenuHTML = strMenuHTML + "";
	strMenuHTML = strMenuHTML + "<li class='b2'>";
	strMenuHTML = strMenuHTML + "<img src='/common_img/menu1_b2.png' class='btn_img'>";
	strMenuHTML = strMenuHTML + "<div class='menu2'>";
	strMenuHTML = strMenuHTML + "<h4>データ集</h4>";
	strMenuHTML = strMenuHTML + "<ul>";
	strMenuHTML = strMenuHTML + "<li><a href='/02suimen/02suimen.htm'>水面＆コース別データ</a></li>";
	strMenuHTML = strMenuHTML + "<li><a href='/asp/kyogi/09/pc/02motor/02motor.htm'>モーター＆ボートデータ</a></li>";
	strMenuHTML = strMenuHTML + "<li><a href='/02deme/02deme.htm'>出目・高配当ランキング</a></li>";
	strMenuHTML = strMenuHTML + "</ul>";
	strMenuHTML = strMenuHTML + "</div>";
	strMenuHTML = strMenuHTML + "</li><!--/b2-->";
	strMenuHTML = strMenuHTML + "";
	strMenuHTML = strMenuHTML + "<li class='b3'>";
	strMenuHTML = strMenuHTML + "<img src='/common_img/menu1_b3.png' class='btn_img'>";
	strMenuHTML = strMenuHTML + "<div class='menu2'>";
	strMenuHTML = strMenuHTML + "<h4>ファンサービス</h4>";
	strMenuHTML = strMenuHTML + "<ul>";
	strMenuHTML = strMenuHTML + "<li><a href='/04event/04event.htm'>イベント＆ファンサービス</a></li>";
	strMenuHTML = strMenuHTML + "<li><a href='/04cashless/04cashless.htm'>キャッシュレスカード</a></li>";
	strMenuHTML = strMenuHTML + "<li><a href='/t_jump/jump_pointclub.htm' target='_blank'>津ポイント倶楽部</a></li>";
	strMenuHTML = strMenuHTML + "<li><a href='/04fanclub/04fanclub.htm'>ボートレース津ファンクラブ</a></li>";
	strMenuHTML = strMenuHTML + "<li class='small'><a href='/04group/04group.htm'><span>お土産つき</span> グループ来場申し込み</a></li>";
	strMenuHTML = strMenuHTML + "</ul>";
	strMenuHTML = strMenuHTML + "</div>";
	strMenuHTML = strMenuHTML + "</li><!--/b3-->";
	strMenuHTML = strMenuHTML + "";
	strMenuHTML = strMenuHTML + "<li class='b4'>";
	strMenuHTML = strMenuHTML + "<img src='/common_img/menu1_b4.png' class='btn_img'>";
	strMenuHTML = strMenuHTML + "<div class='menu2'>";
	strMenuHTML = strMenuHTML + "<h4>結果サーチ</h4>";
	strMenuHTML = strMenuHTML + "<ul>";
	strMenuHTML = strMenuHTML + "<li><a href='/03result_tsu/03result_tsu.htm'>レース結果検索</a></li>";
	strMenuHTML = strMenuHTML + "<li><a href='/03play_b/03play_b.htm'>優勝戦プレイバック</a></li>";
	strMenuHTML = strMenuHTML + "</ul>";
	strMenuHTML = strMenuHTML + "</div>";
	strMenuHTML = strMenuHTML + "</li><!--/b4-->";
	strMenuHTML = strMenuHTML + "";
	strMenuHTML = strMenuHTML + "<li class='b5'>";
	strMenuHTML = strMenuHTML + "<img src='/common_img/menu1_b5.png' class='btn_img'>";
	strMenuHTML = strMenuHTML + "<div class='menu2'>";
	strMenuHTML = strMenuHTML + "<h4>交通＆施設</h4>";
	strMenuHTML = strMenuHTML + "<ul>";
	strMenuHTML = strMenuHTML + "<li><a href='/05access/05access.htm'>交通アクセス</a></li>";
	strMenuHTML = strMenuHTML + "<li><a href='/05facility/05facility.htm'>施設ガイド</a></li>";
	strMenuHTML = strMenuHTML + "<li><a href='/05history/05history.htm'>ボートレース津のあゆみ</a></li>";
	strMenuHTML = strMenuHTML + "</ul>";
	strMenuHTML = strMenuHTML + "</div>";
	strMenuHTML = strMenuHTML + "</li><!--/b5-->";
	strMenuHTML = strMenuHTML + "";
	strMenuHTML = strMenuHTML + "<li class='b6'>";
	strMenuHTML = strMenuHTML + "<img src='/common_img/menu1_b6.png' class='btn_img'>";
	strMenuHTML = strMenuHTML + "<div class='menu2'>";
	strMenuHTML = strMenuHTML + "<h4>三重支部情報</h4>";
	strMenuHTML = strMenuHTML + "<ul>";
	strMenuHTML = strMenuHTML + "<li><a href='/06meikan/06meikan.htm'>三重支部名鑑</a></li>";
	strMenuHTML = strMenuHTML + "<li><a href='/06topic/06topic.htm'>三重's TOPIC</a></li>";
	strMenuHTML = strMenuHTML + "</ul>";
	strMenuHTML = strMenuHTML + "</div>";
	strMenuHTML = strMenuHTML + "</li><!--/b6-->";
	strMenuHTML = strMenuHTML + "";
	strMenuHTML = strMenuHTML + "</ul>";
	strMenuHTML = strMenuHTML + "</div>";
	strMenuHTML = strMenuHTML + "";
	strMenuHTML = strMenuHTML + "<a href='/t_jump/jump_facebook.htm' target='_blank' id='nav_fb'>ボートレース津公式facebook</a>";
	strMenuHTML = strMenuHTML + "<a href='/t_jump/jump_twitter.htm' target='_blank' id='nav_twi'>ボートレース津公式twitter</a>";		strMenuHTML = strMenuHTML + "<a href='/t_jump/jump_youtube.htm' target='_blank' id='nav_yt'>ボートレース津公式YouTube</a>";

	//書き出し
	document.write(strMenuHTML);

}
