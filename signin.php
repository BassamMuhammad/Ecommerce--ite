<?php
session_start();
if (
    'admin@gmail.com' === $_POST['email'] &&
    'admin123' === $_POST['password']
) {
    $_SESSION['user'] = array('admin', 'admin@gmail.com', 2);
    header('Location: admin.php');
} else {
    include_once(".\config.php");
    $result = mysqli_query($mysqli, "Select * from users");
    while ($res = mysqli_fetch_array($result)) {
        if (
            $res['email'] === $_POST['email'] &&
            $res['password'] === $_POST['password']
        ) {
            $mysqli->close();
            $_SESSION['user'] = array($res['name'], $res['email'], $res['id']);
            header('Location: index.php');
            break;
        }
    }
    echo "<h1> Incorrect email or password</h1>";
    echo "<a href=\"signin.html\">Go back </a>";
}
