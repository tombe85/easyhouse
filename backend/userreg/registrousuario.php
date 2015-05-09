<?php
session_start();

//Cogemos los datos de POST
$user=$_POST["usuario"];
$mail=$_POST["email"];
$rutafoto=$_POST["rutafoto"];
$passwd=sha1($_POST["passwd"]);
$passwd2=sha1($_POST["passwd2"]);
$code=$_SESSION["code"];

//Comprobaciones
if($user == null || $mail == null || $rutafoto == null || $passwd == null || $passwd2 == null){
    echo "Debes rellenar todos los datos";
    header('Location: /sweethomesw/userregister.html');
    exit();
}
if($passwd !== $passwd2){
    echo "Las constraseñas no coinciden.";
    header('Location: /sweethomesw/userregister.html');
    exit();
}

//Conectamos a la base de datos
include('../functions.php');
$db = connectDataBase();

//Añadimos registros a la base de datos

//Ver si existe mail
$query='select * from users where mail like "'.$mail.'"';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));
if($result->num_rows > 0){
    echo "El mail introducido ya pertenece a una casa. Sólo se puede pertenecer a una casa al mismo tiempo";
    header('Location: /sweethomesw/userregister.html');
    exit();
}

//Ver si está invitado
$query='select * from invited where mail like "'.$mail.'" and code like "'.$code.'"';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));
if($result->num_rows == 0){
    echo "No apareces en la lista de invitados. Habla con el administrador de la casa para que te añada como usuario.";
    header('Location: /sweethomesw/userregister.html');
    exit();
}else{
    $row=$result->fetch_array();
    $idhome = $row["idhome"];
}

//añadir a usarios
$query='insert into users (name,idhome,mail,photo,passwd) values ("'.$user.'",'.$idhome.',"'.$mail.'","'.$rutafoto.'","'.$passwd.'")';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));

//borrar de invitados
$query='delete from invited where code like "'.$code.'"';
$result = $db->query($query)
    or die($db->error. " en la línea ".(__LINE__-1));

//actualizar la casa
$query='update homes set numusers = numusers + 1 where idhome = '.$idhome;
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
$_SESSION["admin"]=false;
$_SESSION["idhome"]=$idhome;
$_SESSION["iduser"]=$iduser;

header('Location: /sweethomesw/config/main.html');
?>