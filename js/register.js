function validaCampos(formu){
    if(formu.usuario.value == "" || formu.email.value == "" || formu.texto.email.indexOf("@") == -1 || formu.texto.email.indexOf(".") == -1 || formu.nombrecasa.value == "" || formu.passwd.value == "" || formu.passwd2.value == ""){
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