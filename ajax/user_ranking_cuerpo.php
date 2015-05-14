<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        header('Location: /sweethomesw/login.html');
    }
    $idhome=$_COOKIE["idhome"];
    include('../backend/loads.php');
    $arr = loadranking($idhome);
    
    echo '<table>';
    
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