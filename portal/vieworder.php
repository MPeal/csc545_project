<?php
include_once('../classes/MongoHandler.php');

$user = $_SESSION['username'];
$id = $_GET['id'];

$mongo = new MongoHandler();
$orderObj = $mongo->getOrder($id);
$items = $orderObj['items'];
?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="portal.css">
    <link rel="stylesheet" href="css/vieworder.css">
</head>

<body>
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
            <h3>Order #<?php echo $id; ?></h3>
        </div>
    </div>
    <div id="order-headers-row" class="row">
        <div class='col-md-4'>
            Item
        </div>
        <div class='col-md-4'>
            Quantity
        </div>
        <div class=col-md-4>
            Cost
        </div>
    </div>
    <div id="order-info-container">
        <?php foreach ($items as $item): ?>
            <div class='row'>
                <div class='col-md-4'>
                    <?php echo $item['name']; ?>
                </div>
                <div class='col-md-4'>
                    <?php echo $item['quantity']; ?>
                </div>
                <div class='col-md-4'>
                    $<?php echo (float)$item['price'] * (int)$item['quantity']; ?>
                </div>
            </div>
        <?php endforeach ?>
        <br>
        <div class='row'>
            <div class='col-md-4'>
                Total: $<?php echo $orderObj['total']; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script type="text/javascript" src="../libraries/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>