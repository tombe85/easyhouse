<?php
//El enlace del correo contendrá el code y el mail
if(!isset($_REQUEST["code"])){
    echo "Dirección inválida";
    exit();
}
setcookie("code",$_REQUEST["code"],time() + 3600,"/sweethomesw/");
header('Location: /sweethomesw/userregister.html');
?>