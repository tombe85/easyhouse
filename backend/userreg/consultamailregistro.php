<?php
/*
*   Este php será llamado vía AJAX y devolverá 0 en caso de éxito o el número correspondiente al error generado para la validación
*   Por javascript
*/
if(!isset($_REQUEST["mail"]) || $_REQUEST["mail"] == "" || strpos($_REQUEST["mail"],"@") == false || strpos($_REQUEST["mail"],".") == false){
    echo "0";
    exit();
}
$mail=$_REQUEST["mail"];

include('../functions.php');
$db = connectDataBase();

$query='select * from users where mail like "'.$mail.'"';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));

if($result->num_rows > 0){
    echo "1";
}else if(isset($_COOKIE["code"])){
    $query='select * from invited where code like "'.$_COOKIE["code"].'"';
    $result = $db->query($query)
        or die($db->error. " en la línea ".(__LINE__-1));
    if($result->num_rows > 0){
        echo "0";
    }else{
        echo "3";
    }
}else{
    echo "2";
}
$db->close();
?>