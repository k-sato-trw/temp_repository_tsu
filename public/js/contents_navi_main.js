
//**************************************************************
// * �ÃT�C�h���j���[�p��javascript
// * contents_navi_main.js
//**************************************************************
// * �g�p���@
//**************************************************************
//���p��
//<head></head>���ɉ��L���w�肷��
//<script type="text/javascript" src="/js/contents_navi_main.js"></script>
//���\��
//�\���������ӏ��ɉ��L���w�肷��
//<script type="text/javascript">
//funcTsuMenu();
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
		strMenuHTML = strMenuHTML + "<h4>���[�X���</h4>";
		strMenuHTML = strMenuHTML + "<ul>";
		strMenuHTML = strMenuHTML + "<li><a href='/asp/tsu/kaisai/kaisaiindex.htm'>���[�X���C�u�����v���C</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/01cal/01cal.htm'>�J�Ó���</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/asp/htmlmade/Race/Tenbo/09/PC/jumper.htm'>�W�]�E�o��\��I��</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='javascript:MultiOpen(\"https://secure.webkyotei.jp/asp/mform/09/mail/form.asp\",\"mail\",\"800\",\"800\");'>���[���}�K�W��</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/01mobile/01mobile.htm'>���o�C���T�[�r�X</a></li>";
		strMenuHTML = strMenuHTML + "</ul>";
		strMenuHTML = strMenuHTML + "</div>";
		strMenuHTML = strMenuHTML + "</li><!--/b1-->";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "<li class='b2'>";
		strMenuHTML = strMenuHTML + "<img src='/common_img/menu1_b2.png' class='btn_img'>";
		strMenuHTML = strMenuHTML + "<div class='menu2'>";
		strMenuHTML = strMenuHTML + "<h4>�f�[�^�W</h4>";
		strMenuHTML = strMenuHTML + "<ul>";
		strMenuHTML = strMenuHTML + "<li><a href='/02suimen/02suimen.htm'>���ʁ��R�[�X�ʃf�[�^</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/asp/kyogi/09/pc/02motor/02motor.htm'>���[�^�[���{�[�g�f�[�^</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/02deme/02deme.htm'>�o�ځE���z�������L���O</a></li>";
		strMenuHTML = strMenuHTML + "</ul>";
		strMenuHTML = strMenuHTML + "</div>";
		strMenuHTML = strMenuHTML + "</li><!--/b2-->";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "<li class='b3'>";
		strMenuHTML = strMenuHTML + "<img src='/common_img/menu1_b3.png' class='btn_img'>";
		strMenuHTML = strMenuHTML + "<div class='menu2'>";
		strMenuHTML = strMenuHTML + "<h4>�t�@���T�[�r�X</h4>";
		strMenuHTML = strMenuHTML + "<ul>";
		strMenuHTML = strMenuHTML + "<li><a href='/04event/04event.htm'>�C�x���g���t�@���T�[�r�X</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/04cashless/04cashless.htm'>�L���b�V�����X�J�[�h</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/t_jump/jump_pointclub.htm' target='_blank'>�Ã|�C���g��y��</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/04fanclub/04fanclub.htm'>�{�[�g���[�X�Ãt�@���N���u</a></li>";
		strMenuHTML = strMenuHTML + "<li class='small'><a href='/04group/04group.htm'><span>���y�Y��</span> �O���[�v����\������</a></li>";
		strMenuHTML = strMenuHTML + "</ul>";
		strMenuHTML = strMenuHTML + "</div>";
		strMenuHTML = strMenuHTML + "</li><!--/b3-->";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "<li class='b4'>";
		strMenuHTML = strMenuHTML + "<img src='/common_img/menu1_b4.png' class='btn_img'>";
		strMenuHTML = strMenuHTML + "<div class='menu2'>";
		strMenuHTML = strMenuHTML + "<h4>���ʃT�[�`</h4>";
		strMenuHTML = strMenuHTML + "<ul>";
		strMenuHTML = strMenuHTML + "<li><a href='/03result_tsu/03result_tsu.htm'>���[�X���ʌ���</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/03play_b/03play_b.htm'>�D����v���C�o�b�N</a></li>";
		strMenuHTML = strMenuHTML + "</ul>";
		strMenuHTML = strMenuHTML + "</div>";
		strMenuHTML = strMenuHTML + "</li><!--/b4-->";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "<li class='b5'>";
		strMenuHTML = strMenuHTML + "<img src='/common_img/menu1_b5.png' class='btn_img'>";
		strMenuHTML = strMenuHTML + "<div class='menu2'>";
		strMenuHTML = strMenuHTML + "<h4>��ʁ��{��</h4>";
		strMenuHTML = strMenuHTML + "<ul>";
		strMenuHTML = strMenuHTML + "<li><a href='/05access/05access.htm'>��ʃA�N�Z�X</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/05facility/05facility.htm'>�{�݃K�C�h</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/05history/05history.htm'>�{�[�g���[�X�Â̂����</a></li>";
		strMenuHTML = strMenuHTML + "</ul>";
		strMenuHTML = strMenuHTML + "</div>";
		strMenuHTML = strMenuHTML + "</li><!--/b5-->";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "<li class='b6'>";
		strMenuHTML = strMenuHTML + "<img src='/common_img/menu1_b6.png' class='btn_img'>";
		strMenuHTML = strMenuHTML + "<div class='menu2'>";
		strMenuHTML = strMenuHTML + "<h4>�O�d�x�����</h4>";
		strMenuHTML = strMenuHTML + "<ul>";
		strMenuHTML = strMenuHTML + "<li><a href='/06meikan/06meikan.htm'>�O�d�x������</a></li>";
		strMenuHTML = strMenuHTML + "<li><a href='/06topic/06topic.htm'>�O�d's TOPIC</a></li>";
		strMenuHTML = strMenuHTML + "</ul>";
		strMenuHTML = strMenuHTML + "</div>";
		strMenuHTML = strMenuHTML + "</li><!--/b6-->";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "</ul>";
		strMenuHTML = strMenuHTML + "</div>";
		strMenuHTML = strMenuHTML + "";
		strMenuHTML = strMenuHTML + "<a href='/t_jump/jump_facebook.htm' target='_blank' id='nav_fb'>�{�[�g���[�X�Ì���facebook</a>";
		strMenuHTML = strMenuHTML + "<a href='/t_jump/jump_twitter.htm' target='_blank' id='nav_twi'>�{�[�g���[�X�Ì���twitter</a>";		strMenuHTML = strMenuHTML + "<a href='/t_jump/jump_youtube.htm' target='_blank' id='nav_yt'>�{�[�g���[�X�Ì���YouTube</a>";

		//�����o��
		document.write(strMenuHTML);

	}
