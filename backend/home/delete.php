<?php
{
    /*
    *   Este php será accedido mediante un enlace. Modificará la base de datos y enlazará a la página correspondiente.
    */
    include_once('../functions.php');
    if(!checkLogin()){
        header('Location: /sweethomesw/login.html');
    }
    $idhome = $_COOKIE["idhome"];
    $iduser = $_COOKIE["iduser"];
    
    if(!isset($_REQUEST["strids"]) || $_REQUEST["strids"] == "" || strpos($_REQUEST["strids"],"<") != false){
        header('Location: /sweethomesw/home.html');
    }
    $text = $_REQUEST["strids"];
    $idsreg = array();
    $idsreg = split(",", $text);
    
    $db = connectDataBase();
    foreach($idsreg as $idregistro){
        $query='select * from registro where idregistro = "'.$idregistro.'"';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        $row = $result->fetch_array();
        $usersdeleted = $row["usersdeleted"];
        $usersdeleted = $usersdeleted . " " . $iduser;
        
        $query='update registro set usersdeleted = "'.$usersdeleted.'" where idregistro = "'.$idregistro.'"';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
    }
    $db->close();
    updateCookies();
    header('Location: /sweethomesw/home.html');
    
}
?>