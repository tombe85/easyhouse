<?php
{
    //Ver si ha sido realizada o activada
    if(isset($_REQUEST["nouser"]) && $_REQUEST["nouser"] == true){
        $nouser = true;
    }else{
        $nouser = false;
    }
    
    //Comprobar login
    include_once('../functions.php');
    if(!checkLogin()){
        if($nouser){
            echo "No has iniciado sesión";
            exit();
        }else{
            header('Location /sweethomesw/login.html');
        }
    }
    
    //Toma de datos
    if(!isset($_REQUEST["id"]) || $_REQUEST["id"] == ""){
        if($nouser){
            echo "Error. Variables corruptas.";
            exit();
        }else{
            header('Location: /sweethomesw/tasks/main.html');
        }
    }
    
    $idtask = $_REQUEST["id"];
    $idhome = $_COOKIE["idhome"];
    $iduser = $_COOKIE["iduser"];
    
    //Actualizar tareas
    $db = connectDataBase();
    if(!$nouser){
        $query='insert into tasksdone (idtask,iduser,date,idhome) values ('.$idtask.','.$iduser.',"'.date("d.m.Y").'",'.$idhome.')';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
    }
    
    $query='update tasks set whenisdone = "'.date("d.m.Y").'", active = false where idtask = '. $idtask;
    $result = $db->query($query)
        or die($db->error. " en la línea ".(__LINE__-1));
    
    //Datos de la tarea
    $query='select * from tasks where idtask = "'.$idtask.'"';
    $result = $db->query($query)
        or die($db->error. " en la línea ".(__LINE__-1)." idhome=".$idhome);
    $row = $result->fetch_array();
    $name = $row["name"];
    $points = $row["points"];
    
    //Actualizar puntos de usuario
    if(!$nouser){
        $query='update users set points = points + '.$points.' where iduser = '. $iduser;
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
    }
    
    //Añadir a registro
    if(!$nouser){
        $cont = "Ha realizado: " . $name;
        $query='insert into registro (iduser,content,idhome,date) values ('.$iduser.', "'.$cont.'",'.$idhome.',"'.date("d.m.Y").'")';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1)." idhome=".$idhome);
    }
    
    //Ir a html tasks
    if($nouser){
        echo "0";
    }else{
        header('Location: /sweethomesw/tasks/main.html');
    }
}
?>