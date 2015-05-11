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

    function checklogin(){
        if(!isset($_COOKIE["login"]) || $_COOKIE["login"] == false){
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

    function printTaskButton($content, $dayson, $taskid){
        echo '  <button class="buttonTransparent ui-btn ui-shadow ui-corner-all">';
        echo '  <h3>'.$content.' ('.$dayson.' día';
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
                        $(taskselected).css("padding","0px");
                        $(taskselected).load("/sweethomesw/tasks/confirm.html");
                    });
                </script>';
    }
?>