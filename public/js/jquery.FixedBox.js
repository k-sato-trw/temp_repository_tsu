$(function(){

floatBox("#FixedBox");

//ele=�Œ肷��v�f�Aflag=�T�C�h�o�[�ɌŒ肷��v�f������A�t�b�^�[�ɂ��Ԃ�Ȃ��悤�ɂ���ꍇ�Ɂu1�v���w��
function floatBox(ele, flag) {
	//�Œ肷��v�f���擾
	var box = $(ele);
	//�Œ肷��v�f�̈ʒu���擾
	var fixed_box_offset = box.offset();
	//�Œ肷��v�f�̃T�C�Y���擾
	var box_size = {"width": box.width(), "height":  box.height()};
	//�t�b�^�[�v�f�̈ʒu���擾
	var footer_box_offset = $("#footer_wrapper").offset();
	//�X�N���[���C�x���g��������������s
	$(window).scroll(function() {
		//�X�N���[���ʒu���擾
		var scroll_val = $(this).scrollTop();
		//�Œ肷��v�f�̈ʒu���X�N���[���ʒu���傫���Ȃ��...
		if(scroll_val > fixed_box_offset.top) {
			//�Œ肷��v�f��top:0���w�肳��Ă��Ȃ����...
			if(box.css("top") != 0) {
				//�X�^�C����ǉ�
				box.css({
					"position": "fixed",
					"z-index": 999,
					"width": 981,
					"height": box_size.height,
					"top": 0,
					"bottom": "auto"
				});
			}
			//�t�b�^�[������A�����j���[�����Ԃ�Ȃ��悤�ɂ���ꍇ��...
			if(flag == 1) {
				//�t�b�^�[�̈ʒu���X�N���[���ʒu���傫���Ȃ��...
				if(scroll_val > (footer_box_offset.top - box_size.height)) {
					//�X�^�C����ǉ�
					if(box.css("bottom") != 0) {
						box.css({
							"position": "absolute",
							"z-index": 999,
							"width": box_size.width,
							"height": box_size.height,
							"top": "auto",
							"bottom": 0
						});
					}
				}
			}
		//�Œ肷��v�f�̈ʒu���X�N���[���ʒu�����������...
		} else {
			//�Œ肷��v�f��style�������폜
			box.removeAttr("style");
		}
	});
}

});
