<?php
{
	include_once('../backend/functions.php');
    
    // Comprobamos login
    if(!checkLogin()){
        echo '<h4>No has iniciado sesión. Accede al <a href="/sweethomesw/login.html" data-ajax="false">login</a></h4>';
        exit();
    }
    
    // Tomamos datos de cookies, post o get
    $idhome=$_COOKIE["idhome"];
    $iduser=$_COOKIE["iduser"];
    
    // cargamos en array los datos que consultamos a los phps del backend
    include_once('../backend/loads.php');
    $dataArray = loadexpenses($idhome);
    $userArray = loadusers($idhome);

    $tam = count($userArray) * 58;
    
    // Generamos el HTML
	foreach($dataArray as $reg){
		echo '<div id="'.$reg["name"].'" class="expenseMenu">';
		echo '<div class="buttonTransparent ui-btn" onclick="$(&quot;#'.$reg["name"].'&quot;).openclose('.$tam.')">';
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
			echo '<li><div  onclick="expenseToggle('.$reg2["iduser"].','.$reg["idexpense"].',expense'.$reg["idexpense"] . $reg2["iduser"].')"><h4><img class="rowPhoto" src="'.$reg2["photo"].'" /><span id="expense'.$reg["idexpense"] . $reg2["iduser"].'">'.$pagado.'</span></h4></div></li>';
		}
		echo '</ul>';
		echo '</div>'; 
	}
}
?>