// ***************************************************************
// * OOOOO.htm?page=1 1-9まで取得
// ***************************************************************
// * 上記のように引数に数値を指定することで、
// ***************************************************************
// * 対象ページを初期値として表示が可能
// * 以下の処理はowl_carousel.jsを読み込む前に必ず必要
// ***************************************************************

	//ページのURLフラグ取得
	var strHTML = location.href;
	var strArgument = strHTML.substring( strHTML.indexOf('page=') , strHTML.length );
	var intFirstPage = strArgument.substring( strArgument.indexOf('=') + 1 , strArgument.length );

	if( isNaN(intFirstPage) == true || intFirstPage == "" )
	{// 数値ではない時trueとなるため、引数取得出来ない時強制的に初期ページ表示
		intFirstPage = 1;
	}
