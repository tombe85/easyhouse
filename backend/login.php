<?php

//Empezar la sesión
session_start();

//Sacar datos y comprobarlos
$mail=$_REQUEST["usuario"];
$passwd=sha1($_REQUEST["passwd"]);

if($mail == NULL || $passwd == NULL){
    echo "Debe rellenar todos los campos";
    header('Location: /sweethomesw/login.html');
    exit();
}

//Conectar BBDD
include('functions.php');
$db = connectDataBase();

//Buscar usuario
$query='select * from users where mail like "'.$mail.'"';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));
if($result->num_rows == 0){
    echo "El mail introducido no existe";
    header('Location: /sweethomesw/login.html');
    exit();
}
$reg=$result->fetch_array();

//Comprobar contraseña y asignar iduser
if($passwd != $reg["passwd"]){
    echo "Contraseña errónea";
    header('Location: /sweethomesw/login.html');
    exit();
}
$iduser=$reg["iduser"];
$admin=$reg["admin"];
$home=$reg["idhome"];

$db->close();

//Actualizar variables de sesión
$_SESSION["login"]=true;
$_SESSION["admin"]=$admin;
$_SESSION["idhome"]=$idhome;
$_SESSION["iduser"]=$iduser;

header('Location: /sweethomesw/home.html');

?>