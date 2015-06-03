<?php
{
    /*
    *   Este php será llamado vía AJAX y devolverá el mensaje de error en caso de fallo y 0 en caso de éxito
    */
    include_once('../functions.php');
    if(!checkLogin()){
        echo "No has iniciado sesión";
        exit();
    }
    if(!isset($_REQUEST["name"]) || !isset($_REQUEST["points"]) || !isset($_REQUEST["period"]) || $_REQUEST["name"] == "" || strpos($_REQUEST["name"],"<") != false || $_REQUEST["points"] == "" || strpos($_REQUEST["points"],"<") != false || $_REQUEST["period"] == "" || strpos($_REQUEST["period"],"<") != false){
        echo "Error al añadir la tarea";
        exit();
    }
    $name = $_REQUEST["name"];
    $points = $_REQUEST["points"];
    $period = $_REQUEST["period"];
    
    
    $db = connectDataBase();
    $idhome = $_COOKIE["idhome"];
    //Añade tarea
    $query = 'insert into tasks (name,period,idhome,active,points,activesince,approved) values ("'.$name.'",'.$period.','.$idhome.',true,'.$points.',"'.date("d.m.Y").'",true)';
    if($result = $db->query($query)){
        $iduser = $_COOKIE["iduser"];
        $content = "Nueva tarea: " . $name . " - " . $points . " puntos";
        $query = 'insert into registro (iduser,content,idhome,date) values ("'.$iduser.'","'.$content.'",'.$idhome.',"'.date("d.m.Y").'")';
        $result = $db->query($query);
        echo "0";
    }else{
        echo "No se ha podido añadir la tarea";
    }
    $db->close();
}
?>