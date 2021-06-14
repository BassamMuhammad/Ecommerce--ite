<?php
session_start();
include_once(".\config.php");
$result = mysqli_query($mysqli, "Select * from users WHERE email=\"{$_SESSION['user'][1]}\" AND password=\"{$_POST['old_password']}\"");
if ($result->num_rows === 0) {
    echo "<h1> Incorrect old password</h1>";
    echo "<a href=\"accountSettings.php\">Go back </a>";
} else {
    $result = mysqli_query($mysqli, " UPDATE `users` SET password=\"{$_POST['new_password']}\" WHERE email=\"{$_SESSION['user'][1]}\"");
    $mysqli->close();
    header('Location: index.php');
}
