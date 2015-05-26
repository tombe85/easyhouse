<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    
    include_once('../backend/loads.php');
    $idhome = $_COOKIE["idhome"];
    
    $arr = loadHomeMates($idhome);
    echo '  <div id="matesHouse">
                <h2>Mis compañeros</h2>
                <table>';
    
    foreach($arr as $mate){
        echo '<tr class="rowNormal" id="mate'.$mate["id"].'"><td class="rowPhoto"><img src="'.$mate["ruta"].'" /></td><td class="rowText"><h3>'.$mate["name"].' </h3></td></tr>';
    }
    
    echo '
                </table>
            </div>';
    
}
?>