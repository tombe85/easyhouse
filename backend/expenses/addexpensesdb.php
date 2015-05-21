<?php
{
    include_once('../functions.php');
    if(!checkLogin()){
        echo 'No has iniciado sesión';
        exit();
    }
    if(!checkAdmin()){
        echo "No tienes permisos de administrador";
        exit();
    }
    if(!isset($_REQUEST["name"])){
        echo "No se ha introducido nombre para el gasto";
        exit();
    }
    $name = $_REQUEST["name"];
    
    $db = connectDataBase();
    $idhome = $_COOKIE["idhome"];
    //Añade el gasto                             
    $query = 'insert into expenses (name,idhome) values ("'.$name.'",'.$idhome.')';
    if($result = $db->query($query)){
        $iduser = $_COOKIE["iduser"];
        $content = "Ha añadido el gasto: " . $name;
        $query = 'insert into registro (iduser,content,idhome,date) values ("'.$iduser.'","'.$content.'",'.$idhome.',"'.date("d.m.Y").'")';
        $result = $db->query($query);
        echo "0";
    }else{
        echo "No se ha podido añadir la tarea";
        
    }
    $db->close();
    exit();
}
?>