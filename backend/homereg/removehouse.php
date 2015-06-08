<?php
{
    include_once("../functions.php");
    if(!checkLogin()){
        echo "No has iniciado sesión";
        exit();
    }
    if(!checkAdmin()){
        echo "No eres administrador de la casa";
        exit();
    }
    
    $idhome = $_COOKIE["idhome"];
    
    $db = connectDataBase();
    $query='delete from homes where idhome="'.$idhome.'"';
    if($db->query($query) != null){
        echo "0";
        exit();
    }else{
        echo "No se ha podido eliminar la casa";
        exit();
    }
}
?>