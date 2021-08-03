//Xマーク変化用
$(function(){
	$('#nav_btn').on('click', function() {
		$(this).toggleClass('open');
		$('div.menu2').removeClass('open');
	});
});



//大メニュースライド
$(function(){
var menu1 = $('#nav_main'), // スライドインするメニューを指定
	menu1Btn = $('#nav_btn'); // メニューボタンを指定

    // メニューボタンをクリックした時の動き
    menu1Btn.on('click', function(){

    // menu に open クラスを付与する
    menu1.toggleClass('open');

        if(menu1.hasClass('open')){
            // open クラスが menu についていたらメニューをスライドインする
			menu1.animate({ top:'110px', opacity:'toggle' },400);
			$('#nav_fb').animate({top: '590px'});
			$('#nav_twi').animate({top: '630px'});
            $('#nav_yt').animate({top: '670px'});
        } else {
            // open クラスが menu についていなかったらスライドアウトする
			menu1.animate({ top:'-300px', opacity:'toggle' },300);
			$('#nav_fb').animate({top: '120px'});
			$('#nav_twi').animate({top: '160px'});
            $('#nav_yt').animate({top: '200px'});
        }
    });
});



//小メニュースライド
$(function(){

	//メニューアイコンをクリックした時の動き
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
  // クリックした場所が#nav(領域内とみなす範囲)に無ければmenuを消す
//  if(!$.contains($('#nav')[0], event.target)){
//	  $('.menu2').removeClass('open');
//	  alert('click');
//    }
//});
