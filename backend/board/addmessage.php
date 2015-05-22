<?php
{
    include_once('../functions.php');
    
    //Datos de sesión
    if(!checkLogin()){
        header('Location: /sweethomesw/login.html');
    }
    $idhome = $_COOKIE["idhome"];
    $iduser = $_COOKIE["iduser"];
    
    //Datos por post
    if(!isset($_REQUEST["titulo"]) || !isset($_REQUEST["mensaje"])){
        header('Location: /sweethomesw/board/main.html');
    }
    $title = $_REQUEST["titulo"];
    $message = $_REQUEST["mensaje"];
    
    //Añadir al tablón
    $db = connectDataBase();
    $query = 'insert into board (iduser,content,idhome,date,data) values ('.$iduser.',"'.$title.'",'.$idhome.',"'.date("d.m.Y").'","'.$message.'")';
    $result = $db->query($query)
        or die($db->error. " en la línea ".(__LINE__-1));
    
    //Añadir al registro
    $cont = "Ha añadido un mensaje al tablón";
    $query = 'insert into registro (iduser,content,idhome,date) values ('.$iduser.',"'.$cont.'",'.$idhome.',"'.date("d.m.Y").'")';
    $result = $db->query($query)
        or die($db->error. " en la línea ".(__LINE__-1));
    updateCookies();
    header('Location: /sweethomesw/board/main.html');
}
?>