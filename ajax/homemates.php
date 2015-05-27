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
                <h2>Inquilinos</h2>
                <table>';
    
    $j = 0;
    foreach($arr as $mate){
        if($j % 2 == 0){
            echo '<tr class="rowNormal">';
        }
        echo '<td class="homeMate"><img src="'.$mate["ruta"].'" /><h3>'.$mate["name"].'</h3></td>';
        if($j % 2 != 0){
            echo '</tr>';
        }
        $j++;
    }
    if($j % 2 != 0){
        echo '<td class="homeMate"></td></tr>';
    }
    
    echo '
                </table>
            </div>';
    
}
?>