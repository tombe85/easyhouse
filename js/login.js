$(document).bind('pagebeforecreate',function(){
    var loged = getCookie("login");
    if(loged == true){
        location.href='/sweethomesw/home.html';
    }
});

$(document).bind('pageinit', function(){
    $("#headerlogin").load("/sweethomesw/ajax/header.php", function(){
        $("#backbutton").css("display","none");
        $("#userPhoto").css("display","none");
        checkLoginError(getQueryVariable("mess"));
    });
    $(document).ajaxComplete(function(){
        $("body").resize();
    });

});

function validaCampos(formu){
    if(formu.usuario.value == "" || formu.texto.usuario.indexOf("@") == -1 || formu.texto.usuario.indexOf(".") == -1 || formu.passwd.value == ""){
        alert("Debes rellenar todos los campos");
        return false;
    }else{
        return true;
    }
}

function checkLoginError(mesa){
    if(mesa != false){
        if(mesa == 1)
            alert("Debe rellenar todos los campos");
        else if(mesa == 2)
            alert("El mail introducido no existe");
        else if(mesa == 3){
            $("#usermail").val(getQueryVariable("mail"));
            alert("Contraseña incorrecta");
            $("#createHome").html('¿Has olvidado tu contraseña? <a href="/sweethomesw/resetpasswd.html" data-ajax="false">¡Resetéala!</a>');
        }else if(mesa == 4){
            alert("Se ha enviado un mail con la nueva contraseña a la dirección facilitada.");
        }

    }
}