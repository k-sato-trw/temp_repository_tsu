//PC,Android,iphone�̃G�[�W�F���g�𔻒f����p��javascript
//LiveSmartAgentGetter.js
//
//���C�u�z�M�p
//
//�g�p���@<head></head>���ɉ��L���w�肷��
//<script language="JavaScript" src="/asp/videoplayer/common/LiveSmartAgentGetter.js"></script>


	function funcJsLiveSmartAgentGetter()
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
		{// 20170921 h-kai ��L�p�^�[�����Ƌ@��ɂ����Android���肳��Ȃ��ꍇ���������̂Œǉ�
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
		else if( strUserAgent.toLowerCase().indexOf("mac") != -1 )
		{// mac�̎�
			strReturn = "mac";
		}
		else
		{// PC �܂��͂��̑��̃X�}�[�g�t�H��
			strReturn = "PC";
		}

		// �߂�l
		return strReturn;
	}