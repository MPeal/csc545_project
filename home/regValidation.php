<?php
require '../home/database.php';
require '../classes/DbHandler.php';
$newConnection=new DbHandler();
$conn=$newConnection->getConnection();
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}



session_start();
$username = $_POST["username"];
$pw = password_hash($_POST["password"], PASSWORD_DEFAULT);
//$conn dependent on our DB host settings
$conn = getConnection();



//$query dependent on table name, column names
$query = "SELECT * FROM customer WHERE username = '$username'";

$res = mysqli_query($conn, $query);



if(mysqli_num_rows($res) != 0){
		$data = array(
		'isValid'=> false,
		'feedback'=> 'Username unavailable.'
		);
		cleanupDBResources($conn,$res);
		echo json_encode($data);
		exit;
}else{



    $value1 = $_POST["fullName"];
    $value2 = $_POST["street"];
    $value3 = $_POST["city"];
    $value4 = $_POST["state"];
    $value5 = $_POST["zip"];


    $sql = "insert into customer ( name, street, city, state, zip, username, password) VALUES 
( '$value1', '$value2','$value3','$value4','$value5', '$username','$pw')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}





?>
