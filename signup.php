<?php
session_start();
include_once(".\config.php");
$result = mysqli_query($mysqli, "Select email from users");
$emailFound = false;
while ($res = mysqli_fetch_array($result)) {
    if ($res['email'] === $_POST['email']) {
        $emailFound = true;
        echo "<h1>Email already registered!</h1>";
        echo "<a href=\"signup.html\">Go back </a>";
        $mysqli->close();
        break;
    }
}
if (!$emailFound) {
    $result = mysqli_query($mysqli, "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "')");
    $result = mysqli_query($mysqli, "SELECT * from users where email='" . $_POST['email'] . "'");
    $mysqli->close();
    while ($res = mysqli_fetch_array($result)) {
        $_SESSION['user'] = array($_res['name'], $_res['email'], $_res['id']);
    }
    header('Location: index.php');
}
