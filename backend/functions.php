<?php
function connectDataBase(){
    // 1.- Conectar
    $db = new mysqli('localhost', 'sweethomeuser', 'sweethomeuser');
    if( $db->connect_errno > 0 ){
        die('Unable to connect to database [' . $db->connect_error . ']');
    }
    mysqli_query($db, "SET NAMES 'utf8'");
    // 2.- Elegir la base de datos
    $db->select_db('sweethomesw');

    return $db;
}
?>