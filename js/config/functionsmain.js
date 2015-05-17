function changeMail(formu){
    $.post('/sweethomesw/backend/userreg/changemail.php', {passwd:formu.emailpasswd.value,mail:formu.email.value}, function(data, textStatus){
        if(data != 0){
            alert("error al cambiar la contraseña " + data);
        }else{
            alert("Conraseña actualizada correctamente");
            formu.email.value="";
        }
    });
    formu.emailpasswd.value="";

    return false;
}

function changePasswd(formu){
    $.post('/sweethomesw/backend/userreg/changepasswd.php', {passwdant:formu.passwd.value,passwdnew:formu.passwdnueva.value}, function(data, textStatus){
        if(data != 0){
            alert("error al cambiar la contraseña " + data);
        }else{
            alert("Conraseña actualizada correctamente");
        }
    });
    formu.passwd.value="";
    formu.passwdnueva.value="";
    return false;
}