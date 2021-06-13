<?php
include_once(".\config.php");
$result = mysqli_query($mysqli, "UPDATE products SET name='" . $_GET['name'] . "',price='" . $_GET['price'] . "',description='" . $_GET['description'] . "',imageUrl='" . $_GET['image'] . "' WHERE id='" . $_GET['id'] . "'");
$mysqli->close();
header('Location: admin.php');
