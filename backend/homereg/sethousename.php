<?php
{
    $name = $_REQUEST["name"];
    $idhome = $_REQUEST["home"];
    include_once('../functions.php');
    $db = connectDataBase();
    $query = 'update homes set name = "'.$name.'" where idhome = "'.$idhome.'"';
    if(($result = $db->query($query)) != null){
        $query = 'select * from homes where idhome = "'.$idhome.'"';
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