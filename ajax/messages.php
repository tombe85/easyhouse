<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        header('Location: /sweethomesw/login.html');
    }
    $idhome=$_COOKIE["idhome"];
    include('../backend/loads.php');
    $dataArray = loadboard($idhome);
    
    if(count($dataArray) > 0){
        echo '<table>';
        foreach($dataArray as $reg){
            $comentarios = $reg["comments"] + 1;
            echo '<tr class="rowBordered">';

            echo '<td class="rowPhoto">';
            echo '<img src="'.$reg["rutafoto"].'" />';        
            echo '</td>';

            echo '<td class="rowText">';
            echo '<a href="/sweethomesw/board/viewmessage.html?id='.$reg["idboard"].'" data-ajax="false"><h3>'.$reg["message"].'</h3><h4>'.$comentarios.' comentarios</h4></a>';
            echo '</td>';

            echo '<td class="rowDate"><h5>'.$reg["date"].'</h5></td>';

            echo '</tr>';
        }

        echo '</table>';
    }else{
        echo '<div id="emptyHomeImg">';
        include_once('../backend/functions.php');
        printAleatoryMonster();
        echo '</div>';
    }
}
?>