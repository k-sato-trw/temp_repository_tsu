
//**************************************************************
// * 津スマホトップメインメニュー用のjavascript
// * top_main_navi.js
//**************************************************************
// * 使用方法 
//**************************************************************
//◆用意
//<head></head>内に下記を指定する
//<script type="text/javascript" src="/sp/js/top_main_navi.js"></script>
//◆表示
//表示したい箇所に下記を指定する
//<script type="text/javascript">
//funcTsuMainMenu();
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


	function funcTsuMainMenu()
	{

		var strMenuHTML = '';
		strMenuHTML = strMenuHTML + "<dl id='top_nav_main' class='accordion_box'>";
		strMenuHTML = strMenuHTML + "<dt class='nav1 plus'><span>レース情報</span></dt>";
		strMenuHTML = strMenuHTML + "<dd class='nav1'><ul>";
		strMenuHTML = strMenuHTML + "<li><a href='/asp/tsu/sp/01cal/01cal.asp'>開催日程</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/asp/htmlmade/Race/Tenbo/09/SP/jumper.htm'>展望・出場予定選手</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='https://secure.webkyotei.jp/asp/mform/09/mail/form.asp' target='_blank'>メールマガジン</a></li>";
		strMenuHTML = strMenuHTML + "</ul></dd>";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "<dt class='nav2 plus'><span>データ集</span></dt>";
		strMenuHTML = strMenuHTML + "<dd class='nav2'><ul>";
		strMenuHTML = strMenuHTML + "<li><a href='/sp/02suimen/02suimen.htm'>水面＆コース別データ</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/asp/kyogi/09/sp/02motor/02motor.htm'>モーター＆ボートデータ</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/sp/02deme/02deme.htm	'>出目・高配当ランキング</a></li>";
		strMenuHTML = strMenuHTML + "</ul></dd>";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "<dt class='nav3 plus'><span>ファンサービス</span></dt>";
		strMenuHTML = strMenuHTML + "<dd class='nav3'><ul>";
		strMenuHTML = strMenuHTML + "<li><a href='/asp/tsu/sp/04event/04event_SP.asp'>イベント＆ファンサービス</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/sp/t_jump/jump_pointclub.htm' target='_blank'>津ポイント倶楽部</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/sp/04fanclub/04fanclub.htm'>ボートレース津ファンクラブ</a></li>";
		strMenuHTML = strMenuHTML + "<li class='small'><a href='/sp/04group/04group.htm'>お土産つき グループ来場申し込み</a></li>";
		strMenuHTML = strMenuHTML + "</ul></dd>";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "<dt class='nav4 plus'><span>結果サーチ</span></dt>";
		strMenuHTML = strMenuHTML + "<dd class='nav4'><ul>";
		strMenuHTML = strMenuHTML + "<li><a href='/asp/tsu/sp/03result_tsu/03result_tsu.asp'>レース結果検索</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/asp/tsu/sp/kyogi/index.asp?jyo=09&racenum=1&page=15'>節間レース結果</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/asp/kyogi/09/sp/yosen.htm'>得点率情報</a></li>		";
		strMenuHTML = strMenuHTML + "<li><a href='/asp/tsu/sp/03play_b/03play_b.asp'>優勝戦プレイバック</a></li>";		
		strMenuHTML = strMenuHTML + "</ul></dd>";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "<dt class='nav5 plus'><span>交通＆施設</span></dt>";
		strMenuHTML = strMenuHTML + "<dd class='nav5'><ul>";
		strMenuHTML = strMenuHTML + "<li><a href='/sp/05access/05access.htm'>交通アクセス</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/sp/05facility/05facility.htm'>施設ガイド</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/sp/05history/05history.htm'>ボートレース津のあゆみ</a></li>";
		strMenuHTML = strMenuHTML + "</ul></dd>";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "<dt class='nav6 plus'><span>三重支部情報</span></dt>";
		strMenuHTML = strMenuHTML + "<dd class='nav6'><ul>";
		strMenuHTML = strMenuHTML + "<li><a href='/sp/06meikan/06meikan.htm'>三重支部名鑑</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/sp/06topic/06topic.htm'>三重's TOPIC</a></li>";
		strMenuHTML = strMenuHTML + "</ul></dd>";
		strMenuHTML = strMenuHTML + "</dl><!--/#top_nav_main-->";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "<ul id='top_sub_nav1'>";
		strMenuHTML = strMenuHTML + "<li id='facebook'><a href='/sp/t_jump/jump_facebook.htm' target='_blank'>facebook</a></li>";
//多言語サイト
		strMenuHTML = strMenuHTML + "<li id='lan_en'><a href='/en/' target='_blank'>English</a></li>";
		strMenuHTML = strMenuHTML + "<li id='lan_ch1'><a href='/cn/' target='_blank'>Chinese</a></li>";
		strMenuHTML = strMenuHTML + "<li id='lan_ch2'><a href='/tw/' target='_blank'>Chinese</a></li>";
		strMenuHTML = strMenuHTML + "<li id='lan_ko'><a href='/ko/' target='_blank'>Korean</a></li>";
		strMenuHTML = strMenuHTML + "<div class='clear'></div>";
		strMenuHTML = strMenuHTML + "</ul><!--/#top_sub_nav1-->";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "<ul id='top_sub_nav2'>";
		strMenuHTML = strMenuHTML + "<li class='b1'><a href='/sp/policy/policy.htm'>個人情報の取り扱い</a></li>";
		strMenuHTML = strMenuHTML + "<li class='b2'><a href='/sp/faq/faq.htm'>よくある質問</a></li>";
		strMenuHTML = strMenuHTML + "<li class='b3'><a href='/sp/help/help.htm'>ヘルプ</a></li>";
		strMenuHTML = strMenuHTML + "<li class='b4'><a href='https://secure.webkyotei.jp/asp/mform/09/inquiry/form.asp' target='_blank'>お問い合わせ</a></li>";
		strMenuHTML = strMenuHTML + "<div class='clear'></div>";
		strMenuHTML = strMenuHTML + "</ul><!--/#top_sub_nav2-->";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "<div id='btn_pc'><a href='/'>PCサイトへ</a></div>";

		//書き出し
		document.write(strMenuHTML);

	}