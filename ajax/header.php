<?php
{
    include_once('../backend/functions.php');
    
    // Comprobamos login
    if(checkLogin()){
        $iduser = $_COOKIE["iduser"];
        $rutafoto = userphotourl($iduser);
    }else{
        unset($iduser);
    }
    
    // Imprimimos header según los parámetros pasados por GET
    echo '<table class = "tableHeader">
            <tr>';
    echo '      <td id="backHeader">';
    if(isset($iduser) && isset($_REQUEST["backbutton"]) && $_REQUEST["backbutton"] == "true"){
        echo '<a href="'.$_REQUEST["backurl"].'" data-ajax="false"><img id="backbutton" class="menubutton" src="/sweethomesw/img/back.png" /></a>';
    }elseif(isset($iduser) && isset($_REQUEST["myhome"]) && $_REQUEST["myhome"] == true){
        echo '<a href="/sweethomesw/myhome.html" data-ajax="false"><img id="backbutton" class="menubutton" src="/sweethomesw/img/my_home_white.png" /></a>';
    }
    echo '      </td>
                <td id="logoHeader"><h1>easyHouse<span class="elevated">SW</span></h1></td>';
    echo '      <td id="photoHeader">';
    if(isset($iduser)){
        if(isset($_REQUEST["info"]) && $_REQUEST["info"] == "true"){
            echo '<a href="/sweethomesw/about.html" data-ajax="false"><img class="menubutton" id="none" src="/sweethomesw/img/info.png" /></a>';
        }elseif(isset($_REQUEST["task"]) && $_REQUEST["task"] == "true"){
            echo '<a href="/sweethomesw/config/tasks.html" data-ajax="false"><img class="menubutton" id="none" src="/sweethomesw/img/tareaconfig.png" /></a>';
        }elseif(isset($_REQUEST["product"]) && $_REQUEST["product"] == "true"){
            echo '<a href="/sweethomesw/config/products.html" data-ajax="false"><img class="menubutton" id="none" src="/sweethomesw/img/compraraction.png" /></a>';
        }elseif(isset($_REQUEST["expense"]) && $_REQUEST["expense"] == "true"){
            echo '<a href="/sweethomesw/admin/config/expenses.html" data-ajax="false"><img class="menubutton" id="none" src="/sweethomesw/img/expenses_config.png" /></a>';
        }
        else{
            echo '<a href="/sweethomesw/config/index.html" data-ajax="false"><img id="userPhoto" src="'.$rutafoto.'" /></a>';
        }
    }
    echo '      </td>';
    echo '  </tr>
          </table>';
}
?>