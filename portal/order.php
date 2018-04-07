<?php

?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="portal.css">
    <link rel="stylesheet" href="css/order.css">
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
    <div id="items-info-container">
        <div id="items-info-header-row" class="row">
            <div class="col-md-3">
                Item Name
            </div>
            <div class="col-md-3">
                Stock
            </div>
            <div class="col-md-3">
                Price
            </div>
            <div class="col-md-3">
                Quantity
            </div>
        </div>
    </div>
    <div class="row" id="order-total-row">
        <div class="col-md-2 col-md-offset-9">
                <span>
                    Category Subtotal
                </span>
            <input id="order-total-box" type="text" value="0.00" disabled>
        </div>
    </div>
    <div class="row" id="order-bottom-btns-row">
        <div class="col-md-3 col-md-offset-3">
            <input id="add-items-btn" class="btn" type="button" value="Add Items">
        </div>
        <div class="col-md-3">
            <input id="checkout-btn" class="btn" type="button" value="Check Out">
        </div>
    </div>
</div>
</body>
</html>

<script type="text/javascript" src="../libraries/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/order.js"></script>