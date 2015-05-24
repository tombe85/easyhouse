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

    function checkLogin(){
        if(!isset($_COOKIE["login"]) || $_COOKIE["login"] == false){
            return false;
        }else{
            return true;
        }
    }

    function checkAdmin(){
        if(!isset($_COOKIE["admin"]) || $_COOKIE["admin"] == false){
            return false;
        }else{
            return true;
        }
    }

    function setCookies($login,$admin,$idhome,$iduser){
        setcookie("login", $login, time() + (3600*24), "/sweethomesw/");
        setcookie("admin", $admin, time() + (3600*24), "/sweethomesw/");
        setcookie("idhome", $idhome, time() + (3600*24), "/sweethomesw/");
        setcookie("iduser", $iduser, time() + (3600*24), "/sweethomesw/");
    }

    function updateCookies(){
        if(checkLogin()){
            $login = $_COOKIE["login"];
            $admin = $_COOKIE["admin"];
            $idhome = $_COOKIE["idhome"];
            $iduser = $_COOKIE["iduser"];
            setcookie("login", $login, time() + (3600*24), "/sweethomesw/");
            setcookie("admin", $admin, time() + (3600*24), "/sweethomesw/");
            setcookie("idhome", $idhome, time() + (3600*24), "/sweethomesw/");
            setcookie("iduser", $iduser, time() + (3600*24), "/sweethomesw/");
        }
    }

    function printTaskButton($content, $dayson, $taskid, $points){
        echo '  <button class="buttonTransparent ui-btn ui-shadow ui-corner-all">';
        echo '  <h3>'.$content.' - '.$points.' pts ('.$dayson.' día';
            if($dayson > 1 || $dayson == 0){echo 's';}
        echo ')</h3>';
        echo '  </button>';
        echo '  <script>
                    $("#'.$taskid.'").find("button").click(function(){
                        if(taskselected != null){cierraSelected();}
                        taskselected = "#'.$taskid.'";
                        taskid = "'.$taskid.'";
                        taskcontent = "'.$content.'";
                        taskdayson = '.$dayson.';
                        taskpoints = '.$points.';
                        $(taskselected).css("padding","0px");
                        $(taskselected).load("/sweethomesw/tasks/confirm.html");
                    });
                </script>';
    }
    
    function userphotourl($iduser){
        $db = connectDataBase();
        $query='select * from users where iduser = "'.$iduser.'"';
        $result = $db->query($query)
            or die($db->error. " en la línea ".(__LINE__-1)." idhome=".$idhome);
        if($result->num_rows > 0){
            $row = $result->fetch_array();
            $db->close();
            return $row["photo"];
        }else{
            return null;
        }
    }

    function printAleatoryMonster(){
        $num = rand(1, 9);
        echo '<img src="/sweethomesw/img/avatares/monster/'.$num.'.png" />';
    }

    function addmessagemail($newmes){
        $mess = '<html><body>';
        $mess .= '<img src="http://www.easyhouse.me/img/logotipo.png" /><br><br>';
        $mess .= '<h3>Hay un nuevo mensaje en tu casa!</h3><br><br><h2>'.$newmes.'</h2>.<br><br> <h3>Accede a easyHouse para verlo y añade un comentario!</h3><br><br>';
        $mess .= '<h3><a href="http://www.easyhouse.me/board/index.html">www.easyhouse.me</a></h3>';
        $mess .= '</body></html>';
        return $mess;
    }

    function getmailheaders(){
        $headers = "From: noreply@easyhouse.me\r\n";
        $headers .= "Reply-To: noreply@easyhouse.me\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        return $headers;
    }

    function inviteusermail($nombre,$casa,$code){
        $mess = '<html><body>';
        $mess .= '<img src="http://www.easyhouse.me/img/logotipo.png" /><br><br>';
        $mess .= '<h3>Has sido invitado por '.$nombre.' a la casa - '.$casa.' - en easyHouse!.</h3><br><br><h3>Para registrarte como usuario accede a <a href="http://www.easyhouse.me/backend/userreg/registroinvitado.php?code='.$code.'">www.easyhouse.me</a> y empieza a disfrutar de las ventajas de pertenecer a easyHouse.</h3><br><br><h3>Para registrarte haz click <a href="http://www.easyhouse.me/backend/userreg/registroinvitado.php?code='.$code.'">aquí</a></h3><br>';
        $mess .= '</body></html>';
        return $mess;
    }
?>