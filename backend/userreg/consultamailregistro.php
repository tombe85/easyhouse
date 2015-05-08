<?php
session_start();
$mail=$_REQUEST["mail"];

include('../functions.php');
$db = connectDataBase();

$query='select * from users where mail like "'.$mail.'"';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));

if($result->num_rows > 0){
    echo "1";
}else if(isset($_SESSION["code"])){
    $query='select * from invited where code like "'.$_SESSION["code"].'"';
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