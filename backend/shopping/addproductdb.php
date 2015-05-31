<?php
{
    include_once('../functions.php');
    if(!checkLogin()){
        echo "No has iniciado sesión";
        exit();
    }
    if(!isset($_REQUEST["name"])){
        echo "Debes introducir un nombre para el producto";
        exit();
    }
    $name = $_REQUEST["name"];
    
    $db = connectDataBase();
    $idhome = $_COOKIE["idhome"];
    //Añade producto
    $query = 'select * from products where idhome = "'.$idhome.'" and name like "'.$name.'"';
    $result = $db->query($query);
    if($result->num_rows == 0){
        $query = 'insert into products (name,idhome,added,active) values ("'.$name.'",'.$idhome.',false,true)';
        if($result = $db->query($query)){
            $iduser = $_COOKIE["iduser"];
            $content = "Nuevo producto: " . $name;
            $query = 'insert into registro (iduser,content,idhome,date) values ("'.$iduser.'","'.$content.'",'.$idhome.',"'.date("d.m.Y").'")';
            $result = $db->query($query);
            echo "0";
        }else{
            echo "No se ha podido añadir la tarea";
        }
    }else{
        //Ya existe
        echo "0";
    }
    $db->close();
}
?>