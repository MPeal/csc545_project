<?php

?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="portal.css">
</head>

<body>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li class="active"><a href="order.php">Order</a></li>
            <li><a href="order_history.php">Order History</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="#">Log Out</a></li>
        </ul>
    </div>

    <div class="row">
        Category:
        <select id="category-select">
            <option disabled selected>Select a Category</option>
        </select>
    </div>
</div>
</body>
</html>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/order.js"></script>