<?php
{
    $taskid = $_REQUEST["id"];
    $content = $_REQUEST["cont"];
    $dayson = $_REQUEST["day"];
    
    include_once('../functions.php');
    printTaskButton($content, $dayson, $taskid);
}
?>