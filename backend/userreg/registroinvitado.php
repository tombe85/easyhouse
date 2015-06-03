<?php
/*
*   Este php será accedido desde el mail de invitación a easyHouse, para controlar el usuario que entra y enlazar 
*   a la página de registro
*/
//El enlace del correo contendrá el code y el mail
if(!isset($_REQUEST["code"]) || $_REQUEST["code"] == "" || strpos($_REQUEST["code"],"<") != false){
    echo "Dirección inválida";
    exit();
}
setcookie("code",$_REQUEST["code"],time() + 3600,"/sweethomesw/");
header('Location: /sweethomesw/userregister.html');
?>