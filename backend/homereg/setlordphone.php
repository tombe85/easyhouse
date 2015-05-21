<?php
{
    include_once('../functions.php');
    if(!checkLogin() || !isset($_REQUEST["phone"]) || !isset($_REQUEST["home"])){
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