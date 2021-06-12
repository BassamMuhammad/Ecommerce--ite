<?php
session_start();
include_once(".\config.php");

$result = mysqli_query($mysqli, "UPDATE users SET fullName='" . $_POST['name'] . "',phoneNumber='" . $_POST['phone_number'] . "',country='" . $_POST['country'] . "',state='" . $_POST['state'] . "',city='" . $_POST['city'] . "',address='" . $_POST['address'] . "',zipCode='" . $_POST['zip_code'] . "' where email='" . $_SESSION['user'][1] . "'");
$mysqli->close();
header('Location: payment.html');
