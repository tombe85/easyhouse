<?php
{
    $iduser = $_REQUEST["iduser"];
    $idhome = $_COOKIE["idhome"];
    include_once('../functions.php');
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
        $result = $db->query($query)
            or die($db->error);
        echo "1";
    }else{
        echo "0";
    }
    $db->close();
}
?>