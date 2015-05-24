<?php
//cogemos la sesión
session_start();

//Cogemos los datos de POST
$user=$_POST["usuario"];
$mail=$_POST["email"];
$homename=$_POST["nombrecasa"];
$passwd=sha1($_POST["passwd"]);
$passwd2=sha1($_POST["passwd2"]);

//Comprobaciones
if($user == null || $user == "" || $mail == null || $mail == "" || $homename == null || $homename == "" || $_POST["passwd"] == null || $_POST["passwd"] == "" || $_POST["passwd2"] == null || $_POST["passwd2"] == ""){
    header('Location: /sweethomesw/register.html?mess=1');
    exit();
}
if($passwd !== $passwd2){
    header('Location: /sweethomesw/register.html?mess=2');
    exit();
}

//Conectamos a la base de datos
include_once('../functions.php');
$db = connectDataBase();

//Añadimos registros a la base de datos
//------------->Ver si existe mail
$query='select * from users where mail like "'.$mail.'"';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));
if($result->num_rows > 0){
    header('Location: /sweethomesw/register.html?mess=3');
    exit();
}

//Introducir la nueva casa
$query='insert into homes (name,adminmail) values ("'.$homename.'","'.$mail.'")';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));

//buscar idhome generada con mail de admin
$query='select * from homes where adminmail like "'.$mail.'"';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));
$reg=$result->fetch_array();
$idhome=$reg["idhome"];

//Introducir usuario
$query='insert into users (name,idhome,mail,passwd,admin) values ("'.$user.'",'.$idhome.',"'.$mail.'","'.$passwd.'","1")';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));

//buscar iduser generada
$query='select * from users where mail like "'.$mail.'"';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));
$reg=$result->fetch_array();
$iduser=$reg["iduser"];

//Mensaje de bienvenida
$content="Bienvenidos a " . $homename;
$query='insert into registro (iduser,content,idhome,date,usersdeleted) values ("'.$iduser.'","'.$content.'",'.$idhome.',"'.date("d.m.Y").'","")';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));

$db->close();

//Actualizar variables de sesión y cookies
setcookies(true,true,$idhome,$iduser);

header('Location: /sweethomesw/admin/config/index.html');
?>