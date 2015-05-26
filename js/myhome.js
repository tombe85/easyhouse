$(document).bind('pagebeforecreate',function(){
    var loged = getCookie("login");
    if(!loged){
        location.href='/sweethomesw/login.html';
    }
});

$(document).bind('pageinit', function(){
    //Footer
    $("#header").load("/sweethomesw/ajax/header.php?backbutton=true&backurl=/sweethomesw/home.html");
    $("#footer").load("/sweethomesw/footer/footer.html", function(){
        $("#homebutton").attr("src","/sweethomesw/img/homeselected.png");
    });
    $("#myhouseinfo").load("/sweethomesw/ajax/homeinfo.php");
    $("#myhousemates").load("/sweethomesw/ajax/homemates.php");
    $(document).ajaxComplete(function(){
        $("body").resize();
    });
});