<?php
session_start();
//El enlace del correo contendrá el code y el mail
$_SESSION["code"] = $_REQUEST["code"];
$_SESSION["mail"] = $_REQUEST["mail"];
header('Location: /sweethomesw/userregister.html');
?>