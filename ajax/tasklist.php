<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    
    include_once('../backend/loads.php');
    $idhome = $_COOKIE["idhome"];
    $arr = loadalltasks($idhome);
    
    echo '<table>';
    
    foreach($arr as $reg){
        echo '<li><tr class="rowBordered">';
        
        echo '<td class="rowText">';
        echo '<h3>'.$reg["content"].'</h3>';
        echo '</td>';
        
        echo '<td class="rowDate"><img class="menubutton" src="/sweethomesw/img/clean.png" onclick="deleteTask('.$reg["idtask"].')" /></td>';
        
        echo '</tr></li>';
    }
    
    echo '</table>';
}
?>