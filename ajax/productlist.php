<?php
{
    include_once('../backend/functions.php');
    
    // Comprobamos login
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    
    // Tomamos datos de las cookies
    $idhome = $_COOKIE["idhome"];
    
    // Tratamos los datos pasados por GET / POST
    if(isset($_REQUEST["start"]) && $_REQUEST["start"] != null && $_REQUEST["start"] != ""){
        $startby = $_REQUEST["start"];
    }else{
        $startby = "";
    }
    
    // Cargamos en un array los registros correspondientes
    include_once('../backend/loads.php');
    $arr = loadshoppingproducts($idhome,$startby);
    
    // Generamos el HTML para los productos disponibles
    echo '<div class="exitSuggestions"><button class="buttonTransparent" onclick="closeSuggestions()"><img class="exit" src="/sweethomesw/img/cancelBlack.png"></button></div>';
    echo '<table>';
    foreach($arr as $reg){
        echo '<tr class="rowSlim">';
        
        echo '<td class="rowText">';
        
        $name = str_replace(" ", "",$reg["product"]);
        echo '   <div><button class="buttonTransparent" onclick="addcomprar('.$reg["idproduct"].')"><label class="ui-btn ui-corner-all ui-btn-inherit" ><h3>'.$reg["product"].'</h3></label></button></div>';
        echo '</td>';
        
        echo '</tr>';
    }
    echo '</table>';
    
    /*
    // Cargamos el array con los productos ya añadidos (para informar al usuario de que ya están añadidos)
    $arr2 = loadshoppinglist($idhome,$startby);
    
    // Generamos el HTML para los productos ya añadidos
    echo '<table>';
    foreach($arr2 as $reg){
        echo '<tr class="rowSlim">';
        
        echo '<td class="rowText">';
        
        echo '   <div class="ui-checkbox"><label class="ui-btn ui-corner-all ui-btn-inherit"><h3><span class="lineThrough">'.$reg["product"].'</span> (añadido)</h3></label></div>';
        echo '</td>';
        
        echo '</tr>';
    }
    echo '</table>';*/
}
?>