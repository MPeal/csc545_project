<?php
include_once('../classes/MongoHandler.php');

$mongo = new MongoHandler();
$conn = $mongo->conn;
$db = $conn->csc545mongo;

$user = 'mpeal';
$cart = '{"items":[{"itemId":"9","name":"wooden baseball bat","category":"1","price":"35.00","quantity":"2"},{"itemId":"14","name":"batting helmet","category":"1","price":"40.00","quantity":"2"},{"itemId":"15","name":"ice skates","category":"4","price":"99.00","quantity":"1"}],"total":249}';
$cart = json_decode($cart, JSON_UNESCAPED_UNICODE);
try{
    $coll = $db->selectCollection($user);
    $result = $coll->findOne(array("_id" => new MongoId('5adbc8d5ac5ce07823000029')));
    var_dump($result);
} catch(Exception $e){
    echo $e;
}