<?php
{
    //Comprobar passwd antigua
    include_once('../functions.php');
    if(!checkLogin()){
        echo "No has iniciado sesión";
        exit();
    }
    if(!isset($_REQUEST["passwdant"]) || !isset($_REQUEST["passwdnew"])){
        echo "Error al actualizar la contraseña";
        exit();
    }
    $iduser = $_COOKIE["iduser"];
    $passwdant = $_REQUEST["passwdant"];
    $passwdnew = $_REQUEST["passwdnew"];
    
    $db = connectDataBase();
    $query = 'select * from users where iduser = "'.$iduser.'"';
    $result = $db->query($query)
        or die($db->error);
    $row = $result->fetch_array();
    $passwddb = $row["passwd"];
    $sal = $row["sal"];
    
    if(sha1($passwdant . $sal) == $passwddb){
        $query = 'update users set passwd = "'.sha1($passwdnew . $sal).'" where iduser = "'.$iduser.'"';
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