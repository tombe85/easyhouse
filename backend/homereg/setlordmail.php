<?php
{
    include_once('../functions.php');
    if(!checkLogin() || !isset($_REQUEST["mail"]) || !isset($_REQUEST["home"])){
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