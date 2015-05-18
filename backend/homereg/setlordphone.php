<?php
{
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