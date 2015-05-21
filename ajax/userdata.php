<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    $iduser = $_COOKIE["iduser"];
    
    $db = connectDataBase();
    $query='select * from users where iduser = "'.$iduser.'"';
    $result = $db->query($query)
        or die($db->error. " en la línea ".(__LINE__-1));
    $row = $result->fetch_array();
    $db->close();
    echo '<img id="userAvatar" src="'.$row["photo"].'" onclick="changeAvatar()" />';
    echo '<h2 id="userName" onclick="changeName()">'.$row["name"].'</h2>';
}
?>