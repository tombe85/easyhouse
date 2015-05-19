<?php
{
    $idinvited = $_REQUEST["idinvited"];
    $idhome = $_COOKIE["idhome"];
    include_once('../functions.php');
    $db = connectDataBase();
    
    //Elimina invitacion
    $query = 'delete from invited where idinvited = "'.$idinvited.'"';
    if($result = $db->query($query)){
        echo "1";
    }else{
        echo "0";
    }
    $db->close();
}
?>