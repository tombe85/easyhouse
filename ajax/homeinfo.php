<?php
{
    include_once('../backend/loads.php');
    $idhome = $_COOKIE["idhome"];
    
    $arr = loadHomeInfo($idhome);
    echo '<div id="userData">
                <img id="userAvatar" src="/sweethomesw/img/logotipo_home_empty.png" />
                <h2 id="userName" onclick="changeHouseName()">';
    echo $arr["name"];
    echo '</h2>
            </div>
            <div id="infoHouse">
                <h2>Información de contacto</h2>
                <ul id="infoList">
                    <li onclick="changeLordName()">Arrendador: '.$arr["lord"].'</li>
                    <li onclick="changeLordPhone()">Teléfono: '.$arr["lordphone"].'</li>
                    <li onclick="changeLordMail()">Email: '.$arr["lordmail"].'</li>
                    <li onclick="changeHomeInfo()">Otros: '.$arr["info"].'</li>
                </ul>
            </div>';
    
}
?>