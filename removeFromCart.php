<?php
session_start();
$id = $_GET["id"];
if (isset($_SESSION['cart'])) {
    if (($key = array_search($id, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
