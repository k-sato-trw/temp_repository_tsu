$(function() {
    $("#tab_odds01 li").click(function() {
		var num = $("#tab_odds01 li").index(this);
		$("#tab_odds01 li").removeClass("selected");
		$("#tab_odds02 li").removeClass("selected");
        $(this).addClass("selected");
		$("#tab_odds02 li").eq(num).addClass("selected");
		$(".cont_odds").hide();
        $(".cont_odds").eq(num).fadeIn("normal");
    });
	$("#tab_odds01 li").first().click();
});


$(function() {
    $("#tab_odds02 li").click(function() {
		var num = $("#tab_odds02 li").index(this);
		$("#tab_odds02 li").removeClass("selected");
		$("#tab_odds01 li").removeClass("selected");
        $(this).addClass("selected");
		$("#tab_odds01 li").eq(num).addClass("selected");
		$(".cont_odds").hide();
        $(".cont_odds").eq(num).fadeIn("normal");

		// é©ìÆÇ≈ÉyÅ[ÉWè„ïîÇ÷à⁄ìÆ
		funcUpMove("wrapper");

    });
});
