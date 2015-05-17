function validaCampos(formu){
    if(formu.usuario.value == "" || formu.email.value == "" || formu.texto.email.indexOf("@") == -1 || formu.texto.email.indexOf(".") == -1 || formu.passwd.value == "" || formu.passwd2.value == ""){
        alert("Debes rellenar todos los campos");
        return false;
    }else{
        if(formu.passwd.value !== formu.passwd2.value){
            alert("Las contraseñas no coinciden");
            return false;
        }else{
            jQuery.post('/sweethomesw/backend/userreg/consultamailregistro.php', {mail:formu.email.value}, function(data, textStatus){
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