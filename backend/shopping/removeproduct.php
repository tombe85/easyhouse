<?php
{
    include_once('../functions.php');

    $text = $_REQUEST["strids"];
    $idsproduct = array();
    $idsproduct = split(" ", trim($text));
    
    $db = connectDataBase();
    foreach($idsproduct as $idproduct){
        $query='update products set added = false where idproduct = "'.$idproduct.'"';
        if($result = $db->query($query)){
            echo "0";
        }else{
            echo "No se puede actualizar la lista de productos";
        }
    }
    $db->close();
}
?>