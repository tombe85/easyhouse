<?php
{
    /*
    *   Este php será accedido mediante un enlace.
    *   Modificará la base de datos y nos enlazará a la página correspondiente al finalizar
    */
    include_once('../functions.php');
    
    //Datos de sesión
    if(!checkLogin()){
        header('Location: /sweethomesw/login.html');
    }
    $idhome = $_COOKIE["idhome"];
    $iduser = $_COOKIE["iduser"];
    
    //Datos por post
    if(!isset($_REQUEST["titulo"]) || !isset($_REQUEST["mensaje"])){
        header('Location: /sweethomesw/board/index.html');
    }
    $title = $_REQUEST["titulo"];
    $message = $_REQUEST["mensaje"];
    
    //Añadir al tablón
    $db = connectDataBase();
    $query = 'insert into board (iduser,content,idhome,date,data) values ('.$iduser.',"'.$title.'",'.$idhome.',"'.date("d.m.Y").'","'.$message.'")';
    $result = $db->query($query)
        or die($db->error. " en la línea ".(__LINE__-1));
    
    //Añadir al registro
    $cont = "Nuevo mensaje en el tablón: " . $title;
    $query = 'insert into registro (iduser,content,idhome,date) values ('.$iduser.',"'.$cont.'",'.$idhome.',"'.date("d.m.Y").'")';
    $result = $db->query($query)
        or die($db->error. " en la línea ".(__LINE__-1));
    
    //Enviamos mail
    $headers = getmailheaders();
    $msg = addmessagemail($title);
    $query = 'select * from users where idhome = "'.$idhome.'"';
    if($result = $db->query($query)){
        $numrow = $result->num_rows;
        for($i=0; $i<$numrow; $i++){
            $row = $result->fetch_array();
            mail($row["mail"],"Nuevo mensaje en easyHouse", "$msg", "$headers");
        }
    }
    
    updateCookies();
    header('Location: /sweethomesw/board/index.html');
}
?>