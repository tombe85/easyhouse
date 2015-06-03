$(document).bind('pagebeforecreate',function(){
    var login = getCookie("login");
    if(!login){
        location.href='/sweethomesw/login.html';
    }
});

$(document).bind('pageinit', function(){
    $("#header").load("/sweethomesw/ajax/header.php?backbutton=true&backurl=/sweethomesw/board/index.html");
    $("#footer").load("/sweethomesw/footer/footer.html", function(){
        $("#tablonbutton").attr("src","/sweethomesw/img/tablonselected.png");
    });
    $(document).ajaxComplete(function(){

        $("body").resize();
    });
});

function validaCampos(formu){
    if(formu.titulo.value == "" || formu.mensaje.value == ""){
        alert("Debes rellenar los campos!");
        return false;
    }else if(formu.titulo.value.indexOf("<") != -1 || formu.mensaje.value.indexOf("<") != -1){
        alert("Caracter ( < ) no permitido");
        return false;
    }else{
        return true;
    }
}