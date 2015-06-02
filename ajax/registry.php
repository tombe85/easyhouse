<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    $idhome=$_COOKIE["idhome"];
    $iduser=$_COOKIE["iduser"];
    include_once('../backend/loads.php');
    $dataArray = loadregister($idhome,$iduser);
    
    if(count($dataArray) > 0){
        echo '<table>';
        foreach($dataArray as $reg){
            echo '<tr class="rowNormal">';

            echo '<td class="rowPhoto">';
            echo '<img src="'.$reg["rutafoto"].'" />';        
            echo '</td>';

            echo '<td class="rowText">';
            echo '<h3>'.$reg["content"].'</h3>';
            echo '</td>';

            echo '<td class="rowDate"><h5>'.$reg["date"].'</h5></td>';

            echo '</tr>';
            echo '<script>
                        idsreg[idsreg.length] = '.$reg["idregistro"].'
                  </script>';
        }

        echo '</table>';
    }else{
        echo '<div id="emptyContentImg">';
        include_once('../backend/functions.php');
        printAleatoryMonster();
        echo '</div>';
    }
}
?>
