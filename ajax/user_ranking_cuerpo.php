<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    $idhome=$_COOKIE["idhome"];
    include('../backend/loads.php');
    $arr = loadranking($idhome);
    
    echo '<table>';
    echo '<tr class="rowBordered"><td></td><td></td><td></td></tr>';
    foreach($arr as $user){
        echo '<tr class="rowBordered">';
        echo '<td class="rowPhoto">
                <img src="'.$user["photo"].'" />
            </td>';
        echo '<td class="rowText">
                <h2>'.$user["name"].'</h2>
            </td>';
        echo '<td class="rowText">
                <h2>'.$user["points"].'</h2>
            </td>';
        
        echo '</tr>';
    }
    
    echo '</table>';
}
?>