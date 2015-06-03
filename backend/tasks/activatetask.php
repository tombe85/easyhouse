<?php
{
    /*
    *   Este php será llamado vía AJAX y devolverá el mensaje de error en caso de fallo y 0 en caso de éxito
    */
    //Comprobar login
    include_once('../functions.php');
    if(!checkLogin()){
        echo "No has iniciado sesión";
        exit();
    }
    
    //Toma de datos
    if(!isset($_REQUEST["idtask"]) || $_REQUEST["idtask"] == "" || strpos($_REQUEST["idtask"],"<") != false){
        echo "Error al activar la tarea";
        exit();
    }
    
    $idtask = $_REQUEST["idtask"];
    
    //Actualizar tareas
    $db = connectDataBase();
    
    $query='update tasks set activesince = "'.date("d.m.Y").'", active = true where idtask = '. $idtask;
    $result = $db->query($query);
    
    if($result){
        echo "0";
    }else{
        echo "Fallo al actualizar las tareas";
    }
}
?>