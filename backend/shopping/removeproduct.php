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
    $idsproduct = array();
    $idsproduct = split(" ", trim($text));
    
    $db = connectDataBase();
    $numprods = count($idsproduct);
    foreach($idsproduct as $idproduct){
        $query='update products set added = false where idproduct = "'.$idproduct.'"';
        if(!($result = $db->query($query))){
            echo "Error al actualizar la lista de productos";
            exit();
        }
    }
    if($numprods == 1)
        $plural = "";
    else
        $plural = "s";
    
    $query = 'insert into registro (iduser,content,idhome,date,usersdeleted) values ('.$_COOKIE["iduser"].',"Ha hecho compra<br> ('.$numprods.' producto'.$plural.')",'.$_COOKIE["idhome"].',"'.date("d.m.Y").'","")';
    
    $db->query($query);
    $db->close();
    
    echo "0";
    exit();
}
?>