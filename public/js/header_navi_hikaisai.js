
//**************************************************************
// * �ÃT�C�h���j���[�p��javascript
// * header_navi_hikaisai.js
//**************************************************************
// * �g�p���@ 
//**************************************************************
//���p��
//<head></head>���ɉ��L���w�肷��
//<script type="text/javascript" src="/jsheader_navi.js"></script>
//���\��
//�\���������ӏ��ɉ��L���w�肷��
//<script type="text/javascript">
//funcTsuHeaderMenu();
//</script>
//**************************************************************
// * �ҏW���@ �����K���e�X�g�T�C�g�Ŗ��Ȃ����m�F���Ă�����������
//**************************************************************
//	strMenuHTML = strMenuHTML + "[���̊Ԃ�HTML���}������]";
//	�����ӁI��
//	�u"�v(�_�u���N�H�[�e�[�V����)���g�p�����A
//	�u'�v(�V���O���N�H�[�e�[�V����)���g�p���Ă��������B
//	�܂��Ajs�̋K���O�̂��Ƃ�����ƁA�S�ĕ\������Ȃ��Ȃ�܂��B
//	�����l��
//	�ҏW�Ɏ��M���Ȃ��ꍇ�̓V�X�e���܂ŕύX���Ăق����ӏ���A�����Ă��������B
// **************************************************************
// * �X�V����
// **************************************************************
// * 
// **************************************************************

	
	function funcTsuHeaderMenu()
	{

		var strMenuHTML = '';
		strMenuHTML = strMenuHTML + "<li class='b0'><a href='/asp/tsu/kaisai/kaisaiindex.htm'>���v���C</a></li>";
		strMenuHTML = strMenuHTML + "<li class='b2'>���[�X�\�z</li>";
		strMenuHTML = strMenuHTML + "<li class='b3'><a href='/asp/log/tsu_top.asp' target='_blank'>�M�����[</a></li>";
		strMenuHTML = strMenuHTML + "<div class='clear'></div>";

		//�����o��
		document.write(strMenuHTML);

	}