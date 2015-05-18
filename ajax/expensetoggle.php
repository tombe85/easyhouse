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
    $dataArray = loadexpenses($idhome);
    $userArray = loadusers($idhome);


	foreach($dataArray as $reg){
		if ($reg["name"]==$name){
			$i=0;
			foreach($userArray as $reg2){
				if($i==$id){
					$reg["pagado"][$i]= !$reg["pagado"][$i];
					if ($reg["pagado"][$i] == true){
						$pagado="Pagado";
					}
					else{
						$pagado="Pendiente";
					}
					$i++;
					echo '<li data-name="'.$reg["name"].'" data-id="'.$i.'" onclick="expenseToggle()"><h4><img class="rowPhoto" src="'.$reg2["photo"].'"/>'.$pagado.'</h4></li>';
				}
			}
		}
	}
}
?>