var globalWidth = 0;

$(function(){
	$('#slide_menu ul li ul').hide();

	$('li:has(ul) > a').each(function(){
		$(this).parent('li').children('ul').children('.replay_race').after('<li><a href="javascript:void(0);" class="slide_back">BACK</a></li>');
	});

	var areaWidth = 720;

	var areaHeight = $('ul#slide_list').height();

	$('#slide_menu').css({width:(areaWidth) + 'px',height:(areaHeight) + 'px'});
	$('#slide_menu ul li,#slide_menu ul li a').css({width:(areaWidth) + 'px'});

	$('li:has(ul) > a').click(function(){

		$(this).parents('li').animate({width: '+=' + (areaWidth) + 'px'},0);
//		$('ul#slide_list').animate({marginLeft: '-=' + (areaWidth) + 'px'},300);

		$('ul#slide_list').animate({marginLeft: '-' + (globalWidth+areaWidth) + 'px'},300);

		$(this).parent('li').children('ul').fadeIn('fast');
		$(this).parent('li').prevAll().css({display:'none'});
		$(this).parent('li').nextAll().css({display:'none'});

		var areaHeight = $('ul#slide_list').height();
		$('#slide_menu').css({height:(areaHeight) + 'px'});


		globalWidth = globalWidth + areaWidth;
	});


	$('a.slide_back').click(function(){
		$(this).parents('li').animate({width: '-=' + (areaWidth) + 'px'},0);
//		$('ul#slide_list').animate({marginLeft: '+=' + (areaWidth) + 'px'},300);
		$('ul#slide_list').animate({marginLeft: (areaWidth - globalWidth) + 'px'},300);

		$(this).parent('li').parent('ul').css({display: 'none'});
		$(this).parent('li').parent('ul').parent('li').prevAll('.title').fadeIn('fast');
		$(this).parent('li').parent('ul').parent('li').prevAll('li').fadeIn('fast');
		$(this).parent('li').parent('ul').parent('li').nextAll('li').fadeIn('fast');

		var areaHeight = $('ul#slide_list').height();
		$('#slide_menu').css({height:(areaHeight) + 'px'});

		globalWidth = globalWidth - areaWidth;

	});
});
