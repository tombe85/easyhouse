<?php
{
    /*
    *   Este php será llamado vía AJAX y devolverá el contenido del mail del casero en caso de éxito y 0 en caso de fallo
    */
    include_once('../functions.php');
    if(!checkLogin() || !isset($_REQUEST["mail"]) || !isset($_REQUEST["home"]) || $_REQUEST["mail"] == "" || strpos($_REQUEST["mail"],"<") != false || $_REQUEST["home"] == "" || strpos($_REQUEST["home"],"<") != false){
        echo "0"; //error
        exit();
    }
    $mail = $_REQUEST["mail"];
    $idhome = $_REQUEST["home"];
    $db = connectDataBase();
    $query = 'update homes set lordmail = "'.$mail.'" where idhome = "'.$idhome.'"';
    if(($result = $db->query($query)) != null){
        $query = 'select * from homes where idhome = "'.$idhome.'"';
        if(($result = $db->query($query)) != null){
            $row = $result->fetch_array();
            echo $row["lordmail"];
        }else{
            echo "0";
        }
    }else{
        echo "0";
    }
    $db->close();
}
?>