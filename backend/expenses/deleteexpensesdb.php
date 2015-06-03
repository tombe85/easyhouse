<?php
{
    /*
    *   Este php será llamado por AJAX y modificará la base de datos
    *   Devolverá un 0 si todo ha ido correctamente o el error en caso de que lo haya
    */
    include_once('../functions.php');
    if(!checkLogin()){
        echo 'No has iniciado sesión';
        exit();
    }
    if(!checkAdmin()){
        echo "No tienes permisos de administrador";
        exit();
    }
    if(!isset($_REQUEST["idexpense"])){
        echo "Error en identificador del gasto";
        exit();
    }
    $db = connectDataBase();
    
    $idexpense = $_REQUEST["idexpense"];
    
    //Busca producto
    $query = 'select * from expenses where idexpense = "'.$idexpense.'"';
    $result = $db->query($query)
        or die($db->error);
    $row = $result->fetch_array();
    $content = $row["name"];
    
    //Elimina producto
    $query = 'delete from expenses where idexpense = "'.$idexpense.'"';
    if($result = $db->query($query)){
        $iduser = $_COOKIE["iduser"];
        $idhome = $_COOKIE["idhome"];
        $content = "Ha eliminado el gasto: " . $content;
        $query = 'insert into registro (iduser,content,idhome,date) values ("'.$iduser.'","'.$content.'",'.$idhome.',"'.date("d.m.Y").'")';
        $result = $db->query($query);
        echo "0";
    }else{
        echo "No se ha podido eliminar el gasto";
    }
    $db->close();
}
?>