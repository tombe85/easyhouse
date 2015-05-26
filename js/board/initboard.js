$(document).bind('pagebeforecreate',function(){
    var login = getCookie("login");
    if(!login){
        location.href='/sweethomesw/login.html';
    }
});

$(document).bind('pageinit', function(){
    //Footer
    $("#header").load("/sweethomesw/ajax/header.php");
    $("#footer").load("/sweethomesw/footer/footer.html", function(){
        $("#tablonbutton").attr("src","/sweethomesw/img/tablonselected.png");
    });
    $("#boardMessages").load("/sweethomesw/ajax/messages.php");
    $(document).ajaxComplete(function(){
        $("body").resize();
    });
});