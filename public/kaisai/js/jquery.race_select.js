$(function(){
    $("#race_num dt").click(function(){
        $("#race_num dd").slideToggle(200);
		$("#race_num dt").toggleClass('select');
    });
});