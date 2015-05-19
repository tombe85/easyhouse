function validaCampos(formu){
    if(formu.usuario.value.length == 0 || formu.email.value.length == 0 || formu.texto.email.indexOf("@") == -1 || formu.texto.email.indexOf(".") == -1 || formu.nombrecasa.value.length == 0 || formu.passwd.value.length == 0 || formu.passwd2.value.length == 0){
        alert("Debes rellenar todos los campos correctamente");
        return false;
    }else{
        if(formu.passwd.value !== formu.passwd2.value){
            alert("Las contraseñas no coinciden");
            return false;
        }else{
            jQuery.post('/sweethomesw/backend/homereg/consultamailregistro.php', {mail:formu.email.value}, function(data, textStatus){
                if(data == 1){
                    alert("El mail introducido ya existe");
                    return false;
                }else if(data == 0){
                    return true;
                }
            });
        }
    }
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