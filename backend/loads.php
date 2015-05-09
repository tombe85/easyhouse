<?php
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
?>