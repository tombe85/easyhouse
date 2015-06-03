<?php
{
    /*
    *   Este php será accedido mediante un enlace. Modifica la base de datos y enlaza a la página correspondiente
    */
    include_once('../functions.php');
    if(!checkLogin() || !checkAdmin() || !isset($_REQUEST["texto"]) || $_REQUEST["texto"] == "" || strpos($_REQUEST["texto"],"<") != false){
        header('Location: /sweethomesw/admin/config/users.html');
    }
    $db = connectDataBase();
    
    $mail = $_REQUEST["texto"];
    $idhome = $_COOKIE["idhome"];
    
    $codegenerated = false;
    while(!$codegenerated){
        $code = generateAleatoryCode();
        $query = 'select * from invited where code like "'.$code.'"';
        $result = $db->query($query)
            or die($db->error);
        if($result->num_rows == 0){
            $codegenerated = true;
        }
    }
    
    //Vemos que no esté invitados ya
    $query = 'select * from invited where mail = "'.$mail.'"';
    $result = $db->query($query)
        or die($db->error);
    if($result->num_rows > 0){
        header('Location: /sweethomesw/admin/config/users.html');
        exit();
    }
    $query = 'select * from users where idhome = "'.$idhome.'" and mail like "'.$mail.'"';
    $result = $db->query($query)
        or die($db->error);
    if($result->num_rows > 0){
        header('Location: /sweethomesw/admin/config/users.html');
        exit();
    }
    
    //Agregamos a invitados
    $query = 'insert into invited (mail,code,idhome) values ("'.$mail.'","'.$code.'","'.$idhome.'")';
    $db->query($query)
        or die($db->error);
    
    //Sacar info de casa
    $query = 'select * from homes where idhome = "'.$idhome.'"';
    if(!($result = $db->query($query))){
        $nombre = "el administrador";
        $casa = "sin nombre";
    }else{
        $row = $result->fetch_array();
        $nombre = $row["adminmail"];
        $casa = $row["name"];
    }
    
    //Enviamos mail
    $msg = inviteusermail($nombre,$casa,$code);
    $headers = getmailheaders();
    mail("$mail", "Has sido invitado a una casa en Sweethome", "$msg", "$headers");
    
    updateCookies();
    //Nos vamos a gestion de usuarios
    header('Location: /sweethomesw/admin/config/users.html');
    
}
?>