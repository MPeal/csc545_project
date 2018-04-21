<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="home.css" type="text/css"/>
    <title>LAD Shipping</title>

</head>
<body>




<div class="container">
    <div class="row" style="margin-top: 150px;">
        <div class="col-md-12 text-center">
            <h3>LAD Shipping</h3>



</div>
        </div>
        <div id="login_form_wrapper">
            <div class="row text-center">
                <form action="loginValidation.php" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            Username: <input id="login_username" type='text' name='username'>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            Password:   <input id="login_pword" type='password' name='password'>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <input id="login_button" class="btn btn-success" type='button' value="Log In" name='submit'>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div id="feedback_display" class="row text-center">
        </div>
            <div class="row text-center">
                <div class="col-md-12" id="signUp">
                    Need an Account? Register <a href="signup.php">here!</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="home.js"></script>
