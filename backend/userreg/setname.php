<?php
{
    /*
    *   Este php será llamado vía AJAX y devolverá 0 en caso de fallo y el nuevo nombre en caso de éxito
    */
    include_once('../functions.php');
    if(!checkLogin() || !isset($_REQUEST["name"]) || !isset($_REQUEST["user"])){
        echo "0";   //error
        exit();
    }
    $name = $_REQUEST["name"];
    $iduser = $_REQUEST["user"];
    
    $db = connectDataBase();
    $query = 'update users set name = "'.$name.'" where iduser = "'.$iduser.'"';
    if(($result = $db->query($query)) != null){
        $query = 'select * from users where iduser = "'.$iduser.'"';
        if(($result = $db->query($query)) != null){
            $row = $result->fetch_array();
            echo $row["name"];
        }else{
            echo "0";
        }
    }else{
        echo "0";
    }
    $db->close();
}
?>