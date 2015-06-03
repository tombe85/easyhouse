<?php
{
    include_once('../backend/functions.php');
    
    // Comprobamos login
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    
    // Tomamos datos de las cookies
    $idhome=$_COOKIE["idhome"];
    $iduser = $_COOKIE["iduser"];
    
    // Cargamos los usuarios registrados en un array
    include('../backend/loads.php');
    $arr = loadusers($idhome);
    
    // Generamos el html
    echo '<table>';
    
    foreach($arr as $user){
        echo '<tr class="rowBordered">';
        echo '<td class="rowPhoto">
                <img src="'.$user["photo"].'" />
            </td>';
        echo '<td class="rowText">
                <h3>'.$user["mail"].'</h3>
            </td>';
        echo '<td class="rowIcon">';
        if($user["iduser"] == $iduser){
            echo '  <img src="/sweethomesw/img/star.png" class="buttonTrash" />';
        }else{
            echo '  <img src="/sweethomesw/img/clean.png" class="buttonTrash" onclick="deleteuser('.$user["iduser"].')" />';
        }
        echo '    </td>';
        echo '</tr>';
    }
    
    // Cargamos los usuarios invitados (aún no registrados) en un array
    $arr = loadinvitedusers($idhome);
    
    // Generamos html
    foreach($arr as $user){
        echo '<tr class="rowBordered">';
        echo '<td class="rowPhoto">
                <img src="/sweethomesw/img/avatares/0.png" />
            </td>';
        echo '<td class="rowText">
                <h3>'.$user["mail"].'</h3>
            </td>';
        echo '<td class="rowIcon">';
        echo '  <img src="/sweethomesw/img/clean.png" class="buttonTrash" onclick="deleteinviteduser('.$user["idinvited"].')" />';
        echo '    </td>';
        echo '</tr>';
    }
    
    echo '</table>';
}
?>