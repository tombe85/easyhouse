<?php
{
    /*
    *   Este php será llamado vía AJAX y devolverá el contenido del error encontrado caso de fallo, o 0 en caso de éxito
    */
    include_once('../functions.php');
    if(!checkLogin()){
        echo "Debes iniciar sesión para añadir un producto";
        exit();
    }
    if(!isset($_REQUEST["idp"]) || $_REQUEST["idp"] == "" || strpos($_REQUEST["idp"],"<") != false){
        echo "No has seleccionado productos";
        exit();
    }
    $idproduct = $_REQUEST["idp"];
    
    $db = connectDataBase();
    
    $query='update products set added = true where idproduct = "'.$idproduct.'"';
    if($result = $db->query($query)){
        echo "0";
    }else{
        echo "No se puede actualizar la lista de productos";
    }
    
    $db->close();
}
?>