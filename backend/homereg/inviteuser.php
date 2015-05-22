<?php
{
    include_once('../functions.php');
    if(!checkLogin() || !checkAdmin() || !isset($_REQUEST["texto"])){
        header('Location: /sweethomesw/admin/config/users.html');
    }
    $db = connectDataBase();
    
    $mail = $_REQUEST["texto"];
    $idhome = $_COOKIE["idhome"];
    $caracteres = "abcdefghijklmnopqrstuvwxyz1234567890";
    $codegenerated = false;
    
    while(!$codegenerated){
        $code = "";
        for($i=0; $i<20; $i++)
        {
            $code = $code . substr($caracteres,rand(0,strlen($caracteres)),1);
        }
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
    
    //Enviamos mail
    $msg = 'Has sido invitado a la casa de sweethome!. Para registrarte como usuario accede a http://www.easyhouse.me/backend/userreg/registroinvitado.php?code='.$code.' y empieza a disfrutar de SweetHome';
    $headers = 'From: noreply@easyhouse.me' . " " . 'Reply-To: noreply@easyhouse.me' . " " . 'X-Mailer: PHP/' . phpversion();
    mail("$mail", "Has sido invitado a una casa en Sweethome", "$msg", "$headers");
    
    updateCookies();
    //Nos vamos a gestion de usuarios
    header('Location: /sweethomesw/admin/config/users.html');
    
}
?>