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