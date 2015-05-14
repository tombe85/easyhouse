<?php
{
	include_once('../backend/functions.php');
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    $idhome=$_COOKIE["idhome"];
    $iduser=$_COOKIE["iduser"];
    include_once('../backend/loads.php');
    $dataArray = loadexpenses($idhome,$iduser);
    $userArray = loadusers($idhome);

    $n = count($userArray) * 58;

	foreach($dataArray as $reg){
		echo '<div id="'.$reg["name"].'" class="expenseMenu">';
		echo '<div class="buttonTransparent ui-btn" onclick="$(&quot;#'.$reg["name"].'&quot;).openclose('.$n.')">';
		echo '<h2>'.$reg["name"].'</h2>';
		echo '</div>';
		echo '<ul>';
		$i=0;
		foreach($userArray as $reg2){
			if ($reg["pagado"][$i] == true){
				$pagado="Pagado";
			}
			else{
				$pagado="Pendiente";
			}
			$i++;
			echo '<li><h4><img class="rowPhoto" src="'.$reg2["photo"].'"/>'.$pagado.'</h4></li>';
		}
		echo '</ul>';
		echo '</div>'; 
	}
}
?>