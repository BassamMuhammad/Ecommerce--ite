<?php

session_start();
if (isset($_SESSION['cart'])) {

    $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($value) {
        return $value['id'] != $_GET['id'];
    });
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
