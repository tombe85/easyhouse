<?php
{
    include_once('../functions.php');
    if(!checkLogin()){
        echo "No has iniciado sesión";
        exit();
    }
    if(!isset($_REQUEST["strids"])){
        echo "Error al eliminar el producto";
        exit();
    }
    $text = $_REQUEST["strids"];
    $idhome = $_COOKIE["idhome"];
    $idsproduct = array();
    $idsproduct = split(" ", trim($text));
    
    $db = connectDataBase();
    $prods = "";
    foreach($idsproduct as $idproduct){
        $query = 'select * from products where idproduct = "'.$idproduct.'"';
        if(!($result = $db->query($query))){
            echo "Error al actualizar la lista de productos";
            exit();
        }
        $row = $result->fetch_array();
        $prods = $prods . $row["name"] . ", ";
        $query='update products set added = false where idproduct = "'.$idproduct.'"';
        if(!($result = $db->query($query))){
            echo "Error al actualizar la lista de productos";
            exit();
        }
    }
    $prods = substr($prods, 0, -2);    
    
    $query = 'insert into registro (iduser,content,idhome,date,usersdeleted) values ('.$_COOKIE["iduser"].',"Ha comprado:<br> ('.$prods.')",'.$_COOKIE["idhome"].',"'.date("d.m.Y").'","")';
    
    $db->query($query);
    $db->close();
    
    echo "0";
    exit();
}
?>