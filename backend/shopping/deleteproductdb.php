<?php
{
    include_once('../functions.php');
    if(!checkLogin()){
        echo "No has iniciado sesión";
        exit();
    }
    if(!isset($_REQUEST["idprod"])){
        echo "Error al eliminar el producto";
        exit();
    }
    
    $db = connectDataBase();
    
    $idproduct = $_REQUEST["idprod"];
    
    //Busca producto
    $query = 'select * from products where idproduct = "'.$idproduct.'"';
    $result = $db->query($query)
        or die($db->error);
    $row = $result->fetch_array();
    $content = $row["name"];
    
    //Elimina producto
    $query = 'delete from products where idproduct = "'.$idproduct.'"';
    if($result = $db->query($query)){
        $iduser = $_COOKIE["iduser"];
        $idhome = $_COOKIE["idhome"];
        $content = "Eliminado producto: " . $content;
        $query = 'insert into registro (iduser,content,idhome,date) values ("'.$iduser.'","'.$content.'",'.$idhome.',"'.date("d.m.Y").'")';
        $result = $db->query($query);
        echo "0";
    }else{
        echo "No se ha podido eliminar la tarea";
    }
    $db->close();
}
?>