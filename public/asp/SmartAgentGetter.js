//PC,Android,iphone�̃G�[�W�F���g�𔻒f����p��javascript
//SmartAgentGetter.js
//
//�g�p���@<head></head>���ɉ��L���w�肷��
//<script language="JavaScript" src="/asp/SmartAgentGetter.js"></script>


	function funcJsSmartAgentGetter()
	{
		var strReturn			// �߂�l
		var strUserAgent		// USERAGENT

		// Agent�擾
		strUserAgent = navigator.userAgent;

		// Agent���ʏ���
		if( strUserAgent.indexOf("Linux; U; Android") != -1 )
		{// Android�̎�
			strReturn = "Android";
		}
		else if( strUserAgent.indexOf("Linux; Android") != -1 )
		{//Android��GoogleChrome�ŃA�N�Z�X�����Ƃ�
			strReturn = "Android";
		}
		else if( strUserAgent.indexOf("Android") != -1 )
		{//Android
			strReturn = "Android";
		}
		else if( strUserAgent.indexOf("iPhone;") != -1 )
		{// iphone�̎�
			strReturn = "iPhone";
		}
		else if( strUserAgent.indexOf("iPad;") != -1 )
		{// ipad�̎�
			strReturn = "iPad";
		}
		else if( strUserAgent.indexOf("iPod;") != -1 )
		{// ipod�̎�
			strReturn = "iPod";
		}
		else
		{// PC �܂��͂��̑��̃X�}�[�g�t�H��
			strReturn = "PC";
		}

		// �߂�l
		return strReturn;
	}