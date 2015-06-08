<?php
{
    include_once("../functions.php");
    
    if($_REQUEST["usuario"] == "" || $_REQUEST["usuario"] == null || strpos($_REQUEST["usuario"],"<") != false){
        header('Location: /sweethomesw/resetpasswd.html?err=true');
        exit();
    }
    
    $mail = $_REQUEST["usuario"];
    
    $db = connectDataBase();
    $query = 'select * from users where mail like "'.$mail.'"';
    $result = $db->query($query);
    if($result && $result->num_rows == 1){
        $headers = getmailheaders();
        $pass = generateAleatoryCode();
        $msg = resetpasswdmail($pass);
        $row = $result->fetch_array();
        $salt = $row["sal"];
        $newpasswd = sha1($pass . $salt);
        $query = 'update users set passwd = "'.$newpasswd.'" where iduser = "'.$row["iduser"].'"';
        if($db->query($query)){
            mail($mail,"Reinicio de password en easyHouse", "$msg", "$headers");
        }else{
            header('Location: /sweethomesw/resetpasswd.html?err=true'); 
        }
    }else{
        header('Location: /sweethomesw/resetpasswd.html?err=true');
        exit();
    }
    
    header('Location: /sweethomesw/login.html?mess=4');
    exit();
}
?>