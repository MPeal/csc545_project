<?php
session_start();
$user = $_SESSION['username'];
?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="portal.css">
    <link rel="stylesheet" href="css/order.css">

</head>

<body>
<div class="row" id="logo_id">
    <div class="col-md-12 text-center">
        <img src="../documents/Images/LAD-shipping.png";>



    </div>
</div>

<body>
<input id='user-id-hide' type='hidden' value=<?php echo $user; ?>>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li class="active"><a href="order.php"><span class="glyphicon glyphicon-tags"></span> Order</a></li>
            <li><a href="order_history.php"><span class="glyphicon glyphicon-list-alt"></span> Order History</a></li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
        </ul>
    </div>

    <div class="row" id="category_div">
        <select id="category-select">
            <option disabled selected>Select a Category</option>
        </select>
    </div>
    <div id="items-info-container">
        <div id="items-info-header-row" class="row">
            <div class="col-md-3" id = "order_item_div">
                Item Name
            </div>
            <div class="col-md-3" id = "order_stock_div">
                Stock
            </div>
            <div class="col-md-3" id = "order_price_div">
                Price
            </div>
            <div class="col-md-3" id="order_quantity_div">
                Quantity
            </div>
        </div>
    </div>
    <div class="row" id="order-total-row">
        <div class="col-md-3 col-md-offset-9">
                <span>
                    Category Subtotal
                </span>
            <input id="order-total-box" type="text" value="0.00" disabled>
        </div>
    </div>
    <div class="row" id="order-bottom-btns-row">
        <div class="col-md-3 col-md-offset-3">
            <input id="add-items-btn" class="btn-secondary" type="button" value="Add Items">
        </div>
        <div class="col-md-3">
            <a href="cart.php">
                <input id="checkout-btn" class="btn-success" type="button" value="Check Out">
            </a>
        </div>
        <div class="col-md-3 col-md-offset-3">
            <input id="add-items-btn" class="btn-secondary" type="button" value="Add Items">
        </div>

    </div>
    <div class="col-md-2 col-md-offset-6" id="cart-feedback-div">
    </div>
</div>
</div>
</body>
</html>

<script type="text/javascript" src="../libraries/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/order.js"></script>