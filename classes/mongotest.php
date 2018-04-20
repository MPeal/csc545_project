<?php
include_once('../classes/MongoHandler.php');

$mongo = new MongoHandler();
$conn = $mongo->conn;
$db = $conn->csc545mongo;

$db->dropCollection('testCollection');