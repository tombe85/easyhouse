<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    if(!checkAdmin()){
        echo '<h4>No tienes permisos de administrador</h4>';
        exit();
    }
    
    include_once('../backend/loads.php');
    $idhome = $_COOKIE["idhome"];
    $arr = loadallexpenses($idhome);
    
    echo '<table>';
    
    foreach($arr as $reg){
        echo '<tr class="rowBordered">';
        
        echo '<td class="rowText">';
        echo '<h3>'.$reg["expense"].'</h3>';
        echo '</td>';
        
        echo '<td class="rowDate"><img class="menubutton" src="/sweethomesw/img/clean.png" onclick="deleteExpense('.$reg["idexpense"].')" /></td>';
        
        echo '</tr>';
    }
    
    echo '</table>';
}
?>