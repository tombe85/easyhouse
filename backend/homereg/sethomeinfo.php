<?php
{
    include_once('../functions.php');
    if(!checkLogin() || !isset($_REQUEST["info"])){
        echo "0"; //error
        exit();
    }
    $info = $_REQUEST["info"];
    $idhome = $_COOKIE["idhome"];
    
    $db = connectDataBase();
    $query = 'update homes set info = "'.$info.'" where idhome = "'.$idhome.'"';
    if(($result = $db->query($query)) != null){
        $query = 'select * from homes where idhome = "'.$idhome.'"';
        if(($result = $db->query($query)) != null){
            $row = $result->fetch_array();
            echo $row["info"];
        }else{
            echo "0";
        }
    }else{
        echo "0";
    }
    $db->close();
}
?>