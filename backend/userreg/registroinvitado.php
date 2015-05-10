<?php
session_start();
//El enlace del correo contendrá el code y el mail
setcookie("code",$_REQUEST["code"],time() + 3600,"/sweethomesw/");
header('Location: /sweethomesw/userregister.html');
?>