<?php
{
    /*
    *   Este php es un generador de HTML que se encuentra en el backend por ser llamado asíncronamente vía AJAX cuando
    *   la página ya ha sido cargada.
    */
    $taskid = $_REQUEST["id"];
    $content = $_REQUEST["cont"];
    $dayson = $_REQUEST["day"];
    $points = $_REQUEST["points"];
    
    include_once('../functions.php');
    printTaskButton($content, $dayson, $taskid, $points);
}
?>