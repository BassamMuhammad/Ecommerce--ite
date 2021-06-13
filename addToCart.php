<?php
session_start();
$id = $_GET["id"];
if (isset($_SESSION['cart'])) {
    if (!in_array($id, $_SESSION['cart'])) {
        array_push($_SESSION["cart"], $id);
    }
} else {
    $_SESSION["cart"] = array($id);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
