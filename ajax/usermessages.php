<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    $idhome=$_COOKIE["idhome"];
    $iduser=$_COOKIE["iduser"];
    include('../backend/loads.php');
    $dataArray = loaduserboard($idhome, $iduser);
    
    echo '<table>';
    
    foreach($dataArray as $reg){
        echo '<li><tr class="rowNormal">';
        
        echo '<td class="rowPhoto">';
        echo '<img src="'.$reg["rutafoto"].'" />';        
        echo '</td>';
        
        echo '<td class="rowText">';
        echo '<h3>'.$reg["message"].'</h3>';
        echo '</td>';
        
        echo '<td class="rowDate"><img class="menubutton" src="/sweethomesw/img/clean.png" onclick="deleteMessage('.$reg["idboard"].')" /></td>';
        
        echo '</tr></li>';
    }
    
    echo '</table>';
}
?>