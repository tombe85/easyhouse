<?php
{
    echo "hola";
    include_once('../functions.php');
    if(!checklogin()){
        header('Location: /sweethomesw/login.html');
    }
    $idhome = $_COOKIE["idhome"];
    $iduser = $_COOKIE["iduser"];
    
    if(!isset($_REQUEST["strids"]) || $_REQUEST["strids"] == ""){
        echo "Variables corruptas";
        exit();
    }
    $text = $_REQUEST["strids"];
    $idsreg = split(" ", $text);
    echo 'Hace el decode';
    
    $db = connectDataBase();
    foreach($idsreg as $idregistro){
        echo 'entra en el for';
        $query='select * from registro where idregistro = "'.$idregistro.'"';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1).);
        $row = $result->fetch_array();
        $usersdeleted = $row["usersdeleted"];
        $usersdeleted = $usersdeleted . " " . $iduser;
        
        $query='update registro set usersdeleted = "'.$usersdeleted.'" where idregistro = "'.$idregistro.'"';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1)." idhome=".$idhome);
    }
    $db->close();
    //header('Location: /sweethomesw/home.html');
}
?>