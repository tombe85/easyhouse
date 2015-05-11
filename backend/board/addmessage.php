<?php
{
    include_once('../functions.php');
    if(!checklogin()){
        echo "Error. Has sido desconectado.";
        exit();
    }
    $idhome = $_COOKIE["idhome"];
    $iduser = $_COOKIE["iduser"];
    
    if(!isset($_REQUEST["titulo"]) || !isset($_REQUEST["mensaje"]) || $_REQUEST["titulo"] == "" || $_REQUEST["mensaje"] == ""){
        //Comprobar con ajax en html
        echo "Error. Variables corruptas.";
        exit();
    }
    
    $title = $_REQUEST["titulo"];
    $message = $_REQUEST["mensaje"];
    
    $db = connectDataBase();
    $query = 'insert into board (iduser,content,idhome,date,data) values ('.$iduser.',"'.$title.'",'.$idhome.',"'.date("d.m.Y").'","'.$message.'")';
    $result = $db->query($query)
        or die($db->error. " en la línea ".(__LINE__-1));
    
    header('Location: /sweethomesw/board/main.html');
}
?>