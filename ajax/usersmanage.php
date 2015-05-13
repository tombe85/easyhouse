<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        header('Location: /sweethomesw/login.html');
    }
    $idhome=$_COOKIE["idhome"];
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
        echo '<td class="rowIcon">
                <img src="/sweethomesw/img/clean.png" class="buttonTrash" onclick="deleteuser('.$user["iduser"].')" />
            </td>';
        echo '</tr>';
    }
    
    echo '</table>';
}
?>