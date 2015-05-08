<?php
$mail=$_REQUEST["mail"];

include('../functions.php');
$db = connectDataBase();

$query='select * from users where mail like "'.$mail.'"';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));
$db->close();
if($result->num_rows > 0){
    echo "1";
}else{
    echo "0";
}
?>