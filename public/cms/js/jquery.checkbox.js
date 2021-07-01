$(function () {
    $("input[type='checkbox']").change(function(){
        if($(this).is(":checked")){
            $(this).parent().addClass("c_on");
        }else{
            $(this).parent().removeClass("c_on");
        }
    });
});

$(function () {
    $(".deme1 input[type='checkbox']").change(function(){
        if($(this).is(":checked")){
            $(this).parent().addClass("c_on");
        }else{
            $(this).parent().removeClass("c_on");
        }
    });
});

$(function () {
    $(".deme2 input[type='checkbox']").change(function(){
        if($(this).is(":checked")){
            $(this).parent().addClass("c_on");
        }else{
            $(this).parent().removeClass("c_on");
        }
    });
});

$(function () {
    $(".deme3 input[type='checkbox']").change(function(){
        if($(this).is(":checked")){
            $(this).parent().addClass("c_on");
        }else{
            $(this).parent().removeClass("c_on");
        }
    });
});