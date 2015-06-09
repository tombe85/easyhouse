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
        checkRegisterError(getQueryVariable("mess"));
    });
});

function validaCampos(formu){
    var ok = true;
    if(formu.usuario.value.length == 0 || formu.email.value.length == 0 || formu.texto.email.indexOf("@") == -1 || formu.texto.email.indexOf(".") == -1 || formu.nombrecasa.value.length == 0 || formu.passwd.value.length == 0 || formu.passwd2.value.length == 0){
        alert("Debes rellenar todos los campos correctamente");
        ok = false;
    }else if(formu.passwd.value != formu.passwd2.value){
        alert("Las contraseñas no coinciden");
        ok = false;
    }
    return ok;
}

function checkRegisterError(mesa){
    if(mesa != false){
        if(mesa == 1){
            alert("Debes rellenar todos los datos");
        }else if(mesa == 2)
            alert("Las constraseñas no coinciden");
        else if(mesa == 3)
            alert("El mail introducido ya pertenece a una casa. Sólo se puede pertenecer a una casa al mismo tiempo");

    }
}