<?php
session_start();
include_once(".\config.php");
mysqli_query($mysqli, "INSERT INTO `orders`(`user_id`) VALUES ('" . $_SESSION['user'][2] . "')");
$result = mysqli_query($mysqli, "SELECT max(id) as id from orders");
$id;
while ($res = mysqli_fetch_array($result)) {
    $id = $res['id'];
}

foreach ($_SESSION['cart'] as $value) {
    echo "<h1>1</h1>";
    mysqli_query($mysqli, "INSERT INTO `ordered_products`(`order_id`,`product_id`) VALUES ('" . $id . "','" . $value . "')");
}
$_SESSION['cart'] = array();
$mysqli->close();
header('Location: index.php');
