<?php
{
    include_once('../functions.php');
    if(!checkLogin()){
        //Con 0 indicamos que ha habido un error
        echo '0';
        exit();
    }
    if(!checkAdmin()){
        echo "0";
        exit();
    }
    if(!isset($_REQUEST["user"]) || !isset($_REQUEST["expense"])){
        echo "0";
        exit();
    }
    $iduser = $_REQUEST["user"];
    $idexpense = $_REQUEST["expense"];
    
    
    $db = connectDataBase();
    $idhome = $_COOKIE["idhome"];
    //Añade el gasto                             
    $query = 'select * from expenses where idexpense = "'.$idexpense.'"';
    if($result = $db->query($query)){
        $row = $result->fetch_array();
        $idsusuarios = split(" ", trim($row["users"]));
        if(in_array($iduser, $idsusuarios)){
            $cadena = str_replace($iduser." ","",$row["users"]);
            $query = 'update expenses set users = "'.$cadena.'" where idexpense = "'.$idexpense.'"';
            if($db->query($query)){
                echo "Pendiente";
            }else{
                echo "0";
            }
        }else{
            $cadena = $row["users"].$iduser . " ";
            $query = 'update expenses set users = "'.$cadena.'" where idexpense = "'.$idexpense.'"';
            if($db->query($query)){
                echo "Pagado";
            }else{
                echo "0";
            }
        }
    }else{
        echo "0";
    }
    $db->close();
}
?>