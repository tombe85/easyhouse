<?php
{
    $name = $_REQUEST["name"];
    
    include_once('../functions.php');
    $db = connectDataBase();
    $idhome = $_COOKIE["idhome"];
    //Añade el gasto                             
    $query = 'insert into expenses (name,idhome) values ("'.$name.'",'.$idhome.')';
    if($result = $db->query($query)){
        $iduser = $_COOKIE["iduser"];
        $content = "Ha añadido el gasto: " . $name;
        $query = 'insert into registro (iduser,content,idhome,date) values ("'.$iduser.'","'.$content.'",'.$idhome.',"'.date("d.m.Y").'")';
        $result = $db->query($query);
        echo "0";
    }else{
        echo "No se ha podido añadir la tarea";
    }
    $db->close();
}
?>