<?php
{
    include_once('../backend/functions.php');
    if(checkLogin()){
        $iduser = $_COOKIE["iduser"];
        $rutafoto = userphotourl($iduser);
    }else{
        unset($iduser);
    }
    
    echo '<table class = "tableHeader">
            <tr>';
    echo '      <td id="backHeader">';
    if(isset($iduser) && isset($_REQUEST["backbutton"]) && $_REQUEST["backbutton"] == "true"){
        echo '<a href="'.$_REQUEST["backurl"].'" data-ajax="false"><img id="backbutton" class="menubutton" src="/sweethomesw/img/back.png" /></a>';
    }
    echo '      </td>
                <td id="logoHeader"><h1>sweetHome<span class="elevated">SW</span></h1></td>';
    echo '      <td id="fotoHeader">';
    if(isset($iduser)){
        if(isset($_REQUEST["info"]) && $_REQUEST["info"] == "true"){
            echo '<a href="/sweethomesw/about.html" data-ajax="false"><img class="menubutton" id="none" src="/sweethomesw/img/info.png" /></a>';
        }else{
            echo '<a href="/sweethomesw/config/main.html" data-ajax="false"><img id="fotousuario" src="'.$rutafoto.'" /></a>';
        }
    }
    echo '      </td>';
    echo '  </tr>
          </table>';
}
?>