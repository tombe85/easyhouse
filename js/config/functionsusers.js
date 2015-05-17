function checkMail(formu){
    if(formu.texto.value == "" || formu.texto.value.indexOf("@") == -1 || formu.texto.value.indexOf(".") == -1){
        alert("Debes introducir un mail para invitar");
        return false;
    }else{
        return true;
    }
}
