<?php
{
    $name = $_REQUEST["name"];
    $points = $_REQUEST["points"];
    $period = $_REQUEST["period"];
    
    include_once('../functions.php');
    $db = connectDataBase();
    $idhome = $_COOKIE["idhome"];
    //Añade tarea
    $query = 'insert into tasks (name,period,idhome,active,points,activesince,approved) values ("'.$name.'",'.$period.','.$idhome.',true,'.$points.',"'.date("d.m.Y").'",true)';
    if($result = $db->query($query)){
        $iduser = $_COOKIE["iduser"];
        $content = "Ha añadido la tarea: " . $name;
        $query = 'insert into registro (iduser,content,idhome,date) values ("'.$iduser.'","'.$content.'",'.$idhome.',"'.date("d.m.Y").'")';
        $result = $db->query($query);
        echo "0";
    }else{
        echo "No se ha podido añadir la tarea";
    }
    $db->close();
}
?>