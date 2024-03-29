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
    if(!isset($_REQUEST["name"]) || $_REQUEST["name"] == "" || strpos($_REQUEST["name"],"<") != false){
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
        $query = 'insert into products (name,idhome,added,active) values ("'.$name.'",'.$idhome.',true,true)';
        if($result = $db->query($query)){
            $iduser = $_COOKIE["iduser"];
            $content = "Nuevo producto: " . $name;
            $query = 'insert into registro (iduser,content,idhome,date) values ("'.$iduser.'","'.$content.'",'.$idhome.',"'.date("d.m.Y").'")';
            $result = $db->query($query);
            echo "0";
        }else{
            echo "No se ha podido añadir la tarea";
        }
    }else{  //Ya existe, querremos añadirlo a la lista
        $row = $result->fetch_array();
        $idprod = $row["idproduct"];
        $query = 'update products set added = true where idproduct = "'.$idprod.'"';
        if(!$db->query($query)){
            echo 'No se ha podido añadir el producto';
        }else{
            echo "0";
        }
    }
    $db->close();
}
?>