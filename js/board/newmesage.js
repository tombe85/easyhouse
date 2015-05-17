function validaCampos(formu){
    if(formu.titulo.value == "" || formu.mensaje.value == ""){
        alert("Debes rellenar los campos!");
        return false;
    }else{
        return true;
    }
}