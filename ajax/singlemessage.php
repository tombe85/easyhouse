<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    $idboard=$_REQUEST["id"];
    $idhome=$_COOKIE["idhome"];
    
    include('../backend/loads.php');
    $arr = loadsinglemessage($idhome,$idboard);
    
    echo '<div class="indicator">
        <h4>'.$arr["message"].'</h4>
    </div>';
    
    echo '<table>';
    echo '<tr class="rowBordered">';
    echo '<td class="rowPhotoSmall">';
    echo '    <img src="'.$arr["rutafoto"].'" />';
    echo '</td>';
    echo '<td class="rowText">';
    echo '    <h3>'.$arr["data"].'</h3>';
    echo '</td>';
    echo '</tr>';
    echo '</table>';
    
}
?>