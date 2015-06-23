$(document).bind('pageinit', function(){
    $("#header").load("/ajax/header.php?backbutton=true&backurl=/config/index.html&info=true", function(){
        $("#photoHeader").find("img").attr("src","/img/infoselected.png");
    });
    $(document).ajaxComplete(function(){
        $("body").resize();
    });
});

function removeHouse(){
    var sure = confirm("¿Seguro que desea eliminar la casa? Se eliminarán todos los datos y no habrá posibilidad de recuperación.");
    if(getCookie("admin") != true){
        alert("Para eliminar la casa debes ser adminstrador");
        
    }else{
        if(sure != false){
            $.post('/backend/homereg/removehouse.php', function(data, textStatus){
                if(data != 0){
                    alert("Error : " + data);
                }else{
                    alert("Casa eliminada correctamente");
                    document.location.href="/backend/logout.php";
                }
            });
        }
    }
}