<?php
session_start();
$id = $_GET["id"];
$quantity = $_GET["quantity"] ?? 1;
if (isset($_SESSION['cart'])) {
    if (!isProductInCart()) {
        array_push($_SESSION["cart"], ["id" => $id, "quantity" => $quantity]);
    }
} else {
    $_SESSION["cart"] = array();
    array_push($_SESSION["cart"], ["id" => $id, "quantity" => $quantity]);
}

function isProductInCart()
{
    foreach ($_SESSION['cart'] as $product) {
        if ($product['id'] === $_GET['id']) return true;
    }
    return false;
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
