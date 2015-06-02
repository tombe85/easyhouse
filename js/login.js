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
    });
    checkLoginError(getQueryVariable("mess"));
    $(document).ajaxComplete(function(){
        $("body").resize();
    });

});

function validaCampos(formu){
    if(formu.usuario.value == "" || formu.texto.usuario.indexOf("@") == -1 || formu.texto.usuario.indexOf(".") == -1 || formu.passwd.value == ""){
        alert("Debes rellenar todos los campos");
        return false;
    }else{
        jQuery.post('/sweethomesw/backend/homereg/consultamailregistro.php', {mail:formu.usuario.value,passwd:formu.passwd.value}, function(data, textStatus){
            if(data == 0){
                alert("El mail introducido no existe");
                return false;
            }else if(data == 1){
                jQuery.post('/sweethomesw/backend/checkpasswd.php', {user:formu.usuario.value,passwd:formu.passwd.value}, function(data, textStatus){
                    if(data == 1){
                        return true;
                    }else{
                        alert("Contraseña incorrecta");
                        return false;
                    }
                });
            }
        });
    }
}

function checkLoginError(mesa){
    if(mesa != false){
        if(mesa == 1)
            alert("Debe rellenar todos los campos");
        else if(mesa == 2)
            alert("El mail introducido no existe");
        else if(mesa == 3)
            alert("Contraseña incorrecta");

    }
}