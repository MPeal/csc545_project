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

<div class="row" id="logo_id">
    <div class="col-md-12 text-center">
        <img src="../documents/Images/lad_shipping_logo.png";>



    </div>
</div>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li><a href="order.php"> <span class="glyphicon glyphicon-tags"></span> Order</a></li>
            <li><a href="order_history.php"><span class="glyphicon glyphicon-list-alt"></span> Order History</a></li>
            <li class="active"><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
        </ul>
    </div>
    <div id="items-info-container1">
        <div id="items-info-header-row" class="row">
            <div class="col-md-3" id = "cart-item-div">
                Item Name
            </div>
            <div class="col-md-3" id = "cart-price-div">
                Price
            </div>
            <div class="col-md-3" id="cart-quantity-div">
                Quantity
            </div>
        </div>
    </div>
    <div id="cart-items-container">
    </div>
    <div id="cart-total-row" class="row">
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
                <input id="add-items-btn" class="btn-secondary" type="button" value="Back to Order" >
            </a>
        </div>
        <div class="col-md-3">
            <input id="checkout-btn" class="btn-primary" type="button" value="Confirm Order">
        </div>
    </div>
</div>
</body>
</html>

<script type="text/javascript" src="../libraries/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/cart.js"></script>