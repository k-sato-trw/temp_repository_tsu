// Android��FlashPLayer���C���X�g�[������Ă��邩���f����javascript
// FlashPlayerCheck.js
//
// �g�p���@<head></head>���ɉ��L���w�肷��
// <script language="JavaScript" src="/asp/SmartAgentGetter.js"></script>


	function funcJsFlashPlayerCheck(){ 
		var flag  = { os : false, player: false }; 
		var userAgent = navigator.userAgent.match(/android (\d+\.\d+)/i); 

		if (!!userAgent && (userAgent[1] >= 2.2)) {
		//Android OS�̃o�[�W�������f
			//2.2�ȏ�̂Ƃ�OS�t���O�𗧂Ă�
		        flag.os = true; 
			//�v���O�C�������擾
		        var plugins = navigator.plugins;
			for (key in plugins) {
			//�v���O�C���̐��������[�v
				//�v���O�C�����擾
				var description = (plugins[key]['description'] || '').match(/shockwave flash (\d+\.\d+)/i);
				if (!!description && (description[1] >= 10.1)) {
				//Flash Player�̃o�[�W�������f(Android�pFlash Player��10.1�ȏ�̂��ߏ����ɓ����Ă��Ȃ��ꍇ�͖��C���X�g�[���Ƃ��Ĕ��f����)
					//�����Ă���ꍇplayer�t���O�𗧂Ă�
					flag.player = true;
				}
			}
		} 
		//�t���O��Ԃ�
		return flag;
	}