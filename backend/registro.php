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
if($user == null || $mail == null || $homename == null || $passwd == null || $passwd2 == null){
    echo "Debes rellenar todos los datos";
    exit();
}
if($passwd !== $passwd2){
    echo "Las constraseñas no coinciden.";
    exit();
}

//Conectamos a la base de datos
include('functions.php');
$db = connectDataBase();

//Añadimos registros a la base de datos
//------------->Ver si existe mail
$query='select * from users where mail like "'.$mail.'"';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));
if($result->num_rows > 0){
    echo "El mail introducido ya pertenece a una casa. Sólo se puede pertenecer a una casa al mismo tiempo";
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
$query='insert into users (name,idhome,mail,passwd,admin) values ("administrador",'.$idhome.',"'.$mail.'","'.$passwd.'","1")';
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
$_SESSION["login"]=true;
$_SESSION["admin"]=true;
$_SESSION["idhome"]=$idhome;
$_SESSION["iduser"]=$iduser;
// cookies?

header('Location: /sweethomesw/admin/config/main.html');
?>