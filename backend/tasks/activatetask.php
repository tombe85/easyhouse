<?php
{
    //Comprobar login
    include_once('../functions.php');
    
    //Toma de datos
    if(!isset($_REQUEST["idtask"]) || $_REQUEST["idtask"] == ""){
        echo "Error. Variables corruptas.";
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