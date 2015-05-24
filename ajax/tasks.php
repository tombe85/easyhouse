<?php
{
    include_once('../backend/functions.php');
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    
    include_once('../backend/loads.php');
    $idhome = $_COOKIE["idhome"];
    $arr = loadtasks($idhome);
    
    if(count($arr) > 0){
        $preid="task";
        foreach($arr as $reg){
            $taskid= $preid . $reg["idtask"];
            $content = $reg["content"];
            $dayson = $reg["dayson"];
            $points = $reg["points"];

            echo '<div id="'.$taskid.'" class="rowBordered">';
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
            echo '</div>';
        }
    }else{
        echo '<div id="emptyHomeImg">';
        include_once('../backend/functions.php');
        printAleatoryMonster();
        echo '</div>';
    }
}
?>