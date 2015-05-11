<?php
{
    include_once('../functions.php');
    
    //Datos de sesión
    if(!checklogin()){
        echo "Error. Has sido desconectado.";
        exit();
    }
    $idhome = $_COOKIE["idhome"];
    $iduser = $_COOKIE["iduser"];
    
    //Datos por post
    if(!isset($_REQUEST["texto"])){
        //Comprobar con ajax en html
        echo "Error. Variables corruptas.";
        exit();
    }
    $text = $_REQUEST["texto"];
    $idboard = $_REQUEST["idboard"];
    
    //Añadir al mensaje
    $db = connectDataBase();
    $query = 'insert into boardcomments (idboard,iduser,comment,date) values ('.$idboard.','.$iduser.',"'.$text.'","'.date("d.m.Y").'")';
    $result = $db->query($query)
        or die($db->error. " en la línea ".(__LINE__-1));
    
    header('Location: /sweethomesw/board/viewmessage.html?id='.$idboard);
}
?>