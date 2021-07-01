$(function(){
	$("#slide #slide_next").click(function(){
       	$("#slide ul").animate({ 
			marginLeft: "-460",
		}, 300 );
	});
	$("#slide #slide_back").click(function(){
       	$("#slide ul").animate({ 
			marginLeft: "0",
		}, 300 );
	});
});
