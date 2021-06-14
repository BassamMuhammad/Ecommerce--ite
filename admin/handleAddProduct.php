<?php
include_once("../config.php");

$result = mysqli_query($mysqli, "INSERT INTO `products`(`name`, `quantity`, `price`, `description`, `imageUrl`) VALUES ('" . $_GET['name'] . "','" . $_GET['quantity'] . "','" . $_GET['price'] . "','" . $_GET['description'] . "','" . $_GET['image'] . "')");
header('Location: admin.php');
