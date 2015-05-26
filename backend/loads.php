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
         
         $querym = 'select * from users where iduser = "'.$row["iduser"].'"';
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

    function loadmessagecomments($idboard, $idhome){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from boardcomments where idboard = "'.$idboard.'" and (select idhome from board where idboard = "'.$idboard.'") = "'.$idhome.'"';
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
                $arr[$j]["points"] = $row["points"];
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
                    $arr[$j]["points"] = $row["points"];
                    $j++;
                }
            }
        }
        $db->close();
        return $arr;
    }

    function loadalltasks($idhome){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from tasks where idhome = "'.$idhome.'"';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $numrows=$result->num_rows;
        for($i=0; $i < $numrows; $i++){
            $row = $result->fetch_array();
            $arr[$i]["idtask"] = $row["idtask"];
            $arr[$i]["content"] = $row["name"];
            $arr[$i]["active"] = $row["active"];
        }
        $db->close();
        return $arr;
    }

    function loadallproducts($idhome){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from products where idhome = "'.$idhome.'" order by name';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $numrows=$result->num_rows;
        for($i=0; $i < $numrows; $i++){
            $row = $result->fetch_array();
            $arr[$i]["idproduct"] = $row["idproduct"];
            $arr[$i]["name"] = $row["name"];
        }
        $db->close();
        return $arr;
    }

    function loadshoppinglist($idhome){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from products where idhome = "'.$idhome.'" and active = true and added = true order by name';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $numrows=$result->num_rows;
        for($i=0; $i < $numrows; $i++){
            $row = $result->fetch_array();
            $arr[$i]["product"] = $row["name"];
            $arr[$i]["idproduct"] = $row["idproduct"];

        }
        $db->close();
        return $arr;
    }

    function loadshoppingproducts($idhome, $startby){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from products where idhome = "'.$idhome.'" and active = true and added = false ';
        if($startby != ""){
            $query .= 'and name like "'.$startby.'%" ';
        }
        $query .= 'order by name';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $numrows=$result->num_rows;
        for($i=0; $i < $numrows; $i++){
            $row = $result->fetch_array();
            $arr[$i]["product"] = $row["name"];
            $arr[$i]["idproduct"] = $row["idproduct"];
        }
        $db->close();
        return $arr;
    }

    function loadallexpenses($idhome){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from expenses where idhome = "'.$idhome.'"';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $numrows=$result->num_rows;
        for($i=0; $i < $numrows; $i++){
            $row = $result->fetch_array();
            $arr[$i]["expense"] = $row["name"];
            $arr[$i]["idexpense"] = $row["idexpense"];
        }
        $db->close();
        return $arr;
    }

    function loadranking($idhome){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select photo, iduser, points, name from users where idhome = "'.$idhome.'" order by points desc';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $numrows=$result->num_rows;
        for($i=0; $i < $numrows; $i++){
            $row = $result->fetch_array();
            $arr[$i]["photo"] = $row["photo"];
            $arr[$i]["iduser"] = $row["iduser"];
            $arr[$i]["points"] = $row["points"];
            $arr[$i]["name"] = $row["name"];
            
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

    function loadinvitedusers($idhome){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from invited where idhome = "'.$idhome.'"';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $numrows=$result->num_rows;
        for($i=0; $i < $numrows; $i++){
            $row = $result->fetch_array();
            $arr[$i]["mail"] = $row["mail"];
            $arr[$i]["idinvited"] = $row["idinvited"];            
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
            $users[$i] = $row["iduser"]." ";
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
            $arr[$i]["idexpense"] = $row["idexpense"];
            for($j=0;$j<$numusers;$j++){
                $arr[$i]["pagado"][$j] =  (strpos($row["users"],$users[$j]) !== false);
            }
        }
        $db->close();
        return $arr;
    }

    function loadHomeInfo($idhome){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from homes where idhome = "'.$idhome.'"';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $row = $result->fetch_array();
        $arr["name"] = $row["name"];
        $arr["lord"] = $row["lord"];
        $arr["lordphone"] = $row["lordphone"];
        $arr["lordmail"] = $row["lordmail"];
        $arr["info"] = $row["info"];
        $db->close();
        return $arr;
    }

    function loadHomeMates($idhome){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from users where idhome = "'.$idhome.'"';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $numrows=$result->num_rows;
        for($i=0;$i<$numrows;$i++){
            $row = $result->fetch_array();
            $arr[$i]["name"] = $row["name"];
            $arr[$i]["id"] = $row["iduser"];
            $arr[$i]["mail"] = $row["mail"];
            $arr[$i]["ruta"] = $row["photo"];
        }
        
        $db->close();
        return $arr;
    }

    function loadadminlisttasks($idhome){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from tasksdone where idhome = "'.$idhome.'" order by idtaskdone desc';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1));
        
        $arr = array();
        $numrows=$result->num_rows;
        $j = 0;
        for($i=0;$i<$numrows;$i++){
            $row=$result->fetch_array();
            $idtask = $row["idtask"];
            $iduser = $row["iduser"];
            $date = $row["date"];
            $idtaskdone = $row["idtaskdone"];
            
            $doneat = strtotime($date);
            $dias = (time() - $doneat) / (3600 * 24);
            if($dias < 7){
                $arr[$j]["photo"] = userphotourl($iduser);
                
                $query2='select * from tasks where idtask = "'.$idtask.'"';
                $result2 = $db->query($query2)
                    or die($db->error. " en la línea ".(__LINE__-1));
                $row2 = $result2->fetch_array();
                $arr[$j]["task"] = $row2["name"];
                $arr[$j]["date"] = $date;
                $arr[$j]["idtask"] = $idtask;
                $arr[$j]["iduser"] = $iduser;
                $arr[$j]["idtaskdone"] = $idtaskdone;
                $j++;
            }
        }
        $db->close();
        return $arr;
    }
?>
