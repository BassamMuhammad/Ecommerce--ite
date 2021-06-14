<?php
session_start();
include_once(".\config.php");
$result = mysqli_query($mysqli, "Select * from users");
while ($res = mysqli_fetch_array($result)) {
    if (
        $res['email'] === $_SESSION['user'][1] &&
        $res['password'] === $_POST['old_password']
    ) {
        $result = mysqli_query($mysqli, " UPDATE `users` SET password= '" . $_POST['new_password'] . "'");
        $mysqli->close();
        header('Location: index.php');
        break;
    }
}
echo "<h1> Incorrect old password</h1>";
echo "<a href=\"accountSettings.php\">Go back </a>";
