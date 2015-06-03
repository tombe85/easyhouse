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
    if(!isset($_REQUEST["idtask"])){
        echo "Error al eliminar la tarea";
        exit();
    }
    $db = connectDataBase();
    
    $idtask = $_REQUEST["idtask"];
    
    //Busca tarea
    $query = 'select * from tasks where idtask = "'.$idtask.'"';
    $result = $db->query($query)
        or die($db->error);
    $row = $result->fetch_array();
    $content = $row["name"];
    
    //Elimina tarea
    $query = 'delete from tasks where idtask = "'.$idtask.'"';
    if($result = $db->query($query)){
        $iduser = $_COOKIE["iduser"];
        $idhome = $_COOKIE["idhome"];
        $content = "Eliminada tarea: " . $content;
        $query = 'insert into registro (iduser,content,idhome,date) values ("'.$iduser.'","'.$content.'",'.$idhome.',"'.date("d.m.Y").'")';
        $result = $db->query($query);
        echo "0";
    }else{
        echo "No se ha podido eliminar la tarea";
    }
    $db->close();
}
?>