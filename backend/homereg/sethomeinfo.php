<?php
{
    $info = $_REQUEST["info"];
    $idhome = $_REQUEST["home"];
    include_once('../functions.php');
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