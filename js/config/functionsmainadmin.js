$(document).bind('pagebeforecreate',function(){
    var admin = getCookie("admin");
    var login = getCookie("login");
    if(!login){
        location.href='/sweethomesw/login.html';
    }
    if(admin == false){
        location.href='/sweethomesw/config/index.html';
    }
});

$(document).bind('pageinit', function(){
    $("#header").load("/sweethomesw/ajax/header.php?backbutton=true&backurl=/sweethomesw/home.html&info=true");
    $("#footer").load("/sweethomesw/footer/footerConfig.html", function(){
        $("#configbutton").attr("src","/sweethomesw/img/usuarioconfigselected.png");
    });
    $("#userData").load("/sweethomesw/ajax/userdata.php");
    $("#userMessage").load("/sweethomesw/ajax/usermessages.php",function(){
        $("#userMessage").css("height",$("#userMessage").find("table").height() + "px");
    });
    $(document).ajaxComplete(function(){
        $("body").resize();
    });
});