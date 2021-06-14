<?php
include_once("../config.php");

$result = mysqli_query($mysqli, "DELETE FROM `products` where id = '" . $_GET['id'] . "'");
header('Location: admin.php');
