<?php
{
    include_once('../functions.php');
    if(!checkLogin() || !checkAdmin() || !isset($_REQUEST["idinvited"])){
        // 0 == error
        echo "0";
        exit();
    }
    
    $idinvited = $_REQUEST["idinvited"];
    $idhome = $_COOKIE["idhome"];
    
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