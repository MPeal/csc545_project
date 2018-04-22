<?php
include_once('../classes/DbHandler.php');
include_once('../classes/MongoHandler.php');

$action = $_POST['action'];
if(isset($_POST['params'])){
    $params = $_POST['params'];
}else{
    $params = null;
}

if(isset($_POST['isMongo'])){
    $mongoHandler = new MongoHandler();
    $result = $mongoHandler->callFunction($action, $params);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}else{
    $handler = new DbHandler();
    $result = $handler->callFunction($action, $params);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
?>