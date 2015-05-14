<?php
{
    //Comprobar passwd antigua
    include_once('../functions.php');
    $iduser = $_COOKIE["iduser"];
    $mail = $_REQUEST["mail"];
    $passwd = sha1($_REQUEST["passwd"]);
    
    $db = connectDataBase();
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