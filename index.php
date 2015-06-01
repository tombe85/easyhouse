<?php

include_once('backend/functions.php');
if(checkLogin()){
    updateCookies();
    header('Location: /sweethomesw/home.html');
}else{
    header('Location: /sweethomesw/login.html');
}
?>