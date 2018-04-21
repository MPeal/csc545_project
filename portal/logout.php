<?php
include_once('../classes/DbHandler.php');
session_start();

$user = $_SESSION['username'];
$handler = new DbHandler();
$conn = $handler->getConnection();
$sql = "UPDATE customer SET isLoggedIn = false WHERE username = ".$user;
$conn->query($sql);

header("Location: ../home/home.php");
?>