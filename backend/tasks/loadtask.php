<?php
{
    $taskid = $_REQUEST["id"];
    $content = $_REQUEST["cont"];
    $dayson = $_REQUEST["day"];
    $points = $_REQUEST["points"];
    
    include_once('../functions.php');
    printTaskButton($content, $dayson, $taskid, $points);
}
?>