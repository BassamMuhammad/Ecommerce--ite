<?php
session_start();
include_once(".\config.php");
$result = mysqli_query($mysqli, "Select email from users");
$emailFound = false;
while ($res = mysqli_fetch_array($result)) {
    if ($res['email'] === $_POST['email']) {
        $emailFound = true;
        echo "<h1>Email already registered!</h1>";
        echo "<a href=\"accountSettings.php\">Go back </a>";
        $mysqli->close();
        break;
    }
}
if (!$emailFound) {
    $result = mysqli_query($mysqli, " UPDATE `users` SET name= '" . $_POST['name'] . "',email='" . $_POST['email'] . "'");
    $mysqli->close();
    $_SESSION['user'] = array($_POST['name'], $_POST['email']);
    header('Location: accountSettings.php');
}
