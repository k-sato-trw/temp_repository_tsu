<%
'// **************************************************************************
'// * �A�N�Z�X����Agent���擾���A�X�}�[�g�t�H���𔻕ʂ��ĕ������Ԃ��֐�
'// **************************************************************************
'// * �Ή�OS
'// * Android
'// * iphone,ipad,ipod
'// **************************************************************************
'// * ���̑� = PC
'// **************************************************************************
'// * �X�V����
'// **************************************************************************
'// * 2011/03/08 takachi �V�K�쐬
'// **************************************************************************
	Function smartAgentGetter()

		Dim strReturn			'// �߂�l
		Dim strUserAgent		'// USERAGENT

		'// Agent�擾
		strUserAgent = Trim( Request.ServerVariables("HTTP_USER_AGENT") )

		'// Agent���ʏ���
		If InStr( strUserAgent , "Linux; U; Android" ) > 0 Then
		'// Android�̎�

			strReturn = "Android"
		ElseIf InStr( strUserAgent , "Linux; Android" ) > 0 Then
		'// Android(GoogleChrome)�̂Ƃ�

			strReturn = "Android"
		ElseIf InStr( strUserAgent , "iPhone;" ) > 0 Then
		'// iphone�̎�

			strReturn = "iPhone"
		ElseIf InStr( strUserAgent , "iPad;" ) > 0 Then
		'// ipad�̎�

			strReturn = "iPad"
		ElseIf InStr( strUserAgent , "iPod;" ) > 0 Then
		'// ipod�̎�

			strReturn = "iPod"
		Else
		'// PC �܂��͂��̑��̃X�}�[�g�t�H��

			strReturn = "PC"
		End If

		'// �߂�l
		smartAgentGetter = strReturn
	End Function
%>