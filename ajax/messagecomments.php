<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        exit();
    }
    $idboard=$_REQUEST["id"];
    
    include_once('../backend/loads.php');
    $arr = loadmessagecomments($idboard);
    
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