<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    
    if(!isset($_REQUEST["id"])){
        echo '<h4>Error de acceso a los comentarios. Disculpe las molestias</h4>';
        exit();
    }
    $idboard=$_REQUEST["id"];
    $idhome = $_COOKIE["idhome"];
    
    include_once('../backend/loads.php');
    $arr = loadmessagecomments($idboard,$idhome);
    
    echo '<table>';
    
    foreach($arr as $reg){
        echo '<tr class="rowBordered">';
        echo '<td class="rowPhotoSmall">';
        echo '    <img src="'.$reg["rutafoto"].'" />';
        echo '</td>';
        echo '<td class="rowText">';
        echo '    <h3>'.$reg["comment"].'</h3>';
        echo '</td>';
        echo '</tr>';
    }
    
    echo '</table>';
    
}
?>