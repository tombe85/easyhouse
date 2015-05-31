<?php
{
    include_once('../functions.php');
    
    //Datos de sesión
    if(!checkLogin()){
        echo "0";
        exit();
        //header('Location: /sweethomesw/login.html');
    }
    $idhome = $_COOKIE["idhome"];
    $iduser = $_COOKIE["iduser"];
    
    //Datos por post
    if(!isset($_REQUEST["texto"]) || !isset($_REQUEST["idboard"])){
        echo "0";
        exit();
        //header('Location: /sweethomesw/board/viewmessage.html');
    }
    $text = $_REQUEST["texto"];
    $idboard = $_REQUEST["idboard"];
    
    //Añadir al mensaje
    $db = connectDataBase();
    $query = 'insert into boardcomments (idboard,iduser,comment,date) values ('.$idboard.','.$iduser.',"'.$text.'","'.date("d.m.Y").'")';
    $result = $db->query($query)
        or die($db->error. " en la línea ".(__LINE__-1));
    $query = 'update board set lastcommenttime = now() where idboard = "'.$idboard.'"';
    $result = $db->query($query)
        or die($db->error. " en la línea ".(__LINE__-1));
    $db->close();
    echo '<table>';
    echo '<tr class="rowBordered">';
    echo '<td class="rowPhotoSmall">';
    echo '    <img src="'.userphotourl($iduser).'" />';
    echo '</td>';
    echo '<td class="rowText">';
    echo '    <h3>'.$text.'</h3>';
    echo '</td>';
    echo '</tr>';
    echo '</table>';
    //updateCookies();
    //header('Location: /sweethomesw/board/viewmessage.html?id='.$idboard.'&bottom=true');
}
?>