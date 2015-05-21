<?php
{
    include_once('../functions.php');
    if(!checkLogin() || !isset($_REQUEST["name"]) || !isset($_REQUEST["home"])){
        echo "0"; //error
        exit();
    }
    $name = $_REQUEST["name"];
    $idhome = $_REQUEST["home"];
    $db = connectDataBase();
    $query = 'update homes set lord = "'.$name.'" where idhome = "'.$idhome.'"';
    if(($result = $db->query($query)) != null){
        $query = 'select * from homes where idhome = "'.$idhome.'"';
        if(($result = $db->query($query)) != null){
            $row = $result->fetch_array();
            echo $row["lord"];
        }else{
            echo "0";
        }
    }else{
        echo "0";
    }
    $db->close();
}
?>