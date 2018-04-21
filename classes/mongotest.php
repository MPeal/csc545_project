<?php
include_once('../classes/MongoHandler.php');

$mongo = new MongoHandler();
$conn = $mongo->conn;
$db = $conn->csc545mongo;

$user = 'mpeal';
$cart = '{"items":[{"itemId":"9","name":"wooden baseball bat","category":"1","price":"35.00","quantity":"2"},{"itemId":"14","name":"batting helmet","category":"1","price":"40.00","quantity":"2"},{"itemId":"15","name":"ice skates","category":"4","price":"99.00","quantity":"1"}],"total":249}';
$cart = json_decode($cart, JSON_UNESCAPED_UNICODE);
try{
    $testCollection = 'testCollection';
    $collection = null;

    //$db->createCollection($user);
    //$db->createCollection('testCollection');
    //$db->dropCollection($user);

    /**
     * get collection names, loop thru collections to search for 'testCollection'
     */
    $collections = $db->getCollectionNames();
    $coll = null;
    foreach($collections as $c){
        $coll = $c === 'testCollection' ? $c : null;
    }

    /**
     * if collection exists, set that as $collection
     * if not, create it, then set it as $collection
     */
    if(!is_null($coll)){
        $collection = $db->selectCollection($coll);
    }else{
        $db->createCollection($testCollection);
        $collection = $db->selectCollection($testCollection);
    }
    var_dump($collection);

    $collection->insert($cart);
} catch(Exception $e){
    echo $e;
}