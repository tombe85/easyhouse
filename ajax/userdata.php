<?php
{
    include_once('../backend/functions.php');
    if(!checklogin()){
        header('Location: /sweethomesw/login.html');
    }
    $iduser = $_COOKIE["iduser"];
    
    $db = connectDataBase();
    $query='select * from users where iduser = "'.$iduser.'"';
    $result = $db->query($query)
        or die($db->error. " en la línea ".(__LINE__-1));
    $row = $result->fetch_array();
    $db->close();
    echo '<img src="'.$row["photo"].'" />';
    echo '<h2>'.$row["name"].'</h2>';
}
?>