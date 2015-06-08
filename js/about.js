$(document).bind('pageinit', function(){
    $("#header").load("/sweethomesw/ajax/header.php?backbutton=true&backurl=/sweethomesw/config/index.html&info=true", function(){
        $("#photoHeader").find("img").attr("src","/sweethomesw/img/infoselected.png");
    });
    $(document).ajaxComplete(function(){
        $("body").resize();
    });
});

function removeHouse(){
    var sure = confirm("¿Seguro que desea eliminar la casa? Se eliminarán todos los datos y no habrá posibilidad de recuperación.");
    if(getCoockie("admin") != true){
        alert("Para eliminar la casa debes ser adminstrador");
        
    }else{
        if(sure != false){
            $.post('/sweethomesw/backend/homereg/removehouse.php', function(data, textStatus){
                if(data != 0){
                    alert("Error : " + data);
                }else{
                    alert("Casa eliminada correctamente");
                    document.location.href="/sweethomesw/backend/logout.php";
                }
            });
        }
    }
}