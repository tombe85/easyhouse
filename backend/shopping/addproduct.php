<?php
  
include_once('../functions.php');

$text = $_REQUEST["strids"];
    $idsproduct = array();
    $idsproduct = split(",", $text);
    
    $db = connectDataBase();
    foreach($idsproduct as $idproduct){
        
        
        $query='update products set added = true where idproduct = "'.$idproduct.'"';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
    }
    $db->close();
    header('Location: /sweethomesw/shopping/addproduct.html');

      
?>
