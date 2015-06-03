<?php
{
    /*
    *   Este php será llamado vía AJAX y devolverá el mensaje de error en caso de fallo y 0 en caso de éxito
    */
    //Comprobar passwd antigua
    include_once('../functions.php');
    if(!checkLogin()){
        echo "No has iniciado sesión";
        exit();
    }
    if(!isset($_REQUEST["mail"]) || !isset($_REQUEST["passwd"]) || $_REQUEST["mail"] == "" || strpos($_REQUEST["mail"],"<") != false || $_REQUEST["passwd"] || strpos($_REQUEST["passwd"],"<") != false){
        echo "Error al cambiar el e-mail";
        exit();
    }
    $iduser = $_COOKIE["iduser"];
    $mail = $_REQUEST["mail"];
    
    $db = connectDataBase();
    
    $query='select * from users where iduser like "'.$iduser.'"';
    $result = $db->query($query)
        or die($db->error. " en la línea ".(__LINE__-1));
    $reg=$result->fetch_array();
    
    $passwd = sha1($_REQUEST["passwd"] . reg["sal"]);
    
    $query = 'select * from users where iduser = "'.$iduser.'"';
    $result = $db->query($query)
        or die($db->error);
    $row = $result->fetch_array();
    $passwddb = $row["passwd"];
    
    if($passwd == $passwddb){
        $query = 'update users set mail = "'.$mail.'" where iduser = "'.$iduser.'"';
        if($db->query($query)){
            echo "0";
        }else{
            echo "Error al actualizar el correo";
        }
    }else{
        echo "Contraseña incorrecta";
    }
}
?>