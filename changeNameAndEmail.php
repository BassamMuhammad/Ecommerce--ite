<?php
session_start();
include_once(".\config.php");

$result = mysqli_query($mysqli, "UPDATE `users` SET name=\"{$_POST['name']}\", email=\"{$_POST['email']}\" WHERE email=\"{$_SESSION['user'][1]}\"");


$mysqli->close();
$_SESSION['user'] = array($_POST['name'], $_POST['email']);
header('Location: accountSettings.php');
