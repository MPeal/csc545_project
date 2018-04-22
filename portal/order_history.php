<?php
session_start();
$user = $_SESSION['username'];
?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="portal.css">
    <link rel="stylesheet" href="css/order_history.css">
</head>

<body>
<input id='user-id-hide' type='hidden' value=<?php echo $user; ?>>
<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li><a href="order.php">Order</a></li>
            <li class="active"><a href="order_history.php">Order History</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>

    <div class="row">
        <div class='col-md-12'>
            <h3>Orders for <?php echo $user; ?></h3>
        </div>
    </div>
    <div id="orders-container">
        You have not made any orders, but you TOTALLY should.
    </div>
</div>
</body>
</html>

<script type="text/javascript" src="../libraries/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/order-history.js"></script>