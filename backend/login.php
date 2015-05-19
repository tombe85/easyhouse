<?php

//Empezar la sesión
session_start();

//Sacar datos y comprobarlos
$mail=$_REQUEST["usuario"];
$passwd=sha1($_REQUEST["passwd"]);

if($mail == NULL || $passwd == NULL){
    echo "Debe rellenar todos los campos";
    exit();
}

//Conectar BBDD
include_once('functions.php');
$db = connectDataBase();

//Buscar usuario
$query='select * from users where mail like "'.$mail.'"';
if(!($result = $db->query($query))){
    echo "Error de consulta";
    exit();
}
if($result->num_rows == 0){
    echo "El mail introducido no está registrado en ninguna casa";
    exit();
}
$reg=$result->fetch_array();

//Comprobar contraseña y asignar iduser
if($passwd != $reg["passwd"]){
    echo "Contraseña incorrecta";
    exit();
}
$iduser=$reg["iduser"];
$admin=$reg["admin"];
$idhome=$reg["idhome"];

$db->close();

//Actualizar variables de sesión
setcookies(true,$admin,$idhome,$iduser);

echo "0";

?>