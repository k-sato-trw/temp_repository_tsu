<%
'// **************************************************************************
'// * アクセス元のAgentを取得し、スマートフォンを判別して文字列を返す関数
'// **************************************************************************
'// * 対応OS
'// * Android
'// * iphone,ipad,ipod
'// **************************************************************************
'// * その他 = PC
'// **************************************************************************
'// * 更新履歴
'// **************************************************************************
'// * 2011/03/08 takachi 新規作成
'// **************************************************************************
	Function smartAgentGetter()

		Dim strReturn			'// 戻り値
		Dim strUserAgent		'// USERAGENT

		'// Agent取得
		strUserAgent = Trim( Request.ServerVariables("HTTP_USER_AGENT") )

		'// Agent判別処理
		If InStr( strUserAgent , "Linux; U; Android" ) > 0 Then
		'// Androidの時

			strReturn = "Android"
		ElseIf InStr( strUserAgent , "Linux; Android" ) > 0 Then
		'// Android(GoogleChrome)のとき

			strReturn = "Android"
		ElseIf InStr( strUserAgent , "iPhone;" ) > 0 Then
		'// iphoneの時

			strReturn = "iPhone"
		ElseIf InStr( strUserAgent , "iPad;" ) > 0 Then
		'// ipadの時

			strReturn = "iPad"
		ElseIf InStr( strUserAgent , "iPod;" ) > 0 Then
		'// ipodの時

			strReturn = "iPod"
		Else
		'// PC またはその他のスマートフォン

			strReturn = "PC"
		End If

		'// 戻り値
		smartAgentGetter = strReturn
	End Function
%>