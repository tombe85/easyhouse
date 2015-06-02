<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    $idhome = $_COOKIE["idhome"];
    
    if(isset($_REQUEST["start"]) && $_REQUEST["start"] != null && $_REQUEST["start"] != ""){
        $startby = $_REQUEST["start"];
    }else{
        $startby = "";
    }
    include_once('../backend/loads.php');
    $arr = loadshoppingproducts($idhome,$startby);
    
    echo '<table>';
    foreach($arr as $reg){
        echo '<tr class="rowBordered">';
        
        echo '<td class="rowText">';
        
        $name = str_replace(" ", "",$reg["product"]);
        echo '   <div class="ui-checkbox"><label class="ui-btn ui-corner-all ui-btn-inherit ui-btn-icon-left ui-checkbox-off"><input onchange="addproducttolist('.$reg["idproduct"].',this)" type="checkbox" name="'.$name.'" id="'.$name.'"><h3>'.$reg["product"].'</h3></label></div>';
        echo '</td>';
        
        echo '</tr>';
    }
    echo '</table>';
    
    $arr2 = loadshoppinglist($idhome,$startby);
    
    echo '<table>';
    foreach($arr2 as $reg){
        echo '<tr class="rowBordered">';
        
        echo '<td class="rowText">';
        
        $name = str_replace(" ", "",$reg["product"]);
        echo '   <div class="ui-checkbox"><label class="ui-btn ui-corner-all ui-btn-inherit ui-btn-icon-left ui-checkbox-off"><h3><span class="lineThrough">'.$reg["product"].'</span></h3></label></div>';
        echo '</td>';
        
        echo '</tr>';
    }
    echo '</table>';
}
?>