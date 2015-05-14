<?php
{
    include_once('../functions.php');
    $db = connectDataBase();
    
    $idexpense = $_REQUEST["idexpense"];
    
    //Busca producto
    $query = 'select * from expenses where idexpense = "'.$idexpense.'"';
    $result = $db->query($query)
        or die($db->error);
    $row = $result->fetch_array();
    $content = $row["name"];
    
    //Elimina producto
    $query = 'delete from products where idexpense = "'.$idexpense.'"';
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