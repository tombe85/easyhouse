<?php
{
    /*
    *   Este php será llamado vía AJAX y devolverá 1 en caso de éxito y 0 en caso de fallo
    */
    include_once('../functions.php');
    if(!checkLogin() || !isset($_REQUEST["idboard"])){
        echo "0";   //error
        exit();
    }
    $idboard = $_REQUEST["idboard"];
    
    $db = connectDataBase();
    $query='select * from board where idboard = "'.$idboard.'"';
    $result = $db->query($query)
        or die($db->error. " en la línea ".(__LINE__-1));
    $row = $result->fetch_array();
    $content = $row["content"];
    
    //Eliminar los comentarios
    $query = 'delete from boardcomments where idboard = "'.$idboard.'"';
    $db->query($query)
        or die($db->error. " en la línea ".(__LINE__-1));
    
    //Elimina mensaje
    $query = 'delete from board where idboard = "'.$idboard.'"';
    if($result = $db->query($query)){
        $iduser = $_COOKIE["iduser"];
        $idhome = $_COOKIE["idhome"];
        $content = "Eliminado del tablón: " . $content;
        $query = 'insert into registro (iduser,content,idhome,date) values ("'.$iduser.'","'.$content.'",'.$idhome.',"'.date("d.m.Y").'")';
        $result = $db->query($query)
            or die($db->error);
        echo "1";
    }else{
        echo "0";
    }
    $db->close();
}
?>