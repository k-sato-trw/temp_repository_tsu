// ******************************************************
// * SetColorで文字装飾をした時の文字を除去する
// ******************************************************

function funcSetColorReplace( argData )
{
	var strReturn = '';
	strReturn = argData;


	if( argData != "" )
	{

		strReturn = strReturn.replace( /（/g , "(" );
		strReturn = strReturn.replace( /）/g , ")" );

		strReturn = strReturn.replace( /\(リ始\)/g , "" );
		strReturn = strReturn.replace( /\(リ中\)/g , "" );
		strReturn = strReturn.replace( /\(リ終\)/g , "" );
		strReturn = strReturn.replace( /\(リ別始\)/g , "" );
		strReturn = strReturn.replace( /\(リ別中\)/g , "" );
		strReturn = strReturn.replace( /\(リ別終\)/g , "" );

		strReturn = strReturn.replace( /\(赤\)/g , "" );
		strReturn = strReturn.replace( /\(\/赤\)/g , "" );

		strReturn = strReturn.replace( /\(エ\)/g , "" );
		strReturn = strReturn.replace( /\(\/エ\)/g , "" );

		strReturn = strReturn.replace( /\(紫\)/g , "" );
		strReturn = strReturn.replace( /\(\/紫\)/g , "" );

		strReturn = strReturn.replace( /\(緑\)/g , "" );
		strReturn = strReturn.replace( /\(\/緑\)/g , "" );

		strReturn = strReturn.replace( /\(灰\)/g , "" );
		strReturn = strReturn.replace( /\(\/灰\)/g , "" );
		strReturn = strReturn.replace( /\(茶\)/g , "" );
		strReturn = strReturn.replace( /\(\/茶\)/g , "" );
		strReturn = strReturn.replace( /\(紺\)/g , "" );
		strReturn = strReturn.replace( /\(\/紺\)/g , "" );
		strReturn = strReturn.replace( /\(橙\)/g , "" );
		strReturn = strReturn.replace( /\(\/橙\)/g , "" );
		strReturn = strReturn.replace( /\(空\)/g , "" );
		strReturn = strReturn.replace( /\(\/空\)/g , "" );
		strReturn = strReturn.replace( /\(桃\)/g , "" );
		strReturn = strReturn.replace( /\(\/桃\)/g , "" );

		strReturn = strReturn.replace( /\(太\)/g , "" );
		strReturn = strReturn.replace( /\(\/太\)/g , "" );
		strReturn = strReturn.replace( /\(斜\)/g , "" );
		strReturn = strReturn.replace( /\(\/斜\)/g , "" );

		strReturn = strReturn.replace( /\(1\)/g , "" );
		strReturn = strReturn.replace( /\(\/1\)/g , "" );
		strReturn = strReturn.replace( /\(2\)/g , "" );
		strReturn = strReturn.replace( /\(\/2\)/g , "" );
		strReturn = strReturn.replace( /\(3\)/g , "" );
		strReturn = strReturn.replace( /\(\/3\)/g , "" );
		strReturn = strReturn.replace( /\(4\)/g , "" );
		strReturn = strReturn.replace( /\(\/4\)/g , "" );
		strReturn = strReturn.replace( /\(5\)/g , "" );
		strReturn = strReturn.replace( /\(\/5\)/g , "" );
		strReturn = strReturn.replace( /\(6\)/g , "" );
		strReturn = strReturn.replace( /\(\/6\)/g , "" );
		strReturn = strReturn.replace( /\(7\)/g , "" );
		strReturn = strReturn.replace( /\(\/7\)/g , "" );

	}

	return strReturn;
}
