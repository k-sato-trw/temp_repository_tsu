//PC,Android,iphoneのエージェントを判断する用のjavascript
//SmartAgentGetter.js
//
//使用方法<head></head>内に下記を指定する
//<script language="JavaScript" src="/asp/SmartAgentGetter.js"></script>


	function funcJsSmartAgentGetter()
	{
		var strReturn			// 戻り値
		var strUserAgent		// USERAGENT

		// Agent取得
		strUserAgent = navigator.userAgent;

		// Agent判別処理
		if( strUserAgent.indexOf("Linux; U; Android") != -1 )
		{// Androidの時
			strReturn = "Android";
		}
		else if( strUserAgent.indexOf("Linux; Android") != -1 )
		{//AndroidのGoogleChromeでアクセスしたとき
			strReturn = "Android";
		}
		else if( strUserAgent.indexOf("Android") != -1 )
		{//Android
			strReturn = "Android";
		}
		else if( strUserAgent.indexOf("iPhone;") != -1 )
		{// iphoneの時
			strReturn = "iPhone";
		}
		else if( strUserAgent.indexOf("iPad;") != -1 )
		{// ipadの時
			strReturn = "iPad";
		}
		else if( strUserAgent.indexOf("iPod;") != -1 )
		{// ipodの時
			strReturn = "iPod";
		}
		else
		{// PC またはその他のスマートフォン
			strReturn = "PC";
		}

		// 戻り値
		return strReturn;
	}