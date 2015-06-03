<?php
{
    // Comprobamos login
    include_once('../backend/functions.php');
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    
    // Tomamos datos de las cookies
    include_once('../backend/loads.php');
    $idhome = $_COOKIE["idhome"];
    
    // cargamos los registros en el array
    $arr = loadHomeInfo($idhome);
    
    // Generamos html
    echo '<div id="userData">
                <img id="userAvatar" src="/sweethomesw/img/logotipo_home_empty.png" />
                <h2 id="userName" onclick="changeHouseName()">';
    echo $arr["name"];
    echo '</h2>
            </div>
            <div id="infoHouse">
                <h2>Propietario</h2>
                <ul id="infoList">
                    <li id="propietario" onclick="changeLordName()">Propietario: '.$arr["lord"].'</li>
                    <li id="telefono" onclick="changeLordPhone()">Teléfono: '.$arr["lordphone"].'</li>
                    <li id="correo" onclick="changeLordMail()">Email: '.$arr["lordmail"].'</li>
                    <li id="extrainfo" onclick="changeHomeInfo()">Otro: '.$arr["info"].'</li>
                </ul>
            </div>';
    
}
?>