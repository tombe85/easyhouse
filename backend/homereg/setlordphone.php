<?php
{
    /*
    *   Este php será llamado vía AJAX y devolverá el contenido del teléfono del casero en caso de éxito y 0 en caso de fallo
    */
    include_once('../functions.php');
    if(!checkLogin() || !isset($_REQUEST["phone"]) || !isset($_REQUEST["home"]) || $_REQUEST["phone"] == "" || strpos($_REQUEST["phone"],"<") != false || $_REQUEST["home"] == "" || strpos($_REQUEST["home"],"<") != false){
        echo "0"; //error
        exit();
    }
    $phone = $_REQUEST["phone"];
    $idhome = $_REQUEST["home"];
    include_once('../functions.php');
    $db = connectDataBase();
    $query = 'update homes set lordphone = "'.$phone.'" where idhome = "'.$idhome.'"';
    if(($result = $db->query($query)) != null){
        $query = 'select * from homes where idhome = "'.$idhome.'"';
        if(($result = $db->query($query)) != null){
            $row = $result->fetch_array();
            echo $row["lordphone"];
        }else{
            echo "0";
        }
    }else{
        echo "0";
    }
    $db->close();
}
?>