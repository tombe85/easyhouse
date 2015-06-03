<?php
/*
*   Este php será accedido al hacer click a Registrarse y enlazará a la página principal si todo ha salido bien
*   o a la página de registro de nuevo en caso de error
*/
include_once('../functions.php');

//Cogemos los datos
if(!isset($_POST["usuario"]) || !isset($_POST["passwd"]) || !isset($_POST["passwd2"]) || !isset($_COOKIE["code"]) || $_POST["usuario"] == "" || $_POST["passwd"] == "" || $_POST["passwd2"] == "" || $_COOKIE["code"] == "" || strpos($_POST["usuario"],"<") != false || strpos($_POST["passwd"],"<") != false || strpos($_POST["passwd2"],"<") != false || strpos($_COOKIE["code"],"<") != false){
    header('Location: /sweethomesw/userregister.html');
}
$sal = generateAleatoryCode();
$user=$_POST["usuario"];
$passwd=sha1($_POST["passwd"] . $sal);
$passwd2=sha1($_POST["passwd2"] . $sal);
$code=$_COOKIE["code"];

//Comprobaciones
if($user == null || $code == null){
    header('Location: /sweethomesw/userregister.html');
}
if($passwd !== $passwd2){
    header('Location: /sweethomesw/userregister.html');
}

//Conectamos a la base de datos
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
$mail = $row["mail"];

//añadir a usarios
$query='insert into users (name,idhome,mail,passwd, sal) values ("'.$user.'",'.$idhome.',"'.$mail.'","'.$passwd.'","'.$sal.'")';
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

$query = 'insert into registro (iduser,content,idhome,date) values ("'.$iduser.'","Se ha incorporado a la casa",'.$idhome.',"'.date("d.m.Y").'")';
$result = $db->query($query)
    or die($db->error);

$db->close();

//Actualizar variables de sesión y cookies
setcookies(true,false,$idhome,$iduser);

header('Location: /sweethomesw/home.html');

?>