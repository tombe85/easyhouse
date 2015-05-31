<?php
{
    include_once('../functions.php');
    if(!checkLogin() || !checkAdmin() || !isset($_REQUEST["idtask"]) || !isset($_REQUEST["iduserd"]) || !isset($_REQUEST["idtaskdone"])){
        echo "0";
        exit();
    }
    $idhome = $_COOKIE["idhome"];
    
    $db = connectDataBase();
    
    $idtask = $_REQUEST["idtask"];
    $iduser = $_REQUEST["iduserd"];
    $idadmin = $_COOKIE["iduser"];
    $idtaskdone = $_REQUEST["idtaskdone"];
    
    //Saca tarea y puntos
    $query = 'select * from tasks where idtask = "'.$idtask.'"';
    if(!($result = $db->query($query))){
        echo "0";
        exit();
    }
    $row = $result->fetch_array();
    $task = $row["name"];
    $points = $row["points"];
    
    //Resta puntos a usuario
    $query = 'select * from users where iduser = "'.$iduser.'"';
    if(!($result = $db->query($query))){
        echo "0";
        exit();
    }
    $row = $result->fetch_array();
    $usuario = $row["name"];
    
    $query = 'update users set points = points - '.$points.' where iduser = "'.$iduser.'"';
    if(!$db->query($query)){
        echo "0";
        exit();
    }
    
    //Borra de taskdone
    $query = 'delete from tasksdone where idtaskdone = "'.$idtaskdone.'"';
    if(!$db->query($query)){
        echo "0";
        exit();
    }
    //Añade al registro
    $content = "Invalidado - ".$task." - realizado por ".$usuario.";
    $query = 'insert into registro (iduser,content,idhome,date,usersdeleted) values ('.$idadmin.',"'.$content.'",'.$_COOKIE["idhome"].',"'.date("d.m.Y").'","")';
    $db->query($query);
    
    $db->close();
    echo "1";
    exit();
}
?>