<?php
/*
*   Este php será accedido mediante un enlace. Modifica la base de datos y enlaza a la página correspondiente
*/

if(!isset($_POST["usuario"]) || !isset($_POST["passwd"]) || !isset($_POST["passwd2"]) || !isset($_COOKIE["email"]) || !isset($_COOKIE["nombrecasa"])){
    header('Location: /sweethomesw/register.html?mess=1');
}

include_once('../functions.php');

//Cogemos los datos de POST
$user=$_POST["usuario"];
$mail=$_POST["email"];
$homename=$_POST["nombrecasa"];
$sal = generateAleatoryCode();
$passwd=sha1($_POST["passwd"] . $sal);
$passwd2=sha1($_POST["passwd2"] . $sal);

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
$query='insert into users (name,idhome,mail,passwd,admin,sal) values ("'.$user.'",'.$idhome.',"'.$mail.'","'.$passwd.'","1","'.$sal.'")';
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