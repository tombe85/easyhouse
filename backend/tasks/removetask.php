<?php
{
    include_once('../functions.php');
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
        $content = "Ha eliminado la tarea: " . $content;
        $query = 'insert into registro (iduser,content,idhome,date) values ("'.$iduser.'","'.$content.'",'.$idhome.',"'.date("d.m.Y").'")';
        $result = $db->query($query);
        echo "0";
    }else{
        echo "No se ha podido eliminar la tarea";
    }
    $db->close();
}
?>