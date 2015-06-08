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
        checkResetPasswdError(getQueryVariable("err"));
    });
});

function validaCampos(formu){
    if(formu.usuario.value == ""){
        alert("Debes introducir tu email");
        return false;
    }else{
        jQuery.post('/sweethomesw/backend/userreg/consultamailregistro.php', {mail:formu.usuario.value}, function(data, textStatus){
            if(data == 1){
                return true;
            }else if(data == 0){
                alert("El mail introducido no existe");
                return false;
            }else{
                alert("A ocurrido un error");
                return false;
            }
        });
    }
}

function checkResetPasswdError(err){
    if(err == true){
        alert("Ha ocurrido un error al resetear la contraseña. Por favor, vuelva a intentarlo");
    }
}