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
    $("#footer").load("/sweethomesw/footer/footerConfig.html",function(){
        $("#usersbutton").attr("src","/sweethomesw/img/usuariosconfigselected.png");
    });
    $("#users").load("/sweethomesw/ajax/usersmanage.php");
    $(document).ajaxComplete(function(){
        $("body").resize();
    });
});

function checkMail(formu){
    if(formu.texto.value == "" || formu.texto.value.indexOf("@") == -1 || formu.texto.value.indexOf(".") == -1){
        alert("Debes introducir un mail para invitar");
        return false;
    }else{
        return true;
    }
}
