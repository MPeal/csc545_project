<?php
session_start();

?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="portal.css">
    <script type="text/javascript" src="../libraries/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="portal.js"></script>
</head>



<body>
<div class="row" id="logo_id">
    <div class="col-md-12 text-center">
        <img src="../documents/Images/lad_shipping_logo.png";>



    </div>
</div>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li><a href="order.php"><span class="glyphicon glyphicon-tags"></span> Order</a></li>
            <li><a href="order_history.php"><span class="glyphicon glyphicon-list-alt"></span> Order History</a></li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
        </ul>
    </div>
    <div class="row" id="welcome-row">
        <h1>Welcome.</h1>
    </div>
    <div class="row" id="info-div">
        <h3>Click one of the options above.</h3>
    </div>
</div>
</body>
</html>