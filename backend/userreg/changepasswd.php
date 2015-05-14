<?php
{
    //Comprobar passwd antigua
    include_once('../functions.php');
    $iduser = $_COOKIE["iduser"];
    $passwdant = sha1($_REQUEST["passwdant"]);
    $passwdnew = sha1($_REQUEST["passwdnew"]);
    
    $db = connectDataBase();
    $query = 'select * from users where iduser = "'.$iduser.'"';
    $result = $db->query($query)
        or die($db->error);
    $row = $result->fetch_array();
    $passwddb = $row["passwd"];
    
    if($passwdant == $passwddb){
        $query = 'update users set passwd = "'.$passwdnew.'" where iduser = "'.$iduser.'"';
        if($db->query($query)){
            echo "0";
        }else{
            echo "Error al actualizar la contraseña";
        }
    }else{
        echo "Contraseña incorrecta";
    }
}
?>