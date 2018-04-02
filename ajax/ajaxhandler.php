<?php
include_once('../classes/DbHandler.php');

$action = $_POST['action'];
if(isset($_POST['params'])){
    $params = $_POST['params'];
}else{
    $params = null;
}

$handler = new DbHandler();
$result = $handler->callFunction($action, $params);

echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>