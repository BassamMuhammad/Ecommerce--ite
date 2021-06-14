<?php
session_start();
if (isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array_filter($_SESSION['cart'], function($product) {
        return $product['id'] != $_GET['id'];
    });
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
