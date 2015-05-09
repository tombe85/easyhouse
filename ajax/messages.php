<?php
{
    if(!isset($_COOKIE["login"]) || $_COOKIE["login"] == false){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    $idhome=$_COOKIE["idhome"];
    include('../backend/loads.php');
    $dataArray = loadboard($idhome);
    
    echo '<table>';
    
    foreach($dataArray as $reg){
        echo '<tr class="rowBordered">';
        
        echo '<td class="rowPhoto">';
        echo '<img src="'.$reg["rutafoto"].'" />';        
        echo '</td>';
        
        echo '<td class="rowText">';
        echo '<a href="/sweethomesw/board/viewmessage.html?id='.$reg["idboard"].'" data-ajax="false"><h3>'.$reg["message"].'</h3></a>';
        echo '</td>';
        
        echo '<td class="rowDate"><h5>'.$reg["date"].'</h5></td>';
        
        echo '</tr>';
    }
    
    echo '</table>';
}
?>