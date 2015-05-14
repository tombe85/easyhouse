<?php
  
include_once('../functions.php');

$text = $_REQUEST["strids"];
    $idsproduct = array();
    $idsproduct = split(" ", trim($text));
    
    $db = connectDataBase();
    foreach($idsproduct as $idproduct){
        echo 'entra en el for';
        $query='update products set added = false where idproduct = "'.$idproduct.'"';
        $result = $db->query($query);
        if($result = $db->query($query)){
            echo "0";

        }else{
            echo "Fallo al actualizar los productos";
        }
        
    }
    $db->close();
    header('Location: /sweethomesw/shopping/main.html');

      
?>
