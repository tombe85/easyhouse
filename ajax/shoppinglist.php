<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    $idhome = $_COOKIE["idhome"];
    
    include_once('../backend/loads.php');
    $startby = "";
    $arr = loadshoppinglist($idhome,$startby);
    
    if(count($arr) > 0){
        echo '<table>';
        foreach($arr as $reg){
            echo '<tr class="rowBordered">';

            echo '<td class="rowText">';

            $name = str_replace(" ", "",$reg["product"]);
            echo '   <div class="ui-checkbox"><label class="ui-btn ui-corner-all ui-btn-inherit ui-btn-icon-left ui-checkbox-off"><input onchange="addproducttolist('.$reg["idproduct"].',this)" type="checkbox" name="'.$name.'"><h3>'.$reg["product"].'</h3></label></div>';
            echo '</td>';

            echo '</tr>';
        }
        echo '</table>';
    }else{
        echo '<div id="emptyContentImg">';
        printAleatoryMonster();
        echo '</div>';
    }
}
?>