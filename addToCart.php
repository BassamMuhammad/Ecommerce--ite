<?php
session_start();
$id = $_GET["id"];
$quantity = $_GET["quantity"];
// unset($_SESSION['cart']);
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
    echo "<pre>" .
        print_r($_SESSION['cart']) .
        "</pre>";
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
