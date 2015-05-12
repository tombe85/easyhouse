<?php
    
    function loadregister($idhome,$iduser){
        include_once('functions.php');
        $db = connectDataBase();
        $query='select * from registro where idhome = "'.$idhome.'" and usersdeleted not like "%'.$iduser.'%"';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1)." idhome=".$idhome);
        
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
        $query='select * from board where idhome = "'.$idhome.'"';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1)." idhome=".$idhome);
        
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
            or die($db->error. " en la línea ".(__LINE__-1)." idhome=".$idhome);
        
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
            or die($db->error. " en la línea ".(__LINE__-1)." idhome=".$idhome);
        
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
            or die($db->error. " en la línea ".(__LINE__-1)." idhome=".$idhome);
        
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
                        or die($db->error. " en la línea ".(__LINE__-1)." idhome=".$idhome);
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
            or die($db->error. " en la línea ".(__LINE__-1)." idhome=".$idhome);
        
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
            or die($db->error. " en la línea ".(__LINE__-1)." idhome=".$idhome);
        
        $arr = array();
        $numrows=$result->num_rows;
        for($i=0; $i < $numrows; $i++){
            $row = $result->fetch_array();
            $arr[$i]["product"] = $row["name"];
        }
        $db->close();
        return $arr;
    }
?>