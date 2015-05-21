<?php
{
    include_once('../functions.php');
    if(!checklogin()){
        header('Location: /sweethomesw/login.html');
    }
    $idhome = $_COOKIE["idhome"];
    $iduser = $_COOKIE["iduser"];
    
    if(!isset($_REQUEST["strids"]) || $_REQUEST["strids"] == ""){
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
    header('Location: /sweethomesw/home.html');
    
}
?>