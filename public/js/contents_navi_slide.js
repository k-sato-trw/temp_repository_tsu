//X�}�[�N�ω��p
$(function(){
	$('#nav_btn').on('click', function() {
		$(this).toggleClass('open');
		$('div.menu2').removeClass('open');
	});
});



//�僁�j���[�X���C�h
$(function(){
var menu1 = $('#nav_main'), // �X���C�h�C�����郁�j���[���w��
	menu1Btn = $('#nav_btn'); // ���j���[�{�^�����w��

    // ���j���[�{�^�����N���b�N�������̓���
    menu1Btn.on('click', function(){

    // menu �� open �N���X��t�^����
    menu1.toggleClass('open');

        if(menu1.hasClass('open')){
            // open �N���X�� menu �ɂ��Ă����烁�j���[���X���C�h�C������
			menu1.animate({ top:'110px', opacity:'toggle' },400);
			$('#nav_fb').animate({top: '590px'});
			$('#nav_twi').animate({top: '630px'});
            $('#nav_yt').animate({top: '670px'});
        } else {
            // open �N���X�� menu �ɂ��Ă��Ȃ�������X���C�h�A�E�g����
			menu1.animate({ top:'-300px', opacity:'toggle' },300);
			$('#nav_fb').animate({top: '120px'});
			$('#nav_twi').animate({top: '160px'});
            $('#nav_yt').animate({top: '200px'});
        }
    });
});



//�����j���[�X���C�h
$(function(){

	//���j���[�A�C�R�����N���b�N�������̓���
	$('.btn_img').mouseover(function(){
		$('div.menu2').removeClass('open');
		$(this).next('div.menu2').addClass('open');
		$('p.dummy').remove();
		$('body').append('<p class="dummy"></p>');
    });


	$('body').on('click', '.dummy', function() {
		$('div.menu2').removeClass('open');
		$('p.dummy').remove();
	});


	$('div.menu2 ul li').on('click', function(){
		$('div.menu2').removeClass('open');
		$('p.dummy').remove();
	});

});


//$(document).click(function(event) {
  // �N���b�N�����ꏊ��#nav(�̈���Ƃ݂Ȃ��͈�)�ɖ������menu������
//  if(!$.contains($('#nav')[0], event.target)){
//	  $('.menu2').removeClass('open');
//	  alert('click');
//    }
//});
