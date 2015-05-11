<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    $idhome = $_COOKIE["idhome"];
    //* Al principio se hace include a loads.php y se llama a su función loadshoppinglist(idhome) que devuelve un array con los registros
    include_once('../backend/loads.php');
    $arr = loadshoppinglist($idhome);
    
    echo '<table>';
    foreach($arr as $reg){
        echo '<tr class="rowBordered">';
        
        echo '<td class="rowText">';
        
        $name = str_replace(" ", "",$reg["product"]);
        echo '   <div class="ui-checkbox"><label class="ui-btn ui-corner-all ui-btn-inherit ui-btn-icon-left ui-checkbox-off"><input type="checkbox" name="'.$name.'"><h3>'.$reg["product"].'</h3></label></div>';
        echo '</td>';
        
        echo '</tr>';
    }
    echo '</table>';
}
?>