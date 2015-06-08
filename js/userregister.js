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
});

function validaCampos(formu){
    if(formu.usuario.value == "" || formu.passwd.value == "" || formu.passwd2.value == ""){
        alert("Debes rellenar todos los campos");
        return false;
    }else{
        if(formu.passwd.value !== formu.passwd2.value){
            alert("Las contraseñas no coinciden");
            return false;
        }else{
            jQuery.post('/sweethomesw/backend/userreg/consultamailregistro.php', {mail:formu.usuario.value}, function(data, textStatus){
                if(data == 1){
                    alert("El mail introducido ya existe");
                    return false;
                }else if(data == 0){
                    return true;
                }else if(data == 2 || data == 3){
                    alert("A ocurrido un error. Por favor accede desde el enlace enviado a tu correo");
                    return false;
                }else{
                    alert("A ocurrido un error");
                    return false;
                }
            });
        }
    }
}