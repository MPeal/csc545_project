<?php
session_start();
?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="portal.css">
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li><a href="order.php">Order</a></li>
            <li><a href="order_history.php">Order History</a></li>
            <li class="active"><a href="cart.php">Cart</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>
    <div id="items-info-container">
        <div id="items-info-header-row" class="row">
            <div class="col-md-3">
                Item Name
            </div>
            <div class="col-md-3">
                Price
            </div>
            <div class="col-md-3">
                Quantity
            </div>
        </div>
    </div>
    <div id="cart-items-container">
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-6">
                <span>
                    Order Total
                </span>
            <input id="order-total-box" type="text" value="" disabled>
        </div>
    </div>
    <div class="row" id="order-bottom-btns-row">
        <div class="col-md-3 col-md-offset-3">
            <a href="order.php">
                <input id="add-items-btn" class="btn" type="button" value="Back to Order">
            </a>
        </div>
        <div class="col-md-3">
            <input id="checkout-btn" class="btn" type="button" value="Confirm Order">
        </div>
    </div>
</div>
</body>
</html>

<script type="text/javascript" src="../libraries/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/cart.js"></script>