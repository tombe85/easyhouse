<?php
{
    include_once('../backend/functions.php');
    
    // Comprobamos login
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    
    //Comprobamos admin
    if(!checkAdmin()){
        echo '<h4>No tienes permisos de administrador</h4>';
        exit();
    }
    
    // Tomamos datos de Cookies / Get / Post
    $idhome = $_COOKIE["idhome"];
    
    // Cargamos el array de registros llamando al php lógico/de consulta BBDD
    include_once('../backend/loads.php');    
    $arr = loadlastweektasks($idhome);
    
    // Imprimimos el html para cada registro
    echo '<table>';
    
    foreach($arr as $reg){
        echo '<tr class="rowNormal">';
        
        echo '<td class="rowPhoto">';
        echo '<img src="'.$reg["photo"].'" />';        
        echo '</td>';
        
        echo '<td class="rowText">';
        echo '<h3>'.$reg["task"].'</h3>';
        echo '</td>';
        
        echo '<td class="rowText">';
        echo '<h3>'.$reg["date"].'</h3>';
        echo '</td>';
        
        echo '<td class="rowDate"><img class="menubutton" src="/sweethomesw/img/cancel.png" onclick="deleteTaskDone('.$reg["iduser"].','.$reg["idtask"].','.$reg["idtaskdone"].')" /></td>';
        
        echo '</tr>';
    }
    
    echo '</table>';
}
?>