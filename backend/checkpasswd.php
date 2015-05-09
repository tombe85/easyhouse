<?php
$mail=$_REQUEST["user"];
$passwd=sha1($_REQUEST["passwd"]);

include('functions.php');
$db=connectDataBase();
$query='select * from users where mail like "'.$mail.'"';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));
$reg=$result->fetch_array();
if($reg["passwd"] == $passwd){
    echo "1";
}else{
    echo "0";
}
?>