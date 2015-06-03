<?php
/*
*   Este php será llamado mediante un enlace y enlazará a la página ppal si todo ha ido bien o a la del login 
*   con el correspondiente error pasado por GET
*/

//Sacar datos y comprobarlos
if(!isset($_REQUEST["usuario"]) || !isset($_REQUEST["passwd"])){
    header('Location: /sweethomesw/login.html?mess=1');
    exit();
}
$mail=$_REQUEST["usuario"];
$passwd=$_REQUEST["passwd"];

//Conectar BBDD
include_once('functions.php');
$db = connectDataBase();
//Buscar usuario
$query='select * from users where mail like "'.$mail.'"';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));
if($result->num_rows == 0){
    header('Location: /sweethomesw/login.html?mess=2');
    exit();
}
$reg=$result->fetch_array();
//Comprobar contraseña y asignar iduser
if(sha1($passwd . $reg["sal"]) != $reg["passwd"]){
    header('Location: /sweethomesw/login.html?mess=3');
    exit();
}
$iduser=$reg["iduser"];
$admin=$reg["admin"];
$idhome=$reg["idhome"];
$db->close();
//Actualizar variables de sesión
setcookies(true,$admin,$idhome,$iduser);
header('Location: /sweethomesw/home.html');
?>