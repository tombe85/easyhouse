<?php
    function connectDataBase(){
        $db = new mysqli('localhost', 'sweethomeuser', 'sweethomeuser');
        if( $db->connect_errno > 0 ){
            die('Unable to connect to database [' . $db->connect_error . ']');
        }
        mysqli_query($db, "SET NAMES 'utf8'");
        $db->select_db('sweethomesw');
        return $db;
    }
?>