
$("#forgot").hide();
$("#forgotbtn").on('click', function(){
    $("#forgot").show(500);
    $("#login").hide(500);
});
;

$("#backlogin").on('click', function(){
    $("#login").show(500);
    $("#forgot").hide(500);
});
;
