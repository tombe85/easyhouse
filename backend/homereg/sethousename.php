<?php
{
    /*
    *   Este php será llamado vía AJAX y devolverá el contenido del nombre de la casa en caso de éxito y 0 en caso de fallo
    */
    include_once('../functions.php');
    if(!checkLogin() || !isset($_REQUEST["name"]) || !isset($_REQUEST["home"])){
        echo "0"; //error
        exit();
    }
    $name = $_REQUEST["name"];
    $idhome = $_REQUEST["home"];
    $iduser = $_COOKIE["iduser"];
    
    $db = connectDataBase();
    $query = 'update homes set name = "'.$name.'" where idhome = "'.$idhome.'"';
    if(($result = $db->query($query)) != null){
        $query = 'select * from homes where idhome = "'.$idhome.'"';
        if(($result = $db->query($query)) != null){
            $row = $result->fetch_array();
            $nombre = $row["name"];
            
            $query = 'insert into registro (iduser,content,idhome,date,usersdeleted) values ('.$iduser.',"Nuevo nombre de la casa: '.$nombre.'",'.$idhome.',"'.date("d.m.Y").'","")';
    
            $db->query($query);
            
            echo $nombre;
        }else{
            echo "0";
        }
    }else{
        echo "0";
    }
    $db->close();
}
?>