<?php
require '../classes/DbHandler.php';
$newConnection=new DbHandler();
$conn=$newConnection->getConnection();
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}


?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="home.css" type="text/css" />
    <title>Sign Up</title>


</head>



<body>
    
    <div class="container">
        <div class="row" style="margin-top: 150px;">
            <div class="col-md-12 text-center">
                <h1>Sign Up</h1>
            </div>
        </div>
        <div id="login_form_wrapper">
            <div class="row text-center">
                <form action="regValidation.php" method="POST">
                    <div class="row">
                        <div class="col-xs-1">
                            Name:
						</div>
						<div class="col-xs-11">
                            <input id="registerName" type='text' name='fullName'>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-xs-1">
                            Street:
                        </div>
                        <div class="col-xs-11">
                            <input id="registerStreet" type='text' name='street'>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-xs-1">
                            City:
                        </div>
                        <div class="col-xs-11">
                            <input id="registerCity" type='text' name='city'>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-xs-1">
                            State:
                        </div>
                        <div class="col-xs-11">
                            <input id="registerState" type='text' name='state'>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-xs-1">
                            Zip:
                        </div>
                        <div class="col-xs-11">
                            <input id="registerZip" type='number' name='zip'>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-xs-1">
                            Username:
                        </div>
                        <div class="col-xs-11">
                            <input id="login_username" type='text' name='username'>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-xs-1">
                            Password: 
						</div>
						<div class="col-xs-11">
                            <input id="login_pword" type='password' name='password'>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-1">
                            Confirm Password:
						</div>
						<div class="col-xs-11">
                            <input id="login_pword" type='password' name='password_confirm'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-top: 10px">
                            <input id="login_button" type="button" class="btn btn-default" value="Sign Up" name='submit'> <!--  type='submit' -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="signup.js"></script>

