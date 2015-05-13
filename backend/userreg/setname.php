<?php
{
    $name = $_REQUEST["name"];
    $iduser = $_REQUEST["user"];
    include_once('../functions.php');
    $db = connectDataBase();
    $query = 'update users set name = "'.$name.'" where iduser = "'.$iduser.'"';
    if(($result = $db->query($query)) != null){
        $query = 'select * from users where iduser = "'.$iduser.'"';
        if(($result = $db->query($query)) != null){
            $row = $result->fetch_array();
            echo $row["name"];
        }else{
            echo "0";
        }
    }else{
        echo "1";
    }
    $db->close();
}
?>