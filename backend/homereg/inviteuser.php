<?php
{
    $mail = $_REQUEST["texto"];
    $idhome = $_COOKIE["idhome"];
    $caracteres = "abcdefghijklmnopqrstuvwxyz1234567890";
    $code = "";
    for($i=0; $i<10; $i++)
    {
        $code = $code . substr($caracteres,rand(0,strlen($caracteres)),1);
    }
    
    //Vemos que no esté invitados
    include_once('../functions.php');
    $db = connectDataBase();
    $query = 'select * from invited where idhome = "'.$idhome.'" and mail like "'.$mail.'"';
    $result = $db->query($query)
        or die($db->error);
    if($result->num_rows > 0){
        header('Location: /sweethomesw/admin/config/users.html');
    }
    
    //Agregamos a invitados
    $query = 'insert into invited (mail,code,idhome) values ("'.$mail.'","'.$code.'","'.$idhome.'")';
    $db->query($query)
        or die($db->error);
    
    //Enviamos mail
    /* Hacer para el server */
    
    //Nos vamos a gestion de usuarios
    header('Location: /sweethomesw/admin/config/users.html');
    
}
?>