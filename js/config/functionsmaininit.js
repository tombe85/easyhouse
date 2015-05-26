$(document).bind('pagebeforecreate',function(){
    var loged = getCookie("login");
    var admin = getCookie("admin");
    if(!loged){
        location.href='/sweethomesw/login.html';
    }
    if(loged == true && admin == true){
        location.href='/sweethomesw/admin/config/index.html';
    }
});

$(document).bind('pageinit', function(){
    $("#header").load("/sweethomesw/ajax/header.php?backbutton=true&backurl=/sweethomesw/home.html&info=true");
    $("#footer").load("/sweethomesw/footer/footerConfigUser.html", function(){
        $("#usuarioconfigbutton").attr("src","/sweethomesw/img/usuarioconfigselected.png");
    });
    $("#userData").load("/sweethomesw/ajax/userdata.php");
    $("#userMessage").load("/sweethomesw/ajax/usermessages.php", function(){
        $("#userMessage").css("height",$("#userMessage").find("table").height() + "px");
    });
    $(document).ajaxComplete(function(){
        $("body").resize();
    });
});