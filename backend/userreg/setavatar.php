<?php
{
    $ruta = $_REQUEST["ruta"];
    $iduser = $_REQUEST["user"];
    $idhome = $_COOKIE["idhome"];
    include_once('../functions.php');
    $db = connectDataBase();
    
    //Comprobamos foto
    $query = 'select * from users where idhome = "'.$idhome.'" and photo like "'.$ruta.'"';
    $result = $db->query($query);
    if($result){ //Si ya la tiene un usuario buscamos otra
        while($result->num_rows > 0){
            $num = str_replace("/sweethomesw/img/avatares/","", str_replace(".png","",$ruta));
            $num++;
            if($num > 13){
                $num = 1;
            }
            $ruta = "/sweethomesw/img/avatares/".$num.".png";
            $query = 'select * from users where idhome = "'.$idhome.'" and photo like "'.$ruta.'"';
            $result = $db->query($query);
            if(!$result){
                echo "Error de consulta sql";
                exit();
            }
        }   
    }else{
        echo "Error de consulta sql";
        exit();
    }
    
    //Ponemos foto
    $query = 'update users set photo = "'.$ruta.'" where iduser = "'.$iduser.'"';
    if(($result = $db->query($query)) != null){
        echo "0";
    }else{
        echo "Error al actualizar la foto";
    }
    $db->close();
}
?>