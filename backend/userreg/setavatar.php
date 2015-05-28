<?php
{
    include_once('../functions.php');
    if(!checkLogin() || !isset($_REQUEST["ruta"]) || !isset($_REQUEST["user"])){
        echo "0";   //error
        exit();
    }
    $ruta = $_REQUEST["ruta"];
    $iduser = $_REQUEST["user"];
    $idhome = $_COOKIE["idhome"];
    
    $db = connectDataBase();
    
    //Comprobamos foto
    $query = 'select * from users where idhome = "'.$idhome.'" and photo like "'.$ruta.'"';
    $result = $db->query($query);
    if($result){ //Si ya la tiene un usuario buscamos otra
        while($result->num_rows > 0){
            $num = str_replace("/sweethomesw/img/avatares/","", str_replace(".png","",$ruta));
            $num++;
            if($num > 54){
                $num = 1;
            }
            $ruta = "/sweethomesw/img/avatares/".$num.".png";
            $query = 'select * from users where idhome = "'.$idhome.'" and photo like "'.$ruta.'"';
            $result = $db->query($query);
            if(!$result){
                echo "0";
                exit();
            }
        }   
    }else{
        echo "0";
        exit();
    }
    
    //Ponemos foto
    $query = 'update users set photo = "'.$ruta.'" where iduser = "'.$iduser.'"';
    if(($result = $db->query($query)) != null){
        echo $ruta;
    }else{
        echo "0";
    }
    $db->close();
}
?>