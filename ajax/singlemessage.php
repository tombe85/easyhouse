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
    
    echo '<table>';
/*    
    echo '<tr id="messageDate"><td class="rowText"></td>';
    echo '<td class="rowDate">';
    echo '    <h5>'.$arr["date"].'</h5>';
    echo '</td>';
    echo '</tr>';
*/  


    echo '<tr>';
    echo '<td id="messagePhoto" class="rowPhoto">';
    echo '    <img src="'.$arr["rutafoto"].'" />';
    echo '</td>';
    echo '<td class="rowText">';
    echo '    <h2>'.$arr["message"].'</h2>';
    echo '</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<td></td>';
    echo '<td id="originalmessBottom">';
    echo '    <h3><p>'.$arr["data"].'</p></h3>';
    echo '</td>';
    
    echo '</tr>';
    echo '</table>';
}
?>