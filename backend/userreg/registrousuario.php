<?php

//Cogemos los datos
$user=$_POST["usuario"];
$mail=$_POST["email"];
$passwd=sha1($_POST["passwd"]);
$passwd2=sha1($_POST["passwd2"]);
$code=$_COOKIE["code"];

//Comprobaciones
if($user == null || $mail == null || $passwd == null || $passwd2 == null || $code == null){
    header('Location: /sweethomesw/userregister.html');
}
if($passwd !== $passwd2){
    header('Location: /sweethomesw/userregister.html');
}

//Conectamos a la base de datos
include_once('../functions.php');
$db = connectDataBase();

//Ver si está invitado
$query='select * from invited where code like "'.$code.'"';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));
if($result->num_rows == 0){
    header('Location: /sweethomesw/userregister.html');
}
$row=$result->fetch_array();
$idhome = $row["idhome"];

//añadir a usarios
$query='insert into users (name,idhome,mail,passwd) values ("'.$user.'",'.$idhome.',"'.$mail.'","'.$passwd.'")';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));

//borrar de invitados
$query='delete from invited where code like "'.$code.'"';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));

//actualizar la casa
$query='update homes set numusers = numusers + 1 where idhome = "'.$idhome.'"';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));

//buscar iduser generada
$query='select * from users where mail like "'.$mail.'"';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));
$reg=$result->fetch_array();
$iduser=$reg["iduser"];

$db->close();

//Actualizar variables de sesión y cookies
setcookies(true,false,$idhome,$iduser);

header('Location: /sweethomesw/home.html');

?>