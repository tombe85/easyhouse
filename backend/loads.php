<?php
    
    function loadregister($idhome,$iduser){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from registro where idhome = "'.$idhome.'" and usersdeleted not like "%'.$iduser.'%" order by idregistro desc';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $numrows=$result->num_rows;
        for($i=0; $i < $numrows; $i++){
            $row = $result->fetch_array();
            $querym = 'select * from users where iduser = '.$row["iduser"];
            $resultm = $db->query($querym)
                or die($db->error. " en la línea ".(__LINE__-1));
            $user = $resultm->fetch_array();
            $arr[$i]["rutafoto"] = $user["photo"];
            $arr[$i]["idregistro"] = $row["idregistro"];
            $arr[$i]["content"] = $row["content"];
            $arr[$i]["date"] = $row["date"];
            $arr[$i]["idregistro"] = $row["idregistro"];
        }
        $db->close();
        return $arr;
    }

    function loadboard($idhome){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from board where idhome = "'.$idhome.'" order by idboard desc';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $numrows=$result->num_rows;
        for($i=0; $i < $numrows; $i++){
            $row = $result->fetch_array();
            $querym = 'select * from users where iduser = '.$row["iduser"];
            $resultm = $db->query($querym)
                or die($db->error. " en la línea ".(__LINE__-1));
            $user = $resultm->fetch_array();
            $arr[$i]["rutafoto"] = $user["photo"];
            $arr[$i]["idboard"] = $row["idboard"];
            $arr[$i]["message"] = $row["content"];
            $arr[$i]["date"] = $row["date"];
        }
        $db->close();
        return $arr;
    }

    function loaduserboard($idhome, $iduser){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from board where idhome = "'.$idhome.'" and iduser = "'.$iduser.'" order by idboard desc';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $numrows=$result->num_rows;
        for($i=0; $i < $numrows; $i++){
            $row = $result->fetch_array();
            $querym = 'select * from users where iduser = '.$row["iduser"];
            $resultm = $db->query($querym)
                or die($db->error. " en la línea ".(__LINE__-1));
            $user = $resultm->fetch_array();
            $arr[$i]["rutafoto"] = $user["photo"];
            $arr[$i]["idboard"] = $row["idboard"];
            $arr[$i]["message"] = $row["content"];
            $arr[$i]["date"] = $row["date"];
        }
        $db->close();
        return $arr;
    }

    function loadsinglemessage($idhome, $idboard){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from board where idhome = "'.$idhome.'" and idboard = "'.$idboard.'"';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $row = $result->fetch_array();
        
        $querym = 'select * from users where iduser = '.$row["iduser"];
        $resultm = $db->query($querym)
            or die($db->error. " en la línea ".(__LINE__-1));
        $user = $resultm->fetch_array();
        
        $arr["rutafoto"] = $user["photo"];
        $arr["message"] = $row["content"];
        $arr["date"] = $row["date"];
        $arr["data"] = $row["data"];
        $db->close();
        return $arr;
    }

    function loadmessagecomments($idboard){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from boardcomments where idboard = "'.$idboard.'"';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $numrows=$result->num_rows;
        for($i=0; $i < $numrows; $i++){
            $row = $result->fetch_array();
            $querym = 'select * from users where iduser = '.$row["iduser"];
            $resultm = $db->query($querym)
                or die($db->error. " en la línea ".(__LINE__-1));
            $user = $resultm->fetch_array();
            $arr[$i]["rutafoto"] = $user["photo"];
            $arr[$i]["comment"] = $row["comment"];
        }
        $db->close();
        return $arr;
    }

    function loadtasks($idhome){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from tasks where idhome = "'.$idhome.'" and approved = 1';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $numrows=$result->num_rows;
        $j=0;
        for($i=0; $i < $numrows; $i++){
            $row = $result->fetch_array();
            
            if($row["active"] == true){
                $arr[$j]["idtask"] = $row["idtask"];
                $arr[$j]["content"] = $row["name"];
                $activesince = strtotime($row["activesince"]);
                $dias = (time() - $activesince) / (3600 * 24);
                $arr[$j]["dayson"] = floor($dias);
                $j++;
            }else{
                $closedsince = strtotime($row["whenisdone"]);
                $daysclosed = ((time() - $closedsince) / (3600*24));
                if($daysclosed >= $row["period"]){
                    $querym = 'update tasks set active = true, activesince = "'.date("d.m.Y").'" where idtask = "'.$row["idtask"].'"';
                    $resultm = $db->query($querym)
                        or die($db->error. " en la línea ".(__LINE__-1));
                    $arr[$j]["idtask"] = $row["idtask"];
                    $arr[$j]["content"] = $row["name"];
                    $arr[$j]["dayson"] = 0;
                    $j++;
                }
            }
        }
        $db->close();
        return $arr;
    }

    function loadshoppinglist($idhome){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from products where idhome = "'.$idhome.'" and active = true and added = true';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $numrows=$result->num_rows;
        for($i=0; $i < $numrows; $i++){
            $row = $result->fetch_array();
            $arr[$i]["product"] = $row["name"];
        }
        $db->close();
        return $arr;
    }

    function loadshoppingproducts($idhome){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from products where idhome = "'.$idhome.'" and active = true and added = false';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $numrows=$result->num_rows;
        for($i=0; $i < $numrows; $i++){
            $row = $result->fetch_array();
            $arr[$i]["product"] = $row["name"];
        }
        $db->close();
        return $arr;
    }
    
    
    function loadusers($idhome){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from users where idhome = "'.$idhome.'"';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $numrows=$result->num_rows;
        for($i=0; $i < $numrows; $i++){
            $row = $result->fetch_array();
            $arr[$i]["photo"] = $row["photo"];
            $arr[$i]["mail"] = $row["mail"];
            $arr[$i]["iduser"] = $row["iduser"];
            
        }
        $db->close();
        return $arr;
    }

    function loadexpenses($idhome){
        include_once('functions.php');
       $db = connectDataBase();
        

        // Selecciono la lista de usuarios del idhome
        $query =  'select * from users where idhome = "'.$idhome.'"';
        $result2 = $db->query($query)
            or die($db->error." en la línea ".(__LINE__-1));

        // Guardo los nombres de mis usuarios en $users
        $numusers=$result2->num_rows;
        $users = array();
        for($i=0;$i<$numusers;$i++){
            $row = $result2->fetch_array();
            $users[$i] = $row["name"];
        }

        // Selecciono los expenses del idhome
        $query = 'select * from expenses where idhome = "'.$idhome.'"';
        $result = $db->query($query)
            or die($db->error." en la línea ".(__LINE__-1));

        // Creo un array con el nombre del gasto, quien ha pagado o no
        $arr = array();
        $numrows=$result->num_rows;
        for($i=0;$i<$numrows;$i++){
            $row=$result->fetch_array();
            $arr[$i]["name"] = $row["name"];
            for($j=0;$j<$numusers;$j++){
                    $arr[$i]["pagado"][$j] =  (strpos($row["users"],$users[$j]) !== false);
            }
        }
        $db->close();
        return $arr;
    }
?>