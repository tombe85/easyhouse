<?php
{
    /*
    *   Este php será llamado vía AJAX y devolverá un 1 en caso de éxito y 0 en caso de fallo
    */
    include_once('../functions.php');
    if(!checkLogin() || !checkAdmin() || !isset($_REQUEST["iduserdel"])){
        echo "0";
        exit();
    }
    
    $iduser = $_REQUEST["iduserdel"];
    $idhome = $_COOKIE["idhome"];
    
    $db = connectDataBase();
    $query='select * from users where iduser = "'.$iduser.'"';
    $result = $db->query($query)
        or die($db->error. " en la línea ".(__LINE__-1));
    $row = $result->fetch_array();
    $photo = $row["photo"];
    
    //Elimina usuario
    $query = 'delete from users where iduser = "'.$iduser.'"';
    if($result = $db->query($query)){
        $query = 'update homes set numusers = (select count(*) from users where idhome = "'.$idhome.'") where idhome = "'.$idhome.'"';
        $db->query($query);
        echo "1";
    }else{
        echo "0";
    }
    $db->close();
}
?>