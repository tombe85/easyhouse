<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    $idhome=$_COOKIE["idhome"];
    $iduser = $_COOKIE["iduser"];
    include('../backend/loads.php');
    $arr = loadusers($idhome);
    
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
    
    $arr = loadinvitedusers($idhome);
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