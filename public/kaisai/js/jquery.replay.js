//////////
//���[�X���v���C���j���[����
//////////
$(function(){

//���v���C�{�^���������Ƃ�
$('#replay_wrap #btn_rep').click(function(){
	$(this).fadeOut(200);
	$('#replay_main').fadeIn(100);
	$('#replay_main').animate({"left":"-399px"},{duration: 'fast',queue:false});
});

//����{�^���������Ƃ�
$('#replay_wrap .close').click(function(){
	$('#replay_main').fadeOut(100);
	$('#replay_main').animate({"left":"0"},{queue:false});
	$('#replay_wrap #btn_rep').fadeIn(200);
});

});