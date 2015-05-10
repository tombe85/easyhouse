<?php
{
    setcookie("login",false, time() + (3600*24), "/sweethomesw/");
    setcookie("admin",false, time() + (3600*24), "/sweethomesw/");
    setcookie("idhome",false, time() + (3600*24), "/sweethomesw/");
    setcookie("iduser",false, time() + (3600*24), "/sweethomesw/");
    header('Location: /sweethomesw/login.html');
}
?>