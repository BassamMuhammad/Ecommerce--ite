<?php
session_start();
$id = $_GET["id"];
if (isset($_SESSION['favourite'])) {
    if (!in_array($id, $_SESSION['favourite'])) {
        array_push($_SESSION["favourite"], $id);
    }
} else {
    $_SESSION["favourite"] = array($id);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
