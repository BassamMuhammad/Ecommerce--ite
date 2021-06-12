<?php
session_start();
$id = $_GET["id"];
if (isset($_SESSION['favourite'])) {
    if (($key = array_search($id, $_SESSION['favourite'])) !== false) {
        unset($_SESSION['favourite'][$key]);
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
